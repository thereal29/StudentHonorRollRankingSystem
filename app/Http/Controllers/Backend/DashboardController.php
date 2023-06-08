<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function admin()
    {
       // return view('home', ["msg"=>"I am the Admin"]);
       echo 'welcome to admin';
    }
    public function adviser()
    {
       // return view('home', ["msg"=>"I am the Adviser"]);
       echo 'welcome to adviser';
    }
    public function grade10()
    {
       // return view('home', ["msg"=>"I am a Grade 10 student"]);
       echo 'welcome to grade 10';
    }
    public function grade12()
    {
       // return view('home', ["msg"=>"I am a Grade 12 student"]);
       echo 'welcome to grade 12';
    }
}
