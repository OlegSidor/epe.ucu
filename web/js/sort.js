function sort() {
    let items = $('.sortable li');
    $.each(items, function (k, v) {
        let id = $(v).find('div').attr('id'),
            pos = $(v).find('div').attr('data-pos');
        if(pos != k){
            $.post('/admin/sort/do', {id: id, position: k})
        }
    })

    window.location = '/admin';

}