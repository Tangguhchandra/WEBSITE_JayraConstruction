@extends('user.layouts.main')

@section('title', 'Detail Service - Jayra Construction')

@section('content')

<div class="pt-28 pb-0 bg-surface">

    {{-- ================= BREADCRUMB ================= --}}
    <div class="max-w-7xl mx-auto px-6 pt-6 pb-4 reveal">
        <div class="flex items-center justify-between gap-4">
            {{-- Breadcrumb trail --}}
            <nav class="flex items-center gap-2 text-sm font-medium text-slate-400">
                <a href="{{ route('user.home') }}" class="hover:text-primary transition-colors flex items-center gap-1.5">
                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 12l2-2m0 0l7-7 7 7M5 10v10a1 1 0 001 1h3m10-11l2 2m-2-2v10a1 1 0 01-1 1h-3m-6 0a1 1 0 001-1v-4a1 1 0 011-1h2a1 1 0 011 1v4a1 1 0 001 1m-6 0h6"/></svg>
                    Home
                </a>
                <svg class="w-3.5 h-3.5 text-slate-300" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"/></svg>
                <a href="{{ route('user.service') }}" class="hover:text-primary transition-colors">Services</a>
                <svg class="w-3.5 h-3.5 text-slate-300" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"/></svg>
                <span class="text-primary font-semibold">Detail Service</span>
            </nav>

            {{-- Back button --}}
            <a href="{{ route('user.service') }}" class="inline-flex items-center gap-2 px-4 py-2 rounded-xl border border-slate-200 bg-white text-sm font-semibold text-primary hover:border-primary hover:bg-primary hover:text-white transition-all duration-300 shadow-sm flex-shrink-0">
                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 19l-7-7 7-7"/></svg>
                Kembali
            </a>
        </div>
    </div>

    {{-- ================= PRODUCT OVERVIEW HERO ================= --}}
    <section class="max-w-7xl mx-auto px-6 mb-24">
        <div class="grid lg:grid-cols-2 gap-12 lg:gap-16 items-start">
            
            <div class="flex flex-col gap-4 reveal reveal-left">
                <div class="w-full aspect-[4/3] rounded-[2rem] overflow-hidden shadow-[0_10px_40px_-10px_rgba(16,55,92,0.1)] bg-white border-4 border-white relative group" x-data="{ activeImage: 0 }">
                    <img x-show="activeImage === 0" src="https://images.unsplash.com/photo-1503602642458-232111445657?q=80&w=2000&auto=format&fit=crop" alt="Meja Belajar Anak" class="w-full h-full object-cover group-hover:scale-105 transition-transform duration-700">
                    <img x-show="activeImage === 1" src="https://images.unsplash.com/photo-1513694203232-719a280e022f?q=80&w=2000&auto=format&fit=crop" alt="Meja Belajar Anak" class="w-full h-full object-cover group-hover:scale-105 transition-transform duration-700">
                    <img x-show="activeImage === 2" src="https://images.unsplash.com/photo-1585412727339-54e4bae3bbf9?q=80&w=2000&auto=format&fit=crop" alt="Meja Belajar Anak" class="w-full h-full object-cover group-hover:scale-105 transition-transform duration-700">
                </div>
                
                {{-- Thumbnail Selector --}}
                <div class="grid grid-cols-3 gap-4" x-data="{ activeImage: 0 }">
                    <div @click="activeImage = 0" :class="activeImage === 0 ? 'border-primary shadow-md opacity-100' : 'border-transparent shadow-sm opacity-60 hover:opacity-100'" class="aspect-video rounded-xl overflow-hidden cursor-pointer border-2 transition-all">
                        <img src="https://images.unsplash.com/photo-1503602642458-232111445657?q=80&w=500&auto=format&fit=crop" class="w-full h-full object-cover" loading="lazy">
                    </div>
                    <div @click="activeImage = 1" :class="activeImage === 1 ? 'border-primary shadow-md opacity-100' : 'border-transparent shadow-sm opacity-60 hover:opacity-100'" class="aspect-video rounded-xl overflow-hidden cursor-pointer border-2 transition-all">
                        <img src="https://images.unsplash.com/photo-1513694203232-719a280e022f?q=80&w=500&auto=format&fit=crop" class="w-full h-full object-cover" loading="lazy">
                    </div>
                    <div @click="activeImage = 2" :class="activeImage === 2 ? 'border-primary shadow-md opacity-100' : 'border-transparent shadow-sm opacity-60 hover:opacity-100'" class="aspect-video rounded-xl overflow-hidden cursor-pointer border-2 transition-all">
                        <img src="https://images.unsplash.com/photo-1585412727339-54e4bae3bbf9?q=80&w=500&auto=format&fit=crop" class="w-full h-full object-cover" loading="lazy">
                    </div>
                </div>
            </div>

            <div class="flex flex-col reveal reveal-right delay-100">
                <h1 class="font-display text-4xl sm:text-5xl font-extrabold text-primary mb-4 tracking-tight">
                    Meja Belajar <span class="text-slate-400 font-light">Anak</span>
                </h1>
                
                <p class="text-slate-500 text-[15px] font-light leading-relaxed mb-8">
                    Meja belajar anak dirancang secara ergonomis untuk mendukung kenyamanan, fokus, dan perkembangan postur tubuh selama proses belajar. Produk ini dibuat dengan mempertimbangkan tinggi badan anak, ruang gerak yang cukup, serta tata letak penyimpanan yang fungsional agar aktivitas belajar menjadi lebih efektif dan terorganisir.
                </p>

                <div class="mb-8">
                    <p class="text-xs font-bold text-slate-400 uppercase tracking-widest mb-3 flex items-center gap-2">
                        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6a2 2 0 012-2h2a2 2 0 012 2v2a2 2 0 01-2 2H6a2 2 0 01-2-2V6zM14 6a2 2 0 012-2h2a2 2 0 012 2v2a2 2 0 01-2 2h-2a2 2 0 01-2-2V6zM4 16a2 2 0 012-2h2a2 2 0 012 2v2a2 2 0 01-2 2H6a2 2 0 01-2-2v-2zM14 16a2 2 0 012-2h2a2 2 0 012 2v2a2 2 0 01-2 2h-2a2 2 0 01-2-2v-2z"/></svg>
                        Pilih Tipe Meja
                    </p>
                    <div class="flex flex-wrap gap-3" x-data="{ tipe: 'tipe2' }">
                        <button @click="tipe = 'tipe1'" :class="tipe === 'tipe1' ? 'border-primary bg-primary text-white shadow-md' : 'border-primary bg-white text-primary hover:bg-slate-50'" class="px-6 py-2.5 rounded-xl border-2 font-bold text-sm transition-colors">Meja Tipe 1</button>
                        <button @click="tipe = 'tipe2'" :class="tipe === 'tipe2' ? 'border-primary bg-primary text-white shadow-md' : 'border-primary bg-white text-primary hover:bg-slate-50'" class="px-6 py-2.5 rounded-xl border-2 font-bold text-sm transition-colors">Meja Tipe 2</button>
                    </div>
                </div>

                <div class="flex flex-wrap items-center gap-4 mb-10 pt-6 border-t border-slate-200/60">
                    <h2 class="font-display text-4xl font-extrabold text-primary w-full sm:w-auto mb-4 sm:mb-0 mr-4">
                        Rp450.000<span class="text-xl text-slate-400 font-medium">,00</span>
                    </h2>
                    
                    <button title="Tambah ke keranjang" class="w-12 h-12 rounded-xl bg-primary flex items-center justify-center text-white hover:bg-primaryDark hover:-translate-y-1 hover:shadow-lg transition-all duration-300">
                        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 3h2l.4 2M7 13h10l4-8H5.4M7 13L5.4 5M7 13l-2.293 2.293c-.63.63-.184 1.707.707 1.707H17m0 0a2 2 0 100 4 2 2 0 000-4zm-8 0a2 2 0 100 4 2 2 0 000-4z"/></svg>
                    </button>
                    
                    <a href="{{ route('user.contact') }}" class="flex-1 sm:flex-none px-8 py-3 rounded-xl border-2 border-primary bg-white text-primary font-bold text-[14px] hover:bg-primary hover:text-white hover:-translate-y-1 hover:shadow-lg transition-all duration-300 text-center">
                        Order Now
                    </a>

                    <a href="https://wa.me/6285772364659" target="_blank" class="flex items-center gap-2 px-6 py-3 rounded-xl border-2 border-[#25D366] text-[#25D366] font-bold text-[14px] hover:bg-[#25D366] hover:text-white hover:-translate-y-1 hover:shadow-lg transition-all duration-300">
                        <svg class="w-4 h-4" fill="currentColor" viewBox="0 0 24 24"><path d="M17.472 14.382c-.297-.149-1.758-.867-2.03-.967-.273-.099-.471-.148-.67.15-.197.297-.767.966-.94 1.164-.173.199-.347.223-.644.075-.297-.15-1.255-.463-2.39-1.475-.883-.788-1.48-1.761-1.653-2.059-.173-.297-.018-.458.13-.606.134-.133.298-.347.446-.52.149-.174.198-.298.298-.497.099-.198.05-.371-.025-.52-.075-.149-.669-1.612-.916-2.207-.242-.579-.487-.5-.669-.51-.173-.008-.371-.01-.57-.01-.198 0-.52.074-.792.372-.272.297-1.04 1.016-1.04 2.479 0 1.462 1.065 2.875 1.213 3.074.149.198 2.096 3.2 5.077 4.487.709.306 1.262.489 1.694.625.712.227 1.36.195 1.871.118.571-.085 1.758-.719 2.006-1.413.248-.694.248-1.289.173-1.413-.074-.124-.272-.198-.57-.347m-5.421 7.403h-.004a9.87 9.87 0 01-5.031-1.378l-.361-.214-3.741.982.998-3.648-.235-.374a9.86 9.86 0 01-1.51-5.26c.001-5.45 4.436-9.884 9.888-9.884 2.64 0 5.122 1.03 6.988 2.898a9.825 9.825 0 012.893 6.994c-.003 5.45-4.437 9.884-9.885 9.884m8.413-18.297A11.815 11.815 0 0012.05 0C5.495 0 .16 5.335.157 11.892c0 2.096.547 4.142 1.588 5.945L.057 24l6.305-1.654a11.882 11.882 0 005.683 1.448h.005c6.554 0 11.89-5.335 11.893-11.893a11.821 11.821 0 00-3.48-8.413z"/></svg>
                        WhatsApp
                    </a>
                </div>

                <div>
                    <p class="text-xs font-bold text-slate-400 uppercase tracking-widest mb-3">Apa Kata Mereka?</p>
                    <div class="bg-white rounded-2xl p-5 shadow-[0_5px_20px_-5px_rgba(16,55,92,0.08)] border border-slate-100 flex gap-4 items-start relative overflow-hidden group">
                        <div class="absolute left-0 top-0 w-1 h-full bg-accent"></div>
                        
                        <div class="w-12 h-12 rounded-full bg-primary flex items-center justify-center flex-shrink-0 text-white font-bold text-lg">
                            T
                        </div>
                        <div>
                            <div class="flex items-center gap-2 mb-1">
                                <h4 class="font-bold text-primary text-sm">Titien Hendrawibowo</h4>
                                <div class="flex text-accent">
                                    @for($i = 0; $i < 5; $i++)
                                    <svg class="w-3.5 h-3.5" fill="currentColor" viewBox="0 0 20 20"><path d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z"/></svg>
                                    @endfor
                                </div>
                            </div>
                            <p class="text-xs text-slate-500 font-light italic">"Meja belajarnya cocok dan ukurannya pas untuk anak saya usia 8 tahun. Tingginya sesuai, laci-lacinya cukup buat nyimpan alat tulis, bikin anak makin rajin belajar."</p>
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </section>

    {{-- ================= TABS: DETAIL & INFORMASI TAMBAHAN ================= --}}
    <section class="py-24 bg-primary relative overflow-hidden rounded-[3rem] sm:rounded-[4rem] mx-4 sm:mx-6 mb-24 shadow-2xl" x-data="{ activeTab: 'detail' }">
        <div class="absolute inset-0 bg-[url('https://www.transparenttextures.com/patterns/cubes.png')] opacity-5 mix-blend-overlay"></div>
        <div class="absolute top-0 right-0 w-[500px] h-[500px] bg-accent/10 rounded-full blur-[100px] pointer-events-none"></div>

        <div class="max-w-6xl mx-auto px-6 relative z-10">
            
            <div class="flex flex-wrap gap-4 mb-12 reveal">
                <button @click="activeTab = 'detail'" 
                        :class="activeTab === 'detail' ? 'bg-accent text-primary' : 'bg-white/10 text-white hover:bg-white/20'"
                        class="px-8 py-3.5 rounded-full font-bold text-sm transition-all duration-300 shadow-sm backdrop-blur-sm">
                    Product Detail
                </button>
                <button @click="activeTab = 'info'" 
                        :class="activeTab === 'info' ? 'bg-accent text-primary' : 'bg-white/10 text-white hover:bg-white/20'"
                        class="px-8 py-3.5 rounded-full font-bold text-sm transition-all duration-300 shadow-sm backdrop-blur-sm">
                    Informasi Tambahan
                </button>
            </div>

            <div x-show="activeTab === 'detail'" 
                 x-transition:enter="transition ease-out duration-500" 
                 x-transition:enter-start="opacity-0 translate-y-4" 
                 x-transition:enter-end="opacity-100 translate-y-0"
                 class="grid md:grid-cols-2 gap-12 items-center">
                
                <div class="text-white">
                    <h3 class="font-display text-3xl font-extrabold mb-4"><span class="text-accent">Product</span> Overview</h3>
                    <p class="text-slate-300 font-light text-[15px] leading-relaxed mb-10">
                        Meja Belajar Anak dirancang untuk menciptakan ruang belajar yang nyaman, aman, dan mendukung perkembangan postur tubuh anak. Dengan pendekatan ergonomis dan desain fungsional, produk ini membantu meningkatkan fokus serta kerapian area belajar.
                    </p>

                    <h3 class="font-display text-2xl font-extrabold mb-6"><span class="text-accent">Fitur</span> Utama</h3>
                    <ul class="space-y-4">
                        @foreach(['Desain ergonomis sesuai standar postur anak', 'Konstruksi stabil dan tahan lama', 'Sudut aman (rounded) dan finishing halus', 'Dapat disesuaikan dengan konsep interior kamar', 'Mendukung kerapihan dan produktivitas belajar'] as $fitur)
                        <li class="flex items-start gap-3">
                            <div class="mt-1 flex-shrink-0 w-5 h-5 rounded-full bg-accent text-primary flex items-center justify-center">
                                <svg class="w-3.5 h-3.5" fill="none" stroke="currentColor" stroke-width="3" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" d="M5 13l4 4L19 7"/></svg>
                            </div>
                            <span class="text-slate-200 text-sm font-medium">{{ $fitur }}</span>
                        </li>
                        @endforeach
                    </ul>
                </div>

                <div class="relative w-full aspect-square md:aspect-[4/3] bg-white/10 rounded-[2rem] border border-white/20 overflow-hidden flex flex-col justify-end p-4 group">
                    <img src="https://images.unsplash.com/photo-1513694203232-719a280e022f?q=80&w=1000&auto=format&fit=crop" class="absolute inset-0 w-full h-full object-cover opacity-60 group-hover:opacity-90 transition-opacity duration-500">
                    <p class="text-[10px] text-white/70 italic text-right relative z-10 drop-shadow-md">*Gambar Hanya Contoh Product</p>
                </div>
            </div>

            <div x-show="activeTab === 'info'" 
                 x-transition:enter="transition ease-out duration-500" 
                 x-transition:enter-start="opacity-0 translate-y-4" 
                 x-transition:enter-end="opacity-100 translate-y-0"
                 style="display: none;"
                 class="bg-white/5 backdrop-blur-md rounded-[2rem] p-8 border border-white/10 text-white">
                <h3 class="font-display text-2xl font-bold text-accent mb-6">Spesifikasi Material</h3>
                <div class="grid sm:grid-cols-2 gap-6">
                    <div>
                        <p class="text-sm text-slate-400 mb-1">Dimensi (P x L x T)</p>
                        <p class="font-semibold">120cm x 60cm x 75cm</p>
                    </div>
                    <div>
                        <p class="text-sm text-slate-400 mb-1">Material Utama</p>
                        <p class="font-semibold">Kayu Mahoni / MDF Premium</p>
                    </div>
                    <div>
                        <p class="text-sm text-slate-400 mb-1">Finishing</p>
                        <p class="font-semibold">Duco / HPL Anti Gores</p>
                    </div>
                    <div>
                        <p class="text-sm text-slate-400 mb-1">Garansi</p>
                        <p class="font-semibold">1 Tahun Struktur</p>
                    </div>
                </div>
            </div>

        </div>
    </section>

    {{-- ================= RELATED SERVICES ================= --}}
    <section class="py-16 max-w-7xl mx-auto px-6 mb-20">
        
        <div class="text-center mb-16 reveal">
            <h2 class="font-display text-3xl sm:text-4xl font-extrabold text-primary uppercase tracking-tight mb-4">
                Temukan Services Kami <span class="text-accent">Lainnya!</span>
            </h2>
            <p class="text-slate-500 font-light text-[15px] max-w-3xl mx-auto">
                Jelajahi berbagai layanan unggulan kami yang dirancang untuk memenuhi kebutuhan Anda dengan kualitas terbaik dan pengerjaan profesional. Dari perencanaan hingga hasil akhir.
            </p>
        </div>

        @php
        $related = [
            ['image' => 'photo-1505843490538-5133c6c7d0e1', 'title' => 'Kursi Kantor Kulit', 'price' => 'Rp250.000'],
            ['image' => 'photo-1592078615290-033ee584e267', 'title' => 'Kursi Direktur',      'price' => 'Rp850.000'],
            ['image' => 'photo-1580480055273-228ff5388ef8', 'title' => 'Set Meja Rapat',      'price' => 'Rp1.250.000'],
        ];
        @endphp

        <div class="grid grid-cols-1 md:grid-cols-3 gap-8">
            @foreach($related as $i => $item)
            <div class="bg-white rounded-[2rem] p-5 shadow-[0_10px_30px_-10px_rgba(16,55,92,0.06)] hover:-translate-y-2 hover:shadow-xl border border-slate-100 transition-all duration-300 group reveal {{ $i === 1 ? 'delay-100' : ($i === 2 ? 'delay-200' : '') }}">
                <a href="{{ route('user.detail-service') }}" class="block w-full aspect-[4/3] rounded-2xl bg-slate-100 mb-5 overflow-hidden">
                    <img src="https://images.unsplash.com/{{ $item['image'] }}?q=80&w=800&auto=format&fit=crop" class="w-full h-full object-cover group-hover:scale-110 transition-transform duration-700" loading="lazy">
                </a>
                <div class="px-2 flex justify-between items-center mb-6">
                    <h4 class="font-bold text-primary text-lg">{{ $item['title'] }}</h4>
                    <p class="font-display font-extrabold text-primary text-lg">{{ $item['price'] }}</p>
                </div>
                <div class="flex gap-3">
                    <button title="Tambah ke keranjang" class="w-12 h-12 rounded-xl bg-primary/10 flex items-center justify-center text-primary hover:bg-primary hover:text-white transition-colors">
                        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 3h2l.4 2M7 13h10l4-8H5.4M7 13L5.4 5M7 13l-2.293 2.293c-.63.63-.184 1.707.707 1.707H17m0 0a2 2 0 100 4 2 2 0 000-4zm-8 0a2 2 0 100 4 2 2 0 000-4z"/></svg>
                    </button>
                    <a href="{{ route('user.detail-service') }}" class="flex-1 bg-white border-2 border-primary text-primary font-bold text-[13px] rounded-xl hover:bg-primary hover:text-white transition-colors flex items-center justify-center py-3">
                        Lihat Detail
                    </a>
                </div>
            </div>
            @endforeach
        </div>

        {{-- Back to all services --}}
        <div class="flex justify-center mt-12 reveal">
            <a href="{{ route('user.service') }}" class="inline-flex items-center gap-2 px-8 py-3.5 border-2 border-primary text-primary font-bold text-[14px] rounded-xl hover:bg-primary hover:text-white hover:-translate-y-1 hover:shadow-lg transition-all duration-300">
                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 19l-7-7 7-7"/></svg>
                Lihat Semua Services
            </a>
        </div>
    </section>

</div>

@endsection