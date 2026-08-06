<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Models\Cart;
use App\Models\Product;
use Illuminate\Http\Request;

class CartController extends Controller
{
    // Menampilkan halaman keranjang
    public function index()
    {
        $carts = Cart::where('user_id', auth()->id())
            ->with('product')
            ->get();

        return view('user.cart', compact('carts'));
    }

    // Tambah ke keranjang
    public function add($id)
    {
        $product = Product::findOrFail($id);

        $cart = Cart::where('user_id', auth()->id())
            ->where('product_id', $id)
            ->first();

        if ($cart) {

            $cart->qty += 1;
            $cart->save();

        } else {

            Cart::create([
                'user_id' => auth()->id(),
                'product_id' => $id,
                'qty' => 1,
            ]);

        }

        return redirect()->route('cart')
            ->with('success', 'Produk berhasil ditambahkan ke keranjang.');
    }

    // Tambah jumlah barang
    public function increase($id)
    {
        $cart = Cart::findOrFail($id);

        $cart->qty += 1;
        $cart->save();

        return back();
    }

    // Kurangi jumlah barang
    public function decrease($id)
    {
        $cart = Cart::findOrFail($id);

        if ($cart->qty > 1) {

            $cart->qty -= 1;
            $cart->save();

        } else {

            $cart->delete();

        }

        return back();
    }

    // Hapus produk dari keranjang
    public function remove($id)
    {
        Cart::findOrFail($id)->delete();

        return back()->with('success', 'Produk berhasil dihapus.');
    }
}