<?php

use yii\helpers\Html;
use yii\grid\GridView;
use app\models\Tabs;
use yii\helpers\Url;
/* @var $this yii\web\View */
/* @var $searchModel app\modules\admin\models\TabsSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */
/** @var array $parents */

$this->title = Yii::t('app', 'Tabs');
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="tabs-index">

    <h1><?= Html::encode($this->title) ?></h1>

        <p>
            <?php if (Yii::$app->user->can('createTabs')): ?>
            <?= Html::a(Yii::t('app', 'Create'), ['create'], ['class' => 'btn btn-success']) ?>
            <?php endif; ?>
        </p>


    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'name',
            [
                'attribute' => 'url',
                'value' => function (Tabs $data) {
                    return Html::a(Html::encode($data->url), Url::to(['/'.$data->url]));
                },
                'format' => 'raw',
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
