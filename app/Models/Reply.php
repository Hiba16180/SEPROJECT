<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Reply extends Model
{
    use HasFactory;
    protected $fillable = ['body','post_id','user_id'];
    public function addReply($reply)
    {
        $new = $this->create($reply); 
        return $new;
    }
    public function creator()
    {
    	return $this->belongsTo(User::class, 'user_id');
    }

    public function owner()
    {
    	return $this->belongsTo(User::class, 'forum_id');
    }
    public function editReply($replyUpdates){
        $this->update($replyUpdates);
        return $this;
    }
    public function deleteReply($reply){
        /*$post = Post::find($post->id);
        $post->delete(); */
        $this->destroy($reply->id);
    }
}
//action='{{ $post->path() . "/replies" }}'