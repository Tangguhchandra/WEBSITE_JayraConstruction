@extends('user.layouts.main')

@section('title', 'Service - Jayra Construction')

@section('content')

<div class="pt-36 pb-0">

{{-- ================= BANNER CALL TO ACTION ================= --}}
    <section class="max-w-7xl mx-auto px-6 mb-20">
        <div class="reveal relative rounded-[2.5rem] overflow-hidden shadow-[0_20px_60px_-15px_rgba(16,55,92,0.3)] group bg-primary">
            
            {{-- Background Gambar Rumah Mewah --}}
            <img src="https://images.unsplash.com/photo-1600607687920-4e2a09cf159d?q=80&w=2070&auto=format&fit=crop" alt="Luxury Home Construction" class="absolute inset-0 w-full h-full object-cover opacity-60 group-hover:scale-105 group-hover:opacity-70 transition-all duration-1000">
            
            {{-- Gradien Gelap Ala Startup Premium --}}
            <div class="absolute inset-0 bg-gradient-to-r from-primary/95 via-primary/80 to-primary/40 lg:to-transparent"></div>
            
            {{-- Tekstur Tambahan --}}
            <div class="absolute inset-0 bg-[url('https://www.transparenttextures.com/patterns/stardust.png')] opacity-20 mix-blend-overlay"></div>

            <div class="relative z-10 flex flex-col lg:flex-row items-center justify-between p-10 md:p-16 lg:p-20 gap-10">
                
                {{-- BAGIAN KIRI: Teks Utama --}}
                <div class="max-w-2xl w-full">
                    {{-- Badge dengan Efek Lampu Berkedip --}}
                    <div class="inline-flex items-center gap-3 px-5 py-2.5 rounded-full bg-white/10 border border-white/20 mb-8 backdrop-blur-md shadow-lg">
                        <span class="relative flex h-3 w-3">
                          <span class="animate-ping absolute inline-flex h-full w-full rounded-full bg-accent opacity-75"></span>
                          <span class="relative inline-flex rounded-full h-3 w-3 bg-accent"></span>
                        </span>
                        <span class="text-xs font-bold uppercase tracking-widest text-white">Layanan Konstruksi Premium</span>
                    </div>
                    
                    <h1 class="font-display text-4xl sm:text-5xl lg:text-[56px] font-extrabold text-white mb-6 leading-[1.15] tracking-tight">
                        Wujudkan <span class="text-transparent bg-clip-text bg-gradient-to-r from-accent to-yellow-200">Mahakarya</span><br>
                        Bersama <span class="relative inline-block text-accent">Ahlinya
                            <svg class="absolute -bottom-2 left-0 w-full h-3 text-accent opacity-60" viewBox="0 0 100 10" preserveAspectRatio="none"><path d="M0 5 Q 50 10 100 5" stroke="currentColor" stroke-width="4" fill="none"/></svg>
                        </span>
                    </h1>
                    
                    <p class="text-slate-300 text-lg md:text-xl mb-10 font-light max-w-lg leading-relaxed">
                        Langkah pertama menuju properti impian Anda. Diskusikan ide, budget, dan konsep desain langsung bersama tim engineer dan arsitek terbaik kami.
                    </p>
                    
                    <div class="flex flex-wrap items-center gap-6">
                        <a href="https://wa.me/6285772364659" target="_blank" class="inline-flex items-center justify-center gap-2 bg-accent text-primary font-bold text-[15px] py-4 px-8 rounded-xl shadow-[0_10px_25px_rgba(243,156,18,0.3)] hover:bg-white hover:-translate-y-1 hover:shadow-[0_15px_35px_rgba(243,156,18,0.4)] transition-all duration-300 group/btn">
                            Mulai Konsultasi Gratis
                            <svg class="w-5 h-5 group-hover/btn:translate-x-1 transition-transform" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M14 5l7 7m0 0l-7 7m7-7H3"/></svg>
                        </a>
                        <span class="text-white/70 text-sm font-medium flex items-center gap-2">
                            <svg class="w-5 h-5 text-[#25D366]" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"/></svg>
                            Respon Cepat via WA
                        </span>
                    </div>
                </div>

                {{-- BAGIAN KANAN: Kartu Kaca Melayang --}}
                <div class="hidden lg:block relative w-[300px] flex-shrink-0">
                    <div class="absolute -inset-4 bg-accent/20 rounded-[2.5rem] blur-[40px] animate-pulse"></div>
                    <div class="relative bg-white/10 border border-white/20 backdrop-blur-xl rounded-[2rem] p-8 shadow-2xl transform translate-y-4 hover:-translate-y-2 transition-transform duration-500">
                        
                        <div class="w-14 h-14 bg-gradient-to-br from-accent to-yellow-400 rounded-2xl flex items-center justify-center mb-6 shadow-lg">
                            <svg class="w-7 h-7 text-primary" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M9 12l2 2 4-4M7.835 4.697a3.42 3.42 0 001.946-.806 3.42 3.42 0 014.438 0 3.42 3.42 0 001.946.806 3.42 3.42 0 013.138 3.138 3.42 3.42 0 00.806 1.946 3.42 3.42 0 010 4.438 3.42 3.42 0 00-.806 1.946 3.42 3.42 0 01-3.138 3.138 3.42 3.42 0 00-1.946.806 3.42 3.42 0 01-4.438 0 3.42 3.42 0 00-1.946-.806 3.42 3.42 0 01-3.138-3.138 3.42 3.42 0 00-.806-1.946 3.42 3.42 0 010-4.438 3.42 3.42 0 00.806-1.946 3.42 3.42 0 013.138-3.138z"></path></svg>
                        </div>
                        
                        <h4 class="text-white font-bold text-xl mb-2">Premium Quality</h4>
                        <p class="text-white/70 text-sm leading-relaxed mb-8">Dikerjakan oleh tim ahli bersertifikasi dengan standar material terbaik.</p>
                        
                        <div class="flex items-center gap-4 border-t border-white/20 pt-5">
                            <div class="flex -space-x-3">
                                <img class="w-9 h-9 rounded-full border-2 border-primary object-cover" src="https://images.unsplash.com/photo-1507003211169-0a1dd7228f2d?q=80&w=100&auto=format&fit=crop" alt="Client">
                                <img class="w-9 h-9 rounded-full border-2 border-primary object-cover" src="https://images.unsplash.com/photo-1534528741775-53994a69daeb?q=80&w=100&auto=format&fit=crop" alt="Client">
                                <div class="w-9 h-9 rounded-full border-2 border-primary bg-slate-800 flex items-center justify-center text-[10px] text-white font-bold">+1k</div>
                            </div>
                            <span class="text-xs text-white/90 font-semibold tracking-wide">Klien Puas</span>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </section>

    {{-- ================= HEADER & SEARCH ================= --}}
    <section id="pelayanan-kami" class="max-w-7xl mx-auto px-6 mb-12">
        <div class="flex flex-col md:flex-row md:items-end justify-between gap-8 reveal">
            <div class="max-w-2xl">
                <h2 class="font-display text-3xl sm:text-4xl lg:text-5xl font-extrabold text-primary mb-4 tracking-tight">
                    Pelayanan Kami
                </h2>
                <p class="text-slate-500 font-light text-lg">
                    Kami menyediakan berbagai layanan konstruksi dan desain untuk memenuhi kebutuhan hunian, bangunan usaha, hingga renovasi dengan standar kualitas terbaik.
                </p>
            </div>

            <form action="{{ route('user.service') }}" method="GET" class="relative w-full md:max-w-[350px] group">
                <div class="absolute inset-y-0 left-0 pl-5 flex items-center pointer-events-none text-slate-400 group-focus-within:text-primary transition-colors">
                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"></path></svg>
                </div>
                <input type="text" name="search" value="{{ request('search') }}" placeholder="Cari layanan..." 
                       class="w-full pl-12 pr-6 py-4 rounded-full border border-slate-200 bg-white text-sm font-medium text-primary shadow-sm focus:outline-none focus:ring-4 focus:ring-primary/10 focus:border-primary transition-all duration-300">
                <button type="submit" class="hidden"></button>
            </form>
        </div>
    </section>

    {{-- ================= SERVICE CARDS GRID ================= --}}
    <section class="max-w-7xl mx-auto px-6 mb-20">
        <div class="grid grid-cols-1 md:grid-cols-2 gap-8">
            @forelse($services as $item)
                <div class="bg-white rounded-[2rem] p-6 lg:p-8 shadow-[0_10px_40px_-10px_rgba(16,55,92,0.08)] hover:-translate-y-2 hover:shadow-2xl transition-all duration-300 group border border-slate-50 cursor-pointer flex flex-col h-full reveal">
                    
                    <div class="relative w-full aspect-[16/9] rounded-[1.5rem] overflow-hidden mb-6 bg-slate-100">
                        <img src="{{ $item->image_1 ? asset('storage/' . $item->image_1) : 'https://images.unsplash.com/photo-1503387762-592deb58ef4e?q=80&w=2071' }}" class="w-full h-full object-cover group-hover:scale-105 transition-transform duration-700">
                        <div class="absolute inset-0 bg-primary/0 group-hover:bg-primary/20 transition-colors duration-300"></div>
                    </div>
                    
                    <div class="flex-1 flex flex-col">
                        <h3 class="font-display text-2xl font-bold text-primary mb-3 group-hover:text-accent transition-colors">{{ $item->name }}</h3>
                        <p class="text-sm text-slate-500 font-light leading-relaxed mb-8">{{ $item->short_description }}</p>
                        
                        <div class="mt-auto flex flex-wrap justify-between items-center gap-4 pt-6 border-t border-slate-100">
                            <span class="px-5 py-2.5 bg-slate-50 border border-slate-200 rounded-xl text-sm font-bold text-primary shadow-sm whitespace-nowrap">
                                <span class="text-xs text-slate-400 font-medium block leading-none mb-1">Mulai dari</span>
                                Rp{{ number_format($item->price, 0, ',', '.') }}
                            </span>
                            
                            <a href="{{ route('user.detail-service', $item->id) }}" class="bg-primary text-white px-6 py-3 rounded-xl text-[13px] font-bold shadow-md hover:bg-primaryDark hover:-translate-y-1 transition-all duration-300 whitespace-nowrap text-center flex items-center gap-2">
                                Lihat Detail
                                <svg class="w-3.5 h-3.5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"/></svg>
                            </a>
                        </div>
                    </div>
                </div>
            @empty
                <div class="col-span-2 text-center py-16">
                    <div class="w-20 h-20 bg-slate-100 rounded-full flex items-center justify-center mx-auto mb-4">
                        <svg class="w-10 h-10 text-slate-400" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"></path></svg>
                    </div>
                    <p class="text-slate-500 font-medium">Layanan tidak ditemukan.</p>
                    <p class="text-sm text-slate-400 mt-1">Coba gunakan kata kunci pencarian yang lain.</p>
                </div>
            @endforelse
        </div>

        {{-- ================= PAGINATION LARAVEL ================= --}}
        @if ($services->hasPages())
        <div class="flex flex-col sm:flex-row justify-between items-center gap-6 pt-12 mt-12 border-t border-slate-100 reveal">
            @if ($services->onFirstPage())
                <span class="inline-flex items-center gap-2 px-6 py-3 border-2 border-slate-100 text-slate-300 font-bold text-[13px] rounded-xl cursor-not-allowed">
                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 19l-7-7 7-7"/></svg>
                    Sebelumnya
                </span>
            @else
                <a href="{{ $services->previousPageUrl() }}" class="inline-flex items-center gap-2 px-6 py-3 border-2 border-slate-200 text-primary font-bold text-[13px] rounded-xl hover:border-primary hover:bg-slate-50 transition-all duration-300">
                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 19l-7-7 7-7"/></svg>
                    Sebelumnya
                </a>
            @endif

            <div class="flex justify-center items-center gap-2">
                <span class="text-sm font-semibold text-slate-500 bg-white px-4 py-2 rounded-xl border border-slate-200 shadow-sm">
                    Halaman <span class="text-primary font-bold">{{ $services->currentPage() }}</span> dari <span class="text-primary font-bold">{{ $services->lastPage() }}</span>
                </span>
            </div>

            @if ($services->hasMorePages())
                <a href="{{ $services->nextPageUrl() }}" class="inline-flex items-center gap-2 px-6 py-3 bg-primary text-white font-bold text-[13px] rounded-xl shadow-md hover:bg-primaryDark hover:-translate-y-0.5 hover:shadow-lg transition-all duration-300">
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
    </section>

    {{-- ================= 🔥 FIX: ALUR KERJA (PENGGANTI CUSTOM REQUEST) 🔥 ================= --}}
    <section class="bg-primary py-24 relative overflow-hidden rounded-t-[3rem] sm:rounded-t-[4rem]">
        <div class="absolute top-0 right-0 w-[500px] h-[500px] bg-accent/10 rounded-full blur-[100px] pointer-events-none"></div>
        <div class="absolute bottom-0 left-0 w-[300px] h-[300px] bg-white/5 rounded-full blur-[80px] pointer-events-none"></div>
        <div class="absolute inset-0 bg-[url('https://www.transparenttextures.com/patterns/cubes.png')] opacity-5 mix-blend-overlay"></div>

        <div class="max-w-7xl mx-auto px-6 relative z-10">
            
            {{-- Header Title --}}
            <div class="text-center reveal mb-16">
                <span class="text-accent font-bold tracking-widest uppercase text-sm mb-3 block">Transparan & Terstruktur</span>
                <h2 class="font-display text-3xl sm:text-4xl lg:text-5xl font-extrabold text-white mb-4 tracking-tight">
                    Bagaimana Kami Bekerja
                </h2>
                <p class="text-slate-300 text-lg font-light max-w-2xl mx-auto">
                    Proses sistematis dari perencanaan hingga serah terima kunci untuk memastikan proyek Anda berjalan sempurna dan tepat waktu.
                </p>
            </div>

            {{-- Grid Alur Kerja --}}
            <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-8">
                
                @foreach([
                    ['num' => '01', 'title' => 'Konsultasi Awal', 'desc' => 'Diskusi mendalam mengenai kebutuhan, konsep desain, budget, dan estimasi waktu proyek Anda.', 'icon' => 'M8 12h.01M12 12h.01M16 12h.01M21 12c0 4.418-4.03 8-9 8a9.863 9.863 0 01-4.255-.949L3 20l1.395-3.72C3.512 15.042 3 13.574 3 12c0-4.418 4.03-8 9-8s9 3.582 9 8z'],
                    ['num' => '02', 'title' => 'RAB & Kontrak', 'desc' => 'Pembuatan blueprint, desain 3D, serta Rencana Anggaran Biaya (RAB) yang transparan sebelum tanda tangan kontrak.', 'icon' => 'M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z'],
                    ['num' => '03', 'title' => 'Eksekusi Proyek', 'desc' => 'Tim lapangan dan engineer kami mulai bekerja sesuai standar operasional prosedur (SOP) keselamatan dan kualitas.', 'icon' => 'M19 21V5a2 2 0 00-2-2H7a2 2 0 00-2 2v16m14 0h2m-2 0h-5m-9 0H3m2 0h5M9 7h1m-1 4h1m4-4h1m-1 4h1m-5 10v-5a1 1 0 011-1h2a1 1 0 011 1v5m-4 0h4'],
                    ['num' => '04', 'title' => 'Serah Terima', 'desc' => 'Final checking bersama klien, memastikan seluruh detail sempurna, lalu penyerahan kunci beserta garansi pemeliharaan.', 'icon' => 'M9 12l2 2 4-4M7.835 4.697a3.42 3.42 0 001.946-.806 3.42 3.42 0 014.438 0 3.42 3.42 0 001.946.806 3.42 3.42 0 013.138 3.138 3.42 3.42 0 00.806 1.946 3.42 3.42 0 010 4.438 3.42 3.42 0 00-.806 1.946 3.42 3.42 0 01-3.138 3.138 3.42 3.42 0 00-1.946.806 3.42 3.42 0 01-4.438 0 3.42 3.42 0 00-1.946-.806 3.42 3.42 0 01-3.138-3.138 3.42 3.42 0 00-.806-1.946 3.42 3.42 0 010-4.438 3.42 3.42 0 00.806-1.946 3.42 3.42 0 013.138-3.138z'],
                ] as $i => $step)
                
                <div class="relative group reveal delay-[{{ $i * 100 }}ms]">
                    <div class="bg-white/5 border border-white/10 rounded-3xl p-8 hover:bg-white/10 hover:border-accent/50 transition-all duration-300 h-full backdrop-blur-sm">
                        {{-- Nomor Step --}}
                        <div class="text-5xl font-extrabold text-white/10 absolute top-4 right-6 group-hover:text-accent/20 transition-colors">
                            {{ $step['num'] }}
                        </div>
                        
                        <div class="w-16 h-16 rounded-2xl bg-white/10 flex items-center justify-center mb-6 group-hover:scale-110 group-hover:bg-accent transition-all duration-300 text-white group-hover:text-primary">
                            <svg class="w-8 h-8" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="{{ $step['icon'] }}"></path></svg>
                        </div>
                        
                        <h3 class="text-xl font-bold text-white mb-3">{{ $step['title'] }}</h3>
                        <p class="text-slate-300 text-sm font-light leading-relaxed">
                            {{ $step['desc'] }}
                        </p>
                    </div>
                </div>

                @endforeach
            </div>

        </div>
    </section>

</div>

@endsection

{{-- ================= JAVASCRIPT UNTUK AUTO SCROLL ================= --}}
@push('scripts')
<script>
    document.addEventListener("DOMContentLoaded", function() {
        // Cek apakah di URL ada parameter 'page' (artinya user baru saja klik pagination)
        const urlParams = new URLSearchParams(window.location.search);
        if (urlParams.has('page')) {
            // Cari elemen dengan ID 'pelayanan-kami'
            const target = document.getElementById('pelayanan-kami');
            if (target) {
                // Beri sedikit delay agar DOM selesai merender sepenuhnya, lalu scroll halus
                setTimeout(() => {
                    const yOffset = target.getBoundingClientRect().top + window.pageYOffset - 120; // 120px jarak agar tidak tertutup navbar
                    window.scrollTo({ top: yOffset, behavior: 'smooth' });
                }, 100);
            }
        }
    });
</script>
@endpush