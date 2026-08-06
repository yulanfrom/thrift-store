@extends('layouts.app')

@section('content')

<div class="container">

    <h2 class="mb-4">Edit Kategori</h2>

    <form action="{{ route('admin.categories.update', $category->id) }}" method="POST">

        @csrf
        @method('PUT')

        <div class="mb-3">

            <label class="form-label">Nama Kategori</label>

            <input type="text"
                   name="name"
                   class="form-control"
                   value="{{ $category->name }}"
                   required>

        </div>

        <div class="mb-3">

    <label class="form-label">Deskripsi</label>

    <textarea
        name="description"
        class="form-control"
        rows="4"
        placeholder="Masukkan deskripsi kategori">{{ old('description', $category->description) }}</textarea>

    @error('description')
        <small class="text-danger">
            {{ $message }}
        </small>
    @enderror

</div>

        <button type="submit" class="btn btn-primary">
            Update
        </button>

        <a href="{{ route('admin.categories.index') }}"
           class="btn btn-secondary">
            Kembali
        </a>

    </form>

</div>

@endsection