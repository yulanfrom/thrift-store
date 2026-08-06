<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Models\Product;
use App\Models\Order;
use App\Models\OrderDetail;
use App\Models\Cart;
use Illuminate\Http\Request;

class CheckoutController extends Controller
{
    public function index($id)
    {
        $product = Product::findOrFail($id);

        return view('user.checkout', compact('product'));
    }

    public function process(Request $request, $id)
    {
        $request->validate([
            'receiver_name' => 'required',
            'phone' => 'required',
            'address' => 'required',
            'courier' => 'required',
            'payment_method' => 'required',
            'quantity' => 'required|integer|min:1',
            'notes' => 'nullable|string',
        ]);

        $product = Product::findOrFail($id);

        if ($product->stock < $request->quantity) {
            return back()->with('error', 'Stok produk tidak mencukupi.');
        }

        // Status pembayaran sesuai metode
        if ($request->payment_method == 'COD') {
            $paymentStatus = 'Belum Bayar';
        } else {
            $paymentStatus = 'Menunggu Verifikasi';
        }

        $total = $product->price * $request->quantity;

        $order = Order::create([
            'user_id' => auth()->id(),
            'receiver_name' => $request->receiver_name,
            'phone' => $request->phone,
            'address' => $request->address,
            'courier' => $request->courier,
            'payment_method' => $request->payment_method,
            'payment_status' => $paymentStatus,
            'quantity' => $request->quantity,
            'notes' => $request->notes,
            'total' => $total,
            'status' => 'pending',
        ]);

        OrderDetail::create([
            'order_id' => $order->id,
            'product_id' => $product->id,
            'qty' => $request->quantity,
            'price' => $product->price,
        ]);

        // Kurangi stok sesuai jumlah beli
        $product->stock -= $request->quantity;
        $product->save();

        return redirect()->route('checkout.success', $order->id);
    }

    public function selected(Request $request)
    {
        $request->validate([
            'cart_ids' => 'required|array'
        ]);

        $carts = Cart::whereIn('id', $request->cart_ids)
            ->where('user_id', auth()->id())
            ->with('product')
            ->get();

        if ($carts->isEmpty()) {
            return back()->with('error', 'Pilih minimal satu produk.');
        }

        return view('user.checkout-selected', compact('carts'));
    }

    public function selectedProcess(Request $request)
    {
        $request->validate([
            'receiver_name' => 'required',
            'phone' => 'required',
            'address' => 'required',
            'payment_method' => 'required',
            'cart_ids' => 'required|array',
        ]);

        $carts = Cart::whereIn('id', $request->cart_ids)
            ->where('user_id', auth()->id())
            ->with('product')
            ->get();

        if ($carts->isEmpty()) {
            return back()->with('error', 'Tidak ada produk yang dipilih.');
        }

        // Status pembayaran
        if ($request->payment_method == 'COD') {
            $paymentStatus = 'Belum Bayar';
        } else {
            $paymentStatus = 'Menunggu Verifikasi';
        }

        // Hitung total belanja
        $grandTotal = 0;

        foreach ($carts as $cart) {

            if ($cart->product->stock < $cart->qty) {
                return back()->with('error', 'Stok '.$cart->product->name.' tidak mencukupi.');
            }

            $grandTotal += $cart->product->price * $cart->qty;
        }

        // Simpan order
        $order = Order::create([
            'user_id' => auth()->id(),
            'receiver_name' => $request->receiver_name,
            'phone' => $request->phone,
            'address' => $request->address,
            'payment_method' => $request->payment_method,
            'payment_status' => $paymentStatus,
            'total' => $grandTotal,
            'status' => 'pending',
        ]);

        // Simpan detail order
        foreach ($carts as $cart) {

            OrderDetail::create([
                'order_id' => $order->id,
                'product_id' => $cart->product_id,
                'qty' => $cart->qty,
                'price' => $cart->product->price,
            ]);

            // Kurangi stok
            $cart->product->stock -= $cart->qty;
            $cart->product->save();

            // Hapus dari keranjang
            $cart->delete();
        }

        return redirect()->route('checkout.success', $order->id);
    }

    public function success($id)
    {
        $order = Order::findOrFail($id);

        return view('user.checkout-success', compact('order'));
    }

    public function confirmPayment($id)
    {
        $order = Order::findOrFail($id);

        $order->payment_status = 'Menunggu Verifikasi';

        $order->save();

        return redirect()->route('checkout.success', $order->id)
            ->with('success', 'Konfirmasi pembayaran berhasil dikirim.');
    }
}