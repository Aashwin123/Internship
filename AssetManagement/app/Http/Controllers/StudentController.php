<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\students;

class StudentController extends Controller
{
    public function index()
    {
        return students::all();
    }
    // public function addstudent(Request $request)
    // {   
    // if($request->has("name") && $request->name != "")
    //     {
    //     return "hello ". $request->name;
    // }
    // else{ 
    //     return response("the key name is required and name should not be empty",400);
    //  }
    // }
    public function addstudent(Request $request)
    {
        $student = new students();
        $student->name=$request->name;
        $student->email=$request->email;
        if($student->save())
        {
            return "Student added";
        }
        else{
            return "operation failed";         }
    }
    function updateStudent(Request $request){
        $student = students::find($request->id);
        $student->name=$request->name;
        $student->email=$request->email;
        if( $student->save() ){
            return["result"=> "student updated"];
        }
        else{
            return ["result"=>"student not updated"];
        }
    }
}

