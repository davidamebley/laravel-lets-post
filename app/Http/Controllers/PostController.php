<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PostController extends Controller
{
    public function index(){
        return view('posts.index');
    }

    public function store(Request $request){
        $this->validate($request, [
            'body' => 'required'
        ]);

        // We want to create a post through a user
    }
}
