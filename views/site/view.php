<?php

/* @var $this yii\web\View */
/* @var $model app\models\Pages */
$this->title = $model->title;
$this->registerJsFile('/js/tabs.js', ['depends' => \yii\web\JqueryAsset::className()]);
?>

<?=$model->content?>
