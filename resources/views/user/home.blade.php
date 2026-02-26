@extends('user.layouts.main')

@section('title', 'Home')

@section('content')

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
    .fade-left {
        transform: translateX(30px);
    }
    .fade-left.appear {
        transform: translateX(0);
    }
    .fade-right {
        transform: translateX(-30px);
    }
    .fade-right.appear {
        transform: translateX(0);
    }
    .delay-100 { transition-delay: 100ms; }
    .delay-200 { transition-delay: 200ms; }
    .delay-300 { transition-delay: 300ms; }
    .delay-400 { transition-delay: 400ms; }
    .delay-500 { transition-delay: 500ms; }
    
    .floating {
        animation: float 4s ease-in-out infinite;
    }
    
    @keyframes float {
        0% { transform: translateY(0px); }
        50% { transform: translateY(-15px); }
        100% { transform: translateY(0px); }
    }
</style>

<!-- ================= HERO ================= -->
    <section class="relative bg-cover bg-center bg-no-repeat overflow-hidden">
        <div class="relative max-w-6xl mx-auto px-6 pt-4 grid md:grid-cols-2 items-end">

            <!-- Text -->
            <div class="pb-24 z-10">
                <span class="inline-block mb-4 bg-yellow-400 text-black px-4 py-1 rounded-full text-sm font-semibold animate-on-scroll delay-100 hover:scale-105 transition duration-300 cursor-default">
                    Build Home With Trust
                </span>

                <h1 class="text-4xl md:text-5xl font-bold text-[#0b2a3f] mb-6 animate-on-scroll delay-200">
                    Membangun Rumah,<br>
                    Baru. Konsisten. Sempurna
                </h1>

                <p class="text-gray-600 mb-8 max-w-lg animate-on-scroll delay-300">
                    Find the home of your dreams, built by our best civil engineers.
                </p>

                <div class="flex gap-4 animate-on-scroll delay-400">
                    <a href="#" class="px-6 py-3 bg-[#0b2a3f] text-white rounded-lg font-semibold hover:-translate-y-1 hover:shadow-lg hover:bg-opacity-90 transition-all duration-300 cursor-pointer">
                        Mulai Project
                    </a>
                    <a href="#" class="px-6 py-3 border border-[#0b2a3f] text-[#0b2a3f] rounded-lg font-semibold hover:bg-[#0b2a3f] hover:text-white hover:-translate-y-1 hover:shadow-lg transition-all duration-300 cursor-pointer">
                        Info Lengkap
                    </a>
                </div>
            </div>

            <!-- Worker Image -->
            <div class="flex justify-end relative animate-on-scroll fade-left delay-300 z-0">
                <img src="{{ asset('images/worker.png') }}"
                class="h-[540px] object-contain ml-6 floating hover:scale-[1.02] transition-transform duration-500 cursor-pointer"
                alt="Worker">
            </div>
        </div>
    </section>

    <!-- ================= WELCOME ================= -->
    <section class="bg-yellow-400 py-24 overflow-hidden">
        <div class="max-w-7xl mx-auto px-6 grid md:grid-cols-2 gap-16 items-center">

            <div class="bg-gray-200 h-[360px] rounded-xl shadow-lg hover:shadow-2xl hover:scale-[1.02] transition-all duration-300 cursor-pointer animate-on-scroll fade-right delay-100"></div>

            <div class="animate-on-scroll fade-left delay-200">
                <h2 class="text-3xl font-bold text-[#0b2a3f] mb-6 hover:text-white transition duration-300 cursor-default">
                    Selamat Datang<br>Di Jayra Construction
                </h2>

                <p class="text-gray-700 mb-6 transition duration-300 hover:text-gray-900">
                    Kami adalah perusahaan jasa konstruksi yang berkomitmen menghadirkan
                    bangunan berkualitas, aman, dan selesai tepat waktu sesuai kebutuhan klien.
                </p>

                <ul class="space-y-3 mb-8">
                    <li class="hover:translate-x-2 transition duration-300 cursor-default">✔ Perencanaan proyek terstruktur</li>
                    <li class="hover:translate-x-2 transition duration-300 cursor-default">✔ Tenaga ahli profesional</li>
                    <li class="hover:translate-x-2 transition duration-300 cursor-default">✔ Material standar tinggi</li>
                    <li class="hover:translate-x-2 transition duration-300 cursor-default">✔ Pengawasan ketat</li>
                </ul>

                <a href="#" class="inline-flex items-center gap-2 bg-[#0b2a3f] text-white 
                         px-6 py-3 rounded-lg font-semibold group hover:bg-opacity-90 hover:shadow-lg hover:-translate-y-1 transition-all duration-300">
                    Baca Lebih Lanjut 
                    <span class="group-hover:translate-x-1 transition duration-300">→</span>
                </a>
            </div>
        </div>
    </section>

    <!-- ================= PROJECT ================= -->
    <section class="py-24 relative overflow-hidden">
        <div class="relative max-w-5xl mx-auto px-6">
            <div class="text-center mb-14 animate-on-scroll">
                <h2 class="text-3xl md:text-4xl font-bold text-[#0b2a3f] mb-4 hover:scale-105 transition duration-300 inline-block">
                    Our Project
                </h2>
                <p class="text-gray-600 max-w-2xl mx-auto">
                    Berikut adalah beberapa proyek yang telah kami kerjakan sebagai wujud
                    komitmen dalam menghadirkan kualitas, ketepatan, dan kepuasan klien.
                </p>
            </div>

            <div class="grid md:grid-cols-3 gap-6">
                <div class="md:row-span-2 rounded-2xl overflow-hidden shadow-lg group cursor-pointer animate-on-scroll delay-100 relative">
                    <img src="{{ asset('images/project (1).jpg') }}"
                         class="w-full h-full object-cover group-hover:scale-110 transition-transform duration-500 ease-in-out">
                    <div class="absolute inset-0 bg-black/20 opacity-0 group-hover:opacity-100 transition-opacity duration-300"></div>
                </div>

                <div class="rounded-2xl overflow-hidden shadow-lg group cursor-pointer animate-on-scroll delay-200 relative">
                    <img src="{{ asset('images/project (1).jpg') }}"
                         class="w-full h-full object-cover group-hover:scale-110 transition-transform duration-500 ease-in-out">
                    <div class="absolute inset-0 bg-black/20 opacity-0 group-hover:opacity-100 transition-opacity duration-300"></div>
                </div>

                <div class="rounded-2xl overflow-hidden shadow-lg group cursor-pointer animate-on-scroll delay-300 relative">
                    <img src="{{ asset('images/project (2).jpg') }}"
                         class="w-full h-full object-cover group-hover:scale-110 transition-transform duration-500 ease-in-out">
                    <div class="absolute inset-0 bg-black/20 opacity-0 group-hover:opacity-100 transition-opacity duration-300"></div>
                </div>

                <div class="rounded-2xl overflow-hidden shadow-lg group cursor-pointer animate-on-scroll delay-400 relative">
                    <img src="{{ asset('images/project (2).jpg') }}"
                         class="w-full h-full object-cover group-hover:scale-110 transition-transform duration-500 ease-in-out">
                    <div class="absolute inset-0 bg-black/20 opacity-0 group-hover:opacity-100 transition-opacity duration-300"></div>
                </div>

                <div class="rounded-2xl overflow-hidden shadow-lg group cursor-pointer animate-on-scroll delay-500 relative">
                    <img src="{{ asset('images/project (1).jpg') }}"
                         class="w-full h-full object-cover group-hover:scale-110 transition-transform duration-500 ease-in-out">
                    <div class="absolute inset-0 bg-black/20 opacity-0 group-hover:opacity-100 transition-opacity duration-300"></div>
                </div>
            </div>

            <div class="flex justify-end mt-10 animate-on-scroll delay-300">
                <a href="#"
                   class="bg-[#0b2a3f] text-white px-6 py-3 rounded-lg shadow hover:opacity-90 hover:-translate-y-1 hover:shadow-xl transition-all duration-300">
                    See More Project
                </a>
            </div>
        </div>
    </section>

    <section class="py-24 bg-yellow-400">
    <div class="max-w-6xl mx-auto px-6">

            <!-- TITLE -->
            <div class="mb-12 animate-on-scroll fade-right">
                <h2 class="text-3xl md:text-4xl font-bold text-[#0b2a3f] mb-4">
                    Our Services
                </h2>
                <p class="text-[#0b2a3f] max-w-2xl">
                    Kami menyediakan layanan konstruksi dan pengembangan bangunan dengan
                    kualitas terbaik, didukung tim profesional untuk mewujudkan bangunan
                    yang kuat, aman, dan sesuai kebutuhan Anda.
                </p>

                <div class="flex items-center gap-2 mt-4 text-[#0b2a3f] font-semibold hover:translate-x-2 transition duration-300 cursor-default">
                    <span class="animate-bounce">⭐</span> <span>Top Highlight Services</span>
                </div>
            </div>

            <!-- CARD -->
            <div class="grid md:grid-cols-3 gap-8">

                <!-- CARD 1 -->
                <div class="bg-white/80 backdrop-blur-md rounded-xl p-6 shadow-lg group hover:-translate-y-3 hover:shadow-2xl transition-all duration-300 animate-on-scroll delay-100 cursor-pointer">
                    <div class="text-orange-500 text-3xl mb-4 transform group-hover:scale-110 group-hover:rotate-12 transition-transform duration-300 inline-block">🏠</div>

                    <h3 class="text-lg font-bold text-[#0b2a3f] mb-2 group-hover:text-orange-500 transition-colors duration-300">
                        Renovasi Rumah
                    </h3>

                    <p class="text-sm text-gray-700 mb-6">
                        Kami melayani pembangunan dan renovasi rumah dengan desain nyaman dan konstruksi kokoh.
                    </p>

                    <a href="#"
                    class="inline-flex items-center justify-between gap-4 bg-orange-500 text-white px-5 py-2 rounded-lg text-sm group-hover:bg-orange-600 transition-colors duration-300 w-full">
                        Info Lebih Lanjut
                        <span class="transform group-hover:translate-x-2 transition p-1">→</span>
                    </a>
                </div>

                <!-- CARD 2 -->
                <div class="bg-white/80 backdrop-blur-md rounded-xl p-6 shadow-lg group hover:-translate-y-3 hover:shadow-2xl transition-all duration-300 animate-on-scroll delay-200 cursor-pointer">
                    <div class="text-orange-500 text-3xl mb-4 transform group-hover:scale-110 group-hover:rotate-12 transition-transform duration-300 inline-block">🏠</div>

                    <h3 class="text-lg font-bold text-[#0b2a3f] mb-2 group-hover:text-orange-500 transition-colors duration-300">
                        Renovasi Rumah
                    </h3>

                    <p class="text-sm text-gray-700 mb-6">
                        Kami melayani pembangunan dan renovasi rumah dengan desain nyaman dan konstruksi kokoh.
                    </p>

                    <a href="#"
                    class="inline-flex items-center justify-between gap-4 bg-orange-500 text-white px-5 py-2 rounded-lg text-sm group-hover:bg-orange-600 transition-colors duration-300 w-full">
                        Info Lebih Lanjut
                        <span class="transform group-hover:translate-x-2 transition p-1">→</span>
                    </a>
                </div>

                <!-- CARD 3 -->
                <div class="bg-white/80 backdrop-blur-md rounded-xl p-6 shadow-lg group hover:-translate-y-3 hover:shadow-2xl transition-all duration-300 animate-on-scroll delay-300 cursor-pointer">
                    <div class="text-orange-500 text-3xl mb-4 transform group-hover:scale-110 group-hover:rotate-12 transition-transform duration-300 inline-block">🏠</div>

                    <h3 class="text-lg font-bold text-[#0b2a3f] mb-2 group-hover:text-orange-500 transition-colors duration-300">
                        Renovasi Rumah
                    </h3>

                    <p class="text-sm text-gray-700 mb-6">
                        Kami melayani pembangunan dan renovasi rumah dengan desain nyaman dan konstruksi kokoh.
                    </p>

                    <a href="#"
                    class="inline-flex items-center justify-between gap-4 bg-orange-500 text-white px-5 py-2 rounded-lg text-sm group-hover:bg-orange-600 transition-colors duration-300 w-full">
                        Info Lebih Lanjut
                        <span class="transform group-hover:translate-x-2 transition p-1">→</span>
                    </a>
                </div>

            </div>

            <!-- BUTTON -->
            <div class="flex justify-center mt-14 animate-on-scroll delay-400">
                <a href="#"
                class="bg-[#0b2a3f] text-white px-6 py-3 rounded-lg shadow hover:opacity-90 hover:-translate-y-1 hover:shadow-xl transition-all duration-300">
                    See More Services
                </a>
            </div>

        </div>
    </section>

        <section class="py-24 relative overflow-hidden bg-gray-50">
           
        <div class="relative max-w-6xl mx-auto px-6">

            <!-- TITLE -->
            <div class="mb-14 flex justify-end animate-on-scroll fade-left">
                <div class="max-w-2xl text-right mr-17">
                    <h2 class="text-3xl md:text-4xl font-bold text-[#0b2a3f] mb-4">
                        Our Certification
                    </h2>
                    <p class="text-gray-600">
                        Perusahaan kami didukung oleh sertifikasi resmi yang menjamin kualitas kerja,
                        keselamatan, dan profesionalisme dalam setiap proyek konstruksi.
                    </p>
                </div>
            </div>
            <!-- CARD -->
            <div class="grid md:grid-cols-3 gap-8">

                <!-- CARD 1 -->
                <div class="bg-orange-500 rounded-xl p-5 shadow-lg text-white group hover:-translate-y-2 hover:shadow-2xl transition-all duration-300 cursor-pointer animate-on-scroll delay-100">
                    
                    <!-- IMAGE -->
                    <div class="bg-gray-200 rounded-lg mb-4 overflow-hidden relative">
                        <img src="{{ asset('images/sertifikat1.jpg') }}"
                            class="w-full h-[180px] object-cover group-hover:scale-110 transition-transform duration-500 ease-in-out">
                        <div class="absolute inset-0 bg-[#0b2a3f]/10 opacity-0 group-hover:opacity-100 transition-opacity duration-300"></div>
                    </div>

                    <h3 class="font-semibold text-lg mb-2">
                        Sertifikasi Keahlian Tukang
                    </h3>

                    <p class="text-sm mb-4 opacity-90">
                        Tukang kami bersertifikat dan berpengalaman dalam pekerjaan konstruksi yang aman dan berkualitas.
                    </p>

                    <a href="#"
                    class="bg-[#0b2a3f] px-4 py-1 rounded text-sm inline-block group-hover:bg-white group-hover:text-[#0b2a3f] transition-colors duration-300 font-semibold">
                        Detail
                    </a>
                </div>

                <!-- CARD 2 -->
                <div class="bg-orange-500 rounded-xl p-5 shadow-lg text-white group hover:-translate-y-2 hover:shadow-2xl transition-all duration-300 cursor-pointer animate-on-scroll delay-200">
                    
                    <div class="bg-gray-200 rounded-lg mb-4 overflow-hidden relative">
                        <img src="{{ asset('images/sertifikat1.jpg') }}"
                            class="w-full h-[180px] object-cover group-hover:scale-110 transition-transform duration-500 ease-in-out">
                        <div class="absolute inset-0 bg-[#0b2a3f]/10 opacity-0 group-hover:opacity-100 transition-opacity duration-300"></div>
                    </div>

                    <h3 class="font-semibold text-lg mb-2">
                        Sertifikasi Keahlian Tukang
                    </h3>

                    <p class="text-sm mb-4 opacity-90">
                        Tukang kami bersertifikat dan berpengalaman dalam pekerjaan konstruksi yang aman dan berkualitas.
                    </p>

                    <a href="#"
                    class="bg-[#0b2a3f] px-4 py-1 rounded text-sm inline-block group-hover:bg-white group-hover:text-[#0b2a3f] transition-colors duration-300 font-semibold">
                        Detail
                    </a>
                </div>

                <!-- CARD 3 -->
                <div class="bg-orange-500 rounded-xl p-5 shadow-lg text-white group hover:-translate-y-2 hover:shadow-2xl transition-all duration-300 cursor-pointer animate-on-scroll delay-300">
                    
                    <div class="bg-gray-200 rounded-lg mb-4 overflow-hidden relative">
                        <img src="{{ asset('images/sertifikat1.jpg') }}"
                            class="w-full h-[180px] object-cover group-hover:scale-110 transition-transform duration-500 ease-in-out">
                        <div class="absolute inset-0 bg-[#0b2a3f]/10 opacity-0 group-hover:opacity-100 transition-opacity duration-300"></div>
                    </div>

                    <h3 class="font-semibold text-lg mb-2">
                        Sertifikasi Keahlian Tukang
                    </h3>

                    <p class="text-sm mb-4 opacity-90">
                        Tukang kami bersertifikat dan berpengalaman dalam pekerjaan konstruksi yang aman dan berkualitas.
                    </p>

                    <a href="#"
                    class="bg-[#0b2a3f] px-4 py-1 rounded text-sm inline-block group-hover:bg-white group-hover:text-[#0b2a3f] transition-colors duration-300 font-semibold">
                        Detail
                    </a>
                </div>

            </div>

        </div>
    </section>


    <!-- CONSULTATION SECTION PREMIUM -->
    <section class="bg-yellow-400 py-28 relative overflow-hidden">
        <div class="max-w-7xl mx-auto px-6 relative z-10">

            <!-- TITLE -->
            <div class="text-center mb-20 animate-on-scroll">
                <h2 class="text-4xl md:text-5xl font-bold text-[#0b2a3f] mb-6 inline-block hover:scale-105 transition duration-300 cursor-default">
                    Jadwalkan Konsultasi
                </h2>
                <p class="text-[#0b2a3f]/80 max-w-3xl mx-auto text-lg transition duration-300 hover:text-[#0b2a3f] cursor-default">
                    Konsultasikan rencana pembangunan Anda bersama tim profesional kami
                    untuk mendapatkan solusi konstruksi yang tepat dan sesuai kebutuhan.
                </p>
            </div>

            <!-- GRID -->
            <div class="grid md:grid-cols-2 gap-20 items-center">

                <!-- FORM CARD -->
                <div class="bg-white/90 backdrop-blur-md rounded-2xl shadow-2xl p-10 max-w-lg animate-on-scroll fade-right delay-100 hover:shadow-[0_20px_50px_rgba(11,42,63,0.15)] transition-shadow duration-300">

                    <form action="#" method="POST" class="space-y-6">
                        <!-- Nama -->
                        <div class="group">
                            <label class="block text-sm font-semibold text-gray-700 mb-2 group-focus-within:text-[#0b2a3f] transition-colors duration-300">
                                Nama
                            </label>
                            <input type="text"
                                name="nama"
                                placeholder="Nama Lengkap"
                                class="w-full bg-gray-100 border border-gray-200 rounded-xl px-4 py-3 
                                        focus:outline-none focus:ring-2 focus:ring-[#0b2a3f] 
                                        focus:bg-white focus:-translate-y-1 transition-all duration-300 hover:bg-white hover:border-[#0b2a3f]/30">
                        </div>

                        <!-- Email -->
                        <div class="group">
                            <label class="block text-sm font-semibold text-gray-700 mb-2 group-focus-within:text-[#0b2a3f] transition-colors duration-300">
                                Email
                            </label>
                            <input type="email"
                                name="email"
                                placeholder="Masukan Email"
                                class="w-full bg-gray-100 border border-gray-200 rounded-xl px-4 py-3 
                                        focus:outline-none focus:ring-2 focus:ring-[#0b2a3f] 
                                        focus:bg-white focus:-translate-y-1 transition-all duration-300 hover:bg-white hover:border-[#0b2a3f]/30">
                        </div>

                        <!-- Pesan -->
                        <div class="group">
                            <label class="block text-sm font-semibold text-gray-700 mb-2 group-focus-within:text-[#0b2a3f] transition-colors duration-300">
                                Pesan
                            </label>
                            <textarea name="pesan"
                                    rows="4"
                                    placeholder="Pesan kepada kami"
                                    class="w-full bg-gray-100 border border-gray-200 rounded-xl px-4 py-3 
                                            focus:outline-none focus:ring-2 focus:ring-[#0b2a3f] 
                                            focus:bg-white focus:-translate-y-1 transition-all duration-300 hover:bg-white hover:border-[#0b2a3f]/30 resize-none"></textarea>
                        </div>

                        <!-- BUTTON -->
                        <button type="submit"
                                class="w-full bg-[#0b2a3f] text-white py-3 rounded-xl font-semibold 
                                    hover:shadow-lg hover:-translate-y-1 active:translate-y-0 active:scale-95 transition-all duration-300">
                            Kirim Pesan
                        </button>

                    </form>
                </div>

                <!-- CONTACT INFO -->
                <div class="text-[#0b2a3f] animate-on-scroll fade-left delay-200">

                    <h3 class="text-3xl font-bold mb-6 hover:translate-x-2 transition duration-300 cursor-default">
                        Jadwalkan Konsultasi Sekarang!
                    </h3>

                    <p class="mb-10 text-lg text-[#0b2a3f]/80 cursor-default">
                        Silakan hubungi kami untuk memulai diskusi proyek pembangunan Anda.
                    </p>

                    <div class="space-y-8">

                        <!-- Kantor -->
                        <div class="flex items-start gap-5 group cursor-pointer">
                            <div class="bg-white rounded-full p-3 shadow-md text-xl group-hover:scale-110 group-hover:rotate-12 group-hover:bg-[#0b2a3f] group-hover:text-white transition-all duration-300">
                                📍
                            </div>
                            <div class="group-hover:translate-x-2 transition-transform duration-300">
                                <h4 class="font-semibold text-lg">Kantor Kami</h4>
                                <p class="text-sm text-[#0b2a3f]/80 group-hover:text-[#0b2a3f] transition-colors duration-300">
                                    Desa Pejurukan, RT02/RW01, Kec. Kalibagor, Banyumas,
                                    Jawa Tengah 53191, Indonesia
                                </p>
                            </div>
                        </div>

                        <!-- Email -->
                        <div class="flex items-start gap-5 group cursor-pointer">
                            <div class="bg-white rounded-full p-3 shadow-md text-xl group-hover:scale-110 group-hover:-rotate-12 group-hover:bg-[#0b2a3f] group-hover:text-white transition-all duration-300">
                                ✉
                            </div>
                            <div class="group-hover:translate-x-2 transition-transform duration-300">
                                <h4 class="font-semibold text-lg">Email</h4>
                                <p class="text-sm text-[#0b2a3f]/80 group-hover:text-[#0b2a3f] transition-colors duration-300">
                                    cv.darmingjayagrup@gmail.com
                                </p>
                            </div>
                        </div>

                        <!-- Phone -->
                        <div class="flex items-start gap-5 group cursor-pointer">
                            <div class="bg-white rounded-full p-3 shadow-md text-xl group-hover:scale-110 group-hover:rotate-12 group-hover:bg-[#0b2a3f] group-hover:text-white transition-all duration-300">
                                📞
                            </div>
                            <div class="group-hover:translate-x-2 transition-transform duration-300">
                                <h4 class="font-semibold text-lg">No Telephone</h4>
                                <p class="text-sm text-[#0b2a3f]/80 group-hover:text-[#0b2a3f] transition-colors duration-300">
                                    +62 857-7236-4659
                                </p>
                            </div>
                        </div>

                    </div>

                </div>

            </div>
        </div>
        
        <!-- Decoration element -->
        <div class="absolute -bottom-20 -right-20 w-64 h-64 bg-white/20 rounded-full blur-3xl animate-pulse"></div>
    </section>

    <!-- Script Animation Observer -->
    <script>
        document.addEventListener("DOMContentLoaded", function() {
            const observerOptions = {
                root: null,
                rootMargin: '0px',
                threshold: 0.15
            };

            const observer = new IntersectionObserver((entries, observer) => {
                entries.forEach(entry => {
                    if (entry.isIntersecting) {
                        entry.target.classList.add('appear');
                        observer.unobserve(entry.target);
                    }
                });
            }, observerOptions);

            document.querySelectorAll('.animate-on-scroll').forEach((el) => {
                observer.observe(el);
            });
        });
    </script>

@endsection