@extends('layouts.admin')

@section('title', 'Data User')

@section('content')
<div class="container-fluid p-4 p-lg-5">
        
    @if(session('success'))
        <div class="alert alert-success alert-dismissible fade show border-0 shadow-sm mb-4" role="alert">
            <i class="bi bi-check-circle me-2"></i> {{ session('success') }}
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
    @endif
    @if(session('error'))
        <div class="alert alert-danger alert-dismissible fade show border-0 shadow-sm mb-4" role="alert">
            <i class="bi bi-exclamation-triangle me-2"></i> {{ session('error') }}
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
    @endif
    @if($errors->any())
        <div class="alert alert-danger alert-dismissible fade show border-0 shadow-sm mb-4" role="alert">
            <ul class="mb-0">
                @foreach($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
    @endif

    <div class="d-flex flex-column flex-md-row justify-content-between align-items-start align-items-md-center gap-3 mb-4">
        <div>
            <h1 class="h3 mb-0 fw-bold text-body">Manajemen User & Admin</h1>
            <p class="text-body-secondary mb-0">Kelola akses internal dan data pengguna JayraConstruction.</p>
        </div>
        <div class="d-flex gap-2">
            <button type="button" class="btn btn-primary shadow-sm px-4" onclick="prepareAdd()" data-bs-toggle="modal" data-bs-target="#userModal">
                <i class="bi bi-person-plus me-2"></i>Tambah Baru
            </button>
        </div>
    </div>

    <div class="row g-4">
        @foreach($users as $user)
        <div class="col-md-6 col-xl-4">
            <div class="card h-100 shadow-sm p-4 user-card bg-body position-relative">
                
                <span class="position-absolute top-0 end-0 m-3 badge {{ $user->role === 'admin' ? 'bg-danger' : 'bg-primary' }} px-3 py-2 rounded-pill shadow-sm">
                    <i class="bi {{ $user->role === 'admin' ? 'bi-shield-lock' : 'bi-person' }} me-1"></i>
                    {{ ucfirst($user->role) }}
                </span>
                
                <div class="d-inline-block mx-auto mb-3 mt-2">
                    <div class="rounded-circle d-flex align-items-center justify-content-center shadow-sm {{ $user->role === 'admin' ? 'bg-danger-subtle text-danger' : 'bg-primary-subtle text-primary' }}"
                         style="width: 80px; height: 80px; font-size: 2.2rem; font-weight: 700;">
                        {{ strtoupper(substr($user->name, 0, 1)) }}
                    </div>
                </div>
                
                <div class="text-center mb-3">
                    <h5 class="mb-1 fw-bold text-body">{{ $user->name }}</h5>
                    <span class="text-body-secondary small">{{ '@' . $user->username }}</span>
                </div>
                
                <div class="bg-body-tertiary rounded p-3 text-start mb-4">
                    <div class="d-flex align-items-center mb-2">
                        <i class="bi bi-envelope text-body-secondary me-2"></i>
                        <span class="small text-body text-truncate" title="{{ $user->email }}">{{ $user->email }}</span>
                    </div>
                    <div class="d-flex align-items-center">
                        <i class="bi bi-telephone text-body-secondary me-2"></i>
                        <span class="small text-body">{{ $user->phone ?? 'Belum ada No. HP' }}</span>
                    </div>
                </div>
                
                <div class="d-flex gap-2 mt-auto">
                    <button class="btn btn-sm btn-outline-primary flex-grow-1" onclick="prepareEdit({{ json_encode($user) }})" data-bs-toggle="modal" data-bs-target="#userModal">
                        <i class="bi bi-pencil-square me-1"></i> Edit
                    </button>
                    
                    <form action="{{ route('users.destroy', $user->id) }}" method="POST" class="d-inline" onsubmit="return confirm('Apakah Anda yakin ingin menghapus user ini?');">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-sm btn-outline-danger">
                            <i class="bi bi-trash"></i>
                        </button>
                    </form>
                </div>
            </div>
        </div>
        @endforeach
    </div>

</div>

<div class="modal fade" id="userModal" tabindex="-1">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content border-0 shadow-lg bg-body">
            <div class="modal-header bg-body-tertiary border-0">
                <h5 class="modal-title fw-bold text-body" id="modalTitle">Registrasi User Baru</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
            </div>
            
            <form id="formUser" method="POST" action="{{ route('users.store') }}">
                @csrf
                <div id="methodField"></div>

                <div class="modal-body p-4">
                    <div class="mb-3">
                        <label class="form-label fw-semibold text-body-secondary small text-uppercase">Nama Lengkap</label>
                        <div class="input-group input-group-merge">
                            <span class="input-group-text bg-body border-end-0"><i class="bi bi-person text-body-secondary"></i></span>
                            <input type="text" class="form-control bg-body text-body border-start-0 ps-0" name="name" id="field_name" placeholder="Contoh: John Doe" required>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-6 mb-3">
                            <label class="form-label fw-semibold text-body-secondary small text-uppercase">Username</label>
                            <div class="input-group input-group-merge">
                                <span class="input-group-text bg-body border-end-0 text-body-secondary">@</span>
                                <input type="text" class="form-control bg-body text-body border-start-0 ps-0" name="username" id="field_username" placeholder="johndoe" required>
                            </div>
                        </div>
                        <div class="col-md-6 mb-3">
                            <label class="form-label fw-semibold text-body-secondary small text-uppercase">No. HP</label>
                            <div class="input-group input-group-merge">
                                <span class="input-group-text bg-body border-end-0"><i class="bi bi-telephone text-body-secondary"></i></span>
                                <input type="text" class="form-control bg-body text-body border-start-0 ps-0" name="phone" id="field_phone" placeholder="0812...">
                            </div>
                        </div>
                    </div>
                    <div class="mb-3">
                        <label class="form-label fw-semibold text-body-secondary small text-uppercase">Email</label>
                        <div class="input-group input-group-merge">
                            <span class="input-group-text bg-body border-end-0"><i class="bi bi-envelope text-body-secondary"></i></span>
                            <input type="email" class="form-control bg-body text-body border-start-0 ps-0" name="email" id="field_email" placeholder="email@jayra.com" required>
                        </div>
                    </div>
                    <div class="mb-3">
                        <label class="form-label fw-semibold text-body-secondary small text-uppercase">Role Hak Akses</label>
                        <select class="form-select bg-body text-body" name="role" id="field_role" required>
                            <option value="user">User Biasa</option>
                            <option value="admin">Admin System</option>
                        </select>
                    </div>
                    <div class="mb-2">
                        <label class="form-label fw-semibold text-body-secondary small text-uppercase">Password</label>
                        <div class="input-group input-group-merge">
                            <span class="input-group-text bg-body border-end-0"><i class="bi bi-lock text-body-secondary"></i></span>
                            <input type="password" class="form-control bg-body text-body border-start-0 ps-0" name="password" id="field_password" placeholder="Minimal 8 Karakter">
                        </div>
                        <small class="text-body-secondary" id="passwordHelp">Kosongkan jika tidak ingin mengubah password (saat Edit).</small>
                    </div>
                </div>
                <div class="modal-footer border-0 bg-body-tertiary">
                    <button type="button" class="btn btn-outline-secondary" data-bs-dismiss="modal">Batal</button>
                    <button type="submit" class="btn btn-primary px-4"><i class="bi bi-save me-2"></i>Simpan User</button>
                </div>
            </form>
        </div>
    </div>
</div>

<style>
    /* Agar tampilan card lebih elegan */
    .user-card {
        transition: transform 0.3s ease, box-shadow 0.3s ease, border-color 0.3s ease;
        border: 1px solid var(--bs-border-color); /* Adaptif terhadap tema */
        border-radius: 1rem;
    }
    .user-card:hover {
        transform: translateY(-5px);
        box-shadow: 0 15px 30px rgba(0,0,0,0.1) !important;
        border-color: var(--bs-primary);
    }
    /* Mempercantik input modal */
    .input-group-merge .form-control:focus {
        box-shadow: none;
        border-color: var(--bs-border-color);
    }
    .input-group-merge .input-group-text {
        border-color: var(--bs-border-color);
        border-right: 0;
    }
    .input-group-merge .form-control {
        border-color: var(--bs-border-color);
    }
    
    /* Perbaikan bayangan saat dark mode */
    [data-bs-theme="dark"] .user-card:hover {
        box-shadow: 0 15px 30px rgba(255,255,255,0.05) !important;
    }
</style>

@endsection

@push('scripts')
<script>
    // Fungsi untuk mode TAMBAH
    function prepareAdd() {
        document.getElementById('modalTitle').innerText = 'Registrasi User Baru';
        document.getElementById('formUser').action = "{{ route('users.store') }}";
        document.getElementById('methodField').innerHTML = '';
        document.getElementById('formUser').reset();
        document.getElementById('field_password').required = true;
        document.getElementById('passwordHelp').style.display = 'none';
    }

    // Fungsi untuk mode EDIT
    function prepareEdit(user) {
        document.getElementById('modalTitle').innerText = 'Edit Data User';
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