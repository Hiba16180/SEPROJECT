<?php

namespace App\Http\Controllers;
use Livewire\Livewire;
use Illuminate\Http\Request;

use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\DB;
use App\Models\Post;
use App\Models\User;
use Intervention\Image\Facades\Image;
class UserController extends Controller
{
    public function index()
    {
        $user = Auth()->user();
        setcookie('user_id', auth()->id(), time() + (86400 * 30), '/'); // Replace 86400 with the desired expiration time in seconds        
        $posts = Post::where('user_id', auth()->id())->latest()->take(4)->get();
        
        return view('profile.profile', compact('user','posts'));
    }
    public function updateImage(Request $request){

        $request->validate([
            'image' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
          ]);
         $image = $request->file('image') ;
             $filename = time() . '.' . $image->getClientOriginalExtension();
             $filename = time() . '.' . $image->getClientOriginalExtension();
             $path = public_path('profiles/images/' . $filename);
             Log::debug($path);
             $image->move(public_path('profiles/images'), $filename);

            //$image->move(public_path('profiles/images'), $filename);
             // save file name into users
             DB::table('users')
               ->where('id', auth()->id())
              ->update(['profile_photo_path' => 'profiles/images/'.$filename]);

     return back();
    }

    public function visite(Request $request){
       /* $userOther = DB::table('users')
        ->Where('id', $request->id)->get()[0];
        if($userOther->id == auth()->id()){
            $this->index();
            $user = $userOther;
            $posts = Post::where('user_id', auth()->id())->get();
            return view('profile.profile', compact('user','posts'));
        }*/ 
        $userOther = User::where('id', $request->id)->first();
        $posts = DB::table('posts')
        ->where('user_id',$userOther->id)->latest()->take(4)->get();
        
        return view('profile.profileOther',compact('userOther','posts'));
    }

    public function fetch(Request $request){
        
        $posts = Post::getByUserId($request->id);
        return view('Forums.forum', compact('posts'));
    }

    public function message(Request $request){
        /*$results = DB::select('select * from friend where line_1 = ? and line_2 = ?', [auth()->id(),$request->id]);
        if (! $results){
            DB::table('friend')->insert([
                'line_1' => auth()->id(),
                'line_2' => $request->id,
            ]);
            DB::table('friend')->insert([
                'line_1' =>  $request->id,
                'line_2' => auth()->id(),
            ]);
        }
        */
            DB::table('notification')
            ->where('line_1', auth()->id())
            ->where('line_2', $request->id)
            ->update(['new_messages_to_line_1' => true]);
        
        $line2 = DB::table('users')
        ->Where('id', $request->id)->get()[0];
        $params = ['selected' => $line2];
        return;
    }


    public function updateInfo(Request $request){

        $request->validate([
            'body' => 'required|string|max:500',
          ]);
       
             DB::table('users')
               ->where('id', auth()->id())
              ->update(['description' => $request->body]);

     return back();
    }

    public function getName(Request $request) {
        $user = User::find($request->id);
        if ($user) {
        if($request['action']=="record"){
           /* DB::table('friend')
            ->where('line_1', auth()->id())
            ->where('line_2', $request->id)
            ->update(['new_messages_to_line_1' => true]);*/
            DB::table('notification')
            ->where('line_1', auth()->id())
            ->where('line_2', $request->id)
            ->update(['new_messages_to_line_1' => true]);
            return json_encode($user);  
        }else{
            //reading 
            /*DB::table('friend')
            ->where('line_1', auth()->id())
            ->where('line_2', $request->id)
            ->delete();*/
            DB::table('notification')
            ->where('line_1', auth()->id())
            ->where('line_2', $request->id)
            ->update(['new_messages_to_line_1' => false]);
        
        } 
        }else {
            return json_encode('');
        }

    }

    
}
