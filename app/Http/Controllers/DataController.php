<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\ProductHolding;
use App\ProductContent;
use App\Funding;
use App\Kkb;
use App\RetailCredit;
use App\Transactional;
use App\Periode;
use Auth;
use DB;

class DataController extends Controller
{
    public function users()
    {
        $users = User::where("status", "Active")->get();

        return view('users.data', ['users'=>$users]);
    }

    public function product_holdings()
    {
   		$product_holdings = ProductHolding::where('status', 'Active')->get();

   		return view('product_holdings.data', ['product_holdings'=>$product_holdings]);
    }

    public function fundings()
    {
        if (Auth::user()->type == 1) {
            $fundings = Funding::where('user_id', Auth::user()->id)->get();
        } elseif(Auth::user()->type == 2 || Auth::user()->type == 4) {
            $fundings = Funding::join('users', 'users.id', '=', 'fundings.user_id')
                ->select('fundings.*', 'users.branch_id')
                ->where('branch_id', Auth::user()->branch_id)
                ->whereMonth('date_serve', (date('m')-1))
                ->get();
        }

        // dd($fundings);

        return view('fundings.data', ['fundings'=>$fundings]);
    }

    public function kkbs()
    {
        if(Auth::user()->type == 1){
            $kkbs = Kkb::where('user_id', Auth::user()->id)->get();
        } elseif(Auth::user()->type == 2 || Auth::user()->type == 4) {
            $kkbs = Kkb::join('users', 'users.id', '=', 'kkbs.user_id')
                ->select('kkbs.*', 'users.branch_id')
                ->where('branch_id', Auth::user()->branch_id)
                ->whereMonth('date_serve', (date('m')-1))
                ->get();
        }

        return view('kkbs.data', ['kkbs'=>$kkbs]);
    }

    public function retail_credits()
    {
        if(Auth::user()->type == 1){
            $retail_credits = RetailCredit::where('user_id', Auth::user()->id)->get();
        } elseif(Auth::user()->type == 2 || Auth::user()->type == 4) {
            $retail_credits = RetailCredit::join('users', 'users.id', '=', 'retail_credits.user_id')
                ->select('retail_credits.*', 'users.branch_id')
                ->where('branch_id', Auth::user()->branch_id)
                ->whereMonth('date_serve', (date('m')-1))
                ->get();
        }

        return view('retail_credits.data', ['retail_credits'=>$retail_credits]);
    }

    public function transactionals()
    {
        if(Auth::user()->type == 1){
            $transactionals = Transactional::where('user_id', Auth::user()->id)->get();
        } elseif(Auth::user()->type == 2 || Auth::user()->type == 4) {
            $transactionals = Transactional::join('users', 'users.id', '=', 'transactionals.user_id')
                ->select('transactionals.*', 'users.branch_id')
                ->where('branch_id', Auth::user()->branch_id)
                ->whereMonth('date_serve', (date('m')-1))
                ->get();
        }

        return view('transactionals.data', ['transactionals'=>$transactionals]);
    }

    public function product_content($id)
    {
        $product_contents = ProductContent::where(['product_holding_id'=> $id, 'status'=>'active'])->get();
        $result = "";
        foreach ($product_contents as $product_content) {
            $result = $result."<option value='".$product_content->id."'>".$product_content->name."</option>";
        }
        return $result;
    }

