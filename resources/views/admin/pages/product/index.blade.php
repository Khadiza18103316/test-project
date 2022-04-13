@extends('admin.master')
@section('content')

    <h3 class="mb-4">All Products</h3>

    @if(session()->has('msg'))
    <p class="alert alert-danger">{{session()->get('msg')}}</p>
@endif

@if(session()->has('success'))
    <p class="alert alert-success">{{session()->get('success')}}</p>
@endif

@if(session()->has('message'))
    <p class="alert alert-message">{{session()->get('message')}}</p>
@endif

    <a href="{{ route('product.create') }}" class="btn btn-primary float-end" ><i class="fa fa-plus"></i>Add Product</a>
    <br>
    <br>
    <table class="table table-striped table-bordered table-hover" style="width: 100%">
        <thead>
            <tr>
                <th scope="col">#</th>
                <th scope="col">Name</th>
                <th scope="col">Image</th>
                <th scope="col">Gender</th>
                <th scope="col">Color</th>
                <th scope="col">Size</th>
                <th scope="col">Price</th>
                <th scope="col">Action</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($products as $key => $product)
                <tr>
                    <th>{{ $key + 1 }}</th>
                    <td>{{ $product->name }}</td>
                    <td><img src="{{ Storage::url($product->image)}}" width="80"></td>
                    <td>{{ $product->gender }}</td>
                    <td>{{ $product->color }}</td>
                    <td>{{ $product->size }}</td>
                    <td>{{ $product->price }}</td>
                    {{-- <td>
                        <a class="btn btn-primary btn-sm" href="{{ route('product.details', $product->id) }}">Details</i></a>
                        <a class="btn btn-info btn-sm" href="{{ route('product.edit', $product->id) }}">Edit</a>
                        <a class="btn btn-danger btn-sm" onclick="return confirm('Do you want to delete?')" href="{{ route('product.delete', $product->id) }}">Delete</a>
                    </td> --}}
                </tr>
            @endforeach
        </tbody>
    </table>
    {{-- {{ $products->links() }} --}}

@endsection
