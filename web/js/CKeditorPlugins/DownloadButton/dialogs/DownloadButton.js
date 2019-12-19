CKEDITOR.dialog.add('DownloadButtonDialog', function (editor) {
    return {
        title: 'Виберіть файл для завантаження',
        minWidth: 400,
        minHeight: 200,
        contents: [
            {
                id: 'default',
                elements: [
                    {
                        type: 'button',
                        id: 'select_files',
                        label: 'Выбрати',
                        onClick: function () {
                            let button = this;
                            window.KCFinder = {};
                            window.KCFinder.callBack  = function (url) {
                                button.getDialog().setValueOf( 'default', 'url', url);
                                window.KCFinder = null;
                            };
                            window.open('/assets/ccff7cb1/browse.php', 'kcfinder_single', '_blank');
                        }
                    },
                    {
                        type: 'text',
                        id: 'url',
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
                element = element.getAscendant('DownloadButton', true);

            this.element = element;
        },
        onOk: function () {
            let dialog = this,
                url = '/download/'+dialog.getValueOf( 'default', 'url' ).replace('/upload/', ''),
                button_element = editor.document.createElement( 'DownloadButton' ),
                element = this.element,
                url_ = url.split('/'),
                name = url_[url_.length-1];
            if(element){
                element.setText(name);
                element.setAttribute('data-url', url);
            } else {
                button_element.addClass('download-button');
                button_element.setText(name);
                button_element.setAttribute('data-url', url);
                button_element.setAttribute('onClick', 'download(this)');
                button_element.setAttribute('contenteditable', 'false');
                editor.insertElement(button_element);
            }
        },
        buttons: [CKEDITOR.dialog.cancelButton, CKEDITOR.dialog.okButton],
    };
});