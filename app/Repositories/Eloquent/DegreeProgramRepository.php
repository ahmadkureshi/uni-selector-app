<?php

namespace App\Repositories\Eloquent;

use App\Models\DegreeProgram;
use App\Repositories\Interfaces\DegreeProgramRepositoryInterface;

class DegreeProgramRepository implements DegreeProgramRepositoryInterface
{
    public function getAll()
    {
        return DegreeProgram::with('university')->paginate(10);
    }

    public function findById($id)
    {
        return DegreeProgram::findOrFail($id);
    }

    public function create(array $data)
    {
        return DegreeProgram::create($data);
    }

    public function update($id, array $data)
    {
        $degreeProgram = DegreeProgram::findOrFail($id);
        $degreeProgram->update($data);
        return $degreeProgram;
    }

    public function delete($id)
    {
        $degreeProgram = DegreeProgram::findOrFail($id);
        return $degreeProgram->delete();
    }
}
