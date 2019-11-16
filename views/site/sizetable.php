<?php

use yii\helpers\Html;
use yii\bootstrap\ActiveForm;
use yii\helpers\ArrayHelper;
use yii\widgets\LinkPager;
/* @var $this yii\web\View */

$this->title = 'محصولات';
?>
    <section class="table-size page-footer">
    <div class="container">
        <h2 class="title">
            راهنمای جدول سایز
        </h2>
        <p class="text">
           <?=$sizeone->text?>
        </p>
        <table id="t01">
            <tr>
                <th>سن </th>
                <th>ارتفاع (سانتی متر)</th>
                <th>وزن (کیلوگرم)</th>
            </tr>
            
        <?php foreach($size as $sizes){ ?>
  
            <tr>
                <td> <?=$sizes->age?></td>
                <td><?=$sizes->height?></td>
                <td><?=$sizes->width?></td>
            </tr>
        <?php } ?>
        </table>
    </div>
</section>