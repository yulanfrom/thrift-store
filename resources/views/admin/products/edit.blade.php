@extends('layouts.app')

@section('content')

<div class="container">

    <h2 class="mb-4">Edit Produk</h2>

    <form action="{{ route('admin.products.update', $product->id) }}"
          method="POST"
          enctype="multipart/form-data">

        @csrf
        @method('PUT')

        <div class="mb-3">
            <label>Kategori</label>

            <select name="category_id" class="form-control">

                @foreach($categories as $category)

                    <option value="{{ $category->id }}"
                        {{ $category->id == $product->category_id ? 'selected' : '' }}>

                        {{ $category->name }}

                    </option>

                @endforeach

            </select>

        </div>

        <div class="mb-3">
            <label>Nama Produk</label>

            <input type="text"
                   name="name"
                   class="form-control"
                   value="{{ $product->name }}">
        </div>

        <div class="mb-3">

    <label class="form-label">
        Brand
    </label>

    <input type="text"
           name="brand"
           class="form-control"
           value="{{ old('brand', $product->brand) }}"
           required>

</div>

        <div class="mb-3">
            <label>Harga</label>

            <input type="number"
                   name="price"
                   class="form-control"
                   value="{{ $product->price }}">
        </div>

        <div class="mb-3">
            <label>Stok</label>

            <input type="number"
                   name="stock"
                   class="form-control"
                   value="{{ $product->stock }}">
        </div>

        <div class="mb-3">

    <label>Ukuran <small class="text-muted">(Opsional)</small></label>

    <input type="text"
           name="size"
           class="form-control"
           placeholder="Contoh: L, XL, 42 (boleh dikosongkan)"
           value="{{ old('size', $product->size) }}">

</div>

        <div class="mb-3">
            <label>Kondisi</label>

            <input type="text"
                   name="condition"
                   class="form-control"
                   value="{{ $product->condition }}">
        </div>

        <div class="mb-3">
            <label>Deskripsi</label>

            <textarea name="description"
                      class="form-control"
                      rows="4">{{ $product->description }}</textarea>
        </div>

        <div class="mb-3">

            <label>Gambar</label>

            <br>

            <img src="{{ asset('products/'.$product->image) }}"
                 width="120"
                 class="mb-3">

            <input type="file"
                   name="image"
                   class="form-control">

        </div>

        <button class="btn btn-success">
            Update Produk
        </button>

        <a href="{{ route('admin.products.index') }}"
           class="btn btn-secondary">
            Kembali
        </a>

    </form>

</div>

@endsection