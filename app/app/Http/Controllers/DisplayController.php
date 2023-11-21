<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\Posting;
use App\Type;
use Illuminate\Support\Facades\Auth;

class DisplayController extends Controller
{
    //localhost最初にアクセス時にログインページへ誘導
    public function start(){
        return redirect()->route('login');
    }
    //ログイン完了後roleカラムでページ遷移先を分ける
    public function logIn(){
        $posting = Posting::orderBy('id','desc')->take(3)->get()->toArray();
        $user = Auth::user();
        if($user->role == 0){
           return view('member/main',[
            'postDatas' => $posting,
            'user' => $user,
           ]); 
        }elseif($user->role == 1){
            return view('manager/index',[
                'postDatas' => $posting,
                'user' => $user,
            ]);
        }
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
        return response()->json(['post'=> $post,]);  
    }
    //ユーザー情報編集ページ
    public function infoEdit(){
        $user = Auth::user();
        
        return view('member/userInfo_edit',[
            'user' => $user,
        ]);
    }
    //シフト希望登録ページへ遷移
    public function userRequest(){
        $user = Auth::user();
        $type = Type::all();

        return view('member/userRequest',[
            'user' => $user,
            'types' => $type,
        ]);
    }
}
