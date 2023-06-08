<?php

namespace App\Http\Controllers\Grade10Student;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class EvaluationController extends Controller
{
    public function maincontent(){
        return view('grade10student.peer_evaluation', ["msg"=>"This is Evaluation page"]);
    }
}
