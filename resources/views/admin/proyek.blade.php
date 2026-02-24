@extends('layouts.admin')

@section('title', 'Manajemen Proyek')

@section('content')
<div class="container-fluid p-4 p-lg-5">
                
                <!-- Page Header -->
                <div class="d-flex justify-content-between align-items-center mb-4 mb-lg-5">
                    <div>
                        <h1 class="h3 mb-0">Manajemen Proyek</h1>
                        <p class="text-muted mb-0">Pantau progres, kelola anggaran, dan jadwal konstruksi JayraConstruction</p>
                    </div>
                    <div class="d-flex gap-2">
                        <button type="button" class="btn btn-outline-secondary">
                            <i class="bi bi-download me-2"></i>Export Laporan
                        </button>
                        <!-- Tombol Tambah Proyek Baru -->
                        <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#projectModal">
                            <i class="bi bi-plus-lg me-2"></i>Tambah Proyek
                        </button>
                    </div>
                </div>

                <!-- Project Management Container -->
                <div x-data="{ 
                    projects: [
                        { id: 'PJ-001', name: 'Pembangunan Ruko Melati', client: 'PT. Maju Jaya', budget: '2.5M', status: 'Proses', progress: 65 },
                        { id: 'PJ-002', name: 'Renovasi Interior Kafe', client: 'Ibu Sarah', budget: '450jt', status: 'Selesai', progress: 100 },
                        { id: 'PJ-003', name: 'Desain Villa Bali', client: 'Bpk. Andre', budget: '1.2M', status: 'Perencanaan', progress: 15 }
                    ] 
                }">
                    
                    <!-- Stats Widgets -->
                    <div class="row g-4 g-lg-5 mb-5">
                        <div class="col-xl-3 col-lg-6">
                            <div class="card stats-card">
                                <div class="card-body p-3 p-lg-4">
                                    <div class="d-flex align-items-center">
                                        <div class="stats-icon bg-primary bg-opacity-10 text-primary me-3">
                                            <i class="bi bi-building"></i>
                                        </div>
                                        <div>
                                            <h6 class="mb-0 text-muted">Total Proyek</h6>
                                            <h3 class="mb-0">24</h3>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-xl-3 col-lg-6">
                            <div class="card stats-card">
                                <div class="card-body p-3 p-lg-4">
                                    <div class="d-flex align-items-center">
                                        <div class="stats-icon bg-warning bg-opacity-10 text-warning me-3">
                                            <i class="bi bi-cone-striped"></i>
                                        </div>
                                        <div>
                                            <h6 class="mb-0 text-muted" style="font-size: 0.9rem;" >Sedang Berjalan</h6>
                                            <h3 class="mb-0">15</h3>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-xl-3 col-lg-6">
                            <div class="card stats-card">
                                <div class="card-body p-3 p-lg-4">
                                    <div class="d-flex align-items-center">
                                        <div class="stats-icon bg-success bg-opacity-10 text-success me-3">
                                            <i class="bi bi-check-circle"></i>
                                        </div>
                                        <div>
                                            <h6 class="mb-0 text-muted">Selesai</h6>
                                            <h3 class="mb-0">8</h3>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-xl-3 col-lg-6">
                            <div class="card stats-card">
                                <div class="card-body p-3 p-lg-4">
                                    <div class="d-flex align-items-center">
                                        <div class="stats-icon bg-info bg-opacity-10 text-info me-3">
                                            <i class="bi bi-currency-dollar"></i>
                                        </div>
                                        <div>
                                            <h6 class="mb-0 text-muted">Total Budget</h6>
                                            <h3 class="mb-0">Rp 4.2M</h3>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Project Table Area -->
                    <div class="card shadow-sm">
                        <div class="card-header py-3">
                            <h5 class="mb-0">Daftar Proyek Aktif</h5>
                        </div>
                        <div class="card-body p-0">
                            <div class="table-responsive">
                                <table class="table table-hover align-middle mb-0">
                                    <thead class="table-light">
                                        <tr>
                                            <th class="ps-4">ID</th>
                                            <th>Nama Proyek & Klien</th>
                                            <th>Budget</th>
                                            <th>Progres</th>
                                            <th>Status</th>
                                            <th class="text-end pe-4">Aksi</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <template x-for="item in projects" :key="item.id">
                                            <tr>
                                                <td class="ps-4" x-text="item.id"></td>
                                                <td>
                                                    <div class="fw-bold" x-text="item.name"></div>
                                                    <small class="text-muted" x-text="item.client"></small>
                                                </td>
                                                <td x-text="item.budget"></td>
                                                <td style="width: 200px;">
                                                    <div class="progress" style="height: 6px;">
                                                        <div class="progress-bar bg-primary" :style="`width: ${item.progress}%`" role="progressbar"></div>
                                                    </div>
                                                    <small class="text-muted" x-text="`${item.progress}%`"></small>
                                                </td>
                                                <td>
                                                    <span class="badge" 
                                                        :class="item.status === 'Selesai' ? 'bg-success' : (item.status === 'Proses' ? 'bg-warning text-dark' : 'bg-secondary')" 
                                                        x-text="item.status"></span>
                                                </td>
                                                <td class="text-end pe-4">
                                                    <button class="btn btn-sm btn-outline-primary me-1" title="Edit Proyek">
                                                        <i class="bi bi-pencil-square"></i>
                                                    </button>
                                                    <button class="btn btn-sm btn-outline-danger" title="Hapus Proyek">
                                                        <i class="bi bi-trash"></i>
                                                    </button>
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

        <!-- Modal Tambah/Edit Proyek (Taruh di luar tag main) -->
        <div class="modal fade" id="projectModal" tabindex="-1" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title">Form Data Proyek</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <form>
                            <div class="mb-3">
                                <label class="form-label">Nama Proyek</label>
                                <input type="text" class="form-control" placeholder="Contoh: Pembangunan Jembatan Merah">
                            </div>
                            <div class="mb-3">
                                <label class="form-label">Nama Klien</label>
                                <input type="text" class="form-control" placeholder="Nama Klien atau Perusahaan">
                            </div>
                            <div class="row mb-3">
                                <div class="col-md-6">
                                    <label class="form-label">Budget (Estimasi)</label>
                                    <input type="text" class="form-control" placeholder="Contoh: 1.5M">
                                </div>
                                <div class="col-md-6">
                                    <label class="form-label">Kategori Layanan</label>
                                    <select class="form-select">
                                        <option value="pembangunan">Pembangunan</option>
                                        <option value="renovasi">Renovasi</option>
                                        <option value="interior">Interior</option>
                                    </select>
                                </div>
                            </div>
                            <div class="mb-3">
                                <label class="form-label">Lokasi</label>
                                <textarea class="form-control" rows="2" placeholder="Alamat Lengkap"></textarea>
                            </div>
                        </form>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-light" data-bs-dismiss="modal">Batal</button>
                        <button type="button" class="btn btn-primary">Simpan Data</button>
                    </div>
                </div>
            </div>
        </div>
@endsection