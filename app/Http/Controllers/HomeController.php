<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Laravel\Jetstream\Features;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Carbon;
use App\Models\User;


class HomeController extends Controller
{
    public function index(){
        

        if(auth()->id()){
            $message_2 = __('your account has been blocked for sevel days');
            $blockedAt = DB::table('users')->where('id', auth()->id())->value('blocked_at');
            $blockedAtDate = Carbon::parse($blockedAt);
            $daysSinceBlocked = $blockedAtDate->diffInDays(Carbon::today());
            
            if ($daysSinceBlocked > 7) {
                DB::table('users')->where('id', auth()->id())->update(['blocked' => 0]);
            }
            $blocked = DB::table('users')->where('id',auth()->id())->value('blocked');
            if($blocked == 1){
                setcookie('blocked', 1 );      
                redirect('/logout')->with(['status' => $message_2]);
        
            }
        }

        setcookie('user_id', auth()->id(), time() +  (10 * 365 * 24 * 60 * 60), '/');      
        $users = DB::table('users')
            ->leftJoin('posts', 'users.id', '=', 'posts.user_id')
            ->leftJoin('courses', 'users.id', '=', 'courses.user_id')
            ->select('users.name' ,'users.profile_photo_path', DB::raw('SUM(posts.upvotes) AS total_likes'), DB::raw('COUNT(posts.id) AS total_posts'), DB::raw('COUNT(courses.id) AS total_courses'))
            ->groupBy('users.id', 'users.name','users.profile_photo_path')
            ->orderByDesc('total_likes')
            ->limit(10)
            ->get();
        
        return view('index',compact('users'));
    }

    public function mainDashboard(){
        $user = Auth::user();
        $status=$user->status;

        return view('dashboard.homeDashboard',compact('status'));

    }

    
    public function profile(){
        $user = Auth::user();
        $username=$user->name;
        $status=$user->status;
        return view('dashboard.my-profile',compact('username','status'));
    }

    public function main()
{
    $user = Auth::user();
    $status = $user->status; 

    return view('dashboard.homeDashboard', compact('status'));
}

    public function logout(){
        Auth::logout();
        return redirect('/login');
    }

}
