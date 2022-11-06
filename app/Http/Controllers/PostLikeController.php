<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;

class PostLikeController extends Controller
{
    public function __construct(){
        $this->middleware(['auth']);    //Prevent unauthenticated users from access
    }
    //reate a like for a post
    public function store(Post $post, Request $request){

        if ($post->likedBy($request->user())) {
            return response(null, 409);     //Conflict http code
        }

        // We are creating a Like through a post. Laravel automatically fills the post_id section of the like for us because we created it through a post
        $post->likes()->create([
            'user_id' => $request->user()->id,
        ]);

        return back();
    }
}
