<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\Templates */
/** @var array $parents */

$this->title = Yii::t('app', 'Update Templates: {name}', [
    'name' => $model->name,
]);
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Templates'), 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->name, 'url' => ['view', 'id' => $model->name]];
$this->params['breadcrumbs'][] = Yii::t('app', 'Update');
?>
<div class="templates-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
