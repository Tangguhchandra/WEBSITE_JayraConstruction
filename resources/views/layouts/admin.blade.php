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

    <!-- CSS Tambahan Per Halaman (Jika ada) -->
    @stack('styles')
</head>
<body class="admin-layout">
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
</body>
</html>