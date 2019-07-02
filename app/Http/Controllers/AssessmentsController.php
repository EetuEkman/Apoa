<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Assessment;
use App\Group;
use App\User;

class AssessmentsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $assessments = Assessment::all();

        /* Tried to add the user to the assessment collection

        foreach($assessments as $key => $assessment)
        {
            $user = User::find($assessment['user_id']);
            $assessments[$key]['firstName'] = $user['firstName'];
            $assessments[$key]['lastName'] = $user['lastName'];
        }

        */

        // ToDo: Join the users first and last names based on the foreign key and pass to view


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
        $assessment = new Assessment();

        $assessment->request('title');
        $assessment->request('question');

        $assessment->save();

        return redirect('/assessments');
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
        $assessment = Assessment::findOrFail($id);

        $assessment->title = request('title');
        $assessment->question = request('question');

        $assessment->save();

        return redirect('/assessments');
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
        //
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
