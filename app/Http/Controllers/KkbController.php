<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Kkb;
use App\ProductHolding;
use App\ProductContent;
use Auth;

class KkbController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('kkbs.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $product_holdings = ProductHolding::where(['status'=>'active', 'menu'=>'KKB'])->get();

        return view('kkbs.create', ['product_holdings'=>$product_holdings]);
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
            'condition' => 'required',
        ]);

        $kkb = new Kkb;
        $kkb->user_id = Auth::user()->id;
        $kkb->product_content_id = $request->product_content_id;
        $kkb->customer_name = $request->customer_name;
        $kkb->unit = $request->unit;
        $kkb->nominal = $request->nominal;
        $kkb->date_serve = date('Y-m-d', strtotime($request->date_serve));
        $kkb->condition = $request->condition;

        $kkb->save();

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
        $kkb = Kkb::find($id);
        $product_holdings = ProductHolding::where(['menu'=>'KKB', 'status'=>'active'])->get();
        $product_contents = ProductContent::where(['product_holding_id'=>$kkb->product_content->product_holding_id, 'status'=>'active'])->get();

        return view('kkbs.edit', ['kkb'=>$kkb, 'product_holdings'=>$product_holdings, 'product_contents'=>$product_contents]);
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
            'condition' => 'required',
        ]);

        $kkb = Kkb::find($id);
        $kkb->user_id = Auth::user()->id;
        $kkb->product_content_id = $request->product_content_id;
        $kkb->customer_name = $request->customer_name;
        $kkb->unit = $request->unit;
        $kkb->nominal = $request->nominal;
        $kkb->date_serve = date('Y-m-d', strtotime($request->date_serve));
        $kkb->condition = $request->condition;

        $kkb->save();

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
        $kkb = Kkb::find($id);

        $kkb->delete();

        return response()->json([
            'status'=>'success', 
            'message'=>'Record is successfully deleted',
        ]);
    }

    public function approve($id)
    {
        $kkb = Kkb::find($id);

        $kkb->status = 'Approved';
        $kkb->save();

        return response()->json([
            'status'=>'success', 
            'message'=>'Record is successfully approved',
        ]);
    }
}
