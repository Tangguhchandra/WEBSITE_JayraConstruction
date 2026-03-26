@extends('user.layouts.main')

@section('title', 'Project - Jayra Construction')

@section('content')

{{-- ================= SECTION 1: HERO HEADER (KOLASE FOTO) ================= --}}
<section class="relative pt-36 pb-20 lg:pt-44 lg:pb-28 overflow-hidden bg-pattern">
    <div class="absolute top-20 left-[-10%] w-[400px] h-[400px] bg-primary/5 rounded-full blur-[100px] pointer-events-none"></div>

    <div class="max-w-7xl mx-auto px-6 relative z-10">

        {{-- ================= BREADCRUMB ================= --}}
        <nav class="flex items-center gap-2 text-sm font-medium text-slate-400 mb-10 reveal">
            <a href="{{ route('user.home') }}" class="hover:text-primary transition-colors flex items-center gap-1.5">
                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 12l2-2m0 0l7-7 7 7M5 10v10a1 1 0 001 1h3m10-11l2 2m-2-2v10a1 1 0 01-1 1h-3m-6 0a1 1 0 001-1v-4a1 1 0 011-1h2a1 1 0 011 1v4a1 1 0 001 1m-6 0h6"/></svg>
                Home
            </a>
            <svg class="w-3.5 h-3.5 text-slate-300" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"/></svg>
            <span class="text-primary font-semibold">Project</span>
        </nav>

        <div class="grid md:grid-cols-2 gap-12 lg:gap-16 items-center">
            
            <div class="reveal">
                <div class="inline-flex items-center gap-2 px-5 py-2.5 rounded-full bg-accent/10 border border-accent/20 mb-6 shadow-sm">
                    <span class="w-2 h-2 rounded-full bg-accent animate-pulse"></span>
                    <span class="text-xs font-bold text-primary uppercase tracking-widest">Our Portfolio</span>
                </div>
                
                <h1 class="font-display text-4xl sm:text-5xl lg:text-[56px] font-extrabold text-primary leading-tight mb-6 tracking-tight">
                    Karya <span class="text-accent">Nyata,</span><br>
                    Kualitas <span class="text-accent">Teruji.</span>
                </h1>
                
                <p class="text-slate-500 font-light text-lg leading-relaxed max-w-lg mb-10">
                    Pencapaian dedikasi dan profesionalisme kami. Lihat lebih dekat deretan mahakarya infrastruktur dan arsitektur yang telah sukses kami selesaikan dengan standar tertinggi.
                </p>

                <div class="flex gap-4">
                    <a href="#portfolio" class="px-8 py-3.5 bg-white border border-slate-200 text-primary font-bold text-[14px] rounded-xl hover:border-primary hover:bg-slate-50 transition-all duration-300">
                        Our Portfolio
                    </a>
                    <a href="{{ route('user.about') }}" class="px-8 py-3.5 bg-primary text-white font-bold text-[14px] rounded-xl shadow-lg hover:bg-primaryDark hover:-translate-y-1 hover:shadow-xl hover:shadow-primary/30 transition-all duration-300 flex items-center gap-2">
                        More Information
                        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M14 5l7 7m0 0l-7 7m7-7H3"/></svg>
                    </a>
                </div>
            </div>

            <div class="reveal delay-200 grid grid-cols-2 gap-4 h-[400px] lg:h-[500px]">
                <div class="col-span-2 rounded-[2rem] overflow-hidden shadow-lg border-4 border-white group cursor-pointer relative bg-slate-100">
                    <img src="https://images.unsplash.com/photo-1503387762-592deb58ef4e?q=80&w=2071&auto=format&fit=crop" class="w-full h-full object-cover group-hover:scale-105 transition-transform duration-700">
                    <div class="absolute inset-0 bg-primary/0 group-hover:bg-primary/20 transition-colors duration-300"></div>
                </div>
                <div class="rounded-[2rem] overflow-hidden shadow-lg border-4 border-white group cursor-pointer relative bg-slate-100">
                    <img src="https://images.unsplash.com/photo-1541888086425-d81bb19240f5?q=80&w=2070&auto=format&fit=crop" class="w-full h-full object-cover group-hover:scale-105 transition-transform duration-700">
                    <div class="absolute inset-0 bg-primary/0 group-hover:bg-primary/20 transition-colors duration-300"></div>
                </div>
                <div class="rounded-[2rem] overflow-hidden shadow-lg border-4 border-white group cursor-pointer relative bg-slate-100">
                    <img src="https://images.unsplash.com/photo-1600585154340-be6161a56a0c?q=80&w=2070&auto=format&fit=crop" class="w-full h-full object-cover group-hover:scale-105 transition-transform duration-700">
                    <div class="absolute inset-0 bg-primary/0 group-hover:bg-primary/20 transition-colors duration-300"></div>
                </div>
            </div>

        </div>
    </div>
