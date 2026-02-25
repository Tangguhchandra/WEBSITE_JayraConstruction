<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login - Jayra Construction</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;500;600;700;800&display=swap" rel="stylesheet">
    
    <!-- Alpine.js for Slider Interactivity -->
    <script defer src="https://cdn.jsdelivr.net/npm/alpinejs@3.x.x/dist/cdn.min.js"></script>
    
    <style>
        body { font-family: 'Poppins', sans-serif; }
        
        /* Custom Animations */
        @keyframes fadeUp {
            from { opacity: 0; transform: translateY(20px); }
            to { opacity: 1; transform: translateY(0); }
        }
        
        @keyframes scaleIn {
            from { opacity: 0; transform: scale(0.95); }
            to { opacity: 1; transform: scale(1); }
        }

        @keyframes float {
            0% { transform: translateY(0px); }
            50% { transform: translateY(-10px); }
            100% { transform: translateY(0px); }
        }

        /* Animation Classes */
        .animate-fade-up { animation: fadeUp 0.6s cubic-bezier(0.16, 1, 0.3, 1) forwards; }
        .animate-scale-in { animation: scaleIn 0.7s cubic-bezier(0.16, 1, 0.3, 1) forwards; }
        .animate-float { animation: float 6s ease-in-out infinite; }
        
        /* Staggered Delays */
        .delay-100 { animation-delay: 100ms; opacity: 0; }
        .delay-200 { animation-delay: 200ms; opacity: 0; }
        .delay-300 { animation-delay: 300ms; opacity: 0; }
        .delay-400 { animation-delay: 400ms; opacity: 0; }
        
        /* Input & Button Transition Enhancements */
        .input-focus-effect {
            transition: all 0.3s ease;
        }
        .input-focus-effect:focus {
            transform: translateY(-2px);
            box-shadow: 0 10px 15px -3px rgba(21, 49, 91, 0.1);
        }
        
        .btn-hover-effect {
            transition: all 0.3s cubic-bezier(0.4, 0, 0.2, 1);
        }
        .btn-hover-effect:hover {
            transform: translateY(-3px);
            box-shadow: 0 10px 25px -5px rgba(21, 49, 91, 0.3);
        }
        .btn-hover-effect:active {
            transform: translateY(1px);
        }

        .social-btn-hover {
            transition: all 0.3s ease;
        }
        .social-btn-hover:hover {
            transform: translateY(-3px);
            box-shadow: 0 10px 15px -3px rgba(0, 0, 0, 0.1);
        }
    </style>
    <!-- Fallback if Vite is not running -->
    <script src="https://cdn.tailwindcss.com"></script>
    <script>
        tailwind.config = {
            theme: {
                extend: {
                    colors: {
                        navy: '#15315B',
                        yellowcard: '#FFCD22',
                    }
                }
            }
        }
    </script>
