<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Http\Requests\DegreeProgramRequest;
use App\Repositories\Interfaces\DegreeProgramRepositoryInterface;
use App\Repositories\Interfaces\UniversityRepositoryInterface;
use Illuminate\Http\Request;

class DegreeProgramController extends Controller
{
    protected $degreeProgramRepository;
    protected $universityRepository;

    // Constructor injection for repositories
    public function __construct(
        DegreeProgramRepositoryInterface $degreeProgramRepository,
        UniversityRepositoryInterface $universityRepository
    ) {
        $this->degreeProgramRepository = $degreeProgramRepository;
        $this->universityRepository = $universityRepository;
    }

    // List degree programs
    public function index()
    {
        $degreePrograms = $this->degreeProgramRepository->getAll();
        return view('pages.admin.degree_programs.index', compact('degreePrograms'));
    }

    // Show the form for creating a new degree program
    public function create()
    {
        $universities = $this->universityRepository->getAll();
        return view('pages.admin.degree_programs.create', compact('universities'));
    }

    // Store a newly created degree program
    public function store(DegreeProgramRequest $request)
    {
        try{
            $this->degreeProgramRepository->create($request->validated());
            return redirect()->route('backend.degree-programs.index')->with('success', 'Degree Program created successfully.');
        }catch (\Exception $exception){
            // Redirect back with error message
            return redirect()->back()->withInput()->with('error', 'An error occurred while creating the degree program. Please try again or report to site admin.');
        }
    }

    // Show the form for editing the degree program
    public function edit($id)
    {

        $degreeProgram = $this->degreeProgramRepository->findById($id);
        $universities = $this->universityRepository->getAll();
        return view('pages.admin.degree_programs.edit', compact('degreeProgram', 'universities'));
    }

    // Update the degree program
    public function update(DegreeProgramRequest $request, $id)
    {
        try{
            $this->degreeProgramRepository->update($id, $request->validated());
            return redirect()->route('backend.degree-programs.index')->with('success', 'Degree Program updated successfully.');
        }catch (\Exception $exception){
            // Redirect back with error message
            return redirect()->back()->withInput()->with('error', 'An error occurred while updating the degree program. Please try again or report to site admin.');
        }
    }

    // Delete the degree program
    public function destroy($id)
    {
        try{
            $this->degreeProgramRepository->delete($id);
            return redirect()->route('backend.degree-programs.index')->with('success', 'Degree Program deleted successfully.');
        }catch (\Exception $exception){
            // Redirect back with error message
            return redirect()->back()->with('error', 'An error occurred. Please try again or report to site admin.');
        }
    }
}

