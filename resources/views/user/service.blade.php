@extends('user.layouts.main')

@section('title', 'Service')

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

<div class="pt-32 pb-20 relative overflow-hidden">
    
    <!-- Hero / Discount Banner -->
    <div class="max-w-6xl mx-auto px-6 mb-20 animate-on-scroll">
        <div class="bg-[#ea580c] rounded-2xl p-10 md:p-14 shadow-2xl relative overflow-hidden flex flex-col items-start justify-center group cursor-pointer transition-transform duration-500 hover:scale-[1.01]">
            <div class="absolute -right-20 -top-20 w-80 h-80 bg-white opacity-10 rounded-full group-hover:scale-110 transition-transform duration-700 pointer-events-none"></div>
            <div class="absolute -left-10 -bottom-10 w-40 h-40 bg-white opacity-10 rounded-full group-hover:-translate-y-4 group-hover:scale-125 transition-transform duration-700 pointer-events-none delay-100"></div>

            <h1 class="text-4xl md:text-5xl font-bold text-white mb-4 relative z-10 drop-shadow-sm">
                Dapatkan Diskon <span class="text-yellow-300">25%</span>
            </h1>
            <p class="text-white/95 text-lg md:text-xl mb-8 relative z-10">
                Khusus pemesanan jasa pertama kali
            </p>
            <a href="#" class="relative z-10 bg-[#0b2a3f] text-white font-semibold py-3 px-8 rounded-lg shadow-lg hover:shadow-2xl hover:bg-opacity-90 transition-all duration-300 transform hover:-translate-y-1 ring-2 ring-transparent hover:ring-white/50">
                Dapatkan Penawaran
            </a>
        </div>
    </div>

    <!-- Pelayanan Kami Title & Search -->
    <div class="max-w-6xl mx-auto px-6 mb-12">
        <div class="text-center animate-on-scroll delay-100">
            <h2 class="text-3xl md:text-4xl font-bold text-[#0b2a3f] mb-4">Pelayanan Kami</h2>
            <p class="text-gray-600 max-w-2xl mx-auto mb-10">
                Kami menyediakan berbagai layanan konstruksi dan desain untuk memenuhi kebutuhan hunian, bangunan usaha, hingga renovasi dengan kualitas terbaik.
            </p>
        </div>

        <div class="flex justify-center md:justify-end animate-on-scroll delay-200">
            <div class="relative w-full max-w-xs md:max-w-sm">
                <input type="text" placeholder="Search Project" class="w-full bg-white/80 backdrop-blur-sm border border-gray-200 rounded-full py-3 px-6 pl-5 pr-12 text-sm text-gray-700 focus:outline-none focus:ring-2 focus:ring-[#0b2a3f] focus:border-transparent shadow-sm hover:shadow-md transition-shadow duration-300">
                <button class="absolute right-4 top-1/2 transform -translate-y-1/2 text-gray-500 hover:text-[#ea580c] transition-colors duration-300">
                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"></path></svg>
                </button>
            </div>
        </div>
    </div>

    <!-- Cards Grid -->
    <div class="max-w-6xl mx-auto px-6 grid grid-cols-1 md:grid-cols-2 gap-8 mb-20">
        
        <!-- Card 1 -->
        <div class="bg-[#ebba16] rounded-2xl p-6 shadow-xl hover:shadow-2xl transform hover:-translate-y-2 transition-all duration-300 group animate-on-scroll delay-100 cursor-pointer">
            <div class="bg-white/95 rounded-xl h-48 mb-6 overflow-hidden relative">
                <div class="absolute inset-0 bg-black/5 opacity-0 group-hover:opacity-100 transition-opacity duration-300"></div>
            </div>
            <h3 class="text-2xl font-bold text-[#0b2a3f] mb-2 drop-shadow-sm group-hover:text-white transition-colors duration-300">Renovasi Rumah</h3>
            <p class="text-[#0b2a3f]/80 text-sm mb-6 font-medium group-hover:text-white/95 transition-colors duration-300">
                Layanan renovasi rumah untuk memperbaiki, memperbarui, dan meningkatkan kenyamanan serta fungsi bangunan.
            </p>
            <div class="flex justify-between items-center">
                <span class="bg-white text-[#0b2a3f] px-4 py-1.5 rounded-lg text-sm font-bold shadow-sm whitespace-nowrap">
                    Rp25.000.000
                </span>
                <a href="#" class="bg-[#0b2a3f] text-white px-5 py-2 rounded-lg text-sm font-semibold shadow hover:bg-opacity-90 hover:scale-105 transition-transform duration-300 ring-1 ring-transparent hover:ring-white">
                    Lihat Detail
                </a>
            </div>
        </div>

        <!-- Card 2 -->
        <div class="bg-[#ebba16] rounded-2xl p-6 shadow-xl hover:shadow-2xl transform hover:-translate-y-2 transition-all duration-300 group animate-on-scroll delay-200 cursor-pointer">
            <div class="bg-white/95 rounded-xl h-48 mb-6 overflow-hidden relative">
                <div class="absolute inset-0 bg-black/5 opacity-0 group-hover:opacity-100 transition-opacity duration-300"></div>
            </div>
            <h3 class="text-2xl font-bold text-[#0b2a3f] mb-2 drop-shadow-sm group-hover:text-white transition-colors duration-300">Renovasi Rumah</h3>
            <p class="text-[#0b2a3f]/80 text-sm mb-6 font-medium group-hover:text-white/95 transition-colors duration-300">
                Layanan renovasi rumah untuk memperbaiki, memperbarui, dan meningkatkan kenyamanan serta fungsi bangunan.
            </p>
            <div class="flex justify-between items-center">
                <span class="bg-white text-[#0b2a3f] px-4 py-1.5 rounded-lg text-sm font-bold shadow-sm whitespace-nowrap">
                    Rp25.000.000
                </span>
                <a href="#" class="bg-[#0b2a3f] text-white px-5 py-2 rounded-lg text-sm font-semibold shadow hover:bg-opacity-90 hover:scale-105 transition-transform duration-300 ring-1 ring-transparent hover:ring-white">
                    Lihat Detail
                </a>
            </div>
        </div>

        <!-- Card 3 -->
        <div class="bg-[#ebba16] rounded-2xl p-6 shadow-xl hover:shadow-2xl transform hover:-translate-y-2 transition-all duration-300 group animate-on-scroll delay-300 cursor-pointer">
            <div class="bg-white/95 rounded-xl h-48 mb-6 overflow-hidden relative">
                <div class="absolute inset-0 bg-black/5 opacity-0 group-hover:opacity-100 transition-opacity duration-300"></div>
            </div>
            <h3 class="text-2xl font-bold text-[#0b2a3f] mb-2 drop-shadow-sm group-hover:text-white transition-colors duration-300">Renovasi Rumah</h3>
            <p class="text-[#0b2a3f]/80 text-sm mb-6 font-medium group-hover:text-white/95 transition-colors duration-300">
                Layanan renovasi rumah untuk memperbaiki, memperbarui, dan meningkatkan kenyamanan serta fungsi bangunan.
            </p>
            <div class="flex justify-between items-center">
                <span class="bg-white text-[#0b2a3f] px-4 py-1.5 rounded-lg text-sm font-bold shadow-sm whitespace-nowrap">
                    Rp25.000.000
                </span>
                <a href="#" class="bg-[#0b2a3f] text-white px-5 py-2 rounded-lg text-sm font-semibold shadow hover:bg-opacity-90 hover:scale-105 transition-transform duration-300 ring-1 ring-transparent hover:ring-white">
                    Lihat Detail
                </a>
            </div>
        </div>

        <!-- Card 4 -->
        <div class="bg-[#ebba16] rounded-2xl p-6 shadow-xl hover:shadow-2xl transform hover:-translate-y-2 transition-all duration-300 group animate-on-scroll delay-400 cursor-pointer">
            <div class="bg-white/95 rounded-xl h-48 mb-6 overflow-hidden relative">
                <div class="absolute inset-0 bg-black/5 opacity-0 group-hover:opacity-100 transition-opacity duration-300"></div>
            </div>
            <h3 class="text-2xl font-bold text-[#0b2a3f] mb-2 drop-shadow-sm group-hover:text-white transition-colors duration-300">Renovasi Rumah</h3>
            <p class="text-[#0b2a3f]/80 text-sm mb-6 font-medium group-hover:text-white/95 transition-colors duration-300">
                Layanan renovasi rumah untuk memperbaiki, memperbarui, dan meningkatkan kenyamanan serta fungsi bangunan.
            </p>
            <div class="flex justify-between items-center">
                <span class="bg-white text-[#0b2a3f] px-4 py-1.5 rounded-lg text-sm font-bold shadow-sm whitespace-nowrap">
                    Rp25.000.000
                </span>
                <a href="#" class="bg-[#0b2a3f] text-white px-5 py-2 rounded-lg text-sm font-semibold shadow hover:bg-opacity-90 hover:scale-105 transition-transform duration-300 ring-1 ring-transparent hover:ring-white">
                    Lihat Detail
                </a>
            </div>
        </div>
    </div>

    <!-- Pagination -->
    <div class="flex justify-center items-center gap-4 md:gap-6 animate-on-scroll delay-500 mb-10 text-[#0b2a3f] font-bold text-lg">
        <a href="#" class="hover:text-orange-500 hover:-translate-x-1 transition-all duration-300 p-2">
            <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M15 19l-7-7 7-7"></path></svg>
        </a>
        <a href="#" class="w-10 h-10 flex items-center justify-center rounded-full bg-[#0b2a3f] text-white shadow hover:scale-110 transition-transform duration-300">1</a>
        <a href="#" class="w-10 h-10 flex items-center justify-center rounded-full hover:bg-gray-200 hover:scale-110 transition-all duration-300">2</a>
        <a href="#" class="w-10 h-10 flex items-center justify-center rounded-full hover:bg-gray-200 hover:scale-110 transition-all duration-300">3</a>
        <a href="#" class="w-10 h-10 flex items-center justify-center rounded-full hover:bg-gray-200 hover:scale-110 transition-all duration-300">4</a>
        <a href="#" class="w-10 h-10 flex items-center justify-center rounded-full hover:bg-gray-200 hover:scale-110 transition-all duration-300">5</a>
        <a href="#" class="hover:text-orange-500 hover:translate-x-1 transition-all duration-300 p-2">
            <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M9 5l7 7-7 7"></path></svg>
        </a>
    </div>

