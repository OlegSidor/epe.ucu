CKEDITOR.plugins.add('Templates', {
    icons: 'template',
    init: function (editor) {
        editor.addCommand('insertTemplates', new CKEDITOR.dialogCommand('TemplatesDialog', {
            allowedContent: 'Template',
        }));
        editor.ui.addButton('Templates', {
            label: 'Вставка шаблону меню',
            command: 'insertTemplates',
            toolbar: 'insert'
        });
        CKEDITOR.dialog.add('TemplatesDialog', this.path + 'dialogs/Templates.js');
    }
});