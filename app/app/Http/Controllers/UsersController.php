<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\Http\Requests\NewRegi;

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
    public function store(NewRegi $request)
    {
        $user = new User;
        $columns = ['name','kana','phone','email','role','password'];

        foreach($columns as $column){
            $user->$column = $request->$column;
        }
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
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $result = User::find($id);
        $result->delete();
        
        if($result){
            session()->flash('flash.success','ユーザーを削除しました。');
            return view('/manager/member_edit');
        }else{
            session()->flash('flash.error','ユーザーの削除に失敗しました。');
        }
        
    }
}
