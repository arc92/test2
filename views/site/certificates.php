<?php
use yii\helpers\Html;
use yii\bootstrap\ActiveForm;
use yii\helpers\ArrayHelper; 
/* @var $this yii\web\View */

$this->title = 'گواهینامه ها';
?>
<div class="govahinameh">
    <div class="container p-0 d-flex flex-wrap">
    <?php foreach($models as $model){ ?>
        <div class="col-xl-3 col-lg-3 col-md-4 col-sm-6 col-12">
            <a href="#" class="item">
                <img src="/uploads/<?=$model->img?>" alt="">
                <span class="title">
                  <?=$model->name?>
                </span>
                <p class="title">
                   <?=$model->text ?>
                </p>
            </a>
        </div>
    <?php } ?>
    </div>
</div>
