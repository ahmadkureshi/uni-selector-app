<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class DegreeProgram extends Model
{
    protected $fillable = [
        'university_id', 'title', 'last_year_merit', 'fee'
    ];

    public function university()
    {
        return $this->belongsTo(University::class);
    }
}
