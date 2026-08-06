@extends('layouts.app')

@section('content')

<div class="container mt-5">

    <div class="card p-4">

        <h2 class="text-success">🎉 Pesanan Berhasil Dibuat</h2>

        <hr>

        <p>
            <strong>Metode Pembayaran :</strong>
            {{ $order->payment_method }}
        </p>

        <p>
    <strong>Kurir :</strong>
    {{ $order->courier }}
</p>

        <p>
            <strong>Status Pembayaran :</strong>
            {{ $order->payment_status }}
        </p>

        <p>
    <strong>Total :</strong>
    Rp {{ number_format($order->total) }}
</p>

<p>
    <strong>Jumlah Beli :</strong>
    {{ $order->quantity }}
</p>

<p>
    <strong>Catatan :</strong>
    {{ $order->notes ?? '-' }}
</p>

        <hr>

        @if($order->payment_method == 'COD')

    <div class="alert alert-success">

        <h5>Pembayaran COD</h5>

        Barang akan dikirim menggunakan
        <b>{{ $order->courier }}</b>.

        <hr>

        Saat barang diterima, silakan lakukan pembayaran
        langsung kepada kurir.

        <br><br>

        Setelah kurir menyerahkan uang kepada toko,
        admin akan melakukan verifikasi pembayaran.

    </div>

@elseif($order->payment_method == 'Transfer Bank')

    <div class="alert alert-warning">

        <h5>Transfer ke rekening berikut:</h5>

        <hr>

        <b>Bank BCA</b><br>
        No. Rekening : <b>1234567890</b><br>
        A/N : <b>Fashion Thrift Store</b>

        <hr>

        Setelah transfer, klik tombol
        <b>"Saya Sudah Transfer"</b>.

    </div>

    <form action="{{ route('payment.confirm', $order->id) }}"
          method="POST">

        @csrf

        <button class="btn btn-success">
            Saya Sudah Transfer
        </button>

    </form>

@elseif($order->payment_method == 'E-Wallet')

    <div class="alert alert-info">

        <h5>Pembayaran E-Wallet</h5>

        Dana / OVO / GoPay

        <br><br>

        <b>08123456789</b>

        <hr>

        Setelah bayar klik tombol di bawah.

    </div>

    <form action="{{ route('payment.confirm', $order->id) }}"
          method="POST">

        @csrf

        <button class="btn btn-success">
            Saya Sudah Bayar
        </button>

    </form>

@endif

        <a href="{{ route('shop') }}"
           class="btn btn-primary mt-3">

            Kembali Belanja

        </a>

    </div>

</div>

@endsection