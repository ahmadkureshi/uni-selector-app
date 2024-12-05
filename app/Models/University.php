<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class University extends Model
{
    protected $fillable = [
        'user_id', 'name', 'email', 'phone', 'address', 'city'
    ];

    public function degreePrograms()
    {
        return $this->hasMany(DegreeProgram::class);
    }
}
