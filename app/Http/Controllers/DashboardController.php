<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function blog(){
        return view('dashboard.blog');
    }

    public function blog_details(){
        return view('dashboard.blog_details');
    }

    public function others_profile(){
        $user = User::find($id);
    
        if ($user) {
            $userData= [
                'name' => $teacher->name,
                'bio'=>$teacher->bio,
                'profilepicture' => $teacher->profile_photo_path,
                'instagram' => $teacher->instagram,
                'linkedin' => $teacher->linkedin,
                'facebook' => $teacher->facebook,
                'wilaya'=>$teacher->wilaya,
                'degree' => $teacher->degree,
                'diploma'=>$teacher->diplomaField,
            ];
            return view('dashboard.others-profile',compact('userData'));
        } else {
            return null;
        }
    }

}
