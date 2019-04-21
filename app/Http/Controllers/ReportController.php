<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Branch;
use App\Funding;
use App\Kkb;
use App\RetailCredit;
use App\Transactional;
use Auth;
use App\Exports\ReportExport;
use Maatwebsite\Excel\Facades\Excel;

class ReportController extends Controller
{
    public function index()
    {
    	$branchs = Branch::all();
    	return view('reports.index', ['branchs'=>$branchs]);
    }

    public function download_excel(Request $request)
    {
        return Excel::download(new ReportExport($request), 'report.xlsx');
    }
}
