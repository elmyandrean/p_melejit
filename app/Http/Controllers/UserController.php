<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view("users.index");
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view("users.create");
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $user = new User;
        $user->nip = $request->nip;
        $user->name = $request->nip;
        $user->email = $request->nip;
        $user->password = bcrypt('123456');
        $user->position = $request->position;

        if ($user->save()) {
            $response["status"] = "success";
            $response["message"] = "Data berhasil disimpan.";
        } else {
            $response["status"] = "error";
            $response["message"] = "Data gagal tersimpan.";
        }

        return $response;
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

        return view("users.edit", ['user'=>$user]);
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
        $user = User::find($id);
        $user->nip = $request->nip;
        $user->name = $request->name;
        $user->email = $request->email;
        $user->position = $request->position;

        if ($user->save()) {
            $response["status"] = "success";
            $response["message"] = "Data berhasil disimpan.";
        } else {
            $response["status"] = "error";
            $response["message"] = "Data gagal tersimpan.";
        }

        return $response;
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
