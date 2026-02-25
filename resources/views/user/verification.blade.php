<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Verifikasi Email - Jayra Construction</title>
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

        @keyframes pulseSoft {
            0% { transform: scale(1); box-shadow: 0 0 0 0 rgba(21, 49, 91, 0.4); }
            70% { transform: scale(1.02); box-shadow: 0 0 0 10px rgba(21, 49, 91, 0); }
            100% { transform: scale(1); box-shadow: 0 0 0 0 rgba(21, 49, 91, 0); }
        }

        @keyframes float {
            0% { transform: translateY(0px); }
            50% { transform: translateY(-10px); }
            100% { transform: translateY(0px); }
        }

        /* Animation Classes */
        .animate-fade-up { animation: fadeUp 0.6s cubic-bezier(0.16, 1, 0.3, 1) forwards; }
        .animate-pop-in { animation: popIn 0.5s cubic-bezier(0.16, 1, 0.3, 1) forwards; }
        .animate-float { animation: float 6s ease-in-out infinite; }
        .pulse-soft:focus { animation: pulseSoft 0.8s ease-out; }
        
        /* Staggered Delays */
        .delay-100 { animation-delay: 100ms; opacity: 0; }
        .delay-200 { animation-delay: 200ms; opacity: 0; }
        .delay-300 { animation-delay: 300ms; opacity: 0; }
        .delay-400 { animation-delay: 400ms; opacity: 0; }
        .delay-500 { animation-delay: 500ms; opacity: 0; }
        
        /* Interactive Enhancements */
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

        .input-effect {
            transition: all 0.2s ease-out;
        }
        .input-effect:focus {
            transform: translateY(-4px);
            box-shadow: 0 10px 20px -5px rgba(21, 49, 91, 0.2);
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

    <div class="w-full max-w-[950px] px-5 z-10 flex flex-col items-center">
        <!-- Text Header -->
        <h1 class="text-[38px] sm:text-[44px] font-[800] text-navy mb-1 tracking-tight text-center drop-shadow-sm leading-tight mt-[-20px] animate-fade-up">Verifikasi Email</h1>
        <p class="text-[17px] sm:text-[19px] text-navy font-semibold mb-12 text-center opacity-90 animate-fade-up delay-100">Masukan Kode Email Anda</p>
        
        <!-- Yellow Card Box -->
        <!-- Wide yellow rectangle, generous padding -->
        <div class="bg-[#F6C624] w-full rounded-[1.2rem] shadow-card py-16 px-6 sm:px-12 flex flex-col items-center relative overflow-hidden animate-fade-up delay-200 group">
            
            <!-- Subtle shimmer overlay -->
            <div class="absolute inset-0 bg-gradient-to-tr from-white/0 via-white/20 to-white/0 opacity-0 group-hover:opacity-100 transition-opacity duration-1000 -z-0 pointer-events-none"></div>

            <h2 class="text-[1.3rem] font-[800] text-navy text-center mb-12 tracking-wide z-10 animate-fade-up delay-300">Kode Email</h2>
            
            <form action="#" method="POST" class="w-full flex flex-col items-center z-10">
                <!-- Inputs Container (5 Boxes) -->
                <div class="flex items-center justify-center gap-4 sm:gap-7 mb-16 px-2 w-full max-w-[600px]">
                    <div class="animate-pop-in delay-300 flex-1 max-w-[90px]">
                        <input type="text" maxlength="1" id="code-1" class="w-full aspect-square rounded-[18px] bg-[#F6F7FB] text-center text-[28px] sm:text-[34px] font-bold text-navy outline-none border-[2.5px] border-navy focus:bg-white input-effect pulse-soft shadow-[inset_0_2px_4px_rgba(0,0,0,0.02)]" autofocus>
                    </div>
                    <div class="animate-pop-in delay-400 flex-1 max-w-[90px]">
                        <input type="text" maxlength="1" id="code-2" class="w-full aspect-square rounded-[18px] bg-[#F6F7FB] text-center text-[28px] sm:text-[34px] font-bold text-navy outline-none border-[2.5px] border-transparent focus:bg-white input-effect pulse-soft shadow-[inset_0_2px_4px_rgba(0,0,0,0.02)]">
                    </div>
                    <div class="animate-pop-in flex-1 max-w-[90px]" style="animation-delay: 500ms; opacity: 0;">
                        <input type="text" maxlength="1" id="code-3" class="w-full aspect-square rounded-[18px] bg-[#F6F7FB] text-center text-[28px] sm:text-[34px] font-bold text-navy outline-none border-[2.5px] border-transparent focus:bg-white input-effect pulse-soft shadow-[inset_0_2px_4px_rgba(0,0,0,0.02)]">
                    </div>
                    <div class="animate-pop-in flex-1 max-w-[90px]" style="animation-delay: 600ms; opacity: 0;">
                        <input type="text" maxlength="1" id="code-4" class="w-full aspect-square rounded-[18px] bg-[#F6F7FB] text-center text-[28px] sm:text-[34px] font-bold text-navy outline-none border-[2.5px] border-transparent focus:bg-white input-effect pulse-soft shadow-[inset_0_2px_4px_rgba(0,0,0,0.02)]">
                    </div>
                    <div class="animate-pop-in flex-1 max-w-[90px]" style="animation-delay: 700ms; opacity: 0;">
                        <input type="text" maxlength="1" id="code-5" class="w-full aspect-square rounded-[18px] bg-[#F6F7FB] text-center text-[28px] sm:text-[34px] font-bold text-navy outline-none border-[2.5px] border-transparent focus:bg-white input-effect pulse-soft shadow-[inset_0_2px_4px_rgba(0,0,0,0.02)]">
                    </div>
                </div>
                
                <!-- Verify Button -->
                <a href="{{ route('verification-success') }}" class="w-full max-w-[280px] inline-block text-center py-[14.5px] bg-navy text-white rounded-[12px] font-[700] text-[15.5px] btn-hover-effect mb-8 animate-fade-up" style="animation-delay: 800ms; opacity: 0;">
                    Verify Now
                </a>
                
                <!-- Resend Text -->
                <!-- "Tidak Menerima Code? Kirim Ulang Kode" -->
                <p class="text-[14px] text-navy font-[600] text-center mt-2 animate-fade-up" style="animation-delay: 900ms; opacity: 0;">
                    Tidak Menerima Code? <a href="#" class="font-[800] underline hover:text-opacity-70 transition-colors cursor-pointer decoration-2 underline-offset-2">Kirim Ulang Kode</a>
                </p>
            </form>
            
        </div>
    </div>

    <!-- Script to handle OTP Input behavior seamlessly -->
    <script>
        const inputs = document.querySelectorAll('input[type="text"]');
        
        inputs.forEach((input, index) => {
            // Enhanced visual class management
            const activateInput = (el) => {
                el.classList.remove('border-transparent', 'bg-[#F6F7FB]');
                el.classList.add('border-navy', 'bg-white');
            };
            
            const deactivateInput = (el) => {
                el.classList.add('border-transparent', 'bg-[#F6F7FB]');
                el.classList.remove('border-navy', 'bg-white');
            };

            // Focus style management
            input.addEventListener('focus', () => activateInput(input));
            
            input.addEventListener('blur', () => {
                if(!input.value) deactivateInput(input);
            });

            // Auto-advance logic
            input.addEventListener('input', (e) => {
                // Remove non-numeric chars if desired
                // e.target.value = e.target.value.replace(/[^0-9]/g, '');

                if (e.target.value.length === 1) {
                    activateInput(input);
                    if (index < inputs.length - 1) {
                        inputs[index + 1].focus();
                    }
                }
            });

            // Backspace handling
            input.addEventListener('keydown', (e) => {
                if (e.key === 'Backspace') {
                    if (input.value === '' && index > 0) {
                        deactivateInput(inputs[index - 1]);
                        inputs[index - 1].value = ''; // clears the previous input
                        inputs[index - 1].focus();
                    } else if (input.value !== '') {
                        // User cleared current field
                        input.value = '';
                    }
                }
            });
            
            // Allow paste of exactly 5 digits
            input.addEventListener('paste', (e) => {
                e.preventDefault();
                const pastedData = e.clipboardData.getData('text').trim();
                const codeTokens = pastedData.substring(0, 5).split('');
                
                if (codeTokens.length > 0) {
                    inputs.forEach((inp, i) => {
                        if (codeTokens[i]) {
                            inp.value = codeTokens[i];
                            activateInput(inp);
                        } else {
                            inp.value = '';
                            deactivateInput(inp);
                        }
                    });
                    const focusIndex = Math.min(codeTokens.length, inputs.length - 1);
                    inputs[focusIndex].focus();
                }
            });
        });
    </script>
</body>
</html>