</section>

{{-- ================= SECTION 2: FILTER & PROJECT GRID ================= --}}
<section id="portfolio" class="py-24 bg-surface border-t border-slate-100">
    <div class="max-w-7xl mx-auto px-6">
        
        <div class="flex flex-col md:flex-row justify-between items-end gap-8 mb-10 reveal">
            <div class="max-w-2xl">
                <div class="inline-flex items-center gap-2 mb-4">
                    <span class="w-8 h-px bg-accent"></span>
                    <span class="text-xs font-bold text-accent uppercase tracking-widest">Our Project</span>
                </div>
                <h2 class="font-display text-3xl sm:text-4xl lg:text-5xl font-extrabold text-primary tracking-tight">
                    Jelajahi Semua <span class="text-accent">Project</span> Kami Yang <span class="text-accent">Sudah Selesai</span>
                </h2>
            </div>
            <p class="text-sm font-light text-slate-500 max-w-sm border-l-2 border-slate-200 pl-4">
                Lihat berbagai rancang bangun arsitektur dan hunian idaman melalui portofolio proyek selesai kami. Bukti komitmen kami dalam menghadirkan keanggunan, keamanan, dan fungsionalitas terbaik.
            </p>
        </div>

        {{-- Filter Buttons (Sementara kita hapus x-data filter karena butuh logic JS tambahan untuk database) --}}
        <div class="flex flex-wrap items-center gap-3 mb-12 reveal delay-100">
            <span class="bg-primary text-white border-primary px-5 py-2 rounded-full border text-xs font-bold uppercase tracking-wider transition-all shadow-sm">All Portfolio</span>
            {{-- Tombol kategori lainnya bisa ditambahkan nanti dengan logic filter backend --}}
        </div>

        {{-- Bungkus dengan ID ini agar bisa di-target oleh JavaScript --}}
            <div id="portfolio-container" class="transition-opacity duration-500 ease-in-out">
                
                <div id="project-grid" class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8 mb-16">
                @forelse($projects as $index => $project)
                
                {{-- PERBAIKAN 1: Tambahkan z-0, isolate, dan transform-gpu di sini --}}
                <a href="{{ route('user.detail-project', $project->id) }}" class="group block bg-white rounded-3xl overflow-hidden shadow-sm hover:shadow-xl transition-all duration-300 border border-slate-100 hover:-translate-y-1 flex flex-col h-full z-0 isolate transform-gpu">
                    
                    {{-- PERBAIKAN 2: Tambahkan rounded-t-3xl di bungkus gambar ini untuk ngunci kelengkungan atas --}}
                    <div class="w-full aspect-video bg-slate-100 relative overflow-hidden flex-shrink-0 rounded-t-3xl">
                        @if($project->image)
                            <img src="{{ asset('storage/' . $project->image) }}" class="w-full h-full object-cover group-hover:scale-110 transition-transform duration-700" loading="lazy">
                        @else
                            <img src="https://images.unsplash.com/photo-1600596542815-ffad4c1539a9?q=80&w=2075&auto=format&fit=crop" class="w-full h-full object-cover group-hover:scale-110 transition-transform duration-700" loading="lazy">
                        @endif
                        <div class="absolute inset-0 bg-primary/0 group-hover:bg-primary/20 transition-colors duration-300 z-10"></div>
                        
                        {{-- Badge Kategori --}}
                        <div class="absolute top-4 left-4 z-20">
                            <span class="px-3 py-1.5 rounded-full bg-white/90 backdrop-blur-sm text-[10px] font-bold text-primary uppercase tracking-wider shadow-sm">
                                {{ $project->category ?? 'Konstruksi' }}
                            </span>
                        </div>
                    </div>
                    
                    {{-- Bagian Konten (Tidak ada yang diubah) --}}
                    <div class="p-6 flex flex-col flex-grow">
                        <h3 class="font-display font-bold text-primary group-hover:text-accent transition-colors text-xl mb-3 line-clamp-1" title="{{ $project->name }}">
                            {{ $project->name }}
                        </h3>
                        
                        <p class="text-[13px] text-slate-500 font-light leading-relaxed mb-5 line-clamp-2 flex-grow">
                            {{ $project->background ?? 'Proyek ' . $project->name . ' ini dikerjakan dengan standar kualitas terbaik untuk memenuhi kebutuhan klien.' }}
                        </p>
                        
                        <div class="flex items-center justify-between gap-4 text-[11px] font-semibold text-slate-400 mb-5 bg-slate-50 p-3 rounded-xl">
                            <div class="flex items-center gap-1.5 truncate" title="{{ $project->client_name }}">
                                <svg class="w-4 h-4 text-accent flex-shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z"/></svg>
                                <span class="truncate">{{ $project->client_name }}</span>
                            </div>
                            <div class="flex items-center gap-1.5 truncate" title="{{ $project->location }}">
                                <svg class="w-4 h-4 text-accent flex-shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0zM15 11a3 3 0 11-6 0 3 3 0 016 0z"/></svg>
                                <span class="truncate">{{ Str::limit($project->location, 15) }}</span>
                            </div>
                        </div>
                        
                        <div class="mt-auto pt-4 border-t border-slate-100 flex items-center gap-2 text-xs font-bold text-primary group-hover:text-accent transition-colors">
                            Lihat Detail Proyek
                            <svg class="w-4 h-4 group-hover:translate-x-1 transition-transform" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 8l4 4m0 0l-4 4m4-4H3"/></svg>
                        </div>
                    </div>
                </a>
                @empty
                <div class="col-span-1 md:col-span-2 lg:col-span-3 text-center py-16 bg-white rounded-3xl border border-dashed border-slate-200">
                    <div class="w-16 h-16 bg-slate-50 rounded-full flex items-center justify-center mx-auto mb-4 text-slate-300">
                        <svg class="w-8 h-8" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 11H5m14 0a2 2 0 012 2v6a2 2 0 01-2 2H5a2 2 0 01-2-2v-6a2 2 0 012-2m14 0V9a2 2 0 00-2-2M5 11V9a2 2 0 002-2m0 0V5a2 2 0 012-2h6a2 2 0 012 2v2M7 7h10"/></svg>
                    </div>
                    <h3 class="text-lg font-bold text-primary mb-1">Belum Ada Proyek</h3>
                    <p class="text-slate-500 font-light text-sm">Proyek yang telah selesai akan ditampilkan di sini.</p>
                </div>
                @endforelse
            </div>

            {{-- ================= PAGINATION ================= --}}
            @if ($projects->hasPages())
            <div class="flex flex-col sm:flex-row justify-between items-center gap-6 pt-8 border-t border-slate-100">
                
                {{-- Tombol Prev --}}
                @if ($projects->onFirstPage())
                    <span class="inline-flex items-center gap-2 px-6 py-3 border-2 border-slate-100 text-slate-300 font-bold text-[13px] rounded-xl cursor-not-allowed">
                        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 19l-7-7 7-7"/></svg>
                        Sebelumnya
                    </span>
                @else
                    {{-- TAMBAHAN: class "page-link" --}}
                    <a href="{{ $projects->previousPageUrl() }}" class="page-link inline-flex items-center gap-2 px-6 py-3 border-2 border-slate-200 text-primary font-bold text-[13px] rounded-xl hover:border-primary hover:bg-slate-50 transition-all duration-300">
                        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 19l-7-7 7-7"/></svg>
                        Sebelumnya
                    </a>
                @endif

                <div class="flex justify-center items-center gap-2">
                    <span class="text-sm font-semibold text-slate-500 bg-white px-4 py-2 rounded-xl border border-slate-200 shadow-sm">
                        Halaman <span class="text-primary font-bold">{{ $projects->currentPage() }}</span> dari <span class="text-primary font-bold">{{ $projects->lastPage() }}</span>
                    </span>
                </div>

                {{-- Tombol Next --}}
                @if ($projects->hasMorePages())
                    {{-- TAMBAHAN: class "page-link" --}}
                    <a href="{{ $projects->nextPageUrl() }}" class="page-link inline-flex items-center gap-2 px-6 py-3 bg-primary text-white font-bold text-[13px] rounded-xl shadow-md hover:bg-primaryDark hover:-translate-y-0.5 hover:shadow-lg transition-all duration-300">
                        Selanjutnya
                        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"/></svg>
                    </a>
                @else
                    <span class="inline-flex items-center gap-2 px-6 py-3 bg-slate-200 text-slate-400 font-bold text-[13px] rounded-xl cursor-not-allowed">
                        Selanjutnya
                        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"/></svg>
                    </span>
                @endif
            </div>
            @endif
        </div>
        {{-- Akhir dari portfolio-container --}}

    </div>
