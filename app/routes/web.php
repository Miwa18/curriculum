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

Route::get('/',[DisplayController::class,'firstPage']);
Route::get('/new', [DisplayController::class,'new']);
Route::post('/new',[RegistrationController::class,'newRegister'])->name('new.registration');
Route::post('/login',[DisplayController::class,'logIn'])->name('login');
Route::post('/logout',[DisplayController::class,'logOut'])->name('logout');
Route::resource('/shift/user','UsersController',['only' => ['create','store']]);
Route::get('/post_create',[DisplayController::class,'postCreate'])->name('post.create');
Route::post('/post',[RegistrationController::class,'post'])->name('post');
