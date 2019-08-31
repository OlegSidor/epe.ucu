<?php

use evgeniyrru\yii2slick\Slick;
use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $textBlocks app\models\TextBlocks */


$this->title = Yii::t('app', 'Бакалаврська програма | Етика Політика Економіка');
?>
<div class="site-index">
    <?= Slick::widget([

        'containerOptions' => ['class' => 'news-slider'],
        'jsPosition'       => yii\web\View::POS_END,
        'items'            => $news,

        'clientOptions' => [
            'autoplay'      => true,
            'arrows'        => true,
            'dots'          => true,
            'autoplaySpeed' => 10000,
        ],

    ]); ?>
    <div class="container main">
        <?=$textBlocks['main_page_text']['text']?>
    </div>
</div>
