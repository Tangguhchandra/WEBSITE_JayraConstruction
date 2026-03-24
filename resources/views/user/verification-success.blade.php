<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Verifikasi Berhasil - Jayra Construction</title>
    
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600&family=Outfit:wght@300;400;500;600;700;800&display=swap" rel="stylesheet">
    
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
                        success: '#10B981', /* Warna hijau sukses yang elegan */
                    },
                    animation: {
                        'fade-in-up': 'fadeInUp 0.8s cubic-bezier(0.16, 1, 0.3, 1) forwards',
                        'scale-pop': 'scalePop 0.6s cubic-bezier(0.34, 1.56, 0.64, 1) forwards',
                        'draw-check': 'drawCheck 0.6s cubic-bezier(0.65, 0, 0.45, 1) forwards',
                    },
                    keyframes: {
                        fadeInUp: {
                            '0%': { opacity: '0', transform: 'translateY(20px)' },
                            '100%': { opacity: '1', transform: 'translateY(0)' },
                        },
                        scalePop: {
                            '0%': { opacity: '0', transform: 'scale(0.5)' },
                            '100%': { opacity: '1', transform: 'scale(1)' },
                        },
                        drawCheck: {
                            '0%': { strokeDasharray: '50', strokeDashoffset: '50' },
                            '100%': { strokeDasharray: '50', strokeDashoffset: '0' },
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

    <main class="w-full max-w-[500px] bg-white rounded-[2rem] shadow-[0_20px_60px_-15px_rgba(16,55,92,0.12)] p-10 sm:p-14 relative z-10 opacity-0-initial animate-fade-in-up">
        
        <div class="flex flex-col items-center text-center">
            
            <div class="mb-10 opacity-0-initial animate-fade-in-up" style="animation-delay: 0.1s;">
                <img src="{{ asset('assets/images/logo_website.svg') }}" alt="Jayra Logo" class="h-10 w-auto opacity-80">
            </div>

            <div class="relative w-28 h-28 mb-8 flex items-center justify-center opacity-0-initial animate-scale-pop" style="animation-delay: 0.2s;">
                <div class="absolute inset-0 bg-green-50 rounded-full scale-110"></div>
                <div class="absolute inset-0 bg-green-100/50 rounded-full animate-pulse"></div>
                
                <svg class="relative z-10 w-16 h-16 text-success" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="3" stroke-linecap="round" stroke-linejoin="round">
                    <path class="animate-draw-check" d="M5 13l4 4L19 7" style="stroke-dasharray: 50; stroke-dashoffset: 50;"></path>
                </svg>
                
                <svg class="absolute -top-2 -right-2 w-6 h-6 text-accent opacity-0-initial animate-fade-in-up" style="animation-delay: 0.6s;" fill="currentColor" viewBox="0 0 20 20"><path d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z"></path></svg>
            </div>

            <h1 class="font-display text-3xl sm:text-4xl font-extrabold text-primary tracking-tight mb-4 opacity-0-initial animate-fade-in-up" style="animation-delay: 0.3s;">
                Email Berhasil <br> Diverifikasi
            </h1>
            <p class="text-slate-500 font-medium text-sm sm:text-base leading-relaxed mb-10 opacity-0-initial animate-fade-in-up" style="animation-delay: 0.4s;">
                Selamat! Akun Anda telah berhasil diverifikasi. Silakan masuk untuk mulai mengelola proyek konstruksi Anda.
            </p>

            <div class="w-full opacity-0-initial animate-fade-in-up" style="animation-delay: 0.5s;">
                <a href="{{ url('login') }}" 
                   class="w-full bg-primary text-white py-4 rounded-xl font-bold text-[15px] tracking-wide transition-all duration-300 hover:bg-primaryDark hover:-translate-y-1 hover:shadow-xl hover:shadow-primary/30 flex items-center justify-center gap-3 group">
                    Masuk Sekarang
                    <svg class="w-5 h-5 transition-transform group-hover:translate-x-1" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M14 5l7 7m0 0l-7 7m7-7H3"/></svg>
                </a>
            </div>

            <div class="mt-8 opacity-0-initial animate-fade-in-up" style="animation-delay: 0.6s;">
                <p class="text-sm font-medium text-slate-500">
                    Butuh bantuan? 
                    <a href="#" class="font-bold text-primary hover:text-accent hover:underline underline-offset-4 decoration-2 transition-colors ml-1">
                        Hubungi Dukungan
                    </a>
                </p>
            </div>

        </div>
    </main>

    <footer class="mt-10 text-center opacity-0-initial animate-fade-in-up" style="animation-delay: 0.7s;">
        <p class="text-[11px] font-medium text-slate-400 tracking-widest uppercase">
            &copy; 2026 Jayra Construction
        </p>
    </footer>

</body>
</html>