@extends("parent")

@section("title","homepage")

@section('content')

@if(Route::currentRouteName() == 'homepage')
    <div class="container-fluid">
        <img src="{{ asset('images/banner1.avif') }}" class="w-100 rounded-md shadow-sm" style="height: 400px; object-fit: cover;" />
    </div>
@endif

<div class="container mt-5">
    <div class="row">
        <!-- Sidebar Categories -->
        <div class="col-3">
            <div class="list-group shadow-sm border rounded">
                <a href="#" class="list-group-item list-group-item-action active bg-indigo-600 border-indigo-600 text-white">
                    Categories
                </a>
                @foreach ($categories as $category)
                    <a href="{{ route('filter', $category->id) }}" class="list-group-item list-group-item-action">
                        {{ $category->cat_title }}
                        <span class="float-end">
                            @php
                                $count = $category->products->count();
                            @endphp
                            @if($count > 0)
                                <span class="badge bg-indigo-600 rounded-pill text-white text-sm">
                                    {{ $count > 99 ? '99+' : $count }}
                                </span>
                            @endif
                        </span>
                    </a>
                @endforeach
            </div>
        </div>

        <!-- Product Grid -->
        <div class="col-9">
            <div class="row">
                @forelse ($products as $item)
                    <div class="col-3 mb-4">
                        <div class="card shadow-sm border hover:shadow-md transition">
                            <img src="{{ $item->image }}" alt="" class="card-img-top" style="height: 180px; object-fit: cover;">
                            <div class="card-body">
                                <h2 class="h6 text-gray-800">{{ $item->title }}</h2>
                                <h2 class="text-sm">
                                    <span class="text-indigo-600 fw-bold">{{ $item->discount_price }}</span>
                                    <del class="text-muted ms-2">{{ $item->price }}</del>
                                </h2>
                            </div>
                            <div class="d-flex justify-content-between px-3 pb-3">
                                <a href="#" class="btn btn-outline-primary btn-sm">View Details</a>
                                <button class="btn btn-primary btn-sm">Add to Cart</button>
                            </div>
                        </div>
                    </div>
                @empty
                    <div class="col-12 text-center mt-5">
                        <h2 class="display-4 fw-bold text-muted">Not Found</h2>
                        <p class="text-secondary">Sorry :( please try with another keyword or select other categories</p>
                    </div>
                @endforelse

                <!-- Pagination -->
                <div class="mt-4">
                    {{ $products->links() }}
                </div>
            </div>
        </div>
    </div>
</div>

@endsection
