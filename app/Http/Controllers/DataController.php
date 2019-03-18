<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;

class DataController extends Controller
{
    public function get_user()
    {
    		$users = User::all();

    		$response["status"] = "success";
    		$response["data"] = $users;

    		return $response;
    }
}
