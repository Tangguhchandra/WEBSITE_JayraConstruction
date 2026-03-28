@extends('user.layouts.main')

@section('title', 'Profil Pengguna - Jayra Construction')

@section('content')

<div class="pt-32 pb-0 bg-slate-50/50" x-data="{ 
    showEditModal: false, 
    showModal: false, 
    selectedTrx: null 
}">
    {{-- ================= NOTIFIKASI ALERT ================= --}}
    
    {{-- Notifikasi Sukses --}}
    @if(session('success'))
        <div x-data="{ show: true }" x-show="show" x-init="setTimeout(() => show = false, 4000)"
             x-transition:enter="transition ease-out duration-500"
             x-transition:enter-start="opacity-0 -translate-y-4"
             x-transition:enter-end="opacity-100 translate-y-0"
             x-transition:leave="transition ease-in duration-300"
             x-transition:leave-start="opacity-100 translate-y-0"
             x-transition:leave-end="opacity-0 -translate-y-4"
             class="max-w-7xl mx-auto px-6 mb-6 relative z-50">
            <div class="bg-green-50/90 backdrop-blur-md border border-green-200 rounded-2xl p-4 flex items-center justify-between shadow-lg shadow-green-900/5">
                <div class="flex items-center gap-4">
                    <div class="w-10 h-10 rounded-full bg-green-100 flex items-center justify-center text-green-600 shadow-sm border border-green-200">
                        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M5 13l4 4L19 7"></path></svg>
                    </div>
                    <div>
                        <p class="text-[10px] font-bold text-green-600 uppercase tracking-widest mb-0.5">Berhasil</p>
                        <p class="text-sm font-bold text-green-900">{{ session('success') }}</p>
                    </div>
                </div>
                <button @click="show = false" class="text-green-600 hover:text-green-800 hover:bg-green-100 p-2 rounded-xl transition-colors">
                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"></path></svg>
                </button>
            </div>
        </div>
    @endif

    {{-- Notifikasi Error / Validasi Gagal --}}
    @if(session('error') || $errors->any())
        <div x-data="{ show: true }" x-show="show"
             x-transition:enter="transition ease-out duration-500"
             x-transition:enter-start="opacity-0 -translate-y-4"
             x-transition:enter-end="opacity-100 translate-y-0"
             x-transition:leave="transition ease-in duration-300"
             x-transition:leave-start="opacity-100 translate-y-0"
             x-transition:leave-end="opacity-0 -translate-y-4"
             class="max-w-7xl mx-auto px-6 mb-6 relative z-50">
            <div class="bg-red-50/90 backdrop-blur-md border border-red-200 rounded-2xl p-4 flex items-start sm:items-center justify-between shadow-lg shadow-red-900/5">
                <div class="flex items-start sm:items-center gap-4">
                    <div class="w-10 h-10 rounded-full bg-red-100 flex items-center justify-center text-red-600 shadow-sm border border-red-200 shrink-0 mt-1 sm:mt-0">
                        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M12 9v2m0 4h.01m-6.938 4h13.856c1.54 0 2.502-1.667 1.732-3L13.732 4c-.77-1.333-2.694-1.333-3.464 0L3.34 16c-.77 1.333.192 3 1.732 3z"></path></svg>
                    </div>
                    <div>
                        <p class="text-[10px] font-bold text-red-600 uppercase tracking-widest mb-0.5">Terdapat Kesalahan</p>
                        <div class="text-sm font-bold text-red-900">
                            @if(session('error'))
                                <p>{{ session('error') }}</p>
                            @endif
                            @if($errors->any())
                                <ul class="list-disc list-inside mt-1 space-y-1">
                                    @foreach($errors->all() as $error)
                                        <li class="font-medium text-xs">{{ $error }}</li>
                                    @endforeach
                                </ul>
                            @endif
                        </div>
                    </div>
                </div>
                <button @click="show = false" class="text-red-600 hover:text-red-800 hover:bg-red-100 p-2 rounded-xl transition-colors shrink-0">
                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"></path></svg>
                </button>
            </div>
        </div>
    @endif

    {{-- ================= HEADER PROFIL (DATA REAL) ================= --}}
    <section class="max-w-7xl mx-auto px-6 mb-12">
        <div class="reveal bg-primary rounded-[2.5rem] p-8 md:p-12 shadow-2xl relative overflow-hidden flex flex-col md:flex-row items-center gap-8 group">
            <div class="absolute -right-20 -top-20 w-96 h-96 bg-accent/20 rounded-full blur-[80px] group-hover:scale-110 transition-transform duration-700 pointer-events-none"></div>
            <div class="absolute -left-10 -bottom-10 w-64 h-64 bg-white/5 rounded-full blur-[60px] group-hover:-translate-y-4 group-hover:scale-125 transition-transform duration-700 pointer-events-none delay-100"></div>
            <div class="absolute inset-0 bg-[url('https://www.transparenttextures.com/patterns/cubes.png')] opacity-5 mix-blend-overlay"></div>

            <div class="relative z-10 flex-shrink-0">
                <div class="w-32 h-32 md:w-40 md:h-40 rounded-full border-4 border-accent/30 bg-white/10 p-1 flex items-center justify-center overflow-hidden group-hover:border-accent transition-colors duration-500 shadow-xl">
                    <img src="https://ui-avatars.com/api/?name={{ urlencode(Auth::user()->name) }}&background=0b2742&color=F3C623&size=200&bold=true" alt="Profile Picture" class="w-full h-full rounded-full object-cover">
                </div>
            </div>
            
            <div class="relative z-10 text-center md:text-left flex-1">
                <div class="inline-flex items-center gap-2 px-4 py-1.5 rounded-full bg-white/10 border border-white/20 mb-4 backdrop-blur-sm text-white shadow-sm">
                    <svg class="w-3.5 h-3.5 text-accent" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"></path></svg>
                    <span class="text-[10px] md:text-xs font-bold uppercase tracking-widest text-accent">Member Terverifikasi</span>
                </div>
                <h1 class="font-display text-4xl md:text-5xl font-extrabold text-white mb-2 tracking-tight">{{ Auth::user()->name }}</h1>
                <p class="text-slate-300 font-light text-lg">{{ Auth::user()->username ?? 'Member of Jayra' }}</p>
            </div>
            
            <div class="relative z-10 mt-4 md:mt-0 flex-shrink-0 flex flex-col gap-3 w-full md:w-auto">
                <button @click="showEditModal = true" type="button" class="flex items-center justify-center gap-2 bg-white hover:bg-accent text-primary px-8 py-3.5 rounded-xl font-bold text-sm transition-all duration-300 shadow-xl group/btn w-full md:w-auto">
                    <svg class="w-5 h-5 group-hover/btn:rotate-12 transition-transform" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z"></path></svg>
                    Edit Profil
                </button>
                
                <form action="{{ route('logout') }}" method="POST" class="w-full">
                    @csrf
                    <button type="submit" class="w-full flex items-center justify-center gap-2 bg-red-500/10 hover:bg-red-500 text-red-100 hover:text-white px-8 py-3.5 rounded-xl font-bold text-sm transition-all duration-300 border border-red-500/20 shadow-lg backdrop-blur-sm">
                        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 16l4-4m0 0l-4-4m4 4H7m6 4v1a3 3 0 01-3 3H6a3 3 0 01-3-3V7a3 3 0 013-3h4a3 3 0 013 3v1"></path></svg>
                        Keluar
                    </button>
                </form>
            </div>
        </div>
    </section>

    {{-- ================= KONTEN PROFIL ================= --}}
    <section class="max-w-7xl mx-auto px-6 mb-24 grid lg:grid-cols-12 gap-8 lg:gap-10">
        
        {{-- BLOK KIRI: Data Diri & Support (4 Kolom) --}}
        <div class="lg:col-span-4 space-y-8 reveal delay-100">
            
            {{-- Kartu Info Akun --}}
            <div class="bg-white rounded-[2rem] p-8 shadow-[0_10px_40px_-10px_rgba(16,55,92,0.08)] border border-slate-100 relative overflow-hidden group">
                <div class="absolute top-0 right-0 w-32 h-32 bg-primary/5 rounded-full blur-[20px] -mr-12 -mt-12 group-hover:scale-150 group-hover:bg-primary/10 transition-transform duration-700 pointer-events-none"></div>
                
                <h3 class="font-display text-xl font-bold text-primary mb-8 flex items-center gap-3 relative z-10">
                    <div class="w-10 h-10 rounded-xl bg-slate-50 border border-slate-100 flex items-center justify-center text-primary group-hover:bg-primary group-hover:text-white transition-colors duration-300 shadow-sm">
                        <svg class="w-5 h-5 text-accent" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z"></path></svg>
                    </div>
                    Informasi Akun
                </h3>

                <div class="space-y-5 relative z-10">
                    <div class="group/item p-3 -mx-3 rounded-xl hover:bg-slate-50 transition-colors">
                        <p class="text-[10px] font-bold text-slate-400 uppercase tracking-widest mb-1 group-hover/item:text-primary transition-colors">Nama Lengkap</p>
                        <p class="text-primary font-bold text-[15px]">{{ Auth::user()->name }}</p>
                    </div>
                    <hr class="border-slate-100">
                    <div class="group/item p-3 -mx-3 rounded-xl hover:bg-slate-50 transition-colors">
                        <p class="text-[10px] font-bold text-slate-400 uppercase tracking-widest mb-1 group-hover/item:text-primary transition-colors">Email</p>
                        <p class="text-slate-600 font-medium text-[15px]">{{ Auth::user()->email }}</p>
                    </div>
                    <hr class="border-slate-100">
                    <div class="group/item p-3 -mx-3 rounded-xl hover:bg-slate-50 transition-colors">
                        <p class="text-[10px] font-bold text-slate-400 uppercase tracking-widest mb-1 group-hover/item:text-primary transition-colors">No. Handphone</p>
                        <p class="text-slate-600 font-medium text-[15px]">{{ Auth::user()->phone ?? 'Belum ditambahkan' }}</p>
                    </div>
                    <hr class="border-slate-100">
                    <div class="group/item p-3 -mx-3 rounded-xl hover:bg-slate-50 transition-colors">
                        <p class="text-[10px] font-bold text-slate-400 uppercase tracking-widest mb-1 group-hover/item:text-primary transition-colors">Bergabung Sejak</p>
                        <p class="text-slate-600 font-medium text-[15px]">{{ Auth::user()->created_at->translatedFormat('d F Y') }}</p>
                    </div>
                </div>
            </div>

            {{-- Kartu Komunitas / Sosial Media (Desain Bersih & Elegan) --}}
            <div class="bg-white rounded-[2rem] p-8 text-center relative overflow-hidden group shadow-[0_10px_40px_-10px_rgba(16,55,92,0.08)] border border-slate-100">
                {{-- Background Pattern (Sangat Tipis) --}}
                <div class="absolute inset-0 bg-[url('https://www.transparenttextures.com/patterns/cubes.png')] opacity-[0.02]"></div>
                
                {{-- Aksen Kuning Jayra di Pojok --}}
                <div class="absolute -right-10 -top-10 w-32 h-32 bg-accent/20 rounded-full blur-[30px] group-hover:scale-150 transition-transform duration-700 pointer-events-none"></div>

                {{-- Ikon Sosmed --}}
                <div class="relative z-10 w-14 h-14 bg-slate-50 rounded-full flex items-center justify-center mx-auto mb-4 text-primary border border-slate-100 group-hover:bg-primary group-hover:text-white transition-colors duration-300 shadow-sm">
                    <svg class="w-7 h-7" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M14 10h4.764a2 2 0 011.789 2.894l-3.5 7A2 2 0 0115.263 21h-4.017c-.163 0-.326-.02-.485-.06L7 20m7-10V5a2 2 0 00-2-2h-.095c-.5 0-.905.405-.905.905 0 .714-.211 1.412-.608 2.006L7 11v9m7-10h-2M7 20H5a2 2 0 01-2-2v-6a2 2 0 012-2h2.5"></path></svg>
                </div>
                
                <h4 class="font-bold text-primary mb-2 relative z-10">Tetap Terhubung!</h4>
                <p class="text-xs text-slate-500 mb-6 leading-relaxed relative z-10">Dapatkan tips bangun rumah, tren arsitektur terkini, dan info menarik lainnya di sosial media kami.</p>
                
                {{-- Tombol Sosmed --}}
                <a href="#" target="_blank" class="relative z-10 flex items-center justify-center gap-2 w-full py-3.5 px-4 bg-primary text-white font-bold text-sm rounded-xl hover:bg-primaryDark transition-all duration-300 shadow-lg hover:-translate-y-1">
                    {{-- Ikon Instagram (Warna Kuning Accent) --}}
                    <svg class="w-4 h-4 text-accent" fill="currentColor" viewBox="0 0 24 24"><path d="M12 2.163c3.204 0 3.584.012 4.85.07 3.252.148 4.771 1.691 4.919 4.919.058 1.265.069 1.645.069 4.849 0 3.205-.012 3.584-.069 4.849-.149 3.225-1.664 4.771-4.919 4.919-1.266.058-1.644.07-4.85.07-3.204 0-3.584-.012-4.849-.07-3.26-.149-4.771-1.699-4.919-4.92-.058-1.265-.07-1.644-.07-4.849 0-3.204.013-3.583.07-4.849.149-3.227 1.664-4.771 4.919-4.919 1.266-.057 1.645-.069 4.849-.069zM12 0C8.741 0 8.333.014 7.053.072 2.695.272.273 2.69.073 7.052.014 8.333 0 8.741 0 12c0 3.259.014 3.668.072 4.948.2 4.358 2.618 6.78 6.98 6.98C8.333 23.986 8.741 24 12 24c3.259 0 3.668-.014 4.948-.072 4.354-.2 6.782-2.618 6.979-6.98.059-1.28.073-1.689.073-4.948 0-3.259-.014-3.667-.072-4.947-.196-4.354-2.617-6.78-6.979-6.98C15.668.014 15.259 0 12 0zm0 5.838a6.162 6.162 0 100 12.324 6.162 6.162 0 000-12.324zM12 16a4 4 0 110-8 4 4 0 010 8zm6.406-11.845a1.44 1.44 0 100 2.881 1.44 1.44 0 000-2.881z"/></svg>
                    Follow Instagram Kami
                </a>
            </div>

        </div>

        {{-- BLOK KANAN: Riwayat Layanan & Banner (8 Kolom) --}}
        <div class="lg:col-span-8 space-y-8">
            
            {{-- Panel Riwayat Layanan --}}
            <div class="bg-white rounded-[2.5rem] p-8 md:p-10 shadow-[0_10px_40px_-10px_rgba(16,55,92,0.08)] border border-slate-100 reveal delay-200 h-full flex flex-col">
                <h3 class="font-display text-2xl font-bold text-primary mb-8 flex items-center gap-4">
                    <div class="w-12 h-12 rounded-xl bg-slate-50 border border-slate-100 flex items-center justify-center text-primary shadow-sm">
                        <svg class="w-6 h-6 text-accent" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 11H5m14 0a2 2 0 012 2v6a2 2 0 01-2 2H5a2 2 0 01-2-2v-6a2 2 0 012-2m14 0V9a2 2 0 00-2-2M5 11V9a2 2 0 012-2m0 0V5a2 2 0 012-2h6a2 2 0 012 2v2M7 7h10"></path></svg>
                    </div>
                    Riwayat Layanan Dibeli
                </h3>

                {{-- JIKA ADA TRANSAKSI --}}
                @if(isset($transactions) && $transactions->count() > 0)
                    <div class="space-y-4">
                        @foreach($transactions as $trx)
                        {{-- Data per transaksi dilempar ke Alpine saat di-klik --}}
                        <div @click="selectedTrx = {{ json_encode([
                                'id' => $trx->id,
                                'order_id' => $trx->order_id,
                                'service_name' => $trx->service_name,
                                'gross_amount' => number_format($trx->gross_amount, 0, ',', '.'),
                                'status' => $trx->transaction_status,
                                'date' => $trx->created_at->translatedFormat('d F Y, H:i')
                            ]) }}; showModal = true" 
                             class="border border-slate-200 rounded-2xl p-5 hover:shadow-lg hover:border-primary/30 transition-all duration-300 group cursor-pointer">
                            <div class="flex flex-col sm:flex-row justify-between sm:items-center gap-4">
                                <div>
                                    <div class="flex items-center gap-3 mb-2">
                                        <span class="text-xs font-bold text-slate-500 uppercase tracking-widest">{{ $trx->order_id }}</span>
                                        {{-- Badge Status --}}
                                        @if($trx->transaction_status == 'settlement' || $trx->transaction_status == 'success')
                                            <span class="bg-green-100 text-green-700 text-[10px] font-bold px-2 py-1 rounded-md uppercase">Berhasil</span>
                                        @elseif($trx->transaction_status == 'pending')
                                            <span class="bg-yellow-100 text-yellow-700 text-[10px] font-bold px-2 py-1 rounded-md uppercase">Pending</span>
                                        @else
                                            <span class="bg-red-100 text-red-700 text-[10px] font-bold px-2 py-1 rounded-md uppercase">Gagal/Batal</span>
                                        @endif
                                    </div>
                                    <h4 class="font-bold text-primary text-lg group-hover:text-accent transition-colors">{{ $trx->service_name }}</h4>
                                    <p class="text-sm text-slate-500 mt-1">{{ $trx->created_at->translatedFormat('d F Y, H:i') }}</p>
                                </div>
                                <div class="text-left sm:text-right flex items-center justify-between sm:block">
                                    <div>
                                        <p class="text-xs font-bold text-slate-400 uppercase tracking-widest mb-1">Total Tagihan</p>
                                        <p class="font-display font-extrabold text-xl text-primary">Rp {{ number_format($trx->gross_amount, 0, ',', '.') }}</p>
                                    </div>
                                    <svg class="w-5 h-5 text-slate-300 sm:hidden" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"></path></svg>
                                </div>
                            </div>
                        </div>
                        @endforeach
                    </div>

                {{-- JIKA KOSONG (EMPTY STATE) --}}
                @else
                    <div class="flex-grow flex flex-col items-center justify-center text-center py-16 px-6 rounded-3xl bg-slate-50/50 border-2 border-dashed border-slate-200 relative overflow-hidden group/empty">
                        <div class="absolute inset-0 bg-gradient-to-b from-transparent to-slate-50/80 pointer-events-none"></div>
                        
                        {{-- Ikon Ilustrasi Besar --}}
                        <div class="relative mb-8">
                            <div class="absolute inset-0 bg-accent/20 rounded-full blur-[30px] group-hover/empty:scale-150 transition-transform duration-1000"></div>
                            <div class="w-28 h-28 bg-white rounded-full flex items-center justify-center relative z-10 shadow-xl border border-slate-100 group-hover/empty:-translate-y-2 transition-transform duration-500">
                                <svg class="w-12 h-12 text-slate-300 group-hover/empty:text-primary transition-colors duration-500" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M20 7l-8-4-8 4m16 0l-8 4m8-4v10l-8 4m0-10L4 7m8 4v10M4 7v10l8 4"></path></svg>
                            </div>
                            {{-- Floating Mini Icons --}}
                            <div class="absolute -top-2 -right-4 w-8 h-8 bg-white rounded-full shadow-md flex items-center justify-center text-accent animate-bounce" style="animation-delay: 0.2s">
                                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"></path></svg>
                            </div>
                            <div class="absolute bottom-2 -left-6 w-10 h-10 bg-white rounded-full shadow-md flex items-center justify-center text-primary animate-bounce" style="animation-delay: 0.5s">
                                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6v6m0 0v6m0-6h6m-6 0H6"></path></svg>
                            </div>
                        </div>

                        <h4 class="text-2xl font-display font-bold text-primary mb-3 relative z-10">Belum Ada Riwayat Layanan</h4>
                        <p class="text-base text-slate-500 max-w-md mx-auto mb-8 relative z-10 leading-relaxed">
                            Anda belum memiliki riwayat pemesanan. Mulai wujudkan proyek impian Anda dengan layanan profesional dari Jayra Construction.
                        </p>
                        
                        <a href="{{ route('user.service') }}" class="relative z-10 inline-flex items-center gap-2 bg-primary text-white font-bold py-3.5 px-8 rounded-xl shadow-[0_10px_20px_rgba(11,39,66,0.15)] hover:bg-primaryDark hover:shadow-[0_15px_30px_rgba(11,39,66,0.2)] hover:-translate-y-1 transition-all duration-300">
                            Lihat Katalog Layanan
                            <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 8l4 4m0 0l-4 4m4-4H3"></path></svg>
                        </a>
                    </div>
                @endif
            </div>

            {{-- MODAL DETAIL TRANSAKSI --}}
            <div x-show="showModal" style="display: none;" class="fixed inset-0 z-50 flex items-center justify-center px-4">
                {{-- Backdrop --}}
                <div class="absolute inset-0 bg-primary/80 backdrop-blur-sm transition-opacity" @click="showModal = false"
                     x-transition:enter="ease-out duration-300" x-transition:enter-start="opacity-0" x-transition:enter-end="opacity-100"
                     x-transition:leave="ease-in duration-200" x-transition:leave-start="opacity-100" x-transition:leave-end="opacity-0"></div>

                {{-- Modal Panel --}}
                <div class="bg-white rounded-3xl w-full max-w-lg relative z-10 shadow-2xl overflow-hidden"
                     x-transition:enter="ease-out duration-300" x-transition:enter-start="opacity-0 translate-y-4 sm:translate-y-0 sm:scale-95" x-transition:enter-end="opacity-100 translate-y-0 sm:scale-100"
                     x-transition:leave="ease-in duration-200" x-transition:leave-start="opacity-100 translate-y-0 sm:scale-100" x-transition:leave-end="opacity-0 translate-y-4 sm:translate-y-0 sm:scale-95">
                    
                    {{-- Header Modal --}}
                    <div class="bg-slate-50 border-b border-slate-100 px-6 py-4 flex items-center justify-between">
                        <h3 class="font-bold text-primary flex items-center gap-2">
                            <svg class="w-5 h-5 text-accent" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z"></path></svg>
                            Detail Transaksi
                        </h3>
                        <button @click="showModal = false" class="text-slate-400 hover:text-red-500 transition-colors">
                            <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"></path></svg>
                        </button>
                    </div>

                    {{-- Body Modal (Isi Dinamis Alpine) --}}
                    <div class="p-6 sm:p-8 space-y-6">
                        <div class="text-center pb-6 border-b border-slate-100">
                            <p class="text-xs font-bold text-slate-400 uppercase tracking-widest mb-1" x-text="selectedTrx?.order_id"></p>
                            <h4 class="font-display text-2xl font-extrabold text-primary mb-3" x-text="selectedTrx?.service_name"></h4>
                            
                            {{-- Tampilan Status di Modal --}}
                            <div class="inline-flex items-center">
                                <span x-show="selectedTrx?.status == 'settlement' || selectedTrx?.status == 'success'" class="bg-green-100 text-green-700 text-xs font-bold px-3 py-1.5 rounded-lg uppercase tracking-wider flex items-center gap-1.5">
                                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"></path></svg> Pembayaran Berhasil
                                </span>
                                <span x-show="selectedTrx?.status == 'pending'" class="bg-yellow-100 text-yellow-700 text-xs font-bold px-3 py-1.5 rounded-lg uppercase tracking-wider flex items-center gap-1.5">
                                    <svg class="w-4 h-4 animate-spin" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 4v5h.582m15.356 2A8.001 8.001 0 004.582 9m0 0H9m11 11v-5h-.581m0 0a8.003 8.003 0 01-15.357-2m15.357 2H15"></path></svg> Menunggu Pembayaran
                                </span>
                                <span x-show="selectedTrx?.status == 'expire' || selectedTrx?.status == 'cancel'" class="bg-red-100 text-red-700 text-xs font-bold px-3 py-1.5 rounded-lg uppercase tracking-wider flex items-center gap-1.5">
                                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"></path></svg> Gagal / Dibatalkan
                                </span>
                            </div>
                        </div>

                        <div class="flex justify-between items-center bg-slate-50 p-4 rounded-xl border border-slate-100">
                            <div>
                                <p class="text-xs text-slate-500 mb-1">Waktu Pesanan</p>
                                <p class="font-bold text-primary text-sm" x-text="selectedTrx?.date"></p>
                            </div>
                            <div class="text-right">
                                <p class="text-xs text-slate-500 mb-1">Total Dibayar</p>
                                <p class="font-bold text-accent text-lg">Rp <span x-text="selectedTrx?.gross_amount"></span></p>
                            </div>
                        </div>

                        {{-- AKSI DINAMIS BERDASARKAN STATUS --}}
                        <div class="pt-2">
                            {{-- Jika PENDING: Tampilkan tombol Lanjut Bayar --}}
                            <div x-show="selectedTrx?.status == 'pending'" class="flex flex-col gap-3">
                                
                                {{-- Tombol Mengarah ke Fungsi Lanjutkan di Controller --}}
                                <a :href="`/pembayaran/lanjutkan/${selectedTrx?.id}`" class="w-full bg-accent hover:bg-yellow-400 text-primary font-bold py-3.5 rounded-xl shadow-lg transition-all flex items-center justify-center gap-2">
                                    Lanjutkan Pembayaran
                                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M14 5l7 7m0 0l-7 7m7-7H3"></path></svg>
                                </a>
                                
                                {{-- Tombol Batalkan Pesanan dengan Konfirmasi --}}
                                <div x-show="selectedTrx?.status === 'pending'" x-cloak class="mt-4">
                                    <form :action="`/transaksi/${selectedTrx?.id}/batal`" method="POST" onsubmit="return confirm('Apakah Anda yakin ingin membatalkan pesanan ini? Pesanan yang dibatalkan tidak dapat dikembalikan.');">
                                        @csrf
                                        @method('DELETE')                                      
                                        <button type="submit" class="w-full bg-white border border-slate-200 text-red-500 font-bold py-3.5 rounded-xl hover:bg-red-50 transition-all text-sm flex items-center justify-center gap-2">
                                            <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"/></svg>
                                            Batalkan Pesanan
                                        </button>
                                    </form>
                                </div>
                            </div>

                            {{-- Jika BERHASIL / GAGAL: Tampilkan tombol Hapus Riwayat (Sembunyikan) --}}
                            <div x-show="selectedTrx?.status != 'pending'">
                                <form :action="`/pembayaran/sembunyikan/${selectedTrx?.id}`" method="POST">
                                    @csrf
                                    <button type="submit" class="w-full bg-white border border-slate-200 text-slate-500 hover:text-red-500 font-bold py-3.5 rounded-xl hover:bg-red-50 transition-all text-sm flex items-center justify-center gap-2">
                                        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16"></path></svg>
                                        Hapus dari Riwayat (Arsipkan)
                                    </button>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

        </div> {{-- Ini penutup blok kanan (lg:col-span-8) --}}
    </section>

    {{-- ================= MODAL EDIT PROFIL ================= --}}
    <div x-show="showEditModal" style="display: none;" class="fixed inset-0 z-[100] flex items-center justify-center px-4" x-cloak>
        {{-- Backdrop --}}
        <div class="absolute inset-0 bg-primary/80 backdrop-blur-sm transition-opacity" @click="showEditModal = false"
             x-transition:enter="ease-out duration-300" x-transition:enter-start="opacity-0" x-transition:enter-end="opacity-100"
             x-transition:leave="ease-in duration-200" x-transition:leave-start="opacity-100" x-transition:leave-end="opacity-0"></div>

        {{-- Modal Panel --}}
        <div class="bg-white rounded-3xl w-full max-w-md relative z-10 shadow-2xl overflow-hidden"
             x-transition:enter="ease-out duration-300" x-transition:enter-start="opacity-0 translate-y-4 sm:translate-y-0 sm:scale-95" x-transition:enter-end="opacity-100 translate-y-0 sm:scale-100"
             x-transition:leave="ease-in duration-200" x-transition:leave-start="opacity-100 translate-y-0 sm:scale-100" x-transition:leave-end="opacity-0 translate-y-4 sm:translate-y-0 sm:scale-95">
            
            {{-- Header Modal --}}
            <div class="bg-slate-50 border-b border-slate-100 px-6 py-4 flex items-center justify-between">
                <h3 class="font-bold text-primary flex items-center gap-2">
                    <svg class="w-5 h-5 text-accent" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z"></path></svg>
                    Edit Profil Anda
                </h3>
                <button @click="showEditModal = false" class="text-slate-400 hover:text-red-500 transition-colors">
                    <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"></path></svg>
                </button>
            </div>

            {{-- Form Edit --}}
            <form action="{{ route('user.profil.update') }}" method="POST" class="p-6 space-y-5">
                @csrf
                @method('PUT')
                
                <div>
                    <label class="text-xs font-bold text-slate-500 uppercase tracking-widest ml-1">Nama Lengkap</label>
                    <input type="text" name="name" value="{{ Auth::user()->name }}" required 
                           class="w-full mt-2 px-4 py-3 rounded-xl border border-slate-200 bg-slate-50 text-primary text-sm focus:bg-white focus:border-primary focus:ring-4 focus:ring-primary/10 outline-none transition-all">
                </div>

                <div>
                    <label class="text-xs font-bold text-slate-500 uppercase tracking-widest ml-1">Username</label>
                    <input type="text" name="username" value="{{ Auth::user()->username }}" required 
                           class="w-full mt-2 px-4 py-3 rounded-xl border border-slate-200 bg-slate-50 text-primary text-sm focus:bg-white focus:border-primary focus:ring-4 focus:ring-primary/10 outline-none transition-all">
                </div>

                <div>
                    <label class="text-xs font-bold text-slate-500 uppercase tracking-widest ml-1">No. Handphone</label>
                    <input type="text" name="phone" value="{{ Auth::user()->phone }}" placeholder="Contoh: 08123456789"
                           class="w-full mt-2 px-4 py-3 rounded-xl border border-slate-200 bg-slate-50 text-primary text-sm focus:bg-white focus:border-primary focus:ring-4 focus:ring-primary/10 outline-none transition-all">
                </div>

                {{-- Catatan: Email sengaja tidak dibikin edit di sini karena biasanya butuh verifikasi ulang --}}

                <div class="pt-4 flex gap-3">
                    <button type="button" @click="showEditModal = false" class="w-1/3 bg-slate-100 text-slate-600 font-bold py-3.5 rounded-xl hover:bg-slate-200 transition-colors text-sm">
                        Batal
                    </button>
                    <button type="submit" class="w-2/3 bg-primary text-white font-bold py-3.5 rounded-xl hover:bg-primaryDark transition-all hover:-translate-y-1 shadow-lg text-sm flex items-center justify-center gap-2">
                        Simpan Perubahan
                        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"></path></svg>
                    </button>
                </div>
            </form>
        </div>
    </div>

</div> {{-- INI PENUTUP ATAP x-data UTAMA --}}

@endsection