</div>

<!-- Bottom Section: Missing Service -->
<section class="bg-[#ea580c] py-24 relative overflow-hidden mt-0">
    <div class="max-w-6xl mx-auto px-6 text-center relative z-10">
        <h2 class="text-3xl md:text-4xl font-bold text-white mb-4 animate-on-scroll drop-shadow-sm">
            Tidak Bisa Melihat Service yang di inginkan?
        </h2>
        <p class="text-white/95 text-xl font-medium mb-16 animate-on-scroll delay-100">
            Hubungi Kami Secepatnya
        </p>

        <!-- Dynamic Empty Cards as in design -->
        <div class="grid grid-cols-1 md:grid-cols-3 gap-8 justify-items-center animate-on-scroll delay-200">
            <!-- Blank Card 1 -->
            <div class="bg-white/95 w-full h-56 rounded-2xl shadow-lg hover:shadow-2xl hover:-translate-y-2 transition-all duration-300 cursor-pointer flex items-center justify-center group overflow-hidden relative">
                 <div class="absolute inset-0 bg-[#0b2a3f]/5 opacity-0 group-hover:opacity-100 transition-opacity duration-500"></div>
                 <!-- Plus Icon Placeholder -->
                 <svg class="w-16 h-16 text-gray-300 group-hover:scale-110 group-hover:text-gray-400 transition-all duration-500" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M12 4v16m8-8H4"></path></svg>
            </div>
            
            <!-- Blank Card 2 -->
            <div class="bg-white/95 w-full h-56 rounded-2xl shadow-lg hover:shadow-2xl hover:-translate-y-2 transition-all duration-300 cursor-pointer flex items-center justify-center group overflow-hidden relative delay-[50ms]">
                <div class="absolute inset-0 bg-[#0b2a3f]/5 opacity-0 group-hover:opacity-100 transition-opacity duration-500"></div>
                 <!-- Plus Icon Placeholder -->
                 <svg class="w-16 h-16 text-gray-300 group-hover:scale-110 group-hover:text-gray-400 transition-all duration-500" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M12 4v16m8-8H4"></path></svg>
            </div>

            <!-- Blank Card 3 -->
            <div class="bg-white/95 w-full h-56 rounded-2xl shadow-lg hover:shadow-2xl hover:-translate-y-2 transition-all duration-300 cursor-pointer flex items-center justify-center group overflow-hidden relative delay-[100ms]">
                <div class="absolute inset-0 bg-[#0b2a3f]/5 opacity-0 group-hover:opacity-100 transition-opacity duration-500"></div>
                 <!-- Plus Icon Placeholder -->
                 <svg class="w-16 h-16 text-gray-300 group-hover:scale-110 group-hover:text-gray-400 transition-all duration-500" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M12 4v16m8-8H4"></path></svg>
            </div>
        </div>
    </div>
    
    <!-- Background Decor -->
    <div class="absolute top-0 right-1/4 w-96 h-96 bg-yellow-400/20 rounded-full blur-3xl mix-blend-overlay animate-pulse duration-1000 z-0 pointer-events-none"></div>
    <div class="absolute bottom-0 left-1/4 w-64 h-64 bg-white/10 rounded-full blur-3xl mix-blend-overlay animate-pulse delay-500 z-0 pointer-events-none"></div>
</section>

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