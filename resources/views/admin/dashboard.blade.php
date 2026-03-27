@extends('layouts.admin')

@section('title', 'Dashboard Admin')

@section('content')
<div class="container-fluid p-3 p-md-4 p-lg-5"> {{-- Padding disesuaikan untuk HP (p-3) dan PC (p-5) --}}

    {{-- 1. HERO BANNER: Startup Style Gradient & Glassmorphism --}}
    <div class="card border-0 rounded-4 mb-4 mb-lg-5 overflow-hidden position-relative startup-banner shadow-lg">
        <div class="position-absolute top-0 start-0 w-100 h-100 bg-gradient-startup"></div>
        
        {{-- Dekorasi Lingkaran Abstrak --}}
        <div class="position-absolute rounded-circle bg-white opacity-10 blur-effect" style="width: 300px; height: 300px; top: -100px; right: -50px;"></div>
        <div class="position-absolute rounded-circle bg-white opacity-10 blur-effect" style="width: 150px; height: 150px; bottom: -50px; right: 200px;"></div>

        <div class="card-body p-4 p-lg-5 position-relative z-1 text-white">
            <div class="row align-items-center">
                <div class="col-12 col-md-8 col-lg-6">
                    <span class="badge bg-white text-primary text-uppercase tracking-wider px-3 py-2 rounded-pill mb-3 fw-bold shadow-sm">
                        <i class="bi bi-rocket-takeoff-fill me-1"></i> Jayra Admin Space
                    </span>
                    <h2 class="fw-bolder mb-2 display-6 banner-title" style="letter-spacing: -1px;">Welcome back, kapten! 👋</h2>
                    <p class="mb-4 fs-6 opacity-75 fw-light banner-desc" style="line-height: 1.6;">Pusat kendali utama siap digunakan. Pantau performa proyek, kelola layanan, dan proses transaksi pelanggan hari ini dengan cepat.</p>
                    
                    <a href="{{ route('laporan-pembayaran') }}" class="btn glass-btn fw-bold px-4 py-3 rounded-4 d-inline-flex align-items-center justify-content-center gap-2">
                        <span>Cek Laporan Pembayaran</span>
                        <i class="bi bi-arrow-right-short fs-4"></i>
                    </a>
                </div>
                <div class="col-md-4 col-lg-6 d-none d-md-flex justify-content-end position-relative">
                    <i class="bi bi-pie-chart-fill text-white opacity-25 float-animation banner-icon" style="font-size: 14rem; filter: drop-shadow(0 10px 20px rgba(0,0,0,0.2));"></i>
                </div>
            </div>
        </div>
    </div>

    {{-- HEADER SECTION --}}
    <div class="d-flex flex-column flex-sm-row justify-content-between align-items-sm-center gap-2 mb-4 px-1">
        <h5 class="fw-bold text-body-emphasis mb-0" style="letter-spacing: -0.5px;">Overview Performa</h5>
        <span class="badge bg-body-secondary text-secondary rounded-pill px-3 py-2 fw-medium align-self-start align-self-sm-auto">
            <i class="bi bi-calendar3 me-1"></i> {{ date('d M Y') }}
        </span>
    </div>

    {{-- 2. STAT CARDS: Hover Bouncing & Glowing Icons --}}
    <div class="row g-3 g-lg-4 mb-5">
        
        <div class="col-12 col-sm-6 col-xl-3"> {{-- col-12 biar di HP jadi 1 baris, col-sm-6 di tablet jadi 2 --}}
            <div class="card border-0 shadow-sm rounded-4 h-100 bg-body startup-card">
                <div class="card-body p-4">
                    <div class="d-flex justify-content-between align-items-start mb-3">
                        <div>
                            <h3 class="fw-bolder mb-0 text-body-emphasis counter-up">{{ $totalProyek }}</h3>
                            <small class="text-secondary fw-medium">Total Proyek</small>
                        </div>
                        <div class="icon-box bg-primary-subtle text-primary">
                            <i class="bi bi-building-gear fs-3"></i>
                        </div>
                    </div>
                    <div class="progress" style="height: 4px;">
                        <div class="progress-bar bg-primary" role="progressbar" style="width: 70%"></div>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-12 col-sm-6 col-xl-3">
            <div class="card border-0 shadow-sm rounded-4 h-100 bg-body startup-card">
                <div class="card-body p-4">
                    <div class="d-flex justify-content-between align-items-start mb-3">
                        <div>
                            <h3 class="fw-bolder mb-0 text-body-emphasis counter-up">{{ $totalLayanan }}</h3>
                            <small class="text-secondary fw-medium">Layanan Aktif</small>
                        </div>
                        <div class="icon-box bg-success-subtle text-success">
                            <i class="bi bi-tools fs-3"></i>
                        </div>
                    </div>
                    <div class="progress" style="height: 4px;">
                        <div class="progress-bar bg-success" role="progressbar" style="width: 100%"></div>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-12 col-sm-6 col-xl-3">
            <div class="card border-0 shadow-sm rounded-4 h-100 bg-body startup-card">
                <div class="card-body p-4">
                    <div class="d-flex justify-content-between align-items-start mb-3">
                        <div>
                            <h3 class="fw-bolder mb-0 text-body-emphasis counter-up">{{ $totalUser }}</h3>
                            <small class="text-secondary fw-medium">Klien Terdaftar</small>
                        </div>
                        <div class="icon-box bg-info-subtle text-info-emphasis">
                            <i class="bi bi-people-fill fs-3"></i>
                        </div>
                    </div>
                    <div class="progress" style="height: 4px;">
                        <div class="progress-bar bg-info" role="progressbar" style="width: 85%"></div>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-12 col-sm-6 col-xl-3">
            <div class="card border-0 shadow-sm rounded-4 h-100 bg-body startup-card card-urgent">
                <div class="card-body p-4">
                    <div class="d-flex justify-content-between align-items-start mb-3">
                        <div>
                            <h3 class="fw-bolder mb-0 text-warning-emphasis counter-up">{{ $pendingTrx }}</h3>
                            <small class="text-warning-emphasis fw-bold">Menunggu Pembayaran</small>
                        </div>
                        <div class="icon-box bg-warning text-white pulse-warning">
                            <i class="bi bi-bell-fill fs-3"></i>
                        </div>
                    </div>
                    <div class="progress" style="height: 4px;">
                        <div class="progress-bar bg-warning progress-bar-striped progress-bar-animated" role="progressbar" style="width: 100%"></div>
                    </div>
                </div>
            </div>
        </div>

    </div>

    {{-- 3. QUICK ACTIONS: App Tiles Style --}}
    <h5 class="fw-bold text-body-emphasis mb-4 px-1" style="letter-spacing: -0.5px;">Akses Cepat</h5>
    <div class="row g-3 g-lg-4">
        <div class="col-6 col-md-3">
            <a href="{{ route('layanan.index') }}" class="text-decoration-none">
                <div class="card border-0 shadow-sm rounded-4 text-center action-tile h-100 bg-body">
                    <div class="card-body p-3 p-md-4 py-lg-5">
                        <div class="tile-icon bg-primary-subtle text-primary mb-3 mx-auto">
                            <i class="bi bi-list-check fs-2"></i>
                        </div>
                        <h6 class="fw-bold text-body-emphasis mb-0 quick-text">Kelola Layanan</h6>
                    </div>
                </div>
            </a>
        </div>
        <div class="col-6 col-md-3">
            <a href="{{ route('proyek.index') }}" class="text-decoration-none">
                <div class="card border-0 shadow-sm rounded-4 text-center action-tile h-100 bg-body">
                    <div class="card-body p-3 p-md-4 py-lg-5">
                        <div class="tile-icon bg-success-subtle text-success mb-3 mx-auto">
                            <i class="bi bi-images fs-2"></i>
                        </div>
                        <h6 class="fw-bold text-body-emphasis mb-0 quick-text">Portfolio Proyek</h6>
                    </div>
                </div>
            </a>
        </div>
        <div class="col-6 col-md-3">
            <a href="{{ route('users.index') }}" class="text-decoration-none">
                <div class="card border-0 shadow-sm rounded-4 text-center action-tile h-100 bg-body">
                    <div class="card-body p-3 p-md-4 py-lg-5">
                        <div class="tile-icon bg-info-subtle text-info-emphasis mb-3 mx-auto">
                            <i class="bi bi-person-lines-fill fs-2"></i>
                        </div>
                        <h6 class="fw-bold text-body-emphasis mb-0 quick-text">Database Klien</h6>
                    </div>
                </div>
            </a>
        </div>
        <div class="col-6 col-md-3">
            <a href="{{ route('profilperusahaan.index') }}" class="text-decoration-none">
                <div class="card border-0 shadow-sm rounded-4 text-center action-tile h-100 bg-body">
                    <div class="card-body p-3 p-md-4 py-lg-5">
                        <div class="tile-icon bg-danger-subtle text-danger mb-3 mx-auto">
                            <i class="bi bi-shop fs-2"></i>
                        </div>
                        <h6 class="fw-bold text-body-emphasis mb-0 quick-text">Profil Usaha</h6>
                    </div>
                </div>
            </a>
        </div>
    </div>

