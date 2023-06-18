<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    use HasFactory;
    protected $fillable = ['body','title','user_id','image_name'];

    public function path(){
            return '/post/' . $this->id;
    }

    public function     replies()
    {
    	return $this->hasMany(Reply::class,'post_id');
    } 
    public function creator()
    {
    	return $this->belongsTo(User::class, 'user_id');
    }



    public function tags()
    {
        return $this->hasMany(TaggedPosts::class,  'post_id');
    }

    public function images()
    {
        return $this->hasMany(Image::class,  'post_id');
    }
  

    public function addPost($post){
        #validate post 
        $new = $this->create($post);
        return $new;
    }

    public function editPost($postUpdates){
        $this->update($postUpdates);
        return $this;
    }
    public function deletePost($post){
        /*$post = Post::find($post->id);
        $post->delete(); */
        $this->destroy($post->id);
    }
    public static function getByUserId($userId, $limit = 21)
    {
        return self::where('user_id', $userId)->latest()->cursorPaginate($limit);
    }
}
