<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ProductController extends Controller
{
    public function store(Request $request)
{
    $request->validate([
        'name' => 'required|string',
        'price' => 'required|numeric',
        'seller_id' => 'required|exists:sellers,id',
    ]);

    Product::create([
        'name' => $request->name,
        'price' => $request->price,
        'seller_id' => $request->seller_id,
    ]);

    return back()->with('success', 'Product added successfully!');
}

}
