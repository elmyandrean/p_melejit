<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use Validator;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $users = User::all();
        return view('users.index', ['users'=>$users]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('users.create');
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
            'nip' => 'required',
            'name' => 'required',
            'email' => 'required|email',
            'phone' => 'required',
            'position' => 'required',
        ]);
        
        if ($validator->fails())
        {
            return response()->json([
                'status'=>'errors',
                'message'=>$validator->errors()->all(),
            ]);
        } else {
            $user = new User;
            $user->nip = $request->nip;
            $user->name = $request->name;
            $user->email = $request->email;
            $user->phone = $request->phone;
            $user->password = bcrypt('123456');
            $user->position = $request->position;

            $user->save();
            
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
        $user = User::find($id);

        return view('users.edit', ['user'=>$user]);
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
            'nip' => 'required',
            'name' => 'required',
            'email' => 'required|email',
            'phone' => 'required',
            'position' => 'required',
        ]);
        
        if ($validator->fails())
        {
            return response()->json([
                'status'=>'errors',
                'message'=>$validator->errors()->all(),
            ]);
        } else {
            $user = User::find($id);
            $user->nip = $request->nip;
            $user->name = $request->name;
            $user->email = $request->email;
            $user->phone = $request->phone;
            $user->position = $request->position;

            $user->save();
            
            return response()->json([
                'status'=>'success', 
                'message'=>'Record is successfully added',
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
        //
    }
}
