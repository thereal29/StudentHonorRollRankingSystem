<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
class DashboardController extends Controller
{
    public function index(){
        $totalusers = User::count();
        $faculties = User::where('role', '2')->count();
        $students = User::where('role', '3')->where('role','4')->count();
        return view('admin.dashboard', compact('totalusers', 'faculties', 'students'));
    }
}
