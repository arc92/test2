<?php

use yii\helpers\Html;
use yii\bootstrap\ActiveForm;
use yii\helpers\ArrayHelper;
use yii\widgets\LinkPager;
/* @var $this yii\web\View */

 
?>
<section class="table-size page-footer">
    <div class="container">
        <h2 class="title">
            راهنمای جدول سایز
        </h2>
        <?php foreach($sizes as $size){ ?>
        <p class="text"> <?=$size->text?> </p>
  

        <img class="table-img" src="/uploads/<?=$size->img?>" alt=""> 

              <?php } ?>
        <!--<table id="t01">-->
            <!--<tr>-->
                <!--<th>سن </th>-->
                <!--<th>ارتفاع (سانتی متر)</th>-->
                <!--<th>وزن (کیلوگرم)</th>-->
            <!--</tr>-->
            <!--<tr>-->
                <!--<td> نوزاد(زود رس)</td>-->
                <!--<td>45-58</td>-->
                <!--<td>3/5-5/5</td>-->
            <!--</tr>-->
            <!--<tr>-->
                <!--<td>0-3 ماه</td>-->
                <!--<td>58-64</td>-->
                <!--<td>5/5-7/5</td>-->
            <!--</tr>-->
            <!--<tr>-->
                <!--<td>3-6 ماه</td>-->
                <!--<td>64-68</td>-->
                <!--<td>7/5-9/5</td>-->
            <!--</tr>-->
            <!--<tr>-->
                <!--<td>6-9 ماه</td>-->
                <!--<td>68-75</td>-->
                <!--<td>9/5-11</td>-->
            <!--</tr>-->
            <!--<tr>-->
                <!--<td>9-12 ماه</td>-->
                <!--<td>75-78</td>-->
                <!--<td>11-13</td>-->
            <!--</tr>-->
        <!--</table>-->
    </div>
</section>