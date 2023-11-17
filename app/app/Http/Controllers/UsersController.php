<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\Http\Requests\NewRegi;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;

class UsersController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $user = User::all()->toArray();
        return view('/manager/member_edit',[
            'users' => $user,
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    //従業員登録ページに遷移
    public function create()
    {
        return view('auth/member');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    //従業員登録処理
    public function store(NewRegi $request)
    {
        $user = new User;
        $columns = ['name','kana','phone','email','role'];

        foreach($columns as $column){
            $user->$column = $request->$column;
        }
        $user -> password = Hash::make($request['password']);
        $result = $user->save();

        if($result){
            session()->flash('flash.success','登録が成功しました。');
            return redirect(route('main'));;
        }else{
            session()->flash('flash.error','登録に失敗しました。');
            return redirect()->back()->withInput();
        }
    }

    /**
     * Display the specified resource.
     * 
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    //ユーザー情報表示
    public function show($id)
    {
     $user = Auth::user();
     return view('member/userInfo',[
        'user' => $user,
     ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    //従業員編集・削除ページ、従業員一覧表示
    public function edit(int $id)
    {
        $user = User::find($id);
        return view('/manager/member_edit2',[
           'user' => $user,
        ]);   
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    //従業員更新処理
    public function update(NewRegi $request, $id)
    {
        $user = User::find($id);
        $columns = ['name','kana','phone','email','role'];
        foreach($columns as $column){
            $user->$column = $request->$column;
        }
        $user->password =  Hash::make($request['password']);
        $result = $user->save();

        if($result){
            session()->flash('flash.success','変更が成功しました。');
            return redirect(route('user.index'));;
        }else{
            session()->flash('flash.error','変更に失敗しました。');
            return redirect()->back()->withInput();
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    //従業員削除処理
    public function destroy($id)
    {
        $user = User::find($id);
        $result = $user->forceDelete();
        if($result){
            session()->flash('flash.success','ユーザーを削除しました。');
            return redirect()->route('user.index');
        }else{
            session()->flash('flash.error','ユーザーの削除に失敗しました。');
        }
        
    }
}
