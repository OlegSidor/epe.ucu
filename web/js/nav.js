let nav = $('.full-nav-wrap'),
    nav_container = $('.full-nav-wrap .container'),
    toggle = $('.navbar-toggle'),
    container = $(".container"),
    body = $('body'),
    searchShow = false;
$(document).ready(function () {
    toggle.click(function () {
        showNav()
    });

    $(document).mouseup(function (e) {
        if (!container.is(e.target)
            && container.has(e.target).length === 0) {
            hideNav();
        }
    });

    $('.close').click(function () {
        hideNav();
    });
    $('.show-search').click(function () {
        showNav();
        $('.search input').focus();
    });

    adaptiveNav();
    $(window).resize(function () {
        adaptiveNav();
    });

    if ($(window).width() <= 425) {
        $('.search button').click(function (e) {
            if (!searchShow) {
                e.preventDefault();
                $('.search .form-group').css('display', 'block');
                $('.search .form-group').animate({'width': '100%'}, 200);
                searchShow = true;
            } else {
                if ($('.search.onfooter .form-control').val() === '') {
                    e.preventDefault();
                    $('.search .form-group').animate({'width': '0'}, 200, function () {
                        $('.search .form-group').css('display', 'none');
                    });
                    searchShow = false;
                }
            }
        });
    }

    $('.childs-wrap').hover(function () {
        $(this).parent().find(":after").hover()
    })
});

function showNav() {
    $(document).scrollTop(0);
    if (nav.height() <= $(window).height()) {
        body.css('overflow', 'hidden');
    }

    if (nav.height() < body.height()) {
        nav_container.height($('body').height());
    }
    nav.show(500);
}

function hideNav() {
    nav_container.css('height', 'auto');
    body.css('overflow', 'auto');
    nav.hide(500);
}

function adaptiveNav() {
    if ($('.navbar').height() >= 170) {
        $('.nav-content').css('display', 'none');
        $('.right-btns').css('display', 'none');
    } else if ($(window).width() >= 1240) {
        $('.nav-content').css('display', 'block');
        $('.right-btns').css('display', 'block');
    }
}

function download(element) {
    let url = element.getAttribute('data-url');
    window.open(url);
}