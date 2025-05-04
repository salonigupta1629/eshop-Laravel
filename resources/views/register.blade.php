@extends('parent')

@section('title','Register')

@section('content')
<div class="container mt-5">
    <div class="col-4 mx-auto mt-6">
        <div class="card">
            <div class="card-header">Create an Account</div>
            <div class="card-body">
                <form action="{{ route('register') }}" method="post">
                    @csrf
                    <div class="mb-3">
                        <label for="">Name</label>
                        <input type="text" name="name" placeholder="Your full name" class="form-control" required />
                    </div>
                    <div class="mb-3">
                        <label for="">Email</label>
                        <input type="email" name="email" placeholder="e.g. abc@gmail.com" class="form-control" required />
                    </div>
                    <div class="mb-3">
                        <label for="">Password</label>
                        <input type="password" name="password" placeholder="e.g. ********" class="form-control" required />
                    </div>
                    <div class="mb-3">
                        <label for="">Confirm Password</label>
                        <input type="password" name="password_confirmation" placeholder="Repeat password" class="form-control" required />
                    </div>
                    <div class="mb-3">
                        <input type="submit" name="register" class="btn btn-dark w-100" value="Register" />
                    </div>
                </form>
                <div class="text-center mt-3">
                    <p class="mb-0">Already have an account?
                        <a href="{{ route('login') }}" class="text-primary">Login here</a>
                    </p>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
