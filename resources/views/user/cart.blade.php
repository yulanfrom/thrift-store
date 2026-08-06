@extends('layouts.app')

@section('content')

<h2 class="mb-4">Keranjang Belanja</h2>

@if(session('success'))
<div class="alert alert-success">
    {{ session('success') }}
</div>
@endif

@if($carts->count())

<table class="table table-bordered">

    <thead>
        <tr>
            <th>Pilih</th>
            <th>Foto</th>
            <th>Produk</th>
            <th>Harga</th>
            <th>Jumlah</th>
            <th>Total</th>
            <th>Aksi</th>
        </tr>
    </thead>

    <tbody>

    @php
        $grandTotal = 0;
    @endphp

    @foreach($carts as $cart)

    @php
        $total = $cart->product->price * $cart->qty;
        $grandTotal += $total;
    @endphp

    <tr>

        <td>
            <input type="checkbox"
                   class="cart-check"
                   name="cart_ids[]"
                   value="{{ $cart->id }}"
                   data-total="{{ $total }}">
        </td>

        <td width="90">
            <img src="{{ asset('products/'.$cart->product->image) }}"
                 width="70"
                 height="70"
                 style="object-fit:cover;border-radius:8px;">
        </td>

        <td>
            {{ $cart->product->name }}
        </td>

        <td>
            Rp {{ number_format($cart->product->price,0,',','.') }}
        </td>

        <td>

            <div class="d-flex align-items-center">

                <form action="{{ route('cart.decrease',$cart->id) }}"
                      method="POST"
                      class="me-2">

                    @csrf

                    <button type="submit"
                            class="btn btn-danger btn-sm">
                        -
                    </button>

                </form>

                <strong>{{ $cart->qty }}</strong>

                <form action="{{ route('cart.increase',$cart->id) }}"
                      method="POST"
                      class="ms-2">

                    @csrf

                    <button type="submit"
                            class="btn btn-success btn-sm">
                        +
                    </button>

                </form>

            </div>

        </td>

        <td>
            Rp {{ number_format($total,0,',','.') }}
        </td>

        <td>

            <form action="{{ route('cart.remove',$cart->id) }}"
                  method="POST">

                @csrf
                @method('DELETE')

                <button class="btn btn-danger btn-sm">
                    Hapus
                </button>

            </form>

        </td>

    </tr>

    @endforeach

    </tbody>

</table>

<h4 class="mt-3">
    Total Belanja :
    <strong id="selectedTotal">
        Rp 0
    </strong>
</h4>

<div class="mt-4">

    <a href="{{ route('shop') }}"
       class="btn btn-secondary">
        ← Lanjut Belanja
    </a>

    <button type="button"
            class="btn btn-success"
            onclick="checkoutSelected()">
        Checkout Barang Terpilih
    </button>

</div>

<form id="checkoutForm"
      action="{{ route('checkout.selected') }}"
      method="POST"
      style="display:none;">

    @csrf

</form>

<script>

function checkoutSelected(){

    let form = document.getElementById('checkoutForm');

    form.innerHTML = '@csrf';

    document.querySelectorAll('.cart-check:checked').forEach(function(item){

        form.innerHTML +=
            '<input type="hidden" name="cart_ids[]" value="'+item.value+'">';

    });

    form.submit();

}

// =======================
// TOTAL OTOMATIS
// =======================

function updateTotal(){

    let total = 0;

    document.querySelectorAll('.cart-check:checked').forEach(function(item){

        total += parseInt(item.dataset.total);

    });

    document.getElementById('selectedTotal').innerHTML =
        'Rp ' + total.toLocaleString('id-ID');

}

document.querySelectorAll('.cart-check').forEach(function(item){

    item.addEventListener('change', updateTotal);

});

// Saat halaman pertama dibuka
updateTotal();

</script>

@else

<div class="alert alert-warning">
    Keranjang masih kosong.
</div>

<a href="{{ route('shop') }}" class="btn btn-primary">
    Belanja Sekarang
</a>

@endif

@endsection