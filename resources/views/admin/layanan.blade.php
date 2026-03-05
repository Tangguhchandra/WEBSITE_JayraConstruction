@extends('layouts.admin')

@section('title', 'Layanan Jasa')

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

    <div class="d-flex justify-content-between align-items-center mb-4">
        <div>
            <h1 class="h3 mb-0">Manajemen Layanan Jasa</h1>
            <p class="text-muted mb-0">Kelola daftar jasa konstruksi JayraConstruction</p>
        </div>
        <button type="button" class="btn btn-primary" 
                data-bs-toggle="modal" 
                data-bs-target="#serviceModal" 
                onclick="prepareAdd()">
            <i class="bi bi-plus-lg me-2"></i>Tambah Layanan
        </button>
    </div>

    <!-- Stats -->
    <div class="row g-4 mb-5">
        <div class="col-md-4">
            <div class="card stats-card border-0 shadow-sm">
                <div class="card-body p-4 d-flex align-items-center">
                    <div class="stats-icon bg-primary bg-opacity-10 text-primary me-3"><i class="bi bi-tools"></i></div>
                    <div><h6 class="text-muted small mb-0">Total Layanan</h6><h3 class="mb-0">{{ $totalServices }}</h3></div>
                </div>
            </div>
        </div>
        <div class="col-md-4">
            <div class="card stats-card border-0 shadow-sm">
                <div class="card-body p-4 d-flex align-items-center">
                    <div class="stats-icon bg-success bg-opacity-10 text-success me-3"><i class="bi bi-check-circle"></i></div>
                    <div><h6 class="text-muted small mb-0">Layanan Aktif</h6><h3 class="mb-0">{{ $activeServices }}</h3></div>
                </div>
            </div>
        </div>
        <div class="col-md-4">
            <div class="card stats-card border-0 shadow-sm">
                <div class="card-body p-4 d-flex align-items-center">
                    <div class="stats-icon bg-info bg-opacity-10 text-info me-3"><i class="bi bi-grid"></i></div>
                    <div><h6 class="text-muted small mb-0">Kategori Jasa</h6><h3 class="mb-0">{{ $categoryCount }}</h3></div>
                </div>
            </div>
        </div>
    </div>

    <!-- Table -->
    <div class="card shadow-sm border-0">
        <div class="table-responsive">
            <table class="table table-hover align-middle mb-0">
                <thead class="table-light">
                    <tr>
                        <th class="ps-4">Nama Layanan</th>
                        <th>Kategori</th>
                        <th>Estimasi Harga</th>
                        <th>Status</th>
                        <th class="text-end pe-4">Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($services as $item)
                    <tr>
                        <td class="ps-4 fw-bold">{{ $item->name }}</td>
                        <td><span class="badge bg-light text-dark border">{{ $item->category }}</span></td>
                        <td>{{ $item->price_estimate }}</td>
                        <td><span class="badge {{ $item->status == 'Aktif' ? 'bg-success' : 'bg-secondary' }}">{{ $item->status }}</span></td>
                        <td class="text-end pe-4">
                            <button class="btn btn-sm btn-outline-primary me-1" 
                                    data-bs-toggle="modal" 
                                    data-bs-target="#serviceModal" 
                                    onclick='prepareEdit(@json($item))'>
                                <i class="bi bi-pencil"></i>
                            </button>
                            <form action="{{ route('layanan.destroy', $item->id) }}" method="POST" class="d-inline" onsubmit="return confirm('Hapus?')">
                                @csrf @method('DELETE')
                                <button type="submit" class="btn btn-sm btn-outline-danger"><i class="bi bi-trash"></i></button>
                            </form>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>

<!-- Modal -->
<div class="modal fade" id="serviceModal" tabindex="-1">
    <div class="modal-dialog modal-md">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="modalTitle">Form Layanan</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
            </div>
            <form id="serviceForm" method="POST" enctype="multipart/form-data">
                @csrf
                <div id="methodField"></div>
                <div class="modal-body">
                    <div class="mb-3"><label class="form-label">Nama Layanan</label><input type="text" name="name" id="field_name" class="form-control" required></div>
                    <div class="mb-3">
                        <label class="form-label">Kategori</label>
                        <select name="category" id="field_category" class="form-select" required>
                            <option value="Konstruksi Bangunan">Konstruksi Bangunan</option>
                            <option value="Renovasi & Perbaikan">Renovasi & Perbaikan</option>
                            <option value="Interior & Eksterior">Interior & Eksterior</option>
                            <option value="Arsitektur & Sipil">Arsitektur & Sipil</option>
                        </select>
                    </div>
                    <div class="mb-3"><label class="form-label">Estimasi Harga</label><input type="text" name="price_estimate" id="field_price" class="form-control" required></div>
                    <div class="mb-3"><label class="form-label">Status</label>
                        <select name="status" id="field_status" class="form-select">
                            <option value="Aktif">Aktif</option>
                            <option value="Draft">Draft</option>
                        </select>
                    </div>
                    <div class="mb-3"><label class="form-label">Deskripsi</label><textarea name="description" id="field_desc" class="form-control" rows="3"></textarea></div>
                    <div class="mb-3"><label class="form-label">Gambar/Ikon (Optional)</label><input type="file" name="image" class="form-control"></div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-light" data-bs-dismiss="modal">Batal</button>
                    <button type="submit" class="btn btn-primary">Simpan</button>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection

@push('scripts')
<script>
    const modal = new bootstrap.Modal(document.getElementById('serviceModal'));
    
    function prepareAdd() {
        document.getElementById('modalTitle').innerText = 'Tambah Layanan Baru';
        document.getElementById('serviceForm').action = "{{ route('layanan.store') }}";
        document.getElementById('methodField').innerHTML = "";
        document.getElementById('serviceForm').reset();
        modal.show();
    }

    function prepareEdit(item) {
        document.getElementById('modalTitle').innerText = 'Edit Layanan';
        document.getElementById('serviceForm').action = "/layanan/" + item.id;
        document.getElementById('methodField').innerHTML = '<input type="hidden" name="_method" value="PUT">';
        
        document.getElementById('field_name').value = item.name;
        document.getElementById('field_category').value = item.category;
        document.getElementById('field_price').value = item.price_estimate;
        document.getElementById('field_status').value = item.status;
        document.getElementById('field_desc').value = item.description;
        modal.show();
    }
</script>
@endpush