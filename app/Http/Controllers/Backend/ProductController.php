<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

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

    public function details($id)
    {
      $product=Product::find($id);
      return view ('admin.pages.product.details',compact('product'));
    }

    public function edit($id)
    {
        $product = Product::find($id);
        if ($product) {
            return view('admin.pages.product.edit',compact('product'));
        }
    }

    public function update(Request $request,$id){

        $request->validate([
            'name'=>'required',
            'gender'=>'required',
            'color'=>'required',
            'size'=>'required',
            'price'=>'required|numeric',
            'image'=>'required',
        ]);

        $product = Product::find($id);

        if($request->has('image')){
            $path = $request->image->store('public/product');
        }else{
            $path = $product->image;
        }

        if ($product) {
            $product->update([
                'name' =>$request->name,
                'gender' =>$request->gender,
                'color' =>$request->color,
                'size' =>$request->size,
                'price' =>$request->price,
                'image' =>$path,
            ]);
            return redirect()->route('product.index')->with('message', 'Product Updated Successfully!');
        }
    }

    public function delete($id){
    $product = Product::find($id);
    $product->name = $product->image. 'deleted' .$id;
    $user = Auth::id();
    $product->deleted_by = $user;
    $product->deleted = 'yes';
    $product->status = 'Inactive';
    $product->save();

    return redirect()->route('product.index')->with('msg','Product Deleted Successfully!');

    }
}