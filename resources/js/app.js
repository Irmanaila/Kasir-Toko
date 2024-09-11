import './bootstrap';
import 'bootstrap';

$(function() {
    $('#detailTransaksi').on('show.bs.modal', function(event) {
        var button = $(event.relatedTarget);
        var id = button.data('id');
        var modal = $(this);

        $.ajax({
            url: '/detail-riwayat-penjualan/' + id,
            type: 'GET',
            success: function(response) {
                modal.find('.modal-body #modalContent').html(response);
            },
            error: function(xhr) {
                modal.find('.modal-body #modalContent').html(
                    'Terjadi kesalahan saat memuat data.');
            }
        });
    });
});
