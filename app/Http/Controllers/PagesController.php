<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PagesController extends Controller
{
    public function index()
    {
        return view('pages.index');
    }

    public function about()
    {
        return view('pages.about');
    }

    public function services()
    {
        $data = array(
            'title' => 'Services',
            'services' => ['Bussiness sales', 'Job Listing']
        );
        return view('pages.services')->with($data);
    }
    public function lounge()
    {
        return view('jobs.lounge');
    }

    public function noPgaeRedirect()
    {
        return view('include.noPgaeRedirect');
    }
}
