@extends('layouts.admin')

@section('title', 'Manajemen Proyek')

@section('content')
<div class="container-fluid p-4 p-lg-5">
    
    @if(session('success'))
    <div x-data="{ show: true }" 
        x-init="setTimeout(() => show = false, 5000)" 
        x-show="show" 
        x-transition.duration.1000ms
        id="success-alert" 
        class="alert alert-success border-0 shadow-sm mb-4 alert-dismissible fade show" 
        role="alert">
        <i class="bi bi-check-circle me-2"></i> {{ session('success') }}
        <button type="button" class="btn-close" @click="show = false" aria-label="Close"></button>
    </div>
    @endif

    <div class="d-flex flex-column flex-md-row justify-content-between align-items-start align-items-md-center gap-3 mb-4 mb-lg-5">
        <div>
            <h1 class="h3 mb-0 fw-bold text-body">Manajemen Proyek</h1>
            <p class="text-body-secondary mb-0">Pantau progres, kelola anggaran, dan rincian konstruksi JayraConstruction.</p>
        </div>
        <div class="d-flex gap-2">
            <button type="button" class="btn btn-primary shadow-sm" data-bs-toggle="modal" data-bs-target="#projectModal" onclick="prepareAdd()">
                <i class="bi bi-plus-lg me-2"></i>Tambah Proyek
            </button>
        </div>
    </div>

    <div class="row g-4 mb-5">
        <div class="col-xl-3 col-lg-6">
            <div class="card stats-card bg-body border-0 shadow-sm h-100">
                <div class="card-body p-4">
                    <div class="d-flex align-items-center">
                        <div class="stats-icon bg-primary-subtle text-primary me-3 rounded p-3 d-flex align-items-center justify-content-center" style="width: 50px; height: 50px;">
                            <i class="bi bi-building fs-4"></i>
                        </div>
                        <div>
                            <h6 class="mb-0 text-body-secondary small text-uppercase fw-bold tracking-wider">Total Proyek</h6>
                            <h3 class="mb-0 fw-bold text-body">{{ $totalProjects ?? 0 }}</h3>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-xl-3 col-lg-6">
            <div class="card stats-card bg-body border-0 shadow-sm h-100">
                <div class="card-body p-4">
                    <div class="d-flex align-items-center">
                        <div class="stats-icon bg-info-subtle text-info me-3 rounded p-3 d-flex align-items-center justify-content-center" style="width: 50px; height: 50px;">
                            <i class="bi bi-clipboard-data fs-4"></i> 
                        </div>
                        <div>
                            <h6 class="mb-0 text-body-secondary small text-uppercase fw-bold tracking-wider">Perencanaan</h6>
                            <h3 class="mb-0 fw-bold text-body">{{ $planningProjects ?? 0 }}</h3>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-xl-3 col-lg-6">
            <div class="card stats-card bg-body border-0 shadow-sm h-100">
                <div class="card-body p-4">
                    <div class="d-flex align-items-center">
                        <div class="stats-icon bg-warning-subtle text-warning me-3 rounded p-3 d-flex align-items-center justify-content-center" style="width: 50px; height: 50px;">
                            <i class="bi bi-cone-striped fs-4"></i>
                        </div>
                        <div>
                            <h6 class="mb-0 text-body-secondary small text-uppercase fw-bold tracking-wider">Berjalan</h6>
                            <h3 class="mb-0 fw-bold text-body">{{ $ongoingProjects ?? 0 }}</h3>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-xl-3 col-lg-6">
            <div class="card stats-card bg-body border-0 shadow-sm h-100">
                <div class="card-body p-4">
                    <div class="d-flex align-items-center">
                        <div class="stats-icon bg-success-subtle text-success me-3 rounded p-3 d-flex align-items-center justify-content-center" style="width: 50px; height: 50px;">
                            <i class="bi bi-check-circle fs-4"></i>
                        </div>
                        <div>
                            <h6 class="mb-0 text-body-secondary small text-uppercase fw-bold tracking-wider">Selesai</h6>
                            <h3 class="mb-0 fw-bold text-body">{{ $completedProjects ?? 0 }}</h3>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="card bg-body shadow-sm border-0 rounded-4 overflow-hidden">
        <div class="card-header bg-body border-bottom py-3 d-flex justify-content-between align-items-center">
            <h5 class="mb-0 fw-bold text-body">Daftar Proyek Aktif</h5>
        </div>
        <div class="card-body p-0">
            <div class="table-responsive">
                <table class="table table-hover align-middle mb-0 text-body">
                    <thead class="table-light bg-body-tertiary text-body-secondary">
                        <tr>
                            <th class="ps-4 fw-semibold text-uppercase small">ID</th>
                            <th class="fw-semibold text-uppercase small">Info Proyek</th>
                            <th class="fw-semibold text-uppercase small">Kategori & Tgl Selesai</th>
                            <th class="fw-semibold text-uppercase small">Progres</th>
                            <th class="fw-semibold text-uppercase small">Status</th>
                            <th class="text-end pe-4 fw-semibold text-uppercase small">Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse($projects ?? [] as $item)
                        <tr>
                            <td class="ps-4 text-body-secondary">{{ $item->project_code }}</td>
                            <td>
                                <div class="fw-bold text-primary">{{ $item->name }}</div>
                                <div class="small text-body-secondary"><i class="bi bi-person me-1"></i>{{ $item->client_name }}</div>
                                <div class="small text-body-secondary"><i class="bi bi-geo-alt me-1"></i>{{ Str::limit($item->location, 20) }}</div>
                            </td>
                            <td>
                                <span class="badge bg-primary-subtle text-primary mb-1">{{ ucfirst($item->category ?? 'Lainnya') }}</span>
                                <div class="small text-body-secondary">
                                    <i class="bi bi-calendar-event me-1"></i>
                                    {{ $item->completion_date ? \Carbon\Carbon::parse($item->completion_date)->format('d M Y') : 'Belum Set' }}
                                </div>
                            </td>
                            <td style="width: 150px;">
                                <div class="d-flex justify-content-between align-items-center mb-1">
                                    <small class="text-body-secondary fw-bold">{{ $item->progress }}%</small>
                                </div>
                                <div class="progress" style="height: 6px;">
                                    <div class="progress-bar bg-primary" style="width: {{ $item->progress }}%"></div>
                                </div>
                            </td>
                            <td>
                                <span class="badge {{ $item->status == 'Selesai' ? 'bg-success' : ($item->status == 'Proses' ? 'bg-warning text-dark' : 'bg-secondary') }} rounded-pill px-3 py-2">
                                    {{ $item->status }}
                                </span>
                            </td>
                            <td class="text-end pe-4">
                                <div class="btn-group shadow-sm">
                                    <button type="button" 
                                            class="btn btn-light-custom btn-sm" 
                                            data-bs-toggle="modal" 
                                            data-bs-target="#projectModal" 
                                            onclick='prepareEdit(@json($item))'>
                                        <i class="bi bi-pencil-fill text-primary"></i>
                                    </button>
                                    <form action="{{ route('proyek.destroy', $item->id) }}" method="POST" class="d-inline" onsubmit="return confirm('Yakin ingin menghapus proyek ini?')">
                                        @csrf @method('DELETE')
                                        <button type="submit" class="btn btn-light-custom btn-sm text-danger" title="Hapus">
                                            <i class="bi bi-trash-fill"></i>
                                        </button>
                                    </form>
                                </div>
                            </td>
                        </tr>
                        @empty
                        <tr>
                            <td colspan="6" class="text-center py-5 text-body-secondary">Belum ada data proyek.</td>
                        </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>

