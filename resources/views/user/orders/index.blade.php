@extends('layouts.app')

@section('content')

<div class="container py-4">

    <h2 class="mb-4">My Orders</h2>

    {{-- Pesan Berhasil --}}
    @if(session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif

    <div class="card shadow">

        <div class="card-body">

            <table class="table table-bordered align-middle">

                <thead>
                    <tr>
                        <th>No</th>
                        <th>Produk</th>
                        <th>Total</th>
                        <th>Status</th>
                        <th>Bukti Pengiriman</th>
                        <th>Aksi</th>
                    </tr>
                </thead>

                <tbody>

                @forelse($orders as $order)

                    <tr>

                        <td>{{ $loop->iteration }}</td>

                        {{-- Nama Produk --}}
                        <td>
                            @foreach($order->details as $detail)
                                <div class="mb-2">
                                    {{ $detail->product->name }}
                                </div>
                            @endforeach
                        </td>

                        {{-- Total --}}
                        <td>
                            Rp {{ number_format($order->total) }}
                        </td>

                        {{-- Status --}}
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

                        {{-- Bukti Pengiriman --}}
                        <td>

                            @if($order->delivery_proof)

                               <a href="{{ route('user.orders.show', $order->id) }}"
   class="btn btn-info btn-sm">

    👁️ Detail

</a>
                            @else

                                <span class="text-muted">
                                    Belum Ada
                                </span>

                            @endif

                        </td>

                        {{-- Aksi --}}
                        <td>

                            @if($order->status == 'Sedang Diantar')

                                <form action="{{ route('user.orders.complete', $order->id) }}" method="POST">

                                    @csrf

                                    <button type="submit" class="btn btn-success btn-sm">
                                        ✅ Barang Diterima
                                    </button>

                                </form>

                            @elseif($order->status == 'completed')

                                <span class="badge bg-success">
                                    ✔ Pesanan Selesai
                                </span>

                            @else

                                <span class="text-muted">
                                    -
                                </span>

                            @endif

                        </td>

                    </tr>

                @empty

                    <tr>

                        <td colspan="6" class="text-center">
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