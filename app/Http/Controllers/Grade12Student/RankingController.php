<?php

namespace App\Http\Controllers\Grade12Student;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class RankingController extends Controller
{
    public function maincontent(){
        return view('grade12student.honor_roll_ranking', ["msg"=>"This is Ranking page"]);
    }
}