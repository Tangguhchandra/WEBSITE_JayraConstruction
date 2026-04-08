@extends('user.layouts.main')

@section('title', 'Profile - Jayra Construction')

@section('content')

{{-- ================= HERO ABOUT ================= --}}
<section class="relative pt-36 pb-24 lg:pt-44 lg:pb-32 overflow-hidden bg-pattern">
    <div class="absolute top-20 right-0 w-[400px] h-[400px] bg-primary/5 rounded-full blur-[100px] pointer-events-none"></div>
    <div class="absolute bottom-0 left-[-10%] w-[300px] h-[300px] bg-accent/10 rounded-full blur-[80px] pointer-events-none"></div>

    <div class="max-w-7xl mx-auto px-6 grid md:grid-cols-2 gap-12 lg:gap-16 items-center relative z-10">
        
        <div class="reveal reveal-left">
            <div class="inline-flex items-center gap-2 px-4 py-2 rounded-full bg-accent/10 border border-accent/20 mb-6">
                <span class="w-2 h-2 rounded-full bg-accent"></span>
                <span class="text-xs font-bold text-primary uppercase tracking-widest">Tentang Kami</span>
            </div>
            
            <h1 class="font-display text-4xl sm:text-5xl lg:text-[56px] font-extrabold text-primary leading-tight mb-6 tracking-tight">
                Siapa Kami?
            </h1>
            
            <p class="text-slate-500 font-light text-lg leading-relaxed mb-8">
                <strong class="font-semibold text-primary">{{ $profile->company_name ?? 'CV. DARMING JAYA ABADI' }}</strong> 
                {{ $profile->about_description ?? 'adalah perusahaan konstruksi yang berlokasi di Kab. Banyumas, Indonesia. Berdiri sejak lama, kami telah menjadi pionir unggulan di industri konstruksi dengan keahlian khusus dalam pengembangan infrastruktur dan pembangunan komersial berkapasitas besar.' }}
            </p>

            <div class="flex gap-4 items-center">
                <div class="flex flex-col border-l-2 border-accent pl-4">
                    <span class="font-display font-bold text-3xl text-primary">{{ $profile->experience_years ?? '15+' }}</span>
                    <span class="text-xs font-medium text-slate-400 uppercase tracking-wider">Tahun Pengalaman</span>
                </div>
                <div class="flex flex-col border-l-2 border-slate-200 pl-4">
                    <span class="font-display font-bold text-3xl text-primary">{{ $profile->projects_completed ?? '200+' }}</span>
                    <span class="text-xs font-medium text-slate-400 uppercase tracking-wider">Proyek Selesai</span>
                </div>
            </div>
        </div>

        <div class="reveal reveal-right delay-200 flex justify-center md:justify-end">
            <div class="relative w-[300px] h-[300px] sm:w-[400px] sm:h-[400px]">
                <div class="absolute inset-0 border-[3px] border-dashed border-primary/20 rounded-full animate-spin-slow"></div>
                <div class="absolute inset-4 border-2 border-accent/40 rounded-full"></div>
                
                <div class="absolute inset-6 rounded-full overflow-hidden shadow-2xl group cursor-pointer border-4 border-white bg-slate-100">
                    <img src="{{ $profile->about_image ? asset('storage/' . $profile->about_image) : 'https://images.unsplash.com/photo-1541888086425-d81bb19240f5?q=80&w=2070&auto=format&fit=crop' }}" 
                         alt="Tim Konstruksi" 
                         class="w-full h-full object-cover group-hover:scale-110 transition-transform duration-700">
                    <div class="absolute inset-0 bg-primary/20 opacity-0 group-hover:opacity-100 transition-opacity duration-300"></div>
                </div>
                
                <div class="absolute -bottom-4 right-10 bg-white p-4 rounded-2xl shadow-xl flex items-center gap-3">
                    <div class="w-10 h-10 bg-accent rounded-full flex items-center justify-center text-primary">
                        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"/></svg>
                    </div>
                    <p class="text-sm font-bold text-primary leading-tight">Terpercaya &<br>Profesional</p>
                </div>
            </div>
        </div>

    </div>
