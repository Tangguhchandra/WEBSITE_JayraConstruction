  @extends('layouts.admin')

@section('title', 'Laporan Pembayaran')

@section('content')              
                    
                <div class="container-fluid p-4 p-lg-5">
                    
                    <!-- Page Header -->
                    <div class="d-flex justify-content-between align-items-center mb-4">
                        <div>
                            <h1 class="h3 mb-0">Laporan Pembayaran</h1>
                            <p class="text-muted mb-0">Pantau semua transaksi masuk dan status pembayaran termin proyek.</p>
                        </div>
                        <div class="d-flex gap-2">
                            <button type="button" class="btn btn-outline-secondary">
                                <i class="bi bi-download me-2"></i>Download PDF
                            </button>
                        </div>
                    </div>

                    <!-- Payment Stats Section -->
                    <div class="row g-4 mb-5">
                        <div class="col-md-3">
                            <div class="card border-0 shadow-sm p-4 border-start border-success border-4">
                                <small class="text-muted d-block">Total Pendapatan</small>
                                <h3 class="mb-0 fw-bold text-success">Rp 1.250.000.000</h3>
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="card border-0 shadow-sm p-4 border-start border-warning border-4">
                                <small class="text-muted d-block">Pembayaran Menunggu (Pending)</small>
                                <h3 class="mb-0 fw-bold text-warning">15 Transaksi</h3>
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="card border-0 shadow-sm p-4 border-start border-primary border-4">
                                <small class="text-muted d-block">Transaksi Berhasil</small>
                                <h3 class="mb-0 fw-bold text-primary">42 Berhasil</h3>
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="card border-0 shadow-sm p-4 border-start border-danger border-4">
                                <small class="text-muted d-block">Gagal/Expired</small>
                                <h3 class="mb-0 fw-bold text-danger">3 Gagal</h3>
                            </div>
                        </div>
                    </div>

                    <!-- Recent Transactions Table (Monitoring Midtrans) -->
                    <div x-data="{ 
                        payments: [
                            { id: 'TRX-9921', project: 'Pembangunan Ruko A', type: 'Termin 1 (DP)', amount: 'Rp 25.000.000', method: 'QRIS', date: '24 Feb, 09:00', status: 'Success' },
                            { id: 'TRX-9922', project: 'Renovasi Rumah B', type: 'Termin 2', amount: 'Rp 15.000.000', method: 'Virtual Account', date: '23 Feb, 14:20', status: 'Pending' },
                            { id: 'TRX-9923', project: 'Interior Kafe C', type: 'Pelunasan', amount: 'Rp 10.000.000', method: 'GoPay', date: '22 Feb, 11:15', status: 'Expired' }
                        ] 
                    }" class="card border-0 shadow-sm overflow-hidden">
                        <div class="card-header  py-3 border-bottom d-flex justify-content-between align-items-center">
                            <h5 class="mb-0">Riwayat Transaksi Terakhir (Midtrans)</h5>
                            <div class="d-flex gap-2">
                                <select class="form-select form-select-sm" style="width: 150px;">
                                    <option>Semua Status</option>
                                    <option>Success</option>
                                    <option>Pending</option>
                                    <option>Expired</option>
                                </select>
                            </div>
                        </div>
                        <div class="card-body p-0">
                            <div class="table-responsive">
                                <table class="table table-hover align-middle mb-0">
                                    <thead class="table-light">
                                        <tr>
                                            <th class="ps-4">Order ID</th>
                                            <th>Proyek & Keterangan</th>
                                            <th>Nominal</th>
                                            <th>Metode Bayar</th>
                                            <th>Waktu Transaksi</th>
                                            <th>Status</th>
                                            <th class="text-end pe-4">Aksi</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <template x-for="item in payments" :key="item.id">
                                            <tr>
                                                <td class="ps-4 fw-bold" x-text="item.id"></td>
                                                <td>
                                                    <div class="fw-bold" x-text="item.project"></div>
                                                    <small class="text-muted" x-text="item.type"></small>
                                                </td>
                                                <td class="fw-bold" x-text="item.amount"></td>
                                                <td>
                                                    <span class="badge bg-light text-dark border"><i class="bi bi-credit-card me-1"></i> <span x-text="item.method"></span></span>
                                                </td>
                                                <td x-text="item.date"></td>
                                                <td>
                                                    <span class="badge" 
                                                        :class="item.status === 'Success' ? 'bg-success' : (item.status === 'Pending' ? 'bg-warning text-dark' : 'bg-danger')" 
                                                        x-text="item.status"></span>
                                                </td>
                                                <td class="text-end pe-4">
                                                    <button class="btn btn-sm btn-outline-primary" title="Detail Transaksi"><i class="bi bi-eye"></i></button>
                                                </td>
                                            </tr>
                                        </template>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>

@endsection