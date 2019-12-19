<?php

use evgeniyrru\yii2slick\Slick;
use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $textBlocks app\models\TextBlocks */
/* @var $main_tabs string */

$this->title = Yii::t('app', 'Бакалаврська програма | Етика Політика Економіка');
?>
<div class="site-index">
    <div class="slider_wrap">
        <div class="all-news">
            <a href="/all/news"><?= Yii::t('app', 'Більше новини') ?><i class="fas fa-arrow-right"></i></a>
        </div>
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
    </div>
    <div class="container main">
        <?= $textBlocks['main_page_text']['text'] ?>
        <div class="main_tabs">
            <?= $main_tabs ?>
            <?= $textBlocks['main_page_footer']['text'] ?>
        </div>
    </div>
</div>
