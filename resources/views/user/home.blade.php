@extends('user.layouts.main')

@section('title', 'Jayra Construction - Membangun Masa Depan')

@section('content')

{{-- ================= HERO ================= --}}
<section id="home" class="relative pt-36 pb-20 lg:pt-44 lg:pb-28 overflow-hidden bg-pattern">
    <div class="absolute top-20 right-0 w-[500px] h-[500px] bg-primary/5 rounded-full blur-[100px] pointer-events-none"></div>
    <div class="absolute bottom-0 left-[-10%] w-[400px] h-[400px] bg-accent/10 rounded-full blur-[80px] pointer-events-none"></div>

    <div class="max-w-7xl mx-auto px-6 grid lg:grid-cols-2 gap-12 lg:gap-8 items-center relative z-10">
        
        <div class="max-w-2xl reveal">
            <div class="inline-flex items-center gap-2 px-4 py-2 rounded-full bg-accent/10 border border-accent/20 mb-6">
                <span class="w-2 h-2 rounded-full bg-accent animate-pulse"></span>
                <span class="text-xs font-bold text-primary uppercase tracking-widest">Build Your Dream Home</span>
            </div>

            <h1 class="font-display text-4xl sm:text-5xl lg:text-[64px] font-extrabold text-primary leading-[1.1] tracking-tight mb-6">
                Membangun <br>
                <span class="text-transparent bg-clip-text bg-gradient-to-r from-primary to-accent">Lebih Baik,</span> <br>
                Lebih Kuat.
            </h1>

            <p class="text-slate-500 text-lg sm:text-xl font-light mb-10 leading-relaxed max-w-lg">
                Temukan rumah impian Anda, dibangun oleh teknisi sipil terbaik kami dan tim konstruksi berpengalaman untuk hasil yang sempurna.
            </p>

            <div class="flex flex-col sm:flex-row gap-4">
                <a href="#contact" class="px-8 py-4 bg-primary text-white rounded-xl font-semibold text-[15px] hover:bg-primaryDark hover:-translate-y-1 hover:shadow-xl hover:shadow-primary/30 transition-all duration-300 text-center flex items-center justify-center gap-2 group">
                    Mulai Project
                    <svg class="w-4 h-4 group-hover:translate-x-1 transition-transform" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M14 5l7 7m0 0l-7 7m7-7H3"/></svg>
                </a>
                <a href="{{ route('user.about') }}" class="px-8 py-4 bg-white border-2 border-slate-200 text-primary rounded-xl font-semibold text-[15px] hover:border-primary hover:bg-slate-50 transition-all duration-300 text-center">
                    Info Lengkap
                </a>
            </div>
        </div>

        <div class="relative reveal reveal-right delay-200 flex justify-center lg:justify-end">
            <div class="relative w-full max-w-[480px] aspect-[4/5] rounded-[3rem] overflow-hidden shadow-2xl animate-float border-[8px] border-white">
                <img src="https://images.unsplash.com/photo-1541888086425-d81bb19240f5?q=80&w=2070&auto=format&fit=crop" alt="Construction Engineer" class="w-full h-full object-cover">
                <div class="absolute inset-0 bg-gradient-to-t from-primary/80 via-transparent to-transparent"></div>
                
                <div class="absolute bottom-8 left-8 bg-white/95 backdrop-blur-sm p-4 rounded-2xl shadow-lg flex items-center gap-4">
                    <div class="w-12 h-12 bg-accent rounded-full flex items-center justify-center text-primary text-xl font-bold">
                        15+
                    </div>
                    <div>
                        <p class="text-sm font-bold text-primary">Tahun Pengalaman</p>
                        <p class="text-xs text-slate-500">Kualitas Terjamin</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

{{-- ================= STATS STRIP ================= --}}
<section class="bg-primary py-10 relative overflow-hidden">
    <div class="absolute inset-0 bg-[url('https://www.transparenttextures.com/patterns/cubes.png')] opacity-5"></div>
    <div class="max-w-7xl mx-auto px-6 grid grid-cols-2 md:grid-cols-4 gap-8 relative z-10">
        @foreach([
            ['num' => '15+', 'label' => 'Tahun Pengalaman'],
            ['num' => '200+', 'label' => 'Proyek Selesai'],
            ['num' => '50+', 'label' => 'Tim Profesional'],
            ['num' => '100%', 'label' => 'Klien Puas'],
        ] as $stat)
        <div class="text-center reveal">
            <div class="font-display text-4xl lg:text-5xl font-extrabold text-accent mb-1">{{ $stat['num'] }}</div>
            <div class="text-slate-400 text-sm font-medium">{{ $stat['label'] }}</div>
        </div>
        @endforeach
    </div>
