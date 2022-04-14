@extends('admin.master')

@section('content')

<div class="col-12">
    <h3 class="mb-4">Edit Product</h3>
    @if ($errors->any())
        @foreach ($errors->all() as $error)
            <div>
                <p class="alert alert-danger">{{ $error }}</p>
            </div>
        @endforeach
    @endif
</div>

    <div class="col-12">
        <div class="card shadow position-relative">
            <div class="card-header py-3">
                <h6 class="m-0 font-weight-bold text-primary">Product  Informations</h6>
            </div>
            <div class="card-body">

                <form action="{{ route('product.update', $product->id) }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    @method('put')
                    <div class="row">
                        <div class="col-lg-6">
                            <div class="mb-3">
                                <label for="exampleInputEmail1" class="form-label">Name</label>
                                <input value="{{$product->name}}"  name="name" type="text" placeholder="Name" class="form-control">

                            </div>
                        </div>

                        <div class="col-lg-6">
                            <div class="mb-3">
                                <label for="exampleInputEmail1" class="form-label">Gender</label>
                                <select class="form-control" name="gender">
                                    <option value="">Select Gender</option>
                                    <option value="man" @if ($product->gender == 'man' ? 'selected' : '') @endif >Man</option>
                                    <option value="woman" @if ($product->gender == 'woman' ? 'selected' : '') @endif >Woman</option>
                                </select>
                            </div>
                        </div>

                        <div class="col-lg-6">
                            <div class="mb-3">
                                <label for="exampleInputEmail1" class="form-label">Color</label>
                                <input value="{{$product->color}}" name="color" type="text" placeholder="Color" class="form-control">

                            </div>
                        </div>

                        <div class="col-lg-6">
                            <div class="mb-3">
                                <label for="exampleInputEmail1" class="form-label">Size</label>
                                <select class="form-control" name="size">
                                    <option value="">Select Color</option>
                                    <option value="s" @if ($product->size == 's' ? 'selected' : '') @endif >S</option>
                                    <option value="m" @if ($product->size == 'm' ? 'selected' : '') @endif >M</option>
                                    <option value="l" @if ($product->size == 'l' ? 'selected' : '') @endif >L</option>
                                    <option value="xl" @if ($product->size == 'xl' ? 'selected' : '') @endif >XL</option>
                                </select>
                            </div>
                        </div>

                        <div class="col-lg-6">
                            <div class="mb-3">
                                <label for="exampleInputEmail1" class="form-label">Price</label>
                                <input value="{{$product->price}}" name="price" type="number" placeholder="Price" class="form-control">

                            </div>
                        </div>

                        <div class="col-lg-6">
                            <div class="mb-3">
                                <img id="output" src="" />
                                <label for="exampleInputEmail1" class="form-label">Image</label>
                                <input  name="image" type="file" id="image" class="form-control" onchange="loadFile(event)">
                                <img src="{{ Storage::url($product->image)}}" width="80">
                            </div>
                        </div>
                    </div>
                    <button type="submit" class="btn btn-primary btn-icon-split">
                        <span class="icon text-white-50">
                            <i class="fas fa-check"></i>
                        </span>
                        <span class="text">Submit</span>
                    </button>
                    <a href="{{ route('product.index') }}" class="btn btn-danger btn-icon-split">
                        <span class="icon text-white-50">
                            <i class="fas fa-times"></i>
                        </span>
                        <span class="text">Cancel</span>
                    </a>
                </form>
            </div>
        </div>
    </div>

@endsection

<script>
var loadFile = function(event){
    var output = document.getElementById('output');
    output.src = URL.createObjectURL(event.target.files[0]);
};
</script>
