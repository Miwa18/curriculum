<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;

class DisplayController extends Controller
{
    public function firstPage(){
        return view('auth/login');
    }
    public function new(){
        return view('auth/newRegistration');
    }
    
    public function logIn(){
        return view('index');
    }
    public function logOut(){
        return view('auth/login');
    }
    
    public function member(){
        return view('auth/member');
    }

}
