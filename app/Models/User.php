<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Fortify\TwoFactorAuthenticatable;
use Laravel\Jetstream\HasProfilePhoto;
use Laravel\Sanctum\HasApiTokens;
use Illuminate\Support\Facades\DB;

class User extends Authenticatable
{
    use HasApiTokens;
    use HasFactory;
    use HasProfilePhoto;
    use Notifiable;
    use TwoFactorAuthenticatable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'email',
        'password',
        'region',
        'diplomaField',
        'degree',
        'status',
        'instagram',
        'twiter',
        'facebook',
        'linkedin',
        'region',
        'profile_photo_path'
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
        'two_factor_recovery_codes',
        'two_factor_secret',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    /**
     * The accessors to append to the model's array form.
     *
     * @var array<int, string>
     */
    protected $appends = [
        'profile_photo_url',
    ];
    public function courses()
    {
        return $this->hasMany(Course::class);
    }
    public function messages() {
        return $this->hasMany(Message::class,'sender_id');
    }

    public function hasNewMessages(){
        return DB::table('notification')->where('line_1',auth()->id())->where("new_messages_to_line_1",true)->select('line_2')->get();
    }

    public function Badges($id){
        return DB::table('badges')->where('user_id',$id)->get();
    }
    public function notifications(){
        return  DB::table('notification')
        ->join('users', 'notification.line_2', '=', 'users.id')
        ->where('notification.line_1', auth()->id())
        ->where('notification.new_messages_to_line_1', true)
        ->select('users.name', 'users.id','notification.type')
        ->get();
    }
    public function readAlert(){
        DB::table('notification')
        ->where('line_1', auth()->id())
        ->where('type', 'alert')
        ->delete();
    }

    public function booknigs()
    {
        return $this->hasMany(Booking::class);
    }
    
}
