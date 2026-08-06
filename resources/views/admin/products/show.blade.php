@extends('layouts.app')

@section('content')

<div class="container">

    <h2 class="mb-4">Detail Produk</h2>

    <div class="card p-4">

        <div class="text-center mb-4">
            <img src="{{ asset('products/'.$product->image) }}"
                 width="250"
                 class="img-thumbnail">
        </div>

        <table class="table">

            <tr>
                <th width="200">Nama Produk</th>
                <td>{{ $product->name }}</td>
            </tr>

            <tr>
                <th>Brand</th>
                <td>{{ $product->brand }}</td>
            </tr>

            <tr>
                <th>Kategori</th>
                <td>{{ $product->category->name }}</td>
            </tr>

            <tr>
                <th>Harga</th>
                <td>Rp {{ number_format($product->price,0,',','.') }}</td>
            </tr>

            <tr>
                <th>Stok</th>
                <td>{{ $product->stock }}</td>
            </tr>

            <tr>
                <th>Ukuran</th>
                <td>{{ $product->size ?: '-' }}</td>
            </tr>

            <tr>
                <th>Kondisi</th>
                <td>{{ $product->condition }}</td>
            </tr>

            <tr>
                <th>Deskripsi</th>
                <td>{{ $product->description }}</td>
            </tr>

        </table>

        <a href="{{ route('admin.products.index') }}"
           class="btn btn-secondary">
            Kembali
        </a>

    </div>

</div>

@endsection