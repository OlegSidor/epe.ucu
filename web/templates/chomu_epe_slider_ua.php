<?php

use evgeniyrru\yii2slick\Slick;

/* @var $this yii\web\View */

?>
<style>
    .item img {
        width: 100%;
    }

    .item strong {
        display: block;
        margin-bottom: 10px;
    }
    .item p{
        font-weight: normal;
    }

    .slider {
        width: 60%;
        margin: 50px;
    }

    .slider .slick-arrow {
        z-index: 1;
        height: 100%;
        width: 5%;
    }

    .slider .slick-arrow.slick-next {
        right: -50px;
    }

    .slider .slick-arrow.slick-prev {
        left: -50px;
    }

    .slick-prev:before, .slick-next:before {
        color: #b90000;
        font-size: 25px;
    }
</style>
<?php echo Slick::widget([

    'containerOptions' => ['class' => 'slider'],
    'jsPosition'       => yii\web\View::POS_END,
    'items'            => ['
<div class="item">
    <div class="row">
        <div class="col-md-4 col-sm-12"><img src="http://epe.ucu.edu.ua/wp-content/uploads/2017/02/circle-1.png"></div>
        <div class="col-md-8 col-sm-12"><strong>Владика Борис Ґудзяк, Президент УКУ</strong>
            <p> З одного боку світ сьогодні глобалізується, а з іншого боку – відбувається страшна атомізація. І є багато тріщин у цій постмодерній культурі, яка складається з колажу і не завжди творить цілість. Програма «Етика-Політика-Економіка» саме в католицькому університеті в Україні пропонує студентові позбиратися і мати цілісний погляд, світогляд і стратегію для плідної праці упродовж свого життя» </p>
        </div>
    </div>
</div>    
', '
<div class="item">
    <div class="row">
        <div class="col-md-4 col-sm-12"><img src="http://epe.ucu.edu.ua/wp-content/uploads/2017/02/circle.png"></div>
        <div class="col-md-8 col-sm-12"><strong>Володимир Турчиновський, декан факультету суспільних наук</strong>
            <p>Ми хочемо підготувати наших молодих людей до майбутнього та допомогти сформувати їм нові компетенції людини ХХІ століття, а саме: вміння думати, комунікувати і орієнтуватися в ситуаціях, які змінюються, – зазначає декан факультету суспільних наук УКУ Володимир Турчиновський. – Програма «Етика-Політика-Економіка» є однією із кращих нагод в Україні, щоб відчути себе людиною, яка знає, вміє, може вивчити нові тренди, моделі, думання і в результаті ініціювати інноваційні рішення, а не займатися діяльністю, яку можна легко перейняти. </p>
        </div>
    </div>
</div>    
', '
<div class="item">
    <div class="row">
        <div class="col-md-4 col-sm-12"><img src="http://epe.ucu.edu.ua/wp-content/uploads/2017/03/pidlisniy_EPE-1024x1024.jpg"></div>
        <div class="col-md-8 col-sm-12"><strong>Юрій Підлісний, керівник програми Етика – Політика – Економіка</strong>
           <p>Україна потребує лідерів із візією країни, в якій хочеться жити, які вміють мотивувати, вести за собою і досягати результату, для яких гідність людини, спільне благо і рівні можливості для всіх – є життєвим кредом.<br>
Програма «Етика-Політика-Економіка» – це інструмент виховання такого лідера, це наш внесок у зміну України.<br>
Мета амбітна і водночас досяжна!</p>
           </div>
    </div>
</div>    
',
    ],

    'clientOptions' => [
        'autoplay'      => true,
        'arrows'        => true,
        'dots'          => true,
        'adaptiveHeight' => true,
        'autoplaySpeed' => 2000,
    ],

]); ?>

