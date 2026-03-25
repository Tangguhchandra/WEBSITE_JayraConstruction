<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login - Jayra Construction</title>
    
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600&family=Outfit:wght@300;400;500;600;700&display=swap" rel="stylesheet">
    
    <script defer src="https://cdn.jsdelivr.net/npm/alpinejs@3.x.x/dist/cdn.min.js"></script>
    
    <script src="https://cdn.tailwindcss.com"></script>
    <script>
        tailwind.config = {
            theme: {
                extend: {
                    fontFamily: {
                        sans: ['Poppins', 'sans-serif'],
                        display: ['Outfit', 'sans-serif'],
                    },
                    colors: {
                        primary: '#10375C',
                        primaryDark: '#0b2742',
                        accent: '#F3C623',
                        surface: '#F8FAFC',
                    },
                    animation: {
                        'fade-in-up': 'fadeInUp 0.8s cubic-bezier(0.16, 1, 0.3, 1) forwards',
                        'image-pan': 'imagePan 25s ease-in-out infinite alternate',
                    },
                    keyframes: {
                        fadeInUp: {
                            '0%': { opacity: '0', transform: 'translateY(20px)' },
                            '100%': { opacity: '1', transform: 'translateY(0)' },
                        },
                        imagePan: {
                            '0%': { transform: 'scale(1.05) translate(0, 0)' },
                            '100%': { transform: 'scale(1.15) translate(-2%, -2%)' },
                        }
                    }
                }
            }
        }
    </script>

    <style>
        /* Base Styling untuk kenyamanan visual */
        body { 
            background-color: #f1f5f9;
            background-image: radial-gradient(#cbd5e1 1px, transparent 1px);
            background-size: 32px 32px;
            -webkit-font-smoothing: antialiased;
        }

        /* Menyembunyikan elemen sebelum animasi fade-in-up berjalan */
        .opacity-0-initial { opacity: 0; }
        
        /* Custom Scrollbar */
        ::-webkit-scrollbar { width: 6px; }
        ::-webkit-scrollbar-track { background: transparent; }
        ::-webkit-scrollbar-thumb { background: #cbd5e1; border-radius: 10px; }
        ::-webkit-scrollbar-thumb:hover { background: #94a3b8; }
    </style>
</head>
<body class="min-h-screen flex items-center justify-center p-4 sm:p-6 lg:p-8">
    
    <main class="max-w-[1100px] w-full bg-white rounded-[2rem] shadow-[0_20px_60px_-15px_rgba(16,55,92,0.15)] flex flex-col lg:flex-row overflow-hidden min-h-[600px] xl:min-h-[650px] opacity-0-initial animate-fade-in-up">
        
        <section class="hidden lg:flex w-1/2 relative bg-primary overflow-hidden group">
            <div class="absolute inset-0 bg-cover bg-center opacity-70 mix-blend-overlay animate-image-pan" 
                 style="background-image: url('https://images.unsplash.com/photo-1541913080-214307cc3ef9?q=80&w=2070&auto=format&fit=crop');">
            </div>
            
            <div class="absolute inset-0 bg-gradient-to-t from-primary/95 via-primary/50 to-transparent"></div>
            
            <div class="relative z-10 p-12 flex flex-col justify-end w-full h-full text-white">
                <div class="w-12 h-1 bg-accent mb-6 rounded-full transition-all duration-500 group-hover:w-20"></div>
                <h2 class="font-display text-4xl lg:text-5xl font-bold mb-4 leading-tight tracking-tight">
                    Membangun Masa Depan <br>
                    <span class="text-accent">Lebih Baik.</span>
                </h2>
                <p class="text-white/80 font-light text-sm max-w-sm leading-relaxed mb-8">
                    Sistem manajemen konstruksi terpadu. Masuk untuk memantau proyek, sumber daya, dan laporan operasional secara real-time.
                </p>
                
                <div class="flex gap-2">
                    <div class="w-8 h-1.5 bg-accent rounded-full"></div>
                    <div class="w-2 h-1.5 bg-white/30 rounded-full transition-colors hover:bg-white/50 cursor-pointer"></div>
                    <div class="w-2 h-1.5 bg-white/30 rounded-full transition-colors hover:bg-white/50 cursor-pointer"></div>
                </div>
            </div>
        </section>

        <section class="w-full lg:w-1/2 flex flex-col justify-center relative p-8 sm:p-12 xl:p-16">
            
            <div class="w-full max-w-[420px] mx-auto">
                
                <header class="mb-8 text-center lg:text-left opacity-0-initial animate-fade-in-up" style="animation-delay: 0.1s;">
                    <div class="flex justify-center lg:justify-start mb-6">
                        <img src="{{ asset('assets/images/logo_website.svg') }}" alt="Jayra Logo" class="h-10 sm:h-12 w-auto transition-transform duration-300 hover:scale-105">
                    </div>
                    
                    <h1 class="font-display text-2xl sm:text-3xl font-bold text-primary tracking-tight">Selamat Datang Kembali</h1>
                    <p class="text-slate-500 text-sm mt-2 font-light">Masukkan kredensial Anda untuk mengakses portal.</p>
                </header>

                @if ($errors->any())
                    <div class="bg-red-50/80 border border-red-100 text-red-600 px-4 py-3 rounded-xl text-sm font-medium mb-6 flex items-center gap-3 opacity-0-initial animate-fade-in-up" style="animation-delay: 0.15s;">
                        <svg class="w-5 h-5 flex-shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4m0 4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"></path></svg>
                        <span>{{ $errors->first() }}</span>
                    </div>
                @endif

                <form action="{{ route('login.post') }}" method="POST" class="space-y-6" x-data="{ showPass: false }">
                    @csrf
                    
                    <div class="space-y-2 opacity-0-initial animate-fade-in-up" style="animation-delay: 0.2s;">
                        <label class="text-xs font-semibold text-slate-500 uppercase tracking-wider ml-1">Email / Username</label>
                        <div class="relative group">
                            <div class="absolute inset-y-0 left-0 pl-4 flex items-center pointer-events-none text-slate-400 group-focus-within:text-primary transition-colors duration-300">
                                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 12a4 4 0 10-8 0 4 4 0 008 0zm0 0v1.5a2.5 2.5 0 005 0V12a9 9 0 10-9 9m4.5-1.206a8.959 8.959 0 01-4.5 1.207"/></svg>
                            </div>
                            <input type="text" name="email" value="{{ old('email') }}" required 
                                   class="w-full pl-12 pr-4 py-3.5 rounded-xl border border-slate-200 bg-slate-50 text-primary text-sm font-medium focus:bg-white focus:border-primary focus:ring-4 focus:ring-primary/10 transition-all duration-300 outline-none"
                                   placeholder="mail@contoh.com atau username">
                        </div>
                    </div>

                    <div class="space-y-2 opacity-0-initial animate-fade-in-up" style="animation-delay: 0.3s;">
                        <label class="text-xs font-semibold text-slate-500 uppercase tracking-wider ml-1">Password</label>
                        <div class="relative group">
                            <div class="absolute inset-y-0 left-0 pl-4 flex items-center pointer-events-none text-slate-400 group-focus-within:text-primary transition-colors duration-300">
                                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 15v2m-6 4h12a2 2 0 002-2v-6a2 2 0 00-2-2H6a2 2 0 00-2 2v6a2 2 0 002 2zm10-10V7a4 4 0 00-8 0v4h8z"/></svg>
                            </div>
                            <input :type="showPass ? 'text' : 'password'" name="password" required 
                                   class="w-full pl-12 pr-12 py-3.5 rounded-xl border border-slate-200 bg-slate-50 text-primary text-sm font-medium focus:bg-white focus:border-primary focus:ring-4 focus:ring-primary/10 transition-all duration-300 outline-none"
                                   placeholder="••••••••">
                            
                            <button type="button" @click="showPass = !showPass" 
                                    class="absolute inset-y-0 right-0 pr-4 flex items-center text-slate-400 hover:text-primary transition-colors duration-300 focus:outline-none">
                                <svg x-show="!showPass" class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"/><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z"/></svg>
                                <svg x-show="showPass" class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24" style="display: none;"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13.875 18.825A10.05 10.05 0 0112 19c-4.478 0-8.268-2.943-9.543-7a9.97 9.97 0 011.563-3.029m5.858.908a3 3 0 114.243 4.243M9.878 9.878l4.242 4.242M9.882 9.881L4.59 4.59m9.542 9.542l5.87 5.87M21 12a10.05 10.05 0 00-1.226-4.91m-7.954-4.69A9.992 9.992 0 0012 5c4.478 0 8.268 2.943 9.542 7a10.025 10.025 0 01-4.132 5.411m0 0L21 21"/></svg>
                            </button>
                        </div>
                    </div>

                    <div class="flex items-center justify-between pt-1 opacity-0-initial animate-fade-in-up" style="animation-delay: 0.4s;">
                        <label class="flex items-center gap-2 cursor-pointer group">
                            <input type="checkbox" name="remember" class="w-4 h-4 rounded border-slate-300 text-primary focus:ring-primary/30 cursor-pointer transition-all">
                            <span class="text-[13px] font-medium text-slate-500 group-hover:text-primary transition-colors">Ingat Saya</span>
                        </label>
                        <a href="{{ route('reset-password') }}" class="text-[13px] font-semibold text-primary hover:text-accent transition-colors">Lupa Password?</a>
                    </div>

                    <div class="flex flex-col sm:flex-row gap-4 pt-4 opacity-0-initial animate-fade-in-up" style="animation-delay: 0.5s;">
                        <button type="submit" 
                                class="w-full sm:flex-1 bg-primary text-white py-3.5 rounded-xl font-semibold text-sm transition-all duration-300 hover:bg-primaryDark hover:-translate-y-1 hover:shadow-lg hover:shadow-primary/30 flex items-center justify-center gap-2">
                            Masuk
                            <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M14 5l7 7m0 0l-7 7m7-7H3"/></svg>
                        </button>
                        <a href="{{ route('register') }}" 
                           class="w-full sm:w-auto px-8 py-3.5 rounded-xl border-2 border-slate-200 text-slate-600 font-semibold text-sm text-center transition-all duration-300 hover:border-primary hover:text-primary hover:bg-slate-50">
                            Daftar
                        </a>
                    </div>
                </form>

                <footer class="mt-12 text-center lg:text-left opacity-0-initial animate-fade-in-up" style="animation-delay: 0.6s;">
                    <p class="text-[11px] font-medium text-slate-400 tracking-widest uppercase">
                        &copy; {{ date('Y') }} Jayra Construction • V.2.1
                    </p>
                </footer>
                
            </div>
        </section>
    </main>

</body>
</html>