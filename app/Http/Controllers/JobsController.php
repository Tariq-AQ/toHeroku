<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;


use Illuminate\Http\Request;
use App\Job;

class JobsController extends Controller
{
    public function index()
    {
        if (request()->has('likes')) {
            $jobs = Job::where('likes', request('likes'))->paginate(5);
        } else {

            $jobs = Job::orderBy('created_at', 'desc')->paginate(5);
            return view('jobs.index')->with('job', $jobs);
        }
    }

    public function lounge()
    {
        return view('jobs.lounge');
    }

    public function create()
    {
        return view('jobs.create');
    }




    public function store(Request $request)
    {
        //Only submit when data is input and min requirments are met
        $this->validate($request, [
            'title' => 'required|min:3',
            'body' => 'required|min:10'
        ]);
        //using tinker to write to database
        $job = new Job;
        $job->title = $request->input('title');
        $job->body = $request->input('body');
        $job->user_id = auth()->user()->id;
        $job->likes = 0;
        $job->save();

        return redirect('/jobs')->with('success', 'Job was successfully added!');
    }





    public function show($id)
    {
        $job = Job::find($id);
        return view('jobs.show')->with('job', $job);
    }



    public function edit($id)
    {
        $job = Job::find($id);
        return view('jobs.edit')->with('job', $job);
    }


    public function update(Request $request, $id)
    {
        //Only submit when data is input
        $this->validate($request, [
            'title' => 'required',
            'body' => 'required'
        ]);
        //using tinker to write to database
        $job = Job::find($id);
        $job->title = $request->input('title');
        $job->body = $request->input('body');
        $job->save();

        return redirect('/jobs')->with('success', 'Job was successfully updated!');
    }



    public function destroy($id)
    {
        $job = Job::find($id);
        if (Auth::user() != $job->user) {   ##Check if user owns the post. User can only delete own posts
            return redirect('/jobs')->with('failed', 'Unauthorized action!!');
        }
        $job->delete();
        return redirect('/jobs')->with('success', 'Job removed successfully!');
    }





    public function like($id)
    {
        return $id;
    }




    public function search(Request $request)
    {
        // Validating the search box input. there must be a query and it has to be at least three chars
        //Reference for the following search - validation
        //Andre Madarang
        //2018
        //Youtube
        //https://www.youtube.com/watch?v=rsHO-RRwIH8

        $request->validate([
            'query' => 'required|min:3',
        ]);



        // Making mysql enquiry
        $query = $request->input('query');
        $job = Job::where('title', 'like', "%$query%")->paginate(5); //using sql wildcards '% %' to search database for matching columns
        return view("jobs.searchResults")->with('job', $job);
        //End of ref
    }


    public function likes()
    {
        $like = Job::find('likes')->get();
        return view('include.jobLoop')->with('like', $like);
    }

    public function noPgaeRedirect()
    {
        return view('include.noPgaeRedirect');
    }
}
