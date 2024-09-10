<div class="card">
    <div class="card-header d-flex align-items-center">
        <h4 class="flex-grow-1 m-0">Data Barang</h4>
        <div class="ms-md-auto pe-md-3 mb-2 d-flex align-items-center">
            <div class="input-group">
                <span class="input-group-text text-body"><i class="fas fa-search"
                        aria-hidden="true"></i></span>
                <input type="text" class="form-control" id="cariBarang"
                    placeholder="Cari..." />
            </div>
            <button type="button" class="btn btn-primary ms-2 d-flex align-items-center"
                data-bs-toggle="modal" data-bs-target="#tambahBarang">
                <i class="bi bi-plus-lg me-1"></i>Tambah
            </button>
            <!-- Modal -->
            <div class="modal fade" id="tambahBarang" tabindex="-1" aria-hidden="true">
                <div class="modal-dialog" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalLabel1">Tambah Barang</h5>
                            <button type="button" class="btn-close" data-bs-dismiss="modal"
                                aria-label="Close"></button>
                        </div>
                        <div class="modal-body">
                            <form method="POST" action="{{ route('barang.tambah') }}"
                                enctype="multipart/form-data">
                                @csrf
                                <div class="row">
                                    <div class="col mb-3">
                                        <div class="form-floating">
                                            <input type="text" name="kode_barang"
                                                class="form-control"
                                                placeholder="Contoh: BRG123" />
                                            <label for="floatingInput">Kode Barang</label>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col mb-3">
                                        <div class="form-floating">
                                            <input type="text" class="form-control"
                                                name="nama_barang" placeholder="Masukan Nama" />
                                            <label for="floatingInput">Nama Barang</label>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col mb-3">
                                        <div class="form-floating">
                                            <input type="text" class="form-control"
                                                name="stok" placeholder="Masukan Stok" />
                                            <label for="floatingInput">Stok Barang</label>
                                        </div>
                                    </div>
                                </div>

                                <div class="row g-2 mb-3">
                                    <div class="col mb-0">
                                        <div class="form-floating">
                                            <input type="text" class="form-control"
                                                name="harga_modal"
                                                placeholder="Masukan Harga" />
                                            <label for="floatingInput">Harga Modal</label>
                                        </div>
                                    </div>
                                    <div class="col mb-0">
                                        <div class="form-floating">
                                            <input type="text" class="form-control"
                                                name="harga_jual" placeholder="Masukan Harga" />
                                            <label for="floatingInput">Harga Jual</label>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col">
                                        <div class="mb-3">
                                            <label for="formFile" class="form-label">Masukan
                                                Foto</label>
                                            <input class="form-control" type="file"
                                                name="foto" />
                                        </div>
                                    </div>
                                </div>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-outline-secondary"
                                data-bs-dismiss="modal">
                                Close
                            </button>
                            <button type="submit" class="btn btn-primary">Simpan</button>
                        </div>
                        </form>
                    </div>
                </div>
            </div>
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
                        <td> {{ $barang->harga_modal }}</td>
                        <td>Rp {{ $barang->harga_jual }}</td>
                        <td class="text-center" data-bs-toggle="modal"
                            data-bs-target="#modalFoto{{ $barang->id_barang }}"><i
                                class="bi bi-image"></i></td>
                        <!-- Modal Foto -->
                        <div class="modal fade" id="modalFoto{{ $barang->id_barang }}"
                            tabindex="-1" aria-hidden="true">
                            <div class="modal-dialog" role="document">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title" id="exampleModalLabel1">
                                            Foto {{ $barang->foto }}</h5>
                                        <button type="button" class="btn-close"
                                            data-bs-dismiss="modal"
                                            aria-label="Close"></button>
                                    </div>
                                    <div class="modal-body">
                                        @if ($barang->foto)
                                            <img src="{{ asset('foto_barang/' . $barang->foto) }}"
                                                alt="Foto Barang" class="img-fluid">
                                        @else
                                            <p>Foto tidak tersedia.</p>
                                        @endif
                                    </div>

                                    <div class="modal-footer">
                                        <button type="button"
                                            class="btn btn-outline-secondary"
                                            data-bs-dismiss="modal">
                                            Tutup
                                        </button>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <td class="text-center">
                            <i class="bi bi-pen me-3 text-primary" data-bs-toggle="modal"
                                data-bs-target="#editBarang{{ $barang->id_barang }}">edit</i>
                            <form action="{{ route('barang.hapus', $barang->id_barang) }}"
                                method="post">
                                @csrf
                                @method('DELETE')
                                <a href="#"
                                    onclick="event.preventDefault(); if(confirm('Apakah Anda yakin ingin menghapus barang ini?')) { this.closest('form').submit(); }"
                                    class="text-danger font-weight-bold text-xs me-2"><i
                                        class="bi bi-trash"></i>Hapus</a>
                            </form>
                        </td>
                        <!-- Modal Edit Barang -->
                        <div class="modal fade" id="editBarang{{ $barang->id_barang }}"
                            tabindex="-1" aria-hidden="true">
                            <div class="modal-dialog" role="document">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title"
                                            id="exampleModalLabel1{{ $barang->id_barang }}">
                                            Edit Barang</h5>
                                        <button type="button" class="btn-close"
                                            data-bs-dismiss="modal"
                                            aria-label="Close"></button>
                                    </div>
                                    <div class="modal-body">
                                        <form method="POST"
                                            action="{{ route('barang.edit', $barang->id_barang) }}"
                                            enctype="multipart/form-data">
                                            @csrf
                                            <div class="row">
                                                <div class="col mb-3">
                                                    <div class="form-floating">
                                                        <input type="text"
                                                            name="updateKodeBarang"
                                                            class="form-control"
                                                            placeholder="Contoh: BRG123"
                                                            value="{{ $barang->kode_barang }}" />
                                                        <label for="floatingInput">Kode
                                                            Barang</label>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col mb-3">
                                                    <div class="form-floating">
                                                        <input type="text"
                                                            class="form-control"
                                                            name="updateNamaBarang"
                                                            placeholder="Masukan Nama"
                                                            value="{{ $barang->nama_barang }}" />
                                                        <label for="floatingInput">Nama
                                                            Barang</label>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col mb-3">
                                                    <div class="form-floating">
                                                        <input type="text"
                                                            class="form-control"
                                                            name="updateStok"
                                                            placeholder="Masukan Stok"
                                                            value="{{ $barang->stok }}" />
                                                        <label for="floatingInput">Stok
                                                            Barang</label>
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="row g-2 mb-3">
                                                <div class="col mb-0">
                                                    <div class="form-floating">
                                                        <input type="text"
                                                            class="form-control"
                                                            name="updateHargaModal"
                                                            placeholder="Masukan Harga"
                                                            value="{{ $barang->harga_modal }}" />
                                                        <label for="floatingInput">Harga
                                                            Modal</label>
                                                    </div>
                                                </div>
                                                <div class="col mb-0">
                                                    <div class="form-floating">
                                                        <input type="text"
                                                            class="form-control"
                                                            name="updateHargaJual"
                                                            placeholder="Masukan Harga"
                                                            value="{{ $barang->harga_jual }}" />
                                                        <label for="floatingInput">Harga
                                                            Jual</label>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col">
                                                    <div class="mb-3">
                                                        <label for="formFile"
                                                            class="form-label">Masukkan
                                                            Foto</label>
                                                        <input class="form-control"
                                                            type="file"
                                                            name="updateFoto" />

                                                        <!-- Tampilkan nama file foto sebelumnya -->
                                                        @if ($barang->foto)
                                                            <small class="text-muted">Foto saat
                                                                ini:
                                                                {{ $barang->foto }}</small>
                                                        @else
                                                            <small class="text-muted">Tidak ada
                                                                foto yang diunggah.</small>
                                                        @endif
                                                    </div>
                                                </div>
                                            </div>


                                    </div>
                                    <div class="modal-footer">
                                        <button type="button"
                                            class="btn btn-outline-secondary"
                                            data-bs-dismiss="modal">
                                            Close
                                        </button>
                                        <button type="submit"
                                            class="btn btn-primary">Simpan</button>
                                    </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </tr>
                @endforeach

            </tbody>
        </table>
    </div>
</div>