</section>

{{-- ================= OUR PROJECT (Bisa disambungkan ke database proyek nanti) ================= --}}
<section class="py-24 bg-primary relative overflow-hidden rounded-t-[3rem] sm:rounded-t-[4rem]">
    <div class="absolute inset-0 bg-[url('https://www.transparenttextures.com/patterns/cubes.png')] opacity-5"></div>
    
    <div class="max-w-6xl mx-auto px-6 relative z-10 text-center">
        
        <h2 class="font-display text-3xl sm:text-4xl lg:text-5xl font-extrabold text-white mb-6 tracking-tight reveal">Proyek Kami</h2>
        <p class="text-slate-300 font-light text-lg max-w-2xl mx-auto mb-16 reveal delay-100">
            Berikut adalah beberapa proyek yang telah kami kerjakan sebagai wujud komitmen dalam menghadirkan kualitas, ketepatan, dan kepuasan klien di setiap pembangunan.
        </p>

        <div class="grid grid-cols-1 md:grid-cols-3 gap-4 md:gap-6 auto-rows-[200px] md:auto-rows-[240px] reveal delay-200">
        @forelse($projects as $index => $project)
            {{-- Kotak pertama dibikin lebih besar (2 baris) sesuai desainmu --}}
            <div class="group relative overflow-hidden bg-slate-800 shadow-xl cursor-pointer
                {{ $index == 0 ? 'md:col-span-1 md:row-span-2 rounded-[2rem]' : 'rounded-[1.5rem]' }}">
                
                <img src="{{ asset('storage/' . $project->image) }}" 
                    alt="{{ $project->title }}" 
                    class="w-full h-full object-cover group-hover:scale-110 transition-transform duration-700 opacity-90 group-hover:opacity-100"
                    onerror="this.src='https://images.unsplash.com/photo-1600596542815-ffad4c1539a9?q=80&w=2075&auto=format&fit=crop'">
                
                <div class="absolute inset-0 bg-gradient-to-t from-primary/90 via-primary/20 to-transparent opacity-0 group-hover:opacity-100 transition-opacity duration-300"></div>
                
                {{-- Tambahan Teks Muncul Saat Di-Hover --}}
                <div class="absolute bottom-0 left-0 w-full p-6 translate-y-4 group-hover:translate-y-0 opacity-0 group-hover:opacity-100 transition-all duration-300">
                    <h3 class="text-white font-bold text-lg mb-1">{{ $project->title }}</h3>
                    <span class="inline-block px-3 py-1 bg-accent text-primary text-[10px] font-bold uppercase tracking-wider rounded-full">{{ $project->category ?? 'Konstruksi' }}</span>
                </div>
            </div>
        @empty
            {{-- Fallback jika database proyek masih kosong --}}
            <div class="md:col-span-3 text-center py-10 bg-white/5 rounded-[2rem] border border-white/10">
                <p class="text-slate-300">Belum ada portofolio proyek yang diunggah.</p>
            </div>
        @endforelse

    </div>

        <div class="mt-12 flex justify-end reveal delay-300">
            <a href="{{ route('user.project') }}" class="inline-flex items-center gap-2 px-8 py-3.5 bg-white text-primary font-bold text-[14px] rounded-xl hover:bg-accent hover:text-white hover:-translate-y-1 hover:shadow-lg transition-all duration-300 group">
                Lihat Proyek Lainnya
                <svg class="w-4 h-4 group-hover:translate-x-1 transition-transform" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M14 5l7 7m0 0l-7 7m7-7H3"/></svg>
            </a>
        </div>

    </div>
</section>

