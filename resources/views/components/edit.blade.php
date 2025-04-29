@extends('admin.adminparent')

@section('title','Edit Product')

@section('content')

<div class="container mt-5">
    <div class="row">
        <div class="col-7 mx-auto ">
        <div class="d-flex mb-4 justify-content-between align-items-center">
    <h2>Edit Product</h2>
    <a href="{{route('admin.manageProduct')}}" class="btn btn-dark">Go Back</a>
    </div>
            <div class="card">
                <div class="card-body">
                    <form action="{{route('admin.updateProduct',$product->id)}}" method="post" enctype="multipart/form-data">
@csrf
@method("put")
<div class="row">
    <div class="col">
        <div class="mb-3">
            <label for="title" class="form-label">Product Title</label>
            <input type="text" class="form-control" value="{{$product->title}}" id="title" name="title" />
            @error('title')
<div class="text-danger" >{{$message}}</div>
            @enderror
        </div>
    </div>

    <div class="col">
        <div class="mb-3">
            <label for="brand" class="form-label">Product Brand</label>
            <input type="text" class="form-control" value="{{$product->brand}}" id="brand" name="brand" />
            @error('brand')
<div class="text-danger" >{{$message}}</div>
            @enderror
        </div>
    </div>

    <div class="row">
    <div class="col">
        <div class="mb-3">
            <label for="price" class="form-label">Product price</label>
            <input type="text" class="form-control" value="{{$product->price}}" id="price" name="price" />
            @error('price')
<div class="text-danger" >{{$message}}</div>
            @enderror
        </div>
    </div>

    <div class="col">
        <div class="mb-3">
            <label for="discount_price" class="form-label">Product discount_price</label>
            <input type="text" class="form-control" value="{{$product->discount_price}}" id="discount_price" name="discount_price" />
            @error('discount_price')
<div class="text-danger" >{{$message}}</div>
            @enderror
        </div>
    </div>

    <div class="row">
    <div class="col">
        <div class="mb-3">
            <label for="category_id" class="form-label">Product category</label>
            <select class="form-select" value="{{$product->category_id}}" id="category_id" name="category_id" >
<option value="">Select Category</option>
@foreach($categories as $category)
<option value="{{$category->id}}" {{ $product->category_id == $category->id ? 'selected' : '' }}>
    {{$category->cat_title}}
</option>
@endforeach
</select>
            @error('category_id')
<div class="text-danger" >{{$message}}</div>
            @enderror
        </div>
    </div>

    <div class="col">
        <div class="mb-3">
            <label for="image" class="form-label">Product image</label>
            <input type="file" class="form-control" id="image" name="image"/>
            <!-- @if($product->image)
                                        <div class="mt-2">
                                            <img src="{{ asset('images/' . $product->image) }}" alt="Product Image" width="100">
                                        </div>
                                    @endif -->
            @error('image')
<div class="text-danger" >{{$message}}</div>
            @enderror
        </div>
    </div>

</div>
<div class="row">
    <div class="col-12">
        <label for="description">Product Description</label>
        <textarea name="description" id="" cols="30" rows="5" class="form-control">{{$product->description}}</textarea>
        @error('description')
<div class="text-danger" >{{$message}}</div>
            @enderror
    </div>
</div>
<div class="row">
    <input type="submit" class="btn btn-primary w-100 mt-3" value="Update Product">
</div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection