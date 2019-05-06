<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Funding;
use App\Kkb;
use App\RetailCredit;
use App\Transactional;
use App\Periode;
use App\User;
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
    // Declaration New Object
    $fundings = new \stdClass();
    $kkbs = new \stdClass();
    $retail_credits = new \stdClass();
    $transactionals = new \stdClass();

    $bulan = array (1 =>   'Januari', 'Februari', 'Maret', 'April', 'Mei', 'Juni', 'Juli', 'Agustus', 'September', 'Oktober', 'November', 'Desember');

    // Get Periode
    $periodes = Periode::orderBy('tahun')->orderBy('bulan')->limit(6)->get();
    foreach ($periodes as $periode) {
      $periode->bulan_text = $bulan[$periode->bulan];
    }

		if (Auth::user()->type == 1) {
      $fundings->all = DB::table('funding_approved')->where('user_id', Auth::user()->id)->sum('jumlah_transaksi');
      $kkbs->all = DB::table('kkb_approved')->where('user_id', Auth::user()->id)->sum('jumlah_transaksi');
      $retail_credits->all = DB::table('retail_credit_approved')->where('user_id', Auth::user()->id)->sum('jumlah_transaksi');
      $transactionals->all = DB::table('transactional_approved')->where('user_id', Auth::user()->id)->sum('jumlah_transaksi');

      // Get Product Holding
      // $fundings->product_holdings
      $fundings->product_holdings = DB::table('funding_approved')->select('ph_name')->distinct()->get();
      foreach ($fundings->product_holdings as $product_holding) {
        // Get Periode Funding
        //$fundings->product_holdings->periodes
        $product_holding->periodes = Periode::orderBy('tahun')->orderBy('bulan')->limit(6)->get();

        foreach ($product_holding->periodes as $periode) {
          // Get Funding based on Periode
          //$fundings->product_holdings->periodes->jumlah_transaksi
          $periode->jumlah_transaksi = DB::table('funding_approved')->where([['bulan', $periode->bulan],['tahun', $periode->tahun], ['ph_name', $product_holding->ph_name], ['user_id', Auth::user()->id]])->sum('jumlah_transaksi');
        }
      }
      $kkbs->product_holdings = DB::table('kkb_approved')->select('ph_name')->distinct()->get();
      foreach ($kkbs->product_holdings as $product_holding) {
        // Get Periode KKB
        //$kkbs->product_holdings->periodes
        $product_holding->periodes = Periode::orderBy('tahun')->orderBy('bulan')->limit(6)->get();

        foreach ($product_holding->periodes as $periode) {
          // Get KKB based on Periode
          //$kkbs->product_holdings->periodes->jumlah_transaksi
          $periode->jumlah_transaksi = DB::table('kkb_approved')->where([['bulan', $periode->bulan],['tahun', $periode->tahun], ['ph_name', $product_holding->ph_name], ['user_id', Auth::user()->id]])->sum('jumlah_transaksi');
        }
      }
      $retail_credits->product_holdings = DB::table('retail_credit_approved')->select('ph_name')->distinct()->get();
      foreach ($retail_credits->product_holdings as $product_holding) {
        // Get Periode Retail Credit
        //$retail_credits->product_holdings->periodes
        $product_holding->periodes = Periode::orderBy('tahun')->orderBy('bulan')->limit(6)->get();

        foreach ($product_holding->periodes as $periode) {
          // Get Retail Credit based on Periode
          //$retail_credits->product_holdings->periodes->jumlah_transaksi
          $periode->jumlah_transaksi = DB::table('retail_credit_approved')->where([['bulan', $periode->bulan],['tahun', $periode->tahun], ['ph_name', $product_holding->ph_name], ['user_id', Auth::user()->id]])->sum('jumlah_transaksi');
        }
      }
      $transactionals->product_holdings = DB::table('transactional_approved')->select('ph_name')->distinct()->get();
      foreach ($transactionals->product_holdings as $product_holding) {
        // Get Periode Transactional
        //$transactionals->product_holdings->periodes
        $product_holding->periodes = Periode::orderBy('tahun')->orderBy('bulan')->limit(6)->get();

        foreach ($product_holding->periodes as $periode) {
          // Get Transactional based on Periode
          //$transactionals->product_holdings->periodes->jumlah_transaksi
          $periode->jumlah_transaksi = DB::table('transactional_approved')->where([['bulan', $periode->bulan],['tahun', $periode->tahun], ['ph_name', $product_holding->ph_name], ['user_id', Auth::user()->id]])->sum('jumlah_transaksi');
        }
      }

      $fundings->this_month = DB::table('funding_approved')->where([['bulan', date('m')],['user_id', Auth::user()->id]])->sum('jumlah_transaksi');
      $kkbs->this_month = DB::table('kkb_approved')->where([['bulan', date('m')],['user_id', Auth::user()->id]])->sum('jumlah_transaksi');
      $retail_credits->this_month = DB::table('retail_credit_approved')->where([['bulan', date('m')],['user_id', Auth::user()->id]])->sum('jumlah_transaksi');
      $transactionals->this_month = DB::table('transactional_approved')->where([['bulan', date('m')],['user_id', Auth::user()->id]])->sum('jumlah_transaksi');

			return view('dashboards.user1', ['fundings'=>$fundings, 'kkbs'=>$kkbs, 'retail_credits'=>$retail_credits, 'transactionals'=>$transactionals, 'periodes'=>$periodes]);

		} else if(Auth::user()->type == 2) {
      // Get Jumlah All Data
      $fundings->all = DB::table('funding_approved')->where('branch_id', Auth::user()->branch_id)->sum('jumlah_transaksi');
      $kkbs->all = DB::table('kkb_approved')->where('branch_id', Auth::user()->branch_id)->sum('jumlah_transaksi');
      $retail_credits->all = DB::table('retail_credit_approved')->where('branch_id', Auth::user()->branch_id)->sum('jumlah_transaksi');
      $transactionals->all = DB::table('transactional_approved')->where('branch_id', Auth::user()->branch_id)->sum('jumlah_transaksi');

      // Get Product Holding
      // $fundings->product_holdings
      $fundings->product_holdings = DB::table('funding_approved')->select('ph_name')->distinct()->get();
      foreach ($fundings->product_holdings as $product_holding) {
        // Get Periode Funding
        //$fundings->product_holdings->periodes
        $product_holding->periodes = Periode::orderBy('tahun')->orderBy('bulan')->limit(6)->get();

        foreach ($product_holding->periodes as $periode) {
          // Get Funding based on Periode
          //$fundings->product_holdings->periodes->jumlah_transaksi
          $periode->jumlah_transaksi = DB::table('funding_approved')->where([['bulan', $periode->bulan],['tahun', $periode->tahun], ['ph_name', $product_holding->ph_name]])->sum('jumlah_transaksi');
        }
      }
      $kkbs->product_holdings = DB::table('kkb_approved')->select('ph_name')->distinct()->get();
      foreach ($kkbs->product_holdings as $product_holding) {
        // Get Periode KKB
        //$kkbs->product_holdings->periodes
        $product_holding->periodes = Periode::orderBy('tahun')->orderBy('bulan')->limit(6)->get();

        foreach ($product_holding->periodes as $periode) {
          // Get KKB based on Periode
          //$kkbs->product_holdings->periodes->jumlah_transaksi
          $periode->jumlah_transaksi = DB::table('kkb_approved')->where([['bulan', $periode->bulan],['tahun', $periode->tahun], ['ph_name', $product_holding->ph_name]])->sum('jumlah_transaksi');
        }
      }
      $retail_credits->product_holdings = DB::table('retail_credit_approved')->select('ph_name')->distinct()->get();
      foreach ($retail_credits->product_holdings as $product_holding) {
        // Get Periode Retail Credit
        //$retail_credits->product_holdings->periodes
        $product_holding->periodes = Periode::orderBy('tahun')->orderBy('bulan')->limit(6)->get();

        foreach ($product_holding->periodes as $periode) {
          // Get Retail Credit based on Periode
          //$retail_credits->product_holdings->periodes->jumlah_transaksi
          $periode->jumlah_transaksi = DB::table('retail_credit_approved')->where([['bulan', $periode->bulan],['tahun', $periode->tahun], ['ph_name', $product_holding->ph_name]])->sum('jumlah_transaksi');
        }
      }
      $transactionals->product_holdings = DB::table('transactional_approved')->select('ph_name')->distinct()->get();
      foreach ($transactionals->product_holdings as $product_holding) {
        // Get Periode Transactional
        //$transactionals->product_holdings->periodes
        $product_holding->periodes = Periode::orderBy('tahun')->orderBy('bulan')->limit(6)->get();

        foreach ($product_holding->periodes as $periode) {
          // Get Transactional based on Periode
          //$transactionals->product_holdings->periodes->jumlah_transaksi
          $periode->jumlah_transaksi = DB::table('transactional_approved')->where([['bulan', $periode->bulan],['tahun', $periode->tahun], ['ph_name', $product_holding->ph_name]])->sum('jumlah_transaksi');
        }
      }

      // Get This Month Data
      $fundings->this_month = DB::table('funding_approved')->where([['bulan', date('m')],['branch_id', Auth::user()->branch_id]])->sum('jumlah_transaksi');
      $kkbs->this_month = DB::table('kkb_approved')->where([['bulan', date('m')],['branch_id', Auth::user()->branch_id]])->sum('jumlah_transaksi');
      $retail_credits->this_month = DB::table('retail_credit_approved')->where([['bulan', date('m')],['branch_id', Auth::user()->branch_id]])->sum('jumlah_transaksi');
      $transactionals->this_month = DB::table('transactional_approved')->where([['bulan', date('m')],['branch_id', Auth::user()->branch_id]])->sum('jumlah_transaksi');

      // Get Rank User
      $ranks = DB::table('ranked_by_month')->where([['branch_id', Auth::user()->branch_id],['bulan', date('m')],['tahun', date('Y')]])->limit(6)->get();
      
      // dd($fundings);
			return view('dashboards.user2', ['fundings'=>$fundings,'kkbs'=>$kkbs,'retail_credits'=>$retail_credits,'transactionals'=>$transactionals, 'periodes'=>$periodes, 'ranks'=>$ranks]);
		} else if(Auth::user()->type == 3) {
      $fundings->this_month = DB::table('funding_approved')->where([['bulan', date('m')],['branch_id', Auth::user()->branch_id]])->sum('jumlah_transaksi');
      $kkbs->this_month = DB::table('kkb_approved')->where([['bulan', date('m')],['branch_id', Auth::user()->branch_id]])->sum('jumlah_transaksi');
      $retail_credits->this_month = DB::table('retail_credit_approved')->where([['bulan', date('m')],['branch_id', Auth::user()->branch_id]])->sum('jumlah_transaksi');
      $transactionals->this_month = DB::table('transactional_approved')->where([['bulan', date('m')],['branch_id', Auth::user()->branch_id]])->sum('jumlah_transaksi');

      $csr_rank_regulars = DB::table('ranked_branch_regular')->where([['position', 'CSR'],['tahun',date('Y')],['bulan',date('m')]])->limit(6)->get();
      $officer_rank_regulars = DB::table('ranked_branch_regular')->where([['position', 'MKA/BO/SPV/OFFICER'],['tahun',date('Y')],['bulan',date('m')]])->limit(6)->get(); 
      $security_rank_regulars = DB::table('ranked_branch_regular')->where([['position', 'Security'],['tahun',date('Y')],['bulan',date('m')]])->limit(6)->get(); 
      $teller_rank_regulars = DB::table('ranked_branch_regular')->where([['position', 'Teller'],['tahun',date('Y')],['bulan',date('m')]])->limit(6)->get(); 

      $csr_rank_mikros = DB::table('ranked_branch_mikro')->where([['position', 'CSR'],['tahun',date('Y')],['bulan',date('m')]])->limit(6)->get();
      $officer_rank_mikros = DB::table('ranked_branch_mikro')->where([['position', 'MKA/BO/SPV/OFFICER'],['tahun',date('Y')],['bulan',date('m')]])->limit(6)->get();
      $security_rank_mikros = DB::table('ranked_branch_mikro')->where([['position', 'Security'],['tahun',date('Y')],['bulan',date('m')]])->limit(6)->get();
      $teller_rank_mikros = DB::table('ranked_branch_mikro')->where([['position', 'Teller'],['tahun',date('Y')],['bulan',date('m')]])->limit(6)->get();

			return view('dashboards.user3', [
        'fundings'=>$fundings,
        'kkbs'=>$kkbs, 
        'retail_credits'=>$retail_credits, 
        'transactionals'=>$transactionals, 
        'csr_rank_regulars'=>$csr_rank_regulars, 
        'csr_rank_mikros'=>$csr_rank_mikros, 
        'officer_rank_regulars'=>$officer_rank_regulars,
        'officer_rank_mikros'=>$officer_rank_mikros,
        'security_rank_regulars'=>$security_rank_regulars,
        'security_rank_mikros'=>$security_rank_mikros,
        'teller_rank_regulars'=>$teller_rank_regulars,
        'teller_rank_mikros'=>$teller_rank_mikros,
      ]);
		} else if(Auth::user()->type == 4){
      $fundings->all = DB::table('funding_approved')->where('branch_id', Auth::user()->branch_id)->sum('jumlah_transaksi');
      $kkbs->all = DB::table('kkb_approved')->where('branch_id', Auth::user()->branch_id)->sum('jumlah_transaksi');
      $retail_credits->all = DB::table('retail_credit_approved')->where('branch_id', Auth::user()->branch_id)->sum('jumlah_transaksi');
      $transactionals->all = DB::table('transactional_approved')->where('branch_id', Auth::user()->branch_id)->sum('jumlah_transaksi');

      // Get Product Holding
      // $fundings->product_holdings
      $fundings->product_holdings = DB::table('funding_approved')->select('ph_name')->distinct()->get();
      foreach ($fundings->product_holdings as $product_holding) {
        // Get Periode Funding
        //$fundings->product_holdings->periodes
        $product_holding->periodes = Periode::orderBy('tahun')->orderBy('bulan')->limit(6)->get();

        foreach ($product_holding->periodes as $periode) {
          // Get Funding based on Periode
          //$fundings->product_holdings->periodes->jumlah_transaksi
          $periode->jumlah_transaksi = DB::table('funding_approved')->where([['bulan', $periode->bulan],['tahun', $periode->tahun], ['ph_name', $product_holding->ph_name], ['branch_id', Auth::user()->branch_id]])->sum('jumlah_transaksi');
        }
      }
      $kkbs->product_holdings = DB::table('kkb_approved')->select('ph_name')->distinct()->get();
      foreach ($kkbs->product_holdings as $product_holding) {
        // Get Periode KKB
        //$kkbs->product_holdings->periodes
        $product_holding->periodes = Periode::orderBy('tahun')->orderBy('bulan')->limit(6)->get();

        foreach ($product_holding->periodes as $periode) {
          // Get KKB based on Periode
          //$kkbs->product_holdings->periodes->jumlah_transaksi
          $periode->jumlah_transaksi = DB::table('kkb_approved')->where([['bulan', $periode->bulan],['tahun', $periode->tahun], ['ph_name', $product_holding->ph_name], ['branch_id', Auth::user()->branch_id]])->sum('jumlah_transaksi');
        }
      }
      $retail_credits->product_holdings = DB::table('retail_credit_approved')->select('ph_name')->distinct()->get();
      foreach ($retail_credits->product_holdings as $product_holding) {
        // Get Periode Retail Credit
        //$retail_credits->product_holdings->periodes
        $product_holding->periodes = Periode::orderBy('tahun')->orderBy('bulan')->limit(6)->get();

        foreach ($product_holding->periodes as $periode) {
          // Get Retail Credit based on Periode
          //$retail_credits->product_holdings->periodes->jumlah_transaksi
          $periode->jumlah_transaksi = DB::table('retail_credit_approved')->where([['bulan', $periode->bulan],['tahun', $periode->tahun], ['ph_name', $product_holding->ph_name], ['branch_id', Auth::user()->branch_id]])->sum('jumlah_transaksi');
        }
      }
      $transactionals->product_holdings = DB::table('transactional_approved')->select('ph_name')->distinct()->get();
      foreach ($transactionals->product_holdings as $product_holding) {
        // Get Periode Transactional
        //$transactionals->product_holdings->periodes
        $product_holding->periodes = Periode::orderBy('tahun')->orderBy('bulan')->limit(6)->get();

        foreach ($product_holding->periodes as $periode) {
          // Get Transactional based on Periode
          //$transactionals->product_holdings->periodes->jumlah_transaksi
          $periode->jumlah_transaksi = DB::table('transactional_approved')->where([['bulan', $periode->bulan],['tahun', $periode->tahun], ['ph_name', $product_holding->ph_name], ['branch_id', Auth::user()->branch_id]])->sum('jumlah_transaksi');
        }
      }

      $fundings->this_month = DB::table('funding_approved')->where([['bulan', date('m')],['branch_id', Auth::user()->branch_id]])->sum('jumlah_transaksi');
      // dd($fundings);
      $kkbs->this_month = DB::table('kkb_approved')->where([['bulan', date('m')],['branch_id', Auth::user()->branch_id]])->sum('jumlah_transaksi');
      $retail_credits->this_month = DB::table('retail_credit_approved')->where([['bulan', date('m')],['branch_id', Auth::user()->branch_id]])->sum('jumlah_transaksi');
      $transactionals->this_month = DB::table('transactional_approved')->where([['bulan', date('m')],['branch_id', Auth::user()->branch_id]])->sum('jumlah_transaksi');

      return view('dashboards.user1', ['fundings'=>$fundings, 'kkbs'=>$kkbs, 'retail_credits'=>$retail_credits, 'transactionals'=>$transactionals, 'periodes'=>$periodes]);
    }
	}
}
