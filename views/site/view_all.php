<?php
/* @var $this yii\web\View */
/* @var $content [] app\models\News */
/* @var $model app\models\News */
$this->title = $model->getAttributeLabel('all_title');
?>
<div class="container all">
    <h2 class="title"><strong><?= $model->getAttributeLabel('all_title') ?></strong></h2>
    <div class="wraper">
        <?php foreach ($content as $item): ?>
            <div class="item">
                <img src="<?= $item->img ?>" alt="" class="img-rounded">
                <a class="all_title" href="/news/<?= $item->url ?>"><?= $item->title ?></a>
                <div class="date">
                    <i class="fas fa-calendar-alt"></i><?= $item->date ?>
                </div>
            </div>
        <?php endforeach; ?>
    </div>
</div>
