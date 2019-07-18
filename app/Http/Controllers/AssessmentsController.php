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
        //$assessments = Assessment::all();

        $assessments = Assessment::where('user_id', Auth::user()->id)->with('user')->get();

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
        request()->validate([
            'user_id' => 'required|integer',
            'title' => 'required',
            'body' => 'required'
        ]);

        $assessment = new Assessment();

        $assessment->request('title');
        $assessment->request('body');
        $assessment->request('user_id');

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

        return view('assessments/edit', [
            'assessment' => $assessment
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
        $assessment = Assessment::findOrFail($id);

        $assessment->title = request('title');
        $assessment->body = request('body');

        $assessment->save();

        return redirect('/assessments');
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
