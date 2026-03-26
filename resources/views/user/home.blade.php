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
            <h2 class="font-display text-3xl sm:text-4xl lg:text-5xl font-extrabold text-primary mb-6 tracking-tight">Our Premium Services</h2>
            <p class="text-slate-500 font-light text-lg">
                Menyediakan layanan konstruksi dan arsitektur kelas atas. Kami mewujudkan bangunan yang kuat, fungsional, dan bernilai seni tinggi.
            </p>
        </div>

        <div class="grid md:grid-cols-3 gap-8">
            @foreach([
                ['icon' => 'M3 12l2-2m0 0l7-7 7 7M5 10v10a1 1 0 001 1h3m10-11l2 2m-2-2v10a1 1 0 01-1 1h-3m-6 0a1 1 0 001-1v-4a1 1 0 011-1h2a1 1 0 011 1v4a1 1 0 001 1m-6 0h6', 'title' => 'Renovasi Rumah', 'desc' => 'Transformasi hunian lama Anda menjadi ruang hidup modern dengan desain efisien dan struktur yang diperbarui secara total.'],
                ['icon' => 'M19 21V5a2 2 0 00-2-2H7a2 2 0 00-2 2v16m14 0h2m-2 0h-5m-9 0H3m2 0h5M9 7h1m-1 4h1m4-4h1m-1 4h1m-5 10v-5a1 1 0 011-1h2a1 1 0 011 1v5m-4 0h4', 'title' => 'Pembangunan Baru', 'desc' => 'Membangun gedung, perumahan, atau fasilitas komersial dari titik nol dengan pengawasan ketat dan manajemen waktu presisi.'],
                ['icon' => 'M4 5a1 1 0 011-1h14a1 1 0 011 1v2a1 1 0 01-1 1H5a1 1 0 01-1-1V5zM4 13a1 1 0 011-1h6a1 1 0 011 1v6a1 1 0 01-1 1H5a1 1 0 01-1-1v-6zM16 13a1 1 0 011-1h2a1 1 0 011 1v6a1 1 0 01-1 1h-2a1 1 0 01-1-1v-6z', 'title' => 'Desain Interior', 'desc' => 'Layanan arsitektur interior untuk menciptakan atmosfer ruangan yang mewah, fungsional, selaras dengan gaya hidup masa kini.'],
            ] as $i => $svc)
            <div class="bg-white rounded-[2rem] p-8 lg:p-10 shadow-[0_10px_40px_-10px_rgba(16,55,92,0.08)] hover:-translate-y-2 hover:shadow-2xl transition-all duration-300 reveal delay-{{ ($i + 1) * 100 }} group border border-slate-100">
                <div class="w-16 h-16 bg-primary/5 rounded-2xl flex items-center justify-center mb-8 group-hover:bg-primary transition-colors duration-300">
                    <svg class="w-8 h-8 text-primary group-hover:text-white transition-colors" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="{{ $svc['icon'] }}"/></svg>
                </div>
                <h3 class="font-display text-xl font-bold text-primary mb-4">{{ $svc['title'] }}</h3>
                <p class="text-slate-500 text-sm leading-relaxed mb-8">{{ $svc['desc'] }}</p>
                <a href="{{ route('user.detail-service') }}" class="text-sm font-semibold text-primary group-hover:text-accent flex items-center gap-2 transition-colors">
                    Info Detail <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 8l4 4m0 0l-4 4m4-4H3"/></svg>
                </a>
            </div>
            @endforeach
        </div>
    </div>
</section>

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
            
            <a href="{{ route('user.project') }}" class="md:col-span-2 md:row-span-2 rounded-[2rem] overflow-hidden group relative cursor-pointer block">
                <img src="https://images.unsplash.com/photo-1600596542815-ffad4c1539a9?q=80&w=2075&auto=format&fit=crop" class="w-full h-full object-cover group-hover:scale-110 transition-transform duration-700" alt="Luxury Villa">
                <div class="absolute inset-0 bg-gradient-to-t from-primary/90 via-primary/20 to-transparent opacity-0 group-hover:opacity-100 transition-opacity duration-300"></div>
                <div class="absolute bottom-0 left-0 p-8 translate-y-8 opacity-0 group-hover:translate-y-0 group-hover:opacity-100 transition-all duration-300">
                    <span class="text-accent font-bold text-xs uppercase tracking-widest mb-2 block">Residential</span>
                    <h3 class="text-white font-display text-2xl font-bold">Modern Luxury Villa</h3>
                </div>
            </a>

            <a href="{{ route('user.project') }}" class="md:col-span-2 md:row-span-1 rounded-[2rem] overflow-hidden group relative cursor-pointer block">
                <img src="https://images.unsplash.com/photo-1486406146926-c627a92ad1ab?q=80&w=2070&auto=format&fit=crop" class="w-full h-full object-cover group-hover:scale-110 transition-transform duration-700" alt="Office Tower">
                <div class="absolute inset-0 bg-gradient-to-t from-primary/90 via-primary/20 to-transparent opacity-0 group-hover:opacity-100 transition-opacity duration-300"></div>
                <div class="absolute bottom-0 left-0 p-6 translate-y-6 opacity-0 group-hover:translate-y-0 group-hover:opacity-100 transition-all duration-300">
                    <span class="text-accent font-bold text-xs uppercase tracking-widest mb-1 block">Commercial</span>
                    <h3 class="text-white font-display text-xl font-bold">Skyline Office Tower</h3>
                </div>
            </a>

            <a href="{{ route('user.project') }}" class="md:col-span-1 md:row-span-1 rounded-[2rem] overflow-hidden group relative cursor-pointer block">
                <img src="https://images.unsplash.com/photo-1600585154340-be6161a56a0c?q=80&w=2070&auto=format&fit=crop" class="w-full h-full object-cover group-hover:scale-110 transition-transform duration-700" alt="Interior">
                <div class="absolute inset-0 bg-gradient-to-t from-primary/90 via-transparent to-transparent opacity-0 group-hover:opacity-100 transition-opacity duration-300"></div>
                <div class="absolute bottom-0 left-0 p-6 translate-y-6 opacity-0 group-hover:translate-y-0 group-hover:opacity-100 transition-all duration-300">
                    <h3 class="text-white font-display text-lg font-bold">Interior Set</h3>
                </div>
            </a>

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

