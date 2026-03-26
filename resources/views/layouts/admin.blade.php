<!DOCTYPE html>
<html lang="en" data-bs-theme="light">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title') - JayraConstruction</title>
    
    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700&display=swap" rel="stylesheet">
    
    <!-- Ambil CSS dari folder public/assets -->
    <link rel="stylesheet" href="{{ asset('assets/main-BQhM7myw.css') }}">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.0/font/bootstrap-icons.css">

    <script defer src="https://cdn.jsdelivr.net/npm/alpinejs@3.x.x/dist/cdn.min.js"></script>

    <!-- CSS Tambahan Per Halaman (Jika ada) -->
    @stack('styles')
    <style>
/* --- PENGATURAN BACKGROUND BERANIMASI --- */

body.admin-layout {
    position: relative;
    background-color: #f8fafc; /* Warna dasar siang */
    transition: background-color 0.5s ease;
}

/* Kita buat lapisan khusus untuk gambar background */
    body.admin-layout::before {
        content: "";
        position: fixed;
        top: 0;
        left: 0;
        width: 100%;
        height: 100%;
        /* Masukkan gambar dan gradient kamu di sini */
        background: linear-gradient(rgba(15, 23, 42, 0.85), rgba(15, 23, 42, 0.85)), 
                    url("{{ asset('images/bg-admin.jpg') }}");
        background-size: cover;
        background-position: center;
        background-attachment: fixed;
        background-repeat: no-repeat;
        
        /* ANIMASI KUNCI */
        z-index: -1; /* Taruh di paling belakang */
        opacity: 0;  /* Defaultnya transparan (siang) */
        transition: opacity 0.8s cubic-bezier(0.4, 0, 0.2, 1); /* Durasi fade-in 0.8 detik */
        pointer-events: none;
    }

    /* --- SAAT MODE MALAM AKTIF --- */
    [data-bs-theme=dark] body.admin-layout {
        background-color: #0f172a; /* Warna dasar malam */
    }

    [data-bs-theme=dark] body.admin-layout::before {
        opacity: 1; /* Gambar muncul perlahan (fade-in) */
    }

    /* Agar konten tetap terlihat jelas di atas background baru */
    [data-bs-theme=dark] .admin-main {
        background: transparent !important;
    }
    /* Mencegah elemen Alpine.js muncul sebelum script siap */
[x-cloak] { 
    display: none !important; 
}

</style>

<style>
    /* --- UPDATED LOADER WITH LOGO IMAGE --- */
    #loader-wrapper {
        position: fixed;
        top: 0; left: 0;
        width: 100%; height: 100%;
        background-color: var(--bs-body-bg);
        z-index: 99999;
        display: flex;
        align-items: center;
        justify-content: center;
        
        /* Transition keluar: kita buat lebih lama (0.8s) agar smooth */
        /* Kita tambahkan transform agar dia sedikit membesar saat hilang */
        transition: 
            opacity 0.8s cubic-bezier(0.65, 0, 0.35, 1), 
            visibility 0.8s cubic-bezier(0.65, 0, 0.35, 1),
            transform 0.8s cubic-bezier(0.65, 0, 0.35, 1);
    }

    .loader-content {
        text-align: center;
        position: relative;
        animation: loaderEntry 0.6s cubic-bezier(0.22, 1, 0.36, 1) forwards;
    }

    .loader-visual {
        position: relative;
        width: 110px; /* Ukuran container ring */
        height: 110px;
        margin: 0 auto;
        display: flex;
        align-items: center;
        justify-content: center;
    }

    /* Styling Logo Gambar di Tengah */
    .loader-logo-container {
        position: absolute;
        z-index: 2;
        width: 60px; /* Ukuran lebar logo di dalam ring */
        height: 60px;
        display: flex;
        align-items: center;
        justify-content: center;
        animation: smooth-pulse 2s ease-in-out infinite;
    }

    .loader-img-logo {
        max-width: 100%;
        max-height: 100%;
        object-fit: contain;
    }

    /* Ring Luar (Oranye Jayra) */
    .loader-ring {
        position: absolute;
        width: 100%;
        height: 100%;
        border: 3px solid rgba(243, 156, 18, 0.05);
        border-top: 3px solid #f39c12;
        border-radius: 50%;
        animation: spin-smooth 1.2s cubic-bezier(0.5, 0.1, 0.4, 0.9) infinite;
    }

    /* Ring Dalam */
    .loader-ring-inner {
        position: absolute;
        width: 85px;
        height: 85px;
        border: 2px solid transparent;
        border-bottom: 2px solid rgba(243, 156, 18, 0.3);
        border-radius: 50%;
        animation: spin-smooth 2s linear infinite reverse;
    }

    .loader-text {
        margin-top: 35px;
        font-weight: 800;
        letter-spacing: 4px;
        text-transform: uppercase;
        font-size: 0.8rem;
        color: var(--bs-body-color);
        animation: text-glow 2s ease-in-out infinite;
    }

    /* --- ANIMASI --- */
    @keyframes spin-smooth {
        to { transform: rotate(360deg); }
    }

    @keyframes smooth-pulse {
        0%, 100% { transform: scale(1); opacity: 1; }
        50% { transform: scale(1.1); opacity: 0.85; }
    }

    @keyframes text-glow {
        0%, 100% { letter-spacing: 4px; opacity: 0.6; }
        50% { letter-spacing: 6px; opacity: 1; }
    }
    @keyframes loaderEntry {
    0% {
        opacity: 0;
        transform: scale(0.9); /* Mulai dari agak kecil */
        filter: blur(10px);    /* Mulai dari agak buram */
    }
    100% {
        opacity: 1;
        transform: scale(1);   /* Ke ukuran normal */
        filter: blur(0);       /* Menjadi tajam */
    }
}

    .loader-hidden {
        opacity: 0 !important;
        visibility: hidden !important;
        transform: scale(1.1); /* Efek zoom out halus saat menghilang */
    }

    /* Khusus Mode Malam: Jika logo kamu gelap dan tidak kelihatan, 
       tambahkan filter ini atau biarkan jika logo sudah berwarna terang/oranye */
    [data-bs-theme=dark] .loader-img-logo {
        /* filter: brightness(1.2); */
    }
