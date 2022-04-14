@extends('admin.master')
@section('content')

<h3>Product Details </h3>

<p>
    <td> <p>Image: <img src="{{ Storage::url($product->image)}}" width="80"></p></td>
</p>
<p>Name:{{$product->name}} </p>
<p>Gender:{{$product->gender}} </p>
<p>Color:{{$product->color}} </p>
<p>Size:{{$product->size}} </p>
<p>Price:{{$product->price}} </p>

@endsection
