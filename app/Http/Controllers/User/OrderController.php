<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Models\Order;
use Illuminate\Support\Facades\Auth;

class OrderController extends Controller
{
    // Halaman My Orders
    public function index()
    {
        $orders = Order::with('details.product')
            ->where('user_id', Auth::id())
            ->latest()
            ->get();

        return view('user.orders.index', compact('orders'));
    }

    // Halaman Detail Pesanan
    public function show($id)
    {
        $order = Order::with('details.product')
            ->where('user_id', Auth::id())
            ->findOrFail($id);

        return view('user.orders.show', compact('order'));
    }

    // User mengonfirmasi barang sudah diterima
    public function complete($id)
    {
        $order = Order::findOrFail($id);

        // Pastikan hanya pemilik pesanan yang bisa mengubah
        if ($order->user_id != Auth::id()) {
            abort(403);
        }

        $order->status = 'completed';
        $order->save();

        return redirect()->route('user.orders')
            ->with('success', 'Pesanan berhasil diselesaikan.');
    }
}