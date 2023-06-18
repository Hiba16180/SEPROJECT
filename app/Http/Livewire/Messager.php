<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\Message;
use App\Models\User ;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;
use App\Events\sendMessage;

class Messager extends Component
{
    public $messages = [];
    
    public $users;
    
    public $selected = null;

    public $have_selected = 0;
    
    public $text;
    
    public $connectedID = [];
    
    public $newMessage=false;
    public $userWithMessage =[];
    public $newMessages =[] ;
    public $user = "";
    protected $listeners=[
       'showMessages'=>'showMessages',
       // 'echo-private:chat,sendMessages'=>'receivedMessage'
       'sendMessages'=>'sendMessages',
       'receivedMessage'=>'receivedMessage',
       'userConnected'=>'userConnected',
       'deleteSelected'=>'deleteSelected'
    ];
    public function render()
    {
        /*$this->users = DB::table('users')
        ->whereNotIn('users.id', [auth()->id()])
        ->join('messages', function ($join) {
            $join->on('messages.sender_id', '=', 'users.id')
                 ->orOn('messages.reseiver_id', '=', 'users.id');
        })
        ->where(function ($query) {
            $query->where('sender_id', auth()->id())
                  ->orWhere('reseiver_id', auth()->id());
        })
        ->select('users.*')
        ->distinct()
        ->get();*/
        $this->users = DB::table('users')
        ->join('notification', function ($join) {
            $join->on('notification.line_1', '=', 'users.id')
                 ->orOn('notification.line_2', '=', 'users.id');
        })
        ->where('notification.line_1',auth()->id())
        ->orWhere('notification.line_2',auth()->id())
        ->select('users.*')$user
        ->distinct()
        ->get();
        $m  = DB::table('notification')->where('line_1',auth()->id())->where("new_messages_to_line_1",true)->get();
        foreach($m as $r){
            $this->userWithMessage[] = $r->line_2;
        }
        return view("livewire.messager");
    }
    public function showMessages($userId){
        $user = User::findOrFail($userId);
        $this->selected = null;
        $this->selected = $user;
        $this->messages = Message::messageList($user->id)->get()->toArray();
        $this->newMessage = false;
        Message::Readmessages($user['id'],\auth()->id());
        foreach($this->userWithMessage as $key=>$value){
            if($value == $user['id']){
                unset($this->userWithMessage[$key]);
            }
        }
        DB::table('notification')
            ->where('line_1', auth()->id())
            ->where('line_2', $userId)
            ->update(['new_messages_to_line_1' => false]);
        
//        return $this->selected;
    }

    public function deleteSelected(){
        $this->selected = false;
    }

    public function sendMessages($message){
        $user = auth()->user();
        $message = $user->messages()->create(['sender_id'=>auth()->id(),'reseiver_id'=>$this->selected['id'],'message'=>$message]);
        //broadcast(new sendMessage($message))->toOthers();
        //event(new sendMessage($message));
        $this->messages[] = $message->toArray();
        //$this->text = null;
        //return ['messages' => $this->messages];
    }
    public function receivedMessage($user,$message,$bool){
        /*dd($data);
        $message=$data['message'];
        if($message['reseived_id']== auth()->id()){ #current ope tab user sent message
            if($this->selected && $this->selected['id']==$message['sender_id']);
                $this->messages[] = $message; 
        }else{
            #others must write new message piiinnng
            $this->newMessage = true;
            if(Message::query()->where('reseiver_id',auth()->id())->where('sender_id',$message['sender_id'])->where('read',false)->count()){
                $this->userWithMessage=$message['sender_id'];
            }
        }*/
        $r = DB::table('notification')
        ->where('line_1', auth()->id())
        ->where('line_2', (int)$user)->get();
        
        $message = ['sender_id'=>(int)$user,'reseiver_id'=>auth()->id(),'message'=>$message];
        $this->messages[] = $message;
        $this->user = (Array)DB::table('users')->where('id',$user)->first();
        if($bool=="1"){
        if(!$r){
            DB::table('notification')
            ->insert(['line_1'=> auth()->id(),'line_2'=> (int)$user,'new_messages_to_line_1' => 1]);
           
        }else{
            DB::table('notification')
            ->where('line_1', auth()->id())
            ->where('line_2', (int)$user)
            ->update(['new_messages_to_line_1' => 1]);
            $this->userWithMessage[]=$user;
        }
        }
    }
    public function userConnected($data){
        if($data["status"] == 'disconnect'){
            $index = in_array($data['id'], $this->connectedID);
            if ($index) {
                unset($this->connectedID[$index]);
            }
        }else{
        //$this->connected = true;
        $this->connectedID[] = $data['id'];
        }
    }
    
}
