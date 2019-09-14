<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel app\modules\admin\models\TextBlocksSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title                   = Yii::t('app', 'Text Blocks');
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="text-blocks-index">

    <h1><?= Html::encode($this->title) ?></h1>


    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel'  => $searchModel,
        'columns'      => [
            ['class' => 'yii\grid\SerialColumn'],

            'name',
            'title',

            ['class'     => 'yii\grid\ActionColumn',
             'template' => '{update}'],
        ],
    ]); ?>


</div>
