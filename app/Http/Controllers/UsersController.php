<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\User;
use App\Role;
use App\Group;
use function Sodium\add;

class UsersController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        $users = User::with('role', 'groups')->get();

        return view('users/index', [
            'users' => $users
        ]);
    }

    public function edit($id)
    {
        $user = User::findOrFail($id);
        $groups = Group::all();

        return view('users/edit', [
            'user' => $user,
            'groups' => $groups
        ]);
    }

    public function update(Request $request, $id) {
        $validatedData = $request->validate([
            'first_name' => 'alpha',
            'last_name' => 'alpha',
            'group' => 'required|array',
            'password' => ['string', 'min:5', 'confirmed'],
        ]);

        $user = User::findOrFail($id);

        $user->first_name = $request->first_name;

        $user->last_name = $request->last_name;

        $groups = $user->groups()->select('group_id')->get()->toArray();

        $groupIds = array_map(function($element) {
            return (String)$element['group_id'];
        }, $groups);

        dd($groupIds, $request->group);

        /*
        $groupIds = $groups->map(function($item, $key) {
            return item->
        });
        */

        $user->groups()->detach();

        foreach($request->group as $element)
        {
            $group = Group::find($element);

            $user->groups()->attach($group);
        }

        $user->save();
    }
}

