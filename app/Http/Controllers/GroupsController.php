<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Group;

class GroupsController extends Controller
{
    public function index()
    {
        $groups = Group::all();

        return view('groups/index', [
            'groups' => $groups
        ]);
    }

    public function store()
    {
        request()->validate([
            'name' => ['required', 'min:5'],
            'description' => 'required',
            'year' => ['required', 'min:4', 'max:4'],
            'semester' => ['required', 'min:5']
        ]);

        $group = new Group();

        $group->name = request('name');
        $group->description = request('description');
        $group->year = request('year');
        $group->semester = request('semester');

        $group->save();

        return redirect('/groups');
    }

    public function create()
    {
        return view('/groups/create');
    }

    public function show($id)
    {
        $group = Group::findOrFail($id);

        return view('/groups/index', [
            'groups' => [$group]
        ]);
    }

    public function update($id)
    {
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

        return redirect('/groups');
    }

    public function destroy($id)
    {
        $group = Group::findOrFail($id);

        $group->delete();

        return redirect('/groups');
    }

    public function edit($id)
    {
        $group = Group::findOrFail($id);

        return view('groups/edit', [
            'group' => $group
        ]);
    }
}
