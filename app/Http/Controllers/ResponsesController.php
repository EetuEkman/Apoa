<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Assessment;
use App\Response;
use App\User;

class ResponsesController extends Controller
{
    protected $redirectTo = '/home';

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
        $responses = Response::where('user_id', Auth::user()->id)->with('assessment')->get();

        return view('Responses\index', [
            'responses' => $responses,
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $assessments = Assessment::with('user:id,first_name,last_name')->get();

        return view('/responses/create', [
            'assessments' => $assessments
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
            'id' => 'required|integer',
            'assessment_id' => 'required|integer',
            'grade' => 'required|integer|between:1,5',
        ]);

        $user = User::findOrFail($request->id);
        $assessment = Assessment::findOrFail($request->assessment_id);

        $response = new Response();
        $response->grade = $request->grade;
        $response->body = $request->body;
        $response->user()->associate($user);
        $response->assessment()->associate($assessment);

        $response->save();

        return redirect('/home');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $response = Response::findOrFail($id);

        return view('/responses/index', [
            'responses' => [$response]
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
         $response = Response::findOrFail($id);

         return view('/responses/edit/', [
             'response' => $response
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
