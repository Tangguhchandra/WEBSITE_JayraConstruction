<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Midtrans\Config;
use Midtrans\Snap;
use App\Models\Transaction;

class TransactionController extends Controller
{
    public function proses(Request $request)
    {
        // 1. Konfigurasi Midtrans (Sama seperti sebelumnya)
        \Midtrans\Config::$serverKey = env('MIDTRANS_SERVER_KEY');
        \Midtrans\Config::$isProduction = env('MIDTRANS_IS_PRODUCTION', false);
        \Midtrans\Config::$isSanitized = true;
        \Midtrans\Config::$is3ds = true;

        // 2. SIMPAN KE DATABASE KITA SEBAGAI 'PENDING'
        \App\Models\Transaction::create([
            'user_id' => auth()->id(),
            'order_id' => $request->order_id,
            'service_name' => $request->service_name ?? 'Layanan Jayra Construction',
            'gross_amount' => $request->gross_amount,
            'phone' => $request->phone,         
            'address' => $request->address,
            'transaction_status' => 'pending',
        ]);

        // 3. Siapkan Data Transaksi Midtrans
        $params = [
            'transaction_details' => [
                'order_id' => $request->order_id,
                'gross_amount' => (int) $request->gross_amount,
            ],
            'customer_details' => [
                'first_name' => auth()->user()->name,
                'email' => auth()->user()->email,
                'phone' => $request->phone,
            ],
        ];

        // 4. Dapatkan Snap Token dari Midtrans
        $snapToken = \Midtrans\Snap::getSnapToken($params);

        return view('user.detail-pembayaran', compact('snapToken', 'request'));
    }

    // Fungsi untuk Melanjutkan Pembayaran yang Pending
    public function lanjutkan($id)
    {
        // 1. Cari data transaksi milik user ini yang masih pending
        $transaction = \App\Models\Transaction::where('id', $id)
                            ->where('user_id', auth()->id())
                            ->where('transaction_status', 'pending')
                            ->firstOrFail();

        // 2. Generate Order ID baru agar tidak ditolak Midtrans (Duplicate Order ID)
        $new_order_id = 'INV-JC-' . date('Ymd') . '-' . rand(1000,9999);
        
        // Update di database
        $transaction->update(['order_id' => $new_order_id]);

        // 3. Setup Midtrans
        \Midtrans\Config::$serverKey = env('MIDTRANS_SERVER_KEY');
        \Midtrans\Config::$isProduction = env('MIDTRANS_IS_PRODUCTION', false);
        \Midtrans\Config::$isSanitized = true;
        \Midtrans\Config::$is3ds = true;

        $params = [
            'transaction_details' => [
                'order_id' => $new_order_id,
                'gross_amount' => (int) $transaction->gross_amount,
            ],
            'customer_details' => [
                'first_name' => auth()->user()->name,
                'email' => auth()->user()->email,
            ],
        ];

        // 4. Minta Snap Token Baru
        $snapToken = \Midtrans\Snap::getSnapToken($params);

        // 5. Bikin "Request" bohongan agar halaman detail-pembayaran tetap bisa ngebaca datanya
        $request = new \Illuminate\Http\Request();
        $request->merge([
            'order_id' => $new_order_id,
            'gross_amount' => $transaction->gross_amount
        ]);

        return view('user.detail-pembayaran', compact('snapToken', 'request'));
    }

    public function cancelTransaction($id)
    {
        $transaction = Transaction::findOrFail($id);

        // Opsional: Pastikan hanya transaksi 'pending' yang bisa dihapus
        if ($transaction->transaction_status === 'pending') {
            $transaction->delete(); // Hapus dari database
            return redirect()->back()->with('success', 'Pesanan berhasil dibatalkan dan dihapus dari riwayat.');
        }

        return redirect()->back()->with('error', 'Pesanan ini tidak dapat dibatalkan.');
    }
}