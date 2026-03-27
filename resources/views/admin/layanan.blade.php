@extends('layouts.admin')
@section('title', 'Layanan Jasa')
@section('content')

<div class="container-fluid p-4 p-lg-5" x-data="{ search: '' }">

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

<div class="row align-items-center mb-5">
    <div class="col">
        <h1 class="h3 mb-1 fw-bold text-body">Manajemen Layanan Jasa</h1>
        <p class="text-muted mb-0">Pusat kendali layanan unggulan JayraConstruction untuk merepresentasikan kualitas dan profesionalisme tim di mata klien.</p>
    </div>
    <div class="col-auto">
        <button type="button" class="btn btn-primary px-4 py-2 shadow-sm fw-bold rounded-pill" data-bs-toggle="modal" data-bs-target="#serviceModal" onclick="prepareAdd()">
            <i class="bi bi-plus-lg me-2"></i>Tambah Layanan
        </button>
    </div>
</div>

<div class="row g-4 mb-5">
   <div class="col-md-4">
    <div class="card border-0 shadow-sm overflow-hidden h-100 bg-body">
        <div class="card-body p-4" style="border-left: 5px solid #f39c12 !important;">
            <div class="d-flex align-items-center justify-content-between">
                <div>
                    <h6 class="text-muted small text-uppercase fw-bold mb-1">Total Layanan</h6>
                    <h2 class="mb-0 fw-bold text-body">{{ $totalServices }}</h2>
                </div>
                <div class="rounded-circle d-flex align-items-center justify-content-center" 
                    style="width: 50px; height: 50px; background-color: rgba(243, 156, 18, 0.1);">
                    <i class="bi bi-briefcase" style="color: #f39c12 !important; font-size: 1.5rem;"></i>
                </div>
            </div>
        </div>
    </div>
</div>
    <div class="col-md-4">
        <div class="card border-0 shadow-sm overflow-hidden h-100 bg-body">
            <div class="card-body p-4 border-start border-success border-5">
                <div class="d-flex align-items-center justify-content-between">
                    <div>
                        <h6 class="text-muted small text-uppercase fw-bold mb-1">Layanan Aktif</h6>
                        <h2 class="mb-0 fw-bold text-body">{{ $activeServices }}</h2>
                    </div>
                    <div class="rounded-circle bg-success bg-opacity-10 p-3">
                        <i class="bi bi-check-circle-fill text-success fs-3 d-flex"></i>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="col-md-4">
        <div class="card border-0 shadow-sm overflow-hidden h-100 bg-body">
            <div class="card-body p-4 border-start border-info border-5">
                <div class="d-flex align-items-center justify-content-between">
                    <div>
                        <h6 class="text-muted small text-uppercase fw-bold mb-1">Kategori Jasa</h6>
                        <h2 class="mb-0 fw-bold text-body">{{ $categoryCount }}</h2>
                    </div>
                    <div class="rounded-circle bg-info bg-opacity-10 p-3">
                        <i class="bi bi-grid-fill text-info fs-3 d-flex"></i>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="card border-0 shadow-sm bg-body">
    <div class="card-header bg-transparent border-bottom py-4">
        <div class="row align-items-center g-3">
            <div class="col-md-6">
                <div class="input-group input-group-sm" style="max-width: 350px;">
                    <span class="input-group-text bg-body-tertiary border-0"><i class="bi bi-search text-muted"></i></span>
                    <input type="text" class="form-control bg-body-tertiary border-0 text-body" placeholder="Cari nama layanan..." x-model="search">
                </div>
            </div>
            <div class="col-md-6 text-md-end">
                <div class="btn-group btn-group-sm">
                    <button class="btn btn-outline-secondary">Export Excel</button>
                    <button class="btn btn-outline-secondary">Print</button>
                </div>
            </div>
        </div>
    </div>
    <div class="card-body p-0">
        <div class="table-responsive">
            <table class="table table-hover align-middle mb-0 custom-table">
                <thead class="bg-body-tertiary text-muted small text-uppercase fw-bold">
                    <tr>
                        <th class="ps-4 py-3">Layanan</th>
                        <th>Kategori</th>
                        <th>Estimasi Harga</th>
                        <th>Status</th>
                        <th class="text-end pe-4">Aksi</th>
                    </tr>
                </thead>
                <tbody class="text-body">
                    @forelse($services as $item)
                    <tr x-show="search === '' || '{{ strtolower($item->name) }}'.includes(search.toLowerCase())" x-transition>
                        <td class="ps-4">
                            <div class="d-flex align-items-center py-2">
                                <div class="avatar-service bg-body-tertiary rounded-3 me-3 d-flex align-items-center justify-content-center border" style="width: 48px; height: 48px; overflow: hidden;">
                                    @if($item->image_1)
                                        <img src="{{ asset('storage/' . $item->image_1) }}" class="img-fluid object-fit-cover">
                                    @else
                                        <i class="bi bi-image text-muted fs-4"></i>
                                    @endif
                                </div>
                                <div>
                                    <div class="fw-bold text-body">{{ $item->name }}</div>
                                    <small class="text-muted">ID: #SRV-{{ $item->id }}</small>
                                </div>
                            </div>
                        </td>
                        <td>
                            <span class="badge bg-body-tertiary text-primary border border-primary px-3 rounded-pill">
                                <i class="bi bi-tag-fill me-1 small"></i>{{ $item->category }}
                            </span>
                        </td>
                        <td class="fw-semibold text-body">Rp {{ number_format($item->price, 0, ',', '.') }}</td>
                        <td>
                            @if($item->status == 'Aktif')
                                <span class="badge bg-success bg-opacity-10 text-success border border-success px-3 rounded-pill">Aktif</span>
                            @else
                                <span class="badge bg-secondary bg-opacity-10 text-secondary border border-secondary px-3 rounded-pill">Draft</span>
                            @endif
                        </td>
                        <td class="text-end pe-4">
                            <div class="btn-group shadow-sm">
                                <button type="button" 
                                        class="btn btn-light-custom btn-sm" 
                                        data-bs-toggle="modal" 
                                        data-bs-target="#serviceModal" 
                                        onclick='prepareEdit(@json($item))'>
                                    <i class="bi bi-pencil-fill text-primary"></i>
                                </button>
                                <form action="{{ route('layanan.destroy', $item->id) }}" method="POST" class="d-inline" onsubmit="return confirm('Apakah Anda yakin ingin menghapus layanan ini? Semua gambar terkait akan terhapus.')">
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
                        <td colspan="5" class="text-center p-5">
                            <div class="py-4">
                                <i class="bi bi-folder-x fs-1 text-muted opacity-50 mb-3"></i>
                                <h5 class="text-muted">Belum ada layanan jasa ditemukan.</h5>
                                <button class="btn btn-sm btn-primary mt-2" data-bs-toggle="modal" data-bs-target="#serviceModal" onclick="prepareAdd()">Tambah Layanan Sekarang</button>
                            </div>
                        </td>
                    </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>
