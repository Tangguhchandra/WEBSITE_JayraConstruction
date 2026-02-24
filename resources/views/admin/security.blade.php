@extends('layouts.admin')

@section('title', 'Keamanan & Akses')

@section('content')


<div class="container-fluid p-4 p-lg-4">
                    
                    <!-- Page Header -->
                    <div class="mb-4">
                        <h1 class="h3 mb-0">Keamanan & Akses</h1>
                        <p class="text-muted mb-0">Kelola kata sandi dan pantau aktivitas login akun Anda.</p>
                    </div>

                    <!-- Security Container -->
                    <div x-data="{ activeTab: 'password' }" class="security-layout">
                        <div class="row g-4">
                            
                            <!-- Menu Tab Kiri -->
                            <div class="col-lg-3">
                                <div class="nav nav-pills flex-column  p-3 rounded shadow-sm border">
                                    <a class="nav-link mb-2 cursor-pointer" 
                                    :class="{ 'active': activeTab === 'password' }" 
                                    @click.prevent="activeTab = 'password'" href="#">
                                        <i class="bi bi-key me-2"></i> Ubah Password
                                    </a>
                                    <a class="nav-link cursor-pointer" 
                                    :class="{ 'active': activeTab === 'logs' }" 
                                    @click.prevent="activeTab = 'logs'" href="#">
                                        <i class="bi bi-clock-history me-2"></i> Riwayat Login
                                    </a>
                                </div>
                            </div>

                            <!-- Konten Kanan -->
                            <div class="col-lg-9">
                                
                                <!-- Tab 1: Ubah Password -->
                                <div x-show="activeTab === 'password'" class="card shadow-sm p-4 border-0">
                                    <h5 class="mb-3">Ganti Kata Sandi</h5>
                                    <p class="small text-muted mb-4">Gunakan kombinasi huruf, angka, dan simbol untuk keamanan maksimal.</p>
                                    
                                    <form>
                                        <div class="mb-3">
                                            <label class="form-label fw-bold">Password Saat Ini</label>
                                            <input type="password" class="form-control" placeholder="Masukkan password lama">
                                        </div>
                                        <hr>
                                        <div class="mb-3">
                                            <label class="form-label fw-bold">Password Baru</label>
                                            <input type="password" class="form-control" placeholder="Masukkan password baru">
                                        </div>
                                        <div class="mb-4">
                                            <label class="form-label fw-bold">Konfirmasi Password Baru</label>
                                            <input type="password" class="form-control" placeholder="Ulangi password baru">
                                        </div>
                                        <button type="submit" class="btn btn-primary px-4">
                                            <i class="bi bi-shield-check me-2"></i>Update Password
                                        </button>
                                    </form>
                                </div>

                                <!-- Tab 2: Riwayat Login -->
                                <div x-show="activeTab === 'logs'" class="card shadow-sm border-0 overflow-hidden">
                                    <div class="card-header bg-white py-3">
                                        <h5 class="mb-0">Aktivitas Login Terakhir</h5>
                                    </div>
                                    <div class="card-body p-0">
                                        <div class="table-responsive">
                                            <table class="table table-hover align-middle mb-0">
                                                <thead class="table-light">
                                                    <tr>
                                                        <th class="ps-4">Perangkat</th>
                                                        <th>Lokasi (IP)</th>
                                                        <th>Waktu</th>
                                                        <th>Status</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    <tr>
                                                        <td class="ps-4">
                                                            <i class="bi bi-laptop me-2"></i> Windows 11 - Chrome
                                                        </td>
                                                        <td>Jakarta, Indonesia (114.125.x.x)</td>
                                                        <td>Sekarang</td>
                                                        <td><span class="badge bg-success">Aktif</span></td>
                                                    </tr>
                                                    <tr>
                                                        <td class="ps-4">
                                                            <i class="bi bi-phone me-2"></i> iPhone 14 - Safari
                                                        </td>
                                                        <td>Jakarta, Indonesia (182.1.x.x)</td>
                                                        <td>21 Feb 2024, 20:15</td>
                                                        <td><span class="badge bg-secondary">Sesi Berakhir</span></td>
                                                    </tr>
                                                </tbody>
                                            </table>
                                        </div>
                                    </div>
                                </div>

                            </div>
                        </div>
                    </div>

                </div>
            <style>
                
                .bg-primary { background-color: #f39c12 !important; }
                .btn-primary { background-color: #f39c12 !important; border-color: #f39c12 !important; }
                .nav-pills .nav-link.active { background-color: #f39c12 !important; }
                .nav-pills .nav-link:hover:not(.active) { background-color: rgba(243, 156, 18, 0.1) !important; color: #f39c12; }
                .cursor-pointer { cursor: pointer; }
            </style>
@endsection