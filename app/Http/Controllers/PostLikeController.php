<?php

namespace App\Http\Controllers;

use App\Models\Post;
use App\Mail\PostLiked;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class PostLikeController extends Controller
{
    public function __construct(){
        $this->middleware(['auth']);    //Prevent unauthenticated users from access
    }
    //Create a like for a post
    public function store(Post $post, Request $request){

        if ($post->likedBy($request->user())) {
            return response(null, 409);     //Conflict http code
        }

        // We are creating a Like through a post. Laravel automatically fills the post_id section of the like for us because we created it through a post
        $post->likes()->create([
            'user_id' => $request->user()->id,
        ]);

        // Mail after Post Liked
        Mail::to($post->user)->send(new PostLiked(auth()->user(), $post));  //Passing these vals to the PostLiked constructor

        return back();
    }

    // Delete a like
    public function destroy(Post $post, Request $request){
        $request->user()->likes()->where('post_id', $post->id)->delete();

        return back();
    }
}
