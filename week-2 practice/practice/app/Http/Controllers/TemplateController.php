<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Auth;

use Illuminate\Http\Request;
use Illuminate\Validation\Rules\Email;

class TemplateController extends Controller
{
    public function login(Request $request){
        $credentials = $request->validates([
            'email'=>$request->'required | email' ,
            'password'=>'required',
        ]);
        if(Auth::attempt($credentials))
        [
    return view('dashboard');
    ]
    }
}
