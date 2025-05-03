@extends("admin.adminparent")

@section('title','Manage Category')

@section('content')

<div class="container mt-5">
<div class="row">
<div class="col-9">
   
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


<!-- Modal -->
<div class="modal fade" id="editModal{{ $category->id }}" tabindex="-1" role="dialog" aria-labelledby="editModal" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="editModal{{ $category->id }}">Edit {{$category->cat_title . "'s Record"}}</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
      <div class="modal-body">
      <div class="card">
        <div class="card-body">
            <form action="{{route('admin.updateCategory', $category->id)}}" method="post">
                @csrf
                @method("put")
                <div class="mb-3">
                    <label for="cat_title" class="form-label">Category Title</label>
                    <input type="text" class="form-control" value="{{ $category->cat_title }}" id="cat_title" name="cat_title" required/>
                    @error('cat_title')
<div class="text-danger">{{ $message }}</div>
                    @enderror
                </div>

                <div class="mb-3">
                    <label for="cat_title" class="form-label">Category Description</label>
                    <textarea rows="5" class="form-control" id="cat_description" name="cat_description" required>
                    {{ $category->cat_description }}
                    </textarea>
                    @error('cat_description')
<div class="text-danger">{{ $message }}</div>
                    @enderror
                </div>

                <div class="mb-3">
                    <label for="" class="form-label">Parent Category</label>
                    <select name="category_id" class="form-select">
                        <option value="{{ $category->category_id}}">Selected : {{ $category->cat_title }}</option>
                        @foreach ($parent_categories as $parentcategory)
                        <option value="{{ $parentcategory->id}}">{{$parentcategory->cat_title}}</option>
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
</div>

    <tr>
<td>{{$category->id}}</td>
<td>{{$category->cat_title}}</td>
<td>{{ substr($category->cat_description,0 ,50)}}...</td>
<td>{{$category->parent ? $category->parent->cat_title : NULL}}</td>
<td>
<div class="btn-group btn-group-sm">

<a data-bs-toggle="modal" href="#editModal{{ $category->id }}" class="btn btn-success">Edit</a>

<form action="{{ route('admin.deleteCategory', $category->id) }}" method="post">
    @csrf
    @method("delete")
    <button type="submit"  class="btn btn-danger">Delete</button>
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