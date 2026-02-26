@extends('user.layouts.main')

@section('title', 'Project')

@section('content')

{{-- Custom Animations --}}
<style>
    .animate-on-scroll {
        opacity: 0;
        transform: translateY(30px);
        transition: opacity 0.8s ease-out, transform 0.8s ease-out;
    }
    .animate-on-scroll.appear {
        opacity: 1;
        transform: translateY(0);
    }
    .delay-100 { transition-delay: 100ms; }
    .delay-200 { transition-delay: 200ms; }
    .delay-300 { transition-delay: 300ms; }
    .delay-400 { transition-delay: 400ms; }
    .delay-500 { transition-delay: 500ms; }
</style>

<div class="relative overflow-hidden bg-gray-50 pb-20">

    <!-- Hero Section -->
    <section class="min-h-screen flex items-center justify-center pt-32 pb-20 px-6 relative overflow-hidden bg-white">
        <!-- Abstract Watermark/Background (Based on Design) -->
        <div class="absolute inset-0 z-0 opacity-40 pointer-events-none" style="background-image: url('{{ asset('images/background.png') }}'); background-size: cover; background-position: center; mix-blend-mode: luminosity;"></div>
        
        <div class="max-w-6xl w-full mx-auto grid md:grid-cols-2 gap-16 items-center z-10">
            <!-- Left Content -->
            <div class="animate-on-scroll">
                <div class="inline-block py-1.5 px-6 bg-[#ebba16] text-[#0b2a3f] font-bold rounded-full text-sm mb-6 shadow-md hover:scale-105 transition-transform duration-300 cursor-default">
                    Project Detail
                </div>
                <h1 class="text-4xl md:text-5xl font-bold text-[#0b2a3f] mb-6 tracking-tight">
                    Our Project
                </h1>
                <p class="text-[#0b2a3f] font-medium leading-relaxed text-lg max-w-lg hover:text-black transition-colors duration-300">
                    Kami telah mengerjakan berbagai proyek konstruksi dengan perencanaan yang matang dan hasil yang berkualitas, mulai dari tahap perencanaan hingga penyelesaian.
                </p>
            </div>

            <!-- Right Content (Placeholder Box) -->
            <div class="flex justify-center md:justify-end animate-on-scroll delay-200">
                <div class="w-full max-w-sm h-80 md:h-96 bg-gray-200 rounded-xl shadow-2xl transform transition-all duration-500 hover:scale-105 border-4 border-white object-cover cursor-pointer relative overflow-hidden group">
                     <div class="absolute inset-0 bg-gradient-to-tr from-gray-300 to-gray-100 opacity-50 group-hover:opacity-0 transition-opacity duration-300"></div>
                </div>
            </div>
        </div>
    </section>

    <!-- Grid Layout Section -->
    <section class="py-24 bg-[#ebba16] relative transition-colors duration-500 mt-0">
        <div class="max-w-6xl mx-auto px-6">
            
            <!-- Search Bar -->
            <div class="flex justify-center md:justify-end mb-12 animate-on-scroll">
                <div class="relative w-full max-w-xs md:max-w-sm">
                    <input type="text" placeholder="Search Project" class="w-full bg-white/95 backdrop-blur-sm border-none rounded-full py-3 px-6 pl-5 pr-12 text-sm text-[#0b2a3f] focus:outline-none focus:ring-2 focus:ring-[#0b2a3f] shadow-md hover:shadow-lg transition-all duration-300">
                    <button class="absolute right-4 top-1/2 transform -translate-y-1/2 text-gray-500 hover:text-[#0b2a3f] transition-colors duration-300">
                        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"></path></svg>
                    </button>
                </div>
            </div>

            <!-- Projects Grid -->
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8 mb-20">
                
                {{-- Helper loop just to mock 6 items --}}
                @for ($i = 1; $i <= 6; $i++)
                <div class="bg-white rounded-2xl p-5 shadow-xl hover:shadow-2xl transform hover:-translate-y-2 transition-all duration-300 group animate-on-scroll delay-{{ ($i % 3 === 0 ? 3 : ($i % 3)) }}00 cursor-pointer">
                    <!-- Image Box -->
                    <div class="bg-[#0b2a3f] rounded-xl h-48 mb-5 overflow-hidden relative">
                         <div class="absolute inset-0 bg-black/10 opacity-0 group-hover:opacity-100 transition-opacity duration-300"></div>
                    </div>
                    
                    <h3 class="text-xl font-bold text-[#0b2a3f] mb-2 group-hover:text-[#ea580c] transition-colors duration-300">
                        Rumah Tinggal
                    </h3>
                    
                    <p class="text-xs text-gray-700 mb-6 font-medium leading-relaxed">
                        Pembangunan rumah tinggal dengan desain nyaman, konstruksi kokoh, dan pengerjaan yang rapi sesuai kebutuhan penghuni.
                    </p>
                    
                    <div class="flex justify-between items-center gap-2">
                        <span class="bg-[#0b2a3f] text-white px-3 py-1.5 rounded text-[10px] font-semibold tracking-wider uppercase group-hover:bg-[#081e2d] transition-colors duration-300">
                            Type: Rumah
                        </span>
                        <a href="#" class="bg-[#0b2a3f] text-white px-3 py-1.5 rounded text-[10px] font-semibold tracking-wider uppercase group-hover:bg-[#ea580c] transition-colors duration-300">
                            Service: Renovasi
                        </a>
                    </div>
                </div>
                @endfor

            </div>

            <!-- Pagination -->
            <div class="flex justify-center items-center gap-4 animate-on-scroll delay-400 text-[#0b2a3f] font-bold text-lg mt-10">
                <a href="#" class="hover:text-white hover:-translate-x-1 transition-all duration-300 p-2">
                    <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M15 19l-7-7 7-7"></path></svg>
                </a>
                <a href="#" class="hover:text-white hover:scale-110 transition-all duration-300 px-2 text-white">1</a>
                <a href="#" class="hover:text-white hover:scale-110 transition-all duration-300 px-2">2</a>
                <a href="#" class="hover:text-white hover:scale-110 transition-all duration-300 px-2">3</a>
                <a href="#" class="hover:text-white hover:scale-110 transition-all duration-300 px-2">4</a>
                <a href="#" class="hover:text-white hover:scale-110 transition-all duration-300 px-2">5</a>
                <a href="#" class="hover:text-white hover:translate-x-1 transition-all duration-300 p-2">
                    <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M9 5l7 7-7 7"></path></svg>
                </a>
            </div>

        </div>
    </section>

</div>

<!-- Intersection Observer Script for Scroll Animations -->
<script>
    document.addEventListener("DOMContentLoaded", function() {
        const observerOptions = {
            root: null,
            rootMargin: '0px',
            threshold: 0.15 
        };

        const animationObserver = new IntersectionObserver((entries, observer) => {
            entries.forEach(entry => {
                if (entry.isIntersecting) {
                    entry.target.classList.add('appear');
                    observer.unobserve(entry.target); 
                }
            });
        }, observerOptions);

        document.querySelectorAll('.animate-on-scroll').forEach(el => {
            animationObserver.observe(el);
        });
    });
</script>

@endsection