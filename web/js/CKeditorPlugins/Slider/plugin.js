CKEDITOR.plugins.add('Slider', {
    icons: 'slider',
    init: function (editor) {
        editor.addCommand('insertSlider', new CKEDITOR.dialogCommand('sliderDialog', {
            allowedContent: 'slider',
        }));

        editor.addCommand('changeSlider', new CKEDITOR.dialogCommand('sliderDialog', {
            allowedContent: 'slider',
        }));

        editor.ui.addButton('slider', {
            label: 'Слайдер',
            command: 'insertSlider',
            toolbar: 'insert'
        });
        CKEDITOR.dialog.add('sliderDialog', this.path + 'dialogs/Slider.js');

        if ( editor.contextMenu ) {
            editor.addMenuGroup( 'sliderGroup' );
            editor.addMenuItem( 'sliderChangeItem', {
                label: 'Змінити',
                icon: this.path + 'icons/slider.png',
                command: 'changeSlider',
                group: 'sliderGroup'
            });
            editor.contextMenu.addListener( function( element ) {
                if ( element.getAscendant( 'slider', false ) ) {
                    return { sliderChangeItem: CKEDITOR.TRISTATE_OFF };
                }
            });
        }
    }
});