@extends('layouts.app')

@section('content')

<div class="container">

    <h2 class="mb-4">Checkout</h2>

    <div class="card p-4">

        <h4>{{ $product->name }}</h4>

        <img src="{{ asset('products/'.$product->image) }}"
             width="200"
             class="mb-3">

        <p><strong>Harga :</strong> Rp {{ number_format($product->price) }}</p>

        <hr>

        <form action="{{ route('checkout.process',$product->id) }}" method="POST">

            @csrf

            <div class="mb-3">
                <label>Nama Penerima</label>
                <input type="text"
                       name="receiver_name"
                       class="form-control"
                       required>
            </div>

            <div class="mb-3">
                <label>Nomor HP</label>
                <input type="text"
                       name="phone"
                       class="form-control"
                       required>
            </div>

            <div class="mb-3">
                <label>Alamat Lengkap</label>
                <textarea
                    name="address"
                    class="form-control"
                    rows="4"
                    required></textarea>
            </div>

            <!-- TAMBAHAN -->
            <div class="mb-3">
                <label>Jumlah Beli</label>
                <input type="number"
                       name="quantity"
                       class="form-control"
                       value="1"
                       min="1"
                       max="{{ $product->stock }}"
                       required>
                <small class="text-muted">
                    Stok tersedia : {{ $product->stock }}
                </small>
            </div>

            <!-- TAMBAHAN -->
            <div class="mb-3">
                <label>Catatan</label>
                <textarea
                    name="notes"
                    class="form-control"
                    rows="3"
                    placeholder="Contoh: Tolong dikemas dengan rapi (opsional)"></textarea>
            </div>

            <div class="mb-3">

    <label>Kurir</label>

    <select name="courier"
            class="form-control"
            required>

        <option value="">-- Pilih Kurir --</option>

        <option value="J&T Express">J&T Express</option>

        <option value="JNE">JNE</option>

        <option value="SiCepat">SiCepat</option>

        <option value="AnterAja">AnterAja</option>

        <option value="Pos Indonesia">Pos Indonesia</option>

    </select>

</div>

            <div class="mb-3">
                <label>Metode Pembayaran</label>

                <select name="payment_method"
                        id="payment_method"
                        class="form-control"
                        required>

                    <option value="">-- Pilih Metode --</option>

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

        </form>

    </div>

</div>

@endsection