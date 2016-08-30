/**
 * Created by phi314 on 8/30/16.
 */

var $kode_rfid_form = $('#kode-rfid-form');
var $kode_rfid_input = $('#kode-rfid-input');
var $absensi = $('.messages');

$kode_rfid_input.focus();

$kode_rfid_form.on('submit', function(e){
    e.preventDefault();
    var kode_rfid = $kode_rfid_input.val();
    var template_detail_absensi = '<div class="item">' +
    '<div class="text">' +
        '<div class="heading"' +
            '<a href="#">'+ kode_rfid +'</a>' +
            '<span class="date">08:33</span>' +
        '</div>' +
    'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Sed facilisis suscipit eros vitae iaculis.' +
    '</div>';

    $absensi.prepend(template_detail_absensi);

    // add animation
    $(".messages .item").each(function(index){
        var elm = $(this);
        setInterval(function(){
            elm.addClass("item-visible");
        },index*300);
    });

    $kode_rfid_input.val('');
    $kode_rfid_input.focus();
});