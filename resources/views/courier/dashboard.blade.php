@extends('layouts.app')

@section('content')

<div class="container py-4">

    <h2 class="mb-4">
        Dashboard Kurir
    </h2>

    @if(session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif

    <div class="card">

        <div class="card-header bg-primary text-white">
            Daftar Pesanan
        </div>

        <div class="card-body">

            <table class="table table-bordered align-middle">

                <thead>
                    <tr>
                        <th>No</th>
                        <th>Pembeli</th>
                        <th>No HP</th>
                        <th>Alamat</th>
                        <th>Kurir</th>
                        <th>Metode Bayar</th>
                        <th>Status</th>
                        <th width="280">Aksi</th>
                    </tr>
                </thead>

                <tbody>

                @forelse($orders as $order)

                    <tr>

                        <td>{{ $loop->iteration }}</td>

                        <td>{{ $order->user->name }}</td>

                        <td>{{ $order->phone }}</td>

                        <td>{{ $order->address }}</td>

                        <td>{{ $order->courier }}</td>

                        <td>
                            {{ $order->payment_method }}
                        </td>

                        <td>

                            @if($order->status == 'Dikirim ke Kurir')

                                <span class="badge bg-warning text-dark">
                                    🚚 Dikirim ke Kurir
                                </span>

                            @elseif($order->status == 'Sedang Diantar')

                                <span class="badge bg-primary">
                                    🚛 Sedang Diantar
                                </span>

                            @elseif($order->status == 'completed')

                                <span class="badge bg-success">
                                    ✔ Selesai
                                </span>

                            @else

                                <span class="badge bg-secondary">
                                    {{ $order->status }}
                                </span>

                            @endif

                        </td>

                        <td>

                            {{-- ========================= --}}
                            {{-- 1. Dikirim ke Kurir --}}
                            {{-- ========================= --}}
                            @if($order->status == 'Dikirim ke Kurir')

                                <form action="{{ route('courier.orders.deliver', $order->id) }}"
                                      method="POST">

                                    @csrf

                                    <button type="submit"
                                            class="btn btn-primary btn-sm">
                                        🚚 Antar Paket
                                    </button>

                                </form>

                            {{-- ========================= --}}
{{-- 2. Sedang Diantar --}}
{{-- ========================= --}}
@elseif($order->status == 'Sedang Diantar')

    {{-- Kalau bukti pengiriman BELUM ada --}}
    @if(!$order->delivery_proof)

        <form action="{{ route('courier.orders.uploadProof', $order->id) }}"
              method="POST"
              enctype="multipart/form-data">

            @csrf

            <input type="file"
                   name="delivery_proof"
                   class="form-control form-control-sm mb-2"
                   accept="image/*"
                   required>

            <button type="submit"
                    class="btn btn-success btn-sm">
                📷 Upload Bukti Pengiriman
            </button>

        </form>

    @else

        <span class="badge bg-success d-block mb-3">
            ✔ Bukti Pengiriman Berhasil Diupload
        </span>

        {{-- Setelah bukti pengiriman ada, baru tampil upload transfer COD --}}
        @if($order->payment_method == 'COD')

            @if($order->transfer_proof)

                <span class="badge bg-info">
                    💰 Bukti Transfer COD Sudah Diupload
                </span>

            @else

                <form action="{{ route('courier.orders.uploadTransfer', $order->id) }}"
                      method="POST"
                      enctype="multipart/form-data">

                    @csrf

                    <label class="form-label fw-bold">
                        Upload Bukti Transfer COD
                    </label>

                    <input type="file"
                           name="transfer_proof"
                           class="form-control form-control-sm mb-2"
                           accept="image/*"
                           required>

                    <button type="submit"
                            class="btn btn-success btn-sm">
                        💰 Upload Bukti Transfer
                    </button>

                </form>

            @endif

        @endif

    @endif

                            {{-- ========================= --}}
{{-- 3. Pesanan Selesai --}}
{{-- ========================= --}}
@elseif($order->status == 'completed')

    <span class="badge bg-success">
        ✔ Pengiriman Selesai
    </span>

    @if($order->payment_method == 'COD' && $order->transfer_proof)

        <br><br>

        <span class="badge bg-info">
            💰 Bukti Transfer COD Sudah Diupload
        </span>

    @endif

@endif


                        </td>

                    </tr>

                @empty

                    <tr>

                        <td colspan="8" class="text-center">
                            Belum ada pesanan.
                        </td>

                    </tr>

                @endforelse

                </tbody>

            </table>

        </div>

    </div>

</div>

@endsection