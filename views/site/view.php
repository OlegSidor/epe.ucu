<?php

/* @var $this yii\web\View */
/* @var $model app\models\Pages */
$this->title = $model->title;
?>
<style>
    .slick-prev {
        left: 25px;
        z-index: 9;
    }
    .slick-next {
        right: 0px;
    }
</style>
<div class="container">
    <h2 class="title"><strong><?= $model->title ?></strong></h2>
    <?= $model->content ?>
</div>
