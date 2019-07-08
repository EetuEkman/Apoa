<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\Role;

class UsersController extends Controller
{
    public function index()
    {
        //$users = \App\User::all();
        $users = User::with('role')->get();

        return view('users/index', [
            'users' => $users
        ]);
    }
}

//$assessments = Assessment::where('user_id', Auth::user()->id)->with('user')->get();