<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Funding;
use App\ProductHolding;
use App\ProductContent;
use Auth;

class FundingController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $fundings = Funding::all();

        return view('fundings.index', ['fundings'=>$fundings]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $product_holdings = ProductHolding::where(['status'=>'active', 'menu'=>'Funding'])->get();

        return view('fundings.create', ['product_holdings'=>$product_holdings]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validator = \Validator::make($request->all(), [
            'product_content_id' => 'required',
            'customer_name' => 'required',
            'deposit' => 'required',
            'date_serve' => 'required',
            'condition' => 'required',
        ]);

        $funding = new Funding;
        $funding->user_id = Auth::user()->id;
        $funding->product_content_id = $request->product_content_id;
        $funding->customer_name = $request->customer_name;
        $funding->account_number = $request->account_number;
        $funding->other = $request->other;
        $funding->deposit = $request->deposit;
        $funding->date_serve = date('Y-m-d', strtotime($request->date_serve));
        $funding->condition = $request->condition;

        $funding->save();

        return response()->json([
            'status'=>'success', 
            'message'=>'Record is successfully added',
        ]);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $funding = Funding::find($id);
        $product_holdings = ProductHolding::where(['menu'=>'Funding', 'status'=>'active'])->get();
        $product_contents = ProductContent::where(['product_holding_id'=>$funding->product_content->product_holding_id, 'status'=>'active'])->get();

        return view('fundings.edit', ['funding'=>$funding, 'product_holdings'=>$product_holdings, 'product_contents'=>$product_contents]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $validator = \Validator::make($request->all(), [
            'product_content_id' => 'required',
            'customer_name' => 'required',
            'deposit' => 'required',
            'date_serve' => 'required',
            'condition' => 'required',
        ]);

        $funding = Funding::find($id);
        $funding->user_id = Auth::user()->id;
        $funding->product_content_id = $request->product_content_id;
        $funding->customer_name = $request->customer_name;
        $funding->account_number = $request->account_number;
        $funding->other = $request->other;
        $funding->deposit = $request->deposit;
        $funding->date_serve = date('Y-m-d', strtotime($request->date_serve));
        $funding->condition = $request->condition;

        $funding->save();

        return response()->json([
            'status'=>'success', 
            'message'=>'Record is successfully updated',
        ]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $funding = Funding::findOrFail($id);

        $funding->delete();

        return response()->json([
            'status'=>'success', 
            'message'=>'Record is successfully deleted',
        ]);
    }

    public function approve($id)
    {
        $funding = Funding::findOrFail($id);
        
        $funding->status = 'Approved';
        $funding->save();

        return response()->json([
            'status'=>'success', 
            'message'=>'Record is successfully approved',
        ]);
    }
}
