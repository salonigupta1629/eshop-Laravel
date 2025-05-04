<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title> @yield('title') {{env("APP_NAME")}}</title>

<!-- some links -->
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.5/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-SgOJa3DmI69IUzQ2PVdRZhwQ+dy64/BUtbMJw1MZ8t5HZApcHrRKUc4W0kG879m7" crossorigin="anonymous">
</head>
<body>
   
<!-- headers -->
<div class="navbar navbar-expand-lg navbar-dark bg-success">
    <div class="container">
        <a href="" class="navbar-brand" >{{env("APP_NAME")}}</a>

        <!-- search -->
         <form action="{{route('search')}}" method="GET" class="d-flex">
            @csrf
<input type="text" name="search" size="80" placeholder="Search here" class="form-control" />
<input type="submit" class="btn btn-dark" value="Go" />
</form>

<!-- links -->
 <div class="navbar nav">
    <a href="{{ route('homepage') }}" class="nav-item nav-link text-white">Home</a>
    @auth
<span class='texxt-white nav-link'>{{auth()->user()->name}}</span>
    @else
    <a href="{{ route('login') }}" class="nav-item nav-link text-white">Login</a>

    @endauth
    <a href="{{route('register')}}" class="nav-item nav-link text-white">Register</a>
    <a href="" class="btn btn-light">Cart</a>
 </div>
    </div>
</div>



@section('content')
 @show                  <!-- decorator -->


<!-- footer -->

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.5/dist/js/bootstrap.bundle.min.js" integrity="sha384-k6d4wzSIapyDyv1kpU366/PK5hCdSbCRGRCMv+eplOQJWyd1fbcAu9OCUj5zNLiq" crossorigin="anonymous"></script>
</body>
</html>