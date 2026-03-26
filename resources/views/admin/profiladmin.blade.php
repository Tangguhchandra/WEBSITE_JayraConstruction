@extends('layouts.admin')

@section('title', 'Profil Perusahaan')

@section('content')

<style>
    .nav-pills .nav-link.active { background-color: #f39c12 !important; color: #ffffff !important; }
    .nav-pills .nav-link { color: #475569; }
    .nav-pills .nav-link:hover { background-color: rgba(243, 156, 18, 0.1); color: #f39c12; }
</style>

<div class="container-fluid p-4 p-lg-4">
    @if(session('success'))
    <div x-data="{ show: true }" x-init="setTimeout(() => show = false, 5000)" x-show="show" x-transition.duration.1000ms class="alert alert-success border-0 shadow-sm mb-4 alert-dismissible fade show">
        <i class="bi bi-check-circle me-2"></i> {{ session('success') }}
        <button type="button" class="btn-close" @click="show = false"></button>
    </div>
    @endif                  

    <form action="{{ route('profilperusahaan.update') }}" method="POST" enctype="multipart/form-data">
        @csrf

        <div class="d-flex justify-content-between align-items-center mb-4">
            <div>
                <h1 class="h3 mb-0 fw-bold">Profil Perusahaan</h1>
                <p class="text-muted mb-0">Kelola identitas JayraConstruction untuk ditampilkan di website utama</p>
            </div>
            <button type="submit" class="btn btn-primary shadow-sm">
                <i class="bi bi-save me-2"></i>Simpan Perubahan
            </button>
        </div>

        <div x-data="{ activeSection: 'umum' }">
            <div class="row g-4">   
                <div class="col-lg-3">
                    <nav class="nav nav-pills flex-column p-3 rounded-4 shadow-sm border bg-body">
                        <a class="nav-link mb-2 fw-semibold" :class="{ 'active': activeSection === 'umum' }" href="#" @click.prevent="activeSection = 'umum'">
                            <i class="bi bi-info-circle me-2"></i> Informasi Umum
                        </a>
                        <a class="nav-link mb-2 fw-semibold" :class="{ 'active': activeSection === 'visi' }" href="#" @click.prevent="activeSection = 'visi'">
                            <i class="bi bi-eye me-2"></i> Visi & Misi
                        </a>
                        <a class="nav-link mb-2 fw-semibold" :class="{ 'active': activeSection === 'kontak' }" href="#" @click.prevent="activeSection = 'kontak'">
                            <i class="bi bi-geo-alt me-2"></i> Kontak & Lokasi
                        </a>
                        <a class="nav-link fw-semibold" :class="{ 'active': activeSection === 'gambar' }" href="#" @click.prevent="activeSection = 'gambar'">
                            <i class="bi bi-image me-2"></i> Gambar (About)
                        </a>
                    </nav>
                </div>

                <div class="col-lg-9">
                    
                    <div x-show="activeSection === 'umum'" class="card shadow-sm border-0 rounded-4 p-4">
                        <h5 class="fw-bold mb-3">Informasi Umum</h5>
                        <div class="row">
                            <div class="col-md-12 mb-3">
                                <label class="form-label fw-bold small text-muted">Nama Perusahaan</label>
                                <input type="text" name="company_name" class="form-control " value="{{ $profile->company_name }}">
                            </div>
                            <div class="col-md-6 mb-3">
                                <label class="form-label fw-bold small text-muted">Tahun Pengalaman</label>
                                <input type="text" name="experience_years" class="form-control " value="{{ $profile->experience_years }}" placeholder="Contoh: 15+">
                            </div>
                            <div class="col-md-6 mb-3">
                                <label class="form-label fw-bold small text-muted">Jumlah Proyek Selesai</label>
                                <input type="text" name="projects_completed" class="form-control " value="{{ $profile->projects_completed }}" placeholder="Contoh: 200+">
                            </div>
                            <div class="col-md-12 mb-3">
                                <label class="form-label fw-bold small text-muted">Deskripsi 'Siapa Kami?'</label>
                                <textarea name="about_description" class="form-control " rows="6">{{ $profile->about_description }}</textarea>
                            </div>
                        </div>
                    </div>

                    <div x-show="activeSection === 'visi'" class="card shadow-sm border-0 rounded-4 p-4" style="display: none;">
                        <h5 class="fw-bold mb-3">Visi & Misi</h5>
                        <div class="mb-4">
                            <label class="form-label fw-bold small text-muted">Teks Visi</label>
                            <textarea name="vision" class="form-control " rows="3">{{ $profile->vision }}</textarea>
                        </div>
                        <div>
                            <label class="form-label fw-bold small text-muted">Teks Misi (Pisahkan dengan baris baru / Enter)</label>
                            <textarea name="mission" class="form-control " rows="8">{{ $profile->mission }}</textarea>
                            <small class="text-secondary d-block mt-1"><i class="bi bi-info-circle me-1"></i>Setiap baris baru akan diubah menjadi daftar nomor (1, 2, 3) di halaman pengunjung.</small>
                        </div>
                    </div>

                    <div x-show="activeSection === 'kontak'" class="card shadow-sm border-0 rounded-4 p-4" style="display: none;">
                        <h5 class="fw-bold mb-3">Kontak & Lokasi</h5>
                        <div class="row">
                            <div class="col-md-6 mb-3">
                                <label class="form-label fw-bold small text-muted">Nomor Handphone / WhatsApp</label>
                                <input type="text" name="phone" class="form-control " value="{{ $profile->phone }}">
                            </div>
                            <div class="col-md-6 mb-3">
                                <label class="form-label fw-bold small text-muted">Alamat Email</label>
                                <input type="email" name="email" class="form-control " value="{{ $profile->email }}">
                            </div>
                            <div class="col-md-12">
                                <label class="form-label fw-bold small text-muted">Alamat Lengkap</label>
                                <textarea name="address" class="form-control " rows="3">{{ $profile->address }}</textarea>
                            </div>
                        </div>
                    </div>

                    <div x-show="activeSection === 'gambar'" class="card shadow-sm border-0 rounded-4 p-4" style="display: none;" x-data="{ imageUrl: '{{ $profile->about_image ? asset('storage/' . $profile->about_image) : 'https://images.unsplash.com/photo-1541888086425-d81bb19240f5?q=80&w=2070' }}' }">
                        <h5 class="fw-bold mb-3">Gambar Siapa Kami</h5>
                        <div class="text-center mb-4">
                            <div class="mx-auto rounded-circle overflow-hidden border border-4 border-white shadow" style="width: 250px; height: 250px;">
                                <img :src="imageUrl" class="w-100 h-100 object-fit-cover" alt="Preview Gambar">
                            </div>
                        </div>
                        <div class="mx-auto" style="max-width: 400px;">
                            <label class="form-label fw-bold small text-muted">Upload Gambar Baru</label>
                            <input type="file" name="about_image" class="form-control" accept="image/*" @change="imageUrl = URL.createObjectURL($event.target.files[0])">
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </form>
</div>
@endsection