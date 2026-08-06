@extends('layouts.app')

@section('content')

<div class="container py-5">

    <div class="row">

        <div class="col-md-6">

            <img src="{{ asset('products/'.$product->image) }}"
                 class="img-fluid rounded shadow">

        </div>

        <div class="col-md-6">

            <h2>{{ $product->name }}</h2>

            <p class="text-muted">
                <strong>Brand :</strong>
                {{ $product->brand }}
            </p>

            <h3 class="text-danger mb-3">
                Rp {{ number_format($product->price,0,',','.') }}
            </h3>

            <table class="table">

                <tr>
                    <th width="150">Kategori</th>
                    <td>{{ $product->category->name }}</td>
                </tr>

                <tr>
                    <th>Ukuran</th>
                    <td>{{ $product->size }}</td>
                </tr>

                <tr>
                    <th>Kondisi</th>
                    <td>{{ $product->condition }}</td>
                </tr>

                <tr>
                    <th>Stok</th>
                    <td>{{ $product->stock }}</td>
                </tr>

            </table>

            <h5 class="mb-2">Deskripsi</h5>

            <div id="descriptionBox" class="description-box">
                {{ trim($product->description) }}
            </div>

            <button
                type="button"
                id="toggleDescription"
                class="btn p-0 mt-2"
                style="color:#000;border:none;background:none;font-weight:500;">

                Lihat Selengkapnya ▼

            </button>

            <div class="mt-4">

                <div class="d-flex gap-3 mb-3">

                    <form action="{{ route('cart.add', $product->id) }}" method="POST">
                        @csrf
                        <button type="submit" class="btn btn-success px-4 py-2 rounded-3">
                            <i class="bi bi-cart-plus"></i>
                            Tambah ke Keranjang
                        </button>
                    </form>

                    <a href="{{ route('checkout', $product->id) }}"
                       class="btn btn-dark px-4 py-2 rounded-3">
                        <i class="bi bi-bag-check"></i>
                        Checkout Sekarang
                    </a>

                </div>

                <a href="{{ route('shop') }}"
                   class="btn btn-outline-secondary rounded-3">
                    <i class="bi bi-arrow-left"></i>
                    Kembali ke Shop
                </a>

            </div>

        </div>

    </div>

</div>

<style>

.description-box{
    max-height:120px;
    overflow:hidden;
    white-space:pre-line;
    line-height:1.6;
    margin:0;
    padding:0;
}

</style>

<script>

document.addEventListener("DOMContentLoaded", function () {

    const box = document.getElementById("descriptionBox");
    const btn = document.getElementById("toggleDescription");

    let opened = false;

    btn.addEventListener("click", function () {

        if(opened){

            box.style.maxHeight = "120px";
            btn.innerHTML = "Lihat Selengkapnya ▼";

        }else{

            box.style.maxHeight = "1000px";
            btn.innerHTML = "Lihat Lebih Sedikit ▲";

        }

        opened = !opened;

    });

});

</script>

@endsection