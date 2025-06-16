<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product; // assuming you have a Product model

class ProductController extends Controller
{
    public function index()
    {
        
        
        // Fetch all products from database to display
        $products = Product::all();
        return view('layout.inventory', compact('products'));
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'id' => 'required|unique:products,id',
            'product_name' => 'required',
            'quantity' => 'required|integer',
            'price' => 'required|numeric',
            'status' => 'required|in:Active,Inactive',
        ]);

        $product = Product::create([
            'id' => $validated['id'],
            'product_name' => $validated['product_name'],
            'quantity' => $validated['quantity'],
            'price' => $validated['price'],
            'status' => $validated['status'],
        ]);

        return response()->json([
            'success' => true,
            'product' => $product,
        ]);
    }
}