</div>
</div>

<div class="modal fade" id="serviceModal" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-lg">
        <div class="modal-content border-0 shadow-lg bg-body">
            <div class="modal-header bg-dark text-white p-4 border-0">
                <h5 class="modal-title fw-bold" id="modalTitle">Form Layanan</h5>
                <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>

            <form id="serviceForm" method="POST" enctype="multipart/form-data">
                @csrf
                <div id="methodField"></div> 

                <div class="modal-body p-4" style="max-height: 70vh; overflow-y: auto;">
                    <div class="row g-4">
                        <div class="col-md-7">
                            <div class="mb-3">
                                <label class="form-label fw-bold">Nama Layanan</label>
                                <input type="text" name="name" id="field_name" class="form-control bg-body-tertiary border-0" placeholder="Misal: Pembangunan Rumah" required>
                            </div>
                            <div class="row">
                                <div class="col-6 mb-3">
                                    <label class="form-label fw-bold">Kategori</label>
                                    <select name="category" id="field_category" class="form-select bg-body-tertiary border-0" required>
                                        <option value="Konstruksi Bangunan">Konstruksi Bangunan</option>
                                        <option value="Renovasi & Perbaikan">Renovasi & Perbaikan</option>
                                        <option value="Interior & Eksterior">Interior & Eksterior</option>
                                        <option value="Arsitektur & Sipil">Arsitektur & Sipil</option>
                                    </select>
                                </div>
                                <div class="col-6 mb-3">
                                    <label class="form-label fw-bold">Harga Estimasi (Rp)</label>
                                    <input type="number" name="price" id="field_price" class="form-control bg-body-tertiary border-0" placeholder="Misal: 3500000" required>
                                </div>
                            </div>

                            <div class="mb-3">
                                <label class="form-label fw-bold">Deskripsi Singkat</label>
                                <textarea name="short_description" id="field_short_desc" class="form-control bg-body-tertiary border-0" rows="2" placeholder="Muncul di halaman depan layanan"></textarea>
                            </div>
                            <div class="mb-3">
                                <label class="form-label fw-bold">Deskripsi Lengkap (Detail)</label>
                                <textarea name="full_description" id="field_full_desc" class="form-control bg-body-tertiary border-0" rows="4" placeholder="Muncul di halaman detail layanan"></textarea>
                            </div>
                            
                            
                        </div>

                        <div class="col-md-5">
                            <label class="form-label fw-bold">Upload Minimal 1 Foto</label>
                            <input type="file" name="image_1" class="form-control form-control-sm mb-2" accept="image/*">
                            <input type="file" name="image_2" class="form-control form-control-sm mb-2" accept="image/*">
                            <input type="file" name="image_3" class="form-control form-control-sm mb-4" accept="image/*">

                            <label class="form-label fw-bold">Spesifikasi (Cakupan Pekerjaan)</label>
                            <input type="text" name="spec_1" id="field_spec_1" class="form-control form-control-sm bg-body-tertiary border-0 mb-2" placeholder="Spek 1 (Struktur Bawah)">
                            <input type="text" name="spec_2" id="field_spec_2" class="form-control form-control-sm bg-body-tertiary border-0 mb-2" placeholder="Spek 2 (Struktur Atas)">
                            <input type="text" name="spec_3" id="field_spec_3" class="form-control form-control-sm bg-body-tertiary border-0 mb-2" placeholder="Spek 3 (Rangka/Atap)">
                            <input type="text" name="spec_4" id="field_spec_4" class="form-control form-control-sm bg-body-tertiary border-0 mb-4" placeholder="Spek 4 (Finishing/MEP)">

                            <label class="form-label fw-bold">Status Layanan</label>
                            <select name="status" id="field_status" class="form-select bg-body-tertiary border-0">
                                <option value="Aktif">Publish (Aktif)</option>
                                <option value="Draft">Draft (Sembunyikan)</option>
                            </select>
                        </div>
                    </div>
                </div>

                <div class="modal-footer border-0 bg-body-tertiary p-4">
                    <button type="button" class="btn btn-link text-muted text-decoration-none fw-bold" data-bs-dismiss="modal">Batal</button>
                    <button type="submit" class="btn btn-primary px-5 rounded-pill shadow fw-bold">Simpan Layanan <i class="bi bi-send-fill ms-2"></i></button>
                </div>
            </form>
            </div>
    </div>
