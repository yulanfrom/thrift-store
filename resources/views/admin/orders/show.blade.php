@extends('layouts.app')

@section('content')

<div class="container py-4">


    <div class="card shadow">

        <div class="card-header">
            <h3>Detail Pesanan</h3>
        </div>

        <div class="card-body">

            <h5>Data Pembeli</h5>

            <table class="table table-bordered">

                <tr>
                    <th width="220">Nama Pembeli</th>
                    <td>{{ $order->user->name }}</td>
                </tr>

                <tr>
                    <th>Penerima</th>
                    <td>{{ $order->receiver_name }}</td>
                </tr>

                <tr>
                    <th>No HP</th>
                    <td>{{ $order->phone }}</td>
                </tr>

                <tr>
                    <th>Alamat</th>
                    <td>{{ $order->address }}</td>
                </tr>

                <tr>
                    <th>Kurir</th>
                    <td>{{ $order->courier }}</td>
                </tr>

                <tr>
                    <th>Metode Pembayaran</th>
                    <td>{{ $order->payment_method }}</td>
                </tr>

                <tr>
                    <th>Status Pembayaran</th>
                    <td>{{ $order->payment_status }}</td>
                </tr>

                <tr>
                    <th>Status Pesanan</th>
                    <td>{{ $order->status }}</td>
                </tr>

            </table>

            <hr>

            <h5>Daftar Produk</h5>

            <table class="table table-bordered">

    <thead>
        <tr>
            <th>Produk</th>
            <th>Jumlah</th>
            <th>Harga</th>
            <th>Subtotal</th>
        </tr>
    </thead>

    <tbody>

    @foreach($order->details as $detail)

        <tr>

            <td>{{ $detail->product->name }}</td>

            <td>{{ $detail->qty }}</td>

            <td>
                Rp {{ number_format($detail->price) }}
            </td>

            <td>
                Rp {{ number_format($detail->price * $detail->qty) }}
            </td>

        </tr>

    @endforeach

    </tbody>

</table>

            <h4 class="mt-4">
                Total : Rp {{ number_format($order->total) }}
            </h4>

            <hr>

<h5>Catatan Pembeli</h5>

@if($order->notes)

    <div class="alert alert-info">
        {{ $order->notes }}
    </div>

@else

    <div class="text-muted">
        Tidak ada catatan.
    </div>

@endif

            <hr>

            <h5>Bukti Pengiriman</h5>

            @if($order->delivery_proof)

                <img src="{{ asset('delivery_proofs/'.$order->delivery_proof) }}"
                     class="img-fluid rounded shadow mb-3"
                     style="max-width:350px">

            @else

                <div class="alert alert-warning">
                    Belum ada bukti pengiriman.
                </div>

            @endif

            {{-- KHUSUS COD --}}
            @if($order->payment_method == 'COD')

                <hr>

                <h5>Bukti Transfer dari Kurir</h5>

                @if($order->transfer_proof)

                    <img src="{{ asset('transfer_proofs/'.$order->transfer_proof) }}"
                         class="img-fluid rounded shadow mb-3"
                         style="max-width:350px">

                    <br>

                    @if($order->payment_status != 'Sudah Bayar')

                        <form action="{{ route('admin.orders.confirmTransfer', $order->id) }}"
                              method="POST">

                            @csrf

                            <button type="submit" class="btn btn-success">
                                ✔ Konfirmasi Transfer Kurir
                            </button>

                        </form>

                    @else

                        <span class="badge bg-success fs-6">
                            ✔ Transfer Sudah Dikonfirmasi
                        </span>

                    @endif

                @else

                    <div class="alert alert-warning">
                        Kurir belum upload bukti transfer COD.
                    </div>

                @endif

            @endif

        </div>

    </div>

</div>

<a href="{{ route('admin.orders.index') }}" class="btn btn-secondary mb-3">
        ← Kembali
    </a>

@endsection