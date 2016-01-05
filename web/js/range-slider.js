$(document).ready(function() {
    /*$("#range").ionRangeSlider({
        type: "double",
        min: 1,
        max: 25,
        from: 2,
        to: 6,
        grid: true
    });*/

    $("#range").ionRangeSlider({
        type: "double",
        min: +moment().format("X"),
        max: +moment().add(24, "hours").format("X"),
        grid: true,
        force_edges: true,
        prettify: function (num) {
            var m = moment(num, "X").locale("ru");
            return m.format("Do MMMM, HH:mm");
        }
    });

    $('input').iCheck({
        checkboxClass: 'icheckbox_flat-red',
        radioClass: 'iradio_flat-red'
    });
});
