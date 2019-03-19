<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;

class DataController extends Controller
{
    public function users()
    {
        $users = User::all();

        return view('users.data', ['users'=>$users]);
    }
}
