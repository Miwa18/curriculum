<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\Posting;
use App\Type;
use App\Wish;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

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
    //シフト作成ページへ遷移
    public function shiftMain(){
        return view('manager/shiftMake');
    }
    //シフト希望一覧ページへ遷移
    public function shiftList(){
        return view('manager/shiftRequest');
    }
    //シフト希望の一覧表示　Ajax通信
    public function search(Request $request){
        $from = $request->input('from');
        $until = $request->input('until');
        $name = $request->input('name');

        $query = DB::table('wishes')->select('wishes.comment','wishes.date','users.name as user_name','types.name as type_name')->join('users',
        'wishes.user_id','=','users.id')->join('types','wishes.type_id','=','types.id');

        if($name){
            $query->where('users.name','like','%'.$name.'%');
        }
        
        $query->whereBetween('wishes.created_at',[$from,$until]);

        $results = $query->get();
        return response()->json(['results' => $results]);
    }
    //従業員シフト確認ページへ遷移
    public function shiftShow(){
        return view('member/shift');
    }
    //シフトをAjaxで表示
    public function shiftSearch(Request $request){
        $year = $request->input('year');
        $month = $request->input('month');

        $query = DB::table('shifts');
        $query->where('year','=',$year)->where('month','=',$month);
        
        $results=$query->get();
        return response()->json(['results' => $results]);
    }
}
