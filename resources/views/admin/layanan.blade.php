@extends('layouts.admin')

@section('title', 'Layanan Jasa')

@section('content')

            <div class="container-fluid p-4 p-lg-5">
                
                <!-- Page Header -->
                <div class="d-flex justify-content-between align-items-center mb-4 mb-lg-5">
                    <div>
                        <h1 class="h3 mb-0">Manajemen Layanan Jasa</h1>
                        <p class="text-muted mb-0">Kelola daftar jasa konstruksi yang ditawarkan JayraConstruction</p>
                    </div>
                    <div class="d-flex gap-2">
                        <!-- Tombol Tambah Layanan Baru -->
                        <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#serviceModal">
                            <i class="bi bi-plus-lg me-2"></i>Tambah Layanan
                        </button>
                    </div>
                </div>

                <!-- Service Management Container -->
                <div x-data="{ 
                    services: [
                        { id: 1, name: 'Pembangunan Rumah Baru', category: 'Konstruksi', price: 'Rp 5.000.000/m2', status: 'Aktif' },
                        { id: 2, name: 'Desain Interior & Furniture', category: 'Interior', price: 'Rp 2.500.000/m2', status: 'Aktif' },
                        { id: 3, name: 'Renovasi Kamar Mandi', category: 'Renovasi', price: 'Rp 15.000.000', status: 'Draft' },
                        { id: 4, name: 'Jasa Arsitek & Gambar 3D', category: 'Arsitektur', price: 'Rp 50.000/m2', status: 'Aktif' }
                    ] 
                }">
                    
                    <!-- Stats Widgets Relevan Konstruksi -->
                    <div class="row g-4 g-lg-5 mb-5">
                        <div class="col-xl-4 col-lg-6">
                            <div class="card stats-card">
                                <div class="card-body p-3 p-lg-4">
                                    <div class="d-flex align-items-center">
                                        <div class="stats-icon bg-primary bg-opacity-10 text-primary me-3">
                                            <i class="bi bi-tools"></i>
                                        </div>
                                        <div>
                                            <h6 class="mb-0 text-muted">Total Layanan</h6>
                                            <h3 class="mb-0">12 Jasa</h3>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-xl-4 col-lg-6">
                            <div class="card stats-card">
                                <div class="card-body p-3 p-lg-4">
                                    <div class="d-flex align-items-center">
                                        <div class="stats-icon bg-success bg-opacity-10 text-success me-3">
                                            <i class="bi bi-check-circle"></i>
                                        </div>
                                        <div>
                                            <h6 class="mb-0 text-muted">Layanan Aktif</h6>
                                            <h3 class="mb-0">8 Jasa</h3>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-xl-4 col-lg-6">
                            <div class="card stats-card">
                                <div class="card-body p-3 p-lg-4">
                                    <div class="d-flex align-items-center">
                                        <div class="stats-icon bg-info bg-opacity-10 text-info me-3">
                                            <i class="bi bi-grid"></i>
                                        </div>
                                        <div>
                                            <h6 class="mb-0 text-muted">Kategori Jasa</h6>
                                            <h3 class="mb-0">5 Kategori</h3>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Services Table -->
                    <div class="card shadow-sm">
                        <div class="card-header border-bottom py-3">
                            <div class="row align-items-center">
                                <div class="col">
                                    <h5 class="mb-0">Katalog Layanan Jasa</h5>
                                </div>
                                <div class="col-auto">
                                    <div class="d-flex gap-2">
                                        <select class="form-select form-select-sm" style="width: 150px;">
                                            <option value="">Semua Kategori</option>
                                            <option>Konstruksi</option>
                                            <option>Arsitektur</option>
                                            <option>Interior</option>
                                        </select>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="card-body p-0">
                            <div class="table-responsive">
                                <table class="table table-hover align-middle mb-0">
                                    <thead class="table-light">
                                        <tr>
                                            <th class="ps-4">Nama Layanan</th>
                                            <th>Kategori</th>
                                            <th>Estimasi Harga Mulai</th>
                                            <th>Status</th>
                                            <th class="text-end pe-4">Aksi</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <template x-for="item in services" :key="item.id">
                                            <tr>
                                                <td class="ps-4">
                                                    <div class="fw-bold" x-text="item.name"></div>
                                                </td>
                                                <td>
                                                    <span class="badge bg-light text-dark border" x-text="item.category"></span>
                                                </td>
                                                <td x-text="item.price"></td>
                                                <td>
                                                    <span class="badge" 
                                                        :class="item.status === 'Aktif' ? 'bg-success' : 'bg-secondary'" 
                                                        x-text="item.status"></span>
                                                </td>
                                                <td class="text-end pe-4">
                                                    <button class="btn btn-sm btn-outline-primary me-1"><i class="bi bi-pencil-square"></i></button>
                                                    <button class="btn btn-sm btn-outline-danger"><i class="bi bi-trash"></i></button>
                                                </td>
                                            </tr>
                                        </template>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                    
                </div>
            </div>
        </main>



        </div> <!-- /.admin-wrapper -->
    </div>

        <!-- Modal Tambah/Edit Layanan (Taruh sebelum penutup body) -->
        <div class="modal fade" id="serviceModal" tabindex="-1">
            <div class="modal-dialog modal-md">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title">Form Layanan Konstruksi</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                    </div>
                    <div class="modal-body">
                        <form>
                            <div class="mb-3">
                                <label class="form-label fw-bold">Nama Layanan</label>
                                <input type="text" class="form-control" placeholder="Misal: Jasa Borongan Rumah">
                            </div>
                            <div class="mb-3">
                                <label class="form-label fw-bold">Kategori</label>
                                <select class="form-select">
                                    <option>Pilih Kategori...</option>
                                    <option>Konstruksi Bangunan</option>
                                    <option>Renovasi & Perbaikan</option>
                                    <option>Interior & Eksterior</option>
                                    <option>Arsitektur & Sipil</option>
                                </select>
                            </div>
                            <div class="mb-3">
                                <label class="form-label fw-bold">Estimasi Harga (Tampilkan di Web)</label>
                                <input type="text" class="form-control" placeholder="Misal: Mulai 3jt/m2">
                            </div>
                            <div class="mb-3">
                                <label class="form-label fw-bold">Deskripsi Layanan</label>
                                <textarea class="form-control" rows="3" placeholder="Jelaskan detail pekerjaan jasa ini..."></textarea>
                            </div>
                            <div class="mb-3">
                                <label class="form-label fw-bold">Gambar/Ikon Layanan</label>
                                <input type="file" class="form-control">
                            </div>
                        </form>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-light" data-bs-dismiss="modal">Batal</button>
                        <button type="button" class="btn btn-primary">Simpan Layanan</button>
                    </div>
                </div>
            </div>
        </div>
@endsection