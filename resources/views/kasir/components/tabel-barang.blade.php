<div class="card">
    <div class="card-header d-flex align-items-center">
        <h4 class="flex-grow-1 m-0">Data Barang</h4>
        <div class="ms-md-auto pe-md-3 mb-2 d-flex align-items-center">
            <div class="input-group">
                <span class="input-group-text text-body"><i class="fas fa-search" aria-hidden="true"></i></span>
                <input type="text" class="form-control" id="cariBarang" placeholder="Cari..." />
            </div>
            <button type="button" class="btn btn-primary ms-2 d-flex align-items-center" data-bs-toggle="modal"
                data-bs-target="#tambahBarang">
                <i class="bi bi-plus-lg me-1"></i>Tambah
            </button>
            <!-- Modal Tambah Barang-->
            @include('kasir.components.modal-tambah-barang')
        </div>
    </div>


    <div class="table-responsive text-nowrap">
        <table class="table" id="table-barang">
            <thead>
                <tr>
                    <th class="text-center">No</th>
                    <th>Kode Barang</th>
                    <th>Nama Barang</th>
                    <th>Stok</th>
                    <th>Harga Modal</th>
                    <th>Harga Jual</th>
                    <th class="text-center">
                        Foto</th>
                    <th class="text-center">Aksi</th>
                </tr>
            </thead>
            <tbody class="table-border-bottom-0">
                @foreach ($barang as $barang)
                    <tr>
                        <td class="text-center"> {{ $loop->iteration }}</td>
                        <td>{{ $barang->kode_barang }}</td>
                        <td>{{ $barang->nama_barang }}</td>
                        <td>{{ $barang->stok }}</td>
                        <td>Rp {{ number_format($barang->harga_modal, 0, ',', '.') }}</td>
                        <td>Rp {{ number_format($barang->harga_jual, 0, ',', '.') }}</td>
                        <td class="text-center" data-bs-toggle="modal"
                            data-bs-target="#modalFoto{{ $barang->id_barang }}"><i class="bi bi-image"></i>
                        </td>

                        <!-- Modal Foto -->
                        @include('kasir.components.modal-foto')
                        <td class="text-center">
                            <div class="d-flex justify-content-center align-items-center">
                                <i class="bi bi-pen me-3 text-primary cursor-pointer" data-bs-toggle="modal"
                                    data-bs-target="#editBarang{{ $barang->id_barang }}"></i>

                                <form action="{{ route('barang.hapus', $barang->id_barang) }}" method="post">
                                    @csrf
                                    @method('DELETE')
                                    <a href="#"
                                        onclick="event.preventDefault(); if(confirm('Apakah Anda yakin ingin menghapus barang ini?')) { this.closest('form').submit(); }"
                                        class="text-danger font-weight-bold text-xs me-2"><i
                                            class="bi bi-trash"></i></a>
                                </form>
                            </div>
                        </td>

                        <!-- Modal Edit Barang -->
                        @include('kasir.components.modal-edit-barang')

                    </tr>
                @endforeach

            </tbody>
        </table>
    </div>
</div>
