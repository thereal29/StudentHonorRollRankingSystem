<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class EvaluationController extends Controller
{
    public function maincontent(){
        return view('admin.evaluation_setting', ["msg"=>"This is Evaluation page"]);
    }
}
