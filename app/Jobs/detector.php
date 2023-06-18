<?php

namespace App\Jobs;

use App\Events\SendMessage;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldBeUnique;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use App\Jobs\Job;
use Illuminate\Support\Facades\Event;
use App\Models\Post;
use Illuminate\Support\Facades\Session;

class detector extends Job implements  ShouldQueue 
{
 
    //  ******* صلي الله على محمد ********
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    protected $command,$body,$user,$post;

    /**
     * Create a new job instance.
     *
     * @param  string  $command
     * @return void
     */
    public function __construct($command,$body,$user,$id)
    {
        Log::debug($user);
        Log::debug($body);
        Log::debug($command);
        $this->command = $command;
        $this->body = $body;
        $this->user = $user;
        $this->post = $id;
    }

    /**
     * Execute the job.
     *
     * @return void
    */
    public function handle()
    {

        $result = exec($this->command);  
        $result = json_decode($result, true);
        Log::debug($result);

        Log::debug($this->user);
        Log::debug($this->body);
        Log::debug($this->command);

        if($result["result"]==1){

                DB::table('table_inapropriate')->insert([
                    'user_id' => $this->user,
                    'body' => $this->body,
                ]);
            
            DB::table('posts')->where('user_id' ,'=',  $this->user)->where('id'  ,'=', $this->post)->delete();
            Event::dispatch(new SendMessage($this->user));
            return;
        
        }

        return;

    }


}


