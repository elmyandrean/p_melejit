<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\RetailCredit;
use App\ProductHolding;
use App\ProductContent;
use Auth;

class RetailCreditController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('retail_credits.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $product_holdings = ProductHolding::where(['status'=>'active', 'menu'=>'Kredit Retail'])->get();

        return view('retail_credits.create', ['product_holdings'=>$product_holdings]);
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
        ]);

        $retail_credit = new RetailCredit;
        $retail_credit->user_id = Auth::user()->id;
        $retail_credit->product_content_id = $request->product_content_id;
        $retail_credit->customer_name = $request->customer_name;
        $retail_credit->account_number = $request->account_number;
        $retail_credit->limit = $request->limit;
        $retail_credit->nominal = $request->nominal;

        $retail_credit->save();

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
        $retail_credit = RetailCredit::find($id);
        $product_holdings = ProductHolding::where(['menu'=>'Kredit Retail', 'status'=>'active'])->get();
        $product_contents = ProductContent::where(['product_holding_id'=>$retail_credit->product_content->product_holding_id, 'status'=>'active'])->get();

        return view('retail_credits.edit', ['retail_credit'=>$retail_credit, 'product_holdings'=>$product_holdings, 'product_contents'=>$product_contents]);
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
        ]);

        $retail_credit = RetailCredit::find($id);
        $retail_credit->user_id = Auth::user()->id;
        $retail_credit->product_content_id = $request->product_content_id;
        $retail_credit->customer_name = $request->customer_name;
        $retail_credit->account_number = $request->account_number;
        $retail_credit->limit = $request->limit;
        $retail_credit->nominal = $request->nominal;

        $retail_credit->save();

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
        $retail_credit = RetailCredit::find($id);

        $retail_credit->delete();

        return response()->json([
            'status'=>'success', 
            'message'=>'Record is successfully deleted',
        ]);
    }

    public function approve($id)
    {
        $retail_credit = RetailCredit::find($id);

        $retail_credit->status = 'approved';
        $retail_credit->save();

        return response()->json([
            'status'=>'success', 
            'message'=>'Record is successfully approved',
        ]);
    }
}
