<?php

use app\models\Tabs;

/* @var $this yii\web\View */

$tabs = Tabs::find()->where(['or', 'name LIKE "Студентське життя"', 'name LIKE "Epe Open Talks"'])->asArray()->all();
?>
<style>
    .main-f {
        margin-top: 25px;
    }

    .main-f img {
        width: 100%;
        filter: blur(2px)  brightness(60%);
    }

    .main-f .title {
        text-align: center;
        color: white;
        font-weight: bold;
        font-size: 25px;
        position: absolute;
        top: 50%;
        left: 50%;
        transform: translate(-50%, -50%);
    }

    .main-f .main-f-tile {
        margin-bottom: 20px;
    }

    @media (max-width: 425px) {
        .main-f .title {
            font-size: 20px;
        }
    }
</style>
<div class="row main-f">
    <div class="col-md-6 col-sm-12 main-f-tile">
        <a href="<?= $tabs[0]['url'] ?>">
            <img src="<?= $tabs[0]['img'] ?>" alt="">
            <div class="title"><?= $tabs[0]['name'] ?></div>
        </a>
    </div>
    <div class="col-md-6 col-sm-12 main-f-tile">
        <a href="<?= $tabs[1]['url'] ?>">
            <img src="<?= $tabs[1]['img'] ?>" alt="">
            <div class="title"><?= $tabs[1]['name'] ?></div>
        </a>
    </div>
</div>