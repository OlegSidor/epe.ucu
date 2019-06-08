<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\Tabs */
/** @var array $parents */

$this->title = Yii::t('app', 'Create Tabs');
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Tabs'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="tabs-create">

    <h1><?= Html::encode($this->title) ?></h1>
    <?= $this->render('_menu', [
            'items' => $items,
    ]) ?>

    <?= $this->render('_form', [
        'model' => $model,
        'parents' => $parents,
    ]) ?>

</div>
