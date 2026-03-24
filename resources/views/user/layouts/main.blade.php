<!DOCTYPE html>
<html lang="id" class="scroll-smooth">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'Jayra Construction')</title>
    
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&family=Outfit:wght@300;400;500;600;700;800&display=swap" rel="stylesheet">
    
    {{-- Alpine Plugins HARUS sebelum Alpine core --}}
    <script defer src="https://cdn.jsdelivr.net/npm/@alpinejs/collapse@3.x.x/dist/cdn.min.js"></script>
    <script defer src="https://cdn.jsdelivr.net/npm/alpinejs@3.x.x/dist/cdn.min.js"></script>

    @vite('resources/css/app.css')

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
                        accentDark: '#e5b810',
                        surface: '#F8FAFC',
                    }
                }
            }
        }
    </script>

    <style>
        /* ========== BASE ========== */
        *, *::before, *::after { box-sizing: border-box; }

        html { scroll-behavior: smooth; }

        body {
            -webkit-font-smoothing: antialiased;
            -moz-osx-font-smoothing: grayscale;
            background-color: #ffffff;
            overflow-x: hidden;
        }

        /* ========== SELECTION ========== */
        ::selection { background-color: #F3C623; color: #10375C; }

        /* ========== DOT PATTERN ========== */
        .bg-pattern {
            background-image: radial-gradient(#cbd5e1 1px, transparent 1px);
            background-size: 32px 32px;
        }

        /* ========== CUSTOM SCROLLBAR ========== */
        ::-webkit-scrollbar { width: 6px; }
        ::-webkit-scrollbar-track { background: #f1f5f9; }
        ::-webkit-scrollbar-thumb {
            background: #10375C;
            border-radius: 10px;
        }
        ::-webkit-scrollbar-thumb:hover { background: #F3C623; }

        /* ========== GLOBAL SCROLL REVEAL ========== */
        .reveal {
            opacity: 0;
            transform: translateY(32px);
            transition: opacity 0.8s cubic-bezier(0.16, 1, 0.3, 1),
                        transform 0.8s cubic-bezier(0.16, 1, 0.3, 1);
        }
        .reveal.active {
            opacity: 1;
            transform: translateY(0) !important;
        }
        /* Direction variants — hanya atur transform awal,
           .active override dengan translateY(0) !important */
        .reveal-left  { transform: translateX(-44px); }
        .reveal-right { transform: translateX(44px); }

        /* Delay helpers */
        .delay-100 { transition-delay: 100ms; }
        .delay-200 { transition-delay: 200ms; }
        .delay-300 { transition-delay: 300ms; }
        .delay-400 { transition-delay: 400ms; }

        /* ========== FLOATING ANIMATION ========== */
        .animate-float {
            animation: float 6s ease-in-out infinite;
        }
        @keyframes float {
            0%, 100% { transform: translateY(0px); }
            50%       { transform: translateY(-14px); }
        }

        /* ========== SPIN SLOW ========== */
        .animate-spin-slow {
            animation: spinSlow 15s linear infinite;
        }
        @keyframes spinSlow {
            from { transform: rotate(0deg); }
            to   { transform: rotate(360deg); }
        }

        /* ========== NAVBAR CLEARANCE ========== */
        /* Navbar visible height saat tidak scroll: py-8 + logo h-16 ≈ 96px pada md */
        /* Semua hero section menggunakan pt-[6.5rem] md:pt-[7.5rem] via CSS var */
        :root {
            --navbar-h: 7rem;   /* ≈ 112px — safe zone untuk semua breakpoint */
        }
    </style>

    {{-- Slot untuk style tambahan per halaman --}}
    @stack('styles')
</head>
<body class="text-slate-600 font-sans">

    {{-- ======================== NAVBAR ======================== --}}
    @include('user.layouts.navbar')

    {{-- ======================== CONTENT ====================== --}}
    <main>
        @yield('content')
    </main>

    {{-- ======================== FOOTER ======================== --}}
    @include('user.layouts.footer')

    @vite('resources/js/app.js')

    {{-- ======================== GLOBAL SCRIPTS =============== --}}
    <script>
        // Scroll Reveal Observer
        document.addEventListener("DOMContentLoaded", function () {
            const observer = new IntersectionObserver(
                (entries, obs) => {
                    entries.forEach(entry => {
                        if (entry.isIntersecting) {
                            entry.target.classList.add('active');
                            obs.unobserve(entry.target);
                        }
                    });
                },
                { rootMargin: '0px 0px -60px 0px', threshold: 0.1 }
            );

            document.querySelectorAll('.reveal').forEach(el => observer.observe(el));
        });
    </script>

    {{-- Slot untuk script tambahan per halaman --}}
    @stack('scripts')
</body>
</html>