</section>

{{-- ================= ABOUT PREVIEW ================= --}}
<section id="about" class="py-24 bg-white relative">
    <div class="max-w-7xl mx-auto px-6 grid lg:grid-cols-2 gap-16 items-center">
        
        <div class="relative reveal reveal-left">
            <div class="w-full aspect-square md:aspect-[4/3] rounded-[2.5rem] overflow-hidden shadow-[0_20px_60px_-15px_rgba(16,55,92,0.15)] group relative">
                <img src="https://images.unsplash.com/photo-1503387762-592deb58ef4e?q=80&w=2071&auto=format&fit=crop" alt="Jayra Architecture" class="w-full h-full object-cover group-hover:scale-105 transition-transform duration-700">
                <div class="absolute inset-0 bg-primary/10 group-hover:bg-transparent transition-colors duration-500"></div>
            </div>
            <div class="absolute -bottom-6 -right-6 w-24 h-24 bg-accent rounded-3xl -z-10"></div>
        </div>

        <div class="reveal delay-100">
            <span class="text-xs font-bold text-accent uppercase tracking-widest mb-3 block">Tentang Kami</span>
            <h2 class="font-display text-3xl sm:text-4xl lg:text-5xl font-extrabold text-primary leading-tight mb-6 tracking-tight">
                Selamat Datang di <br><span class="text-accent">Jayra Construction</span>
            </h2>
            <p class="text-slate-500 font-light text-lg mb-8 leading-relaxed">
                Kami adalah perusahaan jasa konstruksi premium yang berkomitmen menghadirkan bangunan berkualitas, aman, estetik, dan selesai tepat waktu sesuai standar ekspektasi tertinggi Anda.
            </p>

            <ul class="space-y-4 mb-10">
                @foreach(['Perencanaan proyek terstruktur & transparan', 'Dikerjakan oleh tenaga ahli bersertifikasi', 'Material standar tinggi (Premium Quality)'] as $item)
                <li class="flex items-center gap-4 group">
                    <div class="flex-shrink-0 w-8 h-8 rounded-full bg-primary/5 flex items-center justify-center group-hover:bg-accent/20 transition-colors">
                        <svg class="w-5 h-5 text-primary group-hover:text-accent transition-colors" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M5 13l4 4L19 7"/></svg>
                    </div>
                    <span class="font-semibold text-primary">{{ $item }}</span>
                </li>
                @endforeach
            </ul>

            <a href="{{ route('user.about') }}" class="inline-flex items-center gap-2 text-primary font-bold text-[15px] hover:text-accent transition-colors group pb-1 border-b-2 border-transparent hover:border-accent">
                Pelajari Lebih Lanjut Profil Kami
                <svg class="w-5 h-5 group-hover:translate-x-2 transition-transform" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 8l4 4m0 0l-4 4m4-4H3"/></svg>
            </a>
        </div>
    </div>
</section>

