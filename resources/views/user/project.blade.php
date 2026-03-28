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
{{-- ================= FILOSOFI & KOMITMEN KUALITAS ================= --}}
<section class="bg-primary py-24 relative overflow-hidden rounded-t-[3rem] sm:rounded-t-[4rem]">
    {{-- Efek Latar Belakang Premium --}}
    <div class="absolute inset-0 bg-[url('https://www.transparenttextures.com/patterns/cubes.png')] opacity-5 mix-blend-overlay pointer-events-none"></div>
    <div class="absolute top-0 right-0 w-[500px] h-[500px] bg-accent/10 rounded-full blur-[100px] pointer-events-none"></div>
    <div class="absolute bottom-0 left-0 w-[350px] h-[350px] bg-white/5 rounded-full blur-[80px] pointer-events-none"></div>

    <div class="max-w-7xl mx-auto px-6 relative z-10">

        {{-- Section Header --}}
        <div class="text-center mb-20 reveal">
            <div class="inline-flex items-center gap-2 px-4 py-2 rounded-full bg-white/10 border border-white/20 mb-6 backdrop-blur-sm">
                <span class="w-2 h-2 rounded-full bg-accent animate-pulse"></span>
                <span class="text-xs font-bold text-accent uppercase tracking-widest">Standar Jayra</span>
            </div>
            <h2 class="font-display text-3xl sm:text-4xl lg:text-5xl font-extrabold text-white mb-4 tracking-tight">
                Komitmen Tanpa <br class="hidden md:block"> Kompromi
            </h2>
            <p class="text-slate-300 font-light text-lg max-w-2xl mx-auto">
                Kami menetapkan standar tertinggi dalam setiap detail pekerjaan. Estetika yang menawan harus selalu diimbangi dengan kekuatan struktur yang tak tertandingi.
            </p>
        </div>

        {{-- Grid: Filosofi & Garansi --}}
        <div class="grid lg:grid-cols-12 gap-10 lg:gap-12 reveal delay-100">

            {{-- Kolom Kiri: Statement Card Mewah (Lebar 7 Kolom) --}}
            <div class="lg:col-span-7 rounded-[2rem] relative overflow-hidden shadow-2xl group">
                {{-- Background Image (Blueprint / Konstruksi) --}}
                <img src="https://images.unsplash.com/photo-1503387762-592deb58ef4e?q=80&w=2071&auto=format&fit=crop" class="absolute inset-0 w-full h-full object-cover group-hover:scale-110 transition-transform duration-1000 grayscale-[20%]">
                
                {{-- Overlay Gradasi Tebal --}}
                <div class="absolute inset-0 bg-gradient-to-br from-primary/95 via-primary/80 to-accent/40 mix-blend-multiply"></div>
                <div class="absolute inset-0 bg-primary/60"></div>
                
                {{-- Konten Statement --}}
                <div class="relative z-10 p-8 md:p-12 h-full flex flex-col justify-between">
                    <div>
                        <div class="w-14 h-14 bg-accent/20 border border-accent/50 rounded-2xl flex items-center justify-center text-accent mb-8 backdrop-blur-sm shadow-inner">
                            <svg class="w-7 h-7" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 21V5a2 2 0 00-2-2H7a2 2 0 00-2 2v16m14 0h2m-2 0h-5m-9 0H3m2 0h5M9 7h1m-1 4h1m4-4h1m-1 4h1m-5 10v-5a1 1 0 011-1h2a1 1 0 011 1v5m-4 0h4"/></svg>
                        </div>
                        
                        <h3 class="font-display text-3xl md:text-4xl font-extrabold text-white leading-tight mb-6">
                            Membangun Lebih Dari <br>
                            <span class="text-transparent bg-clip-text bg-gradient-to-r from-accent to-yellow-200">Sekadar Ruang.</span>
                        </h3>
                        
                        <p class="text-slate-300 text-lg font-light leading-relaxed mb-8 max-w-lg">
                            "Bagi kami, setiap material yang dipilih dan setiap pondasi yang ditanam adalah janji kepada klien. Kami merancang mahakarya yang tidak hanya indah di mata, tetapi mampu bertahan melintasi generasi."
                        </p>
                    </div>

                    <div class="flex items-center gap-4 pt-8 border-t border-white/20 mt-8">
                        <div class="w-12 h-12 rounded-full bg-white flex items-center justify-center text-primary font-display font-black text-xl">
                            J
                        </div>
                        <div>
                            <h4 class="text-white font-bold tracking-wide">Jayra Construction</h4>
                            <p class="text-accent text-xs uppercase tracking-widest font-semibold">Tanda Mutu & Kualitas</p>
                        </div>
                    </div>
                </div>
            </div>

            {{-- Kolom Kanan: Keunggulan & Garansi (Lebar 5 Kolom) --}}
            <div class="lg:col-span-5 flex flex-col justify-center gap-6">
                
                {{-- Point 1 --}}
                <div class="bg-white rounded-2xl p-6 shadow-lg flex items-start gap-5 hover:-translate-y-1 transition-transform duration-300 border border-slate-100">
                    <div class="w-12 h-12 rounded-xl bg-primary/5 flex items-center justify-center text-primary flex-shrink-0">
                        <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m5.618-4.016A11.955 11.955 0 0112 2.944a11.955 11.955 0 01-8.618 3.04A12.02 12.02 0 003 9c0 5.591 3.824 10.29 9 11.622 5.176-1.332 9-6.03 9-11.622 0-1.042-.133-2.052-.382-3.016z"/></svg>
                    </div>
                    <div>
                        <h4 class="font-bold text-primary text-lg mb-1">Garansi Konstruksi</h4>
                        <p class="text-slate-500 text-sm leading-relaxed">Kami memberikan masa pemeliharaan (retensi) secara cuma-cuma setelah serah terima kunci bangunan.</p>
                    </div>
                </div>

                {{-- Point 2 --}}
                <div class="bg-white rounded-2xl p-6 shadow-lg flex items-start gap-5 hover:-translate-y-1 transition-transform duration-300 border border-slate-100">
                    <div class="w-12 h-12 rounded-xl bg-primary/5 flex items-center justify-center text-primary flex-shrink-0">
                        <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 21V5a2 2 0 00-2-2H7a2 2 0 00-2 2v16m14 0h2m-2 0h-5m-9 0H3m2 0h5M9 7h1m-1 4h1m4-4h1m-1 4h1m-5 10v-5a1 1 0 011-1h2a1 1 0 011 1v5m-4 0h4"/></svg>
                    </div>
                    <div>
                        <h4 class="font-bold text-primary text-lg mb-1">Material Premium SNI</h4>
                        <p class="text-slate-500 text-sm leading-relaxed">Spesifikasi bahan bangunan selalu berstandar tinggi dan transparan sesuai dengan Rencana Anggaran Biaya.</p>
                    </div>
                </div>

                {{-- Point 3 --}}
                <div class="bg-white rounded-2xl p-6 shadow-lg flex items-start gap-5 hover:-translate-y-1 transition-transform duration-300 border border-slate-100">
                    <div class="w-12 h-12 rounded-xl bg-primary/5 flex items-center justify-center text-primary flex-shrink-0">
                        <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z"/></svg>
                    </div>
                    <div>
                        <h4 class="font-bold text-primary text-lg mb-1">Ketepatan Manajemen</h4>
                        <p class="text-slate-500 text-sm leading-relaxed">Manajemen proyek yang ketat menjamin pekerjaan selesai persis sesuai kurva kurva-S yang disepakati.</p>
                    </div>
                </div>

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