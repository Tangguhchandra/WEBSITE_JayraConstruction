@extends('user.layouts.main')

@section('title', 'Detail Pembayaran - Jayra Construction')

@section('content')

<div class="pt-32 pb-0 bg-slate-50" 
     x-data="{
        expiry: new Date().getTime() + 15 * 60 * 1000,
        remaining: '15:00',
        isExpired: false,
        init() {
            setInterval(() => {
                let now = new Date().getTime();
                let distance = this.expiry - now;
                if (distance < 0) {
                    this.remaining = '00:00';
                    this.isExpired = true;
                    return;
                }
                let m = Math.floor((distance % (1000 * 60 * 60)) / (1000 * 60));
                let s = Math.floor((distance % (1000 * 60)) / 1000);
                this.remaining = m.toString().padStart(2, '0') + ':' + s.toString().padStart(2, '0');
            }, 1000);
        }
     }">

    {{-- ================= HEADER ================= --}}
    <section class="max-w-7xl mx-auto px-6 mb-8 reveal">
        <div class="flex items-center gap-3 mb-2 text-sm font-bold text-slate-500 uppercase tracking-widest">
            <a href="{{ route('user.pembayaran') }}" class="hover:text-primary transition-colors">Checkout</a>
            <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"></path></svg>
            <span class="text-primary">Instruksi Bayar</span>
        </div>
        <h1 class="font-display text-3xl md:text-5xl font-extrabold text-primary tracking-tight">
            Selesaikan Pembayaran.
        </h1>
        <p class="text-slate-500 mt-2 text-lg font-light">
            Silakan pindai kode QRIS di bawah ini melalui aplikasi m-banking atau e-wallet Anda.
        </p>
    </section>

    {{-- ================= KONTEN UTAMA ================= --}}
    <section class="max-w-7xl mx-auto px-6 mb-20">
        <div class="lg:grid lg:grid-cols-12 gap-8 space-y-8 lg:space-y-0">
            
            {{-- KOLOM KIRI (QR Code & Timer) - Fokus Utama Visual --}}
            <div class="lg:col-span-5 flex flex-col items-center">
                
                {{-- Kotak QRIS --}}
                <div class="bg-white rounded-[2.5rem] p-8 md:p-10 shadow-2xl border border-slate-100 flex flex-col items-center w-full max-w-sm reveal delay-100 relative overflow-hidden group">
                    {{-- Efek Glow --}}
                    <div class="absolute inset-0 bg-gradient-to-b from-primary/5 to-transparent pointer-events-none"></div>
                    <div class="absolute -right-20 -top-20 w-40 h-40 bg-accent/10 rounded-full blur-[40px] pointer-events-none group-hover:bg-accent/20 transition-colors duration-500"></div>

                    {{-- Timer --}}
                    <div class="w-full flex justify-between items-center mb-6 relative z-10 px-2 py-3 bg-red-50 rounded-2xl border border-red-100" :class="isExpired ? 'bg-red-100' : 'bg-red-50'">
                        <div class="flex items-center gap-2 text-red-600 font-bold text-sm">
                            <svg class="w-5 h-5 animate-pulse" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z"></path></svg>
                            Sisa Waktu
                        </div>
                        <div class="font-display text-xl font-extrabold text-red-600 tracking-wider font-mono tabular-nums" x-text="remaining"></div>
                    </div>

                    {{-- QR Code Image --}}
                    <div class="relative z-10 bg-white p-4 rounded-3xl border-4 border-slate-100 shadow-inner group-hover:border-primary/20 transition-colors duration-300 mb-6 w-full aspect-square flex items-center justify-center">
                        <img src="https://api.qrserver.com/v1/create-qr-code/?size=250x250&data=JAYRACONSTRUCTION-INV-JC-202603-001" alt="QRIS Code Jayra Construction" class="w-full h-full object-contain mix-blend-multiply" :class="isExpired ? 'opacity-20 grayscale' : ''">
                        
                        {{-- Placeholder Expired --}}
                        <div x-show="isExpired" class="absolute inset-0 flex flex-col items-center justify-center bg-white/80 backdrop-blur-sm rounded-2xl" style="display: none;">
                            <div class="w-12 h-12 bg-red-100 text-red-500 rounded-full flex items-center justify-center mb-2">
                                <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"></path></svg>
                            </div>
                            <span class="font-bold text-red-600">QR Kedaluwarsa</span>
                        </div>
                    </div>

                    <div class="flex items-center justify-center gap-4 w-full mb-2">
                        <img src="https://upload.wikimedia.org/wikipedia/commons/thumb/a/a2/Logo_QRIS.svg/1200px-Logo_QRIS.svg.png" alt="QRIS" class="h-6 object-contain">
                        <div class="w-1 h-6 bg-slate-200 rounded-full"></div>
                        <img src="https://upload.wikimedia.org/wikipedia/commons/thumb/2/22/GPN_Logo.svg/2560px-GPN_Logo.svg.png" alt="GPN" class="h-6 object-contain">
                    </div>
                </div>

                {{-- Unduh QR Button --}}
                <div class="w-full max-w-sm mt-6 reveal delay-200">
                    <button class="w-full py-3.5 rounded-xl border-2 border-primary text-primary font-bold shadow-sm hover:bg-primary hover:text-white hover:-translate-y-1 transition-all duration-300 flex items-center justify-center gap-2 group">
                        <svg class="w-5 h-5 group-hover:-translate-y-0.5 transition-transform" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 16v1a3 3 0 003 3h10a3 3 0 003-3v-1m-4-4l-4 4m0 0l-4-4m4 4V4"></path></svg>
                        Unduh QR Code
                    </button>
                    <p class="text-xs text-center text-slate-500 mt-4 leading-relaxed">
                        Jika Anda mengecek dari satu *device* (ponsel), silakan unduh QR Code di atas, lalu unggah/scan gambar tersebut dari aplikasi e-wallet Anda.
                    </p>
                </div>
            </div>

            {{-- KOLOM KANAN (Rincian & Instruksi) --}}
            <div class="lg:col-span-7 space-y-8">
                
                {{-- Box Nominal Pembayaran --}}
                <div class="bg-primary rounded-[2.5rem] p-8 md:p-10 shadow-2xl relative overflow-hidden reveal delay-200">
                    <div class="absolute -right-20 -bottom-20 w-96 h-96 bg-accent/10 rounded-full blur-[80px] pointer-events-none"></div>
                    <div class="absolute inset-0 bg-[url('https://www.transparenttextures.com/patterns/cubes.png')] opacity-5 mix-blend-overlay"></div>

                    <div class="relative z-10">
                        <div class="flex flex-col md:flex-row justify-between md:items-end gap-6 border-b border-white/10 pb-8 mb-8">
                            <div>
                                <h3 class="text-white/60 font-bold text-sm uppercase tracking-widest mb-2">Total Pembayaran</h3>
                                <div class="font-display text-4xl sm:text-5xl font-extrabold text-white tracking-tight flex items-end gap-1">
                                    <span class="text-2xl mb-1 text-white/50">Rp</span> 
                                    63.850.<span class="text-accent underline decoration-accent/30 underline-offset-8">123</span>
                                </div>
                                <div class="mt-4 bg-accent/20 border border-accent/30 px-4 py-2 rounded-xl inline-flex items-center gap-2">
                                    <svg class="w-4 h-4 text-accent" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 16h-1v-4h-1m1-4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"></path></svg>
                                    <p class="text-xs text-white">Pastikan nominal transfer <span class="font-bold text-accent">tepat hingga 3 digit terakhir</span>.</p>
                                </div>
                            </div>
                            <div class="text-left md:text-right">
                                <p class="text-white/50 text-[11px] font-bold uppercase tracking-widest mb-1">Nomor Invoice</p>
                                <p class="text-white font-bold tracking-wider">INV-JC-202603-001</p>
                                <button class="mt-2 text-accent text-xs font-bold hover:underline flex items-center md:justify-end gap-1 w-full md:w-auto">
                                    Buka Struk Lengkap <svg class="w-3 h-3" viewBox="0 0 24 24" fill="none" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 6H6a2 2 0 00-2 2v10a2 2 0 002 2h10a2 2 0 002-2v-4M14 4h6m0 0v6m0-6L10 14"></path></svg>
                                </button>
                            </div>
                        </div>

                        {{-- Instruksi Pembayaran Accordion-style tapi Expand semua --}}
                        <div class="space-y-6">
                            <h4 class="text-white font-bold text-lg mb-4 flex items-center gap-2">
                                <svg class="w-5 h-5 text-accent" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8.228 9c.549-1.165 2.03-2 3.772-2 2.21 0 4 1.343 4 3 0 1.4-1.278 2.575-3.006 2.907-.542.104-.994.54-.994 1.093m0 3h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"></path></svg>
                                Cara Bayar Menggunakan QRIS
                            </h4>

                            <ol class="space-y-4 text-sm text-slate-300 relative pl-4 border-l-2 border-white/10">
                                <li class="relative">
                                    <div class="absolute -left-[25px] top-0 w-6 h-6 rounded-full bg-primary border-4 border-slate-50 flex items-center justify-center text-[10px] font-bold text-accent">1</div>
                                    <p class="pl-2">Buka aplikasi mobile banking atau dompet digital Anda (GoPay, OVO, LinkAja, BCA Mobile, dll).</p>
                                </li>
                                <li class="relative">
                                    <div class="absolute -left-[25px] top-0 w-6 h-6 rounded-full bg-primary border-4 border-slate-50 flex items-center justify-center text-[10px] font-bold text-accent">2</div>
                                    <p class="pl-2">Pilih ikon/fitur <span class="text-white font-bold">Pindai / Scan QRIS</span> pada layar utama aplikasi Anda.</p>
                                </li>
                                <li class="relative">
                                    <div class="absolute -left-[25px] top-0 w-6 h-6 rounded-full bg-primary border-4 border-slate-50 flex items-center justify-center text-[10px] font-bold text-accent">3</div>
                                    <p class="pl-2">Arahkan kamera ke QR Code di samping, atau unggah gambar jika Anda telah mengunduhnya.</p>
                                </li>
                                <li class="relative">
                                    <div class="absolute -left-[25px] top-0 w-6 h-6 rounded-full bg-primary border-4 border-slate-50 flex items-center justify-center text-[10px] font-bold text-accent">4</div>
                                    <p class="pl-2">Pastikan nama merchant adalah <strong class="text-white font-bold bg-white/10 px-2 py-0.5 rounded">JAYRA CONSTRUCTION</strong> dan jumlah nominalnya sesuai <strong class="text-accent underline decoration-accent/30 decoration-dashed">hingga 3 digit terakhir</strong>.</p>
                                </li>
                                <li class="relative">
                                    <div class="absolute -left-[25px] top-0 w-6 h-6 rounded-full bg-primary border-4 border-slate-50 flex items-center justify-center text-[10px] font-bold text-accent">5</div>
                                    <p class="pl-2">Masukkan PIN Anda dan tekan bayar. Status pembayaran otomatis terupdate segera setelah berhasil.</p>
                                </li>
                            </ol>
                        </div>
                    </div>
                </div>

                {{-- Aksi Tambahan --}}
                <div class="flex flex-col sm:flex-row gap-4 reveal delay-300">
                    <button class="flex-1 bg-white border-2 border-slate-100 text-primary font-bold py-4 rounded-xl shadow-[0_10px_30px_-10px_rgba(16,55,92,0.1)] hover:border-primary hover:bg-slate-50 transition-all duration-300 flex items-center justify-center gap-2 group">
                        <span class="w-3 h-3 rounded-full bg-accent animate-pulse"></span>
                        Cek Status Pembayaran
                    </button>
                    <a href="{{ route('user.project') }}" class="flex-1 bg-transparent border-2 border-transparent text-slate-500 font-bold py-4 rounded-xl hover:text-primary transition-all duration-300 flex items-center justify-center gap-2">
                        Kembali ke Proyek
                    </a>
                </div>

            </div>

        </div>
    </section>

</div>

@endsection
