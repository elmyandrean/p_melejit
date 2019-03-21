<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\ProductHolding;

class DataController extends Controller
{
    public function users()
    {
        $users = User::all();

        return view('users.data', ['users'=>$users]);
    }

    public function product_holdings()
    {
    		$product_holdings = ProductHolding::where('status', 'active')->get();

    		return view('product_holdings.data', ['product_holdings'=>$product_holdings]);
    }
}
