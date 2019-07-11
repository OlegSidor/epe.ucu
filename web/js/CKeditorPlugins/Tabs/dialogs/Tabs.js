CKEDITOR.dialog.add('TabsDialog', function (editor) {
    return {
        title: 'Виберіть вкладку',
        minWidth: 400,
        minHeight: 200,
        contents: [
            {
                id: 'default',
                elements: [
                    {
                        type: 'select',
                        id: 'parent',
                        label: 'Вкладка',
                        items: items,
                        default: 'Menu',
                        validate: CKEDITOR.dialog.validate.notEmpty("Потрібно щось вибрати")
                    },
                ]
            },
        ],
        onOk: function () {
            let dialog = this,
                parent = dialog.getValueOf( 'default', 'parent' ),
                tabs_element = editor.document.createElement( 'Tabs' );
            tabs_element.addClass('tabs-prev');
            tabs_element.setText('TABS');
            tabs_element.setAttribute('data-parent', parent);
            editor.insertElement( tabs_element );

            // editor.insertHtml('<div contenteditable=false class="tabs-prev" data-parent="asd">TABS</div>');
        },
        buttons: [CKEDITOR.dialog.cancelButton, CKEDITOR.dialog.okButton],
    };
});