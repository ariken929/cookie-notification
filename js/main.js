$(document).ready(function () {
    $("#cookie-notification .accept").click(function (e) {
        e.preventDefault();
        var notice = $('#cookie-notification');
        var url = notice.data('accept');

        $.get(url, function (data) {
            notice.hide();
        });
    });
});