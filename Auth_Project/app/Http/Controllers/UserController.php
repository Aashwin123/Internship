<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use App\Models\User;
use Illuminate\Support\Facades\Auth;

class UserController extends Controller
{
public function index(Request $request)
{
    $credentials= $request->validate([
      'name' => 'required|string|max:255',
     'email'=>'required|email',
     'password'=>'required', 
    ]);
    $user=User::create([
        'name'=> $credentials['name'],
        'email'=>$credentials['email'],
        'password'=> Hash::make($credentials['password']),
    ]);
    return redirect('/home')->with('success','REgistration Successful');
   
}
public function log(Request $request)
{
    $credentials= $request->validate([
     'email'=>'required|email',
     'password'=>'required', 
    ]);
   if(Auth::attempt($credentials))
   {
    // $request->session()->regenerate();
    return redirect('/dashboard')->with('success','login succesful!');
   }}
   public function logout(Request $request)
   {
    Auth::logout();
    $request->session()->invalidate();
    $request->session()->regenerateToken();
    // return "<h1> logged out successfully</h1>";
    return redirect(route('home'));
   }

}
