<?php

/* @var $this \yii\web\View */

/* @var $content string */

use app\widgets\Alert;
use yii\helpers\Html;
use yii\bootstrap\Nav;
use yii\bootstrap\NavBar;
use yii\widgets\Breadcrumbs;
use app\assets\AppAsset;
use kartik\nav\NavX;

AppAsset::register($this);

$navbar = $this->params['navbar'];
?>
<?php $this->beginPage() ?>
<!DOCTYPE html>
<html lang="<?= Yii::$app->language ?>">
<head>
    <meta charset="<?= Yii::$app->charset ?>">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <?php $this->registerCsrfMetaTags() ?>
    <title><?= Html::encode($this->title) ?></title>
    <?php $this->head() ?>
</head>
<body>
<?php $this->beginBody() ?>
<div class="full-nav-wrap">
    <div class="close">
        <i class="fas fa-times"></i>
    </div>
    <div class="container">
        <form class="navbar-form search" role="search">
            <div class="form-group">
                <input name="search" type="text" class="form-control" placeholder="<?= Yii::t('app', 'Пошук') ?>">
            </div>
            <button type="submit" class="btn btn-default"><i class="fas fa-search"></i></button>
        </form>
        <div class="row">
            <ul class="nav-container">
                <?php foreach ($navbar as $full_nav): ?>
                    <li class="section">
                        <ul>
                            <li class="parent"><a href="<?= $full_nav['url'] ?>"><?= $full_nav['label'] ?></a></li>
                            <?php foreach ($full_nav['childs'] as $child): ?>
                                <li><a href="<?= $child['url'] ?>"><?= $child['label'] ?></a></li>
                            <?php endforeach; ?>
                        </ul>
                    </li>
                <?php endforeach; ?>
            </ul>
        </div>
    </div>
</div>
<div class="wrap">
    <div class="navbar">
        <div class="nav-wrap">
            <a class="navbar-brand" href="/"><img src="/img/logo-round-ukr.png" alt=""></a>
            <div class="nav-content-wrap">
                <div class="nav-content">
                    <ul class="nav navbar-nav">
                        <?php foreach ($navbar as $nav): ?>
                            <?php if (!$nav['hidden']): ?>
                                <li class="nav"><a href="<?= $nav['url'] ?>"><?= $nav['label'] ?></a></li>
                            <?php endif; ?>
                        <?php endforeach; ?>
                        <li>
                            <button type="button" class="navbar-toggle show"
                                    title="<?= Yii::t('app', 'Показати все') ?>">
                                <span class="icon-bar"></span>
                                <span class="icon-bar"></span>
                                <span class="icon-bar"></span>
                            </button>
                        </li>
                    </ul>
                    <form class="navbar-form search" role="search">
                        <div class="form-group">
                            <input name="search" type="text" class="form-control"
                                   placeholder="<?= Yii::t('app', 'Пошук') ?>">
                        </div>
                        <button type="submit" class="btn btn-default"><i class="fas fa-search"></i></button>
                    </form>
                </div>
                <button type="button" class="navbar-toggle">
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
            </div>
        </div>
    </div>

    <div class="container">
        <?= Breadcrumbs::widget([
            'links' => isset($this->params['breadcrumbs']) ? $this->params['breadcrumbs'] : [],
        ]) ?>
        <?= Alert::widget() ?>
        <?= $content ?>
    </div>
</div>

<?php $this->endBody() ?>
</body>
</html>
<?php $this->endPage() ?>
