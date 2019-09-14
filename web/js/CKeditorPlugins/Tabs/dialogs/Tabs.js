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
        onShow: function() {
            let selection = editor.getSelection(),
                element = selection.getStartElement();

            if ( element )
                element = element.getAscendant( 'tabs', true );

            this.element = element;
        },
        onOk: function () {
            let dialog = this,
                parent = dialog.getValueOf( 'default', 'parent' ),
                tabs_element = editor.document.createElement( 'Tabs' ),
                element = this.element;
            if(element){
                element.setAttribute('data-parent', parent);
                element.setText('TABS: '+parent);
            } else {
                tabs_element.addClass('tabs-prev');
                tabs_element.setText('TABS: '+parent);
                tabs_element.setAttribute('data-parent', parent);
                tabs_element.setAttribute('contenteditable', 'false');
                editor.insertElement(tabs_element);
            }
        },
        buttons: [CKEDITOR.dialog.cancelButton, CKEDITOR.dialog.okButton],
    };
});