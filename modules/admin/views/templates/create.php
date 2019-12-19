<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\Templates */
/** @var array $parents */

$this->title = Yii::t('app', 'Create Templates');
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Templates'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="templates-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
