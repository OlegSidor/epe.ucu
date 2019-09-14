<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use kartik\select2\Select2;

/* @var $this yii\web\View */
/* @var $form yii\widgets\ActiveForm */

?>

<div class="templates-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'name')->textInput(['maxlength' => true]) ?>

    <?=$form->field($model, 'content')->widget(
        'trntv\aceeditor\AceEditor',
        [
            'mode'=>'php',
            'theme'=>'github',
        ]
    )?>
    <div class="form-group">
        <?= Html::submitButton(Yii::t('app', 'Save'), ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
