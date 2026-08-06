@extends('layouts.app')

@section('content')

<div class="d-flex justify-content-between align-items-center mb-4">

    <div>
        <h2 class="fw-bold">Shop</h2>
        <p class="text-muted">Temukan koleksi fashion thrift terbaik.</p>
    </div>

    <input type="text" class="form-control w-25" placeholder="Cari produk...">

</div>

<div class="row">

@forelse($products as $product)

    <div class="col-md-3 mb-4">

        <div class="card shadow-sm border-0">

            <div class="position-relative">

                <img src="{{ asset('products/'.$product->image) }}"
                     class="card-img-top"
                     style="height:300px; object-fit:cover;"
                     alt="{{ $product->name }}">

                @if($product->stock <= 0)

                    <div class="sold-overlay">
                        Habis
                    </div>

                @endif

            </div>

            <div class="card-body">

                <h5>{{ $product->name }}</h5>

                <small class="text-muted d-block">
                    {{ $product->brand }}
                </small>

                <p class="text-muted">
                    Rp {{ number_format($product->price,0,',','.') }}
                </p>

                @if($product->stock > 0)

                    <a href="{{ route('product.detail', $product->id) }}"
                       class="btn btn-dark w-100">
                        Detail
                    </a>

                @else

                    <button class="btn btn-secondary w-100" disabled>
                        Stok Habis
                    </button>

                @endif

            </div>

        </div>

    </div>

@empty

    <div class="col-12">

        <div class="alert alert-warning text-center">
            Belum ada produk.
        </div>

    </div>

@endforelse

</div>

<style>

.sold-overlay{
    position:absolute;
    top:50%;
    left:50%;
    transform:translate(-50%,-50%);
    width:120px;
    height:120px;
    border-radius:50%;
    background:rgba(0,0,0,.55);
    color:#fff;
    display:flex;
    justify-content:center;
    align-items:center;
    font-size:28px;
    font-weight:bold;
    z-index:10;
}

</style>

@endsection