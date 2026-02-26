@extends('user.layouts.main')

@section('title', 'About Us')

@section('content')

{{-- Define custom animations --}}
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
</style>

<!-- Hero / Siapa Kami Section -->
<section class="min-h-screen flex items-center justify-center pt-32 pb-20 px-6 relative overflow-hidden">
    <div class="max-w-6xl w-full mx-auto grid md:grid-cols-2 gap-12 items-center">
        <!-- Left Content -->
        <div class="animate-on-scroll">
            <div class="inline-block py-1.5 px-5 bg-[#eab308] text-[#0b2a3f] font-bold rounded-full text-sm mb-6 shadow-md hover:scale-105 transition-transform duration-300 cursor-default">
                About Us
            </div>
            <h1 class="text-4xl md:text-5xl font-bold text-[#0b2a3f] mb-6 tracking-tight">
                Siapa Kami?
            </h1>
            <p class="text-gray-700 leading-relaxed text-lg text-justify hover:text-gray-900 transition-colors duration-300">
                CV. DARMING JAYA ABADI adalah perusahaan konstruksi yang berlokasi di Kab. Banyumas, Indonesia. Berdiri sejak lama, CV. DARMING JAYA ABADI telah menjadi pioneer unggulan di industri konstruksi dengan keahlian khusus dalam development infrastruktur dan pembangunan komersial berkapasitas besar.
            </p>
        </div>

        <!-- Right Content (Image Placeholder) -->
        <div class="flex justify-center md:justify-end animate-on-scroll delay-200 relative group">
            <div class="absolute inset-0 bg-[#eab308] rounded-full blur-3xl opacity-20 group-hover:opacity-40 transition-opacity duration-500 scale-110"></div>
            <div class="w-64 h-64 md:w-80 md:h-80 bg-gray-200 rounded-full shadow-2xl transform transition-all duration-500 group-hover:scale-105 group-hover:rotate-2 border-4 border-white object-cover cursor-pointer relative overflow-hidden">
                <!-- If there's an image later, put it here -->
                <div class="absolute inset-0 bg-gradient-to-tr from-gray-300 to-gray-100 opacity-50 group-hover:opacity-0 transition-opacity duration-300"></div>
            </div>
        </div>
    </div>
</section>

<!-- Our Project Section -->
<section class="py-24 bg-[#ebba16] relative transition-colors duration-500">
    <div class="max-w-6xl mx-auto px-6 text-center">
        <h2 class="text-4xl font-bold text-white mb-4 animate-on-scroll drop-shadow-sm">Our Project</h2>
        <p class="text-white/95 max-w-3xl mx-auto mb-16 text-lg animate-on-scroll delay-100">
            Berikut adalah beberapa proyek yang telah kami kerjakan sebagai wujud komitmen dalam menghadirkan kualitas, ketepatan, dan kepuasan klien di setiap pembangunan.
        </p>

        <!-- Dynamic Grid Layout -->
        <div class="grid grid-cols-1 md:grid-cols-3 gap-6 md:auto-rows-[220px] lg:auto-rows-[250px] animate-on-scroll delay-200">
            
            <!-- Item 1 (Left Tall Block - Spans 2 Rows) -->
            <div class="md:row-span-2 group relative overflow-hidden rounded-2xl bg-white/95 shadow-lg hover:shadow-2xl transition-all duration-300 transform hover:-translate-y-2 cursor-pointer border border-white/40 h-64 md:h-auto">
                <div class="absolute inset-0 bg-white/10 group-hover:bg-transparent transition-colors duration-500"></div>
            </div>

            <!-- Item 2 (Top Middle) -->
            <div class="group relative overflow-hidden rounded-2xl bg-white/95 shadow-lg hover:shadow-2xl transition-all duration-300 transform hover:-translate-y-2 cursor-pointer border border-white/40 h-48 md:h-auto">
                 <div class="absolute inset-0 bg-white/10 group-hover:bg-transparent transition-colors duration-500"></div>
            </div>

            <!-- Item 3 (Top Right) -->
            <div class="group relative overflow-hidden rounded-2xl bg-white/95 shadow-lg hover:shadow-2xl transition-all duration-300 transform hover:-translate-y-2 cursor-pointer border border-white/40 h-48 md:h-auto">
                 <div class="absolute inset-0 bg-white/10 group-hover:bg-transparent transition-colors duration-500"></div>
            </div>

            <!-- Item 4 (Bottom Middle) -->
            <div class="group relative overflow-hidden rounded-2xl bg-white/95 shadow-lg hover:shadow-2xl transition-all duration-300 transform hover:-translate-y-2 cursor-pointer border border-white/40 h-48 md:h-auto">
                 <div class="absolute inset-0 bg-white/10 group-hover:bg-transparent transition-colors duration-500"></div>
            </div>

            <!-- Item 5 (Bottom Right) -->
            <div class="group relative overflow-hidden rounded-2xl bg-white/95 shadow-lg hover:shadow-2xl transition-all duration-300 transform hover:-translate-y-2 cursor-pointer border border-white/40 h-48 md:h-auto">
                 <div class="absolute inset-0 bg-white/10 group-hover:bg-transparent transition-colors duration-500"></div>
            </div>

        </div>

        <!-- See More Button -->
        <div class="mt-12 flex justify-end animate-on-scroll delay-300">
            <a href="#" class="inline-flex items-center justify-center px-8 py-3 bg-white text-[#0b2a3f] font-semibold rounded-lg shadow-md hover:bg-gray-100 hover:shadow-xl hover:-translate-y-1 transition-all duration-300 ring-2 ring-transparent hover:ring-white">
                See More Project
            </a>
        </div>
    </div>
