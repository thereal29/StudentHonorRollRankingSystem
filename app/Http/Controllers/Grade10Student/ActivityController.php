<?php

namespace App\Http\Controllers\Grade10Student;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class ActivityController extends Controller
{
    public function maincontent(){
        return view('grade10student.co_curricular_activities', ["msg"=>"This is Activity page"]);
    }
}