<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\User;
use App\Role;
use App\Group;
use Validator;
use Hash;

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

    public function update(Request $request, $id)
    {
        $validatedData = $request->validate([
            'first_name' => 'alpha',
            'last_name' => 'alpha',
            'group' => 'required|array',
            'password' => ['string', 'min:5', 'confirmed'],
        ]);

        $user = User::findOrFail($id);

        $user->first_name = $request->first_name;

        $user->last_name = $request->last_name;

        // Get the array of group ids from the groups the user is part of.

        $groups = $user->groups()->select('group_id')->get()->toArray();

        $groupIds = array_map(function ($element) {
            return (String)$element['group_id'];
        }, $groups);

        // Only detach and attach the groups if the users groups were changed.

        $difference = array_diff($groupIds, $request->group);

        if (count($difference) > 0)
        {
            $user->groups()->detach();

            foreach ($request->group as $element) {
                $group = Group::find($element);

                $user->groups()->attach($group);
            }
        }

        $user->save();

        return redirect('/users/'.$id."/edit")->with('changed', 'Muutokset tallennettu.');
    }

    public function changePasswordForm(Request $request, $id)
    {
        return view('users/password');
    }

    public function changePassword(Request $request, $id)
    {
        $validator = Validator::make($request->all(), [
            'password' => 'required',
            'newPassword' => 'required|string|min:6|confirmed'
        ]);

        if ($validator->fails()) {
            return redirect('users/'.$id.'/password')
                ->withErrors($validator)
                ->withInput();
        }

        if (!(Hash::check($request->get('password'), Auth::user()->password))) {
            return redirect()->back()->with('mismatch', 'Väärä salasana.');
        }

        if(strcmp($request->get('password'), $request->get('newPassword')) == 0){
            return redirect()->back()->with("duplicate", "Uusi salasana ei voi olla sama kuin nykyinen salasana.");
        }

        $user = Auth::user();
        $user->password = bcrypt( $request->get('newPassword'));
        $user->save();

        return redirect('/users/'.$id.'/edit')->with('success', 'Salasana vaihdettu.');
    }
}

