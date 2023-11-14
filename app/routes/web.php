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
Route::get('/new', [DisplayController::class,'new']);
Route::post('/new',[RegistrationController::class,'newRegister'])->name('new.registration');
Route::get('/login','Auth\LoginController@showLoginForm')->name('login');
Route::post('/login','Auth\LoginController@login');

Route::group(['middleware' => 'admin'],function(){
    Route::get('/main',[DisplayController::class,'mainPage'])->name('main');
    Route::get('/post_create',[DisplayController::class,'postCreate'])->name('post.create');
    Route::post('/post',[RegistrationController::class,'post'])->name('post');
    Route::get('post_delete/{id}',[RegistrationController::class,'postDele'])->name('post.delete');
    Route::resource('/shift/user','UsersController',['only' => ['index','create','store','edit','update','destroy']]);
});

Route::group(['middleware' => 'member'],function(){
    Route::get('/',[DisplayController::class,'logIn'])->name('logIn');  
});

Route::post('/logout',[DisplayController::class,'logOut'])->name('logout');

Route::post('/post/ajax',[DisplayController::class,'postAddAjax'])->name('postAj');