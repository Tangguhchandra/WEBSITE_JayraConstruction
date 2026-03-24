<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Reset Password - Jayra Construction</title>
    
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600&family=Outfit:wght@300;400;500;600;700;800&display=swap" rel="stylesheet">
    
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
                    },
                    keyframes: {
                        fadeInUp: {
                            '0%': { opacity: '0', transform: 'translateY(20px)' },
                            '100%': { opacity: '1', transform: 'translateY(0)' },
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
    </style>
</head>
<body class="min-h-screen flex flex-col items-center justify-center p-4 sm:p-6 relative overflow-hidden">

    <div class="absolute top-[-10%] left-[-10%] w-[40vw] h-[40vw] rounded-full bg-primary/5 blur-[120px] pointer-events-none"></div>
    <div class="absolute bottom-[-10%] right-[-10%] w-[40vw] h-[40vw] rounded-full bg-accent/10 blur-[120px] pointer-events-none"></div>

    <div class="text-center mb-8 opacity-0-initial animate-fade-in-up" style="animation-delay: 0.1s;">
        <div class="flex justify-center mb-6">
            <img src="{{ asset('assets/images/logo_website.svg') }}" alt="Jayra Logo" class="h-12 w-auto drop-shadow-sm transition-transform hover:scale-105">
        </div>
        <h1 class="font-display text-4xl sm:text-5xl font-extrabold text-primary tracking-tight mb-3">Reset Password</h1>
        <p class="text-slate-500 font-medium text-sm sm:text-base max-w-md mx-auto">Buat password baru yang kuat untuk mengamankan akun Anda.</p>
    </div>

    <main class="w-full max-w-[700px] bg-white rounded-[2rem] shadow-[0_20px_60px_-15px_rgba(16,55,92,0.12)] p-8 sm:p-12 relative z-10 opacity-0-initial animate-fade-in-up" style="animation-delay: 0.2s;">
        
        <div class="w-full mx-auto" 
             x-data="{ 
                 showPass: false, 
                 showConfPass: false,
                 password: '',
                 
                 // Logika Penilaian Password
                 get strengthScore() {
                     let score = 0;
                     if (this.password.length >= 8) score++;
                     if (/[A-Z]/.test(this.password) && /[a-z]/.test(this.password)) score++;
                     if (/[0-9]/.test(this.password)) score++;
                     if (/[^A-Za-z0-9]/.test(this.password)) score++;
                     return score;
                 },
                 get strengthLabel() {
                     if (this.password.length === 0) return '';
                     if (this.strengthScore <= 1) return 'Lemah';
                     if (this.strengthScore === 2 || this.strengthScore === 3) return 'Sedang';
                     return 'Sangat Kuat';
                 },
                 get strengthColor() {
                     if (this.strengthScore <= 1) return 'bg-red-500';
                     if (this.strengthScore === 2 || this.strengthScore === 3) return 'bg-yellow-500';
                     return 'bg-green-500';
                 }
             }">
            
            <form action="#" method="POST" class="flex flex-col">
                @csrf

                <div class="grid grid-cols-1 sm:grid-cols-2 gap-6 mb-8">
                    
                    <div class="space-y-1.5 opacity-0-initial animate-fade-in-up" style="animation-delay: 0.3s;">
                        <label class="text-[11px] font-bold text-slate-500 uppercase tracking-widest ml-1">Password Baru</label>
                        <div class="relative group">
                            <div class="absolute inset-y-0 left-0 pl-4 flex items-center pointer-events-none text-slate-400 group-focus-within:text-primary transition-colors">
                                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M8 11V7a4 4 0 118 0m-4 8v2m-6 4h12a2 2 0 002-2v-6a2 2 0 00-2-2H6a2 2 0 00-2 2v6a2 2 0 002 2z"/></svg>
                            </div>
                            <input :type="showPass ? 'text' : 'password'" name="password" required x-model="password"
                                   class="w-full pl-12 pr-11 py-3.5 rounded-xl border-2 border-slate-100 bg-slate-50/50 text-primary text-sm font-medium focus:bg-white focus:border-primary/30 focus:ring-4 focus:ring-primary/5 transition-all outline-none"
                                   placeholder="Masukan Password Baru">
                            <button type="button" @click="showPass = !showPass" class="absolute inset-y-0 right-0 pr-4 flex items-center text-slate-400 hover:text-primary transition-colors focus:outline-none">
                                <svg x-show="!showPass" class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"/><path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z"/></svg>
                                <svg x-show="showPass" class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24" style="display: none;"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M13.875 18.825A10.05 10.05 0 0112 19c-4.478 0-8.268-2.943-9.543-7a9.97 9.97 0 011.563-3.029m5.858.908a3 3 0 114.243 4.243M9.878 9.878l4.242 4.242M9.882 9.881L4.59 4.59m9.542 9.542l5.87 5.87M21 12a10.05 10.05 0 00-1.226-4.91m-7.954-4.69A9.992 9.992 0 0012 5c4.478 0 8.268 2.943 9.542 7a10.025 10.025 0 01-4.132 5.411m0 0L21 21"/></svg>
                            </button>
                        </div>
                        
                        <div x-show="password.length > 0" x-transition:enter="transition ease-out duration-300" x-transition:enter-start="opacity-0 -translate-y-2" x-transition:enter-end="opacity-100 translate-y-0" class="pt-1">
                            <div class="flex h-1.5 w-full bg-slate-200 rounded-full overflow-hidden">
                                <div class="h-full transition-all duration-500 ease-out" :class="strengthColor" :style="`width: ${(strengthScore / 4) * 100}%`"></div>
                            </div>
                            <div class="flex justify-between items-center mt-1.5">
                                <p class="text-[10px] text-slate-500 font-medium">Keamanan: <span class="font-bold transition-colors" :class="{'text-red-500': strengthScore <= 1, 'text-yellow-500': strengthScore === 2 || strengthScore === 3, 'text-green-500': strengthScore === 4}" x-text="strengthLabel"></span></p>
                            </div>
                        </div>
                    </div>

                    <div class="space-y-1.5 opacity-0-initial animate-fade-in-up" style="animation-delay: 0.4s;">
                        <label class="text-[11px] font-bold text-slate-500 uppercase tracking-widest ml-1">Konfirmasi Password</label>
                        <div class="relative group">
                            <div class="absolute inset-y-0 left-0 pl-4 flex items-center pointer-events-none text-slate-400 group-focus-within:text-primary transition-colors">
                                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M9 12l2 2 4-4m5.618-4.016A11.955 11.955 0 0112 2.944a11.955 11.955 0 01-8.618 3.04A12.02 12.02 0 003 9c0 5.591 3.824 10.29 9 11.622 5.176-1.332 9-6.03 9-11.622 0-1.042-.133-2.052-.382-3.016z"/></svg>
                            </div>
                            <input :type="showConfPass ? 'text' : 'password'" name="password_confirmation" required 
                                   class="w-full pl-12 pr-11 py-3.5 rounded-xl border-2 border-slate-100 bg-slate-50/50 text-primary text-sm font-medium focus:bg-white focus:border-primary/30 focus:ring-4 focus:ring-primary/5 transition-all outline-none"
                                   placeholder="Konfirmasi Password Baru">
                            <button type="button" @click="showConfPass = !showConfPass" class="absolute inset-y-0 right-0 pr-4 flex items-center text-slate-400 hover:text-primary transition-colors focus:outline-none">
                                <svg x-show="!showConfPass" class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"/><path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z"/></svg>
                                <svg x-show="showConfPass" class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24" style="display: none;"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M13.875 18.825A10.05 10.05 0 0112 19c-4.478 0-8.268-2.943-9.543-7a9.97 9.97 0 011.563-3.029m5.858.908a3 3 0 114.243 4.243M9.878 9.878l4.242 4.242M9.882 9.881L4.59 4.59m9.542 9.542l5.87 5.87M21 12a10.05 10.05 0 00-1.226-4.91m-7.954-4.69A9.992 9.992 0 0012 5c4.478 0 8.268 2.943 9.542 7a10.025 10.025 0 01-4.132 5.411m0 0L21 21"/></svg>
                            </button>
                        </div>
                    </div>

                </div>

                <div class="flex flex-col-reverse sm:flex-row justify-between gap-4 pt-6 border-t border-slate-100 opacity-0-initial animate-fade-in-up" style="animation-delay: 0.5s;">
                    <a href="{{ url('login') }}" 
                       class="w-full sm:w-[150px] flex items-center justify-center px-6 py-3.5 rounded-xl border-2 border-slate-200 text-slate-600 font-semibold text-sm transition-all duration-300 hover:border-primary hover:text-primary hover:bg-slate-50 group">
                        <svg class="w-4 h-4 mr-2 transition-transform group-hover:-translate-x-1" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 19l-7-7m0 0l7-7m-7 7h18"/></svg>
                        Back
                    </a>
                    
                    <a href="{{ url('login') }}" 
                       class="w-full sm:w-auto sm:flex-1 bg-primary text-white py-3.5 rounded-xl font-semibold text-sm transition-all duration-300 hover:bg-primaryDark hover:-translate-y-1 hover:shadow-lg hover:shadow-primary/30 flex items-center justify-center gap-2">
                        Simpan Password
                        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"/></svg>
                    </a>
                </div>
            </form>

        </div>
    </main>

    <footer class="mt-10 text-center opacity-0-initial animate-fade-in-up" style="animation-delay: 0.6s;">
        <p class="text-[11px] font-medium text-slate-400 tracking-widest uppercase">
            &copy; 2026 Jayra Construction
        </p>
    </footer>

</body>
</html>