<?php

/* @var $this yii\web\View */
/* @var $model app\models\Pages */
$this->title = $model->title;
?>
<div class="container">
    <h2 class="title"><strong><?=$model->title?></strong></h2>
    <?= $model->content ?>
</div>
