/**
 * Created by phi314 on 8/30/16.
 */

var $kode_rfid_form = $('#kode-rfid-form');
var $kode_rfid = $('#kode-rfid-input');
var $absensi = $('.messages');
var $absensi_id = $('#absensi-id');
var $ip_address = $('#ip-address');

clear_input();

$('body').on('click', function(){
    clear_input()
});

$kode_rfid_form.on('submit', function(e){
    e.preventDefault();

    // Go ajax ...
    $.ajax({
        url: site_url + 'absensi-machine/absensi',
        type: 'POST',
        data: {
            absensi_id: $absensi_id.val(),
            kode_rfid: $kode_rfid.val(),
            ip_address: $ip_address.val(),
            json: true
        },
        dataType: 'json',
        error: function(data){
            noty({
                text: "Error from Server",
                layout: 'topRight',
                type: 'error'
            }).setTimeout(3000);
        },
        success: function(data){
            noty({
                text: data.message,
                layout: 'topRight',
                type: data.type
            }).setTimeout(3000);

            if(data.status === true)
            {
                var template_detail_absensi = '<div class="item item-absensi-'+ data.absensi_mahasiswa_id +'">' +
                    '<div class="text">' +
                    '<div class="heading">' +
                    '<a href="#">('+ data.mahasiswa.nim +') '+ data.mahasiswa.user.name +'</a>' +
                    '<span class="date">Masuk: '+ data.time +' Keluar:</span>' +
                    '</div>' +
                    '</div>' +
                    '</div>';

                if(data.keluar === true)
                {
                    $('.item-absensi-' + data.absensi_mahasiswa_id).remove();
                    $absensi.prepend(template_detail_absensi);
                    $('.item-absensi-' + data.absensi_mahasiswa_id + ' .date').text("Masuk: "+ data.time + " - Keluar: " + data.waktu_keluar);
                    animate_prepend();
                }
                else
                {
                    $absensi.prepend(template_detail_absensi);
                    animate_prepend();
                }
            }
        },
        complete: function(data){
            clear_input();
        }
    });
});

function clear_input(){
    $kode_rfid.val('');
    $kode_rfid.focus();
}

function animate_prepend(){
    // add animation
    $(".messages .item").each(function(index){
        var elm = $(this);
        setInterval(function(){
            elm.addClass("item-visible");
        },index*300);
    });
}