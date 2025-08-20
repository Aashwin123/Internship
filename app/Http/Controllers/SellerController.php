<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Seller;

class SellerController extends Controller
{
    public function store(Request $request)
    {
        $request->validate([
            'name'=>'requires|string',
            'email'=>'required|email|unique:sellers,email',
        ]);
        $seller = Seller::create(
            [
                'name'=> $request->name,
                'email'=> $request->email,
            ]);
            return back()->with('success','seller added succesfully');

    }
}
