@extends('layouts.admin')

@section('title', 'Profil Perusahaan')

@section('content')



<style>
        /* 1. Paksa warna background hover pada menu settings kiri */
        .settings-page .settings-sidebar .nav-link:hover {
            background-color: rgba(243, 156, 18, 0.1) !important; /* Oranye transparan */
            color: #f39c12 !important;
        }

        /* 2. Paksa warna background saat menu diklik (active) */
        .settings-page .settings-sidebar .nav-link.active {
            background-color: #f39c12 !important; /* Oranye solid */
            color: #ffffff !important;
        }

        /* 3. Paksa warna icon di dalam menu tersebut */
        .settings-page .settings-sidebar .nav-link:hover i,
        .settings-page .settings-sidebar .nav-link.active i {
            color: inherit !important;
        }

        /* 4. Jika 'Informasi Umum' itu adalah tombol nav-pills */
        .nav-pills .nav-link:hover {
            background-color: rgba(243, 156, 18, 0.1) !important;
            color: #f39c12 !important;
        }
    </style>

<div class="container-fluid p-4 p-lg-4">
                    
                    <!-- Page Header -->
                    <div class="d-flex justify-content-between align-items-center mb-4">
                        <div>
                            <h1 class="h3 mb-0">Profil Perusahaan</h1>
                            <p class="text-muted mb-0">Kelola identitas JayraConstruction untuk ditampilkan di website utama</p>
                        </div>
                        <div class="d-flex gap-2">
                            <button type="button" class="btn btn-primary">
                                <i class="bi bi-check-lg me-2"></i>Simpan Perubahan
                            </button>
                        </div>
                    </div>

                    <!-- Settings Container -->
                    <!-- Kita ubah sections-nya sesuai kebutuhan Konstruksi -->
                    <div x-data="{ 
                        activeSection: 'umum',
                        sections: [
                            { id: 'umum', name: 'Informasi Umum', icon: 'bi bi-info-circle' },
                            { id: 'visi', name: 'Visi & Misi', icon: 'bi bi-eye' },
                            { id: 'kontak', name: 'Kontak & Alamat', icon: 'bi bi-geo-alt' },
                            { id: 'branding', name: 'Logo & Branding', icon: 'bi bi-brush' }
                        ]
                    }" class="settings-layout">
                        <div class="row g-4">
                            
                            <!-- Internal Settings Navigation (Kiri) -->
                            <div class="col-lg-3">
                                <nav class="nav nav-pills flex-column  p-3 rounded shadow-sm border">
                                    <template x-for="section in sections" :key="section.id">
                                        <a class="nav-link mb-2" 
                                        :class="{ 'active': activeSection === section.id }"
                                        href="#"
                                        @click.prevent="activeSection = section.id">
                                            <i :class="section.icon" class="me-2"></i>
                                            <span x-text="section.name"></span>
                                        </a>
                                    </template>
                                </nav>
                            </div>

                            <!-- Settings Content (Kanan) -->
                            <div class="col-lg-9">
                                
                                <!-- Section: Informasi Umum -->
                                <div x-show="activeSection === 'umum'" class="card shadow-sm p-4">
                                    <h5>Informasi Umum</h5>
                                    <hr>
                                    <div class="mb-3">
                                        <label class="form-label fw-bold">Nama Perusahaan</label>
                                        <input type="text" class="form-control" value="JayraConstruction">
                                    </div>
                                    <div class="mb-3">
                                        <label class="form-label fw-bold">Slogan (Tagline)</label>
                                        <input type="text" class="form-control" placeholder="Contoh: Membangun Masa Depan Lebih Kokoh">
                                    </div>
                                    <div class="mb-3">
                                        <label class="form-label fw-bold">Deskripsi Singkat</label>
                                        <textarea class="form-control" rows="5">JayraConstruction adalah solusi terpercaya untuk kebutuhan konstruksi bangunan, renovasi, dan desain arsitektur...</textarea>
                                    </div>
                                </div>

                                <!-- Section: Visi & Misi -->
                                <div x-show="activeSection === 'visi'" class="card shadow-sm p-4">
                                    <h5>Visi & Misi</h5>
                                    <hr>
                                    <div class="mb-3">
                                        <label class="form-label fw-bold">Visi Perusahaan</label>
                                        <textarea class="form-control" rows="3" placeholder="Tulis visi perusahaan..."></textarea>
                                    </div>
                                    <div class="mb-3">
                                        <label class="form-label fw-bold">Misi Perusahaan</label>
                                        <textarea class="form-control" rows="5" placeholder="Tulis poin-poin misi..."></textarea>
                                    </div>
                                </div>

                                <!-- Section: Kontak -->
                                <div x-show="activeSection === 'kontak'" class="card shadow-sm p-4">
                                    <h5>Kontak & Lokasi Kantor</h5>
                                    <hr>
                                    <div class="row">
                                        <div class="col-md-6 mb-3">
                                            <label class="form-label fw-bold">WhatsApp Admin</label>
                                            <input type="text" class="form-control" value="0812-xxxx-xxxx">
                                        </div>
                                        <div class="col-md-6 mb-3">
                                            <label class="form-label fw-bold">Email Resmi</label>
                                            <input type="email" class="form-control" value="info@jayraconstruction.com">
                                        </div>
                                    </div>
                                    <div class="mb-3">
                                        <label class="form-label fw-bold">Alamat Lengkap Kantor</label>
                                        <textarea class="form-control" rows="3"></textarea>
                                    </div>
                                    <div class="mb-3">
                                        <label class="form-label fw-bold">Link Google Maps (Embed)</label>
                                        <input type="text" class="form-control" placeholder="Paste link iframe dari Google Maps">
                                    </div>
                                </div>

                                <!-- Section: Logo -->
                                <div x-show="activeSection === 'branding'" class="card shadow-sm p-4 text-center">
                                    <h5>Logo & Branding</h5>
                                    <hr>
                                    <div class="mb-4">
                                        <div class="mx-auto bg-light border rounded d-flex align-items-center justify-content-center" style="width: 200px; height: 200px;">
                                            <i class="bi bi-image text-muted" style="font-size: 3rem;"></i>
                                        </div>
                                        <p class="mt-2 small text-muted">Preview Logo Utama</p>
                                    </div>
                                    <div class="mb-3">
                                        <input type="file" class="form-control mx-auto" style="max-width: 400px;">
                                        <small class="text-muted">Rekomendasi ukuran: 512x512px (PNG Transparan)</small>
                                    </div>
                                </div>

                            </div>
                        </div>
                    </div>
                </div>

@endsection