<div class="table-responsive">
    <table class="table table-hover align-middle mb-0 bg-body">
        <thead class="table-light">
            <tr>
                <th class="ps-4">Order ID & Waktu</th>
                <th>Pelanggan</th>
                <th>Layanan Dipesan</th>
                <th>Nominal Tagihan</th>
                <th>Status</th>
                <th class="text-end pe-4">Aksi</th>
            </tr>
        </thead>
        <tbody>
            @forelse($dataTrx as $trx)
                <tr>
                    <td class="ps-4">
                        <span class="fw-bold text-body d-block">{{ $trx->order_id }}</span>
                        <small class="text-secondary">{{ $trx->created_at->format('d M Y, H:i') }}</small>
                    </td>
                    <td>
                        <div class="fw-bold text-primary">{{ $trx->user->name ?? 'User Terhapus' }}</div>
                        <small class="text-secondary"><i class="bi bi-telephone me-1"></i>{{ $trx->phone ?? 'Tidak ada No. HP' }}</small>
                    </td>
                    <td>
                        <span class="d-block fw-semibold text-body">{{ $trx->service_name }}</span>
                    </td>
                    <td class="fw-bold text-body">
                        Rp {{ number_format($trx->gross_amount, 0, ',', '.') }}
                    </td>
                    <td>
                        @if(in_array($trx->transaction_status, ['settlement', 'capture', 'success']))
                            <span class="badge bg-success-subtle text-success border border-success-subtle px-2 py-1">BERHASIL</span>
                        @elseif($trx->transaction_status == 'pending')
                            <span class="badge bg-warning-subtle text-warning-emphasis border border-warning-subtle px-2 py-1">PENDING</span>
                        @else
                            <span class="badge bg-danger-subtle text-danger border border-danger-subtle px-2 py-1 text-uppercase">{{ $trx->transaction_status }}</span>
                        @endif
                    </td>
                    <td class="text-end pe-4">
                        <button type="button" class="btn btn-sm btn-primary rounded-3 shadow-sm px-3" data-bs-toggle="modal" data-bs-target="#detailModal-{{ $trx->id }}">
                            <i class="bi bi-eye me-1"></i> Detail
                        </button>
                    </td>
                </tr>
            @empty
                <tr>
                    <td colspan="6" class="text-center py-5 text-secondary">
                        <i class="bi bi-inbox fs-1 d-block mb-3 text-secondary opacity-50"></i>
                        <h5>Belum Ada Transaksi</h5>
                        <p>Data pada kategori ini masih kosong.</p>
                    </td>
                </tr>
            @endforelse
        </tbody>
    </table>
</div>