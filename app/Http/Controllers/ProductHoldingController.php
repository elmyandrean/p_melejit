<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\ProductHolding;

class ProductHoldingController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('product_holdings.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('product_holdings.create');
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
            'name' => 'required',
            'menu' => 'required',
        ]);
        
        if ($validator->fails())
        {
            return response()->json([
                'status'=>'errors',
                'message'=>$validator->errors()->all(),
            ]);
        } else {
            $product_holding = new ProductHolding;
            $product_holding->name = $request->name;
            $product_holding->menu = $request->menu;

            $product_holding->save();
            
            return response()->json([
                'status'=>'success', 
                'message'=>'Record is successfully added',
            ]);
        }
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
        $product_holding = ProductHolding::find($id);

        return view('product_holdings.edit', ['product_holding'=>$product_holding]);
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
            'name' => 'required',
            'menu' => 'required',
        ]);
        
        if ($validator->fails())
        {
            return response()->json([
                'status'=>'errors',
                'message'=>$validator->errors()->all(),
            ]);
        } else {
            $product_holding = ProductHolding::find($id);
            $product_holding->name = $request->name;
            $product_holding->menu = $request->menu;

            $product_holding->save();
            
            return response()->json([
                'status'=>'success', 
                'message'=>'Record is successfully edited',
            ]);
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $product_holding = ProductHolding::where('id', '=', $id)->firstOrFail();

        $product_holding->delete();

        return response()->json([
            'status'=>'success', 
            'message'=>'Record is successfully deleted',
        ]);
    }
}
