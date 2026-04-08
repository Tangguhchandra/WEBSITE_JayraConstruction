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
        // 1. VALIDASI DATA MASUK
        $request->validate([
            'order_id' => 'required|string',
            'gross_amount' => 'required|numeric',
            'phone' => 'required|string',
            'address' => 'required|string',
        ]);

        $gross_amount = (int) round($request->gross_amount);

        // 👇 INI TRIKNYA BANG! Bikin Order ID selalu unik tiap diklik
        $unique_order_id = $request->order_id . '-' . rand(100, 999);
        // 👆 ========================================================

        // 3. Konfigurasi Midtrans (Ini kunci lu udah bener kebaca tadi!)
        \Midtrans\Config::$serverKey = env('MIDTRANS_SERVER_KEY');
        \Midtrans\Config::$isProduction = env('MIDTRANS_IS_PRODUCTION', false);
        \Midtrans\Config::$isSanitized = true;
        \Midtrans\Config::$is3ds = true;

        // 4. Siapkan Data Transaksi Midtrans
        $params = [
            'transaction_details' => [
                'order_id' => $unique_order_id, // PAKE YANG UNIK
                'gross_amount' => $gross_amount,
            ],
            'customer_details' => [
                'first_name' => auth()->user()->name,
                'email' => auth()->user()->email,
                'phone' => $request->phone,
            ],
        ];

        // 5. Dapatkan Snap Token dari Midtrans
        $snapToken = \Midtrans\Snap::getSnapToken($params);

        // 6. SIMPAN KE DATABASE KITA
        Transaction::updateOrCreate(
            ['order_id' => $unique_order_id], // Simpan pakai ID yang unik juga
            [
                'user_id' => auth()->id(),
                'service_name' => $request->service_name ?? 'Layanan Jayra Construction',
                'gross_amount' => $gross_amount,
                'phone' => $request->phone,         
                'address' => $request->address,
                'transaction_status' => 'pending',
            ]
        );

        return view('user.detail-pembayaran', compact('snapToken', 'request'));
    }

    // Fungsi untuk Melanjutkan Pembayaran yang Pending
    public function lanjutkan($id)
    {
        // 1. Cari data transaksi milik user ini yang masih pending (Ini udah aman)
        $transaction = Transaction::where('id', $id)
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
                'gross_amount' => (int) round($transaction->gross_amount),
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
        // FIX BUG #3: PROTEKSI KEPEMILIKAN!
        // Sekarang cuma user yang bikin pesanannya yang bisa ngehapus.
        $transaction = Transaction::where('id', $id)
                                  ->where('user_id', auth()->id())
                                  ->firstOrFail();

        // Pastikan hanya transaksi 'pending' yang bisa dihapus
        if ($transaction->transaction_status === 'pending') {
            $transaction->delete(); // Hapus dari database
            return redirect()->back()->with('success', 'Pesanan berhasil dibatalkan dan dihapus dari riwayat.');
        }

        return redirect()->back()->with('error', 'Pesanan ini tidak dapat dibatalkan karena statusnya sudah diproses.');
    }
}