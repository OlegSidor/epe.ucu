let nav = $('.full-nav-wrap'),
    toggle = $('.navbar-toggle'),
    container = $(".container"),
    body =  $('body');
$(document).ready(function () {
    toggle.click(function () {
        $(document).scrollTop(0);
        if (nav.height() <= $(window).height()) {
           body.css('overflow', 'hidden');
        }
        if (nav.height() < nav.height()) {
            nav.height($('body').height());
        }
        nav.show(500);
    });


    $(document).mouseup(function (e) {
        if (!container.is(e.target)
            && container.has(e.target).length === 0) {
            nav.css('height', 'auto');
            body.css('overflow', 'auto');
            nav.hide(500);
        }
    });
});