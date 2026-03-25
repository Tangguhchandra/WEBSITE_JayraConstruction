@extends('user.layouts.main')

@section('title', 'Detail Project - Jayra Construction')

@section('content')

<div class="pt-36 pb-0 bg-slate-50">

    {{-- ================= BREADCRUMB & HEADER ================= --}}
    <section class="max-w-7xl mx-auto px-6 mb-8 mt-4">
        <div class="flex flex-col md:flex-row md:items-center justify-between gap-6 reveal">
            <div>
                <nav class="flex items-center gap-2 text-sm font-medium text-slate-400 mb-4">
                    <a href="{{ route('user.home') }}" class="hover:text-primary transition-colors flex items-center gap-1.5">
                        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 12l2-2m0 0l7-7 7 7M5 10v10a1 1 0 001 1h3m10-11l2 2m-2-2v10a1 1 0 01-1 1h-3m-6 0a1 1 0 001-1v-4a1 1 0 011-1h2a1 1 0 011 1v4a1 1 0 001 1m-6 0h6"/></svg>
                        Home
                    </a>
                    <svg class="w-3.5 h-3.5 text-slate-300" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"/></svg>
                    <a href="{{ route('user.project') }}" class="hover:text-primary transition-colors">Project</a>
                    <svg class="w-3.5 h-3.5 text-slate-300" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"/></svg>
                    <span class="text-primary font-semibold truncate max-w-[200px] sm:max-w-xs">Renovasi Rumah Pribadi</span>
                </nav>
                <div class="flex items-center gap-3 mb-2">
                    <span class="px-3 py-1 bg-accent/10 border border-accent/20 text-accent rounded-full text-xs font-bold uppercase tracking-widest">Renovation</span>
                </div>
                <h1 class="font-display text-4xl lg:text-5xl font-extrabold text-primary tracking-tight">
                    Renovasi Rumah Pribadi
                </h1>
            </div>
            <a href="{{ route('user.project') }}" class="inline-flex items-center justify-center gap-2 px-6 py-3 rounded-xl border-2 border-slate-200 text-slate-500 font-bold text-sm hover:border-primary hover:bg-primary hover:text-white transition-all duration-300 w-full md:w-auto">
                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 19l-7-7m0 0l7-7m-7 7h18"/></svg>
                Kembali ke Daftar
            </a>
        </div>
    </section>

    {{-- ================= GALLERY & DETAILS ================= --}}
    <section class="max-w-7xl mx-auto px-6 mb-20" x-data="{ activeImage: 'https://images.unsplash.com/photo-1600596542815-ffad4c1539a9?q=80&w=2075&auto=format&fit=crop' }">
        <div class="grid lg:grid-cols-12 gap-10">
            
            {{-- Image Viewer (Kiri, 8 Kolom) --}}
            <div class="lg:col-span-8 reveal delay-100">
                <div class="bg-white p-4 rounded-[2.5rem] shadow-[0_10px_40px_-10px_rgba(16,55,92,0.08)] border border-slate-100 mb-12">
                    {{-- Main Image --}}
                    <div class="w-full aspect-[16/9] sm:aspect-[21/9] lg:aspect-[16/9] rounded-[2rem] overflow-hidden mb-4 relative bg-slate-100">
                        <img :src="activeImage" alt="Main Project Image" class="w-full h-full object-cover transition-all duration-500 ease-in-out" id="mainImage">
                        <div class="absolute inset-0 bg-primary/0 hover:bg-primary/10 transition-colors duration-300"></div>
                    </div>
                    
                    {{-- Thumbnails --}}
                    <div class="grid grid-cols-4 gap-4">
                        @foreach([
                            'photo-1600596542815-ffad4c1539a9',
                            'photo-1541888086425-d81bb19240f5',
                            'photo-1486406146926-c627a92ad1ab',
                            'photo-1503387762-592deb58ef4e'
                        ] as $thumb)
                        <button @click="activeImage = 'https://images.unsplash.com/{{ $thumb }}?q=80&w=2075&auto=format&fit=crop'"
                            class="relative w-full aspect-[4/3] rounded-xl overflow-hidden focus:outline-none ring-2 ring-transparent focus:ring-accent transition-all duration-300 group">
                            <img src="https://images.unsplash.com/{{ $thumb }}?q=80&w=2075&auto=format&fit=crop" class="w-full h-full object-cover group-hover:scale-110 transition-transform duration-500">
                            <div class="absolute inset-0 bg-primary/20 hover:bg-transparent transition-colors" :class="{ 'bg-transparent ring-2 ring-inset ring-accent': activeImage === 'https://images.unsplash.com/{{ $thumb }}?q=80&w=2075&auto=format&fit=crop' }"></div>
                        </button>
                        @endforeach
                    </div>
                </div>

                {{-- Deskripsi Proyek --}}
                <div class="mt-8">
                    <h2 class="font-display text-2xl font-bold text-primary mb-4">Latar Belakang Proyek</h2>
                    <div class="prose prose-slate max-w-none text-slate-500 font-light leading-relaxed mb-10">
                        <p>
                            Pengerjaan renovasi struktural dan arsitektural untuk memaksimalkan fungsionalitas ruang dengan material berkualitas tinggi. Jayra Construction memimpin desain dan eksekusi pada hunian ini, mengubah ruang lama yang pengap menjadi desain minimalis modern yang sangat menekankan pencahayaan alami dan sirkulasi udara yang optimal.
                        </p>
                        <p>
                            Fokus utama pada proyek ini adalah memperluas area ruang keluarga dan menggabungkannya dengan dapur berkonsep *open-space*. Kami juga mengimplementasikan sistem pencahayaan alami yang lebih baik melalui jendela-jendela tinggi (*floor-to-ceiling windows*) serta perbaikan tata letak taman belakang.
                        </p>
                    </div>

                    <div class="mt-8 p-8 bg-white border border-slate-100 rounded-3xl shadow-[0_10px_30px_-10px_rgba(16,55,92,0.05)] border-l-4 border-l-accent">
                        <div class="flex items-center gap-3 mb-4">
                            <div class="w-10 h-10 rounded-full bg-accent/10 text-accent flex items-center justify-center">
                                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 10V3L4 14h7v7l9-11h-7z"/></svg>
                            </div>
                            <h4 class="text-primary font-bold text-xl">Tantangan & Solusi</h4>
                        </div>
                        <p class="text-slate-500 text-[15px] font-light leading-relaxed">
                            Tantangan terbesar adalah mempertahankan struktur atap utama bangunan lama sambil mengganti dinding penopang. Solusinya, tim teknik sipil kami menggunakan balok baja I-Beam tambahan yang tidak hanya kuat namun juga terekspos secara estetik memperkuat gaya arsitektur industrial modern. Pekerjaan dapat diselesaikan 2 minggu lebih cepat dari target yang disepakati.
                        </p>
                    </div>
                </div>
            </div>

            {{-- Info Panel (Kanan, 4 Kolom) --}}
            <div class="lg:col-span-4 reveal delay-200">
                <div class="bg-primary rounded-[2.5rem] p-8 shadow-2xl relative overflow-hidden backdrop-blur-lg border border-white/10 sticky top-36">
                    {{-- Dekorasi background --}}
                    <div class="absolute -right-20 -top-20 w-64 h-64 bg-accent/20 rounded-full blur-[60px] pointer-events-none"></div>
                    <div class="absolute -left-10 -bottom-10 w-48 h-48 bg-white/5 rounded-full blur-[40px] pointer-events-none"></div>
                    <div class="absolute inset-0 bg-[url('https://www.transparenttextures.com/patterns/cubes.png')] opacity-5 mix-blend-overlay pointer-events-none"></div>

                    <div class="relative z-10">
                        <h3 class="font-display text-xl font-bold text-white mb-6 flex items-center gap-3">
                            <svg class="w-6 h-6 text-accent" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 16h-1v-4h-1m1-4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"/></svg>
                            Informasi Detail
                        </h3>

                        <ul class="space-y-5 mb-10">
                            <li class="flex items-start gap-4">
                                <div class="w-10 h-10 rounded-xl bg-white/10 flex items-center justify-center flex-shrink-0 text-accent">
                                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z"/></svg>
                                </div>
                                <div>
                                    <span class="text-[11px] font-bold text-slate-400 uppercase tracking-wider block mb-0.5">Klien</span>
                                    <span class="text-white font-medium text-sm">Bpk. Ahmad</span>
                                </div>
                            </li>
                            <li class="flex items-start gap-4">
                                <div class="w-10 h-10 rounded-xl bg-white/10 flex items-center justify-center flex-shrink-0 text-accent">
                                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0zM15 11a3 3 0 11-6 0 3 3 0 016 0z"/></svg>
                                </div>
                                <div>
                                    <span class="text-[11px] font-bold text-slate-400 uppercase tracking-wider block mb-0.5">Lokasi</span>
                                    <span class="text-white font-medium text-sm">Purwokerto, Banyumas</span>
                                </div>
                            </li>
                            <li class="flex items-start gap-4">
                                <div class="w-10 h-10 rounded-xl bg-white/10 flex items-center justify-center flex-shrink-0 text-accent">
                                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z"/></svg>
                                </div>
                                <div>
                                    <span class="text-[11px] font-bold text-slate-400 uppercase tracking-wider block mb-0.5">Tgl Selesai</span>
                                    <span class="text-white font-medium text-sm">20 Januari 2026</span>
                                </div>
                            </li>
                            <li class="flex items-start gap-4">
                                <div class="w-10 h-10 rounded-xl bg-white/10 flex items-center justify-center flex-shrink-0 text-accent">
                                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"/></svg>
                                </div>
                                <div>
                                    <span class="text-[11px] font-bold text-slate-400 uppercase tracking-wider block mb-0.5">Status</span>
                                    <span class="inline-flex items-center gap-1.5 text-accent font-bold text-sm bg-accent/20 px-2 py-0.5 rounded-md">
                                        <span class="w-1.5 h-1.5 bg-accent rounded-full animate-pulse"></span>
                                        Penyelesaian
                                    </span>
                                </div>
                            </li>
                            <li class="flex items-start gap-4">
                                <div class="w-10 h-10 rounded-xl bg-white/10 flex items-center justify-center flex-shrink-0 text-accent">
                                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 12l2-2m0 0l7-7 7 7M5 10v10a1 1 0 001 1h3m10-11l2 2m-2-2v10a1 1 0 01-1 1h-3m-6 0a1 1 0 001-1v-4a1 1 0 011-1h2a1 1 0 011 1v4a1 1 0 001 1m-6 0h6"/></svg>
                                </div>
                                <div>
                                    <span class="text-[11px] font-bold text-slate-400 uppercase tracking-wider block mb-0.5">Layanan Terkait</span>
                                    <a href="{{ route('user.detail-service') }}" class="text-white hover:text-accent transition-colors font-medium text-sm flex items-center gap-1">Renovasi Rumah <svg class="w-3.5 h-3.5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 6H6a2 2 0 00-2 2v10a2 2 0 002 2h10a2 2 0 002-2v-4M14 4h6m0 0v6m0-6L10 14"/></svg></a>
                                </div>
                            </li>
                        </ul>

                        <hr class="border-white/10 mb-8">

                        <h4 class="text-white font-semibold text-sm mb-4">Tertarik dengan proyek serupa?</h4>
                        <div class="flex flex-col gap-3">
                            <a href="{{ route('user.contact') }}" class="w-full bg-accent text-primary font-bold text-[14px] py-4 rounded-xl hover:bg-white hover:text-primary transition-all duration-300 shadow-[0_4px_14px_0_rgba(255,193,7,0.39)] hover:shadow-[0_6px_20px_rgba(255,193,7,0.23)] hover:-translate-y-1 flex items-center justify-center gap-2">
                                Hubungi Kami Sekarang
                            </a>
                        </div>
                    </div>
                </div>
            </div>
            
        </div>
    </section>

    {{-- ================= RELATED PROJECTS ================= --}}
    <section class="max-w-7xl mx-auto px-6 mb-24 reveal delay-300">
        <div class="flex items-center gap-4 mb-8">
            <h2 class="font-display text-2xl md:text-3xl font-bold text-primary">Proyek Serupa</h2>
            <div class="flex-1 h-px bg-slate-200 ml-4 hidden md:block"></div>
        </div>
        
        <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
            @foreach([
                ['image' => 'photo-1486406146926-c627a92ad1ab', 'title' => 'Skyline Office Tower', 'category' => 'commercial'],
                ['image' => 'photo-1600585154340-be6161a56a0c', 'title' => 'Interior Set Minimalis', 'category' => 'interior'],
                ['image' => 'photo-1541888086425-d81bb19240f5', 'title' => 'Warehouse Pembangunan', 'category' => 'industrial']
            ] as $rel)
            <a href="{{ route('user.detail-project') }}" class="group block bg-white rounded-3xl overflow-hidden shadow-sm hover:shadow-xl transition-all duration-300 border border-slate-100 hover:-translate-y-1">
                <div class="w-full aspect-video bg-slate-100 relative overflow-hidden">
                    <img src="https://images.unsplash.com/{{ $rel['image'] }}?q=80&w=2070&auto=format&fit=crop" class="w-full h-full object-cover group-hover:scale-110 transition-transform duration-700">
                    <div class="absolute inset-0 bg-primary/0 group-hover:bg-primary/20 transition-colors duration-300"></div>
                </div>
                <div class="p-5">
                    <span class="text-[10px] font-bold text-accent uppercase tracking-widest mb-1.5 block">{{ $rel['category'] }}</span>
                    <h3 class="font-display font-bold text-primary group-hover:text-accent transition-colors text-lg">{{ $rel['title'] }}</h3>
                    <div class="mt-4 flex items-center gap-2 text-xs font-bold text-primary">
                        Lihat Detail <svg class="w-3.5 h-3.5 group-hover:translate-x-1 transition-transform" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"/></svg>
                    </div>
                </div>
            </a>
            @endforeach
        </div>
    </section>

</div>

@endsection