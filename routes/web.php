<?php
use App\Http\Controllers\RegisterController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');});
    Route::get('/register', function () {
    return view('register'); // registration form});
});
Route::post('/register', [RegisterController::class, 'register']);


