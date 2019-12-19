CKEDITOR.plugins.add('Templates', {
    icons: 'template',
    init: function (editor) {
        editor.addCommand('insertTemplates', new CKEDITOR.dialogCommand('TemplatesDialog', {
            allowedContent: 'Template',
        }));

        editor.addCommand('changeTemplates', new CKEDITOR.dialogCommand('TemplatesDialog', {
            allowedContent: 'Template',
        }));

        editor.ui.addButton('Templates', {
            label: 'Вставка шаблона',
            command: 'insertTemplates',
            toolbar: 'insert'
        });
        CKEDITOR.dialog.add('TemplatesDialog', this.path + 'dialogs/Templates.js');

        if ( editor.contextMenu ) {
            editor.addMenuGroup( 'templatesGroup' );
            editor.addMenuItem( 'templateChangeItem', {
                label: 'Змінити',
                icon: this.path + 'icons/template.png',
                command: 'changeTemplates',
                group: 'templatesGroup'
            });
            editor.contextMenu.addListener( function( element ) {
                if ( element.getAscendant( 'templates', true ) ) {
                    return { templateChangeItem: CKEDITOR.TRISTATE_OFF };
                }
            });
        }
    }
});