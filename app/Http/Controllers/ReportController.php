<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Branch;

class ReportController extends Controller
{
    public function index()
    {
    	$branchs = Branch::all();
    	return view('reports.index', ['branchs'=>$branchs]);
    }
}
