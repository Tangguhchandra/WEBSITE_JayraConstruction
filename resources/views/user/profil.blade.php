@extends('user.layouts.main')

@section('title', 'Profil Pengguna - Jayra Construction')

@section('content')

<div class="pt-32 pb-0">

    {{-- ================= HEADER PROFIL ================= --}}
    <section class="max-w-7xl mx-auto px-6 mb-12">
        <div class="reveal bg-primary rounded-[2.5rem] p-8 md:p-12 shadow-2xl relative overflow-hidden flex flex-col md:flex-row items-center gap-8 group">
            <div class="absolute -right-20 -top-20 w-96 h-96 bg-accent/20 rounded-full blur-[80px] group-hover:scale-110 transition-transform duration-700 pointer-events-none"></div>
            <div class="absolute -left-10 -bottom-10 w-64 h-64 bg-white/5 rounded-full blur-[60px] group-hover:-translate-y-4 group-hover:scale-125 transition-transform duration-700 pointer-events-none delay-100"></div>
            <div class="absolute inset-0 bg-[url('https://www.transparenttextures.com/patterns/cubes.png')] opacity-5 mix-blend-overlay"></div>

            <div class="relative z-10 flex-shrink-0">
                <div class="w-32 h-32 md:w-40 md:h-40 rounded-full border-4 border-accent/30 bg-white/10 p-1 flex items-center justify-center overflow-hidden group-hover:border-accent transition-colors duration-500 shadow-xl">
                    <img src="https://ui-avatars.com/api/?name=John+Doe&background=0b2742&color=F3C623&size=200" alt="Profile Picture" class="w-full h-full rounded-full object-cover">
                </div>
            </div>
            
            <div class="relative z-10 text-center md:text-left flex-1">
                <div class="inline-flex items-center gap-2 px-4 py-1.5 rounded-full bg-white/10 border border-white/20 mb-4 backdrop-blur-sm text-white">
                    <svg class="w-3.5 h-3.5 text-accent" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"></path></svg>
                    <span class="text-[10px] md:text-xs font-bold uppercase tracking-widest text-accent">Member Terverifikasi</span>
                </div>
                <h1 class="font-display text-4xl md:text-5xl font-extrabold text-white mb-2 tracking-tight">John Doe</h1>
                <p class="text-slate-300 font-light text-lg">johndoe123</p>
            </div>
            
            <div class="relative z-10 mt-4 md:mt-0 flex-shrink-0">
                <button class="flex items-center gap-2 bg-white/10 hover:bg-accent text-white hover:text-primary px-6 py-3.5 rounded-xl font-bold text-sm transition-all duration-300 border border-white/20 hover:border-accent shadow-lg backdrop-blur-sm group/btn">
                    <svg class="w-5 h-5 group-hover/btn:rotate-12 transition-transform" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z"></path></svg>
                    Edit Profil
                </button>
            </div>
        </div>
    </section>

    {{-- ================= KONTEN PROFIL ================= --}}
    <section class="max-w-7xl mx-auto px-6 mb-20 lg:grid lg:grid-cols-3 gap-8 space-y-8 lg:space-y-0">
        
        {{-- BLOK 1: Data Diri User --}}
        <div class="lg:col-span-1 space-y-8 reveal delay-100">
            <div class="bg-white rounded-[2rem] p-8 shadow-[0_10px_40px_-10px_rgba(16,55,92,0.08)] border border-slate-50 relative overflow-hidden group h-full">
                <div class="absolute top-0 right-0 w-32 h-32 bg-primary/5 rounded-full blur-[20px] -mr-12 -mt-12 group-hover:scale-150 group-hover:bg-primary/10 transition-transform duration-700"></div>
                
                <h3 class="font-display text-2xl font-bold text-primary mb-8 flex items-center gap-3 relative z-10">
                    <div class="w-10 h-10 rounded-lg bg-primary/5 flex items-center justify-center text-primary group-hover:bg-primary group-hover:text-white transition-colors duration-300">
                        <svg class="w-5 h-5 text-accent" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z"></path></svg>
                    </div>
                    Informasi Akun
                </h3>

                <div class="space-y-6 relative z-10">
                    <div class="group/item">
                        <p class="text-[11px] font-bold text-slate-400 uppercase tracking-widest mb-1.5 group-hover/item:text-primary transition-colors">Nama Lengkap</p>
                        <p class="text-primary font-semibold text-[15px]">John Doe</p>
                    </div>
                    <hr class="border-slate-100">
                    <div class="group/item">
                        <p class="text-[11px] font-bold text-slate-400 uppercase tracking-widest mb-1.5 group-hover/item:text-primary transition-colors">Email</p>
                        <p class="text-slate-600 font-medium text-[15px]">mail@contoh.com</p>
                    </div>
                    <hr class="border-slate-100">
                    <div class="group/item">
                        <p class="text-[11px] font-bold text-slate-400 uppercase tracking-widest mb-1.5 group-hover/item:text-primary transition-colors">No. Handphone</p>
                        <p class="text-slate-600 font-medium text-[15px]">0812-3456-7890</p>
                    </div>
                    <hr class="border-slate-100">
                    <div class="group/item">
                        <p class="text-[11px] font-bold text-slate-400 uppercase tracking-widest mb-1.5 group-hover/item:text-primary transition-colors">Bergabung Sejak</p>
                        <p class="text-slate-600 font-medium text-[15px]">12 Februari 2026</p>
                    </div>
                </div>
            </div>
        </div>

        {{-- BLOK 2: Perkembangan Project & Services --}}
        <div class="lg:col-span-2 space-y-8">
            
            {{-- Panel Status Project --}}
            <div class="bg-white rounded-[2rem] p-8 shadow-[0_10px_40px_-10px_rgba(16,55,92,0.08)] border border-slate-50 reveal delay-200">
                <div class="flex flex-col sm:flex-row justify-between sm:items-center gap-4 mb-8">
                    <h3 class="font-display text-2xl font-bold text-primary flex items-center gap-3">
                        <div class="w-10 h-10 rounded-lg bg-primary/5 flex items-center justify-center text-primary">
                            <svg class="w-5 h-5 text-accent" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 19v-6a2 2 0 00-2-2H5a2 2 0 00-2 2v6a2 2 0 002 2h2a2 2 0 002-2zm0 0V9a2 2 0 012-2h2a2 2 0 012 2v10m-6 0a2 2 0 002 2h2a2 2 0 002-2m0 0V5a2 2 0 012-2h2a2 2 0 012 2v14a2 2 0 01-2 2h-2a2 2 0 01-2-2z"></path></svg>
                        </div>
                        Proyek Aktif
                    </h3>
                    <a href="{{ route('user.project') }}" class="text-sm font-bold text-primary hover:text-accent transition-colors flex items-center gap-1.5 bg-slate-50 hover:bg-white px-4 py-2 rounded-full border border-slate-100 shadow-sm">
                        Lihat Semua <svg class="w-4 h-4" viewBox="0 0 24 24" fill="none" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"></path></svg>
                    </a>
                </div>

                {{-- Card Ongoing Project --}}
                <div class="border-2 border-slate-50 hover:border-slate-100 rounded-2xl p-6 lg:p-8 hover:shadow-xl transition-all duration-300 group bg-white relative overflow-hidden">
                    {{-- Dekorasi Card --}}
                    <div class="absolute top-0 right-0 w-32 h-32 bg-slate-50 rounded-full blur-[30px] -mr-10 -mt-10 group-hover:bg-primary/5 transition-colors duration-500"></div>

                    <div class="relative z-10">
                        <div class="flex flex-col md:flex-row justify-between items-start md:items-center gap-4 mb-8">
                            <div class="flex items-center gap-5">
                                <div class="w-14 h-14 bg-slate-100 rounded-xl flex items-center justify-center text-slate-500 group-hover:bg-primary group-hover:text-white transition-all duration-300 shadow-sm group-hover:shadow-primary/20 group-hover:-translate-y-1">
                                    <svg class="w-7 h-7" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M19 21V5a2 2 0 00-2-2H7a2 2 0 00-2 2v16m14 0h2m-2 0h-5m-9 0H3m2 0h5M9 7h1v1H9V7zm5 0h1v1h-1V7zm-5 4h1v1H9v-1zm5 0h1v1h-1v-1zm-5 4h1v1H9v-1zm5 0h1v1h-1v-1z"></path></svg>
                                </div>
                                <div>
                                    <h4 class="font-bold text-primary text-xl group-hover:text-accent transition-colors">Rumah Tropis Modern</h4>
                                    <p class="text-sm text-slate-500 mt-1">Pembangunan Baru • Mulai 15 Jan 2026</p>
                                </div>
                            </div>
                            <span class="px-4 py-1.5 bg-accent/10 text-accent font-bold text-xs rounded-full border border-accent/20 flex items-center gap-1.5 whitespace-nowrap">
                                <span class="w-2 h-2 rounded-full bg-accent animate-pulse"></span>
                                Sedang Berjalan
                            </span>
                        </div>

                        {{-- Progress Bar Container --}}
                        <div class="space-y-3 bg-slate-50 p-5 rounded-2xl border border-slate-100">
                            <div class="flex justify-between items-end">
                                <div>
                                    <span class="text-[11px] font-bold text-slate-500 uppercase tracking-wider block mb-1">Progress Keseluruhan</span>
                                    <span class="text-primary font-bold text-sm">Tahap 4: Finishing Interior</span>
                                </div>
                                <span class="text-accent font-display font-extrabold text-2xl tracking-tight">65%</span>
                            </div>
                            <div class="w-full bg-slate-200 rounded-full h-3 overflow-hidden shadow-inner flex">
                                <div class="bg-primary h-full rounded-full relative transition-all duration-1000 ease-out flex items-center" style="width: 65%">
                                    {{-- Animasi Shimmer di dalam progress bar --}}
                                    <div class="absolute inset-0 bg-gradient-to-r from-transparent via-white/20 to-transparent w-full h-full animate-[shimmer_2s_infinite]"></div>
                                </div>
                            </div>
                        </div>

                        <div class="mt-8 flex flex-col sm:flex-row gap-4">
                            <a href="{{ route('user.detail-project') }}" class="flex-1 flex justify-center items-center gap-2 bg-primary text-white font-bold py-3.5 px-6 rounded-xl shadow-md hover:bg-primaryDark hover:-translate-y-1 hover:shadow-lg transition-all duration-300 text-sm">
                                Detail Proyek
                                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M14 5l7 7m0 0l-7 7m7-7H3"/></svg>
                            </a>
                            <a href="#" class="flex-1 flex justify-center items-center gap-2 bg-white text-primary font-bold py-3.5 px-6 rounded-xl border-2 border-slate-100 hover:border-primary hover:bg-slate-50 hover:-translate-y-1 transition-all duration-300 text-sm">
                                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 17v-2m3 2v-4m3 4v-6m2 10H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z"></path></svg>
                                Laporan Harian
                            </a>
                        </div>
                    </div>
                </div>
            </div>

            {{-- Panel Riwayat Layanan --}}
            <div class="bg-white rounded-[2rem] p-8 shadow-[0_10px_40px_-10px_rgba(16,55,92,0.08)] border border-slate-50 reveal delay-300">
                <h3 class="font-display text-2xl font-bold text-primary mb-8 flex items-center gap-3">
                    <div class="w-10 h-10 rounded-lg bg-primary/5 flex items-center justify-center text-primary">
                        <svg class="w-5 h-5 text-accent" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 11H5m14 0a2 2 0 012 2v6a2 2 0 01-2 2H5a2 2 0 01-2-2v-6a2 2 0 012-2m14 0V9a2 2 0 00-2-2M5 11V9a2 2 0 012-2m0 0V5a2 2 0 012-2h6a2 2 0 012 2v2M7 7h10"></path></svg>
                    </div>
                    Riwayat Layanan Pilihan
                </h3>

                <div class="space-y-4">
                    {{-- Item Layanan 1 --}}
                    <div class="flex flex-col sm:flex-row justify-between sm:items-center p-5 rounded-2xl border border-slate-100 bg-white hover:border-slate-300 hover:shadow-md transition-all duration-300 group cursor-pointer">
                        <div class="flex items-center gap-5">
                            <div class="w-12 h-12 rounded-xl bg-slate-50 border border-slate-100 text-slate-400 flex items-center justify-center group-hover:bg-primary group-hover:text-white group-hover:border-primary transition-all duration-300">
                                <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M5 13l4 4L19 7"></path></svg>
                            </div>
                            <div>
                                <h4 class="font-bold text-primary group-hover:text-accent transition-colors text-[15px]">Konsultasi Desain Konstruksi</h4>
                                <div class="flex items-center gap-3 mt-1 text-xs text-slate-400 font-medium">
                                    <span class="flex items-center gap-1"><svg class="w-3.5 h-3.5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z"></path></svg> 10 Jan 2026</span>
                                    <span class="w-1 h-1 rounded-full bg-slate-300"></span>
                                    <span>Konsultasi</span>
                                </div>
                            </div>
                        </div>
                        <div class="mt-4 sm:mt-0 flex items-center justify-between sm:justify-end gap-4 w-full sm:w-auto">
                            <span class="inline-flex px-3.5 py-1.5 bg-green-50 text-green-600 font-bold text-[11px] uppercase tracking-wider rounded-full border border-green-200 text-center">Selesai</span>
                            <div class="w-8 h-8 rounded-full bg-slate-50 flex items-center justify-center text-slate-400 group-hover:bg-accent/10 group-hover:text-accent transition-colors">
                                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"></path></svg>
                            </div>
                        </div>
                    </div>

                    {{-- Item Layanan 2 --}}
                    <div class="flex flex-col sm:flex-row justify-between sm:items-center p-5 rounded-2xl border border-slate-100 bg-white hover:border-slate-300 hover:shadow-md transition-all duration-300 group cursor-pointer">
                        <div class="flex items-center gap-5">
                            <div class="w-12 h-12 rounded-xl bg-slate-50 border border-slate-100 text-slate-400 flex items-center justify-center group-hover:bg-primary group-hover:text-white group-hover:border-primary transition-all duration-300">
                                <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z"></path></svg>
                            </div>
                            <div>
                                <h4 class="font-bold text-primary group-hover:text-accent transition-colors text-[15px]">Permintaan Survey Lokasi</h4>
                                <div class="flex items-center gap-3 mt-1 text-xs text-slate-400 font-medium">
                                    <span class="flex items-center gap-1"><svg class="w-3.5 h-3.5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z"></path></svg> 15 Feb 2026</span>
                                    <span class="w-1 h-1 rounded-full bg-slate-300"></span>
                                    <span>Renovasi</span>
                                </div>
                            </div>
                        </div>
                        <div class="mt-4 sm:mt-0 flex items-center justify-between sm:justify-end gap-4 w-full sm:w-auto">
                            <span class="inline-flex px-3.5 py-1.5 bg-blue-50 text-blue-600 font-bold text-[11px] uppercase tracking-wider rounded-full border border-blue-200 text-center">Dijadwalkan</span>
                            <div class="w-8 h-8 rounded-full bg-slate-50 flex items-center justify-center text-slate-400 group-hover:bg-accent/10 group-hover:text-accent transition-colors">
                                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"></path></svg>
                            </div>
                        </div>
                    </div>
                </div>

                {{-- CTA Booking --}}
                <div class="mt-10 p-6 rounded-2xl bg-gradient-to-br from-slate-50 to-slate-100 border border-slate-200 flex flex-col sm:flex-row items-center justify-between gap-6 relative overflow-hidden">
                    <div class="absolute -right-10 -bottom-10 w-32 h-32 bg-accent/10 rounded-full blur-[20px] pointer-events-none"></div>
                    <div class="relative z-10 text-center sm:text-left">
                        <h4 class="font-display font-bold text-primary mb-1">Butuh Layanan Tambahan?</h4>
                        <p class="text-xs text-slate-500 font-medium">Pesan layanan konsultasi atau konstruksi untuk proyek Anda.</p>
                    </div>
                    <a href="{{ route('user.service') }}" class="relative z-10 shrink-0 inline-flex items-center gap-2 px-6 py-3 rounded-xl bg-primary text-white font-bold text-sm shadow-md hover:bg-primaryDark hover:-translate-y-1 hover:shadow-lg transition-all duration-300">
                        Pesan Sekarang
                        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6v6m0 0v6m0-6h6m-6 0H6"></path></svg>
                    </a>
                </div>
            </div>

        </div>
    </section>
</div>

<style>
    @keyframes shimmer {
        0% { transform: translateX(-100%); opacity: 0; }
        50% { opacity: 1; }
        100% { transform: translateX(100%); opacity: 0; }
    }
</style>

@endsection
