@extends('layouts.admin')

@section('title', 'Data User')

@section('content')
<div class="container-fluid p-4 p-lg-5">
        
        <!-- Page Header -->
        <div class="d-flex flex-column flex-md-row justify-content-between align-items-start align-items-md-center gap-3 mb-4">
            <div>
                <h1 class="h3 mb-0">Manajemen User & Admin</h1>
                <p class="text-muted mb-0">Kelola akses internal JayraConstruction.</p>
            </div>
            <div class="d-flex gap-2">
                <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#userModal">
                    <i class="bi bi-person-plus me-2"></i>Tambah Baru
                </button>
            </div>
        </div>

        <!-- User Grid -->
        <div x-data="{ 
            users: [
                { id: 1, name: 'Tangguh Admin', email: 'admin@jayra.com', role: 'Admin', status: 'Online' },
                { id: 2, name: 'Ahmad User', email: 'ahmad@gmail.com', role: 'User', status: 'Offline' },
                { id: 3, name: 'Siti Klien', email: 'siti@perusahaan.com', role: 'User', status: 'Online' },
                { id: 4, name: 'Rendi Staff', email: 'rendi@jayra.com', role: 'Admin', status: 'Online' }
            ] 
        }">
            <div class="row g-4">
                <template x-for="user in users" :key="user.id">
                    <div class="col-md-6 col-xl-3">
                        <div class="card h-100 shadow-sm text-center p-4 user-card border-0">
                            
                            <!-- Avatar Huruf (Initial) -->
                            <div class="position-relative d-inline-block mx-auto mb-3">
                                <div class="rounded-circle d-flex align-items-center justify-content-center border border-3 border-white shadow-sm"
                                     :class="user.role === 'Admin' ? 'bg-danger text-white' : 'bg-primary text-white'"
                                     style="width: 80px; height: 80px; font-size: 2rem; font-weight: 700;">
                                    <!-- Ambil huruf pertama dari nama -->
                                    <span x-text="user.name.charAt(0).toUpperCase()"></span>
                                </div>
                                <!-- Status Dot -->
                                <span class="position-absolute bottom-0 end-0 p-1 border border-2 border-white rounded-circle" 
                                      :class="user.status === 'Online' ? 'bg-success' : 'bg-secondary'"
                                      style="width: 15px; height: 15px; transform: translate(-5px, -5px);"></span>
                            </div>
                            
                            <h5 class="mb-1" x-text="user.name"></h5>
                            <p class="small text-muted mb-3" x-text="user.email"></p>
                            
                            <!-- Role Badge -->
                            <span class="badge mb-4 px-3 py-2 rounded-pill" 
                                  :class="user.role === 'Admin' ? 'bg-danger' : 'bg-primary'"
                                  x-text="user.role"></span>
                            
                            <div class="d-flex gap-2 mt-auto">
                                <button class="btn btn-sm btn-outline-primary flex-grow-1">Edit</button>
                                <button class="btn btn-sm btn-outline-danger"><i class="bi bi-trash"></i></button>
                            </div>
                        </div>
                    </div>
                </template>
            </div>
        </div>

    </div>

    <div class="modal fade" id="userModal" tabindex="-1">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Registrasi User/Admin Baru</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
            </div>
            <div class="modal-body">
                <form>
                    <div class="mb-3">
                        <label class="form-label fw-bold">Nama Lengkap</label>
                        <input type="text" class="form-control" placeholder="Nama Lengkap">
                    </div>
                    <div class="mb-3">
                        <label class="form-label fw-bold">Email</label>
                        <input type="email" class="form-control" placeholder="email@jayra.com">
                    </div>
                    <div class="mb-3">
                        <label class="form-label fw-bold">Role Hak Akses</label>
                        <select class="form-select">
                            <option value="Admin">Admin </option>
                            <option value="User">User </option>
                        </select>
                    </div>
                    <div class="mb-3">
                        <label class="form-label fw-bold">Password</label>
                        <input type="password" class="form-control" placeholder="Minimal 8 Karakter">
                    </div>
                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-light" data-bs-dismiss="modal">Batal</button>
                <button type="button" class="btn btn-primary">Simpan User</button>
            </div>
        </div>
    </div>
</div>

   <style>
    /* Agar tampilan card lebih elegan */
    .user-card {
        transition: all 0.3s ease;
        border: 1px solid rgba(0,0,0,0.05);
    }
    .user-card:hover {
        transform: translateY(-5px);
        box-shadow: 0 15px 30px rgba(0,0,0,0.1) !important;
        border-color: var(--bs-primary);
    }
</style>

@endsection