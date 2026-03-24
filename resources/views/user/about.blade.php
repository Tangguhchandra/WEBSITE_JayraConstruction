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
                <span class="text-xs font-bold text-primary uppercase tracking-widest">About Us</span>
            </div>
            
            <h1 class="font-display text-4xl sm:text-5xl lg:text-[56px] font-extrabold text-primary leading-tight mb-6 tracking-tight">
                Siapa Kami?
            </h1>
            
            <p class="text-slate-500 font-light text-lg leading-relaxed mb-8">
                <strong class="font-semibold text-primary">CV. DARMING JAYA ABADI</strong> adalah perusahaan konstruksi yang berlokasi di Kab. Banyumas, Indonesia. Berdiri sejak lama, CV. DARMING JAYA ABADI telah menjadi pionir unggulan di industri konstruksi dengan keahlian khusus dalam pengembangan infrastruktur dan pembangunan komersial berkapasitas besar.
            </p>

            <div class="flex gap-4 items-center">
                <div class="flex flex-col border-l-2 border-accent pl-4">
                    <span class="font-display font-bold text-3xl text-primary">15+</span>
                    <span class="text-xs font-medium text-slate-400 uppercase tracking-wider">Tahun Pengalaman</span>
                </div>
                <div class="flex flex-col border-l-2 border-slate-200 pl-4">
                    <span class="font-display font-bold text-3xl text-primary">200+</span>
                    <span class="text-xs font-medium text-slate-400 uppercase tracking-wider">Proyek Selesai</span>
                </div>
            </div>
        </div>

        <div class="reveal reveal-right delay-200 flex justify-center md:justify-end">
            <div class="relative w-[300px] h-[300px] sm:w-[400px] sm:h-[400px]">
                <div class="absolute inset-0 border-[3px] border-dashed border-primary/20 rounded-full animate-spin-slow"></div>
                <div class="absolute inset-4 border-2 border-accent/40 rounded-full"></div>
                
                <div class="absolute inset-6 rounded-full overflow-hidden shadow-2xl group cursor-pointer border-4 border-white bg-slate-100">
                    <img src="https://images.unsplash.com/photo-1541888086425-d81bb19240f5?q=80&w=2070&auto=format&fit=crop" 
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

