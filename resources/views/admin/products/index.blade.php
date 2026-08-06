@extends('layouts.app')

@section('content')

<div class="container">

    @if(session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif

    <div class="d-flex justify-content-between align-items-center mb-4">

        <h2>Kelola Produk</h2>

        <a href="{{ route('admin.products.create') }}" class="btn btn-primary">
            + Tambah Produk
        </a>

    </div>

    <table class="table table-bordered table-striped">

        <thead class="table-dark">

            <tr>
                <th>No</th>
                <th>Foto</th>
                <th>Nama Produk</th>
                <th>Brand</th>
                <th>Harga</th>
                <th>Stok</th>
                <th width="180">Aksi</th>
            </tr>

        </thead>

        <tbody>

        @forelse($products as $product)

            <tr>

                <td>{{ $loop->iteration }}</td>

                <td>
                    <img src="{{ asset('products/'.$product->image) }}"
                         width="80"
                         height="80"
                         style="object-fit:cover;">
                </td>

                <td>{{ $product->name }}</td>

                <td>{{ $product->brand }}</td>

                <td>
                    Rp {{ number_format($product->price,0,',','.') }}
                </td>

                <td>{{ $product->stock }}</td>

                <td>

                    <a href="{{ route('admin.products.show', $product->id) }}"
                        class="btn btn-info btn-sm">
                         Detail
                    </a>

                    <a href="{{ route('admin.products.edit', $product->id) }}"
                       class="btn btn-warning btn-sm">
                        Edit
                    </a>

                    <form action="{{ route('admin.products.destroy', $product->id) }}"
                          method="POST"
                          style="display:inline;">

                        @csrf
                        @method('DELETE')

                        <button type="submit"
                                class="btn btn-danger btn-sm"
                                onclick="return confirm('Yakin ingin menghapus produk ini?')">
                            Hapus
                        </button>

                    </form>

                </td>

            </tr>

        @empty

            <tr>

                <td colspan="7" class="text-center">
                    Belum ada produk.
                </td>

            </tr>

        @endforelse

        </tbody>

    </table>

</div>

@endsection