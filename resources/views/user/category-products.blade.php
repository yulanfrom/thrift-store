@extends('layouts.app')

@section('content')

<div class="container">

    <h2 class="fw-bold mb-4">
        Kategori : {{ ucfirst($category->name) }}
    </h2>

    @if($products->count())

    <div class="row">

        @foreach($products as $product)

        <div class="col-md-3 mb-4">

            <div class="card shadow-sm border-0 h-100">

                <img src="{{ asset('products/'.$product->image) }}"
                     class="card-img-top"
                     style="height:250px;object-fit:cover;">

                <div class="card-body">

                    <h5>{{ $product->name }}</h5>

                    <p class="fw-bold text-dark">
                        Rp {{ number_format($product->price,0,',','.') }}
                    </p>

                    <a href="{{ route('product.detail',$product->id) }}"
                       class="btn btn-dark w-100">
                        Lihat Detail
                    </a>

                </div>

            </div>

        </div>

        @endforeach

    </div>

    @else

    <div class="alert alert-warning">
        Belum ada produk pada kategori ini.
    </div>

    @endif

</div>

@endsection