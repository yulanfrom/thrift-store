<?php

namespace App\Http\Controllers\Courier;

use App\Http\Controllers\Controller;
use App\Models\Order;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index()
{
    $orders = Order::with('user')
        ->where(function ($query) {

            $query->whereIn('status', [
                'Dikirim ke Kurir',
                'Sedang Diantar'
            ])

            // Tampilkan semua pesanan COD
            // yang belum upload bukti transfer
            ->orWhere(function ($q) {

                $q->where('payment_method', 'COD')
                  ->whereNull('transfer_proof');

            });

        })
        ->latest()
        ->get();

    return view('courier.dashboard', compact('orders'));
}

public function deliver($id)
{
    $order = Order::findOrFail($id);

    $order->status = 'Sedang Diantar';

    $order->save();

    return redirect()->route('courier.dashboard')
        ->with('success', 'Paket sedang diantar.');
}

public function uploadProof(Request $request, $id)
{
    $request->validate([
        'delivery_proof' => 'required|image|mimes:jpg,jpeg,png|max:2048',
    ]);

    $order = Order::findOrFail($id);

    $imageName = time() . '.' . $request->delivery_proof->extension();

    $request->delivery_proof->move(public_path('delivery_proofs'), $imageName);

    $order->delivery_proof = $imageName;

    $order->save();

    return redirect()->route('courier.dashboard')
        ->with('success', 'Bukti pengiriman berhasil diupload.');
}

public function uploadTransfer(Request $request, $id)
{
    $request->validate([
        'transfer_proof' => 'required|image|mimes:jpg,jpeg,png|max:2048',
    ]);

    $order = Order::findOrFail($id);

    // Simpan gambar
    $imageName = time().'_transfer.'.$request->transfer_proof->extension();

    $request->transfer_proof->move(
        public_path('transfer_proofs'),
        $imageName
    );

    // Simpan bukti transfer
    $order->transfer_proof = $imageName;

    // Otomatis ubah status menjadi selesai
    $order->status = 'completed';

    $order->save();

    return redirect()->route('courier.dashboard')
        ->with('success', 'Bukti transfer berhasil diupload. Status pesanan menjadi selesai.');
}
}