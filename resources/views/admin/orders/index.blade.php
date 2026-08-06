@extends('layouts.app')

@section('content')

<div class="container">

    <div class="card shadow-sm border-0">

        <div class="card-header bg-dark text-white d-flex justify-content-between align-items-center">
            <div>
                <h4 class="mb-0">📦 Kelola Pesanan</h4>
                <small>Kelola seluruh transaksi pelanggan.</small>
            </div>

            <span class="badge bg-light text-dark fs-6">
                Total : {{ $orders->count() }} Pesanan
            </span>
        </div>

        <div class="card-body">

            @if(session('success'))
                <div class="alert alert-success">
                    {{ session('success') }}
                </div>
            @endif

            <div class="table-responsive">

                <table class="table table-hover align-middle">

                    <thead class="table-dark text-center">

                    <tr>
                        <th>No</th>
                        <th>Pembeli</th>
                        <th width="220">Produk</th>
                        <th>Kurir</th>
                        <th>Metode</th>
                        <th>Status Bayar</th>
                        <th>Status Pesanan</th>
                        <th>Bukti Pengiriman</th>
                        <th>Bukti Transfer</th>
                        <th>Total</th>
                        <th width="180">Aksi</th>
                    </tr>

                    </thead>

                    <tbody>

                    @forelse($orders as $order)

                    <tr>

                        <td class="text-center">
                            {{ $loop->iteration }}
                        </td>

                        <td>
                            <strong>{{ $order->user->name }}</strong>
                        </td>

                        <td>

                            <ul class="mb-0 ps-3">

                                @foreach($order->details as $detail)

                                    <li>{{ $detail->product->name }}</li>

                                @endforeach

                            </ul>

                        </td>

                        <td class="text-center">

                            <span class="badge bg-info text-dark px-3 py-2">
                                {{ $order->courier }}
                            </span>

                        </td>

                        <td class="text-center">

                            @if($order->payment_method == 'COD')

                                <span class="badge bg-warning text-dark px-3 py-2">
                                    COD
                                </span>

                            @else

                                <span class="badge bg-primary px-3 py-2">
                                    Transfer
                                </span>

                            @endif

                        </td>

                        {{-- STATUS BAYAR --}}
                        <td class="text-center">

                            @if($order->payment_status == 'Belum Bayar')

                                <span class="badge bg-danger px-3 py-2">
                                    Belum Bayar
                                </span>

                            @elseif($order->payment_status == 'Menunggu Verifikasi')

                                <span class="badge bg-warning text-dark px-3 py-2">
                                    Menunggu Verifikasi
                                </span>

                            @elseif($order->payment_status == 'Sudah Bayar')

                                <span class="badge bg-success px-3 py-2">
                                    Sudah Bayar
                                </span>

                            @endif

                        </td>

                        {{-- STATUS PESANAN --}}
                        <td class="text-center">

                            @if($order->status == 'pending')

                                <span class="badge bg-warning text-dark px-3 py-2">
                                    Pending
                                </span>

                            @elseif($order->status == 'processing')

                                <span class="badge bg-primary px-3 py-2">
                                    Diproses
                                </span>

                            @elseif($order->status == 'Dikirim ke Kurir')

                                <span class="badge bg-info px-3 py-2">
                                    🚚 Dikirim
                                </span>

                            @elseif($order->status == 'Sedang Diantar')

                                <span class="badge bg-secondary px-3 py-2">
                                    🚛 Diantar
                                </span>

                            @elseif($order->status == 'completed')

                                <span class="badge bg-success px-3 py-2">
                                    ✔ Selesai
                                </span>

                            @else

                                <span class="badge bg-dark">
                                    {{ $order->status }}
                                </span>

                            @endif

                        </td>

                        {{-- Bukti Pengiriman --}}
                        <td class="text-center">

                            @if($order->delivery_proof)

                                <a href="{{ asset('delivery_proofs/'.$order->delivery_proof) }}" target="_blank">

                                    <img
                                        src="{{ asset('delivery_proofs/'.$order->delivery_proof) }}"
                                        width="85"
                                        class="img-thumbnail rounded shadow-sm">

                                </a>

                            @else

                                <span class="badge bg-secondary">
                                    Belum Ada
                                </span>

                            @endif

                        </td>

                        {{-- Bukti Transfer --}}
                        <td class="text-center">

                            @if($order->payment_method == 'COD')

                                @if($order->transfer_proof)

                                    <a href="{{ asset('transfer_proofs/'.$order->transfer_proof) }}" target="_blank">

                                        <img
                                            src="{{ asset('transfer_proofs/'.$order->transfer_proof) }}"
                                            width="85"
                                            class="img-thumbnail rounded shadow-sm">

                                    </a>

                                @else

                                    <span class="badge bg-warning text-dark">
                                        Belum Upload
                                    </span>

                                @endif

                            @else

                                <span class="text-muted">-</span>

                            @endif

                        </td>

                        {{-- Total --}}
                        <td class="text-end">

                            <strong class="text-success">
                                Rp {{ number_format($order->total) }}
                            </strong>

                        </td>

                        {{-- AKSI --}}
                        <td>

                            <div class="d-grid gap-2">

                                <div class="d-inline-block position-relative">

    <a href="{{ route('admin.orders.show', $order->id) }}"
       class="btn btn-primary btn-sm">
        👁 Detail
    </a>

    @if(!$order->admin_read)
        <span class="position-absolute top-0 start-100 translate-middle p-2 bg-danger border border-light rounded-circle">
            <span class="visually-hidden">Belum dibaca</span>
        </span>
    @endif

</div>

                                @if($order->payment_method != 'COD')

                                    @if($order->payment_status == 'Menunggu Verifikasi')

                                        <form action="{{ route('admin.orders.verify',$order->id) }}"
                                              method="POST">

                                            @csrf

                                            <button class="btn btn-success btn-sm w-100">

                                                ✔ Verifikasi

                                            </button>

                                        </form>

                                    @elseif($order->status == 'processing')

                                        <form action="{{ route('admin.orders.sendToCourier',$order->id) }}"
                                              method="POST">

                                            @csrf

                                            <button class="btn btn-warning btn-sm w-100">

                                                🚚 Kirim ke Kurir

                                            </button>

                                        </form>

                                    @elseif($order->status == 'completed')

                                        <button class="btn btn-success btn-sm" disabled>

                                            ✔ Selesai

                                        </button>

                                    @endif

                                @else

                                    @if($order->status == 'pending')

                                        <form action="{{ route('admin.orders.sendToCourier',$order->id) }}"
                                              method="POST">

                                            @csrf

                                            <button class="btn btn-warning btn-sm w-100">

                                                🚚 Kirim ke Kurir

                                            </button>

                                        </form>

                                    @elseif($order->status == 'Dikirim ke Kurir')

                                        <button class="btn btn-info btn-sm" disabled>

                                            🚚 Sudah ke Kurir

                                        </button>

                                    @elseif($order->status == 'Sedang Diantar')

                                        <button class="btn btn-secondary btn-sm" disabled>

                                            🚛 Sedang Diantar

                                        </button>

                                    @elseif($order->status == 'completed')

                                        <button class="btn btn-success btn-sm" disabled>

                                            ✔ Selesai

                                        </button>

                                    @endif

                                @endif

                            </div>

                        </td>

                    </tr>

                    @empty

                    <tr>

                        <td colspan="11" class="text-center py-5">

                            <h5 class="text-muted">

                                Belum ada pesanan.

                            </h5>

                        </td>

                    </tr>

                    @endforelse

                    </tbody>

                </table>

            </div>

        </div>

    </div>

</div>

@endsection