{{-- ================= SERVICES ================= --}}
<section id="services" class="py-24 bg-surface relative border-y border-slate-100">
    <div class="max-w-7xl mx-auto px-6">
        
        <div class="text-center max-w-2xl mx-auto mb-16 reveal">
            <span class="text-xs font-bold text-accent uppercase tracking-widest mb-2 block">Keahlian Kami</span>
            <h2 class="font-display text-3xl sm:text-4xl lg:text-5xl font-extrabold text-primary mb-6 tracking-tight">Layanan Premium Kami</h2>
            <p class="text-slate-500 font-light text-lg">
                Menyediakan layanan konstruksi dan arsitektur kelas atas. Kami mewujudkan bangunan yang kuat, fungsional, dan bernilai seni tinggi.
            </p>
        </div>

        {{-- 🔥 FIX 1: Disesuaikan menjadi grid 2 kolom agar 4 layanan tampil rapi 2x2 🔥 --}}
        <div class="grid md:grid-cols-2 gap-8">
            @foreach([
                [
                    'icon' => 'M19 21V5a2 2 0 00-2-2H7a2 2 0 00-2 2v16m14 0h2m-2 0h-5m-9 0H3m2 0h5M9 7h1m-1 4h1m4-4h1m-1 4h1m-5 10v-5a1 1 0 011-1h2a1 1 0 011 1v5m-4 0h4', 
                    'title' => 'Konstruksi Bangunan', 
                    'desc' => 'Pembangunan rumah, ruko, perumahan, dan fasilitas komersial dari nol dengan standar sipil terbaik serta material berkualitas unggul.'
                ],
                [
                    'icon' => 'M14.7 6.3a1 1 0 0 0 0 1.4l1.6 1.6a1 1 0 0 0 1.4 0l3.77-3.77a6 6 0 0 1-7.94 7.94l-6.91 6.91a2.12 2.12 0 0 1-3-3l6.91-6.91a6 6 0 0 1 7.94-7.94l-3.76 3.76z', 
                    'title' => 'Renovasi & Perbaikan', 
                    'desc' => 'Peremajaan struktur, perbaikan fasad, penggantian atap, atau modifikasi tata ruang bangunan lama menjadi lebih modern dan aman.'
                ],
                [
                    'icon' => 'M4 5a1 1 0 011-1h14a1 1 0 011 1v2a1 1 0 01-1 1H5a1 1 0 01-1-1V5zM4 13a1 1 0 011-1h6a1 1 0 011 1v6a1 1 0 01-1 1H5a1 1 0 01-1-1v-6zM16 13a1 1 0 011-1h2a1 1 0 011 1v6a1 1 0 01-1 1h-2a1 1 0 01-1-1v-6z', 
                    'title' => 'Interior & Eksterior', 
                    'desc' => 'Perancangan furnitur custom, tata letak ruang dalam, hingga landscaping area luar untuk paduan sempurna antara estetika dan fungsi.'
                ],
                [
                    'icon' => 'M9 17v-2m3 2v-4m3 4v-6m2 10H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z', 
                    'title' => 'Arsitektur & Sipil', 
                    'desc' => 'Konsultasi desain bangunan, pembuatan blueprint arsitektur, perhitungan Rencana Anggaran Biaya (RAB), hingga manajemen proyek konstruksi.'
                ]
            ] as $i => $svc)
            <div class="bg-white rounded-[2rem] p-8 lg:p-10 shadow-[0_10px_40px_-10px_rgba(16,55,92,0.08)] hover:-translate-y-2 hover:shadow-2xl transition-all duration-300 reveal delay-{{ ($i + 1) * 100 }} group border border-slate-100 flex flex-col h-full">
                <div class="w-16 h-16 bg-primary/5 rounded-2xl flex items-center justify-center mb-8 group-hover:bg-primary transition-colors duration-300">
                    <svg class="w-8 h-8 text-primary group-hover:text-white transition-colors" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="{{ $svc['icon'] }}"/></svg>
                </div>
                <h3 class="font-display text-xl font-bold text-primary mb-4">{{ $svc['title'] }}</h3>
                <p class="text-slate-500 text-sm leading-relaxed mb-8 flex-grow">{{ $svc['desc'] }}</p>
                
                {{-- ID sesuaikan dengan ID di tabel layanan nanti jika perlu, sementar pakai 1 --}}
                <a href="{{ route('user.service',) }}" class="text-sm font-semibold text-primary group-hover:text-accent flex items-center gap-2 transition-colors mt-auto">
                    Info Detail <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 8l4 4m0 0l-4 4m4-4H3"/></svg>
                </a>
            </div>
            @endforeach
        </div>
    </div>
</section>

