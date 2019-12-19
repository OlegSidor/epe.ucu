CKEDITOR.plugins.add('DownloadButton', {
    icons: 'downloadbutton',
    init: function (editor) {
        editor.addCommand('insertDownloadButton', new CKEDITOR.dialogCommand('DownloadButtonDialog', {
            allowedContent: 'DownloadButton',
        }));

        editor.addCommand('changeDownloadButton', new CKEDITOR.dialogCommand('DownloadButtonDialog', {
            allowedContent: 'DownloadButton',
        }));

        editor.ui.addButton('DownloadButton', {
            label: 'Кнопка для завантаження',
            command: 'insertDownloadButton',
            toolbar: 'insert'
        });
        CKEDITOR.dialog.add('DownloadButtonDialog', this.path + 'dialogs/DownloadButton.js');
        if ( editor.contextMenu ) {
            editor.addMenuGroup( 'DownloadButtonGroup' );
            editor.addMenuItem( 'DownloadButtonChangeItem', {
                label: 'Змінити',
                icon: this.path + 'icons/downloadbutton.png',
                command: 'changeDownloadButton',
                group: 'DownloadButtonGroup'
            });
            editor.contextMenu.addListener( function( element ) {
                if ( element.getAscendant( 'downloadbutton', true ) ) {
                    return { DownloadButtonChangeItem: CKEDITOR.TRISTATE_OFF };
                }
            });
        }
    }
});