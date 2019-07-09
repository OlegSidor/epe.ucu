<?php


/* @var $this yii\web\View */

use yii\bootstrap\NavBar;
use kartik\nav\NavX;
?>

<?php
NavBar::begin([
    'options' => [
        'class' => 'navbar-inverse',
    ],
]);
echo NavX::widget([
    'options' => ['class' => 'navbar-nav'],
    'items' => $items,
]);
NavBar::end();
?>

