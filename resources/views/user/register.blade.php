<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Register - Jayra Construction</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;500;600;700;800&display=swap" rel="stylesheet">
    
    <!-- Alpine.js -->
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
        .delay-500 { animation-delay: 500ms; opacity: 0; }
        
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
    
    <!-- Background Accents (Animated) from login pattern -->
    <div class="absolute top-[-10%] left-[-10%] w-[40%] h-[40%] bg-navy opacity-[0.03] rounded-full blur-[100px] animate-float"></div>
    <div class="absolute bottom-[-10%] right-[-10%] w-[50%] h-[50%] bg-[#FFCD22] opacity-[0.05] rounded-full blur-[100px] animate-float" style="animation-delay: -3s;"></div>

    <div class="max-w-[950px] w-full flex flex-col items-center justify-center relative z-10">
        
        <h1 class="text-3xl sm:text-4xl lg:text-[42px] font-[800] text-navy mb-3 tracking-tight text-center animate-fade-up">Registrasi Akun Jayra Construction</h1>
        <p class="text-[19px] text-navy font-semibold mb-8 text-center animate-fade-up delay-100">Silakan Mengisi Data Diri</p>
        
        <div class="bg-yellowcard w-full rounded-[1.5rem] p-8 sm:p-12 lg:p-[50px] shadow-[0_25px_50px_-12px_rgba(255,205,34,0.3)] relative animate-fade-up delay-200 group">
            <!-- Subtle card shimmer effect on hover -->
            <div class="absolute inset-0 bg-gradient-to-tr from-white/0 via-white/20 to-white/0 opacity-0 group-hover:opacity-100 transition-opacity duration-1000 -z-10 rounded-[1.5rem] pointer-events-none"></div>

            <h2 class="text-[1.6rem] font-bold text-navy text-center mb-8">Registrasi Akun</h2>
            
            <form action="#" method="POST">
                <!-- 2-Column Grid for Inputs -->
                <div class="grid grid-cols-1 md:grid-cols-2 gap-x-14 gap-y-7">
                    
                    <!-- Row 1 -->
                    <div class="animate-fade-up delay-300 relative">
                        <label for="name" class="block text-[14px] font-semibold text-navy mb-2.5 transition-colors">Nama Lengkap</label>
                        <input type="text" id="name" name="name" placeholder="Masukan Nama Lengkap Anda" class="w-full px-5 py-[14px] rounded-xl border-2 border-transparent bg-[#F4F5F7] placeholder-[#a0aabf] text-[13.5px] focus:border-navy focus:bg-white focus:ring-4 focus:ring-navy/10 outline-none text-navy font-medium input-focus-effect">
                    </div>
                    <div class="animate-fade-up delay-300 relative">
                        <label for="email" class="block text-[14px] font-semibold text-navy mb-2.5 transition-colors">Email</label>
                        <input type="email" id="email" name="email" placeholder="Masukan Email Anda" class="w-full px-5 py-[14px] rounded-xl border-2 border-transparent bg-[#F4F5F7] placeholder-[#a0aabf] text-[13.5px] focus:border-navy focus:bg-white focus:ring-4 focus:ring-navy/10 outline-none text-navy font-medium input-focus-effect">
                    </div>
                    
                    <!-- Row 2 -->
                    <div class="animate-fade-up delay-400 relative">
                        <label for="username" class="block text-[14px] font-semibold text-navy mb-2.5 transition-colors">Username</label>
                        <input type="text" id="username" name="username" placeholder="Masukan Username Anda" class="w-full px-5 py-[14px] rounded-xl border-2 border-transparent bg-[#F4F5F7] placeholder-[#a0aabf] text-[13.5px] focus:border-navy focus:bg-white focus:ring-4 focus:ring-navy/10 outline-none text-navy font-medium input-focus-effect">
                    </div>
                    <div class="animate-fade-up delay-400 relative">
                        <label for="phone" class="block text-[14px] font-semibold text-navy mb-2.5 transition-colors">No. Handphone</label>
                        <input type="tel" id="phone" name="phone" placeholder="Masukan Nomor Handphone" class="w-full px-5 py-[14px] rounded-xl border-2 border-transparent bg-[#F4F5F7] placeholder-[#a0aabf] text-[13.5px] focus:border-navy focus:bg-white focus:ring-4 focus:ring-navy/10 outline-none text-navy font-medium input-focus-effect">
                    </div>
                    
                    <!-- Row 3 (Passwords with Show/Hide feature) -->
                    <div class="animate-fade-up delay-500 relative" x-data="{ show: false }">
                        <label for="password" class="block text-[14px] font-semibold text-navy mb-2.5 transition-colors">Password</label>
                        <div class="relative">
                            <input :type="show ? 'text' : 'password'" id="password" name="password" placeholder="Masukan Password Anda" class="w-full pl-5 pr-12 py-[14px] rounded-xl border-2 border-transparent bg-[#F4F5F7] placeholder-[#a0aabf] text-[13.5px] focus:border-navy focus:bg-white focus:ring-4 focus:ring-navy/10 outline-none text-navy font-medium input-focus-effect transition-all">
                            <button type="button" @click="show = !show" class="absolute inset-y-0 right-4 flex items-center text-[#a0aabf] hover:text-navy transition-colors focus:outline-none cursor-pointer">
                                <!-- Design-matched Eye Icon (Visible) -->
                                <svg x-show="show" style="display: none;" class="w-[22px] h-[22px]" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                    <path d="M12 5C7.305 5 3.328 8.167 1.5 12C3.328 15.833 7.305 19 12 19C16.695 19 20.672 15.833 22.5 12C20.672 8.167 16.695 5 12 5ZM12 16.5C9.519 16.5 7.5 14.481 7.5 12C7.5 9.519 9.519 7.5 12 7.5C14.481 7.5 16.5 9.519 16.5 12C16.5 14.481 14.481 16.5 12 16.5ZM12 9.5C10.621 9.5 9.5 10.621 9.5 12C9.5 13.379 10.621 14.5 12 14.5C13.379 14.5 14.5 13.379 14.5 12C14.5 10.621 13.379 9.5 12 9.5Z" fill="currentColor"/>
                                    <!-- A strikethrough line to indicate 'hidden' mode is disabled (eye is open) -->
                                </svg>
                                <!-- Design-matched Eye Icon with Strike (Hidden) -->
                                <svg x-show="!show" class="w-[22px] h-[22px]" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                    <path d="M12 5C7.305 5 3.328 8.167 1.5 12C3.328 15.833 7.305 19 12 19C16.695 19 20.672 15.833 22.5 12C20.672 8.167 16.695 5 12 5ZM12 16.5C9.519 16.5 7.5 14.481 7.5 12C7.5 9.519 9.519 7.5 12 7.5C14.481 7.5 16.5 9.519 16.5 12C16.5 14.481 14.481 16.5 12 16.5ZM12 9.5C10.621 9.5 9.5 10.621 9.5 12C9.5 13.379 10.621 14.5 12 14.5C13.379 14.5 14.5 13.379 14.5 12C14.5 10.621 13.379 9.5 12 9.5Z" fill="currentColor"/>
                                    <!-- Strike line -->
                                    <path d="M4 4L20 20" stroke="currentColor" stroke-width="2.5" stroke-linecap="round"/>
                                </svg>
                            </button>
                        </div>
                    </div>
                    
                    <div class="animate-fade-up delay-500 relative" x-data="{ show: false }">
                        <label for="password_confirmation" class="block text-[14px] font-semibold text-navy mb-2.5 transition-colors">Konfirmasi Password</label>
                        <div class="relative">
                            <input :type="show ? 'text' : 'password'" id="password_confirmation" name="password_confirmation" placeholder="Konfirmasi Password Anda" class="w-full pl-5 pr-12 py-[14px] rounded-xl border-2 border-transparent bg-[#F4F5F7] placeholder-[#a0aabf] text-[13.5px] focus:border-navy focus:bg-white focus:ring-4 focus:ring-navy/10 outline-none text-navy font-medium input-focus-effect transition-all">
                            <button type="button" @click="show = !show" class="absolute inset-y-0 right-4 flex items-center text-[#a0aabf] hover:text-navy transition-colors focus:outline-none cursor-pointer">
                                <!-- Design-matched Eye Icon (Visible) -->
                                <svg x-show="show" style="display: none;" class="w-[22px] h-[22px]" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                    <path d="M12 5C7.305 5 3.328 8.167 1.5 12C3.328 15.833 7.305 19 12 19C16.695 19 20.672 15.833 22.5 12C20.672 8.167 16.695 5 12 5ZM12 16.5C9.519 16.5 7.5 14.481 7.5 12C7.5 9.519 9.519 7.5 12 7.5C14.481 7.5 16.5 9.519 16.5 12C16.5 14.481 14.481 16.5 12 16.5ZM12 9.5C10.621 9.5 9.5 10.621 9.5 12C9.5 13.379 10.621 14.5 12 14.5C13.379 14.5 14.5 13.379 14.5 12C14.5 10.621 13.379 9.5 12 9.5Z" fill="currentColor"/>
                                </svg>
                                <!-- Design-matched Eye Icon with Strike (Hidden) -->
                                <svg x-show="!show" class="w-[22px] h-[22px]" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                    <path d="M12 5C7.305 5 3.328 8.167 1.5 12C3.328 15.833 7.305 19 12 19C16.695 19 20.672 15.833 22.5 12C20.672 8.167 16.695 5 12 5ZM12 16.5C9.519 16.5 7.5 14.481 7.5 12C7.5 9.519 9.519 7.5 12 7.5C14.481 7.5 16.5 9.519 16.5 12C16.5 14.481 14.481 16.5 12 16.5ZM12 9.5C10.621 9.5 9.5 10.621 9.5 12C9.5 13.379 10.621 14.5 12 14.5C13.379 14.5 14.5 13.379 14.5 12C14.5 10.621 13.379 9.5 12 9.5Z" fill="currentColor"/>
                                    <!-- Strike line -->
                                    <path d="M4 4L20 20" stroke="currentColor" stroke-width="2.5" stroke-linecap="round"/>
                                </svg>
                            </button>
                        </div>
                    </div>
                </div>
                
                <!-- Buttons Area -->
                <div class="mt-14 flex flex-col-reverse sm:flex-row items-center justify-between gap-4 pb-2 animate-fade-up delay-500">
                    <a href="{{ route('login') }}" class="w-full sm:w-auto min-w-[140px] py-[13.5px] px-10 bg-[#F2F4F7] text-navy border-[2px] border-navy rounded-[14px] font-bold text-[15px] hover:bg-white hover:text-navy hover:shadow-lg hover:-translate-y-1 transition-all duration-300 text-center flex items-center justify-center">
                        Back
                    </a>
                    <a href="{{ route('verification') }}" class="w-full sm:w-auto min-w-[200px] py-[14px] px-8 bg-navy text-white rounded-[14px] font-bold text-[15px] btn-hover-effect text-center shadow-lg shadow-navy/20">
                        Email Verification
                    </a>
                </div>
            </form>
            
        </div>
    </div>
</body>
</html>
