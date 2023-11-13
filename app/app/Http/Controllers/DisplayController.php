<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\Posting;

class DisplayController extends Controller
{
    public function firstPage(){
        return view('auth/login');
    }
    public function new(){
        return view('auth/newRegistration');
    }
    public function login(Request $request){
        $posting = Posting::orderBy('id','desc')->take(3)->get()->toArray();
        $user = Auth::user();
        
        if($user->role == 0){
           return view('member/main',[
            'postDatas' => $posting,
           ]); 
        }elseif($user->role == 1){
            return view('manager/index',[
            'postDatas' => $posting,
        ]);
        }  
    }
    public function logOut(){
        return view('auth/login');
    }

    public function postCreate(){
        return view('manager/post');
    }
    
    public function mainPage(){
        $posting = Posting::orderBy('id','desc')->take(3)->get()->toArray();
        return view('manager/index',[
            'postDatas' => $posting,
        ]);
    }

    public function postAddAjax(Request $request){
        $nowCount = $request->input('nowCount');
        $start = $nowCount;
        $end = $nowCount +4;

        $post = Posting::orderBy('id','desc')->skip($start)->take($end-$start-1)->get();
        return response()->json(['post'=> $post]);  
    }
}
