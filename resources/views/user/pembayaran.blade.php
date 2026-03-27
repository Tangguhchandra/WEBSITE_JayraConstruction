@extends('user.layouts.main')

@section('title', 'Pembayaran - Jayra Construction')

@section('content')

{{-- LOGIKA PERHITUNGAN HARGA DINAMIS --}}
@php
    $subtotal = $service->price;
    $ppn = $subtotal * 0.11; // PPN 11%
    $biaya_platform = 25000; // Biaya admin/platform tetap
    $total_bayar = $subtotal + $ppn + $biaya_platform;

    // Generate Nomor Invoice Dummy sementara (Nanti diganti nomor transaksi asli dari database)
    $invoice_number = 'INV-JC-' . date('Ymd') . '-' . rand(1000,9999);
@endphp

{{-- Variabel Alpine.js hanya untuk No HP dan Alamat --}}
<div class="pt-32 pb-0 bg-slate-50" 
     x-data="{ 
        isEditing: false,
        phone: '{{ auth()->user()->phone ?? '' }}',
        address: '{{ auth()->user()->address ?? '' }}'
     }">

    {{-- ================= HEADER ================= --}}
    <section class="max-w-7xl mx-auto px-6 mb-8 reveal">
        <div class="flex items-center gap-3 mb-2 text-sm font-bold text-slate-500 uppercase tracking-widest">
            <a href="{{ route('user.detail-service', $service->id) }}" class="hover:text-primary transition-colors">Layanan</a>
            <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"></path></svg>
            <span class="text-primary">Checkout</span>
        </div>
        <h1 class="font-display text-3xl md:text-5xl font-extrabold text-primary tracking-tight">
            Checkout & Pembayaran.
        </h1>
        <p class="text-slate-500 mt-2 text-lg font-light">
            Pastikan detail pesanan dan alamat logistik proyek Anda sudah sesuai sebelum melanjutkan.
        </p>
    </section>

    {{-- ================= KONTEN UTAMA ================= --}}
    <section class="max-w-7xl mx-auto px-6 mb-20">
        {{-- Form action ini diarahkan ke Controller Transaksi untuk Midtrans --}}
        <form action="{{ route('user.pembayaran.proses') }}" method="POST" class="lg:grid lg:grid-cols-12 gap-8 space-y-8 lg:space-y-0">
        @csrf
            
            {{-- KOLOM KIRI (Ringkasan & Alamat) --}}
            <div class="lg:col-span-7 space-y-8">
                
                {{-- Alamat Proyek / Pengiriman --}}
                <div class="bg-white rounded-[2rem] p-6 sm:p-8 shadow-[0_10px_40px_-10px_rgba(16,55,92,0.08)] border border-slate-100 reveal delay-100">
                    <div class="flex justify-between items-center mb-6">
                        <h3 class="font-display text-xl sm:text-2xl font-bold text-primary flex items-center gap-3">
                            <div class="w-10 h-10 rounded-lg bg-primary/5 flex items-center justify-center text-primary">
                                <svg class="w-5 h-5 text-accent" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z"></path><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 11a3 3 0 11-6 0 3 3 0 016 0z"></path></svg>
                            </div>
                            Data Pelanggan & Logistik
                        </h3>
                        
                        {{-- Tombol Ubah (Sembunyi kalau lagi mode edit) --}}
                        <button type="button" x-show="!isEditing" @click="isEditing = true" class="text-sm font-bold text-primary hover:text-accent transition-colors flex items-center gap-1.5 bg-slate-50 hover:bg-white px-4 py-2 rounded-full border border-slate-100 shadow-sm">
                            Ubah <svg class="w-3.5 h-3.5" viewBox="0 0 24 24" fill="none" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15.232 5.232l3.536 3.536m-2.036-5.036a2.5 2.5 0 113.536 3.536L6.5 21.036H3v-3.572L16.732 3.732z"></path></svg>
                        </button>
                    </div>

                    <div class="p-5 rounded-2xl border-2 border-primary/10 bg-primary/5 relative overflow-hidden group transition-all duration-300">
                        <div class="absolute top-0 right-0 w-32 h-32 bg-accent/10 rounded-full blur-[30px] -mr-16 -mt-16 group-hover:scale-150 transition-transform duration-700 pointer-events-none"></div>
                        
                        <div class="relative z-10">
                            {{-- MODE TAMPILAN (BACA) --}}
                            <div x-show="!isEditing" x-transition:enter="transition ease-out duration-300" x-transition:enter-start="opacity-0" x-transition:enter-end="opacity-100">
                                <h4 class="font-bold text-primary text-lg mb-1">{{ auth()->user()->name ?? 'Nama Pelanggan' }}</h4>
                                <p class="text-sm text-slate-600 mb-1">{{ auth()->user()->email ?? 'email@domain.com' }}</p>
                                
                                {{-- Tampilan No HP Dinamis --}}
                                <p class="text-sm text-slate-600 mb-3 flex items-center gap-2">
                                    <svg class="w-4 h-4 text-slate-400" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 5a2 2 0 012-2h3.28a1 1 0 01.948.684l1.498 4.493a1 1 0 01-.502 1.21l-2.257 1.13a11.042 11.042 0 005.516 5.516l1.13-2.257a1 1 0 011.21-.502l4.493 1.498a1 1 0 01.684.949V19a2 2 0 01-2 2h-1C9.716 21 3 14.284 3 6V5z"></path></svg>
                                    <template x-if="phone"><span x-text="phone"></span></template>
                                    <template x-if="!phone"><span class="text-red-400 italic">Nomor handphone belum diisi</span></template>
                                </p>
                                
                                {{-- Tampilan Alamat Dinamis --}}
                                <p class="text-sm font-medium leading-relaxed flex items-start gap-2" :class="address ? 'text-slate-500' : 'text-red-400 italic'">
                                    <svg class="w-4 h-4 text-slate-400 mt-0.5 shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z"></path><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 11a3 3 0 11-6 0 3 3 0 016 0z"></path></svg>
                                    <span x-text="address ? address : 'Alamat proyek belum diisi. Silakan klik Ubah untuk melengkapi data.'"></span>
                                </p>

                                <div class="mt-4 inline-flex items-center gap-2 px-3 py-1.5 rounded-lg bg-yellow-100 border border-yellow-200 text-yellow-700 text-xs font-bold">
                                    <svg class="w-4 h-4 shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 16h-1v-4h-1m1-4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"></path></svg>
                                    Pastikan nomor handphone dan alamat lengkap untuk mempermudah tim survei.
                                </div>
                            </div>

                            {{-- MODE EDIT (FORM) --}}
                            <div x-show="isEditing" style="display: none;" x-transition:enter="transition ease-out duration-300" x-transition:enter-start="opacity-0 -translate-y-4" x-transition:enter-end="opacity-100 translate-y-0">
                                <div class="space-y-4">
                                    <div>
                                        <label class="text-xs font-bold text-primary uppercase tracking-widest">Nomor Handphone / WhatsApp</label>
                                        <input type="text" name="phone" x-model="phone" placeholder="Contoh: 081234567890" class="w-full mt-1.5 px-4 py-3 rounded-xl border border-primary/20 bg-white focus:ring-2 focus:ring-accent focus:border-accent text-sm transition-all text-slate-700 font-medium shadow-sm">
                                    </div>
                                    <div>
                                        <label class="text-xs font-bold text-primary uppercase tracking-widest">Alamat Lengkap Proyek</label>
                                        <textarea name="address" x-model="address" rows="3" placeholder="Nama Jalan, RT/RW, Kelurahan, Kecamatan, Kota/Kabupaten, Kode Pos..." class="w-full mt-1.5 px-4 py-3 rounded-xl border border-primary/20 bg-white focus:ring-2 focus:ring-accent focus:border-accent text-sm transition-all text-slate-700 font-medium shadow-sm resize-none"></textarea>
                                    </div>
                                    
                                    <div class="flex justify-end pt-2">
                                        <button type="button" @click="isEditing = false" class="px-6 py-2.5 bg-primary text-white font-bold text-sm rounded-xl shadow-md hover:bg-primaryDark transition-all hover:-translate-y-0.5">
                                            Simpan Data
                                        </button>
                                    </div>
                                </div>
                            </div>

                        </div>
                    </div>
                </div>

                {{-- Ringkasan Pesanan --}}
                <div class="bg-white rounded-[2rem] p-6 sm:p-8 shadow-[0_10px_40px_-10px_rgba(16,55,92,0.08)] border border-slate-100 reveal delay-200">
                    <div class="flex flex-col sm:flex-row justify-between sm:items-center gap-4 mb-6">
                        <h3 class="font-display text-xl sm:text-2xl font-bold text-primary flex items-center gap-3">
                            <div class="w-10 h-10 rounded-lg bg-primary/5 flex items-center justify-center text-primary">
                                <svg class="w-5 h-5 text-accent" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5H7a2 2 0 00-2 2v12a2 2 0 002 2h10a2 2 0 002-2V7a2 2 0 00-2-2h-2M9 5a2 2 0 002 2h2a2 2 0 002-2M9 5a2 2 0 012-2h2a2 2 0 012 2"></path></svg>
                            </div>
                            Ringkasan Pesanan (Struk)
                        </h3>
                        <span class="inline-flex px-4 py-2 bg-slate-100 border border-slate-200 text-slate-600 font-bold text-xs rounded-xl tracking-wider uppercase">
                            {{ $invoice_number }}
                        </span>
                        {{-- Input Hidden untuk dilempar ke Midtrans nanti --}}
                        <input type="hidden" name="order_id" value="{{ $invoice_number }}">
                        <input type="hidden" name="gross_amount" value="{{ $total_bayar }}">
                        <input type="hidden" name="service_name" value="{{ $service->name }}">
                    </div>

                    {{-- List Jasa & Material (Dinamis dari Database) --}}
                    <div class="space-y-4">
                        <div class="flex justify-between items-start pb-4 border-b border-dashed border-slate-200 group">
                            <div class="flex gap-4">
                                <div class="w-16 h-16 rounded-xl bg-slate-100 flex items-center justify-center text-slate-400 overflow-hidden group-hover:shadow-md transition-shadow">
                                    <img src="{{ $service->image_1 ? asset('storage/' . $service->image_1) : 'https://images.unsplash.com/photo-1503387762-592deb58ef4e?q=80&w=200&auto=format&fit=crop' }}" class="w-full h-full object-cover">
                                </div>
                                <div>
                                    <h5 class="font-bold text-primary text-[15px] group-hover:text-accent transition-colors">{{ $service->name }}</h5>
                                    <p class="text-xs text-slate-500 font-medium mt-1">Kategori: {{ $service->category }}</p>
                                </div>
                            </div>
                            <span class="font-bold text-primary whitespace-nowrap">Rp {{ number_format($subtotal, 0, ',', '.') }}</span>
                        </div>
                    </div>

                    {{-- Total Calculation (Dinamis) --}}
                    <div class="mt-6 space-y-3">
                        <div class="flex justify-between text-sm font-medium text-slate-500">
                            <span>Subtotal Layanan</span>
                            <span class="text-primary font-bold">Rp {{ number_format($subtotal, 0, ',', '.') }}</span>
                        </div>
                        <div class="flex justify-between text-sm font-medium text-slate-500">
                            <span>Pajak (PPN 11%)</span>
                            <span class="text-primary font-bold">Rp {{ number_format($ppn, 0, ',', '.') }}</span>
                        </div>
                        <div class="flex justify-between text-sm font-medium text-slate-500 pb-4 border-b border-slate-200">
                            <span>Biaya Layanan Platform</span>
                            <span class="text-primary font-bold">Rp {{ number_format($biaya_platform, 0, ',', '.') }}</span>
                        </div>
                        
                        <div class="flex justify-between items-end pt-2">
                            <span class="text-sm font-bold text-primary uppercase tracking-widest">Total Bayar</span>
                            <span class="text-3xl font-display font-extrabold text-primary tracking-tight">Rp <span class="text-accent">{{ number_format($total_bayar, 0, ',', '.') }}</span></span>
                        </div>
                    </div>
                </div>

            </div>

            {{-- KOLOM KANAN (Aksi & Keamanan) --}}
            <div class="lg:col-span-5 space-y-8">
                
                {{-- Box Aksi Pembayaran --}}
                <div class="bg-primary rounded-[2.5rem] p-6 sm:p-8 shadow-2xl relative overflow-hidden reveal delay-300 flex flex-col justify-center h-full">
                    <div class="absolute -right-20 -top-20 w-64 h-64 bg-accent/20 rounded-full blur-[60px] pointer-events-none"></div>
                    <div class="absolute inset-0 bg-[url('https://www.transparenttextures.com/patterns/cubes.png')] opacity-5 mix-blend-overlay"></div>
                    
                    <div class="relative z-10 text-center">
                        <div class="w-20 h-20 bg-white/10 text-accent rounded-full flex items-center justify-center mx-auto mb-6">
                            <svg class="w-10 h-10" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m5.618-4.016A11.955 11.955 0 0112 2.944a11.955 11.955 0 01-8.618 3.04A12.02 12.02 0 003 9c0 5.591 3.824 10.29 9 11.622 5.176-1.332 9-6.03 9-11.622 0-1.042-.133-2.052-.382-3.016z"></path></svg>
                        </div>
                        
                        <h3 class="font-display text-2xl font-bold text-white mb-3">Selesaikan Pesanan</h3>
                        <p class="text-slate-300 text-sm font-light leading-relaxed mb-8">
                            Klik tombol di bawah ini untuk memilih metode pembayaran melalui sistem terenkripsi Midtrans. Pembayaran akan terverifikasi secara otomatis.
                        </p>

                        <div class="space-y-4">
                            <button type="submit" 
                                    class="w-full bg-accent text-primary font-bold text-lg py-4 rounded-xl shadow-lg shadow-accent/20 transition-all duration-300 flex items-center justify-center gap-2 group/btn"
                                    :class="(!phone || !address) ? 'opacity-50 cursor-not-allowed' : 'hover:bg-white hover:-translate-y-1'"
                                    :disabled="!phone || !address">
                                Proses Pembayaran
                                <svg class="w-5 h-5 transition-transform" :class="(phone && address) ? 'group-hover/btn:translate-x-1' : ''" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M14 5l7 7m0 0l-7 7m7-7H3"></path></svg>
                            </button>
                            
                            {{-- Notifikasi peringatan jika data blm lengkap --}}
                            <p x-show="!phone || !address" class="text-center text-sm text-yellow-300 font-bold mt-2 animate-pulse">
                                Mohon lengkapi Nomor HP dan Alamat proyek Anda terlebih dahulu pada kotak di sebelah kiri.
                            </p>
                        </div>

                        <div class="mt-8 flex flex-col items-center gap-4">
                            <div class="flex items-center justify-center gap-3 bg-white/5 py-2 px-4 rounded-full border border-white/10 w-max">
                                <img src="https://upload.wikimedia.org/wikipedia/commons/thumb/a/a2/Logo_QRIS.svg/1200px-Logo_QRIS.svg.png" alt="QRIS" class="h-4 object-contain brightness-0 invert opacity-80">
                                <div class="w-1 h-4 bg-white/20 rounded-full"></div>
                                <span class="text-xs font-bold text-white/80 uppercase tracking-widest">Bank Transfer</span>
                                <div class="w-1 h-4 bg-white/20 rounded-full"></div>
                                <span class="text-xs font-bold text-white/80 uppercase tracking-widest">E-Wallet</span>
                            </div>
                            
                            <p class="text-center text-xs text-white/40 leading-relaxed">
                                Dengan memproses pesanan, Anda menyetujui<br><a href="#" class="text-accent hover:underline">Syarat & Ketentuan</a> dari Jayra Construction.
                            </p>
                        </div>
                    </div>
                </div>

                {{-- Shield Keamanan Luar --}}
                <div class="flex items-center justify-center gap-3 text-slate-400 text-sm font-medium reveal delay-400">
                    <svg class="w-5 h-5 text-green-500" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 15v2m-6 4h12a2 2 0 002-2v-6a2 2 0 00-2-2H6a2 2 0 00-2 2v6a2 2 0 002 2zm10-10V7a4 4 0 00-8 0v4h8z"></path></svg>
                    Pembayaran didukung penuh oleh Midtrans Payment Gateway.
                </div>

            </div>

        </form>
    </section>

</div>

@endsection