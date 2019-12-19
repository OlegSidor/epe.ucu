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
use \yii\helpers\Url;

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
        <form class="navbar-form search ontop" role="search">
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
                            <li class="parent"><a
                                        href="<?= Url::to(!preg_match('/(^http|^www|^\/)/', $full_nav['url']) ?
                                            ('/' . $full_nav['url']) : $full_nav['url']) ?>"><?= $full_nav['label'] ?></a></li>
                            <?php if ($full_nav['childs']): ?>
                                <?php foreach ($full_nav['childs'] as $child): ?>
                                    <li><a href="<?= Url::to(!preg_match('/(^http|^www|^\/)/', $child['url']) ?
                                            ('/' . $child['url']) : $child['url']) ?>"><?= $child['label'] ?></a></li>
                                <?php endforeach; ?>
                            <?php endif; ?>
                        </ul>
                    </li>
                <?php endforeach; ?>
            </ul>
        </div>
        <form class="navbar-form search onfooter" role="search">
            <div class="form-group">
                <input name="search" type="text" class="form-control" placeholder="<?= Yii::t('app', 'Пошук') ?>">
            </div>
            <button type="submit" class="btn btn-default"><i class="fas fa-search"></i></button>
        </form>
    </div>
</div>
<div class="wrap">
    <div class="navbar">
        <div class="nav-wrap">
            <div class="logo-wrap">
                <a class="logo" href="/"><img src="/img/logo-round-ukr.png" alt=""></a>
                <a class="logo logo-text" href="/"><img src="/img/logo-text-ukr.png" alt=""></a>
            </div>
            <div class="nav-content-wrap">
                <div class="nav-content">
                    <ul class="nav navbar-nav">
                        <?php foreach ($navbar as $nav): ?>
                            <?php if (!$nav['hidden']): ?>
                                <li class="nav"><a href="<?= Url::to(preg_match('/(^http|^www|\/)/', $nav['url']) ?
                                        $nav['url'] :'/' . $nav['url']) ?>"><?= $nav['label'] ?></a>
                                    <?php if ($nav['childs']): ?>
                                        <div class="childs-wrap">
                                            <ul class="childs">
                                                <?php foreach ($nav['childs'] as $child): ?>
                                                    <?php if (!$child['hidden']): ?>
                                                        <li class="nav"><a
                                                                    href="<?= Url::to(!preg_match('/(^http|^www|^\/)/', $child['url']) ?
                                                                        ('/' . $child['url']) : $child['url']) ?>"><?= $child['label'] ?></a>
                                                        </li>
                                                    <?php endif; ?>
                                                <?php endforeach; ?>
                                            </ul>
                                        </div>
                                    <?php endif; ?>
                                </li>

                            <?php endif; ?>
                        <?php endforeach; ?>
                    </ul>
                </div>
            </div>
            <div class="right-btns">
                <button class="btn btn-default show-search right-btns"><i class="fas fa-search"></i></button>
                <!--                <button class="btn btn-default right-btns"><img src="/img/english.svg" alt=""></button>-->
                <button class="btn btn-default right-btns"><i class="fab fa-facebook-f"></i></button>
                <button class="btn btn-default right-btns"><i class="fab fa-youtube"></i></button>
                <button class="btn btn-default right-btns"><i class="fab fa-instagram"></i></button>
            </div>
            <div class="right">
                <button type="button" class="navbar-toggle show">
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
            </div>
        </div>
    </div>

    <?= Alert::widget() ?>
    <?= $content ?>
</div>
<footer>
    <div class="container">
        <div class="row">
            <div class="col-lg-2 col-md-6 col-sm-12 footer-logo-container">
                <a class="footer-logo" href="/"><img src="/img/logo-round-ukr.png" alt=""></a>
                <div class="information">
                    <h2><?= Yii::t('app', 'Контакти') ?></h2>
                    <p>вул. Іл. Свєнціцького, 17</p>
                    <p>м Львів, 79011</p>
                    <p>Тел.: (032) 240 94 95</p>
                    <p>Email: epe@ucu.edu.ua</p>
                </div>
            </div>
            <div class="col-lg-8 col-md-6 col-sm-12">
                <ul class="footer-container">
                    <?php foreach ($navbar as $full_nav): ?>
                        <?php if (!$full_nav['not_in_footer']): ?>
                            <li class="section">
                                <ul>
                                    <li class="parent"><a
                                                href="<?= Url::to(!preg_match('/(^http|^www|^\/)/', $full_nav['url']) ?
                                                    ('/' . $full_nav['url']) : $full_nav['url']) ?>"><?= $full_nav['label'] ?></a>
                                    </li>
                                    <?php if ($full_nav['childs']): ?>
                                        <?php foreach ($full_nav['childs'] as $child): ?>
                                            <li><a href="<?= Url::to(!preg_match('/(^http|^www|^\/)/', $child['url']) ?
                                                    ('/' . $child['url']) : $child['url']) ?>"><?= $child['label'] ?></a>
                                            </li>
                                        <?php endforeach; ?>
                                    <?php endif; ?>
                                </ul>
                            </li>
                        <?php endif; ?>
                    <?php endforeach; ?>
                </ul>
            </div>
        </div>
    </div>
    <div class="copyright">
        <?= date('Y'); ?> &copy; Ukrainian Catholic University
        <!-- TODO: PoweredBy -->
    </div>
</footer>
<?php $this->endBody() ?>
</body>
</html>
<?php $this->endPage() ?>
