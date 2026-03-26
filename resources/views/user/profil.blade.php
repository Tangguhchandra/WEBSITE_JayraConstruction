@extends('user.layouts.main')

@section('title', 'Profil Pengguna - Jayra Construction')

@section('content')

<div class="pt-32 pb-0 bg-slate-50/50">

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
                <button class="flex items-center justify-center gap-2 bg-white hover:bg-accent text-primary px-8 py-3.5 rounded-xl font-bold text-sm transition-all duration-300 shadow-xl group/btn">
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

            {{-- Kartu Bantuan Cepat --}}
            <div class="bg-gradient-to-br from-slate-50 to-slate-100 rounded-[2rem] p-8 border border-slate-200 text-center relative overflow-hidden group">
                <div class="absolute inset-0 bg-[url('https://www.transparenttextures.com/patterns/cubes.png')] opacity-[0.03]"></div>
                <div class="w-14 h-14 bg-white rounded-full flex items-center justify-center mx-auto mb-4 text-accent shadow-sm border border-slate-100 group-hover:scale-110 transition-transform">
                    <svg class="w-7 h-7" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M18.364 5.636l-3.536 3.536m0 5.656l3.536 3.536M9.172 9.172L5.636 5.636m3.536 9.192l-3.536 3.536M21 12a9 9 0 11-18 0 9 9 0 0118 0zm-5 0a4 4 0 11-8 0 4 4 0 018 0z"></path></svg>
                </div>
                <h4 class="font-bold text-primary mb-2">Butuh Bantuan?</h4>
                <p class="text-xs text-slate-500 mb-5 leading-relaxed">Tim dukungan kami siap membantu menjawab pertanyaan seputar layanan dan akun Anda.</p>
                <a href="{{ route('user.contact') }}" class="inline-block w-full py-3 px-4 bg-white border border-slate-200 text-primary font-bold text-sm rounded-xl hover:border-primary hover:text-primary transition-colors shadow-sm">
                    Hubungi Support
                </a>
            </div>

        </div>

        {{-- BLOK KANAN: Riwayat Layanan & Banner (8 Kolom) --}}
        <div class="lg:col-span-8 space-y-8">
            
            {{-- Panel Riwayat Layanan (EMPTY STATE MEWAH) --}}
            <div class="bg-white rounded-[2.5rem] p-8 md:p-10 shadow-[0_10px_40px_-10px_rgba(16,55,92,0.08)] border border-slate-100 reveal delay-200 h-full flex flex-col">
                <h3 class="font-display text-2xl font-bold text-primary mb-8 flex items-center gap-4">
                    <div class="w-12 h-12 rounded-xl bg-slate-50 border border-slate-100 flex items-center justify-center text-primary shadow-sm">
                        <svg class="w-6 h-6 text-accent" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 11H5m14 0a2 2 0 012 2v6a2 2 0 01-2 2H5a2 2 0 01-2-2v-6a2 2 0 012-2m14 0V9a2 2 0 00-2-2M5 11V9a2 2 0 012-2m0 0V5a2 2 0 012-2h6a2 2 0 012 2v2M7 7h10"></path></svg>
                    </div>
                    Riwayat Layanan Dibeli
                </h3>

                {{-- Area Kosong (Empty State) --}}
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
            </div>

            {{-- Banner Promo (DARK THEME PREMIUM) --}}
            <div class="reveal delay-300 relative overflow-hidden rounded-[2.5rem] bg-gradient-to-br from-primary to-slate-900 p-10 md:p-12 shadow-2xl flex flex-col md:flex-row items-center justify-between gap-8 group">
                {{-- Ornamen Abstrak --}}
                <div class="absolute -right-10 top-0 w-64 h-64 bg-accent/20 rounded-full blur-[50px] pointer-events-none group-hover:scale-110 transition-transform duration-700"></div>
                <div class="absolute left-10 -bottom-20 w-48 h-48 bg-white/5 rounded-full blur-[40px] pointer-events-none"></div>
                <div class="absolute inset-0 bg-[url('https://www.transparenttextures.com/patterns/cubes.png')] opacity-[0.05] pointer-events-none"></div>

                <div class="relative z-10 text-center md:text-left">
                    <div class="inline-flex items-center gap-2 px-3 py-1 rounded-full bg-white/10 border border-white/20 mb-4 backdrop-blur-sm text-white">
                        <span class="w-2 h-2 rounded-full bg-accent animate-pulse"></span>
                        <span class="text-[10px] font-bold uppercase tracking-widest text-accent">Promo Terbatas</span>
                    </div>
                    <h4 class="font-display text-3xl md:text-4xl font-extrabold text-white mb-3">Konsultasi Desain <span class="text-accent">Gratis!</span></h4>
                    <p class="text-slate-300 font-light text-sm md:text-base max-w-sm">Jadwalkan pertemuan dengan arsitek kami hari ini dan dapatkan sketsa awal tanpa biaya.</p>
                </div>

                <a href="{{ route('user.contact') }}" class="relative z-10 shrink-0 inline-flex items-center justify-center gap-2 px-8 py-4 rounded-xl bg-accent text-primary font-bold text-[15px] shadow-[0_10px_25px_rgba(243,198,35,0.3)] hover:bg-white hover:-translate-y-1 hover:shadow-[0_15px_35px_rgba(255,255,255,0.2)] transition-all duration-300 w-full md:w-auto">
                    Hubungi Sekarang
                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 12h.01M12 12h.01M16 12h.01M21 12c0 4.418-4.03 8-9 8a9.863 9.863 0 01-4.255-.949L3 20l1.395-3.72C3.512 15.042 3 13.574 3 12c0-4.418 4.03-8 9-8s9 3.582 9 8z"></path></svg>
                </a>
            </div>

        </div>
    </section>
</div>

@endsection