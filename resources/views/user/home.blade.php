@extends('layouts.app')

@section('content')

<div class="row align-items-center">

    <div class="col-lg-6">

        <h1 class="display-4 fw-bold">
            Welcome to Fashion Thrift Store
        </h1>

        <p class="mt-3 text-secondary">
            Temukan berbagai fashion thrift berkualitas dengan harga terjangkau.
            Mulai dari hoodie, jacket, jeans, hingga aksesoris pilihan.
        </p>

        <a href="{{ route('shop') }}" class="btn btn-dark btn-lg mt-3">
            Shop Now
        </a>

    </div>

    <div class="col-lg-6 text-center">

        <img src="https://images.unsplash.com/photo-1523381210434-271e8be1f52b?w=700"
             class="img-fluid rounded shadow"
             alt="Fashion Thrift">

    </div>

</div>

<hr class="my-5">

@endsection