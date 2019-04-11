<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;

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
			return view('dashboards.user2');
		} else if(Auth::user()->type == 3) {
			return view('dashboards.user3');
		}
	}
}
