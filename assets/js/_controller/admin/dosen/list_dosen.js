/**
 * Created by phi314 on 8/29/16.
 */

$('.btn-delete-dosen').click(function(e){
    e.preventDefault();
    var c = confirm("Hapus dosen ini?")
    if(c == true){
        window.location = $(this).attr('href');
    }
});