<div class="card">
    <div class="card-header d-flex align-items-center">
        <h4 class="flex-grow-1 m-0">Data Transaksi</h4>
        <div class="ms-md-auto pe-md-3 mb-2 d-flex align-items-center">
            <div class="input-group">
                <span class="input-group-text text-body"><i class="fas fa-search" aria-hidden="true"></i></span>
                <input type="text" class="form-control" id="cariBarang" placeholder="Cari..." />
            </div>
        </div>
    </div>

    <div class="table-responsive text-nowrap">
        <table class="table" id="table-barang">
            <thead>
                <tr>
                    <th>No</th>
                    <th>Tanggal Transaksi</th>
                    <th>No Penjualan</th>
                    <th>Total Transaksi</th>
                    <th class="text-center">Aksi</th>
                </tr>
            </thead>
            <tbody class="table-border-bottom-0">
                @foreach ($penjualan as $penjualan)
                    <tr>
                        <td class="text-center">{{ $loop->iteration }}</td>
                        <td>{{ $penjualan->tanggal_transaksi }}</td>
                        <td>{{ $penjualan->id_penjualan }}</td>
                        <td>Rp {{ number_format($penjualan->total_transaksi, 0, ',', '.') }}</td>
                        <td class="text-center">
                            <button class="btn btn-primary rounded-pill btn-sm p-2 px-3 align-items-center detail-btn"
                                type="button" data-bs-toggle="modal" data-bs-target="#detailTransaksi"
                                data-id="{{ $penjualan->id_penjualan }}">
                                <i class="bi bi-bag-fill me-1"></i>
                                <span>Detail</span>
                            </button>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>

<div class="modal fade" id="detailTransaksi" tabindex="-1" aria-labelledby="detailTransaksiLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg modal-dialog-scrollable">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="detailTransaksiLabel">Detail Transaksi<span id="modalTransactionId"></span>
                </h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <hr>
            <div class="modal-body">
                <div id="modalContent">

                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Tutup</button>
            </div>
        </div>
    </div>
</div>  