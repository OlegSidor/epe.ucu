let images = [];
CKEDITOR.dialog.add('sliderDialog', function (editor) {
    return {
        title: 'Настройки слайдера',
        minWidth: 400,
        minHeight: 200,
        contents: [
            {
                id: 'default',
                elements: [
                    {
                        type: 'button',
                        id: 'select_files',
                        label: 'Выбрати фото',
                        onClick: function () {
                            window.KCFinder = {};
                            window.KCFinder.callBackMultiple = function (files) {
                                images = files;
                                window.KCFinder = null;
                            };
                            window.open('/assets/ccff7cb1/browse.php', 'kcfinder_multiple', '_blank');
                        }
                    },
                    {
                        type: 'checkbox',
                        id: 'infinite',
                        label: 'infinite',
                        'default': 'checked',
                    },
                    {
                        type: 'checkbox',
                        id: 'dots',
                        label: 'dots',
                        'default': '',
                    },
                    {
                        type: 'checkbox',
                        id: 'autoplay',
                        label: 'autoplay',
                        'default': 'checked',
                    },
                    {
                        type: 'checkbox',
                        id: 'fade',
                        label: 'fade',
                        'default': '',
                    },
                    {
                        type: 'checkbox',
                        id: 'arrows',
                        label: 'arrows',
                        'default': 'checked',
                    },
                    {
                        type: 'checkbox',
                        id: 'adaptiveHeight',
                        label: 'adaptiveHeight',
                        'default': 'checked',
                    },
                    {
                        type: 'text',
                        id: 'slidesToShow',
                        label: 'slidesToShow',
                        'default': '1',
                        validate: function () {
                            if (!this.getValue()) {
                                api.openMsgDialog('', 'slidesToShow потрібно заповнити');
                                return false;
                            }
                            if (Number.isInteger(this.getValue())) {
                                api.openMsgDialog('', 'slidesToShow повинен бути числом');
                                return false;
                            }
                            if (this.getValue() <= 0) {
                                api.openMsgDialog('', 'slidesToShow повинен бути більшим за 0');
                                return false;
                            }
                        }
                    },
                    {
                        type: 'text',
                        id: 'slidesToScroll',
                        label: 'slidesToScroll',
                        'default': '1',
                        validate: function () {
                            if (!this.getValue()) {
                                api.openMsgDialog('', 'slidesToScroll потрібно заповнити');
                                return false;
                            }
                            if (Number.isInteger(this.getValue())) {
                                api.openMsgDialog('', 'slidesToScroll повинен бути числом');
                                return false;
                            }
                            if (this.getValue() <= 0) {
                                api.openMsgDialog('', 'slidesToScroll повинен бути більшим за 0');
                                return false;
                            }
                        }
                    },
                    {
                        type: 'text',
                        id: 'speed',
                        label: 'speed',
                        'default': '500',
                        validate: function () {
                            if (!this.getValue()) {
                                api.openMsgDialog('', 'speed потрібно заповнити');
                                return false;
                            }
                            if (Number.isInteger(this.getValue())) {
                                api.openMsgDialog('', 'speed повинен бути числом');
                                return false;
                            }
                            if (this.getValue() <= 0) {
                                api.openMsgDialog('', 'speed повинен бути більшим за 0');
                                return false;
                            }
                        }
                    },
                    {
                        type: 'text',
                        id: 'autoplaySpeed',
                        label: 'autoplaySpeed',
                        'default': '2000',
                        validate: function () {
                            if (!this.getValue()) {
                                api.openMsgDialog('', 'autoplaySpeed потрібно заповнити');
                                return false;
                            }
                            if (Number.isInteger(this.getValue())) {
                                api.openMsgDialog('', 'autoplaySpeed повинен бути числом');
                                return false;
                            }
                            if (this.getValue() <= 0) {
                                api.openMsgDialog('', 'autoplaySpeed повинен бути більшим за 0');
                                return false;
                            }
                        }
                    },
                    {
                        type: 'text',
                        id: 'width',
                        label: 'width',
                        'default': '800',
                        validate: function () {
                            if (!this.getValue()) {
                                api.openMsgDialog('', 'autoplaySpeed потрібно заповнити');
                                return false;
                            }
                            if (Number.isInteger(this.getValue())) {
                                api.openMsgDialog('', 'autoplaySpeed повинен бути числом');
                                return false;
                            }
                            if (this.getValue() <= 0) {
                                api.openMsgDialog('', 'autoplaySpeed повинен бути більшим за 0');
                                return false;
                            }
                        }
                    }
                ]
            },
        ],
        onShow: function () {
            let selection = editor.getSelection(),
                element = selection.getStartElement();

            if (element) {
                element = element.getAscendant('slider', true);
                if (element)
                    images = JSON.parse(element.getAttribute('data-images'));
            }
            this.element = element;
        },
        onOk: function (event) {
            if (images.length === 0) {
                alert("Потрібно вибрати хоча б одну картинку");
                event.data.hide = false;
                return 0;
            }
            let dialog = this,
                infinite = dialog.getValueOf('default', 'infinite'),
                dots = dialog.getValueOf('default', 'dots'),
                autoplay = dialog.getValueOf('default', 'autoplay'),
                fade = dialog.getValueOf('default', 'fade'),
                arrows = dialog.getValueOf('default', 'arrows'),
                adaptiveHeight = dialog.getValueOf('default', 'adaptiveHeight'),
                slidesToShow = dialog.getValueOf('default', 'slidesToShow'),
                slidesToScroll = dialog.getValueOf('default', 'slidesToScroll'),
                speed = dialog.getValueOf('default', 'speed'),
                autoplaySpeed = dialog.getValueOf('default', 'autoplaySpeed'),
                width = dialog.getValueOf('default', 'width'),
                slider_element = editor.document.createElement('slider'),
                element = this.element;
            if (element) {
                let id = '#'+element.getAttribute('id');
                slider_element = editor.editable().findOne( id );
                slider_element.$.innerHTML = '';
            }
            slider_element.setAttribute('id', 's'+Math.floor(Math.random() * 1000));
            slider_element.setAttribute('style', 'width: '+width+'px');
            slider_element.setAttribute('data-slick', '{"slidesToScroll": ' + slidesToScroll + ',"slidesToShow": ' + slidesToShow + ',"infinite": ' + infinite + ', "dots": ' + dots + ', "autoplay": ' + autoplay + ', "fade": ' + fade + ', "arrows": ' + arrows + ', "adaptiveHeight": ' + adaptiveHeight + ', "speed": ' + speed + ', "autoplaySpeed": ' + autoplaySpeed + '}');
            slider_element.setAttribute('data-images', JSON.stringify(images));
            // slider_element.setAttribute('contenteditable', 'false');
            for (let i = 0; i < images.length; i++) {
                let image = editor.document.createElement('img');
                image.setAttribute('src', images[i]);
                slider_element.append(image);
            }
            if(!element) { editor.insertElement(slider_element)}
        },
        buttons: [CKEDITOR.dialog.cancelButton, CKEDITOR.dialog.okButton],
    };
});