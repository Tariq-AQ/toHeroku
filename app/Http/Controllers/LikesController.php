<?php

namespace App\Http\Controllers;

use App\Job;
use Illuminate\Support\Facades\Auth;




use Illuminate\Http\Request;

class LikesController extends Controller
{


    public function upVote(Job $job)
    {

        if (!Auth::check()) { //Check if user is loged in before being able to like.

            return view('auth.login');  //if not logged in redirect them to login page.
        } else {                        //else let them like
            $job->upvoteAndSave();
            return redirect()->back();  //stay on current page after like
        }
    }

    public function downVote(Job $job)
    {

        if (!Auth::check()) {

            return view('auth.login');
        } else {

            $job->downvoteAndSave();
            return redirect()->back(); //stay on current page after like
        }
    }
}