{{-- ================= PROJECTS ================= --}}
{{-- ================= PROJECTS ================= --}}
<section id="projects" class="py-24 bg-white">
    <div class="max-w-7xl mx-auto px-6">
        
        <div class="flex flex-col md:flex-row justify-between items-end mb-12 reveal">
            <div class="max-w-2xl">
                <h2 class="font-display text-3xl sm:text-4xl lg:text-5xl font-extrabold text-primary mb-4 tracking-tight">Karya Terbaik Kami</h2>
                <p class="text-slate-500 font-light text-lg">Inspirasi mahakarya konstruksi dari berbagai portofolio eksklusif yang telah sukses kami selesaikan.</p>
            </div>
            <a href="{{ route('user.project') }}" class="hidden md:flex items-center gap-2 text-primary font-bold hover:text-accent transition-colors pb-1 border-b-2 border-transparent hover:border-accent mt-4 md:mt-0">
                Lihat Semua Project <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M14 5l7 7m0 0l-7 7m7-7H3"/></svg>
            </a>
        </div>

        <div class="grid grid-cols-1 md:grid-cols-4 grid-rows-2 gap-4 h-auto md:h-[600px] reveal delay-200">
            
            {{-- CEK APAKAH ADA DATA PROYEK DI DATABASE --}}
            @if(isset($projects) && $projects->count() > 0)
                
                {{-- Ambil maksimal 3 proyek terbaru aja biar layoutnya gak rusak --}}
                @foreach($projects->take(3) as $project)
                    @php
                        // Logika CSS Grid: Kotak 1 Besar, Kotak 2 Panjang, Kotak 3 Kecil
                        $gridClass = '';
                        $paddingClass = 'p-6';
                        $titleClass = 'text-xl';

                        if($loop->index == 0) {
                            $gridClass = 'md:col-span-2 md:row-span-2'; // Paling Besar
                            $paddingClass = 'p-8';
                            $titleClass = 'text-2xl';
                        } elseif($loop->index == 1) {
                            $gridClass = 'md:col-span-2 md:row-span-1'; // Horizontal Panjang
                        } elseif($loop->index == 2) {
                            $gridClass = 'md:col-span-1 md:row-span-1'; // Kotak Kecil
                        }
                    @endphp

                    <a href="{{ route('user.project') }}" class="{{ $gridClass }} rounded-[2rem] overflow-hidden group relative cursor-pointer block">
                        {{-- Cek apakah gambar ada, kalau tidak pakai gambar default --}}
                        <img src="{{ $project->image ? asset('storage/' . $project->image) : 'https://images.unsplash.com/photo-1600596542815-ffad4c1539a9?auto=format&fit=crop' }}" 
                             class="w-full h-full object-cover group-hover:scale-110 transition-transform duration-700" 
                             alt="{{ $project->judul ?? $project->title ?? 'Project' }}">
                        
                        <div class="absolute inset-0 bg-gradient-to-t from-primary/90 via-primary/20 to-transparent opacity-0 group-hover:opacity-100 transition-opacity duration-300"></div>
                        
                        <div class="absolute bottom-0 left-0 {{ $paddingClass }} translate-y-8 opacity-0 group-hover:translate-y-0 group-hover:opacity-100 transition-all duration-300">
                            <span class="text-accent font-bold text-xs uppercase tracking-widest mb-1 block">
                                {{ $project->category }} 
                            </span>
                            
                           
                            <h3 class="text-white font-display {{ $titleClass }} font-bold">
                                {{ $project->name }}
                            </h3>
                        </div>
                    </a>
                @endforeach

            @else
                {{-- JIKA DATABASE KOSONG, TAMPILKAN PLACEHOLDER INI --}}
                <div class="md:col-span-3 md:row-span-2 flex items-center justify-center bg-slate-50 rounded-[2rem] border-2 border-dashed border-slate-200">
                    <p class="text-slate-400 font-medium">Belum ada data proyek di database.</p>
                </div>
            @endif

            {{-- KOTAK KE-4: Tombol Lihat Semua Galeri (Tetap Statis di Pojok Kanan Bawah) --}}
            <a href="{{ route('user.project') }}" class="md:col-span-1 md:row-span-1 rounded-[2rem] overflow-hidden group relative cursor-pointer bg-primary flex items-center justify-center">
                <div class="text-center group-hover:scale-105 transition-transform duration-300 p-6">
                    <div class="w-12 h-12 rounded-full border border-accent text-accent flex items-center justify-center mx-auto mb-3">
                        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4"/></svg>
                    </div>
                    <h3 class="text-white font-display text-lg font-bold">Lihat Semua Galeri</h3>
                </div>
            </a>
            
        </div>

        <a href="{{ route('user.project') }}" class="md:hidden mt-8 w-full flex items-center justify-center gap-2 bg-primary text-white font-bold py-4 rounded-xl hover:bg-primaryDark transition-colors">
            Lihat Semua Project <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M14 5l7 7m0 0l-7 7m7-7H3"/></svg>
        </a>
    </div>
</section>

