<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Job;

class LikesController extends Controller
{
    public function upVote(Job $job)
    {
        $job->upVoteAndSave();
        return redirect()->action('JobsController@index');
    }

    public function downVote(Job $job)
    {
        $job->downVoteAndSave();
        return redirect()->action('JobsController@index');
    }
}
