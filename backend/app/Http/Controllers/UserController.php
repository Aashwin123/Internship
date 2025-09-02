<?php

namespace App\Http\Controllers;



class UserController extends Controller{
    public function dataSet(){
        return response()->json([
            ['id'=>1,'name'=> 'Ashwin'],
            ['id'=> 2,'name'=> 'Sita'],
            ]);
    }
}