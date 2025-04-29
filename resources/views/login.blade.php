@extends('parent')

@section('title','Login')

@section('content')
<div class="container mt-5">
<div class="col-4 mx-auto mt-6">
    <div class="card">
        <div class="card-header">Login Here</div>
            <div class="card-body">
                <form action="" method="post">
<div class="mb-3">
    <label for="">Email</label>
    <input type="text" name="email" placeholder="e.g. abc@gmail.com" class="input form-control" />
</div>
<div class="mb-3">
    <label for="">Password</label>
    <input type="password" name="password" placeholder="e.g. ********" class="input form-control" />
</div>
<div class="mb-3">
    <input type="submit" name="login" class="btn btn-dark w-100" />
</div>
</form>
            </div>
        <!-- </div> -->
    </div>
</div>


</div>


@endsection