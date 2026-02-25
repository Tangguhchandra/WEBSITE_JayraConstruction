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
                        <button type="button" 
                            class="btn btn-primary shadow-sm" 
                            data-bs-toggle="modal" 
                            data-bs-target="#projectModal" 
                            onclick="prepareAdd()">
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
                <!-- Total Proyek -->
                <div class="col-xl-3 col-lg-6">
                    <div class="card stats-card border-0 shadow-sm">
                        <div class="card-body p-3 p-lg-4">
                            <div class="d-flex align-items-center">
                                <div class="stats-icon bg-primary bg-opacity-10 text-primary me-3">
                                    <i class="bi bi-building"></i>
                                </div>
                                <div>
                                    <h6 class="mb-0 text-muted small">Total Proyek</h6>
                                    <h3 class="mb-0">{{ $totalProjects }}</h3>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                
                <div class="col-xl-3 col-lg-6">
                    <div class="card stats-card border-0 shadow-sm">
                        <div class="card-body p-3 p-lg-4">
                            <div class="d-flex align-items-center">
                                <div class="stats-icon bg-info bg-opacity-10 text-info me-3">
                                    <i class="bi bi-clipboard-data"></i> 
                                </div>
                                <div>
                                    <h6 class="mb-0 text-muted small">Perencanaan</h6>
                                    <h3 class="mb-0">{{ $planningProjects }}</h3>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Sedang Berjalan -->
                <div class="col-xl-3 col-lg-6">
                    <div class="card stats-card border-0 shadow-sm">
                        <div class="card-body p-3 p-lg-4">
                            <div class="d-flex align-items-center">
                                <div class="stats-icon bg-warning bg-opacity-10 text-warning me-3">
                                    <i class="bi bi-cone-striped"></i>
                                </div>
                                <div>
                                    <h6 class="mb-0 text-muted" style="font-size: 0.85rem;">Sedang Berjalan</h6>
                                    <h3 class="mb-0">{{ $ongoingProjects }}</h3>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Selesai -->
                <div class="col-xl-3 col-lg-6">
                    <div class="card stats-card border-0 shadow-sm">
                        <div class="card-body p-3 p-lg-4">
                            <div class="d-flex align-items-center">
                                <div class="stats-icon bg-success bg-opacity-10 text-success me-3">
                                    <i class="bi bi-check-circle"></i>
                                </div>
                                <div>
                                    <h6 class="mb-0 text-muted small">Selesai</h6>
                                    <h3 class="mb-0">{{ $completedProjects }}</h3>
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
    @foreach($projects as $item)
    <tr>
        <td class="ps-4">{{ $item->project_code }}</td>
        <td>
            <div class="fw-bold">{{ $item->name }}</div>
            <small class="text-muted">{{ $item->client_name }}</small>
        </td>
        <td>Rp {{ number_format($item->budget, 0, ',', '.') }}</td>
        <td style="width: 200px;">
            <div class="progress" style="height: 6px;">
                <div class="progress-bar bg-primary" style="width: {{ $item->progress }}%"></div>
            </div>
            <small class="text-muted">{{ $item->progress }}%</small>
        </td>
        <td>
            <span class="badge {{ $item->status == 'Selesai' ? 'bg-success' : ($item->status == 'Proses' ? 'bg-warning text-dark' : 'bg-secondary') }}">
                {{ $item->status }}
            </span>
        </td>
        <td class="text-end pe-4">
            <!-- Tombol Edit -->
            <button type="button" 
                class="btn btn-sm btn-outline-primary me-1" 
                data-bs-toggle="modal" 
                data-bs-target="#projectModal" 
                onclick='prepareEdit(@json($item))'>
                <i class="bi bi-pencil-square"></i>
            </button>

            <!-- Tombol Hapus -->
            <form action="{{ route('proyek.destroy', $item->id) }}" method="POST" class="d-inline" onsubmit="return confirm('Yakin ingin menghapus proyek ini?')">
                @csrf
                @method('DELETE')
                <button type="submit" class="btn btn-sm btn-outline-danger">
                    <i class="bi bi-trash"></i>
                </button>
            </form>
        </td>
    </tr>
    @endforeach
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
                <h5 class="modal-title" id="modalTitle">Form Data Proyek</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <!-- Form Start -->
            <form id="formProject" method="POST" action="{{ route('proyek.store') }}">
                @csrf
                <div id="methodField"></div> <!-- Untuk PUT saat edit -->
                
                <div class="modal-body">
                    <div class="mb-3">
                        <label class="form-label">Nama Proyek</label>
                        <input type="text" name="name" id="field_name" class="form-control" placeholder="Contoh: Pembangunan Jembatan Merah" required>
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Nama Klien</label>
                        <input type="text" name="client_name" id="field_client" class="form-control" placeholder="Nama Klien atau Perusahaan" required>
                    </div>
                    
                    <!-- Tambahan input Progress & Status untuk Edit -->
                    <div class="row mb-3">
                        <div class="col-md-6">
                            <label class="form-label">Progres (%)</label>
                            <input type="number" name="progress" id="field_progress" class="form-control" value="0" min="0" max="100">
                        </div>
                        <div class="col-md-6">
                            <label class="form-label">Status</label>
                            <select name="status" id="field_status" class="form-select">
                                <option value="Perencanaan">Perencanaan</option>
                                <option value="Proses">Proses</option>
                                <option value="Selesai">Selesai</option>
                            </select>
                        </div>
                    </div>

                    <div class="row mb-3">
                        <div class="col-md-12">
                            <label class="form-label">Budget (Angka saja)</label>
                            <input type="number" name="budget" id="field_budget" class="form-control" placeholder="Contoh: 1500000000" required>
                        </div>
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Lokasi</label>
                        <textarea name="location" id="field_location" class="form-control" rows="2" placeholder="Alamat Lengkap" required></textarea>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-light" data-bs-dismiss="modal">Batal</button>
                    <button type="submit" class="btn btn-primary">Simpan Data</button>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection

@push('scripts')
<script>
    // FUNGSI UNTUK RESET DATA (TAMBAH)
    function prepareAdd() {
        document.getElementById('modalTitle').innerText = 'Tambah Proyek Baru';
        document.getElementById('formProject').action = "{{ route('proyek.store') }}";
        document.getElementById('methodField').innerHTML = ''; // Kosongkan method
        document.getElementById('formProject').reset(); // Bersihkan input
    }

    // FUNGSI UNTUK ISI DATA (EDIT)
    function prepareEdit(project) {
        document.getElementById('modalTitle').innerText = 'Edit Data Proyek';
        document.getElementById('formProject').action = "/proyek/" + project.id;
        
        // Tambahkan method PUT untuk Laravel
        document.getElementById('methodField').innerHTML = '<input type="hidden" name="_method" value="PUT">';
        
        // Isi data ke masing-masing input (Pastikan ID di modal sesuai)
        document.getElementById('field_name').value = project.name;
        document.getElementById('field_client').value = project.client_name;
        document.getElementById('field_budget').value = project.budget;
        document.getElementById('field_location').value = project.location;
        document.getElementById('field_progress').value = project.progress;
        document.getElementById('field_status').value = project.status;
    }
</script>
@endpush