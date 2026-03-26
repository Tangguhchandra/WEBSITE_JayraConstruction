<header x-data="{ scrolled: false, menuOpen: false }"
        x-init="$watch('menuOpen', value => { document.body.style.overflow = value ? 'hidden' : '' })"
        @scroll.window="scrolled = (window.pageYOffset > 60) ? true : false"
        @keydown.escape.window="menuOpen = false"
        class="z-50">

    <nav class="fixed top-0 left-0 w-full z-40 transition-all duration-700 ease-in-out bg-white/90 backdrop-blur-md border-b border-slate-100"
         :class="scrolled ? 'py-5 -translate-y-full opacity-0 pointer-events-none' : 'py-7 md:py-8 translate-y-0 opacity-100'">
        
        <div class="max-w-7xl mx-auto px-6 flex justify-between items-center">
            
            {{-- Logo --}}
            <a href="{{ route('user.home') }}" class="flex items-center gap-2 group">
                <img src="{{ asset('images/logo.png') }}" alt="Jayra Construction" class="h-12 md:h-16 w-auto group-hover:scale-105 transition-transform" onerror="this.src='{{ asset('assets/images/logo_website.svg') }}'">
            </a>

            {{-- Menu Tengah (Desktop) --}}
            <div class="hidden md:flex items-center gap-10">
                <a href="{{ route('user.home') }}" class="text-base font-semibold transition-colors {{ request()->routeIs('user.home') ? 'text-accent' : 'text-primary hover:text-accent' }}">Home</a>
                <a href="{{ route('user.about') }}" class="text-base font-semibold transition-colors {{ request()->routeIs('user.about') ? 'text-accent' : 'text-slate-500 hover:text-primary' }}">Profile</a>
                <a href="{{ route('user.service') }}" class="text-base font-semibold transition-colors {{ request()->routeIs('user.service') ? 'text-accent' : 'text-slate-500 hover:text-primary' }}">Service</a>
                <a href="{{ route('user.project') }}" class="text-base font-semibold transition-colors {{ request()->routeIs('user.project') ? 'text-accent' : 'text-slate-500 hover:text-primary' }}">Project</a>
                <a href="{{ route('user.contact') }}" class="text-base font-semibold transition-colors {{ request()->routeIs('user.contact') ? 'text-accent' : 'text-slate-500 hover:text-primary' }}">Contact</a>
            </div>

            {{-- ================= TOMBOL LOGIN / PROFIL (DESKTOP) ================= --}}
            <div class="hidden md:block">
                @auth
                    {{-- Tombol Jika Sudah Login --}}
                    <a href="{{ route('user.profil') }}" class="flex items-center gap-3 bg-primary/5 border border-primary/10 text-primary pl-2 pr-5 py-1.5 rounded-full font-bold text-[14px] hover:bg-primary hover:text-white hover:shadow-lg hover:-translate-y-1 transition-all duration-300 group">
                        <div class="w-9 h-9 rounded-full bg-primary text-white flex items-center justify-center text-sm font-black group-hover:bg-white group-hover:text-primary transition-colors shadow-sm">
                            {{ strtoupper(substr(Auth::user()->name, 0, 1)) }}
                        </div>
                        <span>{{ explode(' ', Auth::user()->name)[0] }}</span> {{-- Ambil nama depan saja --}}
                    </a>
                @else
                    {{-- Tombol Jika Belum Login (Guest) --}}
                    <a href="{{ route('login') }}" class="flex items-center gap-2.5 bg-primary text-white px-8 py-3.5 rounded-full font-bold text-[15px] hover:bg-primaryDark hover:shadow-lg hover:-translate-y-1 transition-all duration-300 group">
                        <svg class="w-5 h-5 group-hover:-translate-x-1 transition-transform" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 16l-4-4m0 0l4-4m-4 4h14m-5 4v1a3 3 0 01-3 3H6a3 3 0 01-3-3V7a3 3 0 013-3h7a3 3 0 013 3v1"/></svg>
                        Login
                    </a>
                @endauth
            </div>

            {{-- Tombol Hamburger Menu (Mobile) --}}
            <button @click="menuOpen = true" class="md:hidden text-primary focus:outline-none bg-slate-50 p-3 rounded-xl hover:bg-slate-100 transition-colors shadow-sm">
                <svg class="w-7 h-7" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16"/></svg>
            </button>

        </div>
    </nav>

    {{-- Floating Menu Button (Saat Scroll) --}}
    <button x-show="scrolled"
            x-transition:enter="transition ease-out duration-500 delay-100"
            x-transition:enter-start="opacity-0 translate-y-[-20px] scale-90"
            x-transition:enter-end="opacity-100 translate-y-0 scale-100"
            x-transition:leave="transition ease-in duration-300"
            x-transition:leave-start="opacity-100 translate-y-0 scale-100"
            x-transition:leave-end="opacity-0 translate-y-[-20px] scale-90"
            @click="menuOpen = true"
            class="fixed top-6 right-6 md:top-8 md:right-10 z-[45] bg-primary/95 backdrop-blur-md text-white p-4 md:p-5 rounded-2xl md:rounded-[1.25rem] shadow-[0_10px_30px_rgba(16,55,92,0.3)] border border-white/10 hover:bg-primaryDark hover:scale-105 active:scale-95 transition-all duration-300 flex items-center justify-center group"
            style="display: none;">
        <svg class="w-7 h-7 md:w-8 md:h-8 group-hover:text-accent transition-colors" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M4 6h16M4 12h16m-7 6h7"/></svg>
    </button>

    {{-- Overlay Gelap --}}
    <div x-show="menuOpen"
         x-transition:enter="transition-opacity ease-linear duration-300"
         x-transition:enter-start="opacity-0"
         x-transition:enter-end="opacity-100"
         x-transition:leave="transition-opacity ease-linear duration-300"
         x-transition:leave-start="opacity-100"
         x-transition:leave-end="opacity-0"
         @click="menuOpen = false"
         class="fixed inset-0 bg-primary/40 backdrop-blur-sm z-[60]"
         style="display: none;">
    </div>

    {{-- Sidebar Menu (Mobile) --}}
    <div x-show="menuOpen"
         x-transition:enter="transition ease-out duration-500 transform"
         x-transition:enter-start="translate-x-full"
         x-transition:enter-end="translate-x-0"
         x-transition:leave="transition ease-in duration-300 transform"
         x-transition:leave-start="translate-x-0"
         x-transition:leave-end="translate-x-full"
         class="fixed top-0 right-0 w-[85vw] max-w-[380px] h-full bg-white shadow-2xl z-[70] flex flex-col"
         style="display: none;">
        
        <div class="px-8 py-8 border-b border-slate-100 flex justify-between items-center bg-white">
            <img src="{{ asset('images/logo.png') }}" alt="Jayra Logo" class="h-10 w-auto" onerror="this.src='{{ asset('assets/images/logo_website.svg') }}'">
            <button @click="menuOpen = false" class="w-10 h-10 flex items-center justify-center bg-white rounded-full text-slate-400 hover:text-red-500 hover:bg-red-50 transition-colors shadow-sm border border-slate-200 focus:outline-none">
                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"/></svg>
            </button>
        </div>

        <div class="flex-1 overflow-y-auto px-8 py-10 flex flex-col gap-6">
            <a href="{{ route('user.home') }}" class="font-display text-3xl font-extrabold {{ request()->routeIs('user.home') ? 'text-accent' : 'text-primary hover:text-accent' }} transition-colors">Home</a>
            <a href="{{ route('user.about') }}" class="font-display text-3xl font-extrabold {{ request()->routeIs('user.about') ? 'text-accent' : 'text-primary hover:text-accent' }} transition-colors">Profile</a>
            <a href="{{ route('user.service') }}" class="font-display text-3xl font-extrabold {{ request()->routeIs('user.service') ? 'text-accent' : 'text-primary hover:text-accent' }} transition-colors">Service</a>
            <a href="{{ route('user.project') }}" class="font-display text-3xl font-extrabold {{ request()->routeIs('user.project') ? 'text-accent' : 'text-primary hover:text-accent' }} transition-colors">Project</a>
            <a href="{{ route('user.contact') }}" class="font-display text-3xl font-extrabold {{ request()->routeIs('user.contact') ? 'text-accent' : 'text-primary hover:text-accent' }} transition-colors">Contact</a>
            
            <hr class="my-4 border-slate-100">

            <div class="flex flex-col gap-5">
                <p class="text-[11px] font-bold text-slate-400 uppercase tracking-widest">Hubungi Cepat</p>
                <a href="#" class="flex items-center gap-4 text-[14px] font-medium text-slate-600 hover:text-primary transition-colors">
                    <div class="w-10 h-10 rounded-full border border-slate-200 flex items-center justify-center text-accent bg-white shadow-sm">
                        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z"/></svg>
                    </div>
                    cv.darmingjayagrup@gmail.com
                </a>
                <a href="#" class="flex items-center gap-4 text-[14px] font-medium text-slate-600 hover:text-primary transition-colors">
                    <div class="w-10 h-10 rounded-full border border-slate-200 flex items-center justify-center text-accent bg-white shadow-sm">
                        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 5a2 2 0 012-2h3.28a1 1 0 01.948.684l1.498 4.493a1 1 0 01-.502 1.21l-2.257 1.13a11.042 11.042 0 005.516 5.516l1.13-2.257a1 1 0 011.21-.502l4.493 1.498a1 1 0 01.684.949V19a2 2 0 01-2 2h-1C9.716 21 3 14.284 3 6V5z"/></svg>
                    </div>
                    +62 857-7236-4659
                </a>
            </div>
        </div>

        {{-- ================= TOMBOL LOGIN / PROFIL (MOBILE MENU) ================= --}}
        <div class="p-8 bg-slate-50 border-t border-slate-100">
            @auth
                {{-- Tombol Jika Sudah Login --}}
                <a href="{{ route('user.profil') }}" class="w-full flex items-center justify-center gap-3 bg-primary text-white py-4 rounded-xl font-bold text-[15px] shadow-lg hover:bg-primaryDark hover:-translate-y-1 hover:shadow-xl hover:shadow-primary/30 transition-all duration-300">
                    <div class="w-6 h-6 rounded-full bg-white/20 text-white flex items-center justify-center text-xs font-black">
                        {{ strtoupper(substr(Auth::user()->name, 0, 1)) }}
                    </div>
                    Profil Saya
                </a>
            @else
                {{-- Tombol Jika Belum Login (Guest) --}}
                <a href="{{ route('login') }}" class="w-full flex items-center justify-center gap-3 bg-primary text-white py-4 rounded-xl font-bold text-[15px] shadow-lg hover:bg-primaryDark hover:-translate-y-1 hover:shadow-xl hover:shadow-primary/30 transition-all duration-300">
                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 16l-4-4m0 0l4-4m-4 4h14m-5 4v1a3 3 0 01-3 3H6a3 3 0 01-3-3V7a3 3 0 013-3h7a3 3 0 013 3v1"/></svg>
                    Login Ke Portal
                </a>
            @endauth
        </div>

    </div>
</header>