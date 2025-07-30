<?php

use Illuminate\Support\Facades\Route;
use  App\Http\Controllers\userController;

/*Route::get('/', function () {
    return view('welcome');
});
Route::view('ttp','/ttp');

Route::get('/love', function () {
    return view('love');
})->whereNumber('id');
 Route::get('/RoshanBhatt/product', function () {
    return view('ttp');});
    Route::get('/RoshanBhatt/gpa', function () {
    return view('topper');});
    Route::get('/RoshanBhatt/know', function () {
    return view('book');});
    Route::get('/admin', function () {
        return view('admin');
    })->name('cts'); 
    
     Route::get('/',[userController::class,'index']);
    Route::get('/admin/','App\Http\Controllers\userController@admin');
    Route::get('user/{name}',[userController::class,'getUserName']);
Route::view('/inner','common.inner');
Route::get('/whatsapp/{Roll}',[userController::class,'admin']);


Route::get('/pant',[userController::class,'action']);
*/
Route::view("user-form","user-form");
Route::POST('adduser',[userController::class,'adduser']);

Route::view('form','form');
Route::post('Gform',[userController::class,'Gform']);