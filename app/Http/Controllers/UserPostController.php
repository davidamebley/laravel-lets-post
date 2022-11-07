<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class UserPostController extends Controller
{
    public function index(User $user){
        // Get Posts of Clicked user and Eager load the query with their Likes
        $posts = $user->posts()->with(['user', 'likes'])->paginate(20);

        return view('users.posts.index', [
            'user' => $user,
            'posts' => $posts
        ]);
    }
}
