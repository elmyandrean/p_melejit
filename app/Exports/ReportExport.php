<?php

namespace App\Exports;

use Illuminate\Contracts\View\View;
use Maatwebsite\Excel\Concerns\FromView;
use App\Branch;
use App\Funding;
use App\Kkb;
use App\RetailCredit;
use App\Transactional;
use Auth;

class ReportExport implements FromView
{
	public function  __construct($data)
	{
	  $this->data = $data;
	  
	}

	public function view(): View
	{
		$request = $this->data;
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

    return view('reports.excel', ['data_fundings' => $data_fundings, 'data_kkbs'=>$data_kkbs, 'data_retail_credits'=>$data_retail_credits, 'data_transactionals'=>$data_transactionals]);
	}


  // public function collection()
  // {
  	

    

  // }
}
