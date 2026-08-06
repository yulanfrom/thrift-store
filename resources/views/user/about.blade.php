@extends('layouts.app')

@section('content')

<!-- Banner -->
<div class="container-fluid p-0 mb-5">
    <div class="position-relative">

        <img src="{{ asset('images/about-banner.jpg') }}"
             class="w-100"
             style="height:420px; object-fit:cover;">

        <div class="position-absolute top-50 start-50 translate-middle text-center text-white">

        </div>

    </div>
</div>

<div class="container">

    <!-- Cerita -->
    <div class="row align-items-center justify-content-center mb-5">

    <div class="col-lg-5 text-center">

        <video
            class="rounded shadow"
            width="420"
            autoplay
            muted
            loop
            playsinline
            controls
            style="max-width:100%; border-radius:20px;">

            <source src="{{ asset('images/about-store.mp4') }}" type="video/mp4">

            Browser Anda tidak mendukung video.

        </video>

    </div>

    <div class="col-lg-6">

        <h2 class="fw-bold mb-4 display-6">
            Our Story
        </h2>

        <p class="text-muted fs-5" style="line-height:1.9; text-align:justify;">

            Fashion Thrift Store hadir untuk memberikan pilihan fashion thrift
            berkualitas dengan harga yang terjangkau. Kami percaya bahwa setiap
            pakaian memiliki cerita dan layak mendapatkan kesempatan kedua.

        </p>

        <p class="text-muted fs-5" style="line-height:1.9; text-align:justify;">

            Melalui konsep sustainable fashion, kami menghadirkan koleksi pilihan
            yang unik, stylish, dan ramah lingkungan. Setiap produk telah melalui
            proses seleksi agar pelanggan mendapatkan kualitas terbaik dengan
            pengalaman berbelanja yang menyenangkan.

        </p>

    </div>

</div>

    <!-- Visi Misi -->
    <div class="row text-center mb-5">

        <div class="col-md-4">

            <div class="card border-0 shadow-sm p-4 h-100">

                <i class="bi bi-bullseye fs-1 text-primary"></i>

                <h4 class="mt-3">
                    Vision
                </h4>

                <p class="text-muted">
                    Menjadi thrift store terpercaya dengan produk berkualitas
                    dan harga terbaik.
                </p>

            </div>

        </div>

        <div class="col-md-4">

            <div class="card border-0 shadow-sm p-4 h-100">

                <i class="bi bi-heart-fill fs-1 text-danger"></i>

                <h4 class="mt-3">
                    Mission
                </h4>

                <p class="text-muted">
                    Mendukung sustainable fashion dengan menyediakan
                    pakaian thrift yang layak pakai.
                </p>

            </div>

        </div>

        <div class="col-md-4">

            <div class="card border-0 shadow-sm p-4 h-100">

                <i class="bi bi-stars fs-1 text-warning"></i>

                <h4 class="mt-3">
                    Quality
                </h4>

                <p class="text-muted">
                    Semua produk dipilih dan diperiksa sebelum dijual
                    kepada pelanggan.
                </p>

            </div>

        </div>

    </div>

    <!-- Kenapa memilih kami -->
    <div class="text-center mb-5">

        <h2 class="fw-bold mb-4">
            Why Choose Us?
        </h2>

        <div class="row">

            <div class="col-md-3">

                <i class="bi bi-patch-check-fill fs-1 text-success"></i>

                <h5 class="mt-3">Original Items</h5>

            </div>

            <div class="col-md-3">

                <i class="bi bi-cash-stack fs-1 text-primary"></i>

                <h5 class="mt-3">Affordable Price</h5>

            </div>

            <div class="col-md-3">

                <i class="bi bi-recycle fs-1 text-success"></i>

                <h5 class="mt-3">Eco Friendly</h5>

            </div>

            <div class="col-md-3">

                <i class="bi bi-truck fs-1 text-warning"></i>

                <h5 class="mt-3">Fast Delivery</h5>

            </div>

        </div>

    </div>

</div>

<style>

video{
    transition:.4s;
}

video:hover{
    transform:scale(1.03);
    box-shadow:0 15px 35px rgba(0,0,0,.2);
}

</style>

@endsection