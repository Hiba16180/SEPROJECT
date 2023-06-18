<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Booking extends Model
{
    use HasFactory;
    protected $table = 'bookings';
    protected $fillable = ['user_id','title', 'start_date', 'end_date'];
    public function users()
    {
        return $this->belongsTo(User::class);
    }
}