</section>

{{-- ================= SECTION 3: MAPS & CONTACT CTA ================= --}}
{{-- Dark primary theme — konsisten dengan design language project.blade.php --}}
<section class="bg-primary py-24 relative overflow-hidden rounded-t-[3rem] sm:rounded-t-[4rem]">
    <div class="absolute inset-0 bg-[url('https://www.transparenttextures.com/patterns/cubes.png')] opacity-5 mix-blend-overlay pointer-events-none"></div>
    <div class="absolute top-0 right-0 w-[500px] h-[500px] bg-accent/10 rounded-full blur-[100px] pointer-events-none"></div>
    <div class="absolute bottom-0 left-0 w-[350px] h-[350px] bg-white/5 rounded-full blur-[80px] pointer-events-none"></div>

    <div class="max-w-7xl mx-auto px-6 relative z-10">

        {{-- Section Header --}}
        <div class="text-center mb-16 reveal">
            <div class="inline-flex items-center gap-2 px-4 py-2 rounded-full bg-white/10 border border-white/20 mb-6 backdrop-blur-sm">
                <span class="w-2 h-2 rounded-full bg-accent animate-pulse"></span>
                <span class="text-xs font-bold text-accent uppercase tracking-widest">Mulai Bersama Kami</span>
            </div>
            <h2 class="font-display text-3xl sm:text-4xl lg:text-5xl font-extrabold text-white mb-4 tracking-tight">
                Wujudkan Rumah Impian <br class="hidden md:block"> Anda Hari Ini
            </h2>
            <p class="text-slate-300 font-light text-lg max-w-2xl mx-auto">
                Tim profesional kami siap membantu merancang, mengestimasi, dan merealisasikan proyek konstruksi Anda — tepat waktu dan sesuai anggaran.
            </p>
        </div>

        {{-- Grid: Maps + Form --}}
        <div class="grid lg:grid-cols-2 gap-10 lg:gap-12 reveal delay-100">

            {{-- Google Maps --}}
            <div class="flex flex-col gap-4">
                <div class="flex justify-between items-center">
                    <h3 class="font-display text-xl font-bold text-white">Lokasi Kantor Kami</h3>
                    <a href="https://maps.google.com/?q=Purwokerto,Banyumas" target="_blank"
                       class="text-xs font-semibold text-slate-400 hover:text-accent transition-colors flex items-center gap-1.5">
                        Buka di Maps
                        <svg class="w-3.5 h-3.5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 6H6a2 2 0 00-2 2v10a2 2 0 002 2h10a2 2 0 002-2v-4M14 4h6m0 0v6m0-6L10 14"/></svg>
                    </a>
                </div>
                <div class="w-full h-[320px] lg:h-[420px] rounded-[2rem] overflow-hidden border-4 border-white/10 shadow-2xl">
                    <iframe
                        src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d126438.33167191295!2d109.16723223019864!3d-7.428616167576402!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2e655e8c15a72ab5%3A0x6ed7693d25a81987!2sPurwokerto%2C%20Kabupaten%20Banyumas%2C%20Jawa%20Tengah!5e0!3m2!1sid!2sid!4v1715000000000!5m2!1sid!2sid"
                        width="100%" height="100%" style="border:0;" allowfullscreen="" loading="lazy"
                        referrerpolicy="no-referrer-when-downgrade"
                        class="grayscale opacity-80 hover:grayscale-0 hover:opacity-100 transition-all duration-700">
                    </iframe>
                </div>

                {{-- Quick Contact Chips --}}
                <div class="flex flex-wrap gap-3 mt-2">
                    <a href="mailto:cv.darmingjayagrup@gmail.com"
                       class="flex items-center gap-2.5 bg-white/10 hover:bg-white/20 border border-white/10 hover:border-accent text-slate-300 hover:text-white text-xs font-semibold px-4 py-2.5 rounded-xl transition-all duration-300 backdrop-blur-sm">
                        <svg class="w-4 h-4 text-accent" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z"/></svg>
                        cv.darmingjayagrup@gmail.com
                    </a>
                    <a href="tel:+6285772364659"
                       class="flex items-center gap-2.5 bg-white/10 hover:bg-white/20 border border-white/10 hover:border-accent text-slate-300 hover:text-white text-xs font-semibold px-4 py-2.5 rounded-xl transition-all duration-300 backdrop-blur-sm">
                        <svg class="w-4 h-4 text-accent" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 5a2 2 0 012-2h3.28a1 1 0 01.948.684l1.498 4.493a1 1 0 01-.502 1.21l-2.257 1.13a11.042 11.042 0 005.516 5.516l1.13-2.257a1 1 0 011.21-.502l4.493 1.498a1 1 0 01.684.949V19a2 2 0 01-2 2h-1C9.716 21 3 14.284 3 6V5z"/></svg>
                        +62 857-7236-4659
                    </a>
                </div>
            </div>

            {{-- Contact Form --}}
            <div class="bg-white rounded-[2rem] p-8 sm:p-10 shadow-2xl border border-white/20 relative overflow-hidden">
                <div class="absolute top-0 left-0 w-full h-1.5 bg-gradient-to-r from-accent to-primary rounded-t-[2rem]"></div>

                <h3 class="font-display text-2xl font-bold text-primary mb-2">Kirim Pesan Kepada Kami</h3>
                <p class="text-sm text-slate-500 font-light mb-8">Tim kami akan merespons dalam kurang dari 24 jam kerja.</p>

                <form action="#" method="POST" class="space-y-5">
                    @csrf

                    <div class="space-y-1.5">
                        <label class="text-xs font-semibold text-slate-500 uppercase tracking-wider ml-1">Nama Lengkap</label>
                        <div class="relative group">
                            <div class="absolute inset-y-0 left-0 pl-4 flex items-center pointer-events-none text-slate-400 group-focus-within:text-primary transition-colors">
                                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z"/></svg>
                            </div>
                            <input type="text" name="name" required placeholder="Nama lengkap Anda"
                                   class="w-full pl-12 pr-4 py-3.5 rounded-xl border border-slate-200 bg-slate-50 text-primary text-sm font-medium focus:bg-white focus:border-primary focus:ring-4 focus:ring-primary/10 transition-all outline-none">
                        </div>
                    </div>

                    <div class="space-y-1.5">
                        <label class="text-xs font-semibold text-slate-500 uppercase tracking-wider ml-1">Email Aktif</label>
                        <div class="relative group">
                            <div class="absolute inset-y-0 left-0 pl-4 flex items-center pointer-events-none text-slate-400 group-focus-within:text-primary transition-colors">
                                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z"/></svg>
                            </div>
                            <input type="email" name="email" required placeholder="mail@contoh.com"
                                   class="w-full pl-12 pr-4 py-3.5 rounded-xl border border-slate-200 bg-slate-50 text-primary text-sm font-medium focus:bg-white focus:border-primary focus:ring-4 focus:ring-primary/10 transition-all outline-none">
                        </div>
                    </div>

                    <div class="space-y-1.5">
                        <label class="text-xs font-semibold text-slate-500 uppercase tracking-wider ml-1">Deskripsi Proyek</label>
                        <div class="relative group">
                            <div class="absolute top-4 left-0 pl-4 flex items-start pointer-events-none text-slate-400 group-focus-within:text-primary transition-colors">
                                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z"/></svg>
                            </div>
                            <textarea name="message" rows="4" required placeholder="Jelaskan kebutuhan proyek Anda secara singkat..."
                                      class="w-full pl-12 pr-4 py-3.5 rounded-xl border border-slate-200 bg-slate-50 text-primary text-sm font-medium focus:bg-white focus:border-primary focus:ring-4 focus:ring-primary/10 transition-all outline-none resize-none"></textarea>
                        </div>
                    </div>

                    <div class="pt-2 flex flex-col sm:flex-row gap-3">
                        <a href="https://wa.me/6285772364659" target="_blank"
                           class="flex-1 flex items-center justify-center gap-2 border-2 border-[#25D366] text-[#25D366] hover:bg-[#25D366] hover:text-white font-bold py-3.5 px-6 rounded-xl hover:-translate-y-1 transition-all duration-300">
                            <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 24 24"><path d="M17.472 14.382c-.297-.149-1.758-.867-2.03-.967-.273-.099-.471-.148-.67.15-.197.297-.767.966-.94 1.164-.173.199-.347.223-.644.075-.297-.15-1.255-.463-2.39-1.475-.883-.788-1.48-1.761-1.653-2.059-.173-.297-.018-.458.13-.606.134-.133.298-.347.446-.52.149-.174.198-.298.298-.497.099-.198.05-.371-.025-.52-.075-.149-.669-1.612-.916-2.207-.242-.579-.487-.5-.669-.51-.173-.008-.371-.01-.57-.01-.198 0-.52.074-.792.372-.272.297-1.04 1.016-1.04 2.479 0 1.462 1.065 2.875 1.213 3.074.149.198 2.096 3.2 5.077 4.487.709.306 1.262.489 1.694.625.712.227 1.36.195 1.871.118.571-.085 1.758-.719 2.006-1.413.248-.694.248-1.289.173-1.413-.074-.124-.272-.198-.57-.347m-5.421 7.403h-.004a9.87 9.87 0 01-5.031-1.378l-.361-.214-3.741.982.998-3.648-.235-.374a9.86 9.86 0 01-1.51-5.26c.001-5.45 4.436-9.884 9.888-9.884 2.64 0 5.122 1.03 6.988 2.898a9.825 9.825 0 012.893 6.994c-.003 5.45-4.437 9.884-9.885 9.884m8.413-18.297A11.815 11.815 0 0012.05 0C5.495 0 .16 5.335.157 11.892c0 2.096.547 4.142 1.588 5.945L.057 24l6.305-1.654a11.882 11.882 0 005.683 1.448h.005c6.554 0 11.89-5.335 11.893-11.893a11.821 11.821 0 00-3.48-8.413z"/></svg>
                            WhatsApp
                        </a>
                        <button type="submit"
                                class="flex-1 bg-primary text-white font-bold py-3.5 px-6 rounded-xl shadow-lg hover:bg-primaryDark hover:-translate-y-1 hover:shadow-xl hover:shadow-primary/30 transition-all duration-300">
                            Kirim Pesan
                        </button>
                    </div>
                </form>
            </div>

        </div>
    </div>
