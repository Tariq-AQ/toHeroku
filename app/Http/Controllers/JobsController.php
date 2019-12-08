<?php

namespace App\Http\Controllers;



use Illuminate\Http\Request;
use App\Job;
use DB;

class JobsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // $jobb = Job::all();
        $jobs = Job::orderBy('created_at', 'desc')->paginate(5);
        return view('jobs.index')->with('job', $jobs);
    }


    public function create()
    {
        return view('jobs.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //Only submit when data is input
        $this->validate($request, [
            'title' => 'required',
            'body' => 'required'
        ]);
        //using tinker t write to database
        $job = new Job;
        $job->title = $request->input('title');
        $job->body = $request->input('body');
        $job->save();

        return redirect('/jobs')->with('success', 'Job was successfully added!');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $job = Job::find($id);
        return view('jobs.show')->with('job', $job);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $job = Job::find($id);
        return view('jobs.edit')->with('job', $job);
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
        //Only submit when data is input
        $this->validate($request, [
            'title' => 'required',
            'body' => 'required'
        ]);
        //using tinker t write to database
        $job = Job::find($id);
        $job->title = $request->input('title');
        $job->body = $request->input('body');
        $job->save();

        return redirect('/jobs')->with('success', 'Job was successfully updated!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $job = job::find($id);
        $job->delete();
        return redirect('/jobs')->with('success', 'Job removed successfully!');
    }
}
