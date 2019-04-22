<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Funding;
use App\Kkb;
use App\RetailCredit;
use App\Transactional;
use Auth;
use DB;

class DashboardController extends Controller
{
	public function __construct()
  {
  	$this->middleware('auth');
  }

	public function index()
	{
		if (Auth::user()->type == 1) {
			return view('dashboards.user1');
		} else if(Auth::user()->type == 2) {
      // Declaration New Object
      $fundings = new \stdClass();
      $kkbs = new \stdClass();
      $retail_credits = new \stdClass();
      $transactionals = new \stdClass();

      $bulan = array (1 =>   'Januari',
        'Februari',
        'Maret',
        'April',
        'Mei',
        'Juni',
        'Juli',
        'Agustus',
        'September',
        'Oktober',
        'November',
        'Desember'
      );

      // Get All Data
      $fundings->all = Funding::join('users', 'users.id', '=', 'fundings.user_id')
        ->select('fundings.*', 'users.branch_id')
        ->where([['branch_id', Auth::user()->branch_id],['fundings.status', 'Approved']])
        ->get();
      $kkbs->all = Kkb::join('users', 'users.id', '=', 'kkbs.user_id')
        ->select('kkbs.*', 'users.branch_id')
        ->where([['branch_id', Auth::user()->branch_id],['kkbs.status', 'Approved']])
        ->get();
      $retail_credits->all = RetailCredit::join('users', 'users.id', '=', 'retail_credits.user_id')
        ->select('retail_credits.*', 'users.branch_id')
        ->where([['branch_id', Auth::user()->branch_id],['retail_credits.status', 'Approved']])
        ->get();
      $transactionals->all = Transactional::join('users', 'users.id', '=', 'transactionals.user_id')
        ->select('transactionals.*', 'users.branch_id')
        ->where([['branch_id', Auth::user()->branch_id],['transactionals.status', 'Approved']])
        ->get();

      // Get Periode
      $periodes = DB::select('
        SELECT tahun, bulan FROM( SELECT * FROM funding_approved f UNION SELECT * FROM kkb_approved k UNION SELECT * FROM retail_credit_approved r UNION SELECT * FROM transactional_approved t ) a GROUP BY tahun, bulan ORDER BY tahun, bulan
      ');
      foreach ($periodes as $periode) {
        $periode->bulan_text = $bulan[$periode->bulan];
      }

      // Get Product Holding
      // $fundings->product_holdings
      $fundings->product_holdings = DB::table('funding_approved')->select('product_holding')->distinct()->get();
      foreach ($fundings->product_holdings as $product_holding) {
        // Get Periode Funding
        //$fundings->product_holdings->periodes
        $product_holding->periodes = DB::select('
          SELECT tahun, bulan FROM( SELECT * FROM funding_approved f UNION SELECT * FROM kkb_approved k UNION SELECT * FROM retail_credit_approved r UNION SELECT * FROM transactional_approved t ) a GROUP BY tahun, bulan ORDER BY tahun, bulan
        ');

        foreach ($product_holding->periodes as $periode) {
          // Get Funding based on Periode
          //$fundings->product_holdings->periodes->datas
          $periode->data = DB::table('funding_approved')->where([['bulan', $periode->bulan],['tahun', $periode->tahun], ['product_holding', $product_holding->product_holding]])->sum('jumlah_data');
        }
      }
      $kkbs->product_holdings = DB::table('kkb_approved')->select('product_holding')->distinct()->get();
      foreach ($kkbs->product_holdings as $product_holding) {
        // Get Periode Funding
        //$kkbs->product_holdings->periodes
        $product_holding->periodes = DB::select('
          SELECT tahun, bulan FROM( SELECT * FROM funding_approved f UNION SELECT * FROM kkb_approved k UNION SELECT * FROM retail_credit_approved r UNION SELECT * FROM transactional_approved t ) a GROUP BY tahun, bulan ORDER BY tahun, bulan
        ');

        foreach ($product_holding->periodes as $periode) {
          // Get Funding based on Periode
          //$kkbs->product_holdings->periodes->datas
          $periode->data = DB::table('kkb_approved')->where([['bulan', $periode->bulan],['tahun', $periode->tahun], ['product_holding', $product_holding->product_holding]])->sum('jumlah_data');
        }
      }
      $retail_credits->product_holdings = DB::table('retail_credit_approved')->select('product_holding')->distinct()->get();
      foreach ($retail_credits->product_holdings as $product_holding) {
        // Get Periode Funding
        //$retail_credits->product_holdings->periodes
        $product_holding->periodes = DB::select('
          SELECT tahun, bulan FROM( SELECT * FROM funding_approved f UNION SELECT * FROM kkb_approved k UNION SELECT * FROM retail_credit_approved r UNION SELECT * FROM transactional_approved t ) a GROUP BY tahun, bulan ORDER BY tahun, bulan
        ');

        foreach ($product_holding->periodes as $periode) {
          // Get Funding based on Periode
          //$retail_credits->product_holdings->periodes->datas
          $periode->data = DB::table('retail_credit_approved')->where([['bulan', $periode->bulan],['tahun', $periode->tahun], ['product_holding', $product_holding->product_holding]])->sum('jumlah_data');
        }
      }
      $transactionals->product_holdings = DB::table('transactional_approved')->select('product_holding')->distinct()->get();
      foreach ($transactionals->product_holdings as $product_holding) {
        // Get Periode Funding
        //$transactionals->product_holdings->periodes
        $product_holding->periodes = DB::select('
          SELECT tahun, bulan FROM( SELECT * FROM funding_approved f UNION SELECT * FROM kkb_approved k UNION SELECT * FROM retail_credit_approved r UNION SELECT * FROM transactional_approved t ) a GROUP BY tahun, bulan ORDER BY tahun, bulan
        ');

        foreach ($product_holding->periodes as $periode) {
          // Get Funding based on Periode
          //$transactionals->product_holdings->periodes->datas
          $periode->data = DB::table('transactional_approved')->where([['bulan', $periode->bulan],['tahun', $periode->tahun], ['product_holding', $product_holding->product_holding]])->sum('jumlah_data');
        }
      }
      // dd($fundings);

      // Get latest data up to 6 month ago'
      // $fundings->latest = DB::table('funding_approved')->orderBy('tahun', 'desc')->orderBy('bulan', 'desc')->limit(6)->get();
      // $kkbs->latest = DB::table('kkb_approved')->orderBy('tahun', 'desc')->orderBy('bulan', 'desc')->limit(6)->get();
      // $retail_credits->latest = DB::table('retail_credit_approved')->orderBy('tahun', 'desc')->orderBy('bulan', 'desc')->limit(6)->get();
      // $transactionals->latest = DB::table('transactional_approved')->orderBy('tahun', 'desc')->orderBy('bulan', 'desc')->limit(6)->get();

      // Get This Month Data
      $fundings->this_month = DB::table('funding_approved')->where('bulan', date('m'))->sum('jumlah_data');
      $kkbs->this_month = DB::table('kkb_approved')->where('bulan', date('m'))->sum('jumlah_data');
      $retail_credits->this_month = DB::table('retail_credit_approved')->where('bulan', date('m'))->sum('jumlah_data');
      $transactionals->this_month = DB::table('transactional_approved')->where('bulan', date('m'))->sum('jumlah_data');
      
      // dd($fundings);
			return view('dashboards.user2', ['fundings'=>$fundings,'kkbs'=>$kkbs,'retail_credits'=>$retail_credits,'transactionals'=>$transactionals, 'periodes'=>$periodes]);
		} else if(Auth::user()->type == 3) {
			return view('dashboards.user3');
		}
	}
}
