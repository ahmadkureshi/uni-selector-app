<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\DegreeProgram;
use App\Models\University;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function dashboard(){

        // Total universities count
        $totalUniversities = University::count();

        // Total degree programs count
        $totalPrograms = DegreeProgram::count();

        return view('pages.user.dashboard', compact('totalUniversities', 'totalPrograms'));
    }
}