</section>

<!-- Visi & Misi Section -->
<section class="py-24 relative overflow-hidden">
    <div class="max-w-4xl mx-auto px-6 text-center">
        <h2 class="text-4xl font-bold text-[#0b2a3f] mb-6 animate-on-scroll">Visi & Misi</h2>
        <p class="text-gray-700 text-lg mb-16 animate-on-scroll delay-100">
            CV Darming adalah perusahaan yang bergerak di bidang jasa konstruksi, desain interior, dan eksterior yang berkomitmen menghadirkan kualitas, ketepatan, serta kepercayaan dalam setiap proyek yang dikerjakan.
        </p>

        <div class="flex flex-col gap-8 text-left animate-on-scroll delay-200">
            <!-- Visi Card -->
            <div class="group relative p-8 md:p-10 bg-gradient-to-br from-[#ebba16] to-[#faca15] rounded-xl shadow-xl hover:shadow-2xl transform hover:-translate-y-1 hover:scale-[1.01] transition-all duration-300 overflow-hidden cursor-default">
                <!-- Decorative Elements -->
                <div class="absolute -right-12 -top-12 w-48 h-48 bg-white opacity-10 rounded-full group-hover:scale-125 transition-transform duration-700 pointer-events-none"></div>
                <div class="absolute left-1/4 -bottom-10 w-32 h-32 bg-white opacity-5 rounded-full group-hover:-translate-y-4 group-hover:scale-110 transition-transform duration-700 pointer-events-none delay-100"></div>
                
                <h3 class="text-2xl font-bold text-white mb-4 relative z-10 text-center drop-shadow-sm">Visi</h3>
                <p class="text-white/95 leading-relaxed relative z-10 text-center font-medium">
                    Menjadi perusahaan yang tumbuh dan berkembang secara berkelanjutan dengan mengedepankan kapasitas, loyalitas, serta profesionalitas CV Darming sesuai dengan bidang keahliannya.
                </p>
            </div>

            <!-- Misi Card -->
            <div class="group relative p-8 md:p-10 bg-gradient-to-br from-[#ebba16] to-[#faca15] rounded-xl shadow-xl hover:shadow-2xl transform hover:-translate-y-1 hover:scale-[1.01] transition-all duration-300 overflow-hidden cursor-default">
                <!-- Decorative Elements -->
                <div class="absolute -left-12 -top-12 w-48 h-48 bg-white opacity-10 rounded-full group-hover:scale-125 transition-transform duration-700 pointer-events-none"></div>
                <div class="absolute right-1/4 -bottom-10 w-32 h-32 bg-white opacity-5 rounded-full group-hover:-translate-y-4 group-hover:scale-110 transition-transform duration-700 pointer-events-none delay-100"></div>

                <h3 class="text-2xl font-bold text-white mb-6 relative z-10 text-center drop-shadow-sm">Misi</h3>
                <ol class="text-white/95 leading-relaxed relative z-10 list-decimal pl-5 space-y-3 font-medium">
                    <li class="hover:translate-x-1 transition-transform duration-200">Menciptakan dan menyediakan lapangan pekerjaan guna mendukung peningkatan kesejahteraan masyarakat.</li>
                    <li class="hover:translate-x-1 transition-transform duration-200">Berkontribusi aktif dalam pengembangan industri properti melalui layanan konstruksi yang berkualitas.</li>
                    <li class="hover:translate-x-1 transition-transform duration-200">Mengembangkan serta memajukan bidang konstruksi, desain interior, dan desain eksterior dengan mengutamakan inovasi, ketelitian, dan kepuasan klien.</li>
                    <li class="hover:translate-x-1 transition-transform duration-200">Membangun kepercayaan mitra dan pelanggan melalui hasil kerja yang profesional, tepat waktu, dan sesuai standar mutu.</li>
                </ol>
            </div>
        </div>
    </div>
</section>

<!-- Intersection Observer Script for Scroll Animations -->
<script>
    document.addEventListener("DOMContentLoaded", function() {
        const observerOptions = {
            root: null,
            rootMargin: '0px',
            threshold: 0.15 // Trigger when 15% of the element is visible
        };

        const animationObserver = new IntersectionObserver((entries, observer) => {
            entries.forEach(entry => {
                if (entry.isIntersecting) {
                    entry.target.classList.add('appear');
                    observer.unobserve(entry.target); // Optional: if we only want it to animate once
                }
            });
        }, observerOptions);

        document.querySelectorAll('.animate-on-scroll').forEach(el => {
            animationObserver.observe(el);
        });
    });
</script>

@endsection