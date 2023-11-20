<?php

use App\Http\Controllers\DisplayController;
use App\Http\Controllers\RegistrationController;
use App\Http\Controllers\UsersController;


/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/
Auth::routes();
Route::get('/',[DisplayController::class,'start']);
Route::group(['middleware' => 'auth'],function(){
Route::group(['middleware' => 'admin'],function(){
    Route::get('/main',[DisplayController::class,'mainPage'])->name('main');
    Route::get('/post_create',[DisplayController::class,'postCreate'])->name('post.create');
    Route::post('/post',[RegistrationController::class,'post'])->name('post');
    Route::get('post_delete/{id}',[RegistrationController::class,'postDele'])->name('post.delete');
    Route::resource('/shift/user','UsersController',['only' => ['index','create','store','edit','update','destroy','show']]);
});

    Route::get('/logIn',[DisplayController::class,'logIn'])->name('logIn');  
    Route::get('/info_edit',[DisplayController::class,'infoEdit']);
    Route::post('/info_edit2',[RegistrationController::class,'infoEditDone'])->name('infoEdit.done');
    Route::group(['middleware' => 'admin'],function(){
    Route::get('/user_request',[DisplayController::class,'userRequest'])->name('user.request');
    });
Route::post('/post/ajax',[DisplayController::class,'postAddAjax'])->name('postAj');
});