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
            <span class="text-primary">Instruksi Bayar</span>
        </div>
        <h1 class="font-display text-3xl md:text-5xl font-extrabold text-primary tracking-tight">
            Selesaikan Pembayaran.
        </h1>
        <p class="text-slate-500 mt-2 text-lg font-light">
            Silakan tekan tombol bayar di bawah ini untuk memunculkan instruksi lengkap dari Midtrans.
        </p>
    </section>

    {{-- ================= KONTEN UTAMA ================= --}}
    <section class="max-w-7xl mx-auto px-6 mb-20">
        <div class="lg:grid lg:grid-cols-12 gap-8 space-y-8 lg:space-y-0">
            
            {{-- KOLOM KIRI (Visual & Trigger Midtrans) --}}
            <div class="lg:col-span-5 flex flex-col items-center">
                
                {{-- Kotak Instruksi --}}
                <div class="bg-white rounded-[2.5rem] p-8 md:p-10 shadow-2xl border border-slate-100 flex flex-col items-center w-full max-w-sm reveal delay-100 relative overflow-hidden group">
                    {{-- Efek Glow --}}
                    <div class="absolute inset-0 bg-gradient-to-b from-primary/5 to-transparent pointer-events-none"></div>
                    <div class="absolute -right-20 -top-20 w-40 h-40 bg-accent/10 rounded-full blur-[40px] pointer-events-none group-hover:bg-accent/20 transition-colors duration-500"></div>

                    {{-- Timer --}}
                    <div class="w-full flex justify-between items-center mb-6 relative z-10 px-2 py-3 bg-red-50 rounded-2xl border border-red-100" :class="isExpired ? 'bg-red-100' : 'bg-red-50'">
                        <div class="flex items-center gap-2 text-red-600 font-bold text-sm">
                            <svg class="w-5 h-5 animate-pulse" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z"></path></svg>
                            Batas Waktu
                        </div>
                        <div class="font-display text-xl font-extrabold text-red-600 tracking-wider font-mono tabular-nums" x-text="remaining"></div>
                    </div>

                    {{-- Ilustrasi Midtrans --}}
                    <div class="relative z-10 bg-slate-50 p-6 rounded-3xl border-4 border-slate-100 shadow-inner group-hover:border-primary/20 transition-colors duration-300 mb-6 w-full aspect-square flex flex-col items-center justify-center text-center">
                        <div class="w-20 h-20 bg-white rounded-full shadow-md flex items-center justify-center mb-4">
                            <svg class="w-10 h-10 text-primary" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m5.618-4.016A11.955 11.955 0 0112 2.944a11.955 11.955 0 01-8.618 3.04A12.02 12.02 0 003 9c0 5.591 3.824 10.29 9 11.622 5.176-1.332 9-6.03 9-11.622 0-1.042-.133-2.052-.382-3.016z"></path></svg>
                        </div>
                        <h4 class="font-bold text-primary mb-1">Sistem Terenkripsi</h4>
                        <p class="text-xs text-slate-400">Pembayaran diproses otomatis oleh Midtrans Payment Gateway.</p>
                        
                        {{-- Placeholder Expired --}}
                        <div x-show="isExpired" class="absolute inset-0 flex flex-col items-center justify-center bg-white/90 backdrop-blur-sm rounded-2xl" style="display: none;">
                            <div class="w-12 h-12 bg-red-100 text-red-500 rounded-full flex items-center justify-center mb-2">
                                <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"></path></svg>
                            </div>
                            <span class="font-bold text-red-600">Sesi Kedaluwarsa</span>
                        </div>
                    </div>

                    <div class="flex items-center justify-center gap-4 w-full mb-2">
                        <img src="https://upload.wikimedia.org/wikipedia/commons/thumb/a/a2/Logo_QRIS.svg/1200px-Logo_QRIS.svg.png" alt="QRIS" class="h-6 object-contain grayscale opacity-60">
                        <div class="w-1 h-6 bg-slate-200 rounded-full"></div>
                        <img src="https://upload.wikimedia.org/wikipedia/commons/thumb/2/22/GPN_Logo.svg/2560px-GPN_Logo.svg.png" alt="GPN" class="h-6 object-contain grayscale opacity-60">
                    </div>
                </div>

            </div>

            {{-- KOLOM KANAN (Rincian & Instruksi) --}}
            <div class="lg:col-span-7 space-y-8">
                
                {{-- Box Nominal Pembayaran (DINAMIS) --}}
                <div class="bg-primary rounded-[2.5rem] p-8 md:p-10 shadow-2xl relative overflow-hidden reveal delay-200">
                    <div class="absolute -right-20 -bottom-20 w-96 h-96 bg-accent/10 rounded-full blur-[80px] pointer-events-none"></div>
                    <div class="absolute inset-0 bg-[url('https://www.transparenttextures.com/patterns/cubes.png')] opacity-5 mix-blend-overlay"></div>

                    <div class="relative z-10">
                        <div class="flex flex-col md:flex-row justify-between md:items-end gap-6 border-b border-white/10 pb-8 mb-8">
                            <div>
                                <h3 class="text-white/60 font-bold text-sm uppercase tracking-widest mb-2">Total Pembayaran</h3>
                                <div class="font-display text-4xl sm:text-5xl font-extrabold text-white tracking-tight flex items-end gap-1">
                                    <span class="text-2xl mb-1 text-white/50">Rp</span> 
                                    {{-- FORMAT UANG DINAMIS --}}
                                    {{ number_format($request->gross_amount ?? 0, 0, ',', '.') }}
                                </div>
                                <div class="mt-4 bg-accent/20 border border-accent/30 px-4 py-2 rounded-xl inline-flex items-center gap-2">
                                    <svg class="w-4 h-4 text-accent" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 16h-1v-4h-1m1-4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"></path></svg>
                                    <p class="text-xs text-white">Pastikan nominal transfer <span class="font-bold text-accent">sesuai tagihan</span>.</p>
                                </div>
                            </div>
                            <div class="text-left md:text-right">
                                <p class="text-white/50 text-[11px] font-bold uppercase tracking-widest mb-1">Nomor Invoice</p>
                                {{-- INVOICE DINAMIS --}}
                                <p class="text-white font-bold tracking-wider uppercase">{{ $request->order_id ?? 'INV-JC-XXXX' }}</p>
                            </div>
                        </div>

                        {{-- Instruksi Pembayaran --}}
                        <div class="space-y-6">
                            <h4 class="text-white font-bold text-lg mb-4 flex items-center gap-2">
                                <svg class="w-5 h-5 text-accent" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8.228 9c.549-1.165 2.03-2 3.772-2 2.21 0 4 1.343 4 3 0 1.4-1.278 2.575-3.006 2.907-.542.104-.994.54-.994 1.093m0 3h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"></path></svg>
                                Cara Pembayaran
                            </h4>

                            <ol class="space-y-4 text-sm text-slate-300 relative pl-4 border-l-2 border-white/10">
                                <li class="relative">
                                    <div class="absolute -left-[25px] top-0 w-6 h-6 rounded-full bg-primary border-4 border-slate-50 flex items-center justify-center text-[10px] font-bold text-accent">1</div>
                                    <p class="pl-2">Klik tombol <strong>"Bayar Sekarang"</strong> di bawah.</p>
                                </li>
                                <li class="relative">
                                    <div class="absolute -left-[25px] top-0 w-6 h-6 rounded-full bg-primary border-4 border-slate-50 flex items-center justify-center text-[10px] font-bold text-accent">2</div>
                                    <p class="pl-2">Pilih metode pembayaran (Transfer Bank, E-Wallet, QRIS) di dalam layar Midtrans yang muncul.</p>
                                </li>
                                <li class="relative">
                                    <div class="absolute -left-[25px] top-0 w-6 h-6 rounded-full bg-primary border-4 border-slate-50 flex items-center justify-center text-[10px] font-bold text-accent">3</div>
                                    <p class="pl-2">Lakukan transfer sesuai dengan instruksi yang tertera pada layar tersebut.</p>
                                </li>
                                <li class="relative">
                                    <div class="absolute -left-[25px] top-0 w-6 h-6 rounded-full bg-primary border-4 border-slate-50 flex items-center justify-center text-[10px] font-bold text-accent">4</div>
                                    <p class="pl-2">Setelah sukses, sistem akan otomatis memperbarui status pesanan Anda.</p>
                                </li>
                            </ol>
                        </div>
                    </div>
                </div>

                {{-- TOMBOL PEMBAYARAN MIDTRANS --}}
                <div class="flex flex-col sm:flex-row gap-4 reveal delay-300">
                    <button id="pay-button" :disabled="isExpired" class="flex-1 bg-white border-2 border-slate-100 text-primary font-bold py-4 rounded-xl shadow-[0_10px_30px_-10px_rgba(16,55,92,0.1)] hover:border-accent hover:text-accent hover:bg-slate-50 transition-all duration-300 flex items-center justify-center gap-2 group disabled:opacity-50 disabled:cursor-not-allowed">
                        <span class="w-3 h-3 rounded-full bg-accent animate-pulse"></span>
                        Bayar Sekarang (Buka Midtrans)
                    </button>
                        <a href="{{ route('user.pembayaran.batal', $request->order_id) }}" class="flex-1 bg-transparent border-2 border-transparent text-slate-500 font-bold py-4 rounded-xl hover:text-red-500 hover:bg-red-50 transition-all duration-300 flex items-center justify-center gap-2">
                        Batal & Hapus Pesanan
                    </a>
                </div>

            </div>

        </div>
    </section>

</div>

@endsection

{{-- SCRIPT INTEGRASI MIDTRANS --}}
@push('scripts')
<script src="https://app.sandbox.midtrans.com/snap/snap.js" data-client-key="{{ env('MIDTRANS_CLIENT_KEY') }}"></script>

<script type="text/javascript">
    function openMidtrans() {
        window.snap.pay('{{ $snapToken }}', {
            onSuccess: function(result) {
                // UPDATE DI SINI: Bawa data dari Midtrans ke halaman sukses kita
                window.location.href = "/pembayaran/sukses?order_id=" + result.order_id + "&transaction_status=" + result.transaction_status;
            },
            onPending: function(result) {
                alert("Pembayaran Anda sedang diproses. Silakan selesaikan pembayaran Anda.");
            },
            onError: function(result) {
                alert("Pembayaran gagal! Silakan coba lagi.");
            },
            onClose: function() {
                console.log('User menutup popup tanpa menyelesaikan pembayaran');
            }
        });
    }

    document.addEventListener('DOMContentLoaded', function() {
        setTimeout(openMidtrans, 500); 
    });

    document.getElementById('pay-button').onclick = function(){
        openMidtrans();
    };
</script>
@endpush
