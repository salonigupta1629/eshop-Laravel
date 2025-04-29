@extends('admin.adminparent')

@section('title','Edit')

@section('content')

<div class="col-3">
<div class="d-flex mb-4 justify-content-between align-items-center">
    <h2>Edit Category</h2>
    <a href="{{route('admin.manageCategory')}}" class="btn btn-dark">Go Back</a>
    </div>
    <div class="card">
        <div class="card-body">
            <form action="{{route('admin.updateCategory',$category->id)}}" method="post">
                @csrf
                @method("put")
                <div class="mb-3">
                    <label for="cat_title" class="form-label">Category Title</label>
                    <input type="text" class="form-control" value="{{$category->cat_title}}" id="cat_title" name="cat_title" required/>
                    @error('cat_title')
<div class="text-danger">{{ $message }}</div>
                    @enderror
                </div>

                <div class="mb-3">
                    <label for="cat_title" class="form-label">Category Description</label>
                    <textarea rows="5" class="form-control" id="cat_description" 
                    name="cat_description" required>{{$category->cat_description}}</textarea>
                    @error('cat_description')
<div class="text-danger">{{ $message }}</div>
                    @enderror
                </div>

                <div class="mb-3">
                    <label for="" class="form-label">Parent Category</label>
                    <select name="category_id" class="form-select">
                        <option value="">Parent Category</option>
                        @foreach ($categories as $category)
                        <option value="{{ $category->id }}" {{ $category->cat_id == $category->id ? 'selected' : '' }}> {{ $category->cat_title }}</option>
 @endforeach
                    </select>
                    @error('category_id')
<div class="text-danger">{{ $message }}</div>
                    @enderror
                </div>
               <div class="mb-3">
                <input type="submit" value="Update Category" class="btn btn-success w-100" />
               </div>
            </form>

        </div>
    </div>
</div>

@endsection