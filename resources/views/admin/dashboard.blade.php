@extends('layouts.admin')

@section('title', 'Dashboard')

@section('content')
<div class="container-fluid p-4 p-lg-5">
    <!-- Page Header -->
                <div class="d-flex flex-column flex-md-row justify-content-between align-items-start align-items-md-center gap-3 mb-4">
                    <div>
                        <h1 class="h3 mb-0">Dashboard</h1>
                        <p class="text-muted mb-0">Selamat datang kembali! Pantau proyek dan layanan Anda di sini.</p>
                    </div>
                    <div class="d-flex gap-2 flex-shrink-0">
                        <button type="button" class="btn btn-outline-secondary"
                                data-bs-toggle="tooltip"
                                title="Refresh data">
                            <i class="bi bi-arrow-clockwise icon-hover"></i>
                        </button>

                        <button type="button" class="btn btn-outline-secondary d-none d-sm-inline-block"
                                data-bs-toggle="tooltip"
                                title="Settings">
                            <i class="bi bi-gear icon-hover"></i>
                        </button>
                    </div>
                </div>

                <!-- Stats Cards with Alpine.js -->
                <div class="row g-3 g-lg-4 mb-4">
                    <!-- Card 1: Total Client -->
                    <div class="col-sm-6 col-xl-3">
                        <div class="card stats-card">
                            <div class="card-body">
                                <div class="d-flex align-items-center">
                                    <div class="flex-shrink-0">
                                        <div class="stats-icon bg-primary bg-opacity-10 text-primary">
                                            <i class="bi bi-people"></i>
                                        </div>
                                    </div>
                                    <div class="flex-grow-1 ms-3">
                                        <h6 class="mb-0 text-muted">Total Client</h6>
                                        <h3 class="mb-0">128</h3>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Card 2: Proyek Berjalan -->
                    <div class="col-sm-6 col-xl-3">
                        <div class="card stats-card">
                            <div class="card-body">
                                <div class="d-flex align-items-center">
                                    <div class="flex-shrink-0">
                                        <div class="stats-icon bg-warning bg-opacity-10 text-warning">
                                            <i class="bi bi-cone-striped"></i>
                                        </div>
                                    </div>
                                    <div class="flex-grow-1 ms-3">
                                        <h6 class="mb-0 text-muted">Proyek Aktif</h6>
                                        <h3 class="mb-0">15</h3>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Card 3: Pesan Baru -->
                    <div class="col-sm-6 col-xl-3">
                        <div class="card stats-card">
                            <div class="card-body">
                                <div class="d-flex align-items-center">
                                    <div class="flex-shrink-0">
                                        <div class="stats-icon bg-info bg-opacity-10 text-info">
                                            <i class="bi bi-envelope"></i>
                                        </div>
                                    </div>
                                    <div class="flex-grow-1 ms-3">
                                        <h6 class="mb-0 text-muted">Pesan Masuk</h6>
                                        <h3 class="mb-0">8</h3>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Card 4: Total Layanan -->
                    <div class="col-sm-6 col-xl-3">
                        <div class="card stats-card">
                            <div class="card-body">
                                <div class="d-flex align-items-center">
                                    <div class="flex-shrink-0">
                                        <div class="stats-icon bg-success bg-opacity-10 text-success">
                                            <i class="bi bi-tools"></i>
                                        </div>
                                    </div>
                                    <div class="flex-grow-1 ms-3">
                                        <h6 class="mb-0 text-muted">Total Layanan</h6>
                                        <h3 class="mb-0">6 Jasa</h3>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
       
                <!-- New Widgets Row -->
                <div class="row g-4 mb-4">
                    <!-- Recent Orders -->
                    <div class="card">
                        <div class="card-header d-flex justify-content-between align-items-center">
                            <h5 class="card-title mb-0">Status Proyek Terbaru</h5>
                            <a href="orders.html" class="btn btn-sm btn-link">Lihat Semua Proyek</a>
                        </div>
                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table table-hover align-middle mb-0">
                                    <thead class="table-light">
                                        <tr>
                                            <th>Nama Proyek</th>
                                            <th>Lokasi</th>
                                            <th>Klien</th>
                                            <th>Progress</th>
                                            <th>Status</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr>
                                            <td><strong>Pembangunan Gudang A</strong></td>
                                            <td>Bekasi, Jabar</td>
                                            <td>PT. Sukses Selalu</td>
                                            <td>
                                                <div class="progress" style="height: 6px; width: 100px;">
                                                    <div class="progress-bar bg-primary" style="width: 65%"></div>
                                                </div>
                                                <small class="text-muted">65%</small>
                                            </td>
                                            <td><span class="badge bg-primary">Konstruksi</span></td>
                                        </tr>
                                        <tr>
                                            <td><strong>Renovasi Rumah Mewah</strong></td>
                                            <td>Jakarta Selatan</td>
                                            <td>Ibu Maya</td>
                                            <td>
                                                <div class="progress" style="height: 6px; width: 100px;">
                                                    <div class="progress-bar bg-success" style="width: 100%"></div>
                                                </div>
                                                <small class="text-muted">100%</small>
                                            </td>
                                            <td><span class="badge bg-success">Selesai</span></td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
</div>
@endsection