@extends('layouts.app')

@section('content')

<div class="container">

    <h2 class="mb-4">Checkout Barang Terpilih</h2>

    <table class="table table-bordered">

        <thead>
            <tr>
                <th>Foto</th>
                <th>Produk</th>
                <th>Harga</th>
                <th>Qty</th>
                <th>Subtotal</th>
            </tr>
        </thead>

        <tbody>

        @php
            $grandTotal = 0;
        @endphp

        @foreach($carts as $cart)

        @php
            $subtotal = $cart->product->price * $cart->qty;
            $grandTotal += $subtotal;
        @endphp

        <tr>

            <td width="90">
                <img src="{{ asset('products/'.$cart->product->image) }}"
                     width="70"
                     class="img-thumbnail">
            </td>

            <td>{{ $cart->product->name }}</td>

            <td>
                Rp {{ number_format($cart->product->price,0,',','.') }}
            </td>

            <td>{{ $cart->qty }}</td>

            <td>
                Rp {{ number_format($subtotal,0,',','.') }}
            </td>

        </tr>

        @endforeach

        </tbody>

    </table>

    <h4 class="mt-3">
        Total :
        <strong>Rp {{ number_format($grandTotal,0,',','.') }}</strong>
    </h4>

    <hr>

    <form action="{{ route('checkout.selected.process') }}" method="POST">

        @csrf

        @foreach($carts as $cart)
            <input type="hidden" name="cart_ids[]" value="{{ $cart->id }}">
        @endforeach

        <div class="mb-3">

            <label class="form-label">
                Nama Penerima
            </label>

            <input type="text"
                   name="receiver_name"
                   class="form-control"
                   required>

        </div>

        <div class="mb-3">

            <label class="form-label">
                Nomor HP
            </label>

            <input type="text"
                   name="phone"
                   class="form-control"
                   required>

        </div>

        <div class="mb-3">

            <label class="form-label">
                Alamat Lengkap
            </label>

            <textarea name="address"
                      class="form-control"
                      rows="3"
                      required></textarea>

        </div>

        <div class="mb-3">

            <label class="form-label">
                Metode Pembayaran
            </label>

            <select name="payment_method"
                    class="form-select"
                    required>

                <option value="">-- Pilih Metode Pembayaran --</option>

                <option value="COD">
                    COD
                </option>

                <option value="Transfer Bank">
                    Transfer Bank
                </option>

                <option value="E-Wallet">
                    E-Wallet
                </option>

            </select>

        </div>

        <button class="btn btn-success">
            Buat Pesanan
        </button>

        <a href="{{ route('cart') }}"
           class="btn btn-secondary">
            Kembali
        </a>

    </form>

</div>

@endsection