<div class="modal fade" id="projectModal" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-lg">
        <div class="modal-content bg-body border-0 shadow-lg">
            <div class="modal-header bg-body-tertiary border-0">
                <h5 class="modal-title fw-bold text-body" id="modalTitle">Form Data Proyek</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            
            <form id="formProject" method="POST" action="{{ route('proyek.store') }}" enctype="multipart/form-data">
                @csrf
                <div id="methodField"></div> 
                
                <div class="modal-body p-4">
                    <h6 class="fw-bold text-primary mb-3 border-bottom pb-2">Informasi Dasar</h6>
                    
                    <div class="mb-3">
                        <label class="form-label text-body-secondary small fw-bold">Foto Utama Proyek</label>
                        <input type="file" name="image" id="field_image" class="form-control bg-body text-body" accept="image/*">
                        <small class="text-body-secondary mt-1 d-block" id="imageHelp">Format: JPG, PNG, WEBP (Maks: 2MB). Kosongkan jika tidak ingin mengubah gambar saat Edit.</small>
                    </div>

                    <div class="row mb-3">
                        <div class="col-md-6">
                            <label class="form-label text-body-secondary small fw-bold">Nama Proyek</label>
                            <input type="text" name="name" id="field_name" class="form-control bg-body text-body" placeholder="Contoh: Renovasi Rumah Pribadi" required>
                        </div>
                        <div class="col-md-6 mt-3 mt-md-0">
                            <label class="form-label text-body-secondary small fw-bold">Klien</label>
                            <input type="text" name="client_name" id="field_client" class="form-control bg-body text-body" placeholder="Contoh: Bpk. Ahmad" required>
                        </div>
                    </div>

                    <div class="row mb-3">
                        <div class="col-md-6">
                            <label class="form-label text-body-secondary small fw-bold">Layanan Terkait (Kategori)</label>
                            <select name="category" id="field_category" class="form-select bg-body text-body" required>
                                <option value="Renovasi">Renovasi</option>
                                <option value="Residensial">Residensial</option>
                                <option value="Komersial">Komersial</option>
                                <option value="Interior">Interior Design</option>
                                <option value="Lainnya">Lainnya</option>
                            </select>
                        </div>
                        <div class="col-md-6 mt-3 mt-md-0">
                            <label class="form-label text-body-secondary small fw-bold">Lokasi</label>
                            <input type="text" name="location" id="field_location" class="form-control bg-body text-body" placeholder="Contoh: Purwokerto, Banyumas" required>
                        </div>
                    </div>

                    <h6 class="fw-bold text-primary mb-3 mt-4 border-bottom pb-2">Angka & Status</h6>
                    <div class="row mb-3">
                        <div class="col-md-6">
                            <label class="form-label text-body-secondary small fw-bold">Target Tgl Selesai</label>
                            <input type="date" name="completion_date" id="field_completion_date" class="form-control bg-body text-body">
                        </div>
                        <div class="col-md-6 mt-3 mt-md-0">
                            <label class="form-label text-body-secondary small fw-bold">Budget (Rp)</label>
                            <input type="number" name="budget" id="field_budget" class="form-control bg-body text-body" placeholder="Contoh: 150000000" required>
                        </div>
                    </div>

                    <div class="row mb-3">
                        <div class="col-md-6">
                            <label class="form-label text-body-secondary small fw-bold">Progres (%)</label>
                            <div class="input-group">
                                <input type="number" name="progress" id="field_progress" class="form-control bg-body text-body" value="0" min="0" max="100">
                                <span class="input-group-text bg-body-tertiary">%</span>
                            </div>
                        </div>
                        <div class="col-md-6 mt-3 mt-md-0">
                            <label class="form-label text-body-secondary small fw-bold">Status Proyek</label>
                            <select name="status" id="field_status" class="form-select bg-body text-body">
                                <option value="Perencanaan">Perencanaan</option>
                                <option value="Proses">Sedang Proses</option>
                                <option value="Selesai">Penyelesaian (Selesai)</option>
                            </select>
                        </div>
                    </div>

                    <h6 class="fw-bold text-primary mb-3 mt-4 border-bottom pb-2">Detail Cerita (Muncul di Website)</h6>
                    <div class="mb-3">
                        <label class="form-label text-body-secondary small fw-bold">Latar Belakang Proyek</label>
                        <textarea name="background" id="field_background" class="form-control bg-body text-body" rows="4" placeholder="Jelaskan fokus utama proyek ini..."></textarea>
                    </div>
                    <div class="mb-3">
                        <label class="form-label text-body-secondary small fw-bold">Tantangan & Solusi</label>
                        <textarea name="challenge_solution" id="field_challenge" class="form-control bg-body text-body" rows="3" placeholder="Apa tantangannya dan bagaimana solusinya..."></textarea>
                    </div>
                </div>
                
                <div class="modal-footer bg-body-tertiary border-0">
                    <button type="button" class="btn btn-outline-secondary" data-bs-dismiss="modal">Batal</button>
                    <button type="submit" class="btn btn-primary px-4"><i class="bi bi-save me-2"></i>Simpan Proyek</button>
                </div>
            </form>
        </div>
    </div>
