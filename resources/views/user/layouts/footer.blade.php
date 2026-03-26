@php
    // Ambil data profil perusahaan dari database. 
    // Jika tidak ada, gunakan nilai default agar tidak error.
    $companyProfile = \App\Models\CompanyProfile::first();
@endphp

<footer class="bg-primaryDark text-slate-400 pt-24 pb-10 border-t border-white/5 relative overflow-hidden">
    <div class="absolute top-0 right-0 w-[600px] h-[600px] bg-accent/5 rounded-full blur-[120px] pointer-events-none"></div>
    <div class="absolute bottom-0 left-[-10%] w-[400px] h-[400px] bg-white/5 rounded-full blur-[100px] pointer-events-none"></div>
    <div class="absolute inset-0 bg-[url('https://www.transparenttextures.com/patterns/cubes.png')] opacity-5 mix-blend-overlay"></div>

    <div class="max-w-7xl mx-auto px-6 relative z-10">
        
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-12 lg:gap-8 mb-16 reveal">
            
            <div class="flex flex-col items-start gap-6 lg:pr-6">
                <a href="{{ route('user.home') }}" class="block hover:scale-105 transition-transform duration-300">
                    <img src="{{ asset('images/logo.png') }}" alt="{{ $companyProfile->company_name ?? 'Jayra Construction' }}" class="h-12 w-auto brightness-0 invert opacity-95" onerror="this.src='{{ asset('assets/images/logo_website.svg') }}'">
                </a>
                <p class="text-sm font-light leading-relaxed text-slate-400 line-clamp-4">
                    <strong class="text-white">{{ $companyProfile->company_name ?? 'CV Darming Jaya Abadi' }}</strong> 
                    {{ $companyProfile->about_description ?? 'adalah pionir di industri konstruksi dan arsitektur. Kami membangun mahakarya infrastruktur dengan standar kualitas, keselamatan, dan presisi tertinggi.' }}
                </p>
                <div class="flex gap-3 pt-2">
                    <a href="#" class="w-10 h-10 rounded-xl bg-white/5 border border-white/10 flex items-center justify-center text-white hover:bg-accent hover:text-primary hover:border-accent hover:-translate-y-1 transition-all duration-300">
                        <svg class="w-4 h-4" fill="currentColor" viewBox="0 0 24 24"><path d="M19 0h-14c-2.761 0-5 2.239-5 5v14c0 2.761 2.239 5 5 5h14c2.762 0 5-2.239 5-5v-14c0-2.761-2.238-5-5-5zm-11 19h-3v-11h3v11zm-1.5-12.268c-.966 0-1.75-.79-1.75-1.764s.784-1.764 1.75-1.764 1.75.79 1.75 1.764-.783 1.764-1.75 1.764zm13.5 12.268h-3v-5.604c0-3.368-4-3.113-4 0v5.604h-3v-11h3v1.765c1.396-2.586 7-2.777 7 2.476v6.759z"/></svg>
                    </a>
                    <a href="#" class="w-10 h-10 rounded-xl bg-white/5 border border-white/10 flex items-center justify-center text-white hover:bg-accent hover:text-primary hover:border-accent hover:-translate-y-1 transition-all duration-300">
                        <svg class="w-4 h-4" fill="currentColor" viewBox="0 0 24 24"><path d="M24 4.557c-.883.392-1.832.656-2.828.775 1.017-.609 1.798-1.574 2.165-2.724-.951.564-2.005.974-3.127 1.195-.897-.957-2.178-1.555-3.594-1.555-3.179 0-5.515 2.966-4.797 6.045-4.091-.205-7.719-2.165-10.148-5.144-1.29 2.213-.669 5.108 1.523 6.574-.806-.026-1.566-.247-2.229-.616-.054 2.281 1.581 4.415 3.949 4.89-.693.188-1.452.232-2.224.084.626 1.956 2.444 3.379 4.6 3.419-2.07 1.623-4.678 2.348-7.29 2.04 2.179 1.397 4.768 2.212 7.548 2.212 9.142 0 14.307-7.721 13.995-14.646.962-.695 1.797-1.562 2.457-2.549z"/></svg>
                    </a>
                    <a href="#" class="w-10 h-10 rounded-xl bg-white/5 border border-white/10 flex items-center justify-center text-white hover:bg-accent hover:text-primary hover:border-accent hover:-translate-y-1 transition-all duration-300">
                        <svg class="w-4 h-4" fill="currentColor" viewBox="0 0 24 24"><path d="M12 2.163c3.204 0 3.584.012 4.85.07 3.252.148 4.771 1.691 4.919 4.919.058 1.265.069 1.645.069 4.849 0 3.205-.012 3.584-.069 4.849-.149 3.225-1.664 4.771-4.919 4.919-1.266.058-1.644.07-4.85.07-3.204 0-3.584-.012-4.849-.07-3.26-.149-4.771-1.699-4.919-4.92-.058-1.265-.07-1.644-.07-4.849 0-3.204.013-3.583.07-4.849.149-3.227 1.664-4.771 4.919-4.919 1.266-.057 1.645-.069 4.849-.069zm0-2.163c-3.259 0-3.667.014-4.947.072-4.358.2-6.78 2.618-6.98 6.98-.059 1.281-.073 1.689-.073 4.948 0 3.259.014 3.668.072 4.948.2 4.358 2.618 6.78 6.98 6.98 1.281.058 1.689.072 4.948.072 3.259 0 3.668-.014 4.948-.072 4.354-.2 6.782-2.618 6.979-6.98.059-1.28.073-1.689.073-4.948 0-3.259-.014-3.667-.072-4.947-.196-4.354-2.617-6.78-6.979-6.98-1.281-.059-1.69-.073-4.949-.073zm0 5.838c-3.403 0-6.162 2.759-6.162 6.162s2.759 6.163 6.162 6.163 6.162-2.759 6.162-6.163c0-3.403-2.759-6.162-6.162-6.162zm0 10.162c-2.209 0-4-1.79-4-4 0-2.209 1.791-4 4-4s4 1.791 4 4c0 2.209-1.791 4-4 4zm6.406-11.845c-.796 0-1.441.645-1.441 1.44s.645 1.44 1.441 1.44c.795 0 1.439-.645 1.439-1.44s-.644-1.44-1.439-1.44z"/></svg>
                    </a>
                </div>
            </div>

            <div>
                <h3 class="font-display text-white text-xl font-bold mb-6">Perusahaan</h3>
                <ul class="flex flex-col gap-4 text-sm font-medium">
                    <li><a href="{{ route('user.home') }}" class="group flex items-center hover:text-white transition-colors"><span class="w-0 overflow-hidden group-hover:w-3 text-accent transition-all duration-300 mr-0 group-hover:mr-2">▹</span> Beranda</a></li>
                    <li><a href="{{ route('user.about') }}" class="group flex items-center hover:text-white transition-colors"><span class="w-0 overflow-hidden group-hover:w-3 text-accent transition-all duration-300 mr-0 group-hover:mr-2">▹</span> Profil Kami</a></li>
                    <li><a href="{{ route('user.project') }}" class="group flex items-center hover:text-white transition-colors"><span class="w-0 overflow-hidden group-hover:w-3 text-accent transition-all duration-300 mr-0 group-hover:mr-2">▹</span> Portofolio Proyek</a></li>
                    <li><a href="{{ route('user.contact') }}" class="group flex items-center hover:text-white transition-colors"><span class="w-0 overflow-hidden group-hover:w-3 text-accent transition-all duration-300 mr-0 group-hover:mr-2">▹</span> Kontak & Karir</a></li>
                </ul>
            </div>

            <div>
                <h3 class="font-display text-white text-xl font-bold mb-6">Layanan Kami</h3>
                <ul class="flex flex-col gap-4 text-sm font-medium">
                    <li><a href="{{ route('user.service') }}" class="group flex items-center hover:text-white transition-colors"><span class="w-0 overflow-hidden group-hover:w-3 text-accent transition-all duration-300 mr-0 group-hover:mr-2">▹</span> Pembangunan Baru</a></li>
                    <li><a href="{{ route('user.service') }}" class="group flex items-center hover:text-white transition-colors"><span class="w-0 overflow-hidden group-hover:w-3 text-accent transition-all duration-300 mr-0 group-hover:mr-2">▹</span> Renovasi Eksterior</a></li>
                    <li><a href="{{ route('user.service') }}" class="group flex items-center hover:text-white transition-colors"><span class="w-0 overflow-hidden group-hover:w-3 text-accent transition-all duration-300 mr-0 group-hover:mr-2">▹</span> Desain Interior</a></li>
                    <li><a href="{{ route('user.service') }}" class="group flex items-center hover:text-white transition-colors"><span class="w-0 overflow-hidden group-hover:w-3 text-accent transition-all duration-300 mr-0 group-hover:mr-2">▹</span> Arsitektur & Perencanaan</a></li>
                    <li><a href="{{ route('user.service') }}" class="group flex items-center hover:text-white transition-colors"><span class="w-0 overflow-hidden group-hover:w-3 text-accent transition-all duration-300 mr-0 group-hover:mr-2">▹</span> Konstruksi Komersial</a></li>
                </ul>
            </div>

            <div>
                <h3 class="font-display text-white text-xl font-bold mb-6">Kantor Pusat</h3>
                <ul class="flex flex-col gap-5 text-sm">
                    <li class="flex items-start gap-4">
                        <div class="mt-1 text-accent">
                            <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z"/><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 11a3 3 0 11-6 0 3 3 0 016 0z"/></svg>
                        </div>
                        <span class="font-light leading-relaxed hover:text-white transition-colors cursor-default">
                            {{ $companyProfile->address ?? 'Desa Pejurukan, RT02/RW01, Kec. Kalibagor, Banyumas, Jawa Tengah 53191' }}
                        </span>
                    </li>
                    <li class="flex items-center gap-4">
                        <div class="text-accent">
                            <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z"/></svg>
                        </div>
                        <a href="mailto:{{ $companyProfile->email ?? 'cv.darmingjayagrup@gmail.com' }}" class="font-medium hover:text-accent transition-colors">{{ $companyProfile->email ?? 'cv.darmingjayagrup@gmail.com' }}</a>
                    </li>
                    <li class="flex items-center gap-4">
                        <div class="text-accent">
                            <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 5a2 2 0 012-2h3.28a1 1 0 01.948.684l1.498 4.493a1 1 0 01-.502 1.21l-2.257 1.13a11.042 11.042 0 005.516 5.516l1.13-2.257a1 1 0 011.21-.502l4.493 1.498a1 1 0 01.684.949V19a2 2 0 01-2 2h-1C9.716 21 3 14.284 3 6V5z"/></svg>
                        </div>
                        <a href="tel:{{ $companyProfile->phone ?? '+6285772364659' }}" class="font-medium hover:text-accent transition-colors">{{ $companyProfile->phone ?? '+62 857-7236-4659' }}</a>
                    </li>
                    <li class="flex items-center gap-4 mt-2">
                        <div class="text-slate-500">
                            <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z"/></svg>
                        </div>
                        <span class="font-light text-xs text-slate-500 uppercase tracking-widest">
                            Senin - Sabtu (08:00 - 17:00)
                        </span>
                    </li>
                </ul>
            </div>

        </div>

        <div class="border-t border-white/10 pt-8 flex flex-col md:flex-row justify-between items-center gap-4 reveal delay-100">
            <div class="text-xs font-medium tracking-widest uppercase text-slate-500 text-center md:text-left">
                &copy; {{ date('Y') }} {{ $companyProfile->company_name ?? 'Jayra Construction' }}. All Rights Reserved.
            </div>
            
            <div class="flex gap-6 text-xs font-medium text-slate-500">
                <a href="#" class="hover:text-white transition-colors">Privacy Policy</a>
                <a href="#" class="hover:text-white transition-colors">Terms of Service</a>
                <a href="#" class="hover:text-white transition-colors">Sitemap</a>
            </div>
        </div>

    </div>
</footer>