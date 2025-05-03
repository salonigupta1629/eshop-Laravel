@extends("admin.adminparent")

@section('title','Manage Products')

@section('content')

<div class="container mt-5">
  
<!-- msg for category created -->
@if(session('success'))
    <div class="alert alert-success alert-dismissible fade show">
        {{ session('success') }}
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>
@endif
<!-- msg for category deleted -->
@if(session('delete_success'))
    <div class="alert alert-danger alert-dismissible fade show">
        {{ session('delete_success') }}
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>
@endif

    <div class="row">
        <div class="col-12 d-flex justify-content-between align-items-center">
            <h2>Manage Products</h2>

            <a href="{{route('admin.insertProduct')}}" class="btn btn-success">Insert Product</a>
        </div>
        <div class="col-12">
            <table class="table">
<tr>
<th>Id</th>
<th>Image</th>
<th>title</th>
<th>Brand</th>
<th>Price</th>
<th>Category</th>
<th>Action</th>
</tr>
 @foreach( $products as $item)

<!-- Modal -->
<div class="modal fade" id="editModal{{ $item->id }}" tabindex="-1" aria-labelledby="editModal" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h1 class="modal-title fs-5" id="editModal{{ $item->id }}">Edit {{$item->title . "'s Record"}}</h1>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
      <div class="card">
                <div class="card-body">
                    <form action="{{route('admin.updateProduct', $item->id )}}" method="post" enctype="multipart/form-data">
@csrf
@method("put")
<div class="row">
    <div class="col">
        <div class="mb-3">
            <label for="title" class="form-label">Product Title</label>
            <input type="text" class="form-control" value="{{ $item->title }}" id="title" name="title" />
            @error('title')
<div class="text-danger" >{{$message}}</div>
            @enderror
        </div>
    </div>

    <div class="col">
        <div class="mb-3">
            <label for="brand" class="form-label">Product Brand</label>
            <input type="text" class="form-control" value="{{ $item->brand }}" id="brand" name="brand" />
            @error('brand')
<div class="text-danger" >{{$message}}</div>
            @enderror
        </div>
    </div>

    <div class="row">
    <div class="col">
        <div class="mb-3">
            <label for="price" class="form-label">Product price</label>
            <input type="text" class="form-control" value="{{ $item->price }}" id="price" name="price" />
            @error('price')
<div class="text-danger" >{{$message}}</div>
            @enderror
        </div>
    </div>

    <div class="col">
        <div class="mb-3">
            <label for="discount_price" class="form-label">Product discount_price</label>
            <input type="text" class="form-control" value="{{ $item->discount_price }}" id="discount_price" name="discount_price" />
            @error('discount_price')
<div class="text-danger" >{{$message}}</div>
            @enderror
        </div>
    </div>

    <div class="row">
    <div class="col">
        <div class="mb-3">
            <label for="category_id" class="form-label">Product category</label>
            <select class="form-select"   name="category_id" >
<option value="">Select Category</option>
@foreach($categories as $category)
<!-- <option value="{{$category->id}}">{{$category->cat_title}}</option> -->
<option value="{{$category->id}}" {{ $item->category_id == $category->id ? 'selected' : '' }}>
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
            @error('image')
<div class="text-danger" >{{$message}}</div>
            @enderror
        </div>
    </div>

</div>
<div class="row">
    <div class="col-12">
        <label for="description">Product Description</label>
        <textarea name="description" id="" cols="30" rows="5" class="form-control">{{ $item->description }}</textarea>
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
</div>

 <tr>
<td>{{ $item->id}}</td>
<td><img src="{{ $item->image}}" width="70px" alt=""/></td>
<td>{{ $item->title}}</td>
<td>{{ $item->brand}}</td>
<td><del>{{ $item->price}}</del> {{$item->discount_price}}</td>
<td>{{ $item->category_id}}</td>
<td>
<div class="btn-group">
    
    <a data-bs-toggle="modal" href="#editModal{{ $item->id }}" class="btn btn-success">Edit</a>


    <a href="" class="btn btn-info">View</a>
    
<form action="{{route('admin.deleteProduct', $item->id)}}" method="post">
    @csrf
    @method("delete")
    <button type="submit"  class="btn btn-danger">X</button>
</form>

</div>
</td>
</tr>
@endforeach
            </table>
{{ $products->links() }}
        </div>
    </div>
</div>

@endsection