$(document).ready(function () {
    $("#cookie-notification .accept-all").click(function (e) {
        e.preventDefault();
        var notification = $('#cookie-notification');
        var url = notification.data('accept');

        $.get(url, function (data) {
            notification.hide();
        });
    });

    $("#cookie-notification .accept-essential").click(function (e) {
        e.preventDefault();
        var notification = $('#cookie-notification');
        var url = notification.data('essential');

        $.get(url, function (data) {
            notification.hide();
        });
    });

    $("#cookie-notification .close").click(function (e) {
        e.preventDefault();
        var notification = $('#cookie-notification');
        var url = notification.data('essential');

        $.get(url, function (data) {
            notification.hide();
        });
    });

    $("#cookie-notification .options").click(function (e) {
        e.preventDefault();
        var notification = $('#cookie-notification'),
            notice = notification.find('.cookie-notice'),
            options = notification.find('.cookie-options');

        if (notification.hasClass('compact')) {
            notification.removeClass('compact');
            notice.fadeOut(500, function () {
                options.fadeIn(500);
            });
        }
        else {
            notification.addClass('compact');
            options.fadeOut(50, function () {
                notice.fadeIn(500);
            });
        }
    });

    $("#cookie-notification .cookie-type").click(function (e) {
        e.preventDefault();
        $('.cookie-type').removeClass('selected');
        $('.cookie-table').removeClass('selected');
        var selected = $(e.target).closest('.cookie-type'),
            toggle = selected.data('toggle');
        selected.addClass('selected');
        $('.cookie-table.' + toggle).addClass('selected');
    });
});