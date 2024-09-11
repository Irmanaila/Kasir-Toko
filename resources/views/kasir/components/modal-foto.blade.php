<div class="modal fade" id="modalFoto{{ $barang->id_barang }}" tabindex="-1"
    aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel1">
                    Foto {{ $barang->foto }}</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal"
                    aria-label="Close"></button>
            </div>
            <div class="modal-body">
                @if ($barang->foto)
                    <img src="{{ asset('foto_barang/' . $barang->foto) }}" alt="Foto Barang"
                        class="img-fluid">
                @else
                    <p>Foto tidak tersedia.</p>
                @endif
            </div>

            <div class="modal-footer">
                <button type="button" class="btn btn-outline-secondary"
                    data-bs-dismiss="modal">
                    Tutup
                </button>
            </div>
        </div>
    </div>
</div>