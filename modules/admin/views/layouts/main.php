<?php

/* @var $this \yii\web\View */

/* @var $content string */

use app\widgets\Alert;
use yii\helpers\Html;
use yii\bootstrap\Nav;
use yii\bootstrap\NavBar;
use yii\widgets\Breadcrumbs;
use app\modules\admin\assets\AppAsset;

if (isset($this->params['breadcrumbs'])) {
    array_unshift($this->params['breadcrumbs'], ['label' => Yii::t('app', 'Admin'), 'url' => '/admin']);
}
AppAsset::register($this);
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

<div class="wrap">
    <?php
    NavBar::begin([
        'brandLabel' => Yii::$app->name,
        'brandUrl' => Yii::$app->homeUrl,
        'options' => [
            'class' => 'navbar-inverse navbar-fixed-top',
        ],
    ]);
    echo Nav::widget([
        'options' => ['class' => 'navbar-nav navbar-right'],
        'items' => [
            ['label' => Yii::t('app', 'Home'), 'url' => ['/admin/'], 'visible' => Yii::$app->user->can('adminView'),'active' => Yii::$app->controller->id == 'default'],
            ['label' => Yii::t('app', 'News'), 'url' => ['/admin/news'], 'visible' => Yii::$app->user->can('viewNews'),'active' => Yii::$app->controller->id == 'news'],
            ['label' => Yii::t('app', 'Events'), 'url' => ['/admin/events'], 'visible' => Yii::$app->user->can('viewEvents'),'active' => Yii::$app->controller->id == 'events'],
            ['label' => Yii::t('app', 'Announcements'), 'url' => ['/admin/announcements'], 'visible' => Yii::$app->user->can('viewAnnouncements'),'active' => Yii::$app->controller->id == 'Announcements'],
            ['label' => Yii::t('app', 'Tabs'), 'url' => ['/admin/tabs'], 'visible' => Yii::$app->user->can('viewTabs'), 'active' => Yii::$app->controller->id == 'tabs'],
            ['label' => Yii::t('app', 'Pages'), 'url' => ['/admin/pages'], 'visible' => Yii::$app->user->can('viewPages'), 'active' => Yii::$app->controller->id == 'pages'],
            ['label' => Yii::t('app', 'Додатково'), 'items' => [
                ['label' => Yii::t('app', 'Permissions'), 'url' => ['/rbac'], 'visible' => Yii::$app->user->can('admin'), 'active' => Yii::$app->controller->module->id == 'rbac' || Yii::$app->controller->id == 'admin'],
                ['label' => Yii::t('app', 'TextBlocks'), 'url' => ['/admin/text-blocks'], 'visible' => Yii::$app->user->can('viewTextBlocks'), 'active' => Yii::$app->controller->id == 'text-blocks'],
                ['label' => Yii::t('app', 'Templates'), 'url' => ['/admin/templates'], 'visible' => Yii::$app->user->can('viewTemplates'), 'active' => Yii::$app->controller->id == 'templates'],
                ['label' => Yii::t('app', 'Tabs sort'), 'url' => ['/admin/sort'], 'visible' => Yii::$app->user->can('viewSort'), 'active' => Yii::$app->controller->id == 'sort'],
                ['label' => Yii::t('app', 'Team'), 'url' => ['/admin/team'], 'visible' => Yii::$app->user->can('viewTeam'), 'active' => Yii::$app->controller->id == 'team'],
            ]],
            Yii::$app->user->isGuest ? (
            ['label' => 'Login', 'url' => ['/site/login']]
            ) : (
                '<li>'
                . Html::beginForm(['/site/logout'], 'post')
                . Html::submitButton(
                    'Logout (' . Yii::$app->user->identity->username . ')',
                    ['class' => 'btn btn-link logout']
                )
                . Html::endForm()
                . '</li>'
            ),
        ],
    ]);
    NavBar::end();
    ?>

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
