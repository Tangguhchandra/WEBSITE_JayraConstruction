@extends('user.layouts.main')

@section('title', 'Contact Person')

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

<div class="pt-32 pb-0 relative overflow-hidden bg-gray-50/50">

    <!-- Section: Kontak Tim Kami -->
    <section class="max-w-6xl mx-auto px-6 mb-24 relative z-10 text-center">
        <div class="animate-on-scroll">
            <h1 class="text-4xl md:text-5xl font-bold text-[#0b2a3f] mb-3 tracking-tight">
                Kontak Tim Kami
            </h1>
            <p class="text-gray-600 font-medium mb-16">
                Untuk membantu pengembangan lebih lanjut
            </p>
        </div>

        <!-- Team Grid Placeholders -->
        <div class="grid grid-cols-2 md:grid-cols-4 gap-6 animate-on-scroll delay-100">
            @for ($i = 1; $i <= 4; $i++)
            <div class="bg-gray-200/80 backdrop-blur-sm rounded-xl aspect-square shadow-sm hover:shadow-xl hover:-translate-y-2 transition-all duration-300 cursor-pointer overflow-hidden relative group">
                <div class="absolute inset-0 bg-gradient-to-tr from-gray-300 to-transparent opacity-50 group-hover:opacity-0 transition-opacity duration-300"></div>
            </div>
            @endfor
        </div>
    </section>

    <!-- Section: Frekuensi Pertanyaan (FAQ) -->
    <section class="max-w-4xl mx-auto px-6 mb-24 relative z-10">
        <div class="text-center mb-12 animate-on-scroll">
            <h2 class="text-3xl md:text-4xl font-bold text-[#0b2a3f]">
                Frekuensi Pertanyaan
            </h2>
        </div>

        <div class="flex flex-col gap-6 animate-on-scroll delay-100">
            @php
                $faqs = [
                    "Layanan apa saja yang ditawarkan oleh CV Darming?",
                    "Apakah CV Darming melayani desain interior dan eksterior sekaligus pembangunan?",
                    "Apakah bisa konsultasi dan survei lokasi terlebih dahulu?",
                    "Berapa lama estimasi waktu pengerjaan proyek konstruksi?",
                    "Apakah biaya proyek bisa disesuaikan dengan budget klien?",
                    "Apakah CV Darming menerima proyek skala kecil maupun besar?"
                ];
            @endphp
            
            @foreach ($faqs as $index => $faq)
                <div class="flex items-center gap-4 group cursor-pointer hover:translate-x-2 transition-transform duration-300">
                    <div class="w-8 h-8 rounded-full flex-shrink-0 {{ $index % 2 === 0 ? 'bg-[#2b4c6b]' : 'bg-[#ea580c]' }} shadow-md group-hover:scale-110 transition-transform duration-300"></div>
                    <p class="text-gray-800 font-medium text-lg leading-snug group-hover:text-black transition-colors duration-300">
                        {{ $faq }}
                    </p>
                </div>
            @endforeach
        </div>

        <div class="text-center mt-12 animate-on-scroll delay-200">
            <button class="bg-[#ffcc00] text-black font-semibold py-3 px-8 rounded-full shadow-md hover:shadow-xl hover:-translate-y-1 hover:bg-[#eab308] transition-all duration-300">
                Load More
            </button>
        </div>
    </section>

    <!-- Section: Kontak Kami (Contact Form) -->
    <section class="bg-[#ea580c] pt-20 pb-28 relative overflow-hidden">
        
        <!-- Background Decor -->
        <div class="absolute top-0 right-1/4 w-96 h-96 bg-yellow-400/20 rounded-full blur-3xl mix-blend-overlay animate-pulse duration-1000 z-0 pointer-events-none"></div>
        <div class="absolute bottom-10 left-10 w-64 h-64 bg-white/10 rounded-full blur-3xl mix-blend-overlay animate-pulse delay-500 z-0 pointer-events-none"></div>

        <div class="max-w-6xl mx-auto px-6 relative z-10">
            <div class="text-center mb-12 animate-on-scroll">
                <h2 class="text-4xl md:text-5xl font-bold text-white mb-3 drop-shadow-sm">
                    Kontak Kami
                </h2>
                <p class="text-white/90 font-medium">
                    To assist in further development
                </p>
            </div>

            <!-- Form Card -->
            <div class="bg-gray-50 rounded-2xl p-8 md:p-12 shadow-2xl animate-on-scroll delay-100 max-w-5xl mx-auto">
                <form action="#" method="POST" class="grid md:grid-cols-2 gap-x-12 gap-y-6">
                    
                    <!-- Left Column -->
                    <div class="flex flex-col gap-6">
                        <div class="group">
                            <label class="block text-sm font-semibold text-gray-700 mb-2 transition-colors duration-300">Nama Depan</label>
                            <input type="text" placeholder="Masukkan nama depan" class="w-full bg-white border border-gray-300 rounded-md px-4 py-2.5 text-sm focus:outline-none focus:ring-2 focus:ring-[#ea580c] focus:border-transparent transition-all duration-300 shadow-sm hover:border-gray-400">
                        </div>

                        <div class="group">
                            <label class="block text-sm font-semibold text-gray-700 mb-2 transition-colors duration-300">Nama Belakang</label>
                            <input type="text" placeholder="Masukkan nama belakang" class="w-full bg-white border border-gray-300 rounded-md px-4 py-2.5 text-sm focus:outline-none focus:ring-2 focus:ring-[#ea580c] focus:border-transparent transition-all duration-300 shadow-sm hover:border-gray-400">
                        </div>

                        <div class="group">
                            <label class="block text-sm font-semibold text-gray-700 mb-2 transition-colors duration-300">No Handphone</label>
                            <input type="tel" placeholder="Masukkan no handphone" class="w-full bg-white border border-gray-300 rounded-md px-4 py-2.5 text-sm focus:outline-none focus:ring-2 focus:ring-[#ea580c] focus:border-transparent transition-all duration-300 shadow-sm hover:border-gray-400">
                        </div>

                        <div class="group">
                            <label class="block text-sm font-semibold text-gray-700 mb-2 transition-colors duration-300">Email</label>
                            <input type="email" placeholder="Masukkan email" class="w-full bg-white border border-gray-300 rounded-md px-4 py-2.5 text-sm focus:outline-none focus:ring-2 focus:ring-[#ea580c] focus:border-transparent transition-all duration-300 shadow-sm hover:border-gray-400">
                        </div>
                    </div>

                    <!-- Right Column -->
                    <div class="flex flex-col gap-6">
                        <div class="group h-full flex flex-col">
                            <label class="block text-sm font-semibold text-gray-700 mb-2 transition-colors duration-300">Pesan Khusus</label>
                            <textarea placeholder="Tuliskan Pesan Khusus Kepada Kami" rows="6" class="w-full h-full bg-white border border-gray-300 rounded-md px-4 py-2.5 text-sm focus:outline-none focus:ring-2 focus:ring-[#ea580c] focus:border-transparent transition-all duration-300 shadow-sm hover:border-gray-400 resize-none"></textarea>
                        </div>

                        <div class="group">
                            <label class="block text-sm font-semibold text-gray-700 mb-2 transition-colors duration-300">Pilih Layanan Jayra</label>
                            <select class="w-full bg-white border border-gray-300 rounded-md px-4 py-2.5 text-sm focus:outline-none focus:ring-2 focus:ring-[#ea580c] focus:border-transparent transition-all duration-300 shadow-sm hover:border-gray-400 appearance-none cursor-pointer">
                                <option disabled selected>Pilih Layanan</option>
                                <option>Renovasi Rumah</option>
                                <option>Pembangunan Baru</option>
                                <option>Desain Interior</option>
                                <option>Lainnya</option>
                            </select>
                            <!-- Custom dropdown arrow -->
                        </div>

                        <!-- Buttons Row -->
                        <div class="flex flex-col sm:flex-row gap-4 mt-auto pt-2">
                            <a href="#" class="flex-1 flex items-center justify-center gap-2 bg-[#ffcc00] text-black font-semibold py-3 px-6 rounded-md shadow hover:-translate-y-1 hover:shadow-lg transition-all duration-300">
                                <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 24 24"><path d="M17.472 14.382c-.297-.149-1.758-.867-2.03-.967-.273-.099-.471-.148-.67.15-.197.297-.767.966-.94 1.164-.173.199-.347.223-.644.075-.297-.15-1.255-.463-2.39-1.475-.883-.788-1.48-1.761-1.653-2.059-.173-.297-.018-.458.13-.606.134-.133.298-.347.446-.52.149-.174.198-.298.298-.497.099-.198.05-.371-.025-.52-.075-.149-.669-1.612-.916-2.207-.242-.579-.487-.5-.669-.51-.173-.008-.371-.01-.57-.01-.198 0-.52.074-.792.372-.272.297-1.04 1.016-1.04 2.479 0 1.462 1.065 2.875 1.213 3.074.149.198 2.096 3.2 5.077 4.487.709.306 1.262.489 1.694.625.712.227 1.36.195 1.871.118.571-.085 1.758-.719 2.006-1.413.248-.694.248-1.289.173-1.413-.074-.124-.272-.198-.57-.347m-5.421 7.403h-.004a9.87 9.87 0 01-5.031-1.378l-.361-.214-3.741.982.998-3.648-.235-.374a9.86 9.86 0 01-1.51-5.26c.001-5.45 4.436-9.884 9.888-9.884 2.64 0 5.122 1.03 6.988 2.898a9.825 9.825 0 012.893 6.994c-.003 5.45-4.437 9.884-9.885 9.884m8.413-18.297A11.815 11.815 0 0012.05 0C5.495 0 .16 5.335.157 11.892c0 2.096.547 4.142 1.588 5.945L.057 24l6.305-1.654a11.882 11.882 0 005.683 1.448h.005c6.554 0 11.89-5.335 11.893-11.893a11.821 11.821 0 00-3.48-8.413z"/></svg>
                                Message On WhatsApp
                            </a>
                            <button type="submit" class="flex-1 bg-[#ffcc00] text-black font-semibold py-3 px-6 rounded-md shadow hover:-translate-y-1 hover:shadow-lg transition-all duration-300">
                                Submit Message
                            </button>
                        </div>
                    </div>

                </form>
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