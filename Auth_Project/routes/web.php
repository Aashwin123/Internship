<?php
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});
Route::view('home','home')->name('home');
Route::view('register','register');
Route::post('/register',[UserController::class,'index']);

Route::view('login','login'); 
Route::post('/login',[UserController::class,'log']);

Route::view('/dashboard','dashboard')->middleware('auth');

// Route::view('logout','logout');
Route::post('/logout',[UserController::class,'logout']);