<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel app\modules\admin\models\TeamSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title                   = Yii::t('app', 'Teams');
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="team-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a(Yii::t('app', 'add to team'), ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel'  => $searchModel,
        'columns'      => [
            ['class' => 'yii\grid\SerialColumn'],

            'id',
            'name',
            'short_description:ntext',
            ['attribute' => 'img',
             'value'     => function ($model) {
                 return Html::img($model->img, ['width' => 200]);
             },
             'format' => 'html'
            ],


            [
                'class' => 'yii\grid\ActionColumn',
                'template' => '{update} {delete}',
                'visibleButtons' => [
                    'update' => Yii::$app->user->can('modifyTabs'),
                    'delete' => Yii::$app->user->can('deleteTabs')],
            ],
        ],
    ]); ?>


</div>
