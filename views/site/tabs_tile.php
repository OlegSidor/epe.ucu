<?php
/* @var $this yii\web\View */

/** @var array $childs */

use yii\helpers\Html;
?>

<div class="row">
<?php foreach ($childs as $child): ?>
    <div class="col-lg-3 col-md-6 col-sm-12 tab_tile">
        <a href="<?= $child->url ?>">
            <?= Html::img($child->img, ['class' => 'tab_tile_img']) ?>
            <div class="title <?php if (!$child->img) {
                echo 'text-black';
            } ?>"><span><?= $child->name ?></span></div>
        </a>
    </div>
<?php endforeach; ?>
</div>