<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Jayra Construction</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>

<body class="font-sans bg-[#f5f7fb] text-gray-800"
      style="background-image: url('{{ asset('images/background.png') }}')">

    <!-- NAVBAR FLOATING -->
    <nav class="sticky top-4 z-50 transition-all duration-500">

    <div class="max-w-6xl mx-auto px-6 flex justify-end items-center gap-4">

        <!-- NAVBAR FULL -->
        <div id="navbar-inner"
            class="bg-[#0b2a3f]/80 backdrop-blur-md
                text-white rounded-md px-8 py-4
                flex items-center gap-10 shadow-lg
                transition-all duration-700 ease-[cubic-bezier(0.4,0,0.2,1)]
                origin-right">

            <!-- MENU -->
            <ul class="flex items-center gap-14 text-sm font-medium">
                <li><a href="/" class="hover:text-yellow-400 transition">Home</a></li>
                <li><a href="#" class="hover:text-yellow-400 transition">Profile</a></li>
                <li><a href="#" class="hover:text-yellow-400 transition">Service</a></li>
                <li><a href="#" class="hover:text-yellow-400 transition">Project</a></li>
                <li><a href="#" class="hover:text-yellow-400 transition">Contact</a></li>
            </ul>

            <!-- LOGIN -->
            <a href="{{ route('login') }}"
            class="text-sm hover:text-yellow-400 transition pl-4 border-l border-white/20">
                Login
            </a>
        </div>

        <!-- TOGGLE BUTTON (SELALU ADA) -->
        <button id="navToggle"
            class="bg-[#0b2a3f] text-white px-3 py-2 rounded-md shadow-lg transition hover:scale-105">
            ☰
        </button>

    </div>
    </nav>

    <!-- ================= HERO ================= -->
    <section class="relative bg-cover bg-center bg-no-repeat overflow-hidden">
        <div class="relative max-w-6xl mx-auto px-6 pt-4 grid md:grid-cols-2 items-end">

            <!-- Text -->
            <div class="pb-24 ">
                <span class="inline-block mb-4 bg-yellow-400 text-black px-4 py-1 rounded-full text-sm font-semibold">
                    Build Home With Trust
                </span>

                <h1 class="text-4xl md:text-5xl font-bold text-[#0b2a3f] mb-6">
                    Membangun Rumah,<br>
                    Baru. Konsisten. Sempurna
                </h1>

                <p class="text-gray-600 mb-8 max-w-lg">
                    Find the home of your dreams, built by our best civil engineers.
                </p>

                <div class="flex gap-4">
                    <a class="px-6 py-3 bg-[#0b2a3f] text-white rounded-lg font-semibold">
                        Mulai Project
                    </a>
                    <a class="px-6 py-3 border border-[#0b2a3f] rounded-lg font-semibold">
                        Info Lengkap
                    </a>
                </div>
            </div>

            <!-- Worker Image -->
            <div class="flex justify-end">
                <img src="{{ asset('images/worker.png') }}"
                class="h-[540px] object-contain ml-6"
                alt="Worker">
            </div>
        </div>
    </section>

    <!-- ================= WELCOME ================= -->
    <section class="bg-yellow-400 py-24">
        <div class="max-w-7xl mx-auto px-6 grid md:grid-cols-2 gap-16 items-center">

            <div class="bg-gray-200 h-[360px] rounded-xl shadow"></div>

            <div>
                <h2 class="text-3xl font-bold text-[#0b2a3f] mb-6">
                    Selamat Datang<br>Di Jayra Construction
                </h2>

                <p class="text-gray-700 mb-6">
                    Kami adalah perusahaan jasa konstruksi yang berkomitmen menghadirkan
                    bangunan berkualitas, aman, dan selesai tepat waktu sesuai kebutuhan klien.
                </p>

                <ul class="space-y-3 mb-8">
                    <li>✔ Perencanaan proyek terstruktur</li>
                    <li>✔ Tenaga ahli profesional</li>
                    <li>✔ Material standar tinggi</li>
                    <li>✔ Pengawasan ketat</li>
                </ul>

                <a class="inline-flex items-center gap-2 bg-[#0b2a3f] text-white 
                         px-6 py-3 rounded-lg font-semibold">
                    Baca Lebih Lanjut →
                </a>
            </div>
        </div>
    </section>

    <!-- ================= PROJECT ================= -->
    <section class="py-24 relative overflow-hidden">
        <div class="absolute inset-0 opacity-10 bg-cover bg-center"
             style="background-image: url('{{ asset('images/background.png') }}')">
        </div>

        <div class="relative max-w-5xl mx-auto px-6">
            <div class="text-center mb-14">
                <h2 class="text-3xl md:text-4xl font-bold text-[#0b2a3f] mb-4">
                    Our Project
                </h2>
                <p class="text-gray-600 max-w-2xl mx-auto">
                    Berikut adalah beberapa proyek yang telah kami kerjakan sebagai wujud
                    komitmen dalam menghadirkan kualitas, ketepatan, dan kepuasan klien.
                </p>
            </div>

            <div class="grid md:grid-cols-3 gap-6">
                <div class="md:row-span-2 rounded-2xl overflow-hidden shadow-lg">
                    <img src="{{ asset('images/project (1).jpg') }}"
                         class="w-full h-full object-cover">
                </div>

                <div class="rounded-2xl overflow-hidden shadow-lg">
                    <img src="{{ asset('images/project (1).jpg') }}"
                         class="w-full h-full object-cover">
                </div>

                <div class="rounded-2xl overflow-hidden shadow-lg">
                    <img src="{{ asset('images/project (2).jpg') }}"
                         class="w-full h-full object-cover">
                </div>

                <div class="rounded-2xl overflow-hidden shadow-lg">
                    <img src="{{ asset('images/project (2).jpg') }}"
                         class="w-full h-full object-cover">
                </div>

                <div class="rounded-2xl overflow-hidden shadow-lg">
                    <img src="{{ asset('images/project (1).jpg') }}"
                         class="w-full h-full object-cover">
                </div>
            </div>

            <div class="flex justify-end mt-10">
                <a href="#"
                   class="bg-[#0b2a3f] text-white px-6 py-3 rounded-lg shadow hover:opacity-90 transition">
                    See More Project
                </a>
            </div>
        </div>
    </section>

    <section class="py-24 bg-yellow-400">
    <div class="max-w-6xl mx-auto px-6">

            <!-- TITLE -->
            <div class="mb-12">
                <h2 class="text-3xl md:text-4xl font-bold text-[#0b2a3f] mb-4">
                    Our Services
                </h2>
                <p class="text-[#0b2a3f] max-w-2xl">
                    Kami menyediakan layanan konstruksi dan pengembangan bangunan dengan
                    kualitas terbaik, didukung tim profesional untuk mewujudkan bangunan
                    yang kuat, aman, dan sesuai kebutuhan Anda.
                </p>

                <div class="flex items-center gap-2 mt-4 text-[#0b2a3f] font-semibold">
                    ⭐ <span>Top Highlight Services</span>
                </div>
            </div>

            <!-- CARD -->
            <div class="grid md:grid-cols-3 gap-8">

                <!-- CARD 1 -->
                <div class="bg-white/80 backdrop-blur-md rounded-xl p-6 shadow-lg">
                    <div class="text-orange-500 text-3xl mb-4">🏠</div>

                    <h3 class="text-lg font-bold text-[#0b2a3f] mb-2">
                        Renovasi Rumah
                    </h3>

                    <p class="text-sm text-gray-700 mb-6">
                        Kami melayani pembangunan dan renovasi rumah dengan desain nyaman dan konstruksi kokoh.
                    </p>

                    <a href="#"
                    class="inline-flex items-center justify-between gap-4 bg-orange-500 text-white px-5 py-2 rounded-lg text-sm hover:bg-orange-600 transition">
                        Info Lebih Lanjut
                        <span>→</span>
                    </a>
                </div>

                <!-- CARD 2 -->
                <div class="bg-white/80 backdrop-blur-md rounded-xl p-6 shadow-lg">
                    <div class="text-orange-500 text-3xl mb-4">🏠</div>

                    <h3 class="text-lg font-bold text-[#0b2a3f] mb-2">
                        Renovasi Rumah
                    </h3>

                    <p class="text-sm text-gray-700 mb-6">
                        Kami melayani pembangunan dan renovasi rumah dengan desain nyaman dan konstruksi kokoh.
                    </p>

                    <a href="#"
                    class="inline-flex items-center justify-between gap-4 bg-orange-500 text-white px-5 py-2 rounded-lg text-sm hover:bg-orange-600 transition">
                        Info Lebih Lanjut
                        <span>→</span>
                    </a>
                </div>

                <!-- CARD 3 -->
                <div class="bg-white/80 backdrop-blur-md rounded-xl p-6 shadow-lg">
                    <div class="text-orange-500 text-3xl mb-4">🏠</div>

                    <h3 class="text-lg font-bold text-[#0b2a3f] mb-2">
                        Renovasi Rumah
                    </h3>

                    <p class="text-sm text-gray-700 mb-6">
                        Kami melayani pembangunan dan renovasi rumah dengan desain nyaman dan konstruksi kokoh.
                    </p>

                    <a href="#"
                    class="inline-flex items-center justify-between gap-4 bg-orange-500 text-white px-5 py-2 rounded-lg text-sm hover:bg-orange-600 transition">
                        Info Lebih Lanjut
                        <span>→</span>
                    </a>
                </div>

            </div>

            <!-- BUTTON -->
            <div class="flex justify-center mt-14">
                <a href="#"
                class="bg-[#0b2a3f] text-white px-6 py-3 rounded-lg shadow hover:opacity-90 transition">
                    See More Services
                </a>
            </div>

        </div>
    </section>

    <section class="py-24 bg-[#eef1f6] relative overflow-hidden">

        <!-- BACKGROUND MOTIF -->
        <div class="absolute inset-0 opacity-10 bg-cover bg-center"
             style="background-image: url('{{ asset('images/background.png') }}')">
        </div>
        <div class="relative max-w-6xl mx-auto px-6">

            <!-- TITLE -->
            <div class="mb-14 flex justify-end">
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
                <div class="bg-orange-500 rounded-xl p-5 shadow-lg text-white">
                    
                    <!-- IMAGE -->
                    <div class="bg-gray-200 rounded-lg mb-4 overflow-hidden">
                        <img src="{{ asset('images/sertifikat1.jpg') }}"
                            class="w-full h-[180px] object-cover">
                    </div>

                    <h3 class="font-semibold text-lg mb-2">
                        Sertifikasi Keahlian Tukang
                    </h3>

                    <p class="text-sm mb-4">
                        Tukang kami bersertifikat dan berpengalaman dalam pekerjaan konstruksi yang aman dan berkualitas.
                    </p>

                    <a href="#"
                    class="bg-[#0b2a3f] px-4 py-1 rounded text-sm inline-block">
                        Detail
                    </a>
                </div>

                <!-- CARD 2 -->
                <div class="bg-orange-500 rounded-xl p-5 shadow-lg text-white">
                    
                    <div class="bg-gray-200 rounded-lg mb-4 overflow-hidden">
                        <img src="{{ asset('images/sertifikat1.jpg') }}"
                            class="w-full h-[180px] object-cover">
                    </div>

                    <h3 class="font-semibold text-lg mb-2">
                        Sertifikasi Keahlian Tukang
                    </h3>

                    <p class="text-sm mb-4">
                        Tukang kami bersertifikat dan berpengalaman dalam pekerjaan konstruksi yang aman dan berkualitas.
                    </p>

                    <a href="#"
                    class="bg-[#0b2a3f] px-4 py-1 rounded text-sm inline-block">
                        Detail
                    </a>
                </div>

                <!-- CARD 3 -->
                <div class="bg-orange-500 rounded-xl p-5 shadow-lg text-white">
                    
                    <div class="bg-gray-200 rounded-lg mb-4 overflow-hidden">
                        <img src="{{ asset('images/sertifikat1.jpg') }}"
                            class="w-full h-[180px] object-cover">
                    </div>

                    <h3 class="font-semibold text-lg mb-2">
                        Sertifikasi Keahlian Tukang
                    </h3>

                    <p class="text-sm mb-4">
                        Tukang kami bersertifikat dan berpengalaman dalam pekerjaan konstruksi yang aman dan berkualitas.
                    </p>

                    <a href="#"
                    class="bg-[#0b2a3f] px-4 py-1 rounded text-sm inline-block hover:opacity-90">
                        Detail
                    </a>
                </div>

            </div>

        </div>
    </section>


    <!-- CONSULTATION SECTION PREMIUM -->
    <section class="bg-yellow-400 py-28">
        <div class="max-w-7xl mx-auto px-6">

            <!-- TITLE -->
            <div class="text-center mb-20">
                <h2 class="text-4xl md:text-5xl font-bold text-[#0b2a3f] mb-6">
                    Jadwalkan Konsultasi
                </h2>
                <p class="text-[#0b2a3f]/80 max-w-3xl mx-auto text-lg">
                    Konsultasikan rencana pembangunan Anda bersama tim profesional kami
                    untuk mendapatkan solusi konstruksi yang tepat dan sesuai kebutuhan.
                </p>
            </div>

            <!-- GRID -->
            <div class="grid md:grid-cols-2 gap-20 items-center">

                <!-- FORM CARD -->
                <div class="bg-white/90 backdrop-blur-md rounded-2xl shadow-2xl p-10 max-w-lg">

                    <form action="#" method="POST" class="space-y-6">
                        <!-- Nama -->
                        <div>
                            <label class="block text-sm font-semibold text-gray-700 mb-2">
                                Nama
                            </label>
                            <input type="text"
                                name="nama"
                                placeholder="Nama Lengkap"
                                class="w-full bg-gray-100 border border-gray-200 rounded-xl px-4 py-3 
                                        focus:outline-none focus:ring-2 focus:ring-[#0b2a3f] 
                                        focus:bg-white transition duration-300">
                        </div>

                        <!-- Email -->
                        <div>
                            <label class="block text-sm font-semibold text-gray-700 mb-2">
                                Email
                            </label>
                            <input type="email"
                                name="email"
                                placeholder="Masukan Email"
                                class="w-full bg-gray-100 border border-gray-200 rounded-xl px-4 py-3 
                                        focus:outline-none focus:ring-2 focus:ring-[#0b2a3f] 
                                        focus:bg-white transition duration-300">
                        </div>

                        <!-- Pesan -->
                        <div>
                            <label class="block text-sm font-semibold text-gray-700 mb-2">
                                Pesan
                            </label>
                            <textarea name="pesan"
                                    rows="4"
                                    placeholder="Pesan kepada kami"
                                    class="w-full bg-gray-100 border border-gray-200 rounded-xl px-4 py-3 
                                            focus:outline-none focus:ring-2 focus:ring-[#0b2a3f] 
                                            focus:bg-white transition duration-300"></textarea>
                        </div>

                        <!-- BUTTON -->
                        <button type="submit"
                                class="w-full bg-[#0b2a3f] text-white py-3 rounded-xl font-semibold 
                                    hover:shadow-lg hover:-translate-y-1 transition duration-300">
                            Kirim Pesan
                        </button>

                    </form>
                </div>

                <!-- CONTACT INFO -->
                <div class="text-[#0b2a3f]">

                    <h3 class="text-3xl font-bold mb-6">
                        Jadwalkan Konsultasi Sekarang!
                    </h3>

                    <p class="mb-10 text-lg text-[#0b2a3f]/80">
                        Silakan hubungi kami untuk memulai diskusi proyek pembangunan Anda.
                    </p>

                    <div class="space-y-8">

                        <!-- Kantor -->
                        <div class="flex items-start gap-5">
                            <div class="bg-white rounded-full p-3 shadow-md text-xl">
                                📍
                            </div>
                            <div>
                                <h4 class="font-semibold text-lg">Kantor Kami</h4>
                                <p class="text-sm text-[#0b2a3f]/80">
                                    Desa Pejurukan, RT02/RW01, Kec. Kalibagor, Banyumas,
                                    Jawa Tengah 53191, Indonesia
                                </p>
                            </div>
                        </div>

                        <!-- Email -->
                        <div class="flex items-start gap-5">
                            <div class="bg-white rounded-full p-3 shadow-md text-xl">
                                ✉
                            </div>
                            <div>
                                <h4 class="font-semibold text-lg">Email</h4>
                                <p class="text-sm text-[#0b2a3f]/80">
                                    cv.darmingjayagrup@gmail.com
                                </p>
                            </div>
                        </div>

                        <!-- Phone -->
                        <div class="flex items-start gap-5">
                            <div class="bg-white rounded-full p-3 shadow-md text-xl">
                                📞
                            </div>
                            <div>
                                <h4 class="font-semibold text-lg">No Telephone</h4>
                                <p class="text-sm text-[#0b2a3f]/80">
                                    +62 857-7236-4659
                                </p>
                            </div>
                        </div>

                    </div>

                </div>

            </div>
        </div>
    </section>


<script>
    const navbarInner = document.getElementById('navbar-inner');
    const navToggle = document.getElementById('navToggle');

    window.addEventListener('scroll', () => {

        if (window.scrollY > 120) {

            navbarInner.classList.add(
                'opacity-0',
                'scale-95',
                'translate-x-1',
                'pointer-events-none'
            );

        } else {

            navbarInner.classList.remove(
                'opacity-0',
                'scale-95',
                'translate-x-1',
                'pointer-events-none'
            );
        }

    });

    navToggle.addEventListener('click', () => {

        navbarInner.classList.toggle('opacity-0');
        navbarInner.classList.toggle('scale-95');
        navbarInner.classList.toggle('translate-x-1');
        navbarInner.classList.toggle('pointer-events-none');

    });
</script>

</body>
</html>