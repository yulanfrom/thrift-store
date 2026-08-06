@extends('layouts.app')

@section('content')

<div class="container">

    <h2 class="mb-4">📊 Laporan Penjualan</h2>

    {{-- Filter Tanggal --}}
    <div class="card mb-4">
        <div class="card-body">

            <form method="GET" action="{{ route('admin.reports.index') }}">

                <div class="row">

                    <div class="col-md-4">
                        <label>Tanggal Awal</label>
                        <input type="date"
                               name="start_date"
                               class="form-control"
                               value="{{ request('start_date') }}">
                    </div>

                    <div class="col-md-4">
                        <label>Tanggal Akhir</label>
                        <input type="date"
                               name="end_date"
                               class="form-control"
                               value="{{ request('end_date') }}">
                    </div>

                    <div class="col-md-4 d-flex align-items-end">

                        <button class="btn btn-primary me-2">
                            🔍 Filter
                        </button>

                        <a href="{{ route('admin.reports.index') }}"
                           class="btn btn-secondary">
                            Reset
                        </a>

                    </div>

                </div>

            </form>

        </div>
    </div>

    {{-- Tabel --}}
    <div class="card">

        <div class="card-header bg-success text-white">
            Daftar Transaksi Selesai
        </div>

        <div class="card-body">

            <table class="table table-bordered">

                <thead>

                    <tr>
                        <th>No</th>
                        <th>Tanggal</th>
                        <th>Pembeli</th>
                        <th>Produk</th>
                        <th>Kurir</th>
                        <th>Metode</th>
                        <th>Total</th>
                        <th>Status</th>
                    </tr>

                </thead>

                <tbody>

                @forelse($orders as $order)

                    <tr>

                        <td>{{ $loop->iteration }}</td>

                        <td>{{ $order->created_at->format('d-m-Y') }}</td>

                        <td>{{ $order->user->name }}</td>

                        <td>
                            @foreach($order->details as $detail)
                                {{ $detail->product->name }}<br>
                            @endforeach
                        </td>

                        <td>{{ $order->courier }}</td>

                        <td>{{ $order->payment_method }}</td>

                        <td>
                            Rp {{ number_format($order->total,0,',','.') }}
                        </td>

                        <td>

                            <span class="badge bg-success">
                                Selesai
                            </span>

                        </td>

                    </tr>

                @empty

                    <tr>

                        <td colspan="8" class="text-center">
                            Tidak ada data.
                        </td>

                    </tr>

                @endforelse

                </tbody>

            </table>

        </div>

    </div>

    {{-- Ringkasan --}}
    <div class="row mt-4">

        <div class="col-md-6">

            <div class="card">

                <div class="card-body">

                    <h5>Jumlah Transaksi</h5>

                    <h3>{{ $jumlahTransaksi }}</h3>

                </div>

            </div>

        </div>

        <div class="col-md-6">

            <div class="card">

                <div class="card-body">

                    <h5>Total Pendapatan</h5>

                    <h3>
                        Rp {{ number_format($totalPendapatan,0,',','.') }}
                    </h3>

                </div>

            </div>

        </div>

    </div>

</div>

@endsection