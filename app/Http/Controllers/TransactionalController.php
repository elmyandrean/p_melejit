<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Transactional;
use App\ProductHolding;
use App\ProductContent;
use Auth;

class TransactionalController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('transactionals.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $product_holdings = ProductHolding::where(['status'=>'active', 'menu'=>'Transactional'])->get();

        return view('transactionals.create', ['product_holdings'=>$product_holdings]);
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
        ]);

        $transactional = new Transactional;
        $transactional->user_id = Auth::user()->id;
        $transactional->product_content_id = $request->product_content_id;
        $transactional->customer_name = $request->customer_name;
        $transactional->merchant_name = $request->merchant_name;
        $transactional->account_number = $request->account_number;
        $transactional->nominal = $request->nominal;

        $transactional->save();

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
        $transactional = Transactional::find($id);
        $product_holdings = ProductHolding::where(['menu'=>'Transactional', 'status'=>'active'])->get();
        $product_contents = ProductContent::where(['product_holding_id'=>$transactional->product_content->product_holding_id, 'status'=>'active'])->get();

        return view('transactionals.edit', ['transactional'=>$transactional, 'product_holdings'=>$product_holdings, 'product_contents'=>$product_contents]);
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
        ]);

        $transactional = Transactional::find($id);
        $transactional->user_id = Auth::user()->id;
        $transactional->product_content_id = $request->product_content_id;
        $transactional->customer_name = $request->customer_name;
        $transactional->merchant_name = $request->merchant_name;
        $transactional->account_number = $request->account_number;

        $transactional->save();

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
        $transactional = Transactional::find($id);

        $transactional->delete();

        return response()->json([
            'status'=>'success', 
            'message'=>'Record is successfully deleted',
        ]);
    }

    public function approve($id)
    {
        $transactional = Transactional::find($id);

        $transactional->status = 'approved';
        $transactional->save();

        return response()->json([
            'status'=>'success', 
            'message'=>'Record is successfully approved',
        ]);
    }
}
