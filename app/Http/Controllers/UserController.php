<?php


namespace App\Http\Controllers;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use App\Models\User;
use Livewire\Livewire;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\DB;
use App\Models\Post;
use App\Models\Booking;
use Intervention\Image\Facades\Image;
use Illuminate\Support\Carbon;
use Laravel\Fortify\Fortify;

class UserController extends Controller
{
    public function getTeacher($id)
    {
        $teacher = User::find($id);
    
        if ($teacher) {
            $teacherData= [
                'name' => $teacher->name,
                'Telephone' => $teacher->telephone,
                'wilaya'=>$teacher->wilaya,
                'degree' => $teacher->degree,
                'diploma'=>$teacher->diplomaField,
            ];
            return $teacherData;
        } else {
            return null;
        }
    }
    
    public function index()
    {
       

        

        $events = array();
        $bookings = Booking::all();
        foreach($bookings as $booking) {
       
            $events[] = [
                'id'=> $booking->ID,
                'title' => $booking->title,
                'start' => $booking->start_date,
                'end' => $booking->end_date
            ];
        }

        $user = Auth()->user();
        setcookie('user_id', auth()->id(), time() +  (10 * 365 * 24 * 60 * 60), '/');      
        $posts = Post::where('user_id', auth()->id())->latest()->take(4)->get();
        
       
        return view('user.profile', compact('user','posts',"events"));
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

        $userOther = User::where('id', $request->id)->first();
        $posts = DB::table('posts')
        ->where('user_id',$userOther->id)->latest()->take(4)->get();
        

        $userId = $userOther->id;
        $currentMonth = Carbon::now()->month;
        $currentYear = Carbon::now()->year;

        $existingRow = DB::table('visites')
            ->where('user_id', $userId)
            ->whereMonth('date', $currentMonth)
            ->whereYear('date', $currentYear)
            ->first();

        if ($existingRow && $existingRow->user_id != auth()->id()) {
            DB::table('visites')
                ->where('user_id', $userId)
                ->whereMonth('date', $currentMonth)
                ->update(['visites' => $existingRow->visites + 1]);
        } else {
            
            DB::table('visites')->insert([
                'visites' => 1,
                'date' => Carbon::now(),
                'user_id' => $userId,
            ]);
        }
                
        return view('user.profileOther',compact('userOther','posts'));
    }

    public function fetch(Request $request){
        
        $posts = Post::getByUserId($request->id);
        return view('Forums.forum', compact('posts'));
    }

    public function message(Request $request){
 
        try {
            DB::table('notification')
                ->insert([
                    'line_1' => auth()->id(),
                    'line_2' => $request->id,
                    'new_messages_to_line_1' => false
                ]);
        } catch (\Exception $e) {
            DB::table('notification')
                ->where('line_1', auth()->id())
                ->where('line_2', $request->id)
                ->update(['new_messages_to_line_1' => true]);
        }
        
        $line2 = DB::table('users')
            ->where('id', $request->id)
            ->get()[0];
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
        
            DB::table('notification')
            ->where('line_1', auth()->id())
            ->where('line_2', $request->id)
            ->update(['new_messages_to_line_1' => true]);
            return json_encode($user);  
        }else{
          
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