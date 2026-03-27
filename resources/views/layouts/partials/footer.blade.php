<footer class="admin-footer">
    <div class="container-fluid px-3">
        {{-- Tambahan text-center buat di HP, text-md-start buat di PC --}}
        <div class="row align-items-center text-center text-md-start">
            
            {{-- Tambahan mb-2 mb-md-0 biar kalau di HP ada jarak atas-bawah --}}
            <div class="col-md-6 mb-2 mb-md-0">
                <p class="mb-0 text-muted" style="font-size: 0.9rem;">
                    © 2026 <span class="fw-bold text-primary">Jayra Construction</span>. All rights reserved.
                </p>
            </div>
            
            <div class="col-md-6 text-md-end">
                <p class="mb-0 text-muted" style="font-size: 0.9rem;">
                    Built with <i class="bi bi-heart-fill text-danger mx-1 pulse-icon"></i> for <a href="#" class="text-decoration-none text-primary fw-medium">Jayra System</a>
                </p>
            </div>
            
        </div>
    </div>
</footer>

<style>
    /* --- CSS FOOTER RESPONSIVE & SINKRON DENGAN SIDEBAR --- */
    .admin-footer {
        padding: 1.2rem 0;
        background-color: var(--bs-body-bg);
        border-top: 1px solid rgba(0, 0, 0, 0.05);
        
        /* Samain margin & transisinya persis kayak .admin-main biar geraknya barengan */
        margin-left: 280px; 
        transition: margin-left 0.3s cubic-bezier(0.4, 0, 0.2, 1);
    }

    /* Kalau Sidebar ngecil jadi garis tiga (di PC) */
    body.sidebar-collapsed .admin-footer {
        margin-left: 80px !important;
    }

    /* Animasi detak jantung buat ikon love-nya (Opsional biar manis) */
    .pulse-icon {
        display: inline-block;
        animation: heartPulse 1.5s infinite;
    }
    @keyframes heartPulse {
        0% { transform: scale(1); }
        15% { transform: scale(1.2); }
        30% { transform: scale(1); }
        45% { transform: scale(1.2); }
        60% { transform: scale(1); }
    }

    /* Mode Malam (Dark Mode) border penyesuaian */
    [data-bs-theme=dark] .admin-footer {
        border-top: 1px solid rgba(255, 255, 255, 0.05);
    }

    /* Responsif untuk Mobile & Tablet */
    @media (max-width: 991.98px) {
        .admin-footer {
            margin-left: 0 !important; /* Di HP margin kiri hilang total */
            padding: 1.5rem 0;
        }
        body.sidebar-collapsed .admin-footer {
            margin-left: 0 !important; /* Tetap nol walau tombol garis 3 dipencet */
        }
    }
</style>