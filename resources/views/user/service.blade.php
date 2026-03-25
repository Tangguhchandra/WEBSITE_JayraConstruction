@extends('user.layouts.main')

@section('title', 'Service - Jayra Construction')

@section('content')

<div class="pt-36 pb-0">

    {{-- ================= BANNER DISKON ================= --}}
    <section class="max-w-7xl mx-auto px-6 mb-20">
        <div class="reveal bg-primary rounded-[2.5rem] p-10 md:p-16 shadow-2xl relative overflow-hidden flex flex-col items-start justify-center group">
            <div class="absolute -right-20 -top-20 w-96 h-96 bg-accent/20 rounded-full blur-[80px] group-hover:scale-110 transition-transform duration-700 pointer-events-none"></div>
            <div class="absolute -left-10 -bottom-10 w-64 h-64 bg-white/5 rounded-full blur-[60px] group-hover:-translate-y-4 group-hover:scale-125 transition-transform duration-700 pointer-events-none delay-100"></div>
            <div class="absolute inset-0 bg-[url('https://www.transparenttextures.com/patterns/cubes.png')] opacity-5 mix-blend-overlay"></div>

            <div class="relative z-10 max-w-2xl">
                <div class="inline-flex items-center gap-2 px-4 py-2 rounded-full bg-white/10 border border-white/20 mb-6 backdrop-blur-sm text-white">
                    <span class="text-xs font-bold uppercase tracking-widest text-accent">Penawaran Terbatas</span>
                </div>
                <h1 class="font-display text-4xl sm:text-5xl lg:text-6xl font-extrabold text-white mb-4 leading-tight tracking-tight">
                    Dapatkan Diskon <span class="text-accent relative inline-block">25%<svg class="absolute -bottom-2 left-0 w-full h-3 text-accent opacity-50" viewBox="0 0 100 10" preserveAspectRatio="none"><path d="M0 5 Q 50 10 100 5" stroke="currentColor" stroke-width="4" fill="none"/></svg></span>
                </h1>
                <p class="text-slate-300 text-lg md:text-xl mb-10 font-light">
                    Khusus pemesanan jasa konstruksi dan arsitektur pertama kali bersama Jayra Construction.
                </p>
                <a href="{{ route('user.contact') }}" class="inline-flex items-center justify-center gap-2 bg-accent text-primary font-bold text-[15px] py-4 px-8 rounded-xl shadow-lg hover:bg-white hover:-translate-y-1 hover:shadow-xl hover:shadow-accent/30 transition-all duration-300">
                    Dapatkan Penawaran
                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M14 5l7 7m0 0l-7 7m7-7H3"/></svg>
                </a>
            </div>
        </div>
    </section>

    {{-- ================= HEADER & SEARCH ================= --}}
    <section class="max-w-7xl mx-auto px-6 mb-12">
        <div class="flex flex-col md:flex-row md:items-end justify-between gap-8 reveal">
            <div class="max-w-2xl">
                <h2 class="font-display text-3xl sm:text-4xl lg:text-5xl font-extrabold text-primary mb-4 tracking-tight">
                    Pelayanan Kami
                </h2>
                <p class="text-slate-500 font-light text-lg">
                    Kami menyediakan berbagai layanan konstruksi dan desain untuk memenuhi kebutuhan hunian, bangunan usaha, hingga renovasi dengan standar kualitas terbaik.
                </p>
            </div>

            <div class="relative w-full md:max-w-[350px] group">
                <div class="absolute inset-y-0 left-0 pl-5 flex items-center pointer-events-none text-slate-400 group-focus-within:text-primary transition-colors">
                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"></path></svg>
                </div>
                <input type="text" placeholder="Cari layanan..." 
                       class="w-full pl-12 pr-6 py-4 rounded-full border border-slate-200 bg-white text-sm font-medium text-primary shadow-sm focus:outline-none focus:ring-4 focus:ring-primary/10 focus:border-primary transition-all duration-300">
            </div>
        </div>
    </section>

    {{-- ================= SERVICE CARDS ================= --}}
    <section class="max-w-7xl mx-auto px-6 mb-20">
        <div class="grid grid-cols-1 md:grid-cols-2 gap-8">
            
            @php
            $services = [
                ['image' => 'photo-1503387762-592deb58ef4e', 'title' => 'Renovasi Rumah', 'desc' => 'Layanan renovasi rumah komprehensif untuk memperbaiki, memperbarui, dan meningkatkan kenyamanan serta fungsionalitas bangunan Anda.', 'price' => 'Rp 25.000.000', 'label' => 'Mulai dari'],
                ['image' => 'photo-1600585154340-be6161a56a0c', 'title' => 'Renovasi Interior', 'desc' => 'Penataan ulang ruang dalam untuk menciptakan estetika visual modern dengan efisiensi penggunaan ruang yang optimal.', 'price' => 'Rp 15.000.000', 'label' => 'Mulai dari'],
                ['image' => 'photo-1600596542815-ffad4c1539a9', 'title' => 'Pembangunan Baru', 'desc' => 'Pengerjaan proyek konstruksi hunian atau komersial dari titik nol dengan pengawasan ahli sipil profesional.', 'price' => 'Rp 4.500.000', 'label' => 'Estimasi /m²'],
                ['image' => 'photo-1486406146926-c627a92ad1ab', 'title' => 'Desain Arsitektur', 'desc' => 'Pembuatan rancangan desain cetak biru (blueprint) 2D/3D yang estetik, fungsional, dan sesuai dengan regulasi tata kota.', 'price' => 'Rp 10.000.000', 'label' => 'Mulai dari'],
            ];
            @endphp

            @foreach($services as $index => $service)
            <div class="bg-white rounded-[2rem] p-6 lg:p-8 shadow-[0_10px_40px_-10px_rgba(16,55,92,0.08)] hover:-translate-y-2 hover:shadow-2xl transition-all duration-300 group reveal {{ $index % 2 === 1 ? 'delay-100' : '' }} border border-slate-50 cursor-pointer flex flex-col h-full">
                <div class="relative w-full aspect-[16/9] rounded-[1.5rem] overflow-hidden mb-6 bg-slate-100">
                    <img src="https://images.unsplash.com/{{ $service['image'] }}?q=80&w=2071&auto=format&fit=crop" class="w-full h-full object-cover group-hover:scale-105 transition-transform duration-700">
                    <div class="absolute inset-0 bg-primary/0 group-hover:bg-primary/20 transition-colors duration-300"></div>
                </div>
                <div class="flex-1 flex flex-col">
                    <h3 class="font-display text-2xl font-bold text-primary mb-3 group-hover:text-accent transition-colors">{{ $service['title'] }}</h3>
                    <p class="text-sm text-slate-500 font-light leading-relaxed mb-8">{{ $service['desc'] }}</p>
                    <div class="mt-auto flex flex-wrap justify-between items-center gap-4 pt-6 border-t border-slate-100">
                        <span class="px-5 py-2.5 bg-slate-50 border border-slate-200 rounded-xl text-sm font-bold text-primary shadow-sm whitespace-nowrap">
                            <span class="text-xs text-slate-400 font-medium block leading-none mb-1">{{ $service['label'] }}</span>
                            {{ $service['price'] }}
                        </span>
                        <a href="{{ route('user.detail-service') }}" class="bg-primary text-white px-6 py-3 rounded-xl text-[13px] font-bold shadow-md hover:bg-primaryDark hover:-translate-y-1 transition-all duration-300 whitespace-nowrap text-center flex items-center gap-2">
                            Lihat Detail
                            <svg class="w-3.5 h-3.5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"/></svg>
                        </a>
                    </div>
                </div>
            </div>
            @endforeach

        </div>

        {{-- Pagination --}}
        <div class="flex justify-center items-center gap-2 reveal delay-200 mt-12">
            <a href="#" class="w-10 h-10 rounded-full flex items-center justify-center text-slate-400 hover:text-primary hover:bg-slate-100 transition-colors">
                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 19l-7-7 7-7"/></svg>
            </a>
            <a href="#" class="w-10 h-10 rounded-full flex items-center justify-center font-bold text-sm bg-primary text-white shadow-md hover:-translate-y-1 transition-transform">1</a>
            <a href="#" class="w-10 h-10 rounded-full flex items-center justify-center font-semibold text-sm text-slate-500 hover:bg-slate-100 hover:text-primary transition-colors">2</a>
            <a href="#" class="w-10 h-10 rounded-full flex items-center justify-center font-semibold text-sm text-slate-500 hover:bg-slate-100 hover:text-primary transition-colors">3</a>
            <a href="#" class="w-10 h-10 rounded-full flex items-center justify-center text-slate-400 hover:text-primary hover:bg-slate-100 transition-colors">
                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"/></svg>
            </a>
        </div>
    </section>

    {{-- ================= CUSTOM REQUEST ================= --}}
    <section class="bg-primary py-24 relative overflow-hidden rounded-t-[3rem] sm:rounded-t-[4rem]">
        <div class="absolute top-0 right-0 w-[500px] h-[500px] bg-accent/10 rounded-full blur-[100px] pointer-events-none"></div>
        <div class="absolute bottom-0 left-0 w-[300px] h-[300px] bg-white/5 rounded-full blur-[80px] pointer-events-none"></div>
        <div class="absolute inset-0 bg-[url('https://www.transparenttextures.com/patterns/cubes.png')] opacity-5 mix-blend-overlay"></div>

        <div class="max-w-7xl mx-auto px-6 relative z-10 text-center">
            <div class="reveal">
                <h2 class="font-display text-3xl sm:text-4xl lg:text-5xl font-extrabold text-white mb-4 tracking-tight">
                    Tidak Menemukan Layanan yang Diinginkan?
                </h2>
                <p class="text-slate-300 text-lg font-light max-w-2xl mx-auto mb-16">
                    Jayra Construction menerima permintaan pembangunan secara custom. Sampaikan ide proyek Anda, dan tim kami akan mewujudkannya.
                </p>
            </div>

            <div class="grid grid-cols-1 sm:grid-cols-3 gap-6 md:gap-8 justify-items-center">
                
                <div class="w-full max-w-[320px] aspect-[4/3] rounded-[2rem] bg-white/5 border-2 border-dashed border-white/20 hover:border-accent hover:bg-white/10 transition-all duration-300 cursor-pointer flex flex-col items-center justify-center group reveal delay-100 relative overflow-hidden backdrop-blur-sm">
                    <div class="w-16 h-16 rounded-full bg-white/10 flex items-center justify-center mb-4 group-hover:scale-110 group-hover:bg-accent transition-all duration-300">
                        <svg class="w-8 h-8 text-slate-300 group-hover:text-primary transition-colors" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4"></path></svg>
                    </div>
                    <span class="text-white font-semibold text-sm group-hover:text-accent transition-colors">Ajukan Custom Desain</span>
                </div>

                <div class="w-full max-w-[320px] aspect-[4/3] rounded-[2rem] bg-white/5 border-2 border-dashed border-white/20 hover:border-accent hover:bg-white/10 transition-all duration-300 cursor-pointer flex flex-col items-center justify-center group reveal delay-200 relative overflow-hidden backdrop-blur-sm">
                    <div class="w-16 h-16 rounded-full bg-white/10 flex items-center justify-center mb-4 group-hover:scale-110 group-hover:bg-accent transition-all duration-300">
                        <svg class="w-8 h-8 text-slate-300 group-hover:text-primary transition-colors" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4"></path></svg>
                    </div>
                    <span class="text-white font-semibold text-sm group-hover:text-accent transition-colors">Konsultasi Khusus</span>
                </div>

                <div class="w-full max-w-[320px] aspect-[4/3] rounded-[2rem] bg-white/5 border-2 border-dashed border-white/20 hover:border-accent hover:bg-white/10 transition-all duration-300 cursor-pointer flex flex-col items-center justify-center group reveal delay-300 relative overflow-hidden backdrop-blur-sm">
                    <div class="w-16 h-16 rounded-full bg-white/10 flex items-center justify-center mb-4 group-hover:scale-110 group-hover:bg-accent transition-all duration-300">
                        <svg class="w-8 h-8 text-slate-300 group-hover:text-primary transition-colors" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4"></path></svg>
                    </div>
                    <span class="text-white font-semibold text-sm group-hover:text-accent transition-colors">Permintaan Survey</span>
                </div>

            </div>

            <div class="mt-16 reveal delay-300">
                <a href="{{ route('user.contact') }}" class="inline-flex items-center gap-3 bg-white text-primary px-8 py-4 rounded-xl font-bold text-[15px] shadow-lg hover:bg-accent hover:-translate-y-1 hover:shadow-xl transition-all duration-300">
                    Hubungi Kami Secepatnya
                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M14 5l7 7m0 0l-7 7m7-7H3"/></svg>
                </a>
            </div>
        </div>
    </section>

</div>

@endsection
