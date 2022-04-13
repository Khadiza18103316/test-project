@extends('admin.master')
@section('content')

<h3>Product Details </h3>

<p>
    <td><img src="{{ Storage::url($product->image)}}" width="80"></td>
</p>
<p>Name:{{$product->name}} </p>

@endsection
