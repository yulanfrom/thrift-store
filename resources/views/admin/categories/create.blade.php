@extends('layouts.app')

@section('content')

<div class="container py-5">

    <div class="card shadow border-0 rounded-4">

        <div class="card-header bg-dark text-white">
            <h4 class="mb-0">
                <i class="bi bi-folder-plus"></i> Tambah Kategori
            </h4>
        </div>

        <div class="card-body">

            <form action="{{ route('admin.categories.store') }}" method="POST">

                @csrf

                <div class="mb-3">

                    <label class="form-label fw-semibold">
                        Nama Kategori
                    </label>

                    <input type="text"
                           name="name"
                           class="form-control @error('name') is-invalid @enderror"
                           placeholder="Masukkan nama kategori"
                           value="{{ old('name') }}"
                           required>

                    @error('name')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                    @enderror

                </div>

                <div class="mb-3">

    <label class="form-label">Deskripsi</label>

    <textarea
        name="description"
        class="form-control"
        rows="4"
        placeholder="Contoh: Berisi berbagai jenis hijab seperti pashmina, segi empat, bergo, dan instan.">{{ old('description') }}</textarea>

    @error('description')
        <small class="text-danger">
            {{ $message }}
        </small>
    @enderror

</div>

                <button type="submit" class="btn btn-success">
                    <i class="bi bi-check-circle"></i> Simpan
                </button>

                <a href="{{ route('admin.categories.index') }}"
                   class="btn btn-secondary">
                    <i class="bi bi-arrow-left"></i> Kembali
                </a>

            </form>

        </div>

    </div>

</div>

@endsection