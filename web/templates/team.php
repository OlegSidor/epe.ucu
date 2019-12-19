<?php

use app\models\Team;
use yii\bootstrap\Modal;

/* @var $this yii\web\View */

$team = Team::find()->asArray()->all();

?>
    <style>
        .team .wrapper img {
            object-fit: cover;
            width: 100%;
            height: 100%;
        }

        .team .item .img {
            position: relative;
            overflow: hidden;
        }

        .team .item {
            position: relative;
        }

        .team .item .img:before {
            display: block;
            content: "";
            width: 200%;
            height: 300%;
            position: absolute;
            background: #0069ff;
            opacity: 0.4;
            padding-right: 5px;
            border-bottom: white 200px solid;
            transform: rotateZ(45deg) translateX(-25%) translateY(-90%);
            transition-duration: .7s;
        }

        .team .item:hover .img:before {
            transform: rotateZ(45deg) translateX(-25%) translateY(10%);
        }

        .team .title {
            font-weight: bold;
            font-size: 22px;
            font-family: "Arial Narrow";
        }

        .team .description {
            position: absolute;
            font-weight: bold;
            width: 80%;
            bottom: 100px;
            right: 50px;
            color: white;
            text-align: right;
            opacity: 0;
            transition-duration: .5s;
        }

        .team .item:hover .description {
            opacity: 1;
        }

        .team .description:after {
            content: "";
            display: block;
            width: 5px;
            height: 100%;
            position: absolute;
            background: white;
            right: -20px;
            top: 0px;
        }
        .m-close {
            position: absolute;
            right: 20px;
            top: 20px;
            cursor: pointer;
        }

        @media (max-width: 768px) {
            .team .item .img:before {
                transform: rotateZ(45deg) translateX(-25%) translateY(10%);
            }

            .team .item .description {
                opacity: 1;
            }
        }
    </style>
    <div class="row team">
        <?php foreach ($team as $person): ?>
            <div class="col-lg-3 col-md-6 col-sm-12 item" onclick="showModal('<?= $person['name'] ?>', this);">
                <div class="wrapper">
                    <div class="img"><img src="<?= $person['img'] ?>"></div>
                    <div class="title"><?= $person['name'] ?></div>
                    <div class="description">
                        <?= $person['short_description'] ?>
                    </div>
                    <div class="full_desc hidden">
                        <?= $person['description'] ?>
                    </div>
                </div>
            </div>
        <?php endforeach; ?>
    </div>

    <div id="modal" class="modal fade bd-example-modal-lg">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <i data-dismiss="modal" aria-hidden="true" class="m-close fas fa-times"></i>
                    <h4 class="modal-title"></h4>
                </div>
                <div class="modal-body">
                </div>
            </div>
        </div>
    </div>

<?php
$js = <<<JS
function showModal(name, item){
    $('#modal .modal-body').html($(item).find('.full_desc').html());
    $('#modal .modal-title').html(name);
    $("#modal").modal('show');
}
JS;
$this->registerJs($js, \yii\web\View::POS_READY)
?>