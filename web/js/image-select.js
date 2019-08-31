function selectFile() {
    window.KCFinder = {};
    window.KCFinder.callBack = function(url) {
        document.getElementById(id).value = url;
        window.KCFinder = null;
    };
    window.open('/assets/ccff7cb1/browse.php', 'kcfinder_single', '_blank');
}