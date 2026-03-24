@extends('layouts.admin')
@section('title', 'Layanan Jasa')
@section('content')

<div class="container-fluid p-4 p-lg-5" x-data="{ search: '' }">

<!-- Notifikasi Modern -->
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

<!-- Header Section -->
<div class="row align-items-center mb-5">
    <div class="col">
        <h1 class="h3 mb-1 fw-bold text-body">Manajemen Layanan Jasa</h1>
        <p class="text-muted mb-0">Pusat kendali layanan unggulan JayraConstruction untuk merepresentasikan kualitas dan profesionalisme tim di mata klien.</p>
    </div>
    <div class="col-auto">
        
        <button type="button" 
                class="btn btn-primary px-4 py-2 shadow-sm fw-bold rounded-pill" 
                data-bs-toggle="modal" 
                data-bs-target="#serviceModal" 
                onclick="prepareAdd()">
            <i class="bi bi-plus-lg me-2"></i>Tambah Layanan
        </button>
    </div>
</div>

<!-- Stats Widgets (Gaya Premium) -->
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

<!-- Table Section -->
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
                                    @if($item->image)
                                        <img src="{{ asset('storage/' . $item->image) }}" class="img-fluid object-fit-cover">
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
                        <td class="fw-semibold text-body">{{ $item->price_estimate }}</td>
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
                                <form action="{{ route('layanan.destroy', $item->id) }}" method="POST" class="d-inline" onsubmit="return confirm('Apakah Anda yakin ingin menghapus layanan ini?')">
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
                                <button class="btn btn-sm btn-primary mt-2" @click="prepareAdd()">Tambah Layanan Sekarang</button>
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
<!-- Modal Form Modern -->
<!-- Modal Form Premium (Fixed Submit) -->
<div class="modal fade" id="serviceModal" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-lg">
        <div class="modal-content border-0 shadow-lg bg-body">
            <div class="modal-header bg-dark text-white p-4 border-0">
                <h5 class="modal-title fw-bold" id="modalTitle">Form Layanan</h5>
                <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>

<!-- TAG FORM DIMULAI DI SINI -->
        <form id="serviceForm" method="POST" enctype="multipart/form-data">
            @csrf
            <!-- Tempat inject @method('PUT') lewat JavaScript saat Edit -->
            <div id="methodField"></div> 

            <div class="modal-body p-4">
                <div class="row g-4">
                    <!-- Sisi Kiri: Foto -->
                    <div class="col-md-4 text-center">
                        <label class="form-label fw-bold d-block text-start">Foto Layanan</label>
                        <div class="preview-box rounded-4 border d-flex align-items-center justify-content-center bg-body-tertiary mb-3" 
                             style="height: 180px; overflow: hidden; position: relative;">
                            <img id="img-preview" src="#" class="img-fluid d-none rounded-4 w-100 h-100 object-fit-cover">
                            <div id="preview-placeholder">
                                <i class="bi bi-camera fs-1 text-muted"></i>
                            </div>
                        </div>
                        <!-- Input File wajib ada name="image" -->
                        <input type="file" name="image" id="input-image" class="form-control form-control-sm" accept="image/*" onchange="previewImage(this)">
                    </div>
                    
                    <!-- Sisi Kanan: Input Teks -->
                    <div class="col-md-8">
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
                                <label class="form-label fw-bold">Estimasi Harga</label>
                                <input type="text" name="price_estimate" id="field_price" class="form-control bg-body-tertiary border-0" placeholder="Contoh: 5jt/m2" required>
                            </div>
                        </div>
                        <div class="mb-3">
                            <label class="form-label fw-bold">Status Layanan</label>
                            <div class="d-flex gap-3 mt-1">
                                <div class="form-check">
                                    <input class="form-check-input" type="radio" name="status" id="statusAktif" value="Aktif" checked>
                                    <label class="form-check-label text-success fw-bold" for="statusAktif">Publish</label>
                                </div>
                                <div class="form-check">
                                    <input class="form-check-input" type="radio" name="status" id="statusDraft" value="Draft">
                                    <label class="form-check-label text-muted" for="statusDraft">Draft</label>
                                </div>
                            </div>
                        </div>
                        <div class="mb-0">
                            <label class="form-label fw-bold">Deskripsi</label>
                            <textarea name="description" id="field_desc" class="form-control bg-body-tertiary border-0" rows="3"></textarea>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Footer di dalam Tag Form -->
            <div class="modal-footer border-0 bg-body-tertiary p-4">
                <button type="button" class="btn btn-link text-muted text-decoration-none fw-bold" data-bs-dismiss="modal">Batal</button>
                <!-- WAJIB type="submit" -->
                <button type="submit" class="btn btn-primary px-5 rounded-pill shadow fw-bold">
                    Simpan Jasa <i class="bi bi-send-fill ms-2"></i>
                </button>
            </div>
        </form>
        <!-- TAG FORM BERAKHIR DI SINI -->
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
    // Gunakan window.namaFungsi agar bisa dipanggil dari HTML onclick
    window.prepareEdit = function(item) {
        console.log("Data masuk:", item); // Cek di F12 jika data muncul

        // 1. Ganti Judul
        document.getElementById('modalTitle').innerText = 'Edit Detail Layanan';
        
        // 2. Set Action Form (Update)
        const form = document.getElementById('serviceForm');
        form.action = "/layanan/" + item.id;
        
        // 3. Suntikkan Method PUT (Wajib Laravel)
        document.getElementById('methodField').innerHTML = '<input type="hidden" name="_method" value="PUT">';
        
        // 4. Isi field input (Pastikan ID di HTML sudah pas)
        document.getElementById('field_name').value = item.name;
        document.getElementById('field_category').value = item.category;
        document.getElementById('field_price').value = item.price_estimate;
        document.getElementById('field_desc').value = item.description || '';
        
        // 5. Set Radio Status
        if(item.status === 'Aktif') {
            document.getElementById('statusAktif').checked = true;
        } else {
            document.getElementById('statusDraft').checked = true;
        }

        // 6. Preview Gambar
        const preview = document.getElementById('img-preview');
        const placeholder = document.getElementById('preview-placeholder');
        if(item.image) {
            preview.src = "/storage/" + item.image;
            preview.classList.remove('d-none');
            placeholder.classList.add('d-none');
        } else {
            preview.classList.add('d-none');
            placeholder.classList.remove('d-none');
        }
    };

    // Lakukan hal yang sama untuk prepareAdd
    window.prepareAdd = function() {
        document.getElementById('modalTitle').innerText = 'Tambah Layanan Baru';
        const form = document.getElementById('serviceForm');
        form.action = "{{ route('layanan.store') }}";
        document.getElementById('methodField').innerHTML = ""; 
        form.reset();
        document.getElementById('img-preview').classList.add('d-none');
        document.getElementById('preview-placeholder').classList.remove('d-none');
    };
</script>
@endpush