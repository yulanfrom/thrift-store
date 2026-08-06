@extends('layouts.app')

@section('content')

<div class="container py-4">


    <div class="card shadow">

        <div class="card-header">
            <h4>Detail Pesanan</h4>
        </div>

        <div class="card-body">

            <h5>Produk</h5>

            @foreach($order->details as $detail)

                <div class="mb-3">

                    <strong>{{ $detail->product->name }}</strong><br>

                    Jumlah : {{ $detail->quantity }}

                </div>

            @endforeach

            <hr>

            <p>
                <strong>Total :</strong>

                Rp {{ number_format($order->total) }}
            </p>

            <p>
                <strong>Status :</strong>

                {{ $order->status }}
            </p>

            <p>
                <strong>Kurir :</strong>

                {{ $order->courier }}
            </p>

            <p>
                <strong>Alamat :</strong>

                {{ $order->address }}
            </p>

            <hr>

            <h5>Bukti Pengiriman</h5>

            @if($order->delivery_proof)

            <p>{{ url('delivery_proofs/'.$order->delivery_proof) }}</p>

    <div class="text-center mt-3">
    <img src="{{ asset('delivery_proofs/' . $order->delivery_proof) }}"
         alt="Bukti Pengiriman"
         class="img-thumbnail shadow"
          style="width:350px; height:auto; object-fit:cover;">

    <p class="text-muted mt-2">
        Bukti pengiriman dari kurir
    </p>
</div>

@else

    <div class="alert alert-warning">
        Belum ada bukti pengiriman.
    </div>

@endif

        </div>

    </div>

</div>

<a href="{{ route('user.orders') }}" class="btn btn-secondary mb-3">
        ← Kembali ke My Orders
    </a>

@endsection