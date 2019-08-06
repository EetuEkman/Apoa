<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;

class StudentsController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        //Get the groups with the user
        //with their users excluding the user.
        $groups = User::find(auth()->user()->id)->groups()
            ->with(['users' => function($query) {
                $query->where('user_id', '!=', auth()->user()->id)
                    ->select('user_id', 'role_id','email', 'first_name', 'last_name');
                }, 'users.role' => function($query) {
                    $query->select('id', 'name');
                }]);

        return view('/students/index', [
            'groups' => $groups->get()
        ]);
    }

    public function show($id)
    {
        $user = User::findOrFail($id);

        $responses = $user->responses()->with('assessment')->get();

        return view('/students/responses', [
            'user' => $user,
            'responses' => $responses
        ]);
    }
}
