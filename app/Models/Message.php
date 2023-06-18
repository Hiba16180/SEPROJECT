<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Message extends Model
{
    use HasFactory;
    protected $fillable = ['message','sender_id','reseiver_id'];


    /*public static function get_messages($sender,? int $receiver){//can be null
        return DB::table('messages')->where('sender_id','=',$sender)->where('receiver_id','=',$receiver)->getAll("message");
    }*/

    public static function Readmessages($sender,? int $receiver){//can be null
        Message::query()->where("sender_id", $sender)->where("reseiver_id", $receiver)->update(['read' => 1]);
    }

    public function sender(){
        return $this->belongsTo(User::class,'sender_id');
    }

    public function receiver(){
        return $this->belongsTo(User::class,'reseiver_id');
    }

    /*public function scopeMessageList($query,$selected){
        return $query->where( function (Builder $query) use ($selected) {
            $query->where('sender_id',auth()->id())->where('receiver_id',$selected);
        })->orWhere( function (Builder $query) use ($selected) {
            $query->where('receiver_id',auth()->id())->where('sender_id',$selected);
        });
    }*/
    public function scopeMessageList($query, $selected){
        return $query->where( function ($query) use ($selected) {
            $query->where('sender_id',auth()->id())->where('reseiver_id',$selected);
        })->orWhere( function ($query) use ($selected) {
            $query->where('reseiver_id',auth()->id())->where('sender_id',$selected);
        });
    }
}
