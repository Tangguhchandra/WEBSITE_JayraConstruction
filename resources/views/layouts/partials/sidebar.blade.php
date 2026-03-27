<style>
    /* --- PERBAIKAN CSS SIDEBAR: MINI SIDEBAR MODE --- */
    .admin-sidebar {
        width: 280px; 
        background: var(--bs-body-bg);
        border-right: 1px solid rgba(0, 0, 0, 0.05);
        transition: width 0.3s cubic-bezier(0.4, 0, 0.2, 1), 
                    background-color 0.6s ease, 
                    border-color 0.6s ease; /* Transisi lebih smooth */
        box-shadow: 10px 0 30px rgba(0, 0, 0, 0.02);
        display: flex;
        flex-direction: column;
        z-index: 1040;
        
        /* 🔥 TAMBAHAN UNTUK SCROLLING 🔥 */
        position: fixed;   /* Agar sidebar diam di tempat walau layar discroll */
        height: 100vh;     /* Tinggi sidebar mentok seukuran layar penuh */
        overflow-y: auto;  /* Jika menu kepanjangan, otomatis muncul scroll ke bawah */
        overflow-x: hidden;/* Agar scroll ke samping (horizontal) tidak bocor */
    }

    /* 🔥 TAMBAHAN DESAIN SCROLLBAR KECIL (OPSIONAL TAPI KEREN) 🔥 */
    .admin-sidebar::-webkit-scrollbar { width: 4px; }
    .admin-sidebar::-webkit-scrollbar-track { background: transparent; }
    .admin-sidebar::-webkit-scrollbar-thumb { background: rgba(100, 116, 139, 0.3); border-radius: 10px; }

    .admin-main {
        margin-left: 280px; 
        transition: all 0.3s cubic-bezier(0.4, 0, 0.2, 1);
    }

    /* --- LOGIKA SAAT COLLAPSED (MENJADI MINI) --- */

    /* 1. Perkecil Lebar Sidebar & Hilangkan Margin Utama */
    .sidebar-collapsed .admin-sidebar {
        width: 80px !important; /* Lebar saat hanya sisa ikon */
    }

    .sidebar-collapsed .admin-main {
        margin-left: 80px !important;
    }

    /* 2. Sembunyikan Nama Brand & TULISAN KATEGORI (Utama, Sistem, dll) */
    .sidebar-collapsed .brand-name,
    .sidebar-collapsed .brand-subtitle,
    .sidebar-collapsed .nav-category {
        display: none !important;
    }

    /* 3. Atur Area Logo agar di tengah */
    .sidebar-collapsed .sidebar-brand-wrapper {
        justify-content: center;
        padding: 1.5rem 0;
    }

    /* 4. Sembunyikan Teks Menu (span) */
    .sidebar-collapsed .nav-link-custom span {
        display: none !important;
    }

    /* 5. Buat Ikon Menu ke Tengah */
    .sidebar-collapsed .nav-link-custom {
        justify-content: center;
        padding: 14px 0 !important;
    }

    .sidebar-collapsed .icon-wrap {
        margin-right: 0 !important; /* Hilangkan jarak kanan ikon */
    }

    /* 6. Hilangkan Animasi Geser ke Kanan saat mode mini agar tidak aneh */
    .sidebar-collapsed .nav-link-custom:hover {
        transform: none !important;
    }

    /* --- CSS UNTUK BACKDROP GELAP DI HP --- */
    .sidebar-backdrop {
        position: fixed;
        top: 0; left: 0; width: 100vw; height: 100vh;
        background: rgba(0,0,0,0.5);
        backdrop-filter: blur(2px);
        z-index: 1035;
        opacity: 0;
        visibility: hidden;
        transition: all 0.3s ease;
    }

    /* Responsif Mobile (Tetap hilang total kalau di HP agar tidak sempit) */
    @media (max-width: 991.98px) {
        .admin-main { margin-left: 0 !important; }
        
        .admin-sidebar {
            position: fixed;
            top: 0; left: 0; height: 100vh;
            transform: translateX(-100%); /* Sembunyikan ke kiri luar layar */
            /* Tambahkan transition transform agar smooth saat keluar-masuk */
            transition: transform 0.3s cubic-bezier(0.4, 0, 0.2, 1),
                        width 0.3s cubic-bezier(0.4, 0, 0.2, 1), 
                        background-color 0.6s ease, 
                        border-color 0.6s ease;
        }
        
        .sidebar-collapsed .admin-sidebar {
            transform: translateX(0); /* Muncul penuh saat diklik di mobile */
            width: 280px !important;
        }

        /* Tampilkan backdrop gelap saat sidebar terbuka di HP */
        body.sidebar-collapsed .sidebar-backdrop {
            opacity: 1;
            visibility: visible;
        }
    }

    .nav-link-custom, 
    .brand-name, 
    .brand-subtitle, 
    .nav-category {
        /* Supaya teks berubah warna pelan-pelan (hitam ke putih) */
        transition: color 0.6s ease, background-color 0.3s ease, transform 0.2s ease;
    }

    /* Kotak Ikon */
    .icon-wrap {
        /* Supaya kotak ikon berubah kegelapannya pelan-pelan */
        transition: background-color 0.6s ease, color 0.6s ease;
    }

    /* Shadow pada Brand Icon */
    .brand-icon-box {
        transition: box-shadow 0.6s ease, transform 0.3s ease;
    }

    .brand-icon-box {
        width: 45px; height: 45px;
        background: linear-gradient(135deg, #f39c12, #e67e22);
        border-radius: 12px;
        display: flex; align-items: center; justify-content: center;
        color: white;
        box-shadow: 0 4px 12px rgba(243, 156, 18, 0.3);
    }

    .brand-name { font-weight: 800; font-size: 1.2rem; color: var(--bs-heading-color); line-height: 1; }
    .brand-subtitle { font-size: 0.7rem; text-transform: uppercase; color: #f39c12; font-weight: 700; }

    /* Bagian Konten & Navigasi - Dibuat nempel ke atas */
    .sidebar-content {
        padding-top: 0 !important; /* Hilangkan padding atas total */
    }

    .sidebar-nav {
        padding-top: 10px !important; /* Beri sedikit ruang agar tidak terlalu mepet garis */
        padding-bottom: 90px !important; 
    }

    .sidebar-nav .nav-item {
        padding: 0 15px;
        margin-bottom: 8px;
    }

    .nav-link-custom {
        display: flex;
        align-items: center;
        padding: 14px 18px !important;
        border-radius: 16px !important;
        color: #64748b !important;
        font-weight: 600;
        font-size: 0.95rem;
        transition: all 0.3s cubic-bezier(0.4, 0, 0.2, 1);
        text-decoration: none !important;
    }

    .icon-wrap {
        width: 34px; height: 34px;
        display: flex; align-items: center; justify-content: center;
        border-radius: 10px;
        margin-right: 15px;
        background: rgba(100, 116, 139, 0.05);
        transition: all 0.3s ease;
    }

    .icon-wrap i { font-size: 1.2rem; }

    /* Hover & Active Effect */
    .nav-link-custom:hover {
        background: rgba(243, 156, 18, 0.08) !important;
        color: #f39c12 !important;
        transform: translateX(8px);
    }

    .nav-link-custom:hover .icon-wrap { background: #f39c12; color: white !important; transform: scale(1.1) rotate(-5deg); }

    .nav-link-custom.active {
        background: linear-gradient(135deg, #f39c12, #e67e22) !important;
        color: white !important;
        box-shadow: 0 8px 25px rgba(243, 156, 18, 0.3) !important;
    }

    .nav-link-custom.active .icon-wrap { background: rgba(255, 255, 255, 0.2); color: white !important; }

    .pulse-badge {
        background: #ef4444; padding: 5px 9px; font-size: 0.75rem;
        box-shadow: 0 0 0 0 rgba(239, 68, 68, 0.7); animation: pulse 2s infinite;
    }

    @keyframes pulse {
        0% { transform: scale(0.95); }
        70% { transform: scale(1); box-shadow: 0 0 0 10px rgba(239, 68, 68, 0); }
        100% { transform: scale(0.95); }
    }

    .admin-main { margin-left: 280px !important; }

    [data-bs-theme=dark] .admin-sidebar { background: #0f172a; border-right: 1px solid rgba(255, 255, 255, 0.05); }
    [data-bs-theme=dark] .nav-link-custom { color: #94a3b8 !important; }

    /* --- PENYESUAIAN KHUSUS MODE MALAM --- */
    [data-bs-theme=dark] .admin-sidebar { 
        background: #0f172a; 
        border-right: 1px solid rgba(255, 255, 255, 0.1); 
    }

    /* Warna Nama Brand di Mode Malam */
    [data-bs-theme=dark] .brand-name { 
        color: #ffffff !important; 
    }

    /* Warna Teks Menu: Diubah dari abu-abu ke Putih Terang (#f1f5f9) */
    [data-bs-theme=dark] .nav-link-custom { 
        color: #f1f5f9 !important; 
    }

    /* Warna Ikon Box di Mode Malam */
    [data-bs-theme=dark] .icon-wrap { 
        background: rgba(255, 255, 255, 0.08); 
        color: #f1f5f9;
    }

    /* Warna saat Menu di-Hover di Mode Malam */
    [data-bs-theme=dark] .nav-link-custom:hover {
        background: rgba(243, 156, 18, 0.2) !important; /* Oranye lebih tegas di gelap */
        color: #ffffff !important;
    }

    [data-bs-theme=dark] .nav-link-custom:hover .icon-wrap {
        background: #f39c12;
        color: white !important;
    }

    /* Warna Teks Muted (Sub-judul/Tagline) di Mode Malam agar lebih terbaca */
    [data-bs-theme=dark] .text-muted {
        color: #a1a1aa !important;
    }
</style>

<aside class="admin-sidebar" id="admin-sidebar">
    <div class="sidebar-content">
        <nav class="sidebar-nav">
            <ul class="nav flex-column w-100">
                
                <li class="nav-category mt-2 mb-2 px-4 text-uppercase fw-bold text-muted" style="font-size: 0.65rem; letter-spacing: 1px;">
                    Utama
                </li>
                
                <li class="nav-item">
                    <a class="nav-link-custom {{ request()->is('dashboard') || request()->is('/') ? 'active' : '' }}" href="{{ url('/dashboard') }}">
                        <div class="icon-wrap"><i class="bi bi-speedometer2"></i></div>
                        <span>Dashboard</span>
                    </a>
                </li>

                <li class="nav-item">
                    <a class="nav-link-custom {{ request()->is('laporan-pembayaran') ? 'active' : '' }}" href="{{ url('/laporan-pembayaran') }}">
                        <div class="icon-wrap"><i class="bi bi-wallet2"></i></div>
                        <span>Laporan Pembayaran</span>
                    </a>
                </li>

                <li class="nav-item">
                    <hr class="border-secondary-subtle mx-4 my-2 opacity-50">
                </li>

                <li class="nav-category mt-2 mb-2 px-4 text-uppercase fw-bold text-muted" style="font-size: 0.65rem; letter-spacing: 1px;">
                    Manajemen Konten
                </li>

                <li class="nav-item">
                    <a class="nav-link-custom {{ request()->is('proyek*') ? 'active' : '' }}" href="{{ url('/proyek') }}">
                        <div class="icon-wrap"><i class="bi bi-building-gear"></i></div>
                        <span>Manajemen Proyek</span>
                    </a>
                </li>

                <li class="nav-item">
                    <a class="nav-link-custom {{ request()->is('layanan*') ? 'active' : '' }}" href="{{ url('/layanan') }}">
                        <div class="icon-wrap"><i class="bi bi-tools"></i></div>
                        <span>Layanan Jasa</span>
                    </a>
                </li>

                <li class="nav-item">
                    <a class="nav-link-custom {{ request()->routeIs('tim.*') || request()->is('kontak-tim*') ? 'active' : '' }}" href="{{ route('tim.index') }}">
                        <div class="icon-wrap"><i class="bi bi-person-vcard"></i></div>
                        <span>Kontak Tim Ahli</span>
                    </a>
                </li>
                
                <li class="nav-item">
                    <a class="nav-link-custom {{ request()->is('profiladmin*') ? 'active' : '' }}" href="{{ url('/profiladmin') }}">
                        <div class="icon-wrap"><i class="bi bi-buildings"></i></div>
                        <span>Profil Perusahaan</span>
                    </a>
                </li>

                <li class="nav-item">
                    <hr class="border-secondary-subtle mx-4 my-2 opacity-50">
                </li>

                <li class="nav-category mt-2 mb-2 px-4 text-uppercase fw-bold text-muted" style="font-size: 0.65rem; letter-spacing: 1px;">
                    Sistem
                </li>

                <li class="nav-item">
                    <a class="nav-link-custom {{ request()->is('users*') ? 'active' : '' }}" href="{{ url('/users') }}">
                        <div class="icon-wrap"><i class="bi bi-people-fill"></i></div>
                        <span>Data User & Admin</span>
                    </a>
                </li>

            </ul>
        </nav>
    </div>
</aside>

<div class="sidebar-backdrop" id="mobile-backdrop" aria-hidden="true"></div>

<script>
    document.addEventListener('DOMContentLoaded', function() {
        const backdrop = document.getElementById('mobile-backdrop');
        if (backdrop) {
            backdrop.addEventListener('click', function() {
                // Menghapus class sidebar-collapsed dari body akan menyembunyikan sidebar di mobile
                document.body.classList.remove('sidebar-collapsed');
            });
        }
    });
</script>