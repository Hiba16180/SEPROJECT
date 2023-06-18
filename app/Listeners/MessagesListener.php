<?php

namespace App\Listeners;

use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;
use  App\Events\SendMessage;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\DB;
use App\Models\Post;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;


class MessagesListener
{
    /**
     * Create the event listener.
     */
    public function __construct()
    {
        //
        Log::debug('listener');
    }

    /**
     * Handle the event.
     */
    /*public function handle(SendMessage $event)
    {
        $message = $event->message;
    }*/
    public function handle(SendMessage $event)
    {
        Log::debug('listener');
        
        $userId = $event->user_id;

        // block user if he has more then 5 times tryin to insert offensive content :() Allah yahdih
        if ( DB::table('table_inapropriate')->where('user_id',$userId)->count() >= 5 ){
            DB::table('users')
                    ->where('id', $userId)
                    ->update(['blocked' => true ,'blocked_at'=>now()]);
        } 
        
        DB::table('notification')->insert([
            'line_2' => 1,
            'line_1' => $userId ,
            'type' => "alert",
            'new_messages_to_line_1' => true
        ]);

        Log::debug('listener last');

    }
}