</section>


{{-- Script AJAX untuk Pagination Mulus tanpa Reload --}}
<script>
    document.addEventListener('DOMContentLoaded', function () {
        // Deteksi setiap klik di body
        document.body.addEventListener('click', function (e) {
            // Cek apakah yang diklik adalah tombol dengan class "page-link"
            let link = e.target.closest('.page-link');
            
            if (link) {
                e.preventDefault(); // Mencegah browser loading halaman baru
                let url = link.getAttribute('href');
                let container = document.getElementById('portfolio-container');
                let section = document.getElementById('portfolio');

                // 1. Buat efek fade-out (memudar) sedikit sebelum data berganti
                container.style.opacity = '0.3';

                // 2. Ambil data halaman selanjutnya di latar belakang
                fetch(url)
                    .then(response => response.text())
                    .then(html => {
                        // 3. Ubah HTML mentah jadi dokumen virtual
                        let parser = new DOMParser();
                        let doc = parser.parseFromString(html, 'text/html');
                        
                        // 4. Ambil isi container yang baru dan ganti dengan yang lama
                        let newContent = doc.getElementById('portfolio-container').innerHTML;
                        container.innerHTML = newContent;

                        // 5. Kembalikan opacity jadi terang (fade-in)
                        container.style.opacity = '1';

                        // 6. Gulir layar secara mulus ke atas grid proyek agar user siap melihat halaman 2
                        section.scrollIntoView({ behavior: 'smooth', block: 'start' });
                        
                        // 7. Update URL di browser agar kalau di-refresh tetap di halaman tersebut
                        window.history.pushState(null, '', url);
                    })
                    .catch(error => console.error('Error fetching data:', error));
            }
        });
    });
</script>
@endsection