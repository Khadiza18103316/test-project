<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\Product;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    public function index()
    {
        $products = Product::latest()->get();
        return view('admin.pages.product.index',compact('products'));
    }

    public function create()
    {
        return view('admin.pages.product.create');
    }

    public function store(Request $request){

        $request->validate([
            'name'=>'required',
            'gender'=>'required',
            'color'=>'required',
            'size'=>'required',
            'price'=>'required|numeric',
            'image'=>'required',
        ]);

        $path = $request->image->store('public/product');
        Product::create([
            // field name for DB || field name for form
            'name' =>$request->name,
            'gender' =>$request->gender,
            'color' =>$request->color,
            'size' =>$request->size,
            'price' =>$request->price,
            'image' =>$path,
        ]);
        return redirect()->route('product.index')->with('success', 'Product Created Successfully!');
    }

}