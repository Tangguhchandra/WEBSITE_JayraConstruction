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
    <style>
        body { font-family: 'Poppins', sans-serif; }
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
<body class="bg-[#f7f8fa] flex items-center justify-center min-h-screen p-4 sm:p-8" style="background-image: url('data:image/svg+xml,%3Csvg width=\'100\' height=\'100\' viewBox=\'0 0 100 100\' xmlns=\'http://www.w3.org/2000/svg\'%3E%3Cpath d=\'M0 0h100v100H0z\' fill=\'%23f7f8fa\'/%3E%3C/svg%3E'); background-size: cover;">
    
    <div class="max-w-[1200px] w-full flex flex-col md:flex-row gap-12 lg:gap-20 items-center justify-center">
        
        <!-- Left Side: Image Placeholder -->
        <div class="w-full md:w-5/12 hidden md:flex justify-center">
            <div class="bg-[#EAEAEA] w-full h-[650px] rounded-[2rem] shadow-sm relative overflow-hidden flex flex-col items-center justify-center">
                <span class="text-gray-400 font-medium text-lg border-2 border-dashed border-gray-300 p-8 rounded-xl">[ Tempat Foto / Hard Hat, Blueprint ]</span>
                
                <!-- Dots Indicator Placeholder -->
                <div class="absolute bottom-8 flex space-x-3">
                    <div class="w-3 h-3 rounded-full bg-navy"></div>
                    <div class="w-3 h-3 rounded-full bg-[#E87E23]"></div>
                    <div class="w-3 h-3 rounded-full bg-[#E87E23]"></div>
                    <div class="w-3 h-3 rounded-full bg-gray-300"></div>
                </div>
            </div>
        </div>

        <!-- Right Side: Login Form -->
        <div class="w-full md:w-6/12 flex flex-col items-center">
            <h1 class="text-4xl lg:text-[44px] font-[800] text-navy mb-2 tracking-tight text-center">Jayra Construction</h1>
            <p class="text-[19px] text-navy font-semibold mb-10 text-center">Silakan Login Akun Anda</p>
            
            <div class="bg-yellowcard w-full max-w-[480px] rounded-[1.5rem] p-8 sm:p-10 shadow-xl relative">
                <h2 class="text-[1.6rem] font-bold text-navy text-center mb-8">Login Akun</h2>
                
                <form action="#" method="POST" class="space-y-6">
                    <div>
                        <label for="email" class="block text-[13.5px] font-semibold text-navy mb-2">Email/Username</label>
                        <input type="text" id="email" name="email" placeholder="Masukan Email/Username Anda" class="w-full px-5 py-3.5 rounded-lg border-0 bg-[#F4F5F7] placeholder-gray-400 text-[13.5px] focus:ring-2 focus:ring-navy outline-none text-navy font-medium">
                    </div>
                    
                    <div>
                        <label for="password" class="block text-[13.5px] font-semibold text-navy mb-2">Password</label>
                        <input type="password" id="password" name="password" placeholder="Masukan Password Anda" class="w-full px-5 py-3.5 rounded-lg border-0 bg-[#F4F5F7] placeholder-gray-400 text-[13.5px] focus:ring-2 focus:ring-navy outline-none text-navy font-medium">
                    </div>
                    
                    <div class="flex items-center justify-between pt-1">
                        <label class="flex items-center space-x-2.5 cursor-pointer">
                            <input type="checkbox" class="w-[18px] h-[18px] rounded-md border-transparent bg-white text-navy focus:ring-navy form-checkbox">
                            <span class="text-[13px] font-semibold text-navy">Ingat saya</span>
                        </label>
                        <a href="#" class="text-[13px] font-bold text-navy hover:underline">Lupa Password</a>
                    </div>
                    
                    <div class="flex space-x-4 pt-4">
                        <button type="button" class="flex-1 py-3.5 px-4 bg-[#F4F5F7] text-navy border-[2px] border-navy rounded-[14px] font-bold text-[15px] hover:bg-gray-100 transition-colors shadow-sm">
                            Sign-Up
                        </button>
                        <button type="submit" class="flex-1 py-3.5 px-4 bg-navy text-white rounded-[14px] font-bold text-[15px] hover:bg-opacity-90 transition-colors shadow-md">
                            Login
                        </button>
                    </div>
                </form>
                
                <div class="mt-8 flex items-center justify-center relative">
                    <div class="border-t-[1px] border-navy w-full absolute top-1/2 left-0 -z-10 opacity-60"></div>
                    <span class="px-5 text-[14px] font-medium text-navy bg-yellowcard z-10">Login With</span>
                </div>
                
                <div class="mt-8 flex space-x-4">
                    <button type="button" class="flex-1 flex items-center justify-center py-3.5 bg-white rounded-[14px] shadow-sm hover:shadow-md transition-shadow">
                        <svg class="h-[22px] w-[22px] text-[#1877F2] mr-3" fill="currentColor" viewBox="0 0 24 24"><path d="M24 12.073c0-6.627-5.373-12-12-12s-12 5.373-12 12c0 5.99 4.388 10.954 10.125 11.854v-8.385H7.078v-3.469h3.047V9.43c0-3.007 1.792-4.669 4.533-4.669 1.312 0 2.686.235 2.686.235v2.953H15.83c-1.491 0-1.956.925-1.956 1.874v2.25h3.328l-.532 3.469h-2.796v8.385C19.612 23.027 24 18.062 24 12.073z"/></svg>
                        <span class="font-bold text-navy text-[14.5px]">Facebook</span>
                    </button>
                    
                    <button type="button" class="flex-1 flex items-center justify-center py-3.5 bg-white rounded-[14px] shadow-sm hover:shadow-md transition-shadow">
                        <svg class="h-[22px] w-[22px] mr-3" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path d="M22.56 12.25c0-.78-.07-1.53-.2-2.25H12v4.26h5.92c-.26 1.37-1.04 2.53-2.21 3.31v2.77h3.57c2.08-1.92 3.28-4.74 3.28-8.09z" fill="#4285F4"/><path d="M12 23c2.97 0 5.46-.98 7.28-2.66l-3.57-2.77c-.98.66-2.23 1.06-3.71 1.06-2.86 0-5.29-1.93-6.16-4.53H2.18v2.84C3.99 20.53 7.7 23 12 23z" fill="#34A853"/><path d="M5.84 14.09c-.22-.66-.35-1.36-.35-2.09s.13-1.43.35-2.09V7.07H2.18C1.43 8.55 1 10.22 1 12s.43 3.45 1.18 4.93l2.85-2.22.81-.62z" fill="#FBBC05"/><path d="M12 5.38c1.62 0 3.06.56 4.21 1.64l3.15-3.15C17.45 2.09 14.97 1 12 1 7.7 1 3.99 3.47 2.18 7.07l3.66 2.84c.87-2.6 3.3-4.53 6.16-4.53z" fill="#EA4335"/></svg>
                        <span class="font-bold text-navy text-[14.5px]">Google</span>
                    </button>
                </div>
            </div>
            
        </div>
    </div>
</body>
</html>