    public function reports(Request $request)
    {
        DB::enableQueryLog();
        $branch_id = $request->branch_id;
        if(Auth::user()->type == 3){
            $start_date = substr($request->report_range, 0, 10);
            $start_date = date('Y-m-d', strtotime($start_date));
            $end_date = substr($request->report_range, 13, 10);
            $end_date = date('Y-m-d', strtotime($end_date));

            $data_fundings = Funding::join('users', 'users.id', '=', 'fundings.user_id')->where('fundings.status', 'approved')->whereBetween('date_serve', [$start_date, $end_date]);
            $data_kkbs = Kkb::join('users', 'users.id', '=', 'kkbs.user_id')->where('kkbs.status', 'approved')->whereBetween('date_serve', [$start_date, $end_date]);
            $data_retail_credits = RetailCredit::join('users', 'users.id', '=', 'retail_credits.user_id')->where('retail_credits.status', 'approved')->whereBetween('date_serve', [$start_date, $end_date]);
            $data_transactionals = Transactional::join('users', 'users.id', '=', 'transactionals.user_id')->where('transactionals.status', 'approved')->whereBetween('date_serve', [$start_date, $end_date]);
        } elseif(Auth::user()->type == 2){
            $month = substr($request->report_range, 0, 2);
            $year = substr($request->report_range, 3, 4);

            $data_fundings = Funding::join('users', 'users.id', '=', 'fundings.user_id')->where('fundings.status', 'approved')->whereMonth('date_serve', $month)->whereYear('date_serve', $year);
            $data_kkbs = Kkb::join('users', 'users.id', '=', 'kkbs.user_id')->where('kkbs.status', 'approved')->whereMonth('date_serve', $month)->whereYear('date_serve', $year);
            $data_retail_credits = RetailCredit::join('users', 'users.id', '=', 'retail_credits.user_id')->where('retail_credits.status', 'approved')->whereMonth('date_serve', $month)->whereYear('date_serve', $year);
            $data_transactionals = Transactional::join('users', 'users.id', '=', 'transactionals.user_id')->where('transactionals.status', 'approved')->whereMonth('date_serve', $month)->whereYear('date_serve', $year);
        }

        if ($branch_id == 'all') {
            $data_fundings = $data_fundings->get();
            $data_kkbs = $data_kkbs->get();
            $data_retail_credits = $data_retail_credits->get();
            $data_transactionals = $data_transactionals->get();
        } else {
            $data_fundings = $data_fundings->where('branch_id', $branch_id)->get();
            $data_kkbs = $data_kkbs->where('branch_id', $branch_id)->get();
            $data_retail_credits = $data_retail_credits->where('branch_id', $branch_id)->get();
            $data_transactionals = $data_transactionals->where('branch_id', $branch_id)->get();
        }
        // print_r(DB::getQueryLog());

        return view('reports.data', ['data_fundings' => $data_fundings, 'data_kkbs'=>$data_kkbs, 'data_retail_credits'=>$data_retail_credits, 'data_transactionals'=>$data_transactionals]);
    }

    public function ranking(Request $request)
    {
        $branch_type = $request->branch_type;

        if ($request->position == 'Officer') {
            $position = 'MKA/BO/SPV/OFFICER';
        } else {
            $position = $request->position;
        }

        $bulan_ini = date('m');
        $tahun_ini = date('Y');

        if ($branch_type == 'regular') {
            $data = DB::table('ranked_branch_regular')->select('branch_id', 'bulan', 'tahun')->distinct()->where([['bulan', $bulan_ini],['tahun', $tahun_ini],['position', 'CSR']])->orderBy('point', 'desc')->limit(6)->get();
            foreach ($data as $branch) {
                $branch->point = DB::table('ranked_branch_regular')->where([['bulan', $bulan_ini],['tahun', $tahun_ini],['position', $position],['branch_id', $branch->branch_id]])->max('point');
                $branch->user = DB::table('ranked_branch_regular')->where([['bulan', $bulan_ini],['tahun', $tahun_ini],['position', $position],['branch_id', $branch->branch_id]])->orderBy('point', 'desc')->first();
            }
        } else {
            $data = DB::table('ranked_branch_mikro')->select('branch_id', 'bulan', 'tahun')->distinct()->where([['bulan', $bulan_ini],['tahun', $tahun_ini],['position', $position]])->orderBy('point', 'desc')->limit(6)->get();
            foreach ($data as $branch) {
                $branch->point = DB::table('ranked_branch_mikro')->where([['bulan', $bulan_ini],['tahun', $tahun_ini],['position', $position],['branch_id', $branch->branch_id]])->max('point');
                $branch->user = DB::table('ranked_branch_mikro')->where([['bulan', $bulan_ini],['tahun', $tahun_ini],['position', $position],['branch_id', $branch->branch_id]])->orderBy('point', 'desc')->first();
            }
        }

        return view('dashboards.dataUser3', ['data'=>$data]);
    }

    public function history ($id, Request $request)
    {
        $product = $request->product;

        if ($product == 'funding') {
            $table = 'ranked_last_funding';
        } elseif ($product == 'alliance') {
            $table = 'ranked_last_kkb';
        } elseif ($product == 'retail_credit') {
            $table = 'ranked_last_retail_credit';
        } elseif ($product == 'transactional') {
            $table = 'ranked_last_transactional';
        }

        $ph = DB::table($table)->select('ph_name')->distinct()->where('branch_id', $id)->get();
        foreach ($ph as $data_ph) {
            $data_ph->periodes = DB::table($table)->select('tanggal')->distinct()->where('branch_id', $id)->get();
            foreach ($data_ph->periodes as $periode) {
                $periode->jml_transaksi = DB::table($table)->where([['branch_id', $id],['tanggal', $periode->tanggal], ['ph_name', $data_ph->ph_name]])->sum('jumlah_transaksi');
            }
        }

        $periodes = DB::table($table)->select('tanggal')->distinct()->where('branch_id', $id)->get();

        return view('dashboards.dataUser2', ['ph'=>$ph, 'periodes'=>$periodes]);

    }
}
