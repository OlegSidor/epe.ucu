<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use dosamigos\ckeditor\CKEditor;

/* @var $this yii\web\View */
/* @var $model app\models\Pages */
/* @var $form yii\widgets\ActiveForm */
$this->registerJsVar('items', $items);
?>

<div class="pages-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'title')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'url')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'content')->widget(CKEditor::className(), [
        'options'       => ['rows' => 6],
        'preset'        => 'full',
        'kcfinder'      => true,
        'clientOptions' => [
            'language'               => 'uk',
            'extraPlugins'           => 'find,divarea,colorbutton,font,btgrid,video,youtube,image2, tableresize,Tabs,Templates,simplebutton,colordialog,justify, Slider',
            'removePlugins'          => 'image',
            'allowedContent'         => true,
            'image2_alignClasses'    => ['image-left', 'image-center', 'image-right'],
            'youtube_responsive'     => true,
            'colorButton_enableMore' => true,
        ],
        'kcfOptions'    => [
            'access' => [
                'files' => [
                    'upload' => Yii::$app->user->can('modifyPages') || Yii::$app->user->can('createPages'),
                    'delete' => Yii::$app->user->can('modifyPages') || Yii::$app->user->can('createPages'),
                    'copy'   => Yii::$app->user->can('modifyPages') || Yii::$app->user->can('createPages'),
                    'move'   => Yii::$app->user->can('modifyPages') || Yii::$app->user->can('createPages'),
                    'rename' => Yii::$app->user->can('modifyPages') || Yii::$app->user->can('createPages'),
                ],
                'dirs'  => [
                    'create' => Yii::$app->user->can('modifyPages') || Yii::$app->user->can('createPages'),
                    'delete' => Yii::$app->user->can('modifyPages') || Yii::$app->user->can('createPages'),
                    'rename' => Yii::$app->user->can('modifyPages') || Yii::$app->user->can('createPages'),
                ],
            ],
        ],
    ]) ?>
    <?php $this->registerJs("CKEDITOR.plugins.addExternal('btgrid', '/js/CKeditorPlugins/btgrid/plugin.js', '');"); ?>
    <?php $this->registerJs("CKEDITOR.plugins.addExternal('video', '/js/CKeditorPlugins/video/plugin.js', '');"); ?>
    <?php $this->registerJs("CKEDITOR.plugins.addExternal('youtube', '/js/CKeditorPlugins/youtube/plugin.js', '');"); ?>
    <?php $this->registerJs("CKEDITOR.plugins.addExternal('Tabs', '/js/CKeditorPlugins/Tabs/plugin.js', '');"); ?>
    <?php $this->registerJs("CKEDITOR.plugins.addExternal('Templates', '/js/CKeditorPlugins/Templates/plugin.js', '');"); ?>
    <?php $this->registerJs("CKEDITOR.plugins.addExternal('simplebutton', '/js/CKeditorPlugins/simplebutton/plugin.js', '');"); ?>
    <?php $this->registerJs("CKEDITOR.plugins.addExternal('Slider', '/js/CKeditorPlugins/Slider/plugin.js', '');"); ?>

    <div class="form-group">
        <?= Html::submitButton(Yii::t('app', 'Save'), ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
