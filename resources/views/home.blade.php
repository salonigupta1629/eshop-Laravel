@extends("parent")

@section("title","homepage")

@section('content')
    <div class="container-fluid">
        <img src="{{ asset('images/banner.avif') }}" class="w-100" style="height: 400px; object-fit: cover;" />
    </div>


    <div class="container mt-5">
        <div class="row">
            <div class="col-3">
                <div class="list-group">
                    <a href="" class="list-group-item list-group-item-action active" aria-current="true">
                        Categories
                    </a>
                    @foreach ($categories as $category)
                    <a href="#" class="list-group-item list-group-item-action">
                        {{ $category->cat_title }}

                        <span class="float-end">
                            @php
                                $count = $category->products->count();
                            @endphp

                            @if($count > 0)
                                <span class="badge bg-primary rounded-pill">{{ ($count > 99)?  "99+" : $count  }}</span>
                            @endif
                        </span>
                    </a>
                    @endforeach
                </div>
            </div>
            <div class="col-9">
                <div class="row">
                    @foreach ($products as $item)
                    <div class="col-3 mb-3">
                        <div class="card">
                            <img src="{{ $item->image }}" alt="" class="card-img-top">
                            <div class="card-body">
                                <h2 class="h6">{{ $item->title }}</h2>
                                <h2><span>{{$item->discount_price}}</span><del>{{$item->price}}</del></h2>
                            </div>
                        </div>
                    </div>
                    @endforeach
                    {{ $products->links() }}
                </div>
            </div>
        </div>

    </div>
@endsection