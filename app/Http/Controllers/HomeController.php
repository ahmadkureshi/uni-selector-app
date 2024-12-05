<?php

namespace App\Http\Controllers;

use App\Models\University;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function home(){

        // Fetch universities with degree counts
        $universities = University::withCount('degreePrograms')->get();

        // Pass universities to the view
        return view('pages.home', compact('universities'));
    }

    public function meritFor(Request $request, $uni)
    {
        // Get the university
        $university = University::whereId($uni)->with('degreePrograms')->first();

        if (is_null($university)) {
            return redirect()->route('home');
        }

        // Get the user's marks from the query string
        $userMarks = $request->input('your_marks', null);

        // Separate programs into "High Chances" and "Low Chances"
        $highChances = collect();
        $lowChances = collect();

        if ($userMarks !== null) {
            // Filter programs based on user's marks greater or equal to last_year_merit
            $highChances = $university->degreePrograms
                ->filter(fn($program) => $userMarks >= $program->last_year_merit)
                ->take(5);

            // Filter programs based on user's marks less than last_year_merit
            $lowChances = $university->degreePrograms
                ->filter(fn($program) => $userMarks < $program->last_year_merit)
                ->take(5);
        }

        // If no matches are available
        if ($highChances->isEmpty()) {
            $highChances = $university->degreePrograms
                ->sortBy('last_year_merit')
                ->take(5);
        }

        // If no matches are available
        if ($lowChances->isEmpty()) {
            $lowChances = $university->degreePrograms
                ->sortByDesc('last_year_merit')
                ->take(5);
        }

        return view('pages.merit-for', compact('university', 'highChances', 'lowChances', 'userMarks'));
    }

}
