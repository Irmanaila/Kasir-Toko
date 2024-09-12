$(function () {
    var table = $('#table-barang').DataTable({
        "columnDefs": [
            {
                "targets": [4, 5],  // Sesuaikan dengan indeks kolom harga_modal dan harga_jual
                "type": "num"      // Pastikan kolom dianggap sebagai tipe angka
            }
        ],
        language: {
            paginate: {
                previous: "<",
                next: ">",
            },
            info: "Menampilkan _START_ sampai _END_ dari _TOTAL_ entri",
            lengthMenu: "_MENU_ entri",
            zeroRecords: "Tidak ada data ",
        },
        dom: "Brtip",

    });

    // Tangani input search custom
    $("#cariBarang").on("keyup", function () {
        table.search(this.value).draw();
    });
});

$(function () {
    var table = $('#tabel-pilih-barang').DataTable({
        "columnDefs": [
            {
                "targets": [4],  // Sesuaikan dengan indeks kolom harga_modal dan harga_jual
                "type": "num"      // Pastikan kolom dianggap sebagai tipe angka
            }
        ],
        language: {
            paginate: {
                previous: "<",
                next: ">",
            },
            info: "Menampilkan _START_ sampai _END_ dari _TOTAL_ entri",
            lengthMenu: "_MENU_ entri",
            zeroRecords: "Tidak ada data ",
        },
        dom: "Brtip",

    });

    // Tangani input search custom
    $("#cariBarang").on("keyup", function () {
        table.search(this.value).draw();
    });
});
    
$(function () {
    var table = $('#table-data-transaksi').DataTable({
        "columnDefs": [
            {
                "targets": [3],  // Sesuaikan dengan indeks kolom Total Transaksi
                "type": "num"    // Pastikan kolom dianggap sebagai tipe angka
            }
        ],
        language: {
            paginate: {
                previous: "<",
                next: ">",
            },
            info: "Menampilkan _START_ sampai _END_ dari _TOTAL_ entri",
            lengthMenu: "_MENU_ entri",
            zeroRecords: "Tidak ada data",
        },
        dom: "Brtip", // Hapus elemen "l" untuk menyesuaikan tampilan (menghilangkan dropdown panjang data)

    });

    // Tangani input search custom
    $("#cariBarang").on("keyup", function () {
        table.search(this.value).draw();
    });
});


$(function() {
    $('#item-select').select2({
        placeholder: "Pilih barang...",
        allowClear: true
    });
});
