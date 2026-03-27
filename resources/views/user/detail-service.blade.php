@extends('user.layouts.main')

@section('title', 'Detail Layanan - Jayra Construction')

@section('content')

{{-- LOGIKA GAMBAR PINTAR (DINAMIS) --}}
@php 
    $service = $service ?? null; 
    
    // Kumpulkan gambar yang benar-benar ada di database
    $images = [];
    if ($service) {
        if ($service->image_1) $images[] = asset('storage/' . $service->image_1);
        if ($service->image_2) $images[] = asset('storage/' . $service->image_2);
        if ($service->image_3) $images[] = asset('storage/' . $service->image_3);
    }

    // Fallback darurat jika admin belum upload sama sekali
    if (empty($images)) {
        $images[] = 'https://images.unsplash.com/photo-1503387762-592deb58ef4e?q=80&w=2071';
    }
@endphp

{{-- Tambahkan x-data showLoginModal untuk mengontrol Modal pop-up --}}
<div class="pt-36 lg:pt-44 pb-0 bg-surface" x-data="{ showLoginModal: false }">

    {{-- ================= BREADCRUMB ================= --}}
    <div class="max-w-7xl mx-auto px-6 pb-4 reveal">
        <div class="flex items-center justify-between gap-4">
            <nav class="flex items-center gap-2 text-sm font-medium text-slate-400">
                <a href="{{ route('user.home') }}" class="hover:text-primary transition-colors flex items-center gap-1.5">
                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 12l2-2m0 0l7-7 7 7M5 10v10a1 1 0 001 1h3m10-11l2 2m-2-2v10a1 1 0 01-1 1h-3m-6 0a1 1 0 001 1v-4a1 1 0 011-1h2a1 1 0 011 1v4a1 1 0 001 1m-6 0h6"/></svg>
                    Home
                </a>
                <svg class="w-3.5 h-3.5 text-slate-300" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"/></svg>
                <a href="{{ route('user.service') }}" class="hover:text-primary transition-colors">Layanan</a>
                <svg class="w-3.5 h-3.5 text-slate-300" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"/></svg>
                <span class="text-primary font-semibold truncate max-w-[150px] sm:max-w-none">{{ $service->name ?? 'Detail Layanan' }}</span>
            </nav>

            <a href="{{ route('user.service') }}" class="inline-flex items-center gap-2 px-4 py-2 rounded-xl border border-slate-200 bg-white text-sm font-semibold text-primary hover:border-primary hover:bg-primary hover:text-white transition-all duration-300 shadow-sm flex-shrink-0">
                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 19l-7-7 7-7"/></svg>
                Kembali
            </a>
        </div>
    </div>

    {{-- ================= SERVICE OVERVIEW HERO ================= --}}
    <section class="max-w-7xl mx-auto px-6 mb-24 mt-4">
        <div class="grid lg:grid-cols-2 gap-12 lg:gap-16 items-start">
            
            {{-- BAGIAN KIRI: GAMBAR (Foto Konstruksi/Bangunan) DINAMIS --}}
            <div class="flex flex-col gap-4 reveal reveal-left" x-data="{ activeImage: 0 }">
                
                {{-- Gambar Utama --}}
                <div class="w-full aspect-[4/3] rounded-[2rem] overflow-hidden shadow-[0_10px_40px_-10px_rgba(16,55,92,0.1)] bg-white border-4 border-white relative group">
                    @foreach($images as $index => $img)
                        <img x-show="activeImage === {{ $index }}" src="{{ $img }}" class="w-full h-full object-cover group-hover:scale-105 transition-transform duration-700" @if($index > 0) style="display: none;" @endif>
                    @endforeach
                </div>
                
                {{-- Thumbnail Selector (Hanya muncul kalau foto > 1) --}}
                @if(count($images) > 1)
                <div class="grid grid-cols-{{ count($images) }} gap-4">
                    @foreach($images as $index => $img)
                    <div @click="activeImage = {{ $index }}" :class="activeImage === {{ $index }} ? 'border-primary shadow-md opacity-100' : 'border-transparent shadow-sm opacity-60 hover:opacity-100'" class="aspect-video rounded-xl overflow-hidden cursor-pointer border-2 transition-all">
                        <img src="{{ $img }}" class="w-full h-full object-cover" loading="lazy">
                    </div>
                    @endforeach
                </div>
                @endif

            </div>

            {{-- BAGIAN KANAN: INFO LAYANAN & TOMBOL AKSI --}}
            <div class="flex flex-col reveal reveal-right delay-100">
                
                <div class="inline-flex items-center gap-2 px-3 py-1.5 rounded-full bg-accent/10 border border-accent/20 mb-4 w-max">
                    <span class="w-2 h-2 rounded-full bg-accent animate-pulse"></span>
                    <span class="text-[10px] font-bold text-primary uppercase tracking-widest">{{ $service->category ?? 'Layanan Utama' }}</span>
                </div>

                <h1 class="font-display text-4xl sm:text-5xl font-extrabold text-primary mb-4 tracking-tight leading-tight">
                    {{ $service->name ?? 'Pembangunan Rumah & Gedung Baru' }}
                </h1>
                
                <p class="text-slate-500 text-[15px] font-light leading-relaxed mb-6">
                    {{ $service->short_description ?? 'Layanan konstruksi menyeluruh mulai dari perencanaan struktur, pondasi, hingga finishing bangunan. Dikerjakan oleh tenaga ahli dan arsitek profesional dengan standar keamanan serta kualitas material terbaik untuk mewujudkan hunian atau gedung impian Anda.' }}
                </p>

                {{-- Spesifikasi / Keunggulan --}}
                <div class="grid grid-cols-2 gap-3 mb-8 p-5 bg-white rounded-2xl border border-slate-100 shadow-sm">
                    @if($service && $service->spec_1)
                    <div class="flex items-center gap-3">
                        <div class="w-8 h-8 rounded-full bg-green-50 text-green-500 flex items-center justify-center flex-shrink-0">
                            <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"/></svg>
                        </div>
                        <span class="text-sm font-semibold text-slate-700">{{ $service->spec_1 }}</span>
                    </div>
                    @endif
                    @if($service && $service->spec_2)
                    <div class="flex items-center gap-3">
                        <div class="w-8 h-8 rounded-full bg-green-50 text-green-500 flex items-center justify-center flex-shrink-0">
                            <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"/></svg>
                        </div>
                        <span class="text-sm font-semibold text-slate-700">{{ $service->spec_2 }}</span>
                    </div>
                    @endif
                    @if($service && $service->spec_3)
                    <div class="flex items-center gap-3 mt-2">
                        <div class="w-8 h-8 rounded-full bg-green-50 text-green-500 flex items-center justify-center flex-shrink-0">
                            <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"/></svg>
                        </div>
                        <span class="text-sm font-semibold text-slate-700">{{ $service->spec_3 }}</span>
                    </div>
                    @endif
                    @if($service && $service->spec_4)
                    <div class="flex items-center gap-3 mt-2">
                        <div class="w-8 h-8 rounded-full bg-green-50 text-green-500 flex items-center justify-center flex-shrink-0">
                            <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"/></svg>
                        </div>
                        <span class="text-sm font-semibold text-slate-700">{{ $service->spec_4 }}</span>
                    </div>
                    @endif
                    
                    @if(!$service)
                    <div class="flex items-center gap-3">
                        <div class="w-8 h-8 rounded-full bg-green-50 text-green-500 flex items-center justify-center flex-shrink-0">
                            <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"/></svg>
                        </div>
                        <span class="text-sm font-semibold text-slate-700">Gratis Survei Lokasi</span>
                    </div>
                    <div class="flex items-center gap-3">
                        <div class="w-8 h-8 rounded-full bg-green-50 text-green-500 flex items-center justify-center flex-shrink-0">
                            <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"/></svg>
                        </div>
                        <span class="text-sm font-semibold text-slate-700">Material Standar SNI</span>
                    </div>
                    @endif
                </div>
                
                <div class="pt-6 border-t border-slate-200/60">
                    <p class="text-xs font-bold text-slate-400 uppercase tracking-widest mb-2">Estimasi Biaya Mulai Dari</p>
                    <h2 class="font-display text-4xl font-extrabold text-primary mb-6 flex items-baseline gap-1">
                        Rp{{ number_format($service->price ?? 3500000, 0, ',', '.') }}<span class="text-xl text-slate-400 font-medium"> / m²</span>
                    </h2>
                    
                    <div class="flex flex-col sm:flex-row gap-4">
                        
                        {{-- CEK APAKAH USER SUDAH LOGIN ATAU BELUM --}}
                        @auth
                            {{-- Jika Sudah Login -> Langsung ke halaman pembayaran --}}
                            <a href="{{ route('user.pembayaran') }}" class="flex-1 flex items-center justify-center gap-2 px-8 py-3.5 rounded-xl border-2 border-primary bg-primary text-white font-bold text-[14px] hover:bg-primaryDark hover:border-primaryDark hover:-translate-y-1 hover:shadow-lg hover:shadow-primary/30 transition-all duration-300 text-center">
                                Pesan Sekarang
                                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M14 5l7 7m0 0l-7 7m7-7H3"/></svg>
                            </a>
                        @else
                            {{-- Jika Belum Login -> Munculkan Modal Peringatan --}}
                            <button @click="showLoginModal = true" class="flex-1 flex items-center justify-center gap-2 px-8 py-3.5 rounded-xl border-2 border-primary bg-primary text-white font-bold text-[14px] hover:bg-primaryDark hover:border-primaryDark hover:-translate-y-1 hover:shadow-lg hover:shadow-primary/30 transition-all duration-300 text-center w-full sm:w-auto">
                                Pesan Sekarang
                                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 15v2m-6 4h12a2 2 0 002-2v-6a2 2 0 00-2-2H6a2 2 0 00-2 2v6a2 2 0 002 2zm10-10V7a4 4 0 00-8 0v4h8z"/></svg>
                            </button>
                        @endauth

                        <a href="https://wa.me/6285772364659?text=Halo%20Jayra%20Construction,%20saya%20tertarik%20pesan%20layanan%20{{ $service->name ?? 'Pembangunan Baru' }}" target="_blank" class="flex-1 sm:flex-none flex items-center justify-center gap-2 px-6 py-3.5 rounded-xl border-2 border-[#25D366] text-[#25D366] font-bold text-[14px] hover:bg-[#25D366] hover:text-white hover:-translate-y-1 hover:shadow-lg hover:shadow-[#25D366]/30 transition-all duration-300">
                            <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 24 24"><path d="M17.472 14.382c-.297-.149-1.758-.867-2.03-.967-.273-.099-.471-.148-.67.15-.197.297-.767.966-.94 1.164-.173.199-.347.223-.644.075-.297-.15-1.255-.463-2.39-1.475-.883-.788-1.48-1.761-1.653-2.059-.173-.297-.018-.458.13-.606.134-.133.298-.347.446-.52.149-.174.198-.298.298-.497.099-.198.05-.371-.025-.52-.075-.149-.669-1.612-.916-2.207-.242-.579-.487-.5-.669-.51-.173-.008-.371-.01-.57-.01-.198 0-.52.074-.792.372-.272.297-1.04 1.016-1.04 2.479 0 1.462 1.065 2.875 1.213 3.074.149.198 2.096 3.2 5.077 4.487.709.306 1.262.489 1.694.625.712.227 1.36.195 1.871.118.571-.085 1.758-.719 2.006-1.413.248-.694.248-1.289.173-1.413-.074-.124-.272-.198-.57-.347m-5.421 7.403h-.004a9.87 9.87 0 01-5.031-1.378l-.361-.214-3.741.982.998-3.648-.235-.374a9.86 9.86 0 01-1.51-5.26c.001-5.45 4.436-9.884 9.888-9.884 2.64 0 5.122 1.03 6.988 2.898a9.825 9.825 0 012.893 6.994c-.003 5.45-4.437 9.884-9.885 9.884m8.413-18.297A11.815 11.815 0 0012.05 0C5.495 0 .16 5.335.157 11.892c0 2.096.547 4.142 1.588 5.945L.057 24l6.305-1.654a11.882 11.882 0 005.683 1.448h.005c6.554 0 11.89-5.335 11.893-11.893a11.821 11.821 0 00-3.48-8.413z"/></svg>
                            <span class="sm:hidden lg:inline">Tanya WA Kami</span>
                        </a>
                    </div>
                </div>

            </div>
        </div>
    </section>

    {{-- ================= DESKRIPSI & PROSES ================= --}}
    <section class="py-24 bg-primary relative overflow-hidden rounded-[3rem] sm:rounded-[4rem] mx-4 sm:mx-6 mb-24 shadow-2xl">
        <div class="absolute inset-0 bg-[url('https://www.transparenttextures.com/patterns/cubes.png')] opacity-5 mix-blend-overlay"></div>
        <div class="absolute top-0 right-0 w-[500px] h-[500px] bg-accent/10 rounded-full blur-[100px] pointer-events-none"></div>

        <div class="max-w-6xl mx-auto px-6 relative z-10">
            
            <div class="grid md:grid-cols-2 gap-12 items-center reveal">
                
                <div class="text-white">
                    <h3 class="font-display text-3xl font-extrabold mb-4"><span class="text-accent">Deskripsi</span> Lengkap</h3>
                    <p class="text-slate-300 font-light text-[15px] leading-relaxed mb-10">
                        {{ $service->full_description ?? 'Layanan Pembangunan Baru dari Jayra Construction menawarkan solusi end-to-end (dari nol sampai serah terima kunci) untuk pembangunan rumah tinggal, ruko, maupun gedung komersial. Tim ahli kami memastikan setiap tahap pengerjaan mematuhi standar keamanan struktur (SNI), serta dikerjakan secara presisi, tepat waktu, dan sesuai dengan Rencana Anggaran Biaya (RAB) yang telah disepakati.' }}
                    </p>

                    <h3 class="font-display text-2xl font-extrabold mb-6"><span class="text-accent">Tahapan</span> Pekerjaan</h3>
                    <ul class="space-y-4">
                        @foreach([
                            'Survei Lokasi & Pengukuran Lahan', 
                            'Pembuatan Desain Arsitektur & Layout 3D', 
                            'Penyusunan Rencana Anggaran Biaya (RAB)', 
                            'Proses Konstruksi & Laporan Berkala Mingguan', 
                            'Finishing, Pembersihan, & Serah Terima Kunci'
                        ] as $proses)
                        <li class="flex items-start gap-3">
                            <div class="mt-1 flex-shrink-0 w-5 h-5 rounded-full bg-accent text-primary flex items-center justify-center">
                                <svg class="w-3.5 h-3.5" fill="none" stroke="currentColor" stroke-width="3" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" d="M5 13l4 4L19 7"/></svg>
                            </div>
                            <span class="text-slate-200 text-sm font-medium">{{ $proses }}</span>
                        </li>
                        @endforeach
                    </ul>
                </div>

                {{-- Gambar dinamis: Prioritas gambar ke-2, kalau ga ada pakai gambar ke-1 --}}
                <div class="relative w-full aspect-square md:aspect-[4/3] bg-white/10 rounded-[2rem] border border-white/20 overflow-hidden flex flex-col justify-end p-4 group">
                    <img src="{{ $images[1] ?? $images[0] }}" class="absolute inset-0 w-full h-full object-cover opacity-60 group-hover:opacity-90 transition-opacity duration-500">
                </div>
            </div>

        </div>
    </section>

   {{-- ================= RELATED SERVICES ================= --}}
    @php
        // Mengambil maksimal 3 layanan lain dari database yang statusnya Aktif
        $relatedServices = collect();
        $totalOtherServices = 0;
        
        if($service) {
            $relatedServices = \App\Models\Service::where('status', 'Aktif')
                                ->where('id', '!=', $service->id)
                                ->latest()
                                ->take(3)
                                ->get();
                                
            // Menghitung total sisa layanan untuk logika tombol "Lihat Semua"
            $totalOtherServices = \App\Models\Service::where('status', 'Aktif')
                                ->where('id', '!=', $service->id)
                                ->count();
        }
    @endphp

    {{-- Section ini HANYA MUNCUL kalau ada layanan lain di database --}}
    @if($relatedServices->count() > 0)
    <section class="py-16 max-w-7xl mx-auto px-6 mb-20">
        <div class="text-center mb-16 reveal">
            <h2 class="font-display text-3xl sm:text-4xl font-extrabold text-primary uppercase tracking-tight mb-4">
                Temukan Layanan <span class="text-accent">Lainnya</span>
            </h2>
            <p class="text-slate-500 font-light text-[15px] max-w-2xl mx-auto">
                Jelajahi berbagai layanan jasa unggulan dari CV Jaya yang dirancang untuk merawat, mempercantik, atau memperluas bangunan Anda.
            </p>
        </div>

        <div class="grid grid-cols-1 md:grid-cols-3 gap-8">
            @foreach($relatedServices as $i => $item)
            <div class="bg-white rounded-[2rem] p-5 shadow-[0_10px_30px_-10px_rgba(16,55,92,0.06)] hover:-translate-y-2 hover:shadow-xl border border-slate-100 transition-all duration-300 group reveal {{ $i === 1 ? 'delay-100' : ($i === 2 ? 'delay-200' : '') }}">
                
                <a href="{{ route('user.detail-service', $item->id) }}" class="block w-full aspect-[4/3] rounded-2xl bg-slate-100 mb-5 overflow-hidden">
                    <img src="{{ $item->image_1 ? asset('storage/' . $item->image_1) : 'https://images.unsplash.com/photo-1541888086425-d81bb19240f5?q=80&w=800' }}" class="w-full h-full object-cover group-hover:scale-110 transition-transform duration-700" loading="lazy">
                </a>
                
                <div class="px-2 flex flex-col mb-6 gap-1">
                    <h4 class="font-bold text-primary text-lg line-clamp-1">{{ $item->name }}</h4>
                    <p class="font-display font-extrabold text-accent text-[15px] mt-1">Rp{{ number_format($item->price, 0, ',', '.') }}</p>
                </div>
                
                <div class="flex gap-3">
                    <a href="{{ route('user.detail-service', $item->id) }}" class="flex-1 bg-white border-2 border-primary text-primary font-bold text-[13px] rounded-xl hover:bg-primary hover:text-white transition-colors flex items-center justify-center py-3">
                        Pelajari Selengkapnya
                    </a>
                </div>
            </div>
            @endforeach
        </div>

        {{-- Logika Pintar: Tombol Lihat Semua HANYA MUNCUL kalau sisa layanan di database lebih dari 3 --}}
        @if($totalOtherServices > 3)
        <div class="flex justify-center mt-12 reveal">
            <a href="{{ route('user.service') }}" class="inline-flex items-center gap-2 px-8 py-3.5 border-2 border-primary text-primary font-bold text-[14px] rounded-xl hover:bg-primary hover:text-white hover:-translate-y-1 hover:shadow-lg transition-all duration-300">
                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 19l-7-7 7-7"/></svg>
                Lihat Semua Layanan Kami
            </a>
        </div>
        @endif
    </section>
    @endif

    {{-- ================= MODAL PERINGATAN LOGIN ================= --}}
    <div x-show="showLoginModal" style="display: none;" class="fixed inset-0 z-50 flex items-center justify-center px-4" x-cloak>
        <div x-show="showLoginModal" 
             x-transition:enter="transition ease-out duration-300"
             x-transition:enter-start="opacity-0"
             x-transition:enter-end="opacity-100"
             x-transition:leave="transition ease-in duration-200"
             x-transition:leave-start="opacity-100"
             x-transition:leave-end="opacity-0"
             @click="showLoginModal = false"
             class="fixed inset-0 bg-slate-900/60 backdrop-blur-sm cursor-pointer"></div>
        
        <div x-show="showLoginModal" 
             x-transition:enter="transition ease-out duration-300 delay-100"
             x-transition:enter-start="opacity-0 translate-y-8 scale-95"
             x-transition:enter-end="opacity-100 translate-y-0 scale-100"
             x-transition:leave="transition ease-in duration-200"
             x-transition:leave-start="opacity-100 translate-y-0 scale-100"
             x-transition:leave-end="opacity-0 translate-y-8 scale-95"
             class="bg-white rounded-[2rem] p-8 max-w-md w-full relative z-10 shadow-2xl text-center">
            
            <div class="w-20 h-20 bg-accent/10 text-accent rounded-full flex items-center justify-center mx-auto mb-6">
                <svg class="w-10 h-10" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 15v2m-6 4h12a2 2 0 002-2v-6a2 2 0 00-2-2H6a2 2 0 00-2 2v6a2 2 0 002 2zm10-10V7a4 4 0 00-8 0v4h8z"/></svg>
            </div>
            
            <h3 class="text-2xl font-bold text-primary mb-2 font-display">Akses Terbatas!</h3>
            <p class="text-slate-500 mb-8 font-light leading-relaxed">
                Silakan login terlebih dahulu ke akun Anda untuk melanjutkan proses pemesanan layanan ini.
            </p>
            
            <div class="flex flex-col sm:flex-row gap-3 justify-center">
                <button @click="showLoginModal = false" class="px-6 py-3.5 rounded-xl font-bold text-slate-500 bg-slate-100 hover:bg-slate-200 transition-colors w-full sm:w-auto">
                    Nanti Saja
                </button>
                <a href="{{ route('login') }}" class="px-6 py-3.5 rounded-xl font-bold text-white bg-primary hover:bg-primaryDark hover:shadow-lg transition-all hover:-translate-y-1 w-full sm:w-auto">
                    Login Sekarang
                </a>
            </div>
        </div>
    </div>

</div>

@endsection