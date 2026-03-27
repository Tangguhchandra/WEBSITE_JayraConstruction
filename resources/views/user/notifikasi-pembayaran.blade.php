@extends('user.layouts.main')

@section('title', 'Pembayaran Berhasil - Jayra Construction')

@section('content')

<div class="pt-32 pb-20 bg-slate-50 min-h-[90vh] flex items-center justify-center">

    <section class="max-w-3xl w-full mx-auto px-6">
        <div class="bg-white rounded-[2.5rem] p-8 md:p-12 shadow-[0_20px_60px_-15px_rgba(16,55,92,0.1)] border border-slate-100 relative overflow-hidden text-center reveal">
            {{-- Dekorasi Latar --}}
            <div class="absolute -right-20 -top-20 w-64 h-64 bg-green-50 rounded-full blur-[60px] pointer-events-none"></div>
            <div class="absolute -left-20 -bottom-20 w-64 h-64 bg-primary/5 rounded-full blur-[60px] pointer-events-none"></div>

            {{-- 1. Ikon Centang Hijau Animasi --}}
            <div class="relative z-10 w-24 h-24 mx-auto mb-8 rounded-full bg-green-100 flex items-center justify-center animate-[bounce_2s_infinite]">
                <div class="absolute inset-0 rounded-full border-4 border-green-200 animate-ping opacity-75"></div>
                <div class="w-16 h-16 rounded-full bg-green-500 flex items-center justify-center shadow-lg shadow-green-500/30">
                    <svg class="w-8 h-8 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M5 13l4 4L19 7"></path></svg>
                </div>
            </div>

            {{-- 2. Pesan Status --}}
            <div class="relative z-10 mb-8">
                <h1 class="font-display text-3xl md:text-4xl font-extrabold text-primary mb-3 tracking-tight">
                    Pembayaran Berhasil!
                </h1>
                <p class="text-slate-500 text-lg font-light">
                    Kredit pembayaran untuk tagihan Anda telah kami terima dengan baik.
                </p>
            </div>

            {{-- 3. Ringkasan Singkat --}}
            <div class="relative z-10 bg-slate-50 rounded-2xl p-6 border border-slate-100 mb-8 text-left max-w-lg mx-auto transform hover:scale-105 transition-transform duration-300">
                <h3 class="text-xs font-bold text-slate-400 uppercase tracking-widest mb-4">Rincian Transaksi</h3>
                
                <div class="space-y-3">
                    <div class="flex justify-between items-center text-sm">
                        <span class="text-slate-500">No. Referensi / Invoice</span>
                        {{-- MENAMPILKAN ORDER ID DINAMIS DARI MIDTRANS --}}
                        <span class="font-bold text-primary uppercase">{{ $order_id ?? 'INV-JC-XXXXX' }}</span>
                    </div>
                    <div class="flex justify-between items-center text-sm">
                        <span class="text-slate-500">Waktu Konfirmasi</span>
                        {{-- MENAMPILKAN WAKTU REAL-TIME --}}
                        <span class="font-bold text-primary">{{ \Carbon\Carbon::now()->translatedFormat('d F Y, H:i') }} WIB</span>
                    </div>
                    <div class="flex justify-between items-center text-sm">
                        <span class="text-slate-500">Status Gateway</span>
                        <span class="font-bold text-green-600 bg-green-100 px-2 py-0.5 rounded text-xs uppercase tracking-wider">
                            {{ $status ?? 'SETTLEMENT' }}
                        </span>
                    </div>
                </div>
            </div>

            {{-- 4. Pesan Koordinasi Lanjutan (Inti) --}}
            <div class="relative z-10 bg-primary/5 border border-primary/10 rounded-2xl p-6 md:p-8 mb-10 text-left">
                <div class="flex items-start gap-4">
                    <div class="w-12 h-12 shrink-0 rounded-xl bg-primary text-accent flex items-center justify-center shadow-md">
                        <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z"></path></svg>
                    </div>
                    <div>
                        <h4 class="font-bold text-primary text-lg mb-2">Menunggu Konfirmasi Lanjutan</h4>
                        <p class="text-slate-600 text-sm leading-relaxed mb-4">
                            Data pesanan pengadaan material dan kontrak jasa Anda kini telah masuk ke dalam antrean sistem proyek kami secara otomatis.
                        </p>
                        <p class="text-slate-600 text-sm leading-relaxed">
                            <strong class="text-primary font-bold">Tim Administrator & Manajer Proyek</strong> kami akan segera menghubungi Anda secara personal melalui WhatsApp / Email dalam kurun waktu 1x24 Jam untuk koordinasi teknis, seperti penjadwalan pengiriman material ke titik lokasi proyek dan diskusi awal tanggal mulai pekerjaan di lapangan.
                        </p>
                    </div>
                </div>
            </div>

            {{-- 5. Tombol Aksi --}}
            <div class="relative z-10 flex flex-col sm:flex-row justify-center gap-4">
                <button onclick="window.print()" class="bg-white border-2 border-slate-200 text-primary font-bold py-3.5 px-8 rounded-xl hover:border-primary hover:bg-slate-50 hover:-translate-y-1 transition-all duration-300 flex items-center justify-center gap-2 group">
                    <svg class="w-5 h-5 text-slate-400 group-hover:text-primary transition-colors" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 10v6m0 0l-3-3m3 3l3-3m2 8H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z"></path></svg>
                    Cetak Bukti Bayar
                </button>
                <a href="{{ route('user.home') }}" class="bg-primary border-2 border-primary text-white font-bold py-3.5 px-8 rounded-xl shadow-lg hover:bg-primaryDark hover:-translate-y-1 transition-all duration-300 flex items-center justify-center gap-2">
                    Kembali ke Beranda
                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 12l2-2m0 0l7-7 7 7M5 10v10a1 1 0 001 1h3m10-11l2 2m-2-2v10a1 1 0 01-1 1h-3m-6 0a1 1 0 001-1v-4a1 1 0 011-1h2a1 1 0 011 1v4a1 1 0 001 1m-6 0h6"></path></svg>
                </a>
            </div>

        </div>
    </section>

</div>

@endsection