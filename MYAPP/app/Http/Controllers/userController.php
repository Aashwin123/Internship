<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class userController extends Controller
{
    public function index()
    {
        return view('love');
    }
    public function admin($Roll){
        return view('admin',['Number'=>$Roll]);
    }
    public function getUserName($name)
    {
        return "User name:$name";
    }
    public function action()
    {
        return view('love');
    }
    public function adduser(Request $request)
    {
        $request->validate([
             'username'=> 'required | min:4 | max:10',
             'Email'=>'required | email',
            'city'=>'required | uppercase',
            'user_image'=> 'required|file|image|mimes:jpeg,png,jpg,gif|max:2048',
         ],
        [
            'username.required'=>'Sorry , we donot beleive in anonomous person'//changing default required message
            
        ]);
        $imagepath = $request->file('user_image')->store('uploads','public');//for storing image

    


        echo $request->username;
        echo '<br>';
        echo $request->city;
        echo '<br>';
        echo $request->Email;
    }
    public function Gform(Request $req)
    {
        $skills = $req->skill;
        
foreach ($skills as $skill) {
    echo $skill . "<br>";}
        echo $req->gender;
        echo $req->city;
}
   

 public function showform(){
        return view('form');
    }
}
