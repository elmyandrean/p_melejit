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

      // Get All Data
      $fundings->all = ;
      $kkbs->all = ;
      $retail_credits->all = ;
      $transactionals->all = ;

      // Get data last 6 month ago'
      $fundings->latest = ;
      $kkbs->latest = ;
      $retail_credits->latest = ;
      $transactionals->latest = ;

      // Get Data Best User in Each Menu
      $fundings->best = ;
      $kkbs->best = ;
      $retail_credits->best = ;
      $transactionals->best = ;
      
      dd($fundings);
			return view('dashboards.user2', ['funding'=>$funding,'kkb'=>$kkb,'retail_credit'=>$retail_credit,'transactional'=>$transactional,]);
		} else if(Auth::user()->type == 3) {
			return view('dashboards.user3');
		}
	}
}
