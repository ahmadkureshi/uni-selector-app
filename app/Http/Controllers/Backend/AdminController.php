<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\DegreeProgram;
use App\Models\University;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    public function dashboard(){

        // Paginate universities
        $universities = University::paginate(10, ['*'], 'university_page')
            ->withQueryString();

        // Paginate degree programs
        $degreePrograms = DegreeProgram::paginate(10, ['*'], 'degree_page')
            ->withQueryString();

        return view('pages.admin.dashboard', compact('universities', 'degreePrograms'));
    }
}
