<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class LoginController extends Controller
{
    public function index(){
        //Show sign in page
        return view('auth.login');
    }

    public function store(Request $request){
        //Sign in user
        $this->validate($request, [
            'email' => 'required|email',
            'password' => 'required',
        ]);

        // If login failed
        if (!auth()->attempt($request->only('email', 'password'))) {
            return back()->with('status', 'Invalid login details');
        }
        return redirect()->route('dashboard');
    }
}
