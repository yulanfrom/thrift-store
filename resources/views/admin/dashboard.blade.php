@extends('layouts.app')

@section('content')

<div class="container py-4">

    <div class="text-center mb-5">

        <h1 class="fw-bold">
            Dashboard Admin
        </h1>

        <p class="text-muted fs-5">
            Selamat datang 👋 Kelola seluruh data Fashion Thrift Store dengan mudah.
        </p>

    </div>

    <div class="row g-4">

        <!-- Produk -->
        <div class="col-md-3">

            <a href="{{ route('admin.products.index') }}" class="text-decoration-none">

                <div class="card admin-card border-0 shadow-lg h-100">

                    <div class="card-body text-center py-5">

                        <div class="icon-circle bg-primary text-white mb-3">
                            <i class="bi bi-box-seam-fill fs-2"></i>
                        </div>

                        <h4 class="fw-bold">
                            Kelola Produk
                        </h4>

                        <p class="text-muted">
                            Tambah, ubah, dan hapus produk thrift.
                        </p>

                    </div>

                </div>

            </a>

        </div>

        <!-- Kategori -->
        <div class="col-md-3">

            <a href="{{ route('admin.categories.index') }}" class="text-decoration-none">

                <div class="card admin-card border-0 shadow-lg h-100">

                    <div class="card-body text-center py-5">

                        <div class="icon-circle bg-success text-white mb-3">
                            <i class="bi bi-folder-fill fs-2"></i>
                        </div>

                        <h4 class="fw-bold">
                            Kelola Kategori
                        </h4>

                        <p class="text-muted">
                            Atur seluruh kategori produk.
                        </p>

                    </div>

                </div>

            </a>

        </div>

        <!-- Pesanan -->
        <div class="col-md-3">

            <a href="{{ route('admin.orders.index') }}" class="text-decoration-none">

                <div class="card admin-card border-0 shadow-lg h-100">

                    <div class="card-body text-center py-5">

                        <div class="icon-circle bg-warning text-white mb-3">
                            <i class="bi bi-cart-check-fill fs-2"></i>
                        </div>

                        <h4 class="fw-bold text-dark">
                            Kelola Pesanan
                        </h4>

                        <p class="text-muted">
                            Lihat dan proses pesanan pelanggan.
                        </p>

                    </div>

                </div>

            </a>

        </div>

        <!-- Laporan -->
        <div class="col-md-3">

            <a href="{{ route('admin.reports.index') }}" class="text-decoration-none">

                <div class="card admin-card border-0 shadow-lg h-100">

                    <div class="card-body text-center py-5">

                        <div class="icon-circle bg-danger text-white mb-3">
                            <i class="bi bi-file-earmark-bar-graph-fill fs-2"></i>
                        </div>

                        <h4 class="fw-bold">
                            Laporan
                        </h4>

                        <p class="text-muted">
                            Lihat laporan transaksi dan pendapatan.
                        </p>

                    </div>

                </div>

            </a>

        </div>

    </div>

</div>

<style>

.admin-card{
    border-radius:20px;
    transition:.35s;
    overflow:hidden;
}

.admin-card:hover{
    transform:translateY(-10px);
    box-shadow:0 20px 40px rgba(0,0,0,.15)!important;
}

.icon-circle{
    width:85px;
    height:85px;
    border-radius:50%;
    display:flex;
    align-items:center;
    justify-content:center;
    margin:auto;
    transition:.35s;
}

.admin-card:hover .icon-circle{
    transform:rotate(10deg) scale(1.15);
}

.admin-card h4{
    margin-top:15px;
}

</style>

@endsection