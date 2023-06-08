<?php

namespace App\Http\Controllers\Adviser;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class ProfileController extends Controller
{
    public function admin()
    {
        return view('admin.profile', ["msg"=>"I am the Admin"]);
    }
    public function faculty()
    {
        return view('adviser.profile', ["msg"=>"I am the Adviser"]);
    }
    public function user1()
    {
        return view('grade10student.profile', ["msg"=>"I am a Grade 10 student"]);
    }
    public function user2()
    {
        return view('grade12student.profile', ["msg"=>"I am a Grade 12 student"]);
    }
}
