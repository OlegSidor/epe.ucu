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
        <?php if (Yii::$app->user->can('viewEvents')): ?>
            <a href="/admin/events">
                <div class="col-lg-3 col-md-6 col-sm-12 admin_tabs" style="background: #6a3093;  /* fallback for old browsers */
background: -webkit-linear-gradient(to right, #a044ff, #6a3093);  /* Chrome 10-25, Safari 5.1-6 */
background: linear-gradient(to right, #a044ff, #6a3093); /* W3C, IE 10+/ Edge, Firefox 16+, Chrome 26+, Opera 12+, Safari 7+ */
 ">
                    <div class="title" style="color: white;"><span><?= Yii::t('app', 'Events') ?><span></div>
                </div>
            </a>
        <?php endif; ?>
        <?php if (Yii::$app->user->can('viewAnnouncements')): ?>
            <a href="/admin/announcements">
                <div class="col-lg-3 col-md-6 col-sm-12 admin_tabs" style="
background: #B24592;  /* fallback for old browsers */
background: -webkit-linear-gradient(to right, #F15F79, #B24592);  /* Chrome 10-25, Safari 5.1-6 */
background: linear-gradient(to right, #F15F79, #B24592); /* W3C, IE 10+/ Edge, Firefox 16+, Chrome 26+, Opera 12+, Safari 7+ */
 ">
                    <div class="title" style="color: white;"><span><?= Yii::t('app', 'Announcements') ?><span></div>
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
                    <div class="title" style="color: white;"><span><?= Yii::t('app', 'Permissions') ?><span></div>
                </div>
            </a>
        <?php endif; ?>
        <?php if (Yii::$app->user->can('viewTextBlocks')): ?>
            <a href="/admin/text-blocks">
                <div class="col-lg-3 col-md-6 col-sm-12 admin_tabs" style="background: #DA4453;
                background: -webkit-linear-gradient(to right, #89216B, #DA4453);
                background: linear-gradient(to right, #89216B, #DA4453);">
                    <div class="title" style="color: white;"><span><?= Yii::t('app', 'TextBlocks') ?><span></div>
                </div>
            </a>
        <?php endif; ?>
        <?php if (Yii::$app->user->can('viewSort')): ?>
            <a href="/admin/sort">
                <div class="col-lg-3 col-md-6 col-sm-12 admin_tabs" style="background: #e52d27;
background: -webkit-linear-gradient(to right, #b31217, #e52d27);
background: linear-gradient(to right, #b31217, #e52d27);
">
                    <div class="title" style="color: white;"><span><?= Yii::t('app', 'Tabs sort') ?><span></div>
                </div>
            </a>
        <?php endif; ?>
        <?php if (Yii::$app->user->can('viewTeam')): ?>
            <a href="/admin/team">
                <div class="col-lg-3 col-md-6 col-sm-12 admin_tabs" style="background: #833ab4;  /* fallback for old browsers */
background: -webkit-linear-gradient(to right, #fcb045, #fd1d1d, #833ab4);  /* Chrome 10-25, Safari 5.1-6 */
background: linear-gradient(to right, #fcb045, #fd1d1d, #833ab4); /* W3C, IE 10+/ Edge, Firefox 16+, Chrome 26+, Opera 12+, Safari 7+ */
">
                    <div class="title" style="color: white;"><span><?= Yii::t('app', 'Team') ?><span></div>
                </div>
            </a>
        <?php endif; ?>
    </div>

</div>
