CKEDITOR.plugins.add('Tabs', {
    icons: 'tabs',
    init: function (editor) {
        editor.addCommand('insertTabs', new CKEDITOR.dialogCommand('TabsDialog', {
            allowedContent: 'Tabs',
        }));

        editor.addCommand('changeTabs', new CKEDITOR.dialogCommand('TabsDialog', {
            allowedContent: 'Tabs',
        }));

        editor.ui.addButton('Tabs', {
            label: 'Вставка навігаційного меню',
            command: 'insertTabs',
            toolbar: 'insert'
        });
        CKEDITOR.dialog.add('TabsDialog', this.path + 'dialogs/Tabs.js');

        if ( editor.contextMenu ) {
            editor.addMenuGroup( 'tabsGroup' );
            editor.addMenuItem( 'tabsChangeItem', {
                label: 'Змінити',
                icon: this.path + 'icons/tabs.png',
                command: 'changeTabs',
                group: 'tabsGroup'
            });
            editor.contextMenu.addListener( function( element ) {
                if ( element.getAscendant( 'tabs', true ) ) {
                    return { tabsChangeItem: CKEDITOR.TRISTATE_OFF };
                }
            });
        }
    }
});