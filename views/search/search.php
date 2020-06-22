<?php

use yii\helpers\Html;
use yii\bootstrap\ActiveForm;
use yii\helpers\ArrayHelper;
use yii\widgets\LinkPager;

/* @var $this yii\web\View */


$this->title = 'محصولات';
?>
<main class="product-list">


<!--    <article class="header-list-grid ">-->
<!---->
<!--        <section class="show container p-0 d-flex  align-items-center justify-content-between">-->
<!---->
<!--            <div class="number d-flex  align-items-center">-->
<!--                <span class="title number-title">   بر اساس تعداد نمایش  :    </span>-->
<!--                <select name="state" class="js-example-basic-single" id="show">-->
<!--                    <option> لطفا انتخاب کنید</option>-->
<!--                    <option value="10"> نمایش 10 عدد</option>-->
<!--                    <option value="20"> نمایش 20 عدد</option>-->
<!--                    <option value="30"> نمایش 30 عدد</option>-->
<!--                </select>-->
<!--            </div>-->
<!---->
<!--            <div class="sort d-flex  align-items-center">-->
<!---->
<!--<span class="title sort-title">-->
<!---->
<!--        مرتب سازی بر اساس  :-->
<!---->
<!--</span>-->
<!---->
<!--                <ul class="nav">-->
<!--                    -->
<!--                    <li class="nav-item active category-button" data-filter="one">-->
<!---->
<!--                        <i class="icon-menu-4"></i>-->
<!---->
<!--                    </li>-->
<!---->
<!--                    <li class="nav-item  category-button" data-filter="two">-->
<!---->
<!---->
<!--                        <i class="icon-menu-3"></i>-->
<!---->
<!--                    </li>-->
<!---->
<!--                </ul>-->
<!---->
<!--            </div>-->
<!---->
<!--        </section>-->
<!--        <section class="filter container p-0 d-flex flex-wrap  justify-content-around align-items-center">-->
<!--            <span class="title">-->
<!--            انتخاب فیلتر ها بر اساس  :-->
<!--        </span>-->
<!--            --><?php //$form = ActiveForm::begin([
//                'action' => 'search',
//                'fieldConfig' => [
//                    'template' => '{input}{label}{hint}',
//                    'horizontalCssClasses' => [
//                        'label' => '',
//                        'offset' => '',
//                        'wrapper' => '',
//                        'error' => '',
//                        'hint' => '',
//                    ],
//                ]
//            ]); ?>
<!--            --><?//= $form->field($category, 'id', ['options' => ['style' => 'display:inline-block;']])->dropDownList(ArrayHelper::map(\app\models\Category::find()->all(), 'id', 'name'), ['prompt' => 'انتخاب دسته بندی', 'class' => 'js-example-basic-single auto'])->label('') ?>
<!--            --><?//= $form->field($subcat, 'id', ['options' => ['style' => 'display:inline-block;']])->dropDownList(ArrayHelper::map(\app\models\Subcat::find()->all(), 'id', 'name'), ['prompt' => 'انتخاب جنسیت..', 'class' => 'js-example-basic-single auto'])->label('') ?>
<!--            --><?//= $form->field($model, 'planID', ['options' => ['style' => 'display:inline-block;']])->dropDownList(ArrayHelper::map(\app\models\Plan::find()->Where(['status' => 1])->orderBy(['id' => SORT_DESC])->all(), 'id', 'name'), ['prompt' => 'انتخاب طرح..', 'class' => 'js-example-basic-single auto'])->label('') ?>
<!--            --><?//= $form->field($model, 'colorID', ['options' => ['style' => 'display:inline-block;']])->dropDownList(ArrayHelper::map(\app\models\Color::find()->all(), 'id', 'value'), ['prompt' => 'انتخاب رنگ..', 'class' => 'js-example-basic-single auto'])->label('') ?>
<!--            --><?//= $form->field($size, 'id', ['options' => ['style' => 'display:inline-block;']])->dropDownList(ArrayHelper::map(\app\models\Size::find()->all(), 'age', 'age'), ['prompt' => 'انتخاب سایز..', 'class' => 'js-example-basic-single auto'])->label('') ?>
<!---->
<!---->
<!---->
<!--            --><?php //ActiveForm::end(); ?>
<!--        </section>-->
<!--    </article>-->


    <h4 style="margin-right: 50px;">نتیجه جستجو:</h4>

    <?php
        $title = 'جستجوی ';
        $title .= "<span style='color:#ed008c'>$searchedKeyword</span>";
        $title .= ' در دسته بندی ';
        $title .= "<span style='color:#ed008c'>$selectedIn</span>";
        $title .= ' ها ';
    ?>

    <span style="margin-right: 30px; font-size: 13px "><?=$title?></span>

    <section class="filter-sec one list">

        <?php if (Yii::$app->session->hasFlash('error-search')): ?>

            <div class="alert alert-danger col-md-12 text-center"
                 style="font-size:25px;margin-top:100px;margin-bottom:100px;">

                <button aria-hidden="true" data-dismiss="alert" class="close" type="button">×</button>

                <?= Yii::$app->session->getFlash('error-search') ?>

            </div>

        <?php endif; ?>
        <div class="container p-0">

            <div class="row d-flex justify-content-between" id="product-content">

                <?php foreach ($search as $item) {
                    $item = $item['_source'];
                    $hasEntity = 0;
                    foreach ($item['product_details'] as $eachSize) {
                        $hasEntity += $eachSize['count'];
                    }
                    ?>

                    <!--with New Badge-->

                    <div class="item">

                        <div class="details-item">

                            <!-- <label class="badge new">

                                جدید

                            </label> -->


                            <ul class="nav">
                                <!-- <li class="nav-item shopping">
                                    <i class="icon-046-crop-button"></i>
                                </li> -->
                                <li class="nav-item">
                                    <a href="/product/<?= $item['product_id'] ?>/<?= str_replace(' ', '-', $item['product_name']) ?>/">
                                        <i
                                                class="icon-003-buy"></i></a>
                                </li>
                                <li class="nav-item icon-like liked">
                                    <i class="icon-012-like" id="like<?= $item['product_id'] ?>"
                                       data-like="<?= $item['product_id'] ?>"></i>
                                </li>
                            </ul>

                            <a href="/product/<?= $item['product_id'] ?>/<?= str_replace(' ', '-', $item['product_name']) ?>/">

                                <img src="/<?= $item['product_images'][0]['url'] ?>" alt="">


                            </a>

                            <div class="text">

                                <h3 class="title">

                                    <?= $item['product_name'] ?>

                                </h3>
                                <?php if (!$hasEntity) { ?>
                                    <div class="price-item d-flex ">
                                        <span class="price"
                                              style="color: #ababab;font-size: 1.286rem;line-height: 1.222;font-weight: 400;margin-top: 20px;"> ـــــــــــــــــــــ  ناموجود   ــــــــــــــــــــــ</span>
                                    </div>
                                <?php } else { ?>
                                    <?php if (!is_null($item['product_details'][0]['discount'])) { ?>
                                        <div class="price-item d-flex ">
                                            <del class="price-deleted"
                                                 style="color:#5e5e5e!important;">   <?= number_format($item['product_details'][0]['price']) ?>   </del>
                                            <span class="price">
                               <label class="badge off"
                                      style="border-radius:5px!important;top:0px!important;width:80px!important;height:30px!important;">
                        <?= $item['product_details'][0]['discount'] ?>%
                      </label>
                                </span>
                                            <!-- <span class="price" style="margin-right: 80px!important;color:#d2d2d2!important;">       تخفیف    </span> -->
                                        </div>
                                        <div class="price-item d-flex ">
                                <span class="price" style="color:#ed008c!important;">
                                <?= number_format($item['product_details'][0]['price_with_discount']) ?> هزار تومان
                               </span>

                                        </div>

                                    <?php } else { ?>
                                        <span class="price"><?= number_format($item['product_details'][0]['price']) ?>   هزار تومان  </span>
                                    <?php }
                                } ?>

                            </div>

                        </div>

                    </div>

                <?php } ?>


            </div>


        </div>

    </section>

    <!-- end -->
    <section class="page-item">

        <div class="container p-0 d-flex justify-content-between align-items-center">


        </div>

    </section>

</main>


 
