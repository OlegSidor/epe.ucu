<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use kartik\select2\Select2;

/* @var $this yii\web\View */
/* @var $model app\models\Tabs */
/* @var $form yii\widgets\ActiveForm */
$this->registerJsVar('id', 'tabs-img');
$this->registerJsFile('/js/image-select.js', ['dependence' => \yii\web\JqueryAsset::className()])
?>

<div class="tabs-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'name')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'url')->textInput(['maxlength' => true]) ?>

    <div class="form-group">
        <label class="control-label"><?= $model->getAttributeLabel('parent') ?></label>
        <?= Select2::widget([
            'model'     => $model,
            'attribute' => 'parent',
            'data'      => $parents,

        ]) ?>
    </div>

    <div class="form-group">
        <label class="control-label"><?= $model->getAttributeLabel('img') ?></label>
        <div class="row">
            <div class="col-md-11 col-sm-12"><?= $form->field($model, 'img')->textInput(['maxlength' => true, 'placeholder' => Yii::t('app', 'Url or click Select')])->label(false) ?></div>
            <button type="button" class="col-md-1 col-md-offset-0 col-xs-10 col-xs-offset-1 btn btn-primary" onclick="selectFile()"><?=Yii::t('app', 'Select')?></button>
        </div>
    </div>

    <?= $form->field($model, 'hidden')->checkbox(['maxlength' => true]) ?>

    <div class="form-group">
        <?= Html::submitButton(Yii::t('app', 'Save'), ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
