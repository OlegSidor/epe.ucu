function selectFile() {
    window.KCFinder = {};
    window.KCFinder.callBack = function(url) {
        document.getElementById('tabs-img').value = url;
        window.KCFinder = null;
    };
    window.open('/assets/ccff7cb1/browse.php', 'kcfinder_single', '_blank');
}

$(document).ready(function () {
    $.each($('.tabs-prev'), function (k, v) {
        let parent = $(v).attr('data-parent');
        $.get('/get-tabs', {parent_name: parent}, function (data) {
            $(v).replaceWith(data);
        });
    })
});