<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\Posting;
use App\Wish;
use App\Http\Requests\NewRegi;
use App\Http\Requests\PostRequest;
use App\Http\Requests\EditUser;
use Illuminate\Support\Facades\Auth;

class RegistrationController extends Controller
{
    public function newRegister(NewRegi $request){
        $user = new User;
        $columns = ['name','kana','phone','email','role','password'];
        
        foreach($columns as $column){
            $user->$column = $request->$column;
        }
        $result = $user->save();
        if($result){
            session()->flash('flash.success','登録が成功しました。');
            return redirect('/login');
        }else{
            session()->flash('flash.error','登録に失敗しました。');
            return redirect()->back()->withInput();
        }
    }
       
    public function post(PostRequest $request){
        $image = $request->file('image');
        $path = isset($image) ? $image->store('items','public') : '';

        $result = Posting::create([
            'date' => $request->date,
            'title' => $request->title,
            'text' => $request->text,
            'image' => $path,
        ]);

        if($result){
            session()->flash('flash.success','投稿が成功しました。');
            return redirect(route('main'));;
        }else{
            session()->flash('flash.error','投稿登録に失敗しました。');
            return redirect()->back()->withInput();
        }
    }

    public function postDele(int $id){
        $result = Posting::find($id);
        $result->delete();

        if($result){
            session()->flash('flash.success','投稿を削除しました。');
            return redirect(route('main'));
        }else{
            session()->flash('flash.error','削除に失敗しました。');
        }
        
    }
    //ユーザー情報更新処理
    public function infoEditDone(Request $request){
        $user = Auth::User();
        $columns = ['name','kana','phone','email'];
        foreach($columns as $column){
            $user->$column = $request->$column;
        }
        $result = $user->save();
        if($result){
            session()->flash('flash.success','更新が成功しました。');
            return redirect(route('logIn'));
        }else{
            session()->flash('flash.error','更新に失敗しました。');
            return redirect()->back()->withInput();
        }
    }
    //シフト希望登録処理
    public function shiftRequest(Request $request){
        $wish = new Wish;
        $user = Auth::User();
        $wish->user_id = $user->id;
        $columns =['type_id','comment'];
        foreach($columns as $column){
            $wish->$column = $request->$column;
        }
        $dates = $request->input('date');
        if(!empty($dates)){
            $formatDates = explode(',',$dates);
            $formatDates = array_filter(array_map('trim',$formatDates));
            $wish->date =json_encode($formatDates);
        }else{
            $wish->date = null;
        }

        $result = $wish->save();

        if($result){
            session()->flash('flash.success','登録が成功しました。');
            return redirect(route('logIn'));
        }else{
            session()->flash('flash.error','登録に失敗しました。');
            return redirect()->back()->withInput();
        }
    }
}
