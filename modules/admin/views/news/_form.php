<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use dosamigos\ckeditor\CKEditor;
use kartik\date\DatePicker;

/* @var $this yii\web\View */
/* @var $model app\models\News */
/* @var $form yii\widgets\ActiveForm */
$this->registerJsVar('id', 'news-img');
$this->registerJsFile('/js/image-select.js', ['dependence' => \yii\web\JqueryAsset::className()])
?>

<div class="news-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'title')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'content')->widget(CKEditor::className(), [
        'options'       => ['rows' => 6],
        'preset'        => 'full',
        'kcfinder'      => true,
        'clientOptions' => [
            'language'            => 'uk',
            'extraPlugins'        => 'layoutmanager, basewidget,find,divarea,colorbutton,font,btgrid,video,youtube,image2, tableresize,Tabs,Templates,simplebutton,colordialog,justify, Slider, DownloadButton',
            'removePlugins'       => 'image',
            'allowedContent'      => true,
            'image2_alignClasses' => ['image-left', 'image-center', 'image-right'],
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
    <?php $this->registerJs("CKEDITOR.plugins.addExternal('DownloadButton', '/js/CKeditorPlugins/DownloadButton/plugin.js', '');"); ?>
    <?php $this->registerJs("CKEDITOR.plugins.addExternal('layoutmanager', '/js/CKeditorPlugins/layoutmanager/plugin.js', '');"); ?>
    <?php $this->registerJs("CKEDITOR.plugins.addExternal('basewidget', '/js/CKeditorPlugins/basewidget/plugin.js', '');"); ?>


    <?= $form->field($model, 'short_desc')->textarea(['maxlength' => true]) ?>

    <div class="form-group">
        <label class="control-label"><?= $model->getAttributeLabel('img') ?></label>
        <div class="row">
            <div class="col-md-11 col-sm-12"><?= $form->field($model, 'img')->textInput(['maxlength' => true, 'placeholder' => Yii::t('app', 'Url or click Select')])->label(false) ?></div>
            <button type="button" class="col-md-1 col-md-offset-0 col-xs-10 col-xs-offset-1 btn btn-primary"
                    onclick="selectFile()"><?= Yii::t('app', 'Select') ?></button>
        </div>
    </div>

    <?= $form->field($model, 'date')->widget(DatePicker::classname(), [
        'value'         => $model->date ?? date('yyyy-mm-dd'),
        'pluginOptions' => [
            'autoclose' => true,
            'format'    => 'yyyy-mm-dd',
        ],

    ]); ?>


    <div class="form-group">
        <?= Html::submitButton(Yii::t('app', 'Save'), ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
