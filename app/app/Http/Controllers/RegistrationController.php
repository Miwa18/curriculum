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
}