{{-- ================= CONTACT / WA DIRECT CTA ================= --}}
<section id="contact" class="py-24 bg-primary relative overflow-hidden">
    <div class="absolute inset-0 bg-[url('https://www.transparenttextures.com/patterns/cubes.png')] opacity-5"></div>
    <div class="absolute top-0 right-0 w-[500px] h-[500px] bg-accent/10 rounded-full blur-[100px]"></div>
    <div class="absolute bottom-0 left-0 w-[400px] h-[400px] bg-white/5 rounded-full blur-[80px]"></div>

    <div class="max-w-7xl mx-auto px-6 grid lg:grid-cols-2 gap-16 lg:gap-20 relative z-10 items-center">
        
        {{-- Info Kontak Kiri --}}
        <div class="reveal reveal-left flex flex-col justify-center">
            <span class="text-accent font-bold tracking-widest uppercase text-sm mb-4">Butuh Bantuan?</span>
            <h2 class="font-display text-4xl sm:text-5xl font-extrabold text-white leading-tight mb-8">
                Mari Diskusikan Proyek Impian Anda.
            </h2>
            <p class="text-slate-300 font-light text-lg mb-12 max-w-lg">
                Tim ahli kami selalu terbuka untuk berdiskusi, memberikan konsultasi awal, dan merencanakan langkah terbaik untuk konstruksi Anda.
            </p>

            <div class="space-y-6">
                @foreach([
                    ['icon' => 'M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0zM15 11a3 3 0 11-6 0 3 3 0 016 0z', 'title' => 'Kantor Pusat', 'text' => 'Desa Pejurukan, RT02/RW01, Kec. Kalibagor, Banyumas, Jawa Tengah 53191'],
                    ['icon' => 'M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z', 'title' => 'Alamat Email', 'text' => 'cv.darmingjayagrup@gmail.com'],
                    ['icon' => 'M3 5a2 2 0 012-2h3.28a1 1 0 01.948.684l1.498 4.493a1 1 0 01-.502 1.21l-2.257 1.13a11.042 11.042 0 005.516 5.516l1.13-2.257a1 1 0 011.21-.502l4.493 1.498a1 1 0 01.684.949V19a2 2 0 01-2 2h-1C9.716 21 3 14.284 3 6V5z', 'title' => 'Layanan Telepon', 'text' => '+62 857-7236-4659'],
                ] as $contact)
                <div class="flex items-start gap-5 group cursor-pointer">
                    <div class="w-12 h-12 rounded-xl bg-white/10 flex items-center justify-center text-accent group-hover:bg-accent group-hover:text-primary transition-all duration-300 flex-shrink-0 mt-0.5">
                        <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="{{ $contact['icon'] }}"/></svg>
                    </div>
                    <div>
                        <h4 class="text-white font-semibold mb-1 text-lg">{{ $contact['title'] }}</h4>
                        <p class="text-slate-400 text-sm leading-relaxed group-hover:text-slate-300 transition-colors">{{ $contact['text'] }}</p>
                    </div>
                </div>
                @endforeach
            </div>
        </div>

        {{-- 🔥 FIX 2: Ganti Formulir Ribet Menjadi Card WA Direct Fast Response 🔥 --}}
        <div class="reveal reveal-right delay-200">
            <div class="bg-white rounded-[2rem] p-8 sm:p-12 shadow-2xl flex flex-col items-center text-center relative overflow-hidden">
                {{-- Aksen Latar Estetik --}}
                <div class="absolute -top-12 -right-12 w-32 h-32 bg-green-50 rounded-full blur-2xl"></div>
                
                <div class="w-20 h-20 bg-green-50 text-[#25D366] rounded-2xl flex items-center justify-center mb-6 shadow-sm rotate-3">
                    <svg class="w-10 h-10" fill="currentColor" viewBox="0 0 24 24">
                        <path d="M17.472 14.382c-.297-.149-1.758-.867-2.03-.967-.273-.099-.471-.148-.67.15-.197.297-.767.966-.94 1.164-.173.199-.347.223-.644.075-.297-.15-1.255-.463-2.39-1.475-.883-.788-1.48-1.761-1.653-2.059-.173-.297-.018-.458.13-.606.134-.133.298-.347.446-.52.149-.174.198-.298.298-.497.099-.198.05-.371-.025-.52-.075-.149-.669-1.612-.916-2.207-.242-.579-.487-.5-.669-.51-.173-.008-.371-.01-.57-.01a1.05 1.05 0 00-.768.356c-.297.322-1.138 1.114-1.138 2.716 0 1.602 1.165 3.153 1.328 3.37.163.22 2.298 3.504 5.568 4.908.777.34 1.383.543 1.854.694.78.347 1.492.298 2.053.18.625-.13 1.758-.718 2.006-1.413.248-.694.248-1.289.173-1.413-.074-.124-.272-.198-.57-.347m-5.421 7.403h-.004a9.87 9.87 0 01-5.031-1.378l-.361-.214-3.741.982.998-3.648-.235-.374a9.86 9.86 0 01-1.51-5.26c.001-5.45 4.436-9.884 9.888-9.884 2.64 0 5.122 1.03 6.988 2.898a9.825 9.825 0 012.893 6.994c-.003 5.45-4.437 9.884-9.885 9.884m8.413-18.297A11.815 11.815 0 0012.05 0C5.495 0 .16 5.335.157 11.892c0 2.096.547 4.142 1.588 5.945L.057 24l6.305-1.654a11.882 11.882 0 005.683 1.448h.005c6.554 0 11.89-5.335 11.893-11.893a11.821 11.821 0 00-3.48-8.413z"/>
                    </svg>
                </div>
                
                <h3 class="font-display text-2xl lg:text-3xl font-bold text-primary mb-3 relative z-10">Tanya Jawab Cepat <br> via WhatsApp</h3>
                
                <p class="text-slate-500 font-light leading-relaxed mb-10 relative z-10">
                    Katakan selamat tinggal pada formulir yang merepotkan. Tim admin profesional kami siap merespon pertanyaan Anda secara instan kapan saja.
                </p>

                <a href="https://wa.me/6285772364659" target="_blank" class="w-full bg-[#25D366] text-white py-4 px-8 rounded-xl font-bold text-[15px] hover:bg-[#128C7E] hover:-translate-y-1 hover:shadow-xl hover:shadow-[#25D366]/30 transition-all duration-300 flex items-center justify-center gap-3 relative z-10">
                    <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 24 24"><path d="M17.472 14.382c-.297-.149-1.758-.867-2.03-.967-.273-.099-.471-.148-.67.15-.197.297-.767.966-.94 1.164-.173.199-.347.223-.644.075-.297-.15-1.255-.463-2.39-1.475-.883-.788-1.48-1.761-1.653-2.059-.173-.297-.018-.458.13-.606.134-.133.298-.347.446-.52.149-.174.198-.298.298-.497.099-.198.05-.371-.025-.52-.075-.149-.669-1.612-.916-2.207-.242-.579-.487-.5-.669-.51-.173-.008-.371-.01-.57-.01a1.05 1.05 0 00-.768.356c-.297.322-1.138 1.114-1.138 2.716 0 1.602 1.165 3.153 1.328 3.37.163.22 2.298 3.504 5.568 4.908.777.34 1.383.543 1.854.694.78.347 1.492.298 2.053.18.625-.13 1.758-.718 2.006-1.413.248-.694.248-1.289.173-1.413-.074-.124-.272-.198-.57-.347m-5.421 7.403h-.004a9.87 9.87 0 01-5.031-1.378l-.361-.214-3.741.982.998-3.648-.235-.374a9.86 9.86 0 01-1.51-5.26c.001-5.45 4.436-9.884 9.888-9.884 2.64 0 5.122 1.03 6.988 2.898a9.825 9.825 0 012.893 6.994c-.003 5.45-4.437 9.884-9.885 9.884m8.413-18.297A11.815 11.815 0 0012.05 0C5.495 0 .16 5.335.157 11.892c0 2.096.547 4.142 1.588 5.945L.057 24l6.305-1.654a11.882 11.882 0 005.683 1.448h.005c6.554 0 11.89-5.335 11.893-11.893a11.821 11.821 0 00-3.48-8.413z"/></svg>
                    Chat WA Sekarang
                </a>

                <div class="mt-8 flex flex-wrap justify-center gap-x-6 gap-y-3 text-sm font-semibold text-slate-600 relative z-10">
                    <div class="flex items-center gap-2"><svg class="w-5 h-5 text-accent" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"></path></svg> Respon Cepat</div>
                    <div class="flex items-center gap-2"><svg class="w-5 h-5 text-accent" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"></path></svg> Gratis Konsultasi</div>
                </div>

            </div>
        </div>
    </div>
</section>

@endsection