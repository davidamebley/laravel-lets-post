<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class LoginController extends Controller
{
    public function __construct(){
        $this->middleware(['guest']);    //Only unauthenticated users can access this page and features
    }

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

        // Attempt login. $request->remember [optional] is for Remember me functionality
        if (!auth()->attempt($request->only('email', 'password'), $request->remember)) {
            // If login failed
            return back()->with('status', 'Invalid login details');
        }
        // If login success
        return redirect()->route('dashboard');
    }
}
