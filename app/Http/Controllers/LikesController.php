<?php

namespace App\Http\Controllers;

use App\Job;
use App\LikedItems;


use Illuminate\Http\Request;

class LikesController extends Controller
{


    public function upVote(Job $job)
    {

        $job->upvoteAndSave();

        return redirect()->action('JobsController@index');
    }

    public function downVote(Job $job)
    {

        $job->downvoteAndSave();

        return redirect()->action('JobsController@index');
    }
}
