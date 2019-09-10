<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
<<<<<<< HEAD
use DB;
=======
>>>>>>> ff0675d14c7eb1043c2b4e8148c73b2957f55b9c

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

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
<<<<<<< HEAD
        $about_us = DB::table('about_uses')->first();
        session(["about_us"=>$about_us]);
=======
>>>>>>> ff0675d14c7eb1043c2b4e8148c73b2957f55b9c
        return view('admin.adminpage');
    }
}
