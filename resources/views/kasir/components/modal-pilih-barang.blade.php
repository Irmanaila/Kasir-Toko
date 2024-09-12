<div class="d-flex justify-content-end mb-2">
    <div class="input-group w-auto">
        <span class="input-group-text text-body">
            <i class="fas fa-search" aria-hidden="true"></i>
        </span>
        <input type="text" class="form-control" id="cariBarang" placeholder="Cari..."/>
    </div>
</div>
<div class="table-responsive ">
    <table class="table table-bordered" id="tabel-pilih-barang">
        <thead>
            <tr>
                <th>No</th>
                <th class="text-nowrap">Kode Barang</th>
                <th class="text-nowrap">Nama Barang</th>
                <th class="text-nowrap">Harga Jual</th>
                <th>Aksi</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($item as $barang)
            <tr>
                <td class="text-center">{{ $loop->iteration }}</td>
                <td>{{ $barang->kode_barang }}</td>
                <td>{{ $barang->nama_barang }}</td>
                <td>{{ $barang->harga_jual }}</td>
                <td class="text-center">
                    <form action="{{ route('penjualan.pilih-barang') }}" method="POST">
                        @csrf
                        <input type="hidden" name="kode_barang" value="{{ $barang->kode_barang }}">
                        <button class="btn btn-primary btn-sm text-nowrap align-items-center gap-1 rounded-pill" type="submit">
                            <i class="bi bi-plus-circle-fill"></i>
                            <span>tambah</span>
                        </button>
                    </form>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>