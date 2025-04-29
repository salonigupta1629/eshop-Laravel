@extends("admin.adminparent")

@section('title','Manage Products')

@section('content')

<div class="container mt-5">

<!-- msg for product created -->
@if(session('success'))
    <div class="alert alert-success">
        {{ session('success') }}
    </div>
@endif
<!-- msg for product deleted -->
@if(session('delete_success'))
    <div class="alert alert-danger">
        {{ session('delete_success') }}
    </div>
@endif

    <div class="row">
        <div class="col-12 d-flex justify-content-between align-items-center">
            <h2>Manage Products</h2>

            <a href="{{route('admin.insertProduct')}}" class="btn btn-success">Insert Product</a>
        </div>
        <div class="col-12">
            <table class="table">
<!-- <thead> -->
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
 <tr>
<td>{{ $item->id}}</td>
<td><img src="{{ $item->image}}" width="70px" alt=""/></td>
<td>{{ $item->title}}</td>
<td>{{ $item->brand}}</td>
<td><del>{{ $item->price}}</del> {{$item->discount_price}}</td>
<td>{{ $item->category_id}}</td>
<td>
<div class="btn-group">
    
    <!-- <a href="" class="btn btn-success">Edit</a> -->
    <a href="/edit/{{$item->id}}" class="btn btn-success">Edit</a>

    <a href="" class="btn btn-info">View</a>
    
    <!-- <a href="" class="btn btn-danger">X</a> -->
<form action="{{route('admin.deleteProduct', $item->id)}}" method="post">
    @csrf
    @method("delete")
    <input type="submit" value="X" class="btn btn-danger"/>
</form>

</div>
</td>
</tr>
@endforeach
            </table>

        </div>
    </div>
</div>

@endsection