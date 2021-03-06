<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel app\modules\admin\models\AnnouncementsSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = Yii::t('app', 'Announcements');
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="announcements-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a(Yii::t('app', 'Create Announcements'), ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'title',
            'short_desc',
            [
                'attribute' => 'url',
                'value' => function ($data){
                    return Html::a($data->{'url'}, '/announcements/'.$data->{'url'});
                },
                'format' => 'html'
            ],

            'date',

            [
                'class'          => 'yii\grid\ActionColumn',
                'visibleButtons' => [
                    'update' => Yii::$app->user->can('modifyAnnouncements'),
                    'delete' => Yii::$app->user->can('deleteAnnouncements'),
                    'view'   => Yii::$app->user->can('deleteAnnouncements'),
                ],
            ],
        ],
    ]); ?>


</div>
