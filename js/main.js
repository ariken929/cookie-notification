$(document).ready(function () {
    $("#cookie-notification .accept-all").click(function (e) {
        e.preventDefault();
        var notification = $('#cookie-notification');
        var url = notification.data('accept');

        $.get(url, function (data) {
            $('body').removeClass('has-notice');
            notification.hide();
        });
    });

    $("#cookie-notification .accept-essential").click(function (e) {
        e.preventDefault();
        var notification = $('#cookie-notification');
        var url = notification.data('essential');

        $.get(url, function (data) {
            $('body').removeClass('has-notice');
            notification.hide();
        });
    });

    $("#cookie-notification .close").click(function (e) {
        e.preventDefault();
        var notification = $('#cookie-notification');
        var url = notification.data('accept');

        $.get(url, function (data) {
            $('body').removeClass('has-notice');
            notification.hide();
        });
    });

    $("#cookie-notification .options").click(function (e) {
        e.preventDefault();
        var notification = $('#cookie-notification'),
            notice = notification.find('.cookie-notice'),
            options = notification.find('.cookie-options'),
            actions = notification.find('.actions');

        if (notification.hasClass('compact')) {
            notification.removeClass('compact');
            actions.hide();
            notice.fadeOut(500, function () {
                options.fadeIn(500);
                actions.fadeIn(500);
            });
        }
        else {
            notification.addClass('compact');
            actions.hide();
            options.fadeOut(50, function () {
                notice.fadeIn(500);
                actions.fadeIn(500);
            });
        }
    });

    $("#cookie-notification .nav-item").click(function (e) {
        e.preventDefault();
        $('#cookie-notification .nav-item').removeClass('selected');
        $('#cookie-notification .content-item').removeClass('selected');
        $('#cookie-notification .content-item').hide();
        var selected = $(e.target).closest('.nav-item'),
            toggle = selected.data('toggle');
        selected.addClass('selected');
        $('.content-item.' + toggle).addClass('selected');
        $('.content-item.' + toggle).fadeIn();
    });
});