</div>

{{-- CSS KHUSUS TAMPILAN STARTUP & RESPONSIVE --}}
<style>
    /* Gradient Mewah ala Startup (Indigo ke Ungu) */
    .bg-gradient-startup {
        background: linear-gradient(135deg, #4f46e5 0%, #7c3aed 100%);
    }

    /* Efek Kaca (Glassmorphism) pada tombol Banner */
    .glass-btn {
        background: rgba(255, 255, 255, 0.15);
        backdrop-filter: blur(10px);
        -webkit-backdrop-filter: blur(10px);
        border: 1px solid rgba(255, 255, 255, 0.3);
        color: white !important;
        transition: all 0.3s ease;
        width: 100%; /* Default ke full width untuk mobile */
    }
    @media (min-width: 768px) {
        .glass-btn { width: auto; } /* Kembalikan ke ukuran normal di layar lebar */
    }
    .glass-btn:hover {
        background: rgba(255, 255, 255, 0.25);
        transform: translateX(5px);
        box-shadow: 0 10px 20px rgba(0,0,0,0.1);
    }
    .glass-btn i { transition: transform 0.3s ease; }
    .glass-btn:hover i { transform: translateX(4px); }

    /* Animasi Mengambang untuk Ikon Raksasa di Banner */
    .float-animation { animation: float 6s ease-in-out infinite; }
    @keyframes float {
        0% { transform: translateY(0px) rotate(0deg); }
        50% { transform: translateY(-15px) rotate(5deg); }
        100% { transform: translateY(0px) rotate(0deg); }
    }

    /* Blur Effect untuk dekorasi lingkaran */
    .blur-effect { filter: blur(40px); }

    /* Efek Hover Mantul (Bouncing) untuk Kartu Statistik */
    .startup-card { transition: all 0.4s cubic-bezier(0.175, 0.885, 0.32, 1.275); }
    .startup-card:hover { transform: translateY(-8px); box-shadow: 0 1.5rem 3rem rgba(0,0,0,.1) !important; }

    /* Ikon Kotak Bulat di dalam Kartu */
    .icon-box {
        width: 55px; height: 55px;
        display: flex; align-items: center; justify-content: center;
        border-radius: 1rem; transition: all 0.4s ease;
    }
    .startup-card:hover .icon-box { transform: scale(1.1) rotate(10deg); }

    /* Kartu Urgent (Pesanan Pending) */
    .card-urgent { border: 1px solid rgba(255, 193, 7, 0.3) !important; }
    .pulse-warning { animation: pulse-warn 2s infinite; }
    @keyframes pulse-warn {
        0% { box-shadow: 0 0 0 0 rgba(255, 193, 7, 0.7); }
        70% { box-shadow: 0 0 0 15px rgba(255, 193, 7, 0); }
        100% { box-shadow: 0 0 0 0 rgba(255, 193, 7, 0); }
    }

    /* Kotak Akses Cepat (App Tiles) */
    .action-tile {
        transition: all 0.3s ease;
        border: 2px solid transparent !important;
        cursor: pointer;
    }
    .action-tile:hover {
        border-color: var(--bs-primary) !important;
        background: var(--bs-primary-bg-subtle) !important;
        transform: translateY(-5px);
    }
    .tile-icon {
        width: 70px; height: 70px;
        display: flex; align-items: center; justify-content: center;
        border-radius: 1.2rem; transition: all 0.3s ease;
    }
    .action-tile:hover .tile-icon {
        background: var(--bs-primary) !important;
        color: white !important;
        transform: scale(1.1);
    }

    /* =========================================
       📱 MAGIC RESPONSIVE: TABLET & IPAD
       ========================================= */
    @media (max-width: 991.98px) {
        .banner-icon { font-size: 10rem !important; right: -20px; }
        .tile-icon { width: 60px; height: 60px; }
        .tile-icon i { font-size: 1.7rem !important; }
        .quick-text { font-size: 0.9rem; }
    }

    /* =========================================
       📱 MAGIC RESPONSIVE: LAYAR HP (MOBILE)
       ========================================= */
    @media (max-width: 767.98px) {
        .startup-banner .card-body { text-align: center; padding: 2.5rem 1.5rem !important; }
        .banner-title { font-size: 1.8rem; }
        .banner-desc { font-size: 0.95rem !important; }
        
        /* Ikon kotak diperkecil di HP biar lega */
        .icon-box { width: 45px; height: 45px; }
        .icon-box i { font-size: 1.3rem !important; }
        .counter-up { font-size: 1.5rem; }

        /* Akses Cepat diperkecil di HP */
        .action-tile .card-body { padding: 1.5rem 1rem !important; }
        .tile-icon { width: 50px; height: 50px; border-radius: 1rem; }
        .tile-icon i { font-size: 1.5rem !important; }
        .quick-text { font-size: 0.8rem; }
    }
</style>
@endsection