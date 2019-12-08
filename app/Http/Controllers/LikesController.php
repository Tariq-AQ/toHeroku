<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class LikesController extends Controller
{
    public function upVote(Comment $comment)
    {
        $comment->upVoteAndSave();
        return redirect()->action('CommentController@index');
    }
}
