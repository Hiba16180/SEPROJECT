<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\Course;

class Resource extends Model
{
    protected $fillable = [
        'course_id', 'file_path',
    ];

    public function course()
    {
        return $this->belongsTo(Course::class);
    }
}