{{-- ================= VISI & MISI ================= --}}
<section class="py-24 bg-surface relative overflow-hidden">
    <div class="absolute top-1/2 left-0 w-64 h-64 bg-accent/5 rounded-full blur-[60px] pointer-events-none"></div>

    <div class="max-w-4xl mx-auto px-6">
        
        <div class="text-center mb-16 reveal">
            <h2 class="font-display text-3xl sm:text-4xl lg:text-5xl font-extrabold text-primary mb-6 tracking-tight">Visi & Misi</h2>
            <p class="text-slate-500 font-light text-lg">
                {{ $profile->company_name ?? 'CV Darming' }} adalah perusahaan yang bergerak di bidang jasa konstruksi, desain interior, dan eksterior yang berkomitmen menghadirkan kualitas, ketepatan, serta kepercayaan.
            </p>
        </div>

        <div class="flex flex-col gap-8 reveal delay-100">
            
            {{-- VISI --}}
            <div class="relative bg-white p-8 md:p-12 rounded-[2rem] shadow-[0_15px_40px_-15px_rgba(16,55,92,0.1)] border border-slate-100 group hover:-translate-y-1 transition-transform duration-300">
                <div class="absolute top-6 right-8 text-slate-100 text-6xl font-display font-black leading-none group-hover:text-accent/20 transition-colors duration-300">"</div>
                
                <div class="flex items-center gap-4 mb-6">
                    <div class="w-10 h-10 bg-accent rounded-xl flex items-center justify-center text-primary shadow-sm">
                        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"/><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z"/></svg>
                    </div>
                    <h3 class="font-display text-2xl font-bold text-primary">Visi Kami</h3>
                </div>
                
                <p class="text-slate-600 font-medium text-lg leading-relaxed relative z-10">
                    {{ $profile->vision ?? 'Menjadi perusahaan yang tumbuh dan berkembang secara berkelanjutan dengan mengedepankan kapasitas, loyalitas, serta profesionalitas sesuai dengan bidang keahliannya.' }}
                </p>
            </div>

            {{-- MISI --}}
            <div class="relative bg-primary p-8 md:p-12 rounded-[2rem] shadow-2xl overflow-hidden group hover:-translate-y-1 transition-transform duration-300">
                <div class="absolute -right-10 -bottom-10 w-48 h-48 bg-white/5 rounded-full pointer-events-none group-hover:scale-125 transition-transform duration-700"></div>
                
                <div class="flex items-center gap-4 mb-8 relative z-10">
                    <div class="w-10 h-10 bg-white/10 rounded-xl flex items-center justify-center text-accent backdrop-blur-sm">
                        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 10V3L4 14h7v7l9-11h-7z"/></svg>
                    </div>
                    <h3 class="font-display text-2xl font-bold text-white">Misi Kami</h3>
                </div>

                <ul class="space-y-4 relative z-10">
                    @if($profile->mission)
                        {{-- Memecah teks misi berdasarkan baris baru (enter) --}}
                        @php
                            $missions = explode("\n", str_replace("\r", "", $profile->mission));
                            $count = 1;
                        @endphp
                        
                        @foreach($missions as $misi)
                            @if(trim($misi) != '')
                            <li class="flex items-start gap-4">
                                <span class="flex-shrink-0 w-6 h-6 rounded-full bg-accent text-primary text-xs font-bold flex items-center justify-center mt-0.5">{{ $count++ }}</span>
                                <p class="text-slate-300 font-light leading-relaxed">{{ trim($misi) }}</p>
                            </li>
                            @endif
                        @endforeach
                    @else
                        {{-- Fallback jika belum ada Misi --}}
                        <li class="flex items-start gap-4">
                            <span class="flex-shrink-0 w-6 h-6 rounded-full bg-accent text-primary text-xs font-bold flex items-center justify-center mt-0.5">1</span>
                            <p class="text-slate-300 font-light leading-relaxed">Menciptakan dan menyediakan lapangan pekerjaan guna mendukung peningkatan kesejahteraan masyarakat.</p>
                        </li>
                    @endif
                </ul>
            </div>

        </div>
    </div>
</section>

@endsection