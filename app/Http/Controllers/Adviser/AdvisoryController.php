<?php

namespace App\Http\Controllers\Adviser;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class AdvisoryController extends Controller
{
    public function maincontent(){
        return view('adviser.student_advisory', ["msg"=>"This is Student Advisory page"]);
    }
}
