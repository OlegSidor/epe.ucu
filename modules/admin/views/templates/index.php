<?php

use yii\helpers\Html;
use yii\grid\GridView;
use app\models\Templates;
use yii\helpers\Url;

/* @var $this yii\web\View */
/* @var $searchModel app\modules\admin\models\TemplatesSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */
/** @var array $parents */

$this->title                   = Yii::t('app', 'Templates');
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="templates-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?php if (Yii::$app->user->can('createTemplates')): ?>
            <?= Html::a(Yii::t('app', 'Create'), ['create'], ['class' => 'btn btn-success']) ?>
        <?php endif; ?>
    </p>


    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'columns'      => [
            ['class' => 'yii\grid\SerialColumn'],

            'name',

            [
                'class'          => 'yii\grid\ActionColumn',
                'template'       => '{update} {delete}',
                'visibleButtons' => [
                    'update' => Yii::$app->user->can('modifyTemplates'),
                    'delete' => Yii::$app->user->can('deleteTemplates')],
                'urlCreator'     => function ($action, $model, $key, $index) {
                    switch ($action) {
                        case 'update':
                            return $url = '/admin/templates/update?id=' . $model['name'];
                            break;
                        case 'delete':
                            return $url = '/admin/templates/delete?id=' . $model['name'];
                            break;
                    }
                },
            ],
        ],
    ]); ?>


</div>