</div>

<style>
    /* Mode Terang (Default) */
    .custom-table tbody tr { transition: 0.3s; }
    .custom-table tbody tr:hover { background-color: rgba(243, 156, 18, 0.03) !important; transform: scale(1.002); }
    .avatar-service img { width: 100%; height: 100%; object-fit: cover; }
    .btn-light-custom { background: #fff; border: 1px solid #dee2e6; }
    .btn-light-custom:hover { background: #f8f9fa; }
    
    /* Warna Global Jayra */
    .text-primary { color: #f39c12 !important; }
    .btn-primary { background-color: #f39c12 !important; border-color: #f39c12 !important; color: #fff !important; }
    .btn-primary:hover { background-color: #e67e22 !important; border-color: #e67e22 !important; }
    .border-primary { border-color: #f39c12 !important; }
    .bg-primary { background-color: #f39c12 !important; }

    /* Override Khusus Mode Malam */
    [data-bs-theme=dark] .btn-light-custom { 
        background: #1e293b; 
        border: 1px solid #334155; 
        color: #f8f9fa;
    }
    [data-bs-theme=dark] .btn-light-custom:hover { 
        background: #334155; 
    }
    [data-bs-theme=dark] .custom-table tbody tr:hover { 
        background-color: rgba(243, 156, 18, 0.1) !important; 
    }
    [data-bs-theme=dark] .avatar-service { 
        border-color: #334155 !important; 
    }
</style>
@endsection
@push('scripts')
<script>
    // JS Edit (Menyuntikkan data dari row ke dalam Modal)
    window.prepareEdit = function(item) {
        document.getElementById('modalTitle').innerText = 'Edit Detail Layanan';
        
        const form = document.getElementById('serviceForm');
        form.action = "/layanan/" + item.id;
        
        document.getElementById('methodField').innerHTML = '<input type="hidden" name="_method" value="PUT">';
        
        // Isi input dengan data lama
        document.getElementById('field_name').value = item.name;
        document.getElementById('field_category').value = item.category;
        document.getElementById('field_price').value = item.price;
        document.getElementById('field_short_desc').value = item.short_description || '';
        document.getElementById('field_full_desc').value = item.full_description || '';
        
        document.getElementById('field_spec_1').value = item.spec_1 || '';
        document.getElementById('field_spec_2').value = item.spec_2 || '';
        document.getElementById('field_spec_3').value = item.spec_3 || '';
        document.getElementById('field_spec_4').value = item.spec_4 || '';
        
        document.getElementById('field_status').value = item.status;
    };

    // JS Add (Mengosongkan Modal untuk data baru)
    window.prepareAdd = function() {
        document.getElementById('modalTitle').innerText = 'Tambah Layanan Baru';
        
        const form = document.getElementById('serviceForm');
        form.action = "{{ route('layanan.store') }}";
        
        document.getElementById('methodField').innerHTML = ""; 
        form.reset(); // Kosongkan semua isian form
    };
</script>
@endpush