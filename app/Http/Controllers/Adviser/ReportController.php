<?php

namespace App\Http\Controllers\Adviser;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class ReportController extends Controller
{
    public function maincontent(){
        return view('adviser.honor_roll_reports', ["msg"=>"This is report page"]);
    }
}
