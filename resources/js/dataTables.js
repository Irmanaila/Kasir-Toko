$(function () {
    var table = $("#table-barang").DataTable({
        language: {
            paginate: {
                previous: "<",
                next: ">",
            },
            info: "Menampilkan _START_ sampai _END_ dari _TOTAL_ entri",
            lengthMenu: "_MENU_ entri",
            zeroRecords: "Tidak ada data yang cocok ditemukan",
        },
        dom: "Brtip",
        buttons: [
            {
                extend: 'csv',
                split: ["excel", "pdf", "print"]
            }
        ]
    });

    // Tangani input search custom
    $("#cariBarang").on("keyup", function () {
        table.search(this.value).draw();
    });
});