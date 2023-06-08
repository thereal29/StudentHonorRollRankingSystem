<?php

namespace App\Http\Controllers\Adviser;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class RecordController extends Controller
{
    public function maincontent(){
        return view('adviser.academic_record', ["msg"=>"This is report page"]);
    }
}
