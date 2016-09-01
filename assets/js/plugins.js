// Avoid `console` errors in browsers that lack a console.
(function() {
    var method;
    var noop = function () {};
    var methods = [
        'assert', 'clear', 'count', 'debug', 'dir', 'dirxml', 'error',
        'exception', 'group', 'groupCollapsed', 'groupEnd', 'info', 'log',
        'markTimeline', 'profile', 'profileEnd', 'table', 'time', 'timeEnd',
        'timeline', 'timelineEnd', 'timeStamp', 'trace', 'warn'
    ];
    var length = methods.length;
    var console = (window.console = window.console || {});

    while (length--) {
        method = methods[length];

        // Only stub undefined methods.
        if (!console[method]) {
            console[method] = noop;
        }
    }
}());

// Place any jQuery/helper plugins in here.

/* My Custom Progressbar */
$.mpb = function(action,options){

    var settings = $.extend({
        state: '',
        value: [0,0],
        position: '',
        speed: 20,
        complete: null
    },options);

    if(action == 'show' || action == 'update'){

        if(action == 'show'){
            $(".mpb").remove();
            var mpb = '<div class="mpb '+settings.position+'">\n\
                               <div class="mpb-progress'+(settings.state != '' ? ' mpb-'+settings.state: '')+'" style="width:'+settings.value[0]+'%;"></div>\n\
                           </div>';
            $('body').append(mpb);
        }

        var i  = $.isArray(settings.value) ? settings.value[0] : $(".mpb .mpb-progress").width();
        var to = $.isArray(settings.value) ? settings.value[1] : settings.value;

        var timer = setInterval(function(){
            $(".mpb .mpb-progress").css('width',i+'%'); i++;

            if(i > to){
                clearInterval(timer);
                if($.isFunction(settings.complete)){
                    settings.complete.call(this);
                }
            }
        }, settings.speed);

    }

    if(action == 'destroy'){
        $(".mpb").remove();
    }

}
/* Eof My Custom Progressbar */

/* Moment */
var $server_time = $('#server-time').data('time');
moment.locale('id');

var clock = function(){
    if($('#clock').length > 0) {
        var time = moment().format('D MMMM YYYY, HH:mm:ss');
        $('#clock').html(time);
        setTimeout(clock, 1000);
    }
}

clock();

/* Eof Flipclock */


