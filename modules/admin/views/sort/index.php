<?php
/* @var $this yii\web\View */
/* @var $tabs array */


use kartik\sortable\Sortable;
use yii\helpers\Html;

if(Yii::$app->user->can('modifySort'))
    $this->registerJsFile('/js/sort.js', ['depends' => \yii\web\JqueryAsset::className()]);
$this->title = Yii::t('app', 'Сортування вкладок');

?>
<?php if(Yii::$app->user->can('modifySort')) : ?>
<?= Html::submitButton(Yii::t('app', 'Save'), ['class' => 'btn btn-success', 'onclick' => 'sort()']) ?>
<br><br>
<?php endif; ?>
<?php
foreach ($tabs as $tab) {
    echo Sortable::widget([
        'items' => $tab,
    ]);
}
?>

<?php if(Yii::$app->user->can('modifySort')) : ?>
    <?= Html::submitButton(Yii::t('app', 'Save'), ['class' => 'btn btn-success', 'onclick' => 'sort()']) ?>
<?php endif; ?>
