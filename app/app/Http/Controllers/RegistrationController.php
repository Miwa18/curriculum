<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\Posting;
use App\Http\Requests\NewRegi;
use App\Http\Requests\PostRequest;

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
        $posting = new Posting;

        $image = $request->file('image');
        $path = isset($image) ? $image->store('items','public') : '';

        $columns = ['date','title','text'];
        foreach($columns as $column){
            $posting->$column = $request->$column;
        }
        $posting->image = $path;
        $result = $posting->save();

        if($result){
            session()->flash('flash.success','投稿が成功しました。');
            return view('manager/index');
        }else{
            session()->flash('flash.error','投稿登録に失敗しました。');
            return redirect()->back()->withInput();
        }
    }
}
