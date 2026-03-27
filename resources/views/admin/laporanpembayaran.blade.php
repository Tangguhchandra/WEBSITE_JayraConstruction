@extends('layouts.admin')

@section('title', 'Laporan Pembayaran')

@section('content')

{{-- Filter Data --}}
@php
    $trxBerhasil = $transactions->whereIn('transaction_status', ['settlement', 'capture', 'success']);
    $trxPending = $transactions->where('transaction_status', 'pending');
    $trxGagal = $transactions->whereIn('transaction_status', ['expire', 'cancel', 'deny']);
@endphp

<div class="container-fluid p-4 p-lg-5">

    <div class="d-flex flex-column flex-md-row justify-content-between align-items-md-center mb-4 gap-3">
        <div>
            <h1 class="h3 mb-1 fw-bold text-primary">Laporan Pembayaran</h1>
            <p class="text-secondary mb-0">Kelola transaksi, pantau status, dan hubungi pelanggan.</p>
        </div>
        <div>
                <a href="{{ route('laporan-pembayaran.export') }}" class="btn btn-success px-4 py-2 shadow-sm rounded-3 fw-semibold d-flex align-items-center gap-2">
                <i class="bi bi-file-earmark-excel-fill"></i> Download Excel
            </a>
        </div>
    </div>

    @if(session('success'))
        <div class="alert alert-success alert-dismissible fade show shadow-sm rounded-4 border-0 border-start border-success border-4" role="alert">
            <i class="bi bi-check-circle-fill me-2 text-success"></i>{{ session('success') }}
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
    @endif

    <div class="row g-4 mb-5">
        <div class="col-sm-6 col-xl-3">
            <div class="card border-0 shadow-sm rounded-4 h-100 bg-success-subtle overflow-hidden relative">
                <div class="position-absolute end-0 top-0 opacity-25 p-3">
                    <i class="bi bi-wallet2" style="font-size: 4rem;"></i>
                </div>
                <div class="card-body p-4 position-relative z-1">
                    <small class="text-success text-uppercase fw-bold mb-2 d-block">Total Pendapatan</small>
                    <h3 class="mb-0 fw-bolder text-success">Rp {{ number_format($totalPendapatan, 0, ',', '.') }}</h3>
                </div>
            </div>
        </div>
        <div class="col-sm-6 col-xl-3">
            <div class="card border-0 shadow-sm rounded-4 h-100 bg-warning-subtle overflow-hidden relative">
                <div class="position-absolute end-0 top-0 opacity-25 p-3">
                    <i class="bi bi-hourglass-split text-warning" style="font-size: 4rem;"></i>
                </div>
                <div class="card-body p-4 position-relative z-1">
                    <small class="text-warning-emphasis text-uppercase fw-bold mb-2 d-block">Pending</small>
                    <h3 class="mb-0 fw-bolder text-warning-emphasis">{{ $totalPending }} <span class="fs-6 fw-normal">Trx</span></h3>
                </div>
            </div>
        </div>
        <div class="col-sm-6 col-xl-3">
            <div class="card border-0 shadow-sm rounded-4 h-100 bg-primary-subtle overflow-hidden relative">
                <div class="position-absolute end-0 top-0 opacity-25 p-3">
                    <i class="bi bi-check-circle-fill text-primary" style="font-size: 4rem;"></i>
                </div>
                <div class="card-body p-4 position-relative z-1">
                    <small class="text-primary-emphasis text-uppercase fw-bold mb-2 d-block">Berhasil</small>
                    <h3 class="mb-0 fw-bolder text-primary-emphasis">{{ $totalBerhasil }} <span class="fs-6 fw-normal">Trx</span></h3>
                </div>
            </div>
        </div>
        <div class="col-sm-6 col-xl-3">
            <div class="card border-0 shadow-sm rounded-4 h-100 bg-danger-subtle overflow-hidden relative">
                <div class="position-absolute end-0 top-0 opacity-25 p-3">
                    <i class="bi bi-x-circle-fill text-danger" style="font-size: 4rem;"></i>
                </div>
                <div class="card-body p-4 position-relative z-1">
                    <small class="text-danger-emphasis text-uppercase fw-bold mb-2 d-block">Gagal / Batal</small>
                    <h3 class="mb-0 fw-bolder text-danger-emphasis">{{ $totalGagal }} <span class="fs-6 fw-normal">Trx</span></h3>
                </div>
            </div>
        </div>
    </div>

    <div class="card border-0 shadow-sm rounded-4 overflow-hidden bg-body">
        <div class="card-header bg-body-tertiary p-0 border-bottom">
            <ul class="nav nav-tabs border-bottom-0" id="trxTabs" role="tablist">
                <li class="nav-item flex-fill text-center" role="presentation">
                    <button class="nav-link w-100 active py-3 fw-bold rounded-0 text-secondary" id="semua-tab" data-bs-toggle="tab" data-bs-target="#semua" type="button" role="tab">Semua Data</button>
                </li>
                <li class="nav-item flex-fill text-center" role="presentation">
                    <button class="nav-link w-100 py-3 fw-bold rounded-0 text-warning" id="pending-tab" data-bs-toggle="tab" data-bs-target="#pending" type="button" role="tab">Pending</button>
                </li>
                <li class="nav-item flex-fill text-center" role="presentation">
                    <button class="nav-link w-100 py-3 fw-bold rounded-0 text-success" id="berhasil-tab" data-bs-toggle="tab" data-bs-target="#berhasil" type="button" role="tab">Berhasil</button>
                </li>
            </ul>
        </div>

        <div class="card-body p-0">
            <div class="tab-content" id="trxTabsContent">
                
                <div class="tab-pane fade show active" id="semua" role="tabpanel">
                    @include('admin.partials-table.trx-table', ['dataTrx' => $transactions])
                </div>

                <div class="tab-pane fade" id="pending" role="tabpanel">
                    @include('admin.partials-table.trx-table', ['dataTrx' => $trxPending])
                </div>

                <div class="tab-pane fade" id="berhasil" role="tabpanel">
                    @include('admin.partials-table.trx-table', ['dataTrx' => $trxBerhasil])
                </div>

            </div>
        </div>
    </div>

    @foreach($transactions as $trx)
    <div class="modal fade" id="detailModal-{{ $trx->id }}" tabindex="-1" aria-labelledby="modalLabel{{ $trx->id }}" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered modal-lg">
            <div class="modal-content rounded-4 border-0 shadow-lg bg-body">
                
                <div class="modal-header border-bottom border-secondary-subtle p-4 pb-3">
                    <h5 class="modal-title fw-bold text-primary d-flex align-items-center gap-2" id="modalLabel{{ $trx->id }}">
                        <i class="bi bi-receipt"></i> Rincian Transaksi
                    </h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                
                <div class="modal-body p-4 p-md-5 pt-4">
                    
                    {{-- Header Info Transaksi --}}
                    <div class="d-flex flex-column flex-md-row justify-content-between align-items-start align-items-md-center border-bottom border-secondary-subtle pb-4 mb-4">
                        <div class="mb-3 mb-md-0">
                            <h6 class="text-secondary text-uppercase fw-bold mb-1" style="font-size: 0.75rem; letter-spacing: 1px;">Nomor Invoice / Order ID</h6>
                            <h4 class="fw-bold mb-0 text-body">{{ $trx->order_id }}</h4>
                        </div>
                        <div class="text-md-end">
                            <h6 class="text-secondary text-uppercase fw-bold mb-2" style="font-size: 0.75rem; letter-spacing: 1px;">Status Gateway</h6>
                            @if(in_array($trx->transaction_status, ['settlement', 'capture', 'success']))
                                <span class="badge bg-success-subtle text-success border border-success-subtle px-3 py-2 fs-6 rounded-pill d-inline-flex align-items-center gap-1"><i class="bi bi-check-circle"></i> BERHASIL</span>
                            @elseif($trx->transaction_status == 'pending')
                                <span class="badge bg-warning-subtle text-warning-emphasis border border-warning-subtle px-3 py-2 fs-6 rounded-pill d-inline-flex align-items-center gap-1"><i class="bi bi-hourglass-split"></i> PENDING</span>
                            @else
                                <span class="badge bg-danger-subtle text-danger border border-danger-subtle px-3 py-2 fs-6 rounded-pill d-inline-flex align-items-center gap-1 text-uppercase"><i class="bi bi-x-circle"></i> {{ $trx->transaction_status }}</span>
                            @endif
                        </div>
                    </div>

                    {{-- Data Pelanggan & Lokasi --}}
                    <div class="card bg-body-tertiary border-0 rounded-4 mb-4 shadow-sm">
                        <div class="card-body p-4">
                            <div class="row g-4">
                                <div class="col-md-6">
                                    <div class="d-flex gap-3">
                                        <div class="bg-white p-2 rounded-3 shadow-sm text-primary">
                                            <i class="bi bi-person-fill fs-4"></i>
                                        </div>
                                        <div>
                                            <small class="text-secondary d-block mb-1">Nama Pelanggan</small>
                                            <strong class="text-body fs-6">{{ $trx->user->name ?? 'User Terhapus' }}</strong>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="d-flex gap-3">
                                        <div class="bg-white p-2 rounded-3 shadow-sm text-primary">
                                            <i class="bi bi-clock-history fs-4"></i>
                                        </div>
                                        <div>
                                            <small class="text-secondary d-block mb-1">Waktu Transaksi</small>
                                            <strong class="text-body fs-6">{{ $trx->created_at->format('d F Y, H:i') }} WIB</strong>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-12 border-top border-secondary-subtle pt-3">
                                    <div class="d-flex gap-3">
                                        <div class="bg-white p-2 rounded-3 shadow-sm text-primary h-max">
                                            <i class="bi bi-geo-alt-fill fs-4"></i>
                                        </div>
                                        <div>
                                            <small class="text-secondary d-block mb-1">Alamat Logistik / Proyek</small>
                                            <p class="mb-0 text-body fw-medium">{{ $trx->address ?? 'Alamat belum diisi oleh pelanggan saat checkout.' }}</p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    {{-- Data Tagihan --}}
                    <div class="card border-primary border-2 rounded-4 overflow-hidden">
                        <div class="card-body p-4 d-flex flex-column flex-md-row justify-content-between align-items-center gap-3">
                            <div>
                                <small class="text-secondary text-uppercase fw-bold mb-1 d-block" style="font-size: 0.75rem; letter-spacing: 1px;">Layanan Dipesan</small>
                                <strong class="text-primary fs-5">{{ $trx->service_name }}</strong>
                            </div>
                            <div class="text-md-end text-center w-100 w-md-auto mt-3 mt-md-0 border-top border-md-0 pt-3 pt-md-0">
                                <small class="text-secondary text-uppercase fw-bold mb-1 d-block" style="font-size: 0.75rem; letter-spacing: 1px;">Total Pembayaran</small>
                                <strong class="text-primary fs-3 fw-bolder">Rp {{ number_format($trx->gross_amount, 0, ',', '.') }}</strong>
                            </div>
                        </div>
                    </div>

                </div>
                
                {{-- Footer & Aksi Modal --}}
                <div class="modal-footer border-top border-secondary-subtle p-4 bg-body-tertiary d-flex flex-column flex-md-row justify-content-between gap-3">
                    
                    {{-- Tombol Hapus Data --}}
                    <form action="{{ route('laporan-pembayaran.destroy', $trx->id) }}" method="POST" onsubmit="return confirm('Tindakan ini permanen! Yakin ingin menghapus data transaksi ini dari database?');" class="w-100 w-md-auto">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-outline-danger rounded-3 px-4 py-2 fw-semibold w-100">
                            <i class="bi bi-trash3 me-2"></i>Hapus Data
                        </button>
                    </form>

                    <div class="d-flex flex-column flex-md-row gap-2 w-100 w-md-auto">
                        <button type="button" class="btn btn-secondary rounded-3 px-4 py-2 fw-semibold" data-bs-dismiss="modal">Tutup</button>
                        
                        {{-- Tombol WhatsApp (HANYA MUNCUL JIKA STATUS BERHASIL) --}}
                        @if(in_array($trx->transaction_status, ['settlement', 'capture', 'success']))
                            @if($trx->phone)
                                @php
                                    $waNumber = preg_replace('/^0/', '62', $trx->phone);
                                    $waMsg = "Halo kak *" . ($trx->user->name ?? 'Pelanggan') . "*, kami dari admin *Jayra Construction*.\n\nTerima kasih, pembayaran untuk pesanan *" . $trx->service_name . "* sebesar *Rp " . number_format($trx->gross_amount, 0, ',', '.') . "* (Invoice: " . $trx->order_id . ") telah kami terima.\n\nKami akan segera memproses pesanan Anda dan menjadwalkan tim menuju lokasi. Ada informasi tambahan terkait rute proyek?";
                                @endphp
                                <a href="https://wa.me/{{ $waNumber }}?text={{ urlencode($waMsg) }}" target="_blank" class="btn btn-success rounded-3 px-4 py-2 fw-semibold shadow-sm d-flex justify-content-center align-items-center gap-2">
                                    <i class="bi bi-whatsapp"></i> Hubungi Pelanggan
                                </a>
                            @else
                                <button class="btn btn-success rounded-3 px-4 py-2 fw-semibold disabled d-flex justify-content-center align-items-center gap-2" title="Pelanggan tidak menyertakan Nomor HP">
                                    <i class="bi bi-whatsapp"></i> No HP Tidak Tersedia
                                </button>
                            @endif
                        @endif
                        {{-- Jika masih Pending/Gagal, tombol WA disembunyikan sama sekali --}}
                    </div>
                </div>

            </div>
        </div>
    </div>
    @endforeach

</div>
@endsection