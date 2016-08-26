/**
 * Created by phi314 on 8/25/16.
 */

var $kode_rfid = $('#kode-rfid');

$kode_rfid.focus();

$('#create-rfid').submit(function(){
    var c = confirm("Tambah RFID?");
    return c;
});
