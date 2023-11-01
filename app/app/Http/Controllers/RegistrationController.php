<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\Http\Requests\NewRegi;

class RegistrationController extends Controller
{
    public function newRegister(NewRegi $request){
        $user = new User;
        $columns = ['name','kana','phone','email','role','password'];
        
        foreach($columns as $column){
            $user->$column = $request->$column;
        }
        $user->save();
        return redirect('/login');
    }

    public function memberRegi(NewRegi $request){
        $user = new User;
        $columns = ['name','kana','phone','email','role','password'];

        foreach($columns as $column){
            $user->$column = $request->$column;
        }
        $user->save();

        return view('index')->with('message','登録が完了しました。');
    }
}
