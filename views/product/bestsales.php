<?php

use yii\helpers\Html;
use yii\bootstrap\ActiveForm;
use yii\helpers\ArrayHelper;
use yii\widgets\LinkPager;

/* @var $this yii\web\View */


?>

<main class="product-list catfilter">
    <div class="loader2"></div>
    <article class="header-list-grid ">
        <section class="show container p-0 d-flex  align-items-center justify-content-between">



            <div class="sort d-flex  align-items-center">

                پر فروش ترین محصولات :




            </div>

        </section>

    </article>

    <section class="filter-sec one list">


        <div class="container p-0">
            <div class="row">

                <div class="col-md-12">
                    <div class="row d-flex justify-content-between" id="product-content">
                        <?php foreach ($products as $product) {
                            ?>
                            <!--with New Badge-->
                            <div class="item">
                                <div class="details-item">

                                    <!-- <label class="badge off">
                                        ناموجود
                                    </label>   -->
                                    <ul class="nav">
                                        <!-- <li class="nav-item shopping">
                                            <i class="icon-046-crop-button"></i>
                                        </li> -->
                                        <li class="nav-item">
                                            <a href="/product/<?= $product['name'] ?>/"
                                               target="_blank"> <i class="icon-003-buy"></i></a>
                                        </li>
                                        <li class="nav-item icon-like">
                                            <i class="icon-012-like" id="like<?= $product['id'] ?>"
                                               data-like="<?= $product['id'] ?>"></i>
                                        </li>
                                    </ul>

                                    <script src="https://code.jquery.com/jquery-3.3.1.min.js"></script>
                                    <script>
                                        jQuery('#like<?=$product['id']?>').on('click', function (e) {
                                            e.preventDefault();
                                            var data = $(this).attr('data-like');
                                            console.log(data);
                                            $.ajax({
                                                url: '/product/like',
                                                data: {like: data}
                                            }).done(function (response) {
                                                sessionStorage.setItem('<?=$product['id']?>', data);
                                            });
                                        });
                                        $("#like<?=$product['id']?>").click(function () {
                                            $("#like<?=$product['id']?>").css("color", "red");
                                        });
                                    </script>


                                    <a href="/product/<?= $product['name'] ?>/" target="_blank">
                                        <img src="/<?= $product['img'] ?>" alt="">
                                    </a>
                                    <div class="text">
                                        <h3 class="title">
                                            <?= $product['name'] ?>
                                        </h3>
                                        <?php
                                        $today = Yii::$app->jdate->date('Y/m/d');

                                        if ( $today >= $product['start_date'] && $today <= $product['end_date']) {
                                            ?>
                                            <div class="price-item d-flex ">
                                                <del class="price-deleted"
                                                     style="color:#5e5e5e!important;">   <?= number_format($product['price']) ?>   </del>
                                                <span class="price">
                                                        <label class="badge off"
                                                               style="border-radius:5px!important;top:0px!important;width:80px!important;height:30px!important;">
                                                <?= $product['percent'] ?>%
                                                </label>
                                                        </span>
                                                <!-- <span class="price" style="margin-right: 80px!important;color:#d2d2d2!important;">       تخفیف    </span> -->
                                            </div>
                                            <div class="price-item d-flex ">
                                                <span class="price" style="color:#ed008c!important;">
                                                <?= number_format($product['price'] - ($product['price'] * $product['percent']) / 100) ?> هزار تومان
                                                </span>

                                            </div>

                                        <?php } else { ?>
                                            <span class="price"><?= number_format($product['price']) ?>   هزار تومان  </span>
                                        <?php }
                                        ?>
                                    </div>
                                </div>
                            </div>
                        <?php } ?>

                    </div>
                </div>
            </div>


        </div>
    </section>
    <!-- add new item -->
    <!-- for list grid -->
    <section class="filter-sec two list">
        <div class="container p-0" id="view2">
            <?php foreach ($products as $product) { ?>
                <div class="item item-line">
                    <div class="d-flex flex-wrap justify-content-around align-items-center">
                        <a href="/product/<?= $product['name'] ?>/" target="_blank">

                            <img src="/<?= $product['img'] ?>" alt="">
                        </a>
                        <div class="introduciton">
                            <h3 class="title">  <?= $product['name'] ?> </h3>
                            <span class="price ">  <?= number_format($product['price']) ?>  تومان </span>
                        </div>
                        <a href="/product/<?= $product['name'] ?>/" target="_blank" class="show">
    <span>
    مشاهده محصول
    </span>
                        </a>
                    </div>
                </div>
            <?php } ?>
        </div>
    </section>
    <section class="page-item">
        <div class="container p-0 d-flex justify-content-between align-items-center" id="pagenum">


        </div>
    </section>


</main>

<!-- get subcat api-->

<?php


$script = <<< JS



$(document).ready(function () { 
ConvertNumberToPersion();

});

 





























  
JS;
$this->registerJs($script);
?>


 



