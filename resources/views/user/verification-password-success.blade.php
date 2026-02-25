<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Verifikasi Berhasil - Jayra Construction</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;500;600;700;800&display=swap" rel="stylesheet">
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
        
        @keyframes popIn {
            0% { opacity: 0; transform: scale(0.9); }
            70% { transform: scale(1.05); }
            100% { opacity: 1; transform: scale(1); }
        }

        @keyframes float {
            0% { transform: translateY(0px); }
            50% { transform: translateY(-10px); }
            100% { transform: translateY(0px); }
        }

        /* Animation Classes */
        .animate-fade-up { animation: fadeUp 0.6s cubic-bezier(0.16, 1, 0.3, 1) forwards; }
        .animate-pop-in { animation: popIn 0.8s cubic-bezier(0.16, 1, 0.3, 1) forwards; }
        .animate-float { animation: float 6s ease-in-out infinite; }
        
        /* Staggered Delays */
        .delay-100 { animation-delay: 100ms; opacity: 0; }
        .delay-200 { animation-delay: 200ms; opacity: 0; }
        .delay-300 { animation-delay: 300ms; opacity: 0; }
        .delay-400 { animation-delay: 400ms; opacity: 0; }

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
                        'icon': '0 10px 25px -5px rgba(0,0,0,0.15)',
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

    <div class="w-full max-w-[580px] px-5 z-10 flex flex-col items-center">
        <!-- Deep rich yellow square-like card -->
        <div class="bg-[#F6C624] w-full aspect-square max-w-[500px] rounded-[0.5rem] shadow-card py-12 px-8 sm:px-14 flex flex-col items-center justify-center relative overflow-hidden animate-fade-up group">
            
            <!-- Subtle shimmer overlay -->
            <div class="absolute inset-0 bg-gradient-to-tr from-white/0 via-white/20 to-white/0 opacity-0 group-hover:opacity-100 transition-opacity duration-1000 z-0 pointer-events-none"></div>

            <!-- Large White Checkmark Icon (Centered correctly) -->
            <div class="mb-8 w-[140px] h-[140px] md:w-[150px] md:h-[150px] relative flex items-center justify-center animate-pop-in z-10" style="animation-delay: 200ms; opacity: 0;">
                <!-- SVG Icon that mimics the "verified badge" style in the design -->
                <svg width="100%" height="100%" viewBox="0 0 100 100" fill="none" xmlns="http://www.w3.org/2000/svg" class="drop-shadow-icon">
                    <path d="M50 8C55.0746 8 59.9042 10.4357 62.9463 14.5027L63.5135 15.2612C65.5034 17.9213 68.7997 19.3891 72.1158 19.097L73.0617 19.0137C78.2933 18.553 83.1798 21.6833 85.122 26.541L85.4746 27.4239C86.7118 30.5218 89.2638 32.9157 92.4172 33.9407L93.3168 34.2332C98.2952 35.8521 101.378 40.7303 100.916 45.926L100.832 46.8732C100.536 50.1932 102.002 53.4938 104.665 55.4862L105.424 56.0544C109.496 59.0999 111.821 64.0886 111.411 68.9642L111.334 69.8787C111.063 73.1009 112.551 76.229 115.228 78.0435L116.291 78.7645C121.218 82.1065 123.066 88.667 120.448 93.9961L119.96 94.9897C118.251 98.4682 118.251 102.666 119.96 106.145L120.448 107.138C123.066 112.467 121.218 119.028 116.291 122.37L115.228 123.091C112.551 124.905 111.063 128.033 111.334 131.255L111.411 132.17C111.821 137.045 109.496 142.034 105.424 145.08L104.665 145.648C102.002 147.64 100.536 150.941 100.832 154.261L100.916 155.208C101.378 160.404 98.2952 165.282 93.3168 166.901L92.4172 167.193C89.2638 168.218 86.7118 170.612 85.4746 173.71L85.122 174.593C83.1798 179.451 78.2933 182.581 73.0617 182.12L72.1158 182.037C68.7997 181.745 65.5034 183.213 63.5135 185.873L62.9463 186.631C59.9042 190.698 55.0746 193.134 50 193.134H50C44.9254 193.134 40.0958 190.698 37.0537 186.631L36.4865 185.873C34.4966 183.213 31.2003 181.745 27.8842 182.037L26.9383 182.12C21.7067 182.581 16.8202 179.451 14.878 174.593L14.5254 173.71C13.2882 170.612 10.7362 168.218 7.58281 167.193L6.68324 166.901C1.70477 165.282 -1.37805 160.404 -0.916056 155.208L-0.832049 154.261C-0.535804 150.941 -2.00161 147.64 -4.66453 145.648L-5.42398 145.08C-9.49583 142.034 -11.821 137.045 -11.411 132.17L-11.334 131.255C-11.0631 128.033 -12.5512 124.905 -15.2282 123.091L-16.2905 122.37C-21.2175 119.028 -23.0655 112.467 -20.4484 107.138L-19.96 106.145C-18.2505 102.666 -18.2505 98.4682 -19.96 94.9897L-20.4484 93.9961C-23.0655 88.667 -21.2175 82.1065 -16.2905 78.7645L-15.2282 78.0435C-12.5512 76.229 -11.0631 73.1009 -11.334 69.8787L-11.411 68.9642C-11.821 64.0886 -9.49583 59.0999 -5.42398 56.0544L-4.66453 55.4862C-2.00161 53.4938 -0.535804 50.1932 -0.832049 46.8732L-0.916056 45.926C-1.37805 40.7303 1.70477 35.8521 6.68324 34.2332L7.58281 33.9407C10.7362 32.9157 13.2882 30.5218 14.5254 27.4239L14.878 26.541C16.8202 21.6833 21.7067 18.553 26.9383 19.0137L27.8842 19.097C31.2003 19.3891 34.4966 17.9213 36.4865 15.2612L37.0537 14.5027C40.0958 10.4357 44.9254 8 50 8H50Z" fill="white" transform="scale(0.5) translate(40,40)"/>
                    <path d="M43.0003 62.4002C41.7203 62.4002 40.5203 61.9202 39.5603 61.0402L27.1603 48.6402C25.2403 46.7202 25.2403 43.6002 27.1603 41.6802C29.0803 39.7602 32.2003 39.7602 34.1203 41.6802L43.0003 50.5602L65.8803 27.6802C67.8003 25.7602 70.9203 25.7602 72.8403 27.6802C74.7603 29.6002 74.7603 32.7202 72.8403 34.6402L46.4403 61.0402C45.4803 61.9202 44.2803 62.4002 43.0003 62.4002Z" fill="#EABC21" stroke="#EFC123" stroke-width="2" transform="translate(19.5,21.5)"/>
                </svg>
            </div>
            
            <div class="z-10 w-full flex flex-col items-center">
                <h2 class="text-[25px] sm:text-[27px] font-[800] text-navy text-center mb-2 tracking-tight flex-wrap animate-fade-up delay-200">Email Berhasil Di Verifikasi</h2>
                <p class="text-[14px] text-navy font-medium mb-10 text-center relative max-w-[90%] animate-fade-up delay-300">Akun Anda telah berhasil diverifikasi.</p>
                
                <!-- Finish Button -->
                <a href="{{ route('login') }}" class="w-full max-w-[260px] py-[13.5px] bg-navy text-white rounded-[10px] font-bold text-[14.5px] text-center btn-hover-effect mb-6 animate-fade-up delay-400">
                    Finish
                </a>
                
                <!-- Resend Text -->
                <p class="text-[13px] text-navy/90 font-medium text-center animate-fade-up delay-400">
                    Tidak menerima email? <a href="#" class="font-bold text-navy hover:text-opacity-80 transition-colors">Kirim ulang</a>
                </p>
            </div>
            
        </div>
    </div>

</body>
</html>
