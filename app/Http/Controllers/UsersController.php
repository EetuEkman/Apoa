<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\User;
use App\Role;

class UsersController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        $users = User::with('role')->get();

        return view('users/index', [
            'users' => $users
        ]);
    }

    public function edit($id)
    {
        $user = User::findOrFail($id);
        $groups = Groups::all();

        return view('users/edit', [
            'user' => $user,
            'groups' => $groups
        ]);
    }
}

