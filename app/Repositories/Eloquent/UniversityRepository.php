<?php

namespace App\Repositories\Eloquent;

use App\Models\University;
use App\Repositories\Interfaces\UniversityRepositoryInterface;

class UniversityRepository implements UniversityRepositoryInterface
{
    public function getAll()
    {
        return University::paginate(10);
    }

    public function findById($id)
    {
        return University::findOrFail($id);
    }

    public function create(array $data)
    {
        return University::create($data);
    }

    public function update($id, array $data)
    {
        $university = University::findOrFail($id);
        $university->update($data);
        return $university;
    }

    public function delete($id)
    {
        $university = University::findOrFail($id);
        return $university->delete();
    }
}
