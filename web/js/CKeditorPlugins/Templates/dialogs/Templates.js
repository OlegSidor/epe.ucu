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
        onOk: function () {
            let dialog = this,
                tpl = dialog.getValueOf( 'default', 'tpl' ),
                template_element = editor.document.createElement( 'Templates' );
                template_element.addClass('template-prev');
                template_element.setText('TEMPLATE: '+tpl);
                template_element.setAttribute('data-template', tpl);
                editor.insertElement(  template_element );
        },
        buttons: [CKEDITOR.dialog.cancelButton, CKEDITOR.dialog.okButton],
    };
});