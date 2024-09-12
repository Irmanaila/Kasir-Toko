<p>No Penjualan: {{ $penjualan->id_penjualan }}</p>
<p>Tanggal Transaksi: {{ $penjualan->tanggal_transaksi }}</p>
<p>Total Transaksi: Rp {{ number_format($penjualan->total_transaksi, 0, ',', '.') }}</p>

<h6 class="mt-4">Detail Barang</h6>
<div class="table-responsive">
    <table class="table table-bordered" id="modalDetailTable">
        <thead>
            <tr>
                <th>No</th>
                <th>Nama Item</th>
                <th>Jumlah</th>
                <th>Harga Satuan</th>
                <th>Subtotal</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($penjualan->detailPenjualan as $index => $detail)
                <tr>
                    <td>{{ $index + 1 }}</td>
                    <td>{{ $detail->barang->nama_barang}}</td>
                    <td>{{ $detail->kuantitas }}</td>
                    <td>Rp {{ number_format($detail->harga_jual, 0, ',', '.') }}</td>
                    <td>Rp {{ number_format($detail->kuantitas * $detail->harga_jual, 0, ',', '.') }}</td>
                </tr>
            @endforeach
        </tbody>
        <tfoot>
            <tr>
                <td colspan="4" class="text-end"><strong>Total:</strong></td>
                <td><strong>Rp {{ number_format($penjualan->total_transaksi, 0, ',', '.') }}</strong></td>
            </tr>
            <tr>
                <td colspan="4" class="text-end"><strong>Uang Diterima:</strong></td>
                <td><strong>Rp {{ number_format($penjualan->uang_diterima, 0, ',', '.') }}</strong></td>
            </tr>
            <tr>
                <td colspan="4" class="text-end"><strong>Kembalian:</strong></td>
                <td><strong>Rp {{ number_format($penjualan->kembalian, 0, ',', '.') }}</strong></td>
            </tr>
        </tfoot>
    </table>
</div>