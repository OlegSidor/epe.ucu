$('slider').each(function (k, v) {
    let data = JSON.parse($(v).attr('data-slick'));
    $(v).slick(data);
});