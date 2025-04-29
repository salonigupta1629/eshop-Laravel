@extends("admin.adminparent")

@section('title','Manage Category')

@section('content')

<div class="container mt-5">
<div class="row">
<div class="col-9">
    <table class="table table-bordered">
<thead>
<tr>
<th>Id</th>
<th>Category title</th>
<th>Description</th>
<th>Parent</th>
<th>Action</th>
</tr>
</thead>
<tbody>
    @foreach($categories as $category)
    <tr>
<td>{{$category->id}}</td>
<td>{{$category->cat_title}}</td>
<td>{{ substr($category->cat_description,0 ,50)}}...</td>
<td>{{$category->parent ? $category->parent->cat_title : NULL}}</td>
<td>
<div class="btn-group btn-group-sm">
<!-- <a href="" class="btn btn-success">Edit</a> -->
<a href="{{ route('admin.editCategory', $category->id) }}" class="btn btn-success">Edit</a>

<!-- <a href="" class="btn btn-danger">delete</a> -->
<form action="{{ route('admin.deleteCategory', $category->id) }}" method="post">
    @csrf
    @method("delete")
    <input type="submit" value="Delete" class="btn btn-danger">
</form>

</div>
</td>
</tr>
@endforeach
</tbody>
    </table>
    {{ $categories->links() }}
</div>

<div class="col-3">
    <div class="card">
        <div class="card-body">
            <form action="{{route('admin.createCategory')}}" method="post">
                @csrf
                <div class="mb-3">
                    <label for="cat_title" class="form-label">Category Title</label>
                    <input type="text" class="form-control" value="{{old('cat_title')}}" id="cat_title" name="cat_title" required/>
                    @error('cat_title')
<div class="text-danger">{{ $message }}</div>
                    @enderror
                </div>

                <div class="mb-3">
                    <label for="cat_title" class="form-label">Category Description</label>
                    <textarea rows="5" class="form-control" value="{{old('cat_description')}}" id="cat_description" name="cat_description" required></textarea>
                    @error('cat_description')
<div class="text-danger">{{ $message }}</div>
                    @enderror
                </div>

                <div class="mb-3">
                    <label for="" class="form-label">Parent Category</label>
                    <select name="category_id" class="form-select">
                        <option value="">Parent Category</option>
                        @foreach ($categories as $category)
                        <option value="{{ $category->id}}">{{ $category->cat_title}}</option>
                        @endforeach
                    </select>
                    @error('category_id')
<div class="text-danger">{{ $message }}</div>
                    @enderror
                </div>
               <div class="mb-3">
                <input type="submit" value="Create Category" class="btn btn-success w-100" />
               </div>
            </form>

        </div>
    </div>
</div>
</div>
</div>


@endsection