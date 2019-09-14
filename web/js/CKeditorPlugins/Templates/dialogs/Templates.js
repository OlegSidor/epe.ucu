CKEDITOR.dialog.add('TemplatesDialog', function (editor) {
    return {
        title: 'Виберіть шаблон',
        minWidth: 400,
        minHeight: 200,
        contents: [
            {
                id: 'default',
                elements: [
                    {
                        type: 'text',
                        id: 'tpl',
                        label: 'Назва файлу',
                        validate: CKEDITOR.dialog.validate.notEmpty("Потрібно щось ввести")
                    },
                ]
            },
        ],
        onShow: function() {
            let selection = editor.getSelection(),
                element = selection.getStartElement();

            if ( element )
                element = element.getAscendant( 'templates', true );

            this.element = element;
        },
        onOk: function () {
            let dialog = this,
                tpl = dialog.getValueOf( 'default', 'tpl' ),
                template_element = editor.document.createElement( 'Templates' ),
                element = this.element;
            if(element){
                element.setText('TEMPLATE: ' + tpl);
                element.setAttribute('data-template', tpl);
            } else {
                template_element.addClass('template-prev');
                template_element.setText('TEMPLATE: ' + tpl);
                template_element.setAttribute('data-template', tpl);
                template_element.setAttribute('contenteditable', 'false');
                editor.insertElement(template_element);
            }
        },
        buttons: [CKEDITOR.dialog.cancelButton, CKEDITOR.dialog.okButton],
    };
});