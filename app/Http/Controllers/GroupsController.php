<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Group;

class GroupsController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        if(auth()->user()->role_id == 2)
        {
            abort(403);
        }

        $groups = Group::all();

        return view('groups/index', [
            'groups' => $groups
        ]);
    }

    public function store(Request $request)
    {
        if($request->user()->role_id == 2)
        {
            abort(403);
        }

        request()->validate([
            'name' => ['required', 'min:5'],
            'description' => 'required',
            'year' => ['required', 'min:4', 'max:4'],
            'semester' => ['required', 'string']
        ]);

        $group = new Group();

        $group->name = request('name');
        $group->description = request('description');
        $group->year = request('year');
        $group->semester = request('semester');

        $group->save();

        return redirect('/groups')->with('added', 'Luokka lisätty.');
    }

    public function create()
    {
        if(auth()->user()->role_id == 2)
        {
            abort(403);
        }

        return view('/groups/create');
    }

    public function show($id)
    {
        if(auth()->user()->role_id == 2)
        {
            abort(403);
        }

        $group = Group::findOrFail($id);

        return view('/groups/index', [
            'groups' => [$group]
        ]);
    }

    public function update(Request $request, $id)
    {
        if($request->user()->role_id == 2)
        {
            abort(403);
        }

        $group = Group::findOrFail($id);

        request()->validate([
            'name' => ['required', 'min:5'],
            'description' => 'required',
            'year' => ['required', 'min:4', 'max:4'],
            'semester' => ['required', 'min:5']
        ]);

        $group->name = request('name');
        $group->description = request('description');
        $group->year = request('year');
        $group->semester = request('semester');

        $group->save();

        return redirect('/groups')->with('edited', 'Luokka muokattu.');
    }

    // Delete functionality disabled.
    /*
    public function destroy($id)
    {
        if(auth()->user()->role_id == 2)
        {
            abort(403);
        }

        $group = Group::findOrFail($id);

        $group->delete();

        return redirect('/groups');
    }
    */

    public function edit($id)
    {
        if(auth()->user()->role_id == 2)
        {
            abort(403);
        }

        $group = Group::findOrFail($id);

        return view('groups/edit', [
            'group' => $group
        ]);
    }
}
