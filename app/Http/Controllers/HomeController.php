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
    public function __construct() {
        //$this->middleware('auth');
    }
   

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    // public function index() {
    //     return view('home', ["msg"=>"I am the Admin"]);
    // }
    public function admin()
    {
        return view('admin.dashboard', ["msg"=>"I am the Admin"]);
    }
    public function faculty()
    {
        return view('adviser.dashboard', ["msg"=>"I am the Adviser"]);
    }
    public function user1()
    {
        return view('grade10student.dashboard', ["msg"=>"I am a Grade 10 student"]);
    }
    public function user2()
    {
        return view('grade12student.dashboard', ["msg"=>"I am a Grade 12 student"]);
    }
}
