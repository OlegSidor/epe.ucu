<?php

/* @var $this yii\web\View */
/* @var $model app\models\News */
$this->title = $model->title;
$this->registerJsFile('/js/tabs.js', ['depends' => \yii\web\JqueryAsset::className()]);
?>
<div class="container">
    <h2 class="title"><strong><?= $model->title ?></strong></h2>
    <div class="upload-date"><i class="far fa-clock"></i> <?=$model->date?></div>
    <?= $model->content ?>
</div>
