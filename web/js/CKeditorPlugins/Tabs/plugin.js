CKEDITOR.plugins.add('Tabs', {
    icons: 'tabs',
    init: function (editor) {
        editor.addCommand('insertTabs', new CKEDITOR.dialogCommand('TabsDialog', {
            allowedContent: 'Tabs',
        }));
        editor.ui.addButton('Tabs', {
            label: 'Вставка навігаційного меню',
            command: 'insertTabs',
            toolbar: 'insert'
        });
        CKEDITOR.dialog.add('TabsDialog', this.path + 'dialogs/Tabs.js');
        console.log(editor.filter.allowedContent);
    }
});