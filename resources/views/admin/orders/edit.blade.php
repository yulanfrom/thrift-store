@extends('layouts.app')

@section('content')

<div class="container">

    <h2>Detail Pesanan</h2>

    <hr>

    <p>
        <strong>Nama Pembeli :</strong>
        {{ $order->user->name }}
    </p>

    <p>
        <strong>Status :</strong>
        {{ ucfirst($order->status) }}
    </p>

    <table class="table table-bordered">

        <thead>

            <tr>
                <th>Produk</th>
                <th>Qty</th>
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
                    Rp {{ number_format($detail->qty * $detail->price) }}
                </td>

            </tr>

        @endforeach

        </tbody>

    </table>

    <h5>
        Total :
        <strong>Rp {{ number_format($order->total) }}</strong>
    </h5>

    <hr>

    <form action="{{ route('admin.orders.update',$order->id) }}" method="POST">

        @csrf
        @method('PUT')

        <input type="hidden"
       name="status"
       value="completed">

        <button class="btn btn-success">
            Tandai Selesai
        </button>

        <a href="{{ route('admin.orders.index') }}"
           class="btn btn-secondary">
            Kembali
        </a>

    </form>

</div>

@endsection