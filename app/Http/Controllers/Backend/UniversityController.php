<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Http\Requests\UniversityRequest;
use App\Repositories\Interfaces\UniversityRepositoryInterface;
use Illuminate\Http\Request;

class UniversityController extends Controller
{
    protected $universityRepository;

    // Constructor injection for the repository
    public function __construct(UniversityRepositoryInterface $universityRepository)
    {
        $this->universityRepository = $universityRepository;
    }

    // List universities with pagination
    public function index()
    {
        $universities = $this->universityRepository->getAll();
        return view('pages.admin.universities.index', compact('universities'));
    }

    // Show the create form for a new university
    public function create()
    {
        return view('pages.admin.universities.create');
    }

    // Store a new university
    public function store(UniversityRequest $request)
    {
        try {
            $data = $request->validated();
            $data['user_id'] = auth()->id();

            $this->universityRepository->create($data);

            // Redirect back with success message
            return redirect()->route('backend.universities.index')->with('success', 'University created successfully.');
        } catch (\Exception $e) {

            // Redirect back with error message
            return redirect()->back()->withInput()->with('error', 'An error occurred while creating the university. Please try again or report to site admin.');
        }
    }


    // Show the form for editing the university
    public function edit($id)
    {
        $university = $this->universityRepository->findById($id);
        return view('pages.admin.universities.edit', compact('university'));
    }

    // Update the university
    public function update(UniversityRequest $request, $id)
    {
        try{
            $this->universityRepository->update($id, $request->validated());

            // Redirect back with success message
            return redirect()->route('backend.universities.index')->with('success', 'University updated successfully.');
        }catch (\Exception $exception){

            // Redirect back with error message
            return redirect()->back()->withInput()->with('error', 'An error occurred while updating the university. Please try again or report to site admin.');
        }

    }

    // Delete the university
    public function destroy($id)
    {
        try{
            $this->universityRepository->delete($id);

            // Redirect back with success message
            return redirect()->route('backend.universities.index')->with('success', 'University deleted successfully.');
        }catch (\Exception $exception){
            // Redirect back with error message
            return redirect()->back()->with('error', 'An error occurred. Please try again or report to site admin.');
        }
    }
}

