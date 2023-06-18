<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Course extends Model
{
    use HasFactory;
    protected $fillable = [
        'title',
        'module',
        'level',
        'duration',
        'place',
        'address',
        'price',
        'cover',
        'user_id',
        'description'
    ];
    public function resources()
    {
        return $this->hasMany(Resource::class);
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
