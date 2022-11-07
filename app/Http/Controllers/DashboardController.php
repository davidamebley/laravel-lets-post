<?php

namespace App\Http\Controllers;

use App\Mail\PostLiked;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class DashboardController extends Controller
{
    public function __construct(){
        $this->middleware(['auth']);    //Restricting Dashboard access to auth users
    }

    public function index(){

        return view('dashboard');
    }
}