{{-- ================= CONSULTATION CTA ================= --}}
<section id="contact" class="py-24 bg-primary relative overflow-hidden">
    <div class="absolute inset-0 bg-[url('https://www.transparenttextures.com/patterns/cubes.png')] opacity-5"></div>
    <div class="absolute top-0 right-0 w-[500px] h-[500px] bg-accent/10 rounded-full blur-[100px]"></div>
    <div class="absolute bottom-0 left-0 w-[400px] h-[400px] bg-white/5 rounded-full blur-[80px]"></div>

    <div class="max-w-7xl mx-auto px-6 grid lg:grid-cols-2 gap-16 lg:gap-20 relative z-10">
        
        <div class="reveal reveal-left flex flex-col justify-center">
            <span class="text-accent font-bold tracking-widest uppercase text-sm mb-4">Mari Berdiskusi</span>
            <h2 class="font-display text-4xl sm:text-5xl lg:text-[52px] font-extrabold text-white leading-tight mb-8">
                Jadwalkan Konsultasi Anda Hari Ini.
            </h2>
            <p class="text-slate-300 font-light text-lg mb-12 max-w-lg">
                Tim ahli kami siap mendengarkan visi Anda dan memberikan solusi arsitektur serta konstruksi yang komprehensif.
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

        <div class="reveal reveal-right delay-200">
            <div class="bg-white rounded-[2rem] p-8 sm:p-10 shadow-2xl">
                <h3 class="font-display text-2xl font-bold text-primary mb-2">Kirim Pesan Langsung</h3>
                <p class="text-sm text-slate-500 mb-8 font-light">Isi detail di bawah ini, tim kami akan merespon kurang dari 24 jam.</p>
                
                <form action="#" method="POST" class="space-y-5">
                    @csrf
                    @foreach([
                        ['label' => 'Nama Lengkap', 'name' => 'name', 'type' => 'text', 'placeholder' => 'John Doe', 'icon' => 'M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z'],
                        ['label' => 'Email Aktif', 'name' => 'email', 'type' => 'email', 'placeholder' => 'mail@contoh.com', 'icon' => 'M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z'],
                    ] as $field)
                    <div class="space-y-1.5">
                        <label class="text-xs font-semibold text-slate-500 uppercase tracking-wider ml-1">{{ $field['label'] }}</label>
                        <div class="relative group">
                            <div class="absolute inset-y-0 left-0 pl-4 flex items-center pointer-events-none text-slate-400 group-focus-within:text-primary transition-colors">
                                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="{{ $field['icon'] }}"/></svg>
                            </div>
                            <input type="{{ $field['type'] }}" name="{{ $field['name'] }}" required class="w-full pl-12 pr-4 py-3.5 rounded-xl border border-slate-200 bg-slate-50 text-primary text-sm font-medium focus:bg-white focus:border-primary focus:ring-4 focus:ring-primary/10 transition-all outline-none" placeholder="{{ $field['placeholder'] }}">
                        </div>
                    </div>
                    @endforeach

                    <div class="space-y-1.5">
                        <label class="text-xs font-semibold text-slate-500 uppercase tracking-wider ml-1">Deskripsi Proyek</label>
                        <div class="relative group">
                            <div class="absolute top-4 left-0 pl-4 flex items-start pointer-events-none text-slate-400 group-focus-within:text-primary transition-colors">
                                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z"/></svg>
                            </div>
                            <textarea name="message" rows="4" required class="w-full pl-12 pr-4 py-3.5 rounded-xl border border-slate-200 bg-slate-50 text-primary text-sm font-medium focus:bg-white focus:border-primary focus:ring-4 focus:ring-primary/10 transition-all outline-none resize-none" placeholder="Jelaskan kebutuhan konstruksi Anda..."></textarea>
                        </div>
                    </div>

                    <div class="pt-2">
                        <button type="submit" class="w-full bg-primary text-white py-4 rounded-xl font-bold text-[14px] hover:bg-primaryDark hover:-translate-y-1 hover:shadow-lg hover:shadow-primary/30 transition-all duration-300 flex items-center justify-center gap-2">
                            Kirim Pesan Sekarang
                            <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 19l9 2-9-18-9 18 9-2zm0 0v-8"/></svg>
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</section>

@endsection