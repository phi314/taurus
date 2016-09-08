/**
 * Created by phi314 on 8/29/16.
 */

$('.btn-delete-absensi').click(function(e){
    e.preventDefault();
    var c = confirm("Hapus absensi ini?")
    if(c == true){
        window.location = $(this).attr('href');
    }
});