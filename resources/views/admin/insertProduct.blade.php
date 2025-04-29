@extends('admin.adminparent')

@section('title','Insert Product')

@section('content')

<div class="container mt-5">
    <div class="row">
        <div class="col-7 mx-auto ">
        <div class="d-flex mb-4 justify-content-between align-items-center">
    <h2>Insert Product</h2>
    <a href="{{route('admin.manageProduct')}}" class="btn btn-dark">Go Back</a>
    </div>
            <div class="card">
                <div class="card-body">
                    <form action="{{route('admin.storeProduct')}}" method="post" enctype="multipart/form-data">
@csrf
<div class="row">
    <div class="col">
        <div class="mb-3">
            <label for="title" class="form-label">Product Title</label>
            <input type="text" class="form-control" value="{{old('title')}}" id="title" name="title" />
            @error('title')
<div class="text-danger" >{{$message}}</div>
            @enderror
        </div>
    </div>

    <div class="col">
        <div class="mb-3">
            <label for="brand" class="form-label">Product Brand</label>
            <input type="text" class="form-control" value="{{old('brand')}}" id="brand" name="brand" />
            @error('brand')
<div class="text-danger" >{{$message}}</div>
            @enderror
        </div>
    </div>

    <div class="row">
    <div class="col">
        <div class="mb-3">
            <label for="price" class="form-label">Product price</label>
            <input type="text" class="form-control" value="{{old('price')}}" id="price" name="price" />
            @error('price')
<div class="text-danger" >{{$message}}</div>
            @enderror
        </div>
    </div>

    <div class="col">
        <div class="mb-3">
            <label for="discount_price" class="form-label">Product discount_price</label>
            <input type="text" class="form-control" value="{{old('discount_price')}}" id="discount_price" name="discount_price" />
            @error('discount_price')
<div class="text-danger" >{{$message}}</div>
            @enderror
        </div>
    </div>

    <div class="row">
    <div class="col">
        <div class="mb-3">
            <label for="category_id" class="form-label">Product category</label>
            <select class="form-select" value="{{old('category_id')}}" id="category_id" name="category_id" >
<option value="">Select Category</option>
@foreach($categories as $category)
<option value="{{$category->id}}">{{$category->cat_title}}</option>
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
            @error('image')
<div class="text-danger" >{{$message}}</div>
            @enderror
        </div>
    </div>

</div>
<div class="row">
    <div class="col-12">
        <label for="description">Product Description</label>
        <textarea name="description" id="" cols="30" rows="5" class="form-control">{{old('description')}}</textarea>
        @error('description')
<div class="text-danger" >{{$message}}</div>
            @enderror
    </div>
</div>
<div class="row">
    <input type="submit" class="btn btn-primary w-100 mt-3" value="Insert Product">
</div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection