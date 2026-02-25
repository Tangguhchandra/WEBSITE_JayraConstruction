<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Reset Password - Jayra Construction</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;500;600;700;800&display=swap" rel="stylesheet">
    
    <!-- Alpine.js -->
    <script defer src="https://cdn.jsdelivr.net/npm/alpinejs@3.x.x/dist/cdn.min.js"></script>

    <style>
        body { 
            font-family: 'Poppins', sans-serif; 
            background-color: #F8F9FB;
        }
        
        .bg-marble {
            background-image: url("data:image/svg+xml,%3Csvg viewBox='0 0 200 200' xmlns='http://www.w3.org/2000/svg'%3E%3Cfilter id='noiseFilter'%3E%3CfeTurbulence type='fractalNoise' baseFrequency='0.015' numOctaves='3' stitchTiles='stitch'/%3E%3C/filter%3E%3Crect width='100%25' height='100%25' filter='url(%23noiseFilter)' opacity='0.08'/%3E%3C/svg%3E");
        }

        /* Custom Animations */
        @keyframes fadeUp {
            from { opacity: 0; transform: translateY(20px); }
            to { opacity: 1; transform: translateY(0); }
        }
        
        @keyframes float {
            0% { transform: translateY(0px); }
            50% { transform: translateY(-10px); }
            100% { transform: translateY(0px); }
        }

        /* Animation Classes */
        .animate-fade-up { animation: fadeUp 0.6s cubic-bezier(0.16, 1, 0.3, 1) forwards; }
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
        .input-focus-effect:hover, 
        .input-focus-effect:focus,
        .pw-group:hover .input-focus-effect,
        .pw-group:focus-within .input-focus-effect {
            transform: translateY(-2px);
            box-shadow: 0 10px 15px -3px rgba(21, 49, 91, 0.1);
        }
        
        .pw-icon {
            transition: all 0.3s ease;
        }
        .pw-group:hover .pw-icon,
        .pw-group:focus-within .pw-icon {
            transform: translateY(-2px);
        }
        
        .btn-hover-effect {
            transition: all 0.3s cubic-bezier(0.4, 0, 0.2, 1);
        }
        .btn-hover-effect:hover {
            transform: translateY(-3px);
            box-shadow: 0 15px 25px -5px rgba(21, 49, 91, 0.3);
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
                        yellowcard: '#EFC123',
                    },
                    boxShadow: {
                        'card': '0 15px 40px -10px rgba(0,0,0,0.1)',
                    }
                }
            }
        }
    </script>
</head>
<body class="flex items-center justify-center min-h-screen relative overflow-hidden bg-[#F4F5F8]">
    
    <!-- Pattern Background mimicking Marbled texture -->
    <div class="absolute inset-0 w-full h-full z-0 opacity-40 bg-marble mix-blend-multiply pointer-events-none"></div>

    <!-- Soft radial gradients for texture depth (Animated Float) -->
    <div class="absolute w-[800px] h-[800px] bg-white opacity-40 rounded-full blur-3xl -top-40 -left-40 z-0 animate-float"></div>
    <div class="absolute w-[600px] h-[600px] bg-white opacity-40 rounded-full blur-3xl -bottom-20 -right-20 z-0 animate-float" style="animation-delay: -3s;"></div>

    <div class="w-full max-w-[900px] px-5 z-10 flex flex-col items-center">
        <!-- Text Header -->
        <h1 class="text-[38px] sm:text-[44px] font-[800] text-navy mb-1 tracking-tight text-center drop-shadow-sm leading-tight mt-[-20px] animate-fade-up">Reset Password</h1>
        <p class="text-[17px] sm:text-[19px] text-navy font-semibold mb-12 text-center opacity-90 animate-fade-up delay-100">Reset Password Akun Anda</p>
        
        <!-- Yellow Card Box based exactly on the image -->
        <!-- Wide rectangle card like the design -->
        <div class="bg-[#F6C624] w-full rounded-[1.2rem] shadow-card py-12 px-8 sm:px-14 flex flex-col items-center relative overflow-hidden animate-fade-up delay-200 group">
            
            <!-- Subtle shimmer overlay -->
            <div class="absolute inset-0 bg-gradient-to-tr from-white/0 via-white/20 to-white/0 opacity-0 group-hover:opacity-100 transition-opacity duration-1000 z-0 pointer-events-none"></div>

            <h2 class="text-[1.3rem] font-[800] text-navy text-center mb-10 tracking-wide z-10 animate-fade-up delay-300">Buat Password Baru</h2>
            
            <form action="#" method="POST" class="w-full relative z-10">
                
                <!-- 2-Column Layout for Passwords -->
                <div class="grid grid-cols-1 md:grid-cols-2 gap-x-12 gap-y-8 mb-16">
                    
                    <!-- New Password Input -->
                    <div class="animate-fade-up delay-400 z-20" x-data="{ show: false }">
                        <label for="password" class="block text-[14px] font-[700] text-navy mb-2.5 transition-colors">New Password</label>
                        <div class="relative pw-group group/pw focus-within:z-50 hover:z-50">
                            <!-- Inset shadow to match the reference look, background slightly gray #F6F7FB -->
                            <input :type="show ? 'text' : 'password'" id="password" name="password" placeholder="Masukan Password Baru" class="w-full pl-5 pr-12 py-[15px] rounded-[10px] border-2 border-transparent bg-[#F6F7FB] placeholder-[#a0aabf] text-[13.5px] focus:border-navy focus:bg-white focus:ring-4 focus:ring-navy/10 group-focus-within/pw:border-navy group-focus-within/pw:bg-white group-focus-within/pw:ring-4 group-focus-within/pw:ring-navy/10 outline-none text-navy font-medium input-focus-effect transition-all shadow-sm">
                            <button type="button" @click="show = !show" class="absolute inset-y-0 right-4 flex items-center text-[#a0aabf] hover:text-navy transition-colors focus:outline-none cursor-pointer pw-icon">
                                <!-- Design-matched Eye Icon (Visible) -->
                                <svg x-show="show" style="display: none;" class="w-[22px] h-[22px]" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                    <path d="M12 5C7.305 5 3.328 8.167 1.5 12C3.328 15.833 7.305 19 12 19C16.695 19 20.672 15.833 22.5 12C20.672 8.167 16.695 5 12 5ZM12 16.5C9.519 16.5 7.5 14.481 7.5 12C7.5 9.519 9.519 7.5 12 7.5C14.481 7.5 16.5 9.519 16.5 12C16.5 14.481 14.481 16.5 12 16.5ZM12 9.5C10.621 9.5 9.5 10.621 9.5 12C9.5 13.379 10.621 14.5 12 14.5C13.379 14.5 14.5 13.379 14.5 12C14.5 10.621 13.379 9.5 12 9.5Z" fill="currentColor"/>
                                </svg>
                                <!-- Design-matched Eye Icon with Strike (Hidden) -->
                                <svg x-show="!show" class="w-[22px] h-[22px]" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                    <path d="M12 5C7.305 5 3.328 8.167 1.5 12C3.328 15.833 7.305 19 12 19C16.695 19 20.672 15.833 22.5 12C20.672 8.167 16.695 5 12 5ZM12 16.5C9.519 16.5 7.5 14.481 7.5 12C7.5 9.519 9.519 7.5 12 7.5C14.481 7.5 16.5 9.519 16.5 12C16.5 14.481 14.481 16.5 12 16.5ZM12 9.5C10.621 9.5 9.5 10.621 9.5 12C9.5 13.379 10.621 14.5 12 14.5C13.379 14.5 14.5 13.379 14.5 12C14.5 10.621 13.379 9.5 12 9.5Z" fill="currentColor"/>
                                    <path d="M4 4L20 20" stroke="currentColor" stroke-width="2.5" stroke-linecap="round"/>
                                </svg>
                            </button>
                        </div>
                    </div>
                    
                    <!-- Confirm Password Input -->
                    <div class="animate-fade-up delay-400 z-10" x-data="{ show: false }">
                        <label for="password_confirmation" class="block text-[14px] font-[700] text-navy mb-2.5 transition-colors">Konfirmasi Password</label>
                        <div class="relative pw-group group/pw focus-within:z-50 hover:z-50">
                            <!-- Inset shadow to match the reference look, background slightly gray #F6F7FB -->
                            <input :type="show ? 'text' : 'password'" id="password_confirmation" name="password_confirmation" placeholder="Konfirmasi Password Baru" class="w-full pl-5 pr-12 py-[15px] rounded-[10px] border-2 border-transparent bg-[#F6F7FB] placeholder-[#a0aabf] text-[13.5px] focus:border-navy focus:bg-white focus:ring-4 focus:ring-navy/10 group-focus-within/pw:border-navy group-focus-within/pw:bg-white group-focus-within/pw:ring-4 group-focus-within/pw:ring-navy/10 outline-none text-navy font-medium input-focus-effect transition-all shadow-sm">
                            <button type="button" @click="show = !show" class="absolute inset-y-0 right-4 flex items-center text-[#a0aabf] hover:text-navy transition-colors focus:outline-none cursor-pointer pw-icon">
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

                <!-- Action Buttons: Back and Verification Email -->
                <div class="flex flex-col sm:flex-row items-center justify-between gap-4 animate-fade-up delay-500">
                    <a href="{{ route('login') }}" class="w-full sm:w-auto min-w-[140px] px-8 py-[13.5px] bg-navy text-white rounded-[8px] font-[600] text-[15px] border-2 border-transparent text-center btn-hover-effect shadow-md">
                        Back
                    </a>
                    
                    <button type="submit" class="w-full sm:w-auto min-w-[200px] px-8 py-[13.5px] bg-navy text-white rounded-[8px] font-[600] text-[15px] text-center border-2 border-transparent btn-hover-effect shadow-md">
                        Verification Email
                    </button>
                </div>

            </form>
            
        </div>
    </div>

</body>
</html>