</div>

<style>
    .stats-card {
        transition: transform 0.3s ease, box-shadow 0.3s ease;
    }
    .stats-card:hover {
        transform: translateY(-5px);
        box-shadow: 0 10px 20px rgba(0,0,0,0.1) !important;
    }
    .hover-elevate {
        transition: all 0.2s;
    }
    .hover-elevate:hover {
        transform: translateY(-2px);
    }
    /* Memperbaiki border pada input modal untuk dark mode */
    .form-control, .form-select, .input-group-text {
        border-color: var(--bs-border-color);
    }
    .form-control:focus, .form-select:focus {
        border-color: var(--bs-primary);
        box-shadow: 0 0 0 0.25rem rgba(var(--bs-primary-rgb), 0.25);
    }
</style>
@endsection

@push('scripts')
<script>
    function prepareAdd() {
        document.getElementById('modalTitle').innerText = 'Tambah Proyek Baru';
        document.getElementById('formProject').action = "{{ route('proyek.store') }}";
        document.getElementById('methodField').innerHTML = ''; 
        document.getElementById('formProject').reset(); 
    }

    function prepareEdit(project) {
        document.getElementById('modalTitle').innerText = 'Edit Data Proyek';
        document.getElementById('formProject').action = "/proyek/" + project.id;
        
        document.getElementById('methodField').innerHTML = '<input type="hidden" name="_method" value="PUT">';
        
        document.getElementById('field_name').value = project.name || '';
        document.getElementById('field_client').value = project.client_name || '';
        document.getElementById('field_category').value = project.category || 'Renovasi';
        document.getElementById('field_location').value = project.location || '';
        
        document.getElementById('field_completion_date').value = project.completion_date || '';
        document.getElementById('field_budget').value = project.budget || '';
        document.getElementById('field_progress').value = project.progress || 0;
        document.getElementById('field_status').value = project.status || 'Perencanaan';
        
        document.getElementById('field_background').value = project.background || '';
        document.getElementById('field_challenge').value = project.challenge_solution || '';
    }
</script>
@endpush