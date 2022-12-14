<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;

class PostController extends Controller
{

    public function __construct(){
        $this->middleware(['auth'])->only(['store', 'destroy']);    //We are giving exemptions to the functions in this array
    }

    public function index(){
        // The 'with(['user', 'liks'])' snippet enables eager loading of the queries to prevent executing separe queries for the posts and the likes
        $posts = Post::latest()->with(['user', 'likes'])->paginate(20);   //Using pagination from Laravel

        return view('posts.index', [
            'posts' => $posts
        ]);     //Sending the posts alongside the view
    }

    // Display a single post in a separate view
    public function show(Post $post){
        return view('posts.show', [
            'post' => $post,
        ]);
    }

    public function store(Request $request){
        $this->validate($request, [
            'body' => 'required'
        ]);
        // We want to create a post through a user
        $request->user()->posts()->create($request->only('body')); //Laravel uses this relationship setup to automatically fill in the user_id 

        return back();
    }

    // Delete a post
    public function destroy(Post $post){
        //Using the PostPolicy we created, we check if this user is authorized to delete a post
        $this->authorize('delete', $post);

        $post->delete();

        return back();
    }
}
