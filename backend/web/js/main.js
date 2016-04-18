/**
 * Created by taufik on 18/04/16.
 */
$(function () {
   $('#tambahTransaksi').click(function () {
        $('#dialog-tambah').modal('show').find('#modal-content').load($(this).attr('value'));
   });
})