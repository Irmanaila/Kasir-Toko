<div class="modal fade" id="editBarang{{ $barang->id_barang }}" tabindex="-1"
    aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel1{{ $barang->id_barang }}">
                    Edit Barang</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal"
                    aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form method="POST" action="{{ route('barang.edit', $barang->id_barang) }}"
                    enctype="multipart/form-data">
                    @csrf
                    <div class="row">
                        <div class="col mb-3">
                            <div class="form-floating">
                                <input type="text" name="updateKodeBarang"
                                    class="form-control" placeholder="Contoh: BRG123"
                                    value="{{ $barang->kode_barang }}" />
                                <label for="floatingInput">Kode
                                    Barang</label>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col mb-3">
                            <div class="form-floating">
                                <input type="text" class="form-control"
                                    name="updateNamaBarang" placeholder="Masukan Nama"
                                    value="{{ $barang->nama_barang }}" />
                                <label for="floatingInput">Nama
                                    Barang</label>
                            </div>
                        </div>
                    </div>
                    

                    <div class="row g-2 mb-3">
                        <div class="col mb-0">
                            <div class="form-floating">
                                <input type="text" class="form-control"
                                    name="updateHargaModal" placeholder="Masukan Harga"
                                    value="{{ $barang->harga_modal }}" />
                                <label for="floatingInput">Harga
                                    Modal</label>
                            </div>
                        </div>
                        <div class="col mb-0">
                            <div class="form-floating">
                                <input type="text" class="form-control"
                                    name="updateHargaJual" placeholder="Masukan Harga"
                                    value="{{ $barang->harga_jual }}" />
                                <label for="floatingInput">Harga
                                    Jual</label>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col">
                            <div class="mb-3">
                                <label for="formFile" class="form-label">Masukkan
                                    Foto</label>
                                <input class="form-control" type="file"
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
                <button type="button" class="btn btn-outline-secondary"
                    data-bs-dismiss="modal">
                    Tutup
                </button>
                <button type="submit" class="btn btn-primary">Simpan</button>
            </div>
            </form>
        </div>
    </div>
</div>