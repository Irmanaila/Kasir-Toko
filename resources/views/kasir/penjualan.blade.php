@extends('layouts.kasir')
@section('content')

    <body>
        <!-- Layout wrapper -->
        <div class="layout-wrapper layout-content-navbar">
            <div class="layout-container">
                <!-- Menu -->

                @include('kasir.components.aside')
                <!-- / Menu -->

                <!-- Layout container -->
                <div class="layout-page">
                    <!-- Navbar -->

                    @include('kasir.components.navbar')

                    <!-- / Navbar -->

                    <!-- Content wrapper -->
                    <div class="content-wrapper">
                        <!-- Content -->
                        <div class="container mt-5">
                            @if (session('error'))
                                <div class="alert alert-danger">
                                    {{ session('error') }}
                                </div>
                            @endif

                            @if (session('success'))
                                <div class="alert alert-success">
                                    {{ session('success') }}
                                </div>
                            @endif
                            <div class="row">
                                <div class="col-md-4 mb-md-0">
                                    <div class="card mb-4 mb-md-0">
                                        <div class="pb-0 px-3 d-flex col-12">
                                            <h6 class="mb-0 mt-3">Pilih Barang</h6>
                                            <div class="ms-md-auto pe-md-3 mb-2 mt-2 align-items-center">
                                            </div>
                                        </div>
                                        <div class="card-body scroll-card">
                                            <form id="pilih-barang" action="{{ route('penjualan.pilih-barang') }}"
                                                method="post">
                                                @csrf
                                                <div class="input-group mb-2">
                                                    <input type="text" class="form-control" placeholder="Kode Barang"
                                                        name="kode_barang" required />
                                                    <button class="btn btn-outline-primary btn-sm" type="button"
                                                        data-bs-toggle="modal" data-bs-target="#pilihBarang"><i
                                                            class="fas fa-search" aria-hidden="true"></i></button>
                                                    <button class="btn btn-outline-primary" type="submit">Pilih</button>
                                                </div>
                                            </form>
                                            <div class="modal fade" id="pilihBarang" tabindex="-1" aria-hidden="true">
                                                <div class="modal-dialog modal-lg modal-dialog-scrollable" role="document">
                                                    <div class="modal-content">
                                                        <div class="modal-header">
                                                            <h5 class="modal-title" id="exampleModalLabel1">Pilih Barang
                                                            </h5>
                                                            <button type="button" class="btn-close" data-bs-dismiss="modal"
                                                                aria-label="Close"></button>
                                                        </div>
                                                        <div class="modal-body">
                                                            <div id="modalContent">

                                                            </div>
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
                                            <div class="col-md-12">
                                                <label for="defaultFormControlInput" class="form-label">Nama</label>
                                                @if ($barangTerpilih)
                                                    <div class="form-control mb-2 border-success"
                                                        id="defaultFormControlInput">
                                                        {{ $barangTerpilih->nama_barang }}
                                                    </div>
                                                @else
                                                    <div class="form-control mb-2 border-danger"
                                                        id="defaultFormControlInput">
                                                        <p class="mb-0">Barang Tidak Tersedia</p>
                                                    </div>
                                                @endif
                                            </div>

                                            <div class="col-md-12">
                                                <label for="defaultFormControlInput" class="form-label">Harga Satuan</label>
                                                @if ($barangTerpilih)
                                                    <div class="form-control mb-2 border-success"
                                                        id="defaultFormControlInput">
                                                        {{ $barangTerpilih->harga_jual }}
                                                    </div>
                                                @else
                                                    <div class="form-control mb-2 border-danger"
                                                        id="defaultFormControlInput">
                                                        <p class="mb-0">Barang Tidak Tersedia</p>
                                                    </div>
                                                @endif
                                            </div>

                                            <form action="{{ route('penjualan.tambah-barang') }}" method="post">
                                                @csrf
                                                <div class="col-md-12 mb-2">
                                                    <label for="quantity" class="form-label">Jumlah</label>
                                                    <input type="number" name="kuantitas" class="form-control"
                                                        min="1" value="1" required>
                                                </div>
                                                <button type="submit" class="btn btn-primary d-flex ms-auto">
                                                    Tambah
                                                </button>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-8 ">
                                    <div class="card h-100 d-flex flex-column">
                                        @if (session('keranjang'))
                                            <div class="card-header d-flex align-items-center">
                                                <h5 class="flex-grow-1 m-0">Transaksi</h5>
                                            </div>
                                            <div class="table-responsive text-nowrap">
                                                <table class="table">
                                                    <thead>
                                                        <tr>
                                                            <th class="text-center">Foto</th>
                                                            <th>Barang</th>
                                                            <th class="text-center">Kuantitas</th>
                                                            <th>Harga Jual</th>
                                                            <th>Total</th>
                                                            <th class="text-center">Aksi</th>
                                                        </tr>
                                                    </thead>
                                                    <tbody class="table-border-bottom-0">
                                                        @foreach ($keranjang as $barang)
                                                            <tr>
                                                                <td class="text-center">
                                                                    <img src="{{ asset('foto_barang/' . $barang['foto']) }}"
                                                                        alt="Foto Barang" class="img-fluid">
                                                                </td>
                                                                <td>{{ $barang['nama_barang'] }}</td>
                                                                <td class="text-center">{{ $barang['kuantitas'] }}</td>
                                                                <td>Rp
                                                                    {{ number_format($barang['harga_jual'], 0, ',', '.') }}.-
                                                                </td>
                                                                <td>Rp
                                                                    {{ number_format($barang['total_item'], 0, ',', '.') }}.-
                                                                </td>
                                                                <td>
                                                                    <form action="{{ route('penjualan.hapus-barang') }}"
                                                                        method="POST" style="display:inline;">
                                                                        @csrf
                                                                        <input type="hidden" name="barang_id"
                                                                            value="{{ $barang['barang_id'] }}">
                                                                        <button class="btn btn-light p-0 px-1 text-danger"
                                                                            type="submit">
                                                                            <i class="bi bi-x-square-fill"></i>
                                                                        </button>
                                                                    </form>
                                                                </td>
                                                            </tr>
                                                        @endforeach
                                                    </tbody>
                                                </table>
                                            </div>
                                            <hr>
                                            <div class="ms-auto me-4 mb-4">
                                                <form action="{{ route('penjualan.transaksi') }}" method="post">
                                                    @csrf
                                                    <div class="d-flex justify-content-end mt-3 me-4">
                                                        <h6>Total Keseluruhan: Rp
                                                            {{ number_format($totalKeseluruhan, 0, ',', '.') }}.-</h6>
                                                    </div>
                                                    <input type="hidden" name="total_transaksi"
                                                        value="{{ $totalKeseluruhan }}">
                                                    <h6 class="text-end me-4">Kembalian : <span id="kembalian">0</span>
                                                    </h6>
                                                    <input type="hidden" id="hiddenKembalian" name="kembalian" />
                                                    <input id="bayar" class="form-control mb-2" type="text"
                                                        placeholder="Pembayaran" name="uang_diterima" required />
                                                    <div id="warning" class="text-danger mt-2" style="display: none;">
                                                        Uang
                                                        kurang dari total pembayaran.</div>
                                                    <button type="submit"
                                                        class="btn btn-primary d-flex ms-auto">Selesai</button>
                                                </form>
                                            </div>
                                        @else
                                            <div class="card flex-grow-1 d-flex flex-column">
                                                <div class="card-header d-flex align-items-center">
                                                    <h5 class="flex-grow-1 m-0">Transaksi</h5>
                                                </div>
                                                <div
                                                    class="card-body text-center d-flex justify-content-center align-items-center flex-column">
                                                    <i class="bi bi-bag-x-fill" style="font-size: 5rem;"></i>
                                                    <h4 class="text-center">Tidak ada transaksi, tambahkan barang!</h4>
                                                </div>
                                            </div>
                                        @endif
                                    </div>
                                </div>
                            </div>
                        </div>
                        <script>
                            document.addEventListener('DOMContentLoaded', function() {
                                const totalKeseluruhan = {{ $totalKeseluruhan }};
                                const bayarInput = document.getElementById('bayar');
                                const kembalianElement = document.getElementById('kembalian');
                                const warningElement = document.getElementById('warning');
                                const hiddenKembalian = document.getElementById('hiddenKembalian');
                                const form = document.querySelector('form[action="{{ route('penjualan.transaksi') }}"]');

                                bayarInput.addEventListener('input', function() {
                                    const bayar = parseFloat(bayarInput.value.replace(/\./g, '').replace(',', '.')) || 0;
                                    const kembalian = bayar - totalKeseluruhan;

                                    if (bayar < totalKeseluruhan) {
                                        warningElement.style.display = 'block';
                                    } else {
                                        warningElement.style.display = 'none';
                                    }

                                    kembalianElement.textContent = kembalian >= 0 ?
                                        new Intl.NumberFormat('id-ID', {
                                            style: 'currency',
                                            currency: 'IDR'
                                        }).format(kembalian) :
                                        '0';

                                    hiddenKembalian.value = kembalian;
                                });

                                form.addEventListener('submit', function(event) {
                                    const bayar = parseFloat(bayarInput.value.replace(/\./g, '').replace(',', '.')) || 0;
                                    if (bayar < totalKeseluruhan) {
                                        event.preventDefault();
                                        warningElement.textContent = 'Uang yang dibayarkan tidak cukup!';
                                        warningElement.style.display = 'block';
                                    }
                                });
                            });
                        </script>

                        <!-- / Content -->

                        <div class="content-backdrop fade"></div>
                    </div>
                    <!-- Content wrapper -->
                </div>
                <!-- / Layout page -->
            </div>

            <!-- Overlay -->
            <div class="layout-overlay layout-menu-toggle"></div>
        </div>
        <!-- / Layout wrapper -->
    </body>
@endsection
