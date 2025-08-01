<?php

use App\Http\Controllers\StudentController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');

Route::get('test',function()
{
    return ['name'=>'Aashwin','id'=>'2078 batch'];
});
Route::get('/love',[StudentController::class,'index'])->name('love');

Route::post('/add',[studentcontroller::class,'addstudent'])->name('add');

Route::put('/update-student',[studentcontroller::class,'updatestudent'])->name('update-student');