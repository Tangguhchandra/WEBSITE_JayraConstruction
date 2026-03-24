<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registrasi - Jayra Construction</title>
    
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
                    },
                    animation: {
                        'fade-in-up': 'fadeInUp 0.8s cubic-bezier(0.16, 1, 0.3, 1) forwards',
                        'image-pan': 'imagePan 30s ease-in-out infinite alternate',
                    },
                    keyframes: {
                        fadeInUp: {
                            '0%': { opacity: '0', transform: 'translateY(20px)' },
                            '100%': { opacity: '1', transform: 'translateY(0)' },
                        },
                        imagePan: {
                            '0%': { transform: 'scale(1.05) translate(0, 0)' },
                            '100%': { transform: 'scale(1.1) translate(-1%, -1%)' },
                        }
                    }
                }
            }
        }
    </script>

    <style>
        body { 
            background-color: #f8fafc;
            background-image: radial-gradient(#cbd5e1 1px, transparent 1px);
            background-size: 32px 32px;
            -webkit-font-smoothing: antialiased;
        }
        .opacity-0-initial { opacity: 0; }
        
        /* Custom Scrollbar */
        ::-webkit-scrollbar { width: 6px; }
        ::-webkit-scrollbar-track { background: transparent; }
        ::-webkit-scrollbar-thumb { background: #cbd5e1; border-radius: 10px; }
    </style>
</head>
<body class="min-h-screen flex items-center justify-center p-4 sm:p-6 lg:p-8">
    
    <main class="max-w-[1200px] w-full bg-white rounded-[2rem] shadow-[0_20px_60px_-15px_rgba(16,55,92,0.15)] flex flex-col lg:flex-row overflow-hidden min-h-[650px] opacity-0-initial animate-fade-in-up">
        
        <section class="hidden lg:flex w-[40%] relative bg-primary overflow-hidden group">
            <div class="absolute inset-0 bg-cover bg-center opacity-70 mix-blend-overlay animate-image-pan" 
                 style="background-image: url('https://images.unsplash.com/photo-1503387762-592deb58ef4e?q=80&w=2071&auto=format&fit=crop');">
            </div>
            <div class="absolute inset-0 bg-gradient-to-t from-primary/95 via-primary/60 to-transparent"></div>
            
            <div class="relative z-10 p-12 flex flex-col justify-end w-full h-full text-white">
                <div class="w-12 h-1 bg-accent mb-6 rounded-full transition-all duration-500 group-hover:w-20"></div>
                <h2 class="font-display text-4xl font-bold mb-4 leading-tight tracking-tight">
                    Mulai Perjalanan <br>
                    <span class="text-accent">Proyek Anda.</span>
                </h2>
                <p class="text-white/80 font-light text-sm max-w-sm leading-relaxed mb-6">
                    Akses portal Jayra Construction untuk memantau kemajuan, anggaran, dan komunikasi tim secara real-time.
                </p>
            </div>
        </section>

        <section class="w-full lg:w-[60%] flex flex-col justify-center relative p-8 sm:p-12 xl:p-14">
            
            <div class="w-full max-w-[650px] mx-auto">
                
                <header class="mb-8 text-center lg:text-left opacity-0-initial animate-fade-in-up" style="animation-delay: 0.1s;">
                    <h1 class="font-display text-2xl sm:text-3xl font-bold text-primary tracking-tight mb-2">Registrasi Akun Jayra Construction</h1>
                    <p class="text-slate-500 text-sm font-medium">Silakan Mengisi Data Diri</p>
                </header>

                <form action="#" method="POST" class="space-y-5" 
                      x-data="{ 
                          showPass: false, 
                          showConfPass: false,
                          password: '',
                          
                          // Logika Penilaian Password (Max Score 4)
                          get strengthScore() {
                              let score = 0;
                              if (this.password.length >= 8) score++; // Minimal 8 Karakter
                              if (/[A-Z]/.test(this.password) && /[a-z]/.test(this.password)) score++; // Ada Huruf Besar & Kecil
                              if (/[0-9]/.test(this.password)) score++; // Ada Angka
                              if (/[^A-Za-z0-9]/.test(this.password)) score++; // Ada Simbol Spesial
                              return score;
                          },
                          
                          // Label Indikator
                          get strengthLabel() {
                              if (this.password.length === 0) return '';
                              if (this.strengthScore <= 1) return 'Lemah';
                              if (this.strengthScore === 2 || this.strengthScore === 3) return 'Sedang';
                              return 'Sangat Kuat';
                          },
                          
                          // Warna Bar Indikator
                          get strengthColor() {
                              if (this.strengthScore <= 1) return 'bg-red-500';
                              if (this.strengthScore === 2 || this.strengthScore === 3) return 'bg-yellow-500';
                              return 'bg-green-500';
                          }
                      }">
                    @csrf
                    
                    <div class="grid grid-cols-1 sm:grid-cols-2 gap-x-6 gap-y-5">
                        
                        <div class="space-y-1.5 opacity-0-initial animate-fade-in-up" style="animation-delay: 0.2s;">
                            <label class="text-[11px] font-bold text-slate-500 uppercase tracking-widest ml-1">Nama Lengkap</label>
                            <div class="relative group">
                                <div class="absolute inset-y-0 left-0 pl-4 flex items-center pointer-events-none text-slate-400 group-focus-within:text-primary transition-colors">
                                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z"/></svg>
                                </div>
                                <input type="text" name="name" required 
                                       class="w-full pl-12 pr-4 py-3.5 rounded-xl border-2 border-slate-100 bg-slate-50/50 text-primary text-sm font-medium focus:bg-white focus:border-primary/30 focus:ring-4 focus:ring-primary/5 transition-all outline-none"
                                       placeholder="John Doe">
                            </div>
                        </div>

                        <div class="space-y-1.5 opacity-0-initial animate-fade-in-up" style="animation-delay: 0.3s;">
                            <label class="text-[11px] font-bold text-slate-500 uppercase tracking-widest ml-1">Email</label>
                            <div class="relative group">
                                <div class="absolute inset-y-0 left-0 pl-4 flex items-center pointer-events-none text-slate-400 group-focus-within:text-primary transition-colors">
                                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z"/></svg>
                                </div>
                                <input type="email" name="email" required 
                                       class="w-full pl-12 pr-4 py-3.5 rounded-xl border-2 border-slate-100 bg-slate-50/50 text-primary text-sm font-medium focus:bg-white focus:border-primary/30 focus:ring-4 focus:ring-primary/5 transition-all outline-none"
                                       placeholder="mail@contoh.com">
                            </div>
                        </div>

                        <div class="space-y-1.5 opacity-0-initial animate-fade-in-up" style="animation-delay: 0.4s;">
                            <label class="text-[11px] font-bold text-slate-500 uppercase tracking-widest ml-1">Username</label>
                            <div class="relative group">
                                <div class="absolute inset-y-0 left-0 pl-4 flex items-center pointer-events-none text-slate-400 group-focus-within:text-primary transition-colors">
                                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M10 20l4-16m4 4l4 4-4 4M6 16l-4-4 4-4"/></svg>
                                </div>
                                <input type="text" name="username" required 
                                       class="w-full pl-12 pr-4 py-3.5 rounded-xl border-2 border-slate-100 bg-slate-50/50 text-primary text-sm font-medium focus:bg-white focus:border-primary/30 focus:ring-4 focus:ring-primary/5 transition-all outline-none"
                                       placeholder="johndoe123">
                            </div>
                        </div>

                        <div class="space-y-1.5 opacity-0-initial animate-fade-in-up" style="animation-delay: 0.5s;">
                            <label class="text-[11px] font-bold text-slate-500 uppercase tracking-widest ml-1">No. Handphone</label>
                            <div class="relative group">
                                <div class="absolute inset-y-0 left-0 pl-4 flex items-center pointer-events-none text-slate-400 group-focus-within:text-primary transition-colors">
                                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M12 18h.01M8 21h8a2 2 0 002-2V5a2 2 0 00-2-2H8a2 2 0 00-2 2v14a2 2 0 002 2z"/></svg>
                                </div>
                                <input type="tel" name="phone" required 
                                       class="w-full pl-12 pr-4 py-3.5 rounded-xl border-2 border-slate-100 bg-slate-50/50 text-primary text-sm font-medium focus:bg-white focus:border-primary/30 focus:ring-4 focus:ring-primary/5 transition-all outline-none"
                                       placeholder="0812xxxxxx">
                            </div>
                        </div>

                        <div class="space-y-1.5 opacity-0-initial animate-fade-in-up" style="animation-delay: 0.6s;">
                            <label class="text-[11px] font-bold text-slate-500 uppercase tracking-widest ml-1">Password</label>
                            <div class="relative group">
                                <div class="absolute inset-y-0 left-0 pl-4 flex items-center pointer-events-none text-slate-400 group-focus-within:text-primary transition-colors">
                                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M12 15v2m-6 4h12a2 2 0 002-2v-6a2 2 0 00-2-2H6a2 2 0 00-2 2v6a2 2 0 002 2zm10-10V7a4 4 0 00-8 0v4h8z"/></svg>
                                </div>
                                <input :type="showPass ? 'text' : 'password'" name="password" required x-model="password"
                                       class="w-full pl-12 pr-11 py-3.5 rounded-xl border-2 border-slate-100 bg-slate-50/50 text-primary text-sm font-medium focus:bg-white focus:border-primary/30 focus:ring-4 focus:ring-primary/5 transition-all outline-none"
                                       placeholder="••••••••">
                                <button type="button" @click="showPass = !showPass" class="absolute inset-y-0 right-0 pr-4 flex items-center text-slate-400 hover:text-primary transition-colors focus:outline-none">
                                    <svg x-show="!showPass" class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"/><path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z"/></svg>
                                    <svg x-show="showPass" class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24" style="display: none;"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M13.875 18.825A10.05 10.05 0 0112 19c-4.478 0-8.268-2.943-9.543-7a9.97 9.97 0 011.563-3.029m5.858.908a3 3 0 114.243 4.243M9.878 9.878l4.242 4.242M9.882 9.881L4.59 4.59m9.542 9.542l5.87 5.87M21 12a10.05 10.05 0 00-1.226-4.91m-7.954-4.69A9.992 9.992 0 0012 5c4.478 0 8.268 2.943 9.542 7a10.025 10.025 0 01-4.132 5.411m0 0L21 21"/></svg>
                                </button>
                            </div>
                            <div x-show="password.length > 0" x-transition:enter="transition ease-out duration-300" x-transition:enter-start="opacity-0 -translate-y-2" x-transition:enter-end="opacity-100 translate-y-0" class="pt-1">
                                <div class="flex h-1.5 w-full bg-slate-200 rounded-full overflow-hidden">
                                    <div class="h-full transition-all duration-500 ease-out" 
                                         :class="strengthColor" 
                                         :style="`width: ${(strengthScore / 4) * 100}%`"></div>
                                </div>
                                <div class="flex justify-between items-center mt-1.5">
                                    <p class="text-[10px] text-slate-500 font-medium">Keamanan: <span class="font-bold transition-colors" :class="{'text-red-500': strengthScore <= 1, 'text-yellow-500': strengthScore === 2 || strengthScore === 3, 'text-green-500': strengthScore === 4}" x-text="strengthLabel"></span></p>
                                    <p class="text-[10px] text-slate-400" x-show="strengthScore < 4">Gunakan angka & simbol</p>
                                </div>
                            </div>
                        </div>

                        <div class="space-y-1.5 opacity-0-initial animate-fade-in-up" style="animation-delay: 0.7s;">
                            <label class="text-[11px] font-bold text-slate-500 uppercase tracking-widest ml-1">Konfirmasi Password</label>
                            <div class="relative group">
                                <div class="absolute inset-y-0 left-0 pl-4 flex items-center pointer-events-none text-slate-400 group-focus-within:text-primary transition-colors">
                                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M9 12l2 2 4-4m5.618-4.016A11.955 11.955 0 0112 2.944a11.955 11.955 0 01-8.618 3.04A12.02 12.02 0 003 9c0 5.591 3.824 10.29 9 11.622 5.176-1.332 9-6.03 9-11.622 0-1.042-.133-2.052-.382-3.016z"/></svg>
                                </div>
                                <input :type="showConfPass ? 'text' : 'password'" name="password_confirmation" required 
                                       class="w-full pl-12 pr-11 py-3.5 rounded-xl border-2 border-slate-100 bg-slate-50/50 text-primary text-sm font-medium focus:bg-white focus:border-primary/30 focus:ring-4 focus:ring-primary/5 transition-all outline-none"
                                       placeholder="••••••••">
                                <button type="button" @click="showConfPass = !showConfPass" class="absolute inset-y-0 right-0 pr-4 flex items-center text-slate-400 hover:text-primary transition-colors focus:outline-none">
                                    <svg x-show="!showConfPass" class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"/><path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z"/></svg>
                                    <svg x-show="showConfPass" class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24" style="display: none;"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M13.875 18.825A10.05 10.05 0 0112 19c-4.478 0-8.268-2.943-9.543-7a9.97 9.97 0 011.563-3.029m5.858.908a3 3 0 114.243 4.243M9.878 9.878l4.242 4.242M9.882 9.881L4.59 4.59m9.542 9.542l5.87 5.87M21 12a10.05 10.05 0 00-1.226-4.91m-7.954-4.69A9.992 9.992 0 0012 5c4.478 0 8.268 2.943 9.542 7a10.025 10.025 0 01-4.132 5.411m0 0L21 21"/></svg>
                                </button>
                            </div>
                        </div>

                    </div>

                    <div class="flex flex-col-reverse sm:flex-row justify-between gap-4 pt-6 mt-4 border-t border-slate-100 opacity-0-initial animate-fade-in-up" style="animation-delay: 0.8s;">
                        <a href="{{ url('login') }}" 
                           class="w-full sm:w-[150px] flex items-center justify-center px-6 py-3.5 rounded-xl border-2 border-slate-200 text-slate-600 font-semibold text-sm transition-all duration-300 hover:border-primary hover:text-primary hover:bg-slate-50 group">
                            <svg class="w-4 h-4 mr-2 transition-transform group-hover:-translate-x-1" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 19l-7-7m0 0l7-7m-7 7h18"/></svg>
                            Back
                        </a>
                        
                        <button type="submit" 
                                class="w-full sm:w-auto sm:flex-1 bg-primary text-white py-3.5 rounded-xl font-semibold text-sm transition-all duration-300 hover:bg-primaryDark hover:-translate-y-1 hover:shadow-lg hover:shadow-primary/30 flex items-center justify-center gap-2">
                            Email Verification
                            <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M14 5l7 7m0 0l-7 7m7-7H3"/></svg>
                        </button>
                    </div>
                </form>

            </div>
        </section>
    </main>

</body>
</html>