<?php
/* @var $this yii\web\View */


$this->title = Yii::t('app', 'Admin');
?>

<div class="Admin-default-index">
    <div class="row" style="margin-top: 75px">
        <?php if (Yii::$app->user->can('viewNews')): ?>
            <a href="/admin/news">
                <div class="col-lg-3 col-md-6 col-sm-12 admin_tabs" style="
            background: #667db6;
            background: -webkit-linear-gradient(to right, #667db6, #0082c8, #0082c8, #667db6);
            background: linear-gradient(to right, #667db6, #0082c8, #0082c8, #667db6); ">
                    <div class="title" style="color: white;"><span><?= Yii::t('app', 'News') ?><span></div>
                </div>
            </a>
        <?php endif; ?>
        <?php if (Yii::$app->user->can('viewTabs')): ?>
            <a href="/admin/tabs">

                <div class="col-lg-3 col-md-6 col-sm-12 admin_tabs" style="background: #ff9966;
            background: -webkit-linear-gradient(to right, #ff5e62, #ff9966);
            background: linear-gradient(to right, #ff5e62, #ff9966); ">
                    <div class="title" style="color: white;"><span><?= Yii::t('app', 'Tabs') ?><span></div>

                </div>
            </a>
        <?php endif; ?>
        <?php if (Yii::$app->user->can('viewPages')): ?>
            <a href="/admin/pages">
                <div class="col-lg-3 col-md-6 col-sm-12 admin_tabs" style="background: #7F00FF;
                background: -webkit-linear-gradient(to right, #E100FF, #7F00FF);
                background: linear-gradient(to right, #E100FF, #7F00FF);">
                    <div class="title" style="color: white;"><span><?= Yii::t('app', 'Pages') ?><span></div>
                </div>
            </a>
        <?php endif; ?>
        <?php if (Yii::$app->user->can('admin')): ?>
            <a href="/rbac">
                <div class="col-lg-3 col-md-6 col-sm-12 admin_tabs" style="background: #0cebeb;
                background: -webkit-linear-gradient(to right, #29ffc6, #20e3b2, #0cebeb);
                background: linear-gradient(to right, #29ffc6, #20e3b2, #0cebeb);">
                    <div class="title"  style="color: white;"><span><?= Yii::t('app', 'Permissions') ?><span></div>
                </div>
            </a>
        <?php endif; ?>
    </div>

</div>
