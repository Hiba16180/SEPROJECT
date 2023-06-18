<?php

namespace App\Http\Controllers;

use App\Models\Post;
use App\Models\Reply;
use Illuminate\Http\Request;

class ReplyController extends Controller
{
    public function __construct()
	{
		$this->middleware('auth');
	}



    public function store(Reply $reply, Request $request,Post $post)
    {

        $validatedData = $request->validate([
            'body' => 'required|string|max:1000',
           ]); 

        $reply=$reply->addReply([
        	'body' => request('body'),
        	'user_id' => auth()->id(),
            'post_id' => $post->id
        ]);
        Post::where('id', $post->id)->increment('reply_count' , 1 );
        
        //return back();
        return response()->json(['post' => $post, 'reply' => $reply]);
    }
    public function edit(Post $post,Reply $reply){
        $reply=$reply->editReply([
        	'body' => request('body'),
                    ]);
       // return  redirect('/post/'.$post->id);
    }

    

    public function destroy(Post $post,Reply $reply)
    {
     
        $reply->deleteReply($reply);
        Post::where('id', $post->id)->increment('reply_count' , -1 );
        //return redirect('/post/'.$post->id);
    }
}
