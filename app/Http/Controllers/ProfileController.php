<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Auth;

use Illuminate\Http\Request;

class ProfileController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function profile_info()
    {
        return view('user.dashboard');
    }
    public function settings(){
        return view('profile.show');
    }
}
