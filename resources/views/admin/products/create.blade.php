@extends('layouts.app')

@section('content')

<div class="container">

    <h2 class="mb-4">Tambah Produk</h2>

    @if ($errors->any())
    <div class="alert alert-danger">
        <ul class="mb-0">
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif

    <form action="{{ route('admin.products.store') }}"
      method="POST"
      enctype="multipart/form-data">

        @csrf

        <div class="mb-3">
            <label>Kategori</label>

            <select name="category_id" class="form-control">

                @foreach($categories as $category)

                    <option value="{{ $category->id }}">
                        {{ $category->name }}
                    </option>

                @endforeach

            </select>
        </div>

        <div class="mb-3">
            <label>Nama Produk</label>
            <input type="text" name="name" class="form-control">
        </div>

        <div class="mb-3">

    <label class="form-label">
        Brand
    </label>

    <input type="text"
           name="brand"
           class="form-control"
           placeholder="Contoh: Nike, Adidas, Uniqlo"
           value="{{ old('brand') }}"
           required>

</div>

        <div class="mb-3">
            <label>Harga</label>
            <input type="number" name="price" class="form-control">
        </div>

        <div class="mb-3">
            <label>Stok</label>
            <input type="number" name="stock" class="form-control">
        </div>

        <div class="mb-3">
    <label>Ukuran <small class="text-muted">(Opsional)</small></label>

    <input type="text"
           name="size"
           class="form-control"
           placeholder="Contoh: L, XL, 42 (boleh dikosongkan)"
           value="{{ old('size') }}">
</div>

        <div class="mb-3">
            <label>Kondisi</label>
            <input type="text" name="condition" class="form-control">
        </div>

        <div class="mb-3">
            <label>Deskripsi</label>
            <textarea name="description" class="form-control"></textarea>
        </div>

        <div class="mb-3">

    <label>Foto Produk</label>

    <input
        type="file"
        name="image"
        class="form-control">

</div>

        <button class="btn btn-success">
            Simpan Produk
        </button>

    </form>

</div>

@endsection