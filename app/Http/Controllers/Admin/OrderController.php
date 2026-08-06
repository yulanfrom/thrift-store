<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Order;
use Illuminate\Http\Request;

class OrderController extends Controller
{
    // Menampilkan semua pesanan
    public function index()
    {
        $orders = Order::with([
    'user',
    'details.product'
])->latest()->get();

        return view('admin.orders.index', compact('orders'));
    }

    // ==========================
    // DETAIL PESANAN (BARU)
    // ==========================
    public function show($id)
{
    $order = Order::with('details.product', 'user')
        ->findOrFail($id);

    // Tandai bahwa admin sudah membuka detail pesanan
    if (!$order->admin_read) {
        $order->admin_read = true;
        $order->save();
    }

    return view('admin.orders.show', compact('order'));
}

    // Form edit
    public function edit($id)
    {
        $order = Order::with('details.product', 'user')
            ->findOrFail($id);

        return view('admin.orders.edit', compact('order'));
    }

    // Update status
    public function update(Request $request, $id)
    {
        $order = Order::findOrFail($id);

        $order->status = $request->status;

        if ($request->status == 'completed') {
            $order->payment_status = 'Sudah Bayar';
        }

        $order->save();

        return redirect()->route('admin.orders.index')
            ->with('success', 'Status pesanan berhasil diperbarui.');
    }

    // Verifikasi pembayaran
    public function verify($id)
    {
        $order = Order::findOrFail($id);

        $order->payment_status = 'Sudah Bayar';
        $order->status = 'processing';

        $order->save();

        return redirect()->route('admin.orders.index')
            ->with('success', 'Pembayaran berhasil diverifikasi.');
    }

    // Kirim ke kurir
    public function sendToCourier($id)
{
    $order = Order::findOrFail($id);

    // Status pesanan berubah
    $order->status = 'Dikirim ke Kurir';

    // Kalau bukan COD berarti memang sudah dibayar
    if ($order->payment_method != 'COD') {
        $order->payment_status = 'Sudah Bayar';
    }

    // Kalau COD biarkan tetap "Belum Bayar"

    $order->save();

    return redirect()->route('admin.orders.index')
        ->with('success', 'Pesanan berhasil dikirim ke kurir.');
}

    // Konfirmasi transfer COD dari kurir
public function confirmTransfer($id)
{
    $order = Order::findOrFail($id);

    // Pastikan hanya untuk pembayaran COD
    if ($order->payment_method != 'COD') {
        return redirect()->route('admin.orders.show', $order->id)
            ->with('error', 'Pesanan ini bukan COD.');
    }

    // Pastikan bukti transfer sudah diupload kurir
    if (!$order->transfer_proof) {
        return redirect()->route('admin.orders.show', $order->id)
            ->with('error', 'Kurir belum mengupload bukti transfer.');
    }

    // Konfirmasi pembayaran
    $order->payment_status = 'Sudah Bayar';
    $order->save();

    return redirect()->route('admin.orders.show', $order->id)
        ->with('success', 'Transfer COD berhasil dikonfirmasi.');
}
}