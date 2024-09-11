<div class="modal fade" id="tambahBarang" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel1">Tambah Barang</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal"
                    aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form method="POST" action="{{ route('barang.tambah') }}" enctype="multipart/form-data">
                    @csrf
                    <div class="row">
                        <div class="col mb-3">
                            <div class="form-floating">
                                <input type="text" name="kode_barang"
                                    class="form-control @error('kode_barang') is-invalid @enderror"
                                    value="{{ old('kode_barang') }}" placeholder="Contoh: BRG123" required/>
                                <label for="floatingInput">Kode Barang</label>
                                @error('kode_barang')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col mb-3">
                            <div class="form-floating">
                                <input type="text" class="form-control" name="nama_barang"
                                    placeholder="Masukan Nama" required/>
                                <label for="floatingInput">Nama Barang</label>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col mb-3">
                            <div class="form-floating">
                                <input type="text" class="form-control" name="stok"
                                    placeholder="Masukan Stok" required/>
                                <label for="floatingInput">Stok Barang</label>
                            </div>
                        </div>
                    </div>

                    <div class="row g-2 mb-3">
                        <div class="col mb-0">
                            <div class="form-floating">
                                <input type="text" class="form-control" name="harga_modal"
                                    placeholder="Masukan Harga" required/>
                                <label for="floatingInput">Harga Modal</label>
                            </div>
                        </div>
                        <div class="col mb-0">
                            <div class="form-floating">
                                <input type="text" class="form-control" name="harga_jual"
                                    placeholder="Masukan Harga" required/>
                                <label for="floatingInput">Harga Jual</label>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col">
                            <div class="mb-3">
                                <label for="formFile" class="form-label">Masukan
                                    Foto</label>
                                <input class="form-control" type="file" name="foto" required/>
                            </div>
                        </div>
                    </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-outline-secondary" data-bs-dismiss="modal">
                    Close
                </button>
                <button type="submit" class="btn btn-primary">Simpan</button>
            </div>
            </form>
        </div>
    </div>
</div>
@if ($errors->any())
    <script>
        var myModal = new bootstrap.Modal(document.getElementById('tambahBarang'));
        myModal.show();
    </script>
@endif