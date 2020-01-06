<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;


use Illuminate\Http\Request;
use App\Job;

class JobsController extends Controller
{
    public function index()
    {


        // Reference for the following code:
        // Laravel 5.3 Pagination with Filters, Part 2
        //Saeed Prez
        // Published: Jan 4, 2017
        //Retrieved: 27/12/2019
        //Youtube
        //https://youtu.be/IcLaNHxGTrs?t=227


        //This code makes it easy to add/remove filters.

        $jobs = new Job;
        $queries = [];                  //Make an empty array for  filters that will be passed through query. This include the 'sort' queries

        $columns = [                    //Make an array for filters that will be shown
            'job_type', 'created_at',
        ];

        foreach ($columns as $column) {    //Loop through $column array and apply all filters
            if (request()->has($column)) { //Here, we are passing an array of filters instead of passing one filter at a time. Another way of doing this would be to add more 'if's, but the code would be a lot longer.
                $jobs = $jobs->where($column, request($column));
                $queries[$column] = request($column);
            }
        }

        if (request()->has('sort')) {      //apply 'sort' if requested
            $jobs = $jobs->orderBy('created_at', request('sort')); //Order  by what ever comes after 'sort' in the request url. such as '/?sort=asc'
            $queries['sort'] = request('sort');  //Add requested sort entry 'asc & desc' to queries array.
        } else {
            $jobs = $jobs->orderBy('created_at', 'desc');  //else, just show the latest first
        }

        $jobs = $jobs->paginate(5)->appends($queries); //Paginate but also retain filters when changing pages. Made easy with laravel's 'appends' method
        return view('jobs.index')->with('jobs', $jobs);
    }


    public function create()
    {
        $jobType = [ //an array that will be called from create form
            'Full-time', 'Part-time', 'apprenticeship'
        ];

        return view('jobs.create')->with('jobType', $jobType);
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
        if (Auth::user() != $job->user) {   ##Check if user owns the post. User can only edit own posts
            return redirect('/jobs')->with('failed', 'Unauthorized action!!');
        }

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
        return redirect()->back()->with('success', 'Job removed successfully!');
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



        // Making mysql query
        $query = $request->input('query');
        $jobs = Job::where('title', 'like', "%$query%")->paginate(5); //using sql wildcards '% %' to search database for matching columns
        return view("jobs.searchResults")->with('jobs', $jobs);
        //End of ref
    }
}
