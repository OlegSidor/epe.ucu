<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\Tabs */
/** @var array $parents */

$this->title = Yii::t('app', 'Update Tabs: {name}', [
    'name' => $model->name,
]);
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Tabs'), 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->name, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = Yii::t('app', 'Update');
?>
<div class="tabs-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_menu', [
        'items' => $items,
    ]) ?>

    <?= $this->render('_form', [
        'model' => $model,
        'parents' => $parents,
    ]) ?>

</div>
