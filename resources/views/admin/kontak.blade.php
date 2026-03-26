@extends('layouts.admin')

@section('title', 'Kontak Tim')

@section('content')
<div class="container-fluid p-4 p-lg-5">
    
    @if(session('success'))
    <div class="alert alert-success alert-dismissible fade show border-0 shadow-sm mb-4" role="alert">
        <i class="bi bi-check-circle me-2"></i> {{ session('success') }}
        <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
    </div>
    @endif

    <div class="d-flex justify-content-between align-items-center mb-4">
        <div>
            <h1 class="h3 mb-0 fw-bold text-body">Manajemen Kontak Tim</h1>
            <p class="text-body-secondary mb-0">Kelola daftar kontak person dan tim ahli JayraConstruction.</p>
        </div>
        <button type="button" class="btn btn-primary shadow-sm" data-bs-toggle="modal" data-bs-target="#teamModal" onclick="prepareAdd()">
            <i class="bi bi-person-plus me-2"></i>Tambah Tim
        </button>
    </div>

    <div class="card bg-body shadow-sm border-0 rounded-4 overflow-hidden">
        <div class="card-body p-0">
            <div class="table-responsive">
                <table class="table table-hover align-middle mb-0 text-body">
                    <thead class="table-light bg-body-tertiary">
                        <tr>
                            <th class="ps-4">Foto</th>
                            <th>Nama & Jabatan</th>
                            <th>No. Telp / WA</th>
                            <th class="text-end pe-4">Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse($teams as $item)
                        <tr>
                            <td class="ps-4">
                                <div class="w-10 h-10 rounded-circle overflow-hidden bg-slate-100" style="width: 50px; height: 50px;">
                                    @if($item->image)
                                        <img src="{{ asset('storage/' . $item->image) }}" class="w-100 h-100" style="object-fit: cover;">
                                    @else
                                        <div class="w-100 h-100 d-flex align-items-center justify-content-center bg-primary-subtle text-primary fw-bold">
                                            {{ substr($item->name, 0, 1) }}
                                        </div>
                                    @endif
                                </div>
                            </td>
                            <td>
                                <div class="fw-bold">{{ $item->name }}</div>
                                <span class="badge bg-primary-subtle text-primary">{{ $item->role }}</span>
                            </td>
                            <td class="text-body-secondary">{{ $item->phone ?? '-' }}</td>
                            <td class="text-end pe-4">
                                <button type="button" class="btn btn-sm text-primary border shadow-sm me-1" data-bs-toggle="modal" data-bs-target="#teamModal" onclick='prepareEdit(@json($item))'>
                                    <i class="bi bi-pencil-square"></i>
                                </button>
                                <form action="{{ route('tim.destroy', $item->id) }}" method="POST" class="d-inline" onsubmit="return confirm('Hapus anggota tim ini?')">
                                    @csrf @method('DELETE')
                                    <button type="submit" class="btn btn-sm  text-danger border shadow-sm">
                                        <i class="bi bi-trash"></i>
                                    </button>
                                </form>
                            </td>
                        </tr>
                        @empty
                        <tr><td colspan="4" class="text-center py-5 text-muted">Belum ada anggota tim.</td></tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>

<div class="modal fade" id="teamModal" tabindex="-1">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content bg-body border-0 shadow-lg">
            <div class="modal-header bg-body-tertiary border-0">
                <h5 class="modal-title fw-bold" id="modalTitle">Form Anggota Tim</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
            </div>
            <form id="formTeam" method="POST" action="{{ route('tim.store') }}" enctype="multipart/form-data">
                @csrf
                <div id="methodField"></div> 
                
                <div class="modal-body p-4">
                    <div class="mb-3">
                        <label class="form-label fw-bold small">Foto Profil</label>
                        <input type="file" name="image" id="field_image" class="form-control" accept="image/*">
                    </div>
                    <div class="mb-3">
                        <label class="form-label fw-bold small">Nama Lengkap</label>
                        <input type="text" name="name" id="field_name" class="form-control" required>
                    </div>
                    <div class="mb-3">
                        <label class="form-label fw-bold small">Jabatan / Role</label>
                        <input type="text" name="role" id="field_role" class="form-control" placeholder="Contoh: Project Manager" required>
                    </div>
                    <div class="mb-3">
                        <label class="form-label fw-bold small">No. WhatsApp (Opsional)</label>
                        <input type="text" name="phone" id="field_phone" class="form-control" placeholder="Contoh: 08123456789">
                    </div>
                </div>
                <div class="modal-footer border-0">
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
    function prepareAdd() {
        document.getElementById('modalTitle').innerText = 'Tambah Tim Baru';
        document.getElementById('formTeam').action = "{{ route('tim.store') }}";
        document.getElementById('methodField').innerHTML = ''; 
        document.getElementById('formTeam').reset(); 
    }

    function prepareEdit(team) {
        document.getElementById('modalTitle').innerText = 'Edit Data Tim';
        document.getElementById('formTeam').action = "/kontak-tim/" + team.id;
        document.getElementById('methodField').innerHTML = '<input type="hidden" name="_method" value="PUT">';
        
        document.getElementById('field_name').value = team.name;
        document.getElementById('field_role').value = team.role;
        document.getElementById('field_phone').value = team.phone || '';
        document.getElementById('field_image').value = '';
    }
</script>
@endpush