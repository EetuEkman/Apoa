<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Assessment;
use App\Group;
use App\User;

class AssessmentsController extends Controller
{
    function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $assessments = Assessment::with('user:id,first_name,last_name', 'groups:group_id,name')->get();

        return view('assessments/index', [
            'assessments' => $assessments,
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $groups = Group::all();

        return view('assessments/create', [
            'groups' => $groups
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'userId' => 'required|integer',
            'title' => 'required|string',
            'body' => 'required|string',
            'groups' => 'array'
        ]);

        $assessment = new Assessment();

        $assessment->title = request('title');
        $assessment->body = request('body');
        $assessment->user_id = request('userId');

        $assessment->save();

        $groupIds = request('groups');

        if(is_null($groupIds) === false)
        {
            foreach($groupIds as $groupId)
            {
                $group = Group::findOrFail($groupId);

                $group->assessments()->attach($assessment);
            }
        }

        return redirect('/assessments')->with('added', 'Arviointi lisätty.');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $assessment = Assessment::findOrFail($id);

        return view('/assessments', [
            'assessments' => [$assessment]
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $assessment = Assessment::where('id', $id)->with('groups:group_id,name')->first();
        $groups = Group::all();

        return view('assessments/edit', [
            'assessment' => $assessment,
            'groups' => $groups
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $validatedData = $request->validate([
            'title' => 'required|string',
            'body' => 'required|string',
            'group' => 'array'
        ]);

        $assessment = Assessment::findOrFail($id);

        $assessment->title = request('title');
        $assessment->body = request('body');

        $assessment->save();

        // Check if the assessments groups were changed
        // and only detach and attach groups if the groups were changed.

        $groups = $assessment->groups()->select('group_id')->get()->toArray();

        $groupIds = array_map(function($element) {
            return (String)$element['group_id'];
        }, $groups);

        if(count(array_diff($groupIds, $request->groups)) != 0)
        {
            $assessment->groups()->detach();

            foreach($request->group as $element)
            {
                $assessment->groups()->attach(Group::find($element));
            }
        }

        return redirect('/assessments')->with('edited', 'Arviointi muokattu.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