{{-- ================= OUR PROJECT ================= --}}
<section class="py-24 bg-primary relative overflow-hidden rounded-t-[3rem] sm:rounded-t-[4rem]">
    <div class="absolute inset-0 bg-[url('https://www.transparenttextures.com/patterns/cubes.png')] opacity-5"></div>
    
    <div class="max-w-6xl mx-auto px-6 relative z-10 text-center">
        
        <h2 class="font-display text-3xl sm:text-4xl lg:text-5xl font-extrabold text-white mb-6 tracking-tight reveal">Our Project</h2>
        <p class="text-slate-300 font-light text-lg max-w-2xl mx-auto mb-16 reveal delay-100">
            Berikut adalah beberapa proyek yang telah kami kerjakan sebagai wujud komitmen dalam menghadirkan kualitas, ketepatan, dan kepuasan klien di setiap pembangunan.
        </p>

        <div class="grid grid-cols-1 md:grid-cols-3 gap-4 md:gap-6 auto-rows-[200px] md:auto-rows-[240px] reveal delay-200">
            
            <div class="md:col-span-1 md:row-span-2 group relative overflow-hidden rounded-[2rem] bg-slate-800 shadow-xl cursor-pointer">
                <img src="https://images.unsplash.com/photo-1600596542815-ffad4c1539a9?q=80&w=2075&auto=format&fit=crop" class="w-full h-full object-cover group-hover:scale-110 transition-transform duration-700 opacity-90 group-hover:opacity-100">
                <div class="absolute inset-0 bg-gradient-to-t from-primary/90 to-transparent opacity-0 group-hover:opacity-100 transition-opacity duration-300"></div>
            </div>

            <div class="group relative overflow-hidden rounded-[1.5rem] bg-slate-800 shadow-xl cursor-pointer">
                <img src="https://images.unsplash.com/photo-1486406146926-c627a92ad1ab?q=80&w=2070&auto=format&fit=crop" class="w-full h-full object-cover group-hover:scale-110 transition-transform duration-700 opacity-90 group-hover:opacity-100">
                <div class="absolute inset-0 bg-gradient-to-t from-primary/90 to-transparent opacity-0 group-hover:opacity-100 transition-opacity duration-300"></div>
            </div>

            <div class="group relative overflow-hidden rounded-[1.5rem] bg-slate-800 shadow-xl cursor-pointer">
                <img src="https://images.unsplash.com/photo-1600585154340-be6161a56a0c?q=80&w=2070&auto=format&fit=crop" class="w-full h-full object-cover group-hover:scale-110 transition-transform duration-700 opacity-90 group-hover:opacity-100">
                <div class="absolute inset-0 bg-gradient-to-t from-primary/90 to-transparent opacity-0 group-hover:opacity-100 transition-opacity duration-300"></div>
            </div>

            <div class="group relative overflow-hidden rounded-[1.5rem] bg-slate-800 shadow-xl cursor-pointer">
                <img src="https://images.unsplash.com/photo-1503387762-592deb58ef4e?q=80&w=2071&auto=format&fit=crop" class="w-full h-full object-cover group-hover:scale-110 transition-transform duration-700 opacity-90 group-hover:opacity-100">
                <div class="absolute inset-0 bg-gradient-to-t from-primary/90 to-transparent opacity-0 group-hover:opacity-100 transition-opacity duration-300"></div>
            </div>

            <div class="group relative overflow-hidden rounded-[1.5rem] bg-slate-800 shadow-xl cursor-pointer">
                <img src="https://images.unsplash.com/photo-1541888086425-d81bb19240f5?q=80&w=2070&auto=format&fit=crop" class="w-full h-full object-cover group-hover:scale-110 transition-transform duration-700 opacity-90 group-hover:opacity-100">
                <div class="absolute inset-0 bg-gradient-to-t from-primary/90 to-transparent opacity-0 group-hover:opacity-100 transition-opacity duration-300"></div>
            </div>

        </div>

        <div class="mt-12 flex justify-end reveal delay-300">
            <a href="{{ route('user.project') }}" class="inline-flex items-center gap-2 px-8 py-3.5 bg-white text-primary font-bold text-[14px] rounded-xl hover:bg-accent hover:text-white hover:-translate-y-1 hover:shadow-lg transition-all duration-300 group">
                See More Project
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
                CV Darming adalah perusahaan yang bergerak di bidang jasa konstruksi, desain interior, dan eksterior yang berkomitmen menghadirkan kualitas, ketepatan, serta kepercayaan.
            </p>
        </div>

        <div class="flex flex-col gap-8 reveal delay-100">
            
            <div class="relative bg-white p-8 md:p-12 rounded-[2rem] shadow-[0_15px_40px_-15px_rgba(16,55,92,0.1)] border border-slate-100 group hover:-translate-y-1 transition-transform duration-300">
                <div class="absolute top-6 right-8 text-slate-100 text-6xl font-display font-black leading-none group-hover:text-accent/20 transition-colors duration-300">"</div>
                
                <div class="flex items-center gap-4 mb-6">
                    <div class="w-10 h-10 bg-accent rounded-xl flex items-center justify-center text-primary shadow-sm">
                        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"/><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z"/></svg>
                    </div>
                    <h3 class="font-display text-2xl font-bold text-primary">Visi Kami</h3>
                </div>
                
                <p class="text-slate-600 font-medium text-lg leading-relaxed relative z-10">
                    Menjadi perusahaan yang tumbuh dan berkembang secara berkelanjutan dengan mengedepankan kapasitas, loyalitas, serta profesionalitas CV Darming sesuai dengan bidang keahliannya.
                </p>
            </div>

            <div class="relative bg-primary p-8 md:p-12 rounded-[2rem] shadow-2xl overflow-hidden group hover:-translate-y-1 transition-transform duration-300">
                <div class="absolute -right-10 -bottom-10 w-48 h-48 bg-white/5 rounded-full pointer-events-none group-hover:scale-125 transition-transform duration-700"></div>
                
                <div class="flex items-center gap-4 mb-8 relative z-10">
                    <div class="w-10 h-10 bg-white/10 rounded-xl flex items-center justify-center text-accent backdrop-blur-sm">
                        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 10V3L4 14h7v7l9-11h-7z"/></svg>
                    </div>
                    <h3 class="font-display text-2xl font-bold text-white">Misi Kami</h3>
                </div>

                <ul class="space-y-4 relative z-10">
                    <li class="flex items-start gap-4">
                        <span class="flex-shrink-0 w-6 h-6 rounded-full bg-accent text-primary text-xs font-bold flex items-center justify-center mt-0.5">1</span>
                        <p class="text-slate-300 font-light leading-relaxed">Menciptakan dan menyediakan lapangan pekerjaan guna mendukung peningkatan kesejahteraan masyarakat.</p>
                    </li>
                    <li class="flex items-start gap-4">
                        <span class="flex-shrink-0 w-6 h-6 rounded-full bg-accent text-primary text-xs font-bold flex items-center justify-center mt-0.5">2</span>
                        <p class="text-slate-300 font-light leading-relaxed">Berkontribusi aktif dalam pengembangan industri properti melalui layanan konstruksi yang berkualitas.</p>
                    </li>
                    <li class="flex items-start gap-4">
                        <span class="flex-shrink-0 w-6 h-6 rounded-full bg-accent text-primary text-xs font-bold flex items-center justify-center mt-0.5">3</span>
                        <p class="text-slate-300 font-light leading-relaxed">Mengembangkan serta memajukan bidang konstruksi, desain interior, dan desain eksterior dengan mengutamakan inovasi, ketelitian, dan kepuasan klien.</p>
                    </li>
                    <li class="flex items-start gap-4">
                        <span class="flex-shrink-0 w-6 h-6 rounded-full bg-accent text-primary text-xs font-bold flex items-center justify-center mt-0.5">4</span>
                        <p class="text-slate-300 font-light leading-relaxed">Membangun kepercayaan mitra dan pelanggan melalui hasil kerja yang profesional, tepat waktu, dan sesuai standar mutu.</p>
                    </li>
                </ul>
            </div>

        </div>
    </div>
</section>

@endsection