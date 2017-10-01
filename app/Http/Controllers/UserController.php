<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;

class UserController extends Controller
{
    public function index(Request $request)
    {
        $users = User::all();
        // return $users;
        return view("users.index")->with('users', $users);
    }

    public function getUser( Request $request, $id)
    {
        $users = User::find($id);
        return $users;
    }
}