</style>

<script>
    // Langsung cek tema sebelum halaman dirender agar tidak glitch warna
    if (localStorage.getItem('theme') === 'dark' || (!('theme' in localStorage) && window.matchMedia('(prefers-color-scheme: dark)').matches)) {
        document.documentElement.setAttribute('data-bs-theme', 'dark');
    } else {
        document.documentElement.setAttribute('data-bs-theme', 'light');
    }
</script>
</head>

<body class="admin-layout">
    <!-- Loading Screen Jayra -->
<div id="loader-wrapper">
    <div class="loader-content">
        <div class="loader-visual">
            <div class="loader-logo-container">
                <img src="{{ asset('assets/images/logo_website.svg') }}" alt="Logo" class="loader-img-logo">
            </div>
            
            <!-- Ring yang berputar -->
            <div class="loader-ring"></div>
            <div class="loader-ring-inner"></div>
        </div>
        <p class="loader-text">Jayra Construction</p>
    </div>
</div>
    <div class="admin-wrapper" id="admin-wrapper">
        
        <!-- Panggil Navbar & Sidebar -->
        @include('layouts.partials.navbar')
        @include('layouts.partials.sidebar')

        <!-- Sidebar Backdrop untuk Mobile -->
        <div class="sidebar-backdrop" aria-hidden="true"></div>

        <main class="admin-main">
             @yield('content') 
        </main>
        @include('layouts.partials.footer')
    </div>

    <!-- PANGGIL JS VENDOR (WAJIB ADA AGAR TOMBOL JALAN) -->
    <!-- Catatan: Pastikan nama file di bawah sesuai dengan yang ada di folder public/assets kamu -->
    <script type="module" crossorigin src="{{ asset('assets/vendor-bootstrap-C9iorZI5.js') }}"></script>
    <script type="module" crossorigin src="{{ asset('assets/vendor-ui-CflGdlft.js') }}"></script>
    
    <!-- JS UTAMA (LOGIKA SIDEBAR & THEME) -->
    <script type="module" crossorigin src="{{ asset('assets/main-B24LRf0x.js') }}"></script>

    <!-- JS Tambahan Per Halaman -->
    @stack('scripts')
    <script>
    window.addEventListener('load', function() {
        const loader = document.getElementById('loader-wrapper');
        
        setTimeout(() => {
            loader.classList.add('loader-hidden');
            // Tambahan: Hilangkan display setelah animasi selesai agar tidak menghalangi klik
            setTimeout(() => {
                loader.style.display = 'none';
            }, 800); 
        }, 600);
    });
</script>
</body>
</html>