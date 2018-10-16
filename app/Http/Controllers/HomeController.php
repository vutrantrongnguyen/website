<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        // $this->middleware('auth');


    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function show()
    {
        return view('tasks.show', compact('gigido'));
    }
    public function index()
    {
        return view('index');
    }

    public function demo()
    {
        return view('jvscript');
    }

    public function ajax()
    {
        return "ajax:first test";
    }
}
