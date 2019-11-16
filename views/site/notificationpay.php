<?php

/* @var $this yii\web\View */

$this->title = 'Notification One';
?>
<main class="notification blue">
    <section class="box"style="background-image: url('/img/blue-nft.png')">
        <div class="detail" >
            <i class="icon-023-tick"></i>
            <span class="title">
        مشتری گرامی ثبت سفارش شما با موفقیت انجام شد<br>کارشناسان ما در اسرع وقت با شما تماس خواهند گرفت.
        </span> 

        <span class="title"> شماره سفارش :
        <?php
        if(isset($_GET['orderID'])){
            echo $_GET['orderID'];
        }
        ?>
        </span> 
        </div>
    </section>
</main>