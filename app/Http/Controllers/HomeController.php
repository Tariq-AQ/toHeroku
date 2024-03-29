<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;

use DB;


class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    // Show list of jobs that belong to the user
    public function index()
    {
        $user_id = auth()->user()->id;
        $user = User::find($user_id);
        return view('home')->with('jobs', $user->jobs);
    }
}
