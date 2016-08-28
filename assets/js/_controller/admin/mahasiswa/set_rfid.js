/**
 * Created by phi314 on 8/25/16.
 */

var $kode_rfid = $('#kode-rfid');

$kode_rfid.focus();

$('#add-rfid').submit(function(){
    var c = confirm("Daftarkan ke RFID?");
    return c;
});

$('#clear-kode-rfid').click(function(){
    $kode_rfid.val("");
    $kode_rfid.focus();
});
