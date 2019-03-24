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

    public function fundings()
    {
        $fundings = Funding::all();

        return view('fundings.data', ['fundings'=>$fundings]);
    }

    public function kkbs()
    {
        $kkbs = Kkb::all();

        return view('kkbs.data', ['kkbs'=>$kkbs]);
    }

    public function retail_credits()
    {
        $retail_credits = RetailCredit::all();

        return view('retail_credits.data', ['retail_credits'=>$retail_credits]);
    }

    public function transactionals()
    {
        $transactionals = Transactional::all();

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
}
