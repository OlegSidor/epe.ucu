<?php

/* @var $this yii\web\View */
/* @var $model app\models\News */
$this->title = $model->title;
$this->registerJsFile('/js/tabs.js', ['depends' => \yii\web\JqueryAsset::className()]);
?>
<div id="fb-root"></div>
<script async defer crossorigin="anonymous" src="https://connect.facebook.net/en_US/sdk.js#xfbml=1&version=v4.0"></script>
<div class="container">
    <h2 class="title"><strong><?= $model->title ?></strong></h2>
    <div class="upload-date"><i class="far fa-clock"></i> <?=$model->date?></div>
    <?= $model->content ?>
    <div class="fb-share-button" data-href="<?=\yii\helpers\Url::to($model->url, true)?>/" data-layout="button_count" data-size="large"><a target="_blank" href="https://www.facebook.com/sharer/sharer.php?u=http%3A%2F%2Fepe.ucu.edu.ua%2Fna-krayu-prirvy-brekzyt-yevropa-ukrayina%2F&amp;src=sdkpreparse" class="fb-xfbml-parse-ignore"><?=Yii::t('app', 'Поширити')?></a></div>
</div>
