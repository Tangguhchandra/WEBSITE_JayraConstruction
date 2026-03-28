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
        
        @if ($errors->any())
            <div class="bg-red-50 border border-red-200 text-red-600 px-4 py-3 rounded-xl text-sm mb-6 font-medium">
                {{ $errors->first() }}
            </div>
        @endif

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
            
            <form action="{{ route('password.update') }}" method="POST" class="flex flex-col">
                @csrf
                
                <input type="hidden" name="token" value="{{ $token ?? '' }}">
                <input type="hidden" name="email" value="{{ request()->email ?? old('email') }}">

                <div class="grid grid-cols-1 sm:grid-cols-2 gap-6 mb-8">
                    
                    <div class="space-y-1.5 opacity-0-initial animate-fade-in-up" style="animation-delay: 0.3s;">
                        <label class="text-[11px] font-bold text-slate-500 uppercase tracking-widest ml-1">Password Baru</label>
                        <div class="relative group">
                            <input :type="showPass ? 'text' : 'password'" name="password" required x-model="password"
                                   class="w-full pl-4 pr-11 py-3.5 rounded-xl border-2 border-slate-100 bg-slate-50/50 text-[#10375C] text-sm font-medium focus:bg-white focus:border-[#10375C]/30 outline-none transition-all"
                                   placeholder="Masukan Password Baru">
                            <button type="button" @click="showPass = !showPass" class="absolute inset-y-0 right-0 pr-4 flex items-center text-slate-400 hover:text-[#10375C] outline-none">
                                <span class="text-xs font-bold" x-text="showPass ? 'HIDE' : 'SHOW'"></span>
                            </button>
                        </div>
                        
                        <div x-show="password.length > 0" class="pt-1">
                            <div class="flex h-1.5 w-full bg-slate-200 rounded-full overflow-hidden">
                                <div class="h-full transition-all duration-500 ease-out" :class="strengthColor" :style="`width: ${(strengthScore / 4) * 100}%`"></div>
                            </div>
                            <div class="flex justify-between items-center mt-1.5">
                                <p class="text-[10px] text-slate-500 font-medium">Keamanan: <span class="font-bold" :class="{'text-red-500': strengthScore <= 1, 'text-yellow-500': strengthScore === 2 || strengthScore === 3, 'text-green-500': strengthScore === 4}" x-text="strengthLabel"></span></p>
                            </div>
                        </div>
                    </div>

                    <div class="space-y-1.5 opacity-0-initial animate-fade-in-up" style="animation-delay: 0.4s;">
                        <label class="text-[11px] font-bold text-slate-500 uppercase tracking-widest ml-1">Konfirmasi Password</label>
                        <div class="relative group">
                            <input :type="showConfPass ? 'text' : 'password'" name="password_confirmation" required 
                                   class="w-full pl-4 pr-11 py-3.5 rounded-xl border-2 border-slate-100 bg-slate-50/50 text-[#10375C] text-sm font-medium focus:bg-white focus:border-[#10375C]/30 outline-none transition-all"
                                   placeholder="Ulangi Password Baru">
                            <button type="button" @click="showConfPass = !showConfPass" class="absolute inset-y-0 right-0 pr-4 flex items-center text-slate-400 hover:text-[#10375C] outline-none">
                                <span class="text-xs font-bold" x-text="showConfPass ? 'HIDE' : 'SHOW'"></span>
                            </button>
                        </div>
                    </div>

                </div>

                <div class="flex flex-col-reverse sm:flex-row justify-between gap-4 pt-6 border-t border-slate-100 opacity-0-initial animate-fade-in-up" style="animation-delay: 0.5s;">
                    <a href="{{ route('login') }}" class="w-full sm:w-[150px] flex items-center justify-center px-6 py-3.5 rounded-xl border-2 border-slate-200 text-slate-600 font-semibold text-sm hover:border-[#10375C] hover:text-[#10375C] hover:bg-slate-50 transition-all">
                        Batal
                    </a>
                    
                    <button type="submit" class="w-full sm:w-auto sm:flex-1 bg-[#10375C] text-white py-3.5 rounded-xl font-semibold text-sm hover:bg-[#0b2742] hover:-translate-y-1 shadow-lg transition-all flex items-center justify-center gap-2">
                        Simpan Password Baru
                    </button>
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