</head>
<body class="bg-[#f7f8fa] flex items-center justify-center min-h-screen p-4 sm:p-8 relative overflow-hidden" style="background-image: url('data:image/svg+xml,%3Csvg width=\'100\' height=\'100\' viewBox=\'0 0 100 100\' xmlns=\'http://www.w3.org/2000/svg\'%3E%3Cpath d=\'M0 0h100v100H0z\' fill=\'%23f7f8fa\'/%3E%3C/svg%3E'); background-size: cover;">
    
    <!-- Background Accents (Animated) -->
    <div class="absolute top-[-10%] left-[-10%] w-[40%] h-[40%] bg-navy opacity-[0.03] rounded-full blur-[100px] animate-float"></div>
    <div class="absolute bottom-[-10%] right-[-10%] w-[50%] h-[50%] bg-[#FFCD22] opacity-[0.05] rounded-full blur-[100px] animate-float" style="animation-delay: -3s;"></div>

    <div class="max-w-[1200px] w-full flex flex-col md:flex-row gap-12 lg:gap-20 items-center justify-center relative z-10">
        
        <!-- Left Side: Image Slider (Alpine.js) -->
        <div class="w-full md:w-5/12 hidden md:flex justify-center animate-scale-in" x-data="{ currentSlide: 0, slides: ['[ Tempat Foto 1 /<br>Hard Hat, Blueprint ]', '[ Tempat Foto 2 /<br>Project Site ]', '[ Tempat Foto 3 /<br>Team at Work ]', '[ Tempat Foto 4 /<br>Building Design ]'] }">
            <div class="bg-[#EAEAEA] w-full h-[650px] rounded-[2rem] shadow-[0_20px_50px_-12px_rgba(0,0,0,0.1)] relative overflow-hidden flex flex-col items-center justify-center transition-transform hover:scale-[1.01] duration-500 group">
                
                <!-- Slide Container -->
                <div class="relative w-full h-full flex items-center justify-center overflow-hidden">
                    <template x-for="(slide, index) in slides" :key="index">
                        <div x-show="currentSlide === index" 
                             x-transition:enter="transition ease-out duration-500 transform" 
                             x-transition:enter-start="opacity-0 translate-x-12" 
                             x-transition:enter-end="opacity-100 translate-x-0"
                             x-transition:leave="transition ease-in duration-300 transform absolute inset-0" 
                             x-transition:leave-start="opacity-100 translate-x-0" 
                             x-transition:leave-end="opacity-0 -translate-x-12"
                             class="flex items-center justify-center w-full h-full p-8 absolute">
                            <span class="text-gray-400 font-medium text-lg border-2 border-dashed border-gray-300 p-8 rounded-xl text-center group-hover:border-navy transition-colors" x-html="slide"></span>
                        </div>
                    </template>
                </div>

                <!-- Navigation Arrows -->
                <button @click="currentSlide = currentSlide === 0 ? slides.length - 1 : currentSlide - 1" class="absolute left-4 w-10 h-10 rounded-full bg-white/50 backdrop-blur shadow hover:bg-white text-navy flex items-center justify-center opacity-0 group-hover:opacity-100 transition-opacity duration-300 z-10">
                    <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 19l-7-7 7-7"></path></svg>
                </button>
                <button @click="currentSlide = currentSlide === slides.length - 1 ? 0 : currentSlide + 1" class="absolute right-4 w-10 h-10 rounded-full bg-white/50 backdrop-blur shadow hover:bg-white text-navy flex items-center justify-center opacity-0 group-hover:opacity-100 transition-opacity duration-300 z-10">
                    <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"></path></svg>
                </button>
                
                <!-- Dots Indicator Container -->
                <div class="absolute bottom-8 flex space-x-3 z-10">
                    <template x-for="(slide, index) in slides" :key="index">
                        <button @click="currentSlide = index" 
                                :class="{ 'bg-yellowcard w-6': currentSlide === index, 'bg-gray-300 w-3': currentSlide !== index }"
                                class="h-3 rounded-full transition-all duration-500 ease-[cubic-bezier(0.4,0,0.2,1)] transform hover:scale-110 cursor-pointer shadow-sm focus:outline-none"
                                aria-label="Go to slide">
                        </button>
                    </template>
                </div>
            </div>
        </div>

        <!-- Right Side: Login Form -->
        <div class="w-full md:w-6/12 flex flex-col items-center">
            <h1 class="text-4xl lg:text-[44px] font-[800] text-navy mb-2 tracking-tight text-center animate-fade-up">Jayra Construction</h1>
            <p class="text-[19px] text-navy font-semibold mb-6 text-center animate-fade-up delay-100">Silakan Login Akun Anda</p>
            
            <div class="bg-yellowcard w-full max-w-[480px] rounded-[1.5rem] p-8 sm:p-10 shadow-[0_25px_50px_-12px_rgba(255,205,34,0.3)] relative animate-fade-up delay-200 z-20 group">
                <!-- Subtle card shimmer effect on hover -->
                <div class="absolute inset-0 bg-gradient-to-tr from-white/0 via-white/20 to-white/0 opacity-0 group-hover:opacity-100 transition-opacity duration-1000 -z-10 rounded-[1.5rem] pointer-events-none"></div>

                <h2 class="text-[1.6rem] font-bold text-navy text-center mb-8">Login Akun</h2>
                
                <form action="#" method="POST" class="space-y-6">
                    <div class="animate-fade-up delay-300">
                        <label for="email" class="block text-[13.5px] font-semibold text-navy mb-2 transition-colors">Email/Username</label>
                        <input type="text" id="email" name="email" placeholder="Masukan Email/Username Anda" class="w-full px-5 py-3.5 rounded-lg border-2 border-transparent bg-[#F4F5F7] placeholder-gray-400 text-[13.5px] focus:border-navy focus:bg-white focus:ring-4 focus:ring-navy/10 outline-none text-navy font-medium input-focus-effect">
                    </div>
                    
                    <div class="animate-fade-up delay-300">
                        <label for="password" class="block text-[13.5px] font-semibold text-navy mb-2">Password</label>
                        <input type="password" id="password" name="password" placeholder="Masukan Password Anda" class="w-full px-5 py-3.5 rounded-lg border-2 border-transparent bg-[#F4F5F7] placeholder-gray-400 text-[13.5px] focus:border-navy focus:bg-white focus:ring-4 focus:ring-navy/10 outline-none text-navy font-medium input-focus-effect">
                    </div>
                    
                    <div class="flex items-center justify-between pt-1 animate-fade-up delay-300">
                        <label class="flex items-center space-x-1.5 cursor-pointer group/cb">
                            <div class="relative flex items-center">
                                <input type="checkbox" class="w-4 h-4 rounded text-[#0ea5e9] border-0 bg-white focus:ring-0 focus:ring-offset-0 transition-opacity cursor-pointer">
                            </div>
                            <span class="text-[13px] font-semibold text-navy group-hover/cb:text-opacity-80 transition-colors">Ingat saya</span>
                        </label>
                        <a href="{{ route('reset-password') }}" class="text-[13px] font-bold text-navy hover:underline decoration-2 underline-offset-2 transition-all">Lupa Password</a>
                    </div>
                    
                    <div class="flex space-x-4 pt-4 animate-fade-up delay-400">
                        <a href="{{ url('register') }}" class="flex-1 py-3.5 px-4 bg-[#F2F4F7] text-navy border-[2px] border-navy rounded-[14px] font-bold text-[15px] hover:bg-white hover:text-navy hover:shadow-lg hover:-translate-y-1 transition-all duration-300 text-center flex items-center justify-center">
                            Sign-Up
                        </a>
                        <button type="submit" class="flex-1 py-3.5 px-4 bg-navy text-white rounded-[14px] font-bold text-[15px] btn-hover-effect">
                            Login
                        </button>
                    </div>
                </form>
                
                <div class="mt-8 flex items-center justify-center relative">
                    <div class="border-t-[1.5px] border-navy w-full absolute top-1/2 left-0 -z-10 opacity-30"></div>
                    <span class="px-5 text-[14px] font-bold text-navy bg-yellowcard z-10">Login With</span>
                </div>
                
                <div class="mt-8 flex space-x-4">
                    <button type="button" class="flex-1 flex items-center justify-center py-3.5 bg-white rounded-[14px] hover:shadow-md transition-shadow">
                        <svg class="h-[22px] w-[22px] text-[#1877F2] mr-3" fill="currentColor" viewBox="0 0 24 24"><path d="M24 12.073c0-6.627-5.373-12-12-12s-12 5.373-12 12c0 5.99 4.388 10.954 10.125 11.854v-8.385H7.078v-3.469h3.047V9.43c0-3.007 1.792-4.669 4.533-4.669 1.312 0 2.686.235 2.686.235v2.953H15.83c-1.491 0-1.956.925-1.956 1.874v2.25h3.328l-.532 3.469h-2.796v8.385C19.612 23.027 24 18.062 24 12.073z"/></svg>
                        <span class="font-bold text-navy text-[14.5px]">Facebook</span>
                    </button>
                    
                    <button type="button" class="flex-1 flex items-center justify-center py-3.5 bg-white rounded-[14px] hover:shadow-md transition-shadow">
                        <svg class="h-[22px] w-[22px] mr-3" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path d="M22.56 12.25c0-.78-.07-1.53-.2-2.25H12v4.26h5.92c-.26 1.37-1.04 2.53-2.21 3.31v2.77h3.57c2.08-1.92 3.28-4.74 3.28-8.09z" fill="#4285F4"/><path d="M12 23c2.97 0 5.46-.98 7.28-2.66l-3.57-2.77c-.98.66-2.23 1.06-3.71 1.06-2.86 0-5.29-1.93-6.16-4.53H2.18v2.84C3.99 20.53 7.7 23 12 23z" fill="#34A853"/><path d="M5.84 14.09c-.22-.66-.35-1.36-.35-2.09s.13-1.43.35-2.09V7.07H2.18C1.43 8.55 1 10.22 1 12s.43 3.45 1.18 4.93l2.85-2.22.81-.62z" fill="#FBBC05"/><path d="M12 5.38c1.62 0 3.06.56 4.21 1.64l3.15-3.15C17.45 2.09 14.97 1 12 1 7.7 1 3.99 3.47 2.18 7.07l3.66 2.84c.87-2.6 3.3-4.53 6.16-4.53z" fill="#EA4335"/></svg>
                        <span class="font-bold text-navy text-[14.5px]">Google</span>
                    </button>
                </div>
            </div>
            
        </div>
    </div>
</body>
</html>
