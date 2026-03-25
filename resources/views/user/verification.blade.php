<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Verifikasi Email - Jayra Construction</title>
    
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
        
        /* Menghilangkan panah spinner pada input number OTP */
        input[type=number]::-webkit-inner-spin-button, 
        input[type=number]::-webkit-outer-spin-button { 
            -webkit-appearance: none; 
            margin: 0; 
        }
        input[type=text] {
            -moz-appearance: textfield;
            caret-color: #10375C; /* Warna kursor menyesuaikan primary color */
        }
    </style>
</head>
<body class="min-h-screen flex flex-col items-center justify-center p-4 sm:p-6 relative overflow-hidden">

    <div class="absolute top-[-10%] left-[-10%] w-[40vw] h-[40vw] rounded-full bg-primary/5 blur-[120px] pointer-events-none"></div>
    <div class="absolute bottom-[-10%] right-[-10%] w-[40vw] h-[40vw] rounded-full bg-accent/10 blur-[120px] pointer-events-none"></div>

    <div class="text-center mb-8 opacity-0-initial animate-fade-in-up" style="animation-delay: 0.1s;">
        <div class="flex justify-center mb-6">
            <img src="{{ asset('assets/images/logo_website.svg') }}" alt="Jayra Logo" class="h-14 w-auto drop-shadow-sm transition-transform hover:scale-105">
        </div>
        <h1 class="font-display text-4xl sm:text-5xl font-extrabold text-primary tracking-tight mb-3">Verifikasi Email</h1>
        <p class="text-slate-500 font-medium text-sm sm:text-base max-w-md mx-auto">Masukan 5 digit kode keamanan yang telah kami kirimkan ke email Anda.</p>
    </div>

    <main class="w-full max-w-[540px] bg-white rounded-[2rem] shadow-[0_20px_60px_-15px_rgba(16,55,92,0.12)] p-8 sm:p-12 relative z-10 opacity-0-initial animate-fade-in-up" style="animation-delay: 0.2s;">
        
        <div class="w-full mx-auto" x-data="otpLogic()">
            
            @if ($errors->any())
                <div class="bg-red-50 border border-red-100 text-red-600 px-4 py-3 rounded-xl text-sm font-medium mb-6 text-center">
                    {{ $errors->first() }}
                </div>
            @endif

            <form action="{{ route('verification.post') }}" method="POST" class="flex flex-col items-center">
                @csrf
                
                <input type="hidden" name="otp_code" :value="otp.join('')">

                <h2 class="text-[13px] font-bold text-primary uppercase tracking-widest mb-6 opacity-0-initial animate-fade-in-up" style="animation-delay: 0.3s;">
                    Kode Email
                </h2>

                <div class="flex gap-2 sm:gap-4 justify-center mb-10 w-full opacity-0-initial animate-fade-in-up" style="animation-delay: 0.4s;">
                    <template x-for="(_, index) in 5" :key="index">
                        <input type="text" 
                               :id="`otp-input-${index}`"
                               maxlength="1" 
                               inputmode="numeric"
                               pattern="[0-9]*"
                               autocomplete="one-time-code"
                               x-model="otp[index]"
                               @input="handleInput(index, $event)"
                               @keydown="handleKeydown(index, $event)"
                               @paste="handlePaste($event)"
                               @focus="$event.target.select()" 
                               class="w-14 h-16 sm:w-16 sm:h-20 text-center font-display text-3xl sm:text-4xl font-bold text-primary bg-slate-50 border-2 border-slate-100 rounded-2xl focus:bg-white focus:border-primary focus:ring-4 focus:ring-primary/10 transition-all outline-none shadow-inner"
                               placeholder="·">
                    </template>
                </div>

                <div class="w-full opacity-0-initial animate-fade-in-up" style="animation-delay: 0.5s;">
                    <button type="submit" 
                            class="w-full bg-primary text-white py-4 rounded-xl font-bold text-[15px] tracking-wide transition-all duration-300 hover:bg-primaryDark hover:-translate-y-1 hover:shadow-xl hover:shadow-primary/30 flex items-center justify-center gap-3 group">
                        Verify Now
                        <svg class="w-5 h-5 transition-transform group-hover:translate-x-1" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M14 5l7 7m0 0l-7 7m7-7H3"/></svg>
                    </button>
                </div>

                <div class="mt-8 text-center text-sm opacity-0-initial animate-fade-in-up" style="animation-delay: 0.6s;">
                    <p class="text-slate-500 font-medium">
                        Tidak Menerima Code? 
                        
                        <button type="button" 
                                x-show="canResend" 
                                @click="resendCode()"
                                x-transition:enter="transition ease-out duration-300" 
                                x-transition:enter-start="opacity-0 scale-95" 
                                x-transition:enter-end="opacity-100 scale-100"
                                class="font-bold text-primary hover:text-accent hover:underline underline-offset-4 decoration-2 transition-colors ml-1 focus:outline-none">
                            Kirim Ulang Kode
                        </button>

                        <span x-show="!canResend" class="font-bold text-slate-400 ml-1">
                            Tunggu <span x-text="timer" class="text-primary w-5 inline-block text-left"></span>s
                        </span>
                    </p>
                </div>
            </form>

        </div>
    </main>

    <footer class="mt-10 text-center opacity-0-initial animate-fade-in-up" style="animation-delay: 0.7s;">
        <p class="text-[11px] font-medium text-slate-400 tracking-widest uppercase">
            &copy; {{ date('Y') }} Jayra Construction
        </p>
    </footer>

    <script>
        function otpLogic() {
            return {
                otp: ['', '', '', '', ''],
                timer: 60,
                canResend: false,
                interval: null,
                
                init() {
                    this.startTimer();
                    // Fokus ke input pertama saat halaman termuat
                    setTimeout(() => {
                        this.focusInput(0);
                    }, 800);
                },

                // Fungsi helper untuk memindahkan fokus dengan aman
                focusInput(index) {
                    const el = document.getElementById(`otp-input-${index}`);
                    if (el) {
                        el.focus();
                        // Memberikan sedikit delay agar teks langsung ter-blok (auto-select)
                        setTimeout(() => el.select(), 10);
                    }
                },

                startTimer() {
                    this.timer = 60;
                    this.canResend = false;
                    clearInterval(this.interval);
                    
                    this.interval = setInterval(() => {
                        if (this.timer > 0) {
                            this.timer--;
                        } else {
                            this.canResend = true;
                            clearInterval(this.interval);
                        }
                    }, 1000);
                },

                resendCode() {
                    console.log('Mengirim ulang kode...');
                    this.startTimer();
                    this.otp = ['', '', '', '', '']; // Kosongkan form
                    this.focusInput(0); // Kembali ke awal
                },

                handleInput(index, event) {
                    // Mencegah karakter non-angka
                    const val = event.target.value.replace(/[^0-9]/g, '');
                    this.otp[index] = val;
                    
                    // Pindah fokus ke kotak berikutnya jika kotak saat ini sudah terisi angka
                    if (val && index < 4) {
                        this.focusInput(index + 1);
                    }
                },

                handleKeydown(index, event) {
                    // LOGIKA 1: Smart Backspace
                    if (event.key === 'Backspace') {
                        // Jika kotak saat ini kosong dan bukan kotak pertama
                        if (!this.otp[index] && index > 0) {
                            event.preventDefault(); // Mencegah perilaku default browser
                            this.otp[index - 1] = ''; // Kosongkan kotak sebelumnya
                            this.focusInput(index - 1); // Pindahkan kursor ke kotak sebelumnya
                        }
                    } 
                    // LOGIKA 2: Navigasi Keyboard Arrow Kiri
                    else if (event.key === 'ArrowLeft' && index > 0) {
                        event.preventDefault();
                        this.focusInput(index - 1);
                    } 
                    // LOGIKA 3: Navigasi Keyboard Arrow Kanan
                    else if (event.key === 'ArrowRight' && index < 4) {
                        event.preventDefault();
                        this.focusInput(index + 1);
                    }
                },

                handlePaste(event) {
                    event.preventDefault();
                    // Ambil teks yang dipaste, buang huruf, sisakan hanya angka
                    let paste = (event.clipboardData || window.clipboardData).getData('text').replace(/\D/g, '');
                    
                    if (paste.length > 0) {
                        // Memasukkan angka satu per satu ke dalam array (maksimal 5 kotak)
                        const pasteArray = paste.slice(0, 5).split('');
                        pasteArray.forEach((char, i) => {
                            if (i < 5) this.otp[i] = char;
                        });
                        
                        // Otomatis fokus ke kotak terakhir yang terisi, atau kotak terakhir (ke-5)
                        const focusIndex = Math.min(pasteArray.length, 4);
                        this.focusInput(focusIndex);
                    }
                }
            }
        }
    </script>
</body>
</html>