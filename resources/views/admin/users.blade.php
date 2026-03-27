@extends('layouts.admin')

@section('title', 'Data User')

@section('content')
<div class="container-fluid p-3 p-md-4 p-lg-5">
        
    {{-- ALERT NOTIFICATIONS --}}
    @if(session('success'))
        <div class="alert alert-success alert-dismissible fade show border-0 shadow-sm mb-4 rounded-4" role="alert">
            <div class="d-flex align-items-center">
                <div class="bg-success text-white rounded-circle d-flex align-items-center justify-content-center me-3" style="width: 32px; height: 32px;">
                    <i class="bi bi-check-lg"></i>
                </div>
                <strong class="text-success-emphasis">{{ session('success') }}</strong>
            </div>
            <button type="button" class="btn-close mt-1" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
    @endif
    @if(session('error'))
        <div class="alert alert-danger alert-dismissible fade show border-0 shadow-sm mb-4 rounded-4" role="alert">
            <div class="d-flex align-items-center">
                <div class="bg-danger text-white rounded-circle d-flex align-items-center justify-content-center me-3" style="width: 32px; height: 32px;">
                    <i class="bi bi-exclamation-lg"></i>
                </div>
                <strong class="text-danger-emphasis">{{ session('error') }}</strong>
            </div>
            <button type="button" class="btn-close mt-1" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
    @endif
    @if($errors->any())
        <div class="alert alert-danger alert-dismissible fade show border-0 shadow-sm mb-4 rounded-4" role="alert">
            <div class="d-flex">
                <div class="bg-danger text-white rounded-circle d-flex align-items-center justify-content-center me-3 flex-shrink-0" style="width: 32px; height: 32px;">
                    <i class="bi bi-x-lg"></i>
                </div>
                <div>
                    <strong class="text-danger-emphasis d-block mb-1">Terdapat kesalahan input:</strong>
                    <ul class="mb-0 ps-3 text-danger-emphasis small">
                        @foreach($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            </div>
            <button type="button" class="btn-close mt-1" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
    @endif

    {{-- HEADER SECTION --}}
    <div class="d-flex flex-column flex-md-row justify-content-between align-items-start align-items-md-center gap-3 mb-5">
        <div>
            <h1 class="h3 mb-1 fw-bolder text-body" style="letter-spacing: -0.5px;">Manajemen User & Admin</h1>
            <p class="text-body-secondary mb-0 fs-6">Kelola akses internal dan data pengguna JayraConstruction.</p>
        </div>
        <button type="button" class="btn btn-primary shadow-lg rounded-pill px-3 py-2 fw-semibold d-flex align-items-center justify-content-center hover-elevate" onclick="prepareAdd()" data-bs-toggle="modal" data-bs-target="#userModal">
            <i class="bi bi-person-plus-fill me-2 fs-5"></i> Tambah User Baru
        </button>
    </div>

    {{-- USERS GRID --}}
    <div class="row g-4">
        @foreach($users as $user)
        <div class="col-12 col-md-6 col-xl-4 col-xxl-3">
            <div class="card h-100 shadow-sm border-0 user-card bg-body position-relative overflow-hidden">
                
                {{-- Aksen Warna di Atas Kartu (Beda warna tiap role) --}}
                <div class="position-absolute top-0 start-0 w-100 {{ $user->role === 'admin' ? 'bg-danger' : 'bg-primary' }}" style="height: 5px;"></div>
                
                {{-- Badge Role --}}
                <span class="position-absolute top-0 end-0 m-3 badge {{ $user->role === 'admin' ? 'bg-danger-subtle text-danger border border-danger-subtle' : 'bg-primary-subtle text-primary border border-primary-subtle' }} px-3 py-2 rounded-pill shadow-sm fw-bold" style="font-size: 0.7rem; letter-spacing: 0.5px;">
                    <i class="bi {{ $user->role === 'admin' ? 'bi-shield-lock-fill' : 'bi-person-fill' }} me-1"></i>
                    {{ strtoupper($user->role) }}
                </span>
                
                <div class="card-body p-4 d-flex flex-column pt-5">
                    
                    {{-- Avatar Inisial --}}
                    <div class="mx-auto mb-3 position-relative">
                        <div class="rounded-circle d-flex align-items-center justify-content-center shadow-sm {{ $user->role === 'admin' ? 'bg-gradient-danger text-white' : 'bg-gradient-primary text-white' }}"
                             style="width: 75px; height: 75px; font-size: 2rem; font-weight: 800; border: 3px solid var(--bs-body-bg);">
                            {{ strtoupper(substr($user->name, 0, 1)) }}
                        </div>
                        {{-- Indikator Aktif (Titik Hijau) --}}
                        <span class="position-absolute bottom-0 end-0 p-2 bg-success border border-light rounded-circle shadow" style="transform: translate(-10%, -10%);">
                            <span class="visually-hidden">Aktif</span>
                        </span>
                    </div>
                    
                    {{-- Nama & Username --}}
                    <div class="text-center mb-4">
                        <h5 class="mb-0 fw-bold text-body-emphasis">{{ $user->name }}</h5>
                        <span class="badge bg-body-secondary text-secondary mt-2 px-2 py-1 rounded-2 fw-medium">
                            <i class="bi bi-at"></i>{{ $user->username }}
                        </span>
                    </div>
                    
                    {{-- Info Kontak --}}
                    <div class="bg-body-tertiary rounded-4 p-3 text-start mb-4 mt-auto border">
                        <div class="d-flex align-items-center mb-3">
                            <div class="icon-box-small bg-white shadow-sm rounded-3 me-3 text-body-secondary d-flex align-items-center justify-content-center" style="width: 32px; height: 32px;">
                                <i class="bi bi-envelope-fill"></i>
                            </div>
                            <div class="text-truncate flex-grow-1">
                                <small class="text-body-secondary d-block lh-1 mb-1" style="font-size: 0.7rem; font-weight: 600; text-transform: uppercase;">Email</small>
                                <span class="small text-body fw-medium text-truncate d-block" title="{{ $user->email }}">{{ $user->email }}</span>
                            </div>
                        </div>
                        <div class="d-flex align-items-center">
                            <div class="icon-box-small bg-white shadow-sm rounded-3 me-3 text-body-secondary d-flex align-items-center justify-content-center" style="width: 32px; height: 32px;">
                                <i class="bi bi-telephone-fill"></i>
                            </div>
                            <div class="text-truncate flex-grow-1">
                                <small class="text-body-secondary d-block lh-1 mb-1" style="font-size: 0.7rem; font-weight: 600; text-transform: uppercase;">Nomor HP</small>
                                <span class="small text-body fw-medium d-block">{{ $user->phone ?? 'Belum disetel' }}</span>
                            </div>
                        </div>
                    </div>
                    
                    {{-- Action Buttons (Pakai Style Seragam Punya Kamu) --}}
                    <div class="d-flex justify-content-center">
                        <div class="btn-group shadow-sm w-100">
                            <button type="button" 
                                    class="btn btn-light-custom btn-sm w-50 py-2 d-flex align-items-center justify-content-center gap-2" 
                                    data-bs-toggle="modal" 
                                    data-bs-target="#userModal" 
                                    onclick='prepareEdit(@json($user))'>
                                <i class="bi bi-pencil-fill text-primary"></i> <span class="fw-semibold">Edit</span>
                            </button>
                            <form action="{{ route('users.destroy', $user->id) }}" method="POST" class="d-inline w-50 m-0 p-0" onsubmit="return confirm('Peringatan: Tindakan ini permanen!\n\nApakah Anda yakin ingin menghapus akses untuk user ini?');">
                                @csrf @method('DELETE')
                                <button type="submit" class="btn btn-light-custom btn-sm text-danger w-100 h-100 py-2 d-flex align-items-center justify-content-center gap-2 rounded-end" title="Hapus Akses">
                                    <i class="bi bi-trash-fill"></i> <span class="fw-semibold">Hapus</span>
                                </button>
                            </form>
                        </div>
                    </div>

                </div>
            </div>
        </div>
        @endforeach
    </div>

</div>

{{-- MODAL FORM --}}
<div class="modal fade" id="userModal" tabindex="-1" aria-labelledby="modalTitle" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-lg">
        <div class="modal-content border-0 shadow-lg bg-body rounded-4 overflow-hidden">
            
            <div class="modal-header bg-body-tertiary border-bottom px-4 py-3">
                <h5 class="modal-title fw-bold text-body-emphasis d-flex align-items-center gap-2" id="modalTitle">
                    <i class="bi bi-person-bounding-box text-primary"></i> Registrasi User Baru
                </h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            
            <form id="formUser" method="POST" action="{{ route('users.store') }}">
                @csrf
                <div id="methodField"></div>

                <div class="modal-body p-4 p-md-5">
                    
                    <div class="row g-4">
                        {{-- Kolom Kiri --}}
                        <div class="col-md-6">
                            <div class="mb-4">
                                <label class="form-label fw-bold text-body-secondary small text-uppercase" style="letter-spacing: 1px;">Nama Lengkap <span class="text-danger">*</span></label>
                                <div class="input-group input-group-merge rounded-3 shadow-sm">
                                    <span class="input-group-text bg-white border-end-0 text-muted"><i class="bi bi-person"></i></span>
                                    <input type="text" class="form-control bg-white border-start-0 ps-0" name="name" id="field_name" placeholder="Masukkan nama asli" required>
                                </div>
                            </div>
                            
                            <div class="mb-4">
                                <label class="form-label fw-bold text-body-secondary small text-uppercase" style="letter-spacing: 1px;">Username <span class="text-danger">*</span></label>
                                <div class="input-group input-group-merge rounded-3 shadow-sm">
                                    <span class="input-group-text bg-white border-end-0 text-muted fw-bold">@</span>
                                    <input type="text" class="form-control bg-white border-start-0 ps-0" name="username" id="field_username" placeholder="johndoe" required>
                                </div>
                            </div>

                            <div class="mb-0">
                                <label class="form-label fw-bold text-body-secondary small text-uppercase" style="letter-spacing: 1px;">Role Hak Akses <span class="text-danger">*</span></label>
                                <div class="input-group rounded-3 shadow-sm">
                                    <span class="input-group-text bg-white text-muted"><i class="bi bi-shield-check"></i></span>
                                    <select class="form-select bg-white" name="role" id="field_role" required>
                                        <option value="user">User Biasa </option>
                                        <option value="admin">Admin System </option>x
                                    </select>
                                </div>
                            </div>
                        </div>

                        {{-- Kolom Kanan --}}
                        <div class="col-md-6">
                            <div class="mb-4">
                                <label class="form-label fw-bold text-body-secondary small text-uppercase" style="letter-spacing: 1px;">Alamat Email <span class="text-danger">*</span></label>
                                <div class="input-group input-group-merge rounded-3 shadow-sm">
                                    <span class="input-group-text bg-white border-end-0 text-muted"><i class="bi bi-envelope"></i></span>
                                    <input type="email" class="form-control bg-white border-start-0 ps-0" name="email" id="field_email" placeholder="email@jayra.com" required>
                                </div>
                            </div>

                            <div class="mb-4">
                                <label class="form-label fw-bold text-body-secondary small text-uppercase" style="letter-spacing: 1px;">Nomor Telepon / WA</label>
                                <div class="input-group input-group-merge rounded-3 shadow-sm">
                                    <span class="input-group-text bg-white border-end-0 text-muted"><i class="bi bi-telephone"></i></span>
                                    <input type="text" class="form-control bg-white border-start-0 ps-0" name="phone" id="field_phone" placeholder="08123456789">
                                </div>
                            </div>

                            <div class="mb-0">
                                <label class="form-label fw-bold text-body-secondary small text-uppercase" style="letter-spacing: 1px;">Password</label>
                                <div class="input-group input-group-merge rounded-3 shadow-sm">
                                    <span class="input-group-text bg-white border-end-0 text-muted"><i class="bi bi-key"></i></span>
                                    <input type="password" class="form-control bg-white border-start-0 ps-0" name="password" id="field_password" placeholder="Minimal 8 Karakter">
                                </div>
                                <div class="form-text mt-2 text-warning fw-medium" id="passwordHelp" style="display: none;">
                                    <i class="bi bi-info-circle me-1"></i> Biarkan kosong jika password tidak diubah.
                                </div>
                            </div>
                        </div>
                    </div>

                </div>
                
                <div class="modal-footer border-top bg-body-tertiary px-4 py-3">
                    <button type="button" class="btn btn-light fw-semibold px-4" data-bs-dismiss="modal">Batal</button>
                    <button type="submit" class="btn btn-primary fw-semibold px-5 shadow-sm hover-elevate">
                        <i class="bi bi-save-fill me-2"></i> Simpan Data
                    </button>
                </div>
            </form>
        </div>
    </div>
</div>

{{-- CSS KHUSUS HALAMAN USER --}}
<style>
    /* Transisi Halus & Bayangan Premium */
    .user-card {
        transition: all 0.4s cubic-bezier(0.165, 0.84, 0.44, 1);
        border-radius: 1.25rem !important;
    }
    .user-card:hover {
        transform: translateY(-8px);
        box-shadow: 0 20px 40px rgba(0,0,0,0.08) !important;
    }
    
    /* Tombol Animasi Mengangkat */
    .hover-elevate {
        transition: transform 0.2s ease, box-shadow 0.2s ease;
    }
    .hover-elevate:hover {
        transform: translateY(-2px);
        box-shadow: 0 8px 15px rgba(13, 110, 253, 0.2) !important;
    }

    /* Warna Gradien Elegan untuk Inisial Avatar */
    .bg-gradient-primary {
        background: linear-gradient(135deg, #0d6efd 0%, #0a58ca 100%);
    }
    .bg-gradient-danger {
        background: linear-gradient(135deg, #dc3545 0%, #b02a37 100%);
    }

    /* Modifikasi Style Button Group Baru */
    .btn-light-custom {
        background-color: var(--bs-tertiary-bg);
        border: 1px solid var(--bs-border-color-translucent);
        color: var(--bs-body-color);
        transition: all 0.2s ease;
    }
    .btn-light-custom:hover {
        background-color: var(--bs-secondary-bg);
        filter: brightness(0.95);
    }

    /* Styling Form Input Group yang Menyatu */
    .input-group-merge .form-control:focus {
        box-shadow: none;
        border-color: var(--bs-primary);
    }
    .input-group-merge:focus-within {
        box-shadow: 0 0 0 0.25rem rgba(13, 110, 253, 0.25) !important;
        border-radius: 0.375rem;
    }
    .input-group-merge:focus-within .input-group-text,
    .input-group-merge:focus-within .form-control {
        border-color: var(--bs-primary);
    }
    
    /* FIX UNTUK DARK MODE */
    [data-bs-theme="dark"] .user-card {
        border: 1px solid rgba(255,255,255,0.05) !important;
        background-color: #1e1e2d !important;
    }
    [data-bs-theme="dark"] .user-card:hover {
        box-shadow: 0 20px 40px rgba(0,0,0,0.4) !important;
        border-color: rgba(255,255,255,0.1) !important;
    }
    [data-bs-theme="dark"] .bg-white {
        background-color: #2b2b40 !important;
    }
    [data-bs-theme="dark"] .btn-light-custom {
        background-color: #2b2b40;
        border-color: rgba(255,255,255,0.1);
        color: #fff;
    }
    [data-bs-theme="dark"] .btn-light-custom:hover {
        background-color: #323248;
    }
</style>

@endsection

@push('scripts')
<script>
    // Fungsi untuk mode TAMBAH
    function prepareAdd() {
        document.getElementById('modalTitle').innerHTML = '<i class="bi bi-person-bounding-box text-primary"></i> Registrasi User Baru';
        document.getElementById('formUser').action = "{{ route('users.store') }}";
        document.getElementById('methodField').innerHTML = '';
        document.getElementById('formUser').reset();
        document.getElementById('field_password').required = true;
        document.getElementById('passwordHelp').style.display = 'none';
        
        // Default role
        document.getElementById('field_role').value = 'user';
    }

    // Fungsi untuk mode EDIT
    function prepareEdit(user) {
        document.getElementById('modalTitle').innerHTML = '<i class="bi bi-person-gear text-warning"></i> Edit Data Pengguna';
        document.getElementById('formUser').action = "/users/" + user.id;
        
        document.getElementById('methodField').innerHTML = '<input type="hidden" name="_method" value="PUT">';
        
        document.getElementById('field_name').value = user.name;
        document.getElementById('field_username').value = user.username;
        document.getElementById('field_email').value = user.email;
        document.getElementById('field_phone').value = user.phone || '';
        document.getElementById('field_role').value = user.role;
        
        document.getElementById('field_password').value = '';
        document.getElementById('field_password').required = false;
        document.getElementById('passwordHelp').style.display = 'block';
    }
</script>
@endpush