<?php
use yii\helpers\Html;
use yii\widgets\ActiveForm;
use yii\helpers\ArrayHelper;
use yii\widgets\LinkPager;
/* @var $this yii\web\View */

$this->title = 'پیگیری سفارشات';
?>
<article class="contact-setting">
    <div class="container p-0 d-flex flex-wrap justify-content-between">
        <div class="col-xl-3 col-lg-3 col-md-3 col-sm-4 col-12 p-0 m-0">
                <aside class="porofile">
                    <article>
                        <section class="img-account">
                            <?php if(\yii::$app->users->img()){?>
                                 <img src="/uploads/<?=\yii::$app->users->img()?>" >
                            <?php } else{ ?>
                                <img src="/img/pc-profile.png" alt="">
                            <?php } ?>
                        </section>

                        <section class="name-item">
                                <h6 class="name">
                                    <?=\yii::$app->users->name(); ?>
                                </h6>
                                <span class="degree">کاربر
                                    <?php if(\yii::$app->users->status()=='normal'){
                                        echo 'عادی';
                                    }elseif(\yii::$app->users->status()=='silver'){
                                        echo'نقره ای';
                                    }elseif(\yii::$app->users->status()=='gold'){
                                        echo'طلایی';
                                    }
                                    ?> 
                                        بی سی سی
                                 </span>
                         </section>

                        <ul class="navigation">
                            <li class="nav-item ">
                                <a href="/user" class="nav-link">
                                    <i class="icon-settings-work-tool"></i>
                                    تنظیمات اکانت
                                </a>
                            </li>
                            <li class="nav-item">
                                <a href="/user/address/address" class="nav-link">
                                    <i class="icon-085-placeholder-1"></i>
                                    آدرس حمل و نقل
                                </a>
                            </li>
                            <li class="nav-item">
                                <a href="/user/size/index" class="nav-link">
                                    <i class="icon-085-placeholder-1"></i>
                                    سایز البسه من
                                </a>
                            </li>
                            <li class="nav-item">
                                <a href="/user/myfavourits/index" class="nav-link">
                                    <i class="icon-020-box-1"></i>
                                    خرید های قبلی
                                </a>
                            </li>
                            <li class="nav-item active">
                                <a href="/user/order/index" class="nav-link">
                                    <i class="icon-organization"></i>
                                    پیگیری سفارشات
                                </a>
                            </li>
                            <li class="nav-item">
                                <a href="#" class="nav-link">
                                    <i class="icon-008-medal"></i>
                                    باشگاه مشتریان ما
                                    <i class="icon-041-star"></i>
                                </a>
                            </li>
                        
                            <li class="nav-item ">
                                <a href="/user/addcomment/index" class="nav-link">
                                    <i class="icon-chat" ></i>
                                    انتقاد و پیشنهاد
                                </a>
                            </li>
                            <li class="nav-item log-out">
                                <a href="/site/logouted" class="nav-link">
                                    <i class="icon-power-button-off"></i>
                                    خروج
                                </a>
                            </li>
                        </ul>
                    </article>
                </aside>
        </div>

        <div class="col-xl-9 col-lg-9 col-md-9 col-sm-8 col-12 p-0">
            <main class="main d-flex flex-wrap">
                <div class="dashboard">
                    <form action="">
                        <div class="title-dashboard">
                            <div class="col-xl-12">
                                <span class="title">
                                    پیگیری سفارشات
                                </span>
                            </div>
                        </div>
                        <div class="detail-dashboard d-flex flex-wrap">
                            <!-- <div class="col-xl-9 col-lg-9 col-md-8 col-sm-12 col-12">
                                <div class="input-item">
                                    <label for="name">
                                        کد پیگیری
                                    </label>
                                    <input type="text" id="name">
                                </div>
                            </div> -->
                            <!-- <div class="col-xl-3 col-lg-3 col-md-4 col-sm-4 col-12 d-flex justify-content-end align-items-end">
                                <button class="btn btn-submit btn-search w-100 btn-pink">
                                    جستجو کن
                                </button>
                            </div> -->

                            <div class="col-xl-12">
                                <div class="order-map" style="overflow-x: auto ; overflow-y: hidden">
                                    <div style="min-width: 700px">
                                        <div class="thead d-flex">
                                            <div class="th">
                                                شناسه سفارش
                                            </div>
                                            <div class="th">
                                                تاریخ ثبت
                                            </div>
                                            <div class="th">
                                                مبلغ کل
                                            </div>
                                            <div class="th">
                                                پرداخت
                                            </div>
                                            <div class="th text-center">
                                                مشاهده جزئیات
                                            </div>
                                            <!-- <div class="th text-center">
                                                وضعیت
                                            </div> -->
                                        </div>
                                        
                                        <div class="tbody">
                                        <?php  foreach($carts as $cart){
                                            $bascket = $cart->basckets[0]
                                            ?>
                                            <div class="item item-order-map">
                                                <div class="tr d-flex">
                                                    <div class="td">
                                                    <?=$bascket->refID?>
                                                    </div>
                                                    <div class="td">
                                                    <?=$bascket->submitDate ?>
                                                    </div>
                                                    <div class="td">
                                                    <?=$bascket->amount ?> تومان
                                                    </div>
                                                    <div class="td">
                                                    <?php if($bascket->status==1){?>
                                                       موفق
                                                    <?php }elseif($bascket->status==2){ ?>
                                                    پرداخت در محل
                                                    <?php }else{ ?>
                                                        انجام نشده است
                                                    <?php } ?>
                                                    </div>
                                                    <div class="td text-center">
                                                        <span class="btn btn-icon">
                                                            <i class="icon-004-down-chevron"></i>
                                                            <i class="icon-007-up-chevron d-none"></i>
                                                        </span>
                                                    </div>
                                                    <div class="td text-center">
                                                        <!-- <span class="status green-status">
                                                        موجود
                                                        </span> -->
                                                    </div>
                                                </div>
                                                <div class="drop-down">
                                                <?php foreach($cart->cartoptions as $cartoption){
                                                    foreach ($cartoption->product as $product){
                                                        ?>
                                                    <div class="top-drop-down d-flex justify-content-between align-items-center">
                                                   
                                                        <div class="right d-flex align-items-center">
                                                            <div class="image">
                                                                <img src="/<?=$product->productimgs->img?>" alt="">
                                                            </div>
                                                            <div class="detail">
                                                                <h3 class="title">
                                                                    <?=$product->name?>
                                                                </h3>
                                                                <h4 class="subtitle">
                                                                <?=$product->plan->name?>    
                                                                </h4>
                                                                <h4 class="subtitle">
                                                                 <?=(isset($feature->value))?$feature->value:''?>
                                                                </h4>
                                                                <div class="count-product count">
                                                                    <!-- <div class="btn btn-minus down">
                                                                        <i class="icon-006-left-chevron"></i>
                                                                    </div> -->
                                                                <?=$cartoption->count?>
                                                                   <!-- <div class="btn btn-plus up">
                                                                        <i class="icon-005-right-chevron"></i>
                                                                    </div> -->
                                                                </div>
                                                            </div>
                                                        </div>
                                                       
                                                        <div class="left d-flex">
                                                            <div>
                                                            <span class="discount">
                                                                 
                                                            </span>
                                                              
                                                                <span class="price">
                                                                    <?=$cartoption->amount?> تومان
                                                                </span>
                                                            </div>

                                                            <div style="margin-right: 30px">
                                                                <span class="price-item">
                                                                <?=$cartoption->amount*$cartoption->count?>تومان
                                                                </span>
                                                                <!-- <button class="btn btn-submit">
                                                                    بررسی سفارش
                                                                </button> -->


                                                            </div>
                                                        </div>
                                                    </div>
                                                    <?php }  }?>
                                                    <div class="middle-drop-down">
                                                    <?php if($bascket->recived==0){ ?>
                                                        <ul class="nav">
                                                             <li class="nav-item">
                                                                <span class="t">نام و نام خانوادگی  </span>
                                                                <span class="d"><?=$bascket->name.' '. $bascket->family?>   </span>
                                                            </li>
                                                            <li>
                                                                /
                                                            </li>
                                                            <li class="nav-item">
                                                        <span class="t"> استان , شهر  </span>
                                                        <span class="d"><?=$bascket->state->name ?>-<?=$bascket->city->name?> </span>
                                                            </li>
                                                            <li>
                                                                /
                                                            </li>
                                                            <li class="nav-item">
                                                        <span class="t"> شماره تماس  </span>
                                                                <span class="d"><?=$bascket->mobile ?>  </span>
                                                            </li>
                                                            <li class="nav-item w-100">
                                                        <span class="t">
 نشانی
                                                        </span>
                                                        <span class="d"><?=$bascket->address?>  </span>
                                                            </li>
                                                        </ul>
                                                        <!-- <ul class="nav">
                                                            <li class="nav-item w-100">
                                                        <span class="t pink">
 پرداخت از طریق کارت به کارت
                                                        </span>
                                                                <span class="d">
  5022291064045389 بانک پاسارگاد به نام علیرضا درخشان
                                                        </span>
                                                            </li>
                                                        </ul> -->
                                                    <?php } ?>
                                                    </div>
                                                    <div class="drop-down-bottom">
                                                        <section class="order-status">
                                                            <ul class="nav status-items">
                                                            <?php if($bascket->condition==1){ ?>
                                                                <li class="nav-item">
                                                                    <div class="icon">
                                                                        <i class="icon-040-round-information-button"></i>
                                                                    </div>
                                                                    <span class="title">   در حال بررسی  </span>
                                                                </li>
                                                            <?php }elseif($bascket->condition==2){?>
                                                                <li class="nav-item">
                                                                    <div class="icon">
                                                                        <i class="icon-023-tick"></i>
                                                                    </div>
                                                                    <span class="title"> تائید سفارش  </span>
                                                                </li>
                                                            <?php }elseif($bascket->condition==3){ ?>
                                                                <li class="nav-item active-item">
                                                                    <div class="icon">
                                                                        <i class="icon-027-telegram"></i>
                                                                    </div>
                                                                    <span class="title">    ارسال شده   </span>
                                                                </li>
                                                            <?php }elseif($bascket->condition==4){ ?>
                                                                <li class="nav-item">
                                                                    <div class="icon">
                                                                        <i class="icon-020-box-1"></i>
                                                                    </div>
                                                                    <span class="title">   وضعیت نهایی    </span>
                                                                </li>
                                                            <?php }elseif($bascket->condition==null){ ?>
                                                                <li class="nav-item">
                                                                    <div class="icon">
                                                                        <i class="icon-020-box-1"></i>
                                                                    </div>
                                                                    <span class="title">  در انتظار بررسی کارشناسان  </span>
                                                                </li>
                                                            <?php } ?>
                                                            </ul>
                                                            <div class="detail-status d-flex ">
                                                                <div class="col-xl-6 col-lg-6 col-sm-6 col-12 d-flex flex-wrap">
                                                                    <p class="text"><?=$bascket->commentadmin ?> </p>
                                                                    <span class="status"><?php if($bascket->condition==1){
                                                                        echo'در حال بررسی ';
                                                                    }elseif($bascket->condition==2){
                                                                        echo'تایید سفارش';
                                                                    }elseif($bascket->condition==3){
                                                                        echo 'ارسال شده';
                                                                    }elseif($bascket->condition==4){
                                                                        echo 'وضعیت نهایی';
                                                                    }elseif($bascket->condition==null){
                                                                        echo 'در انتظار بررسی کارشناسان';
                                                                    }?> </span>
                                                                </div>
                                                                <div class="col-xl-6 col-lg-6 col-sm-6 col-12">
                                                                    <div class="image">
                                                                        <div class="icon">
                                                                            <i style="background-image: url('/img/status-truck.png')"></i>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </section>
                                                    </div>
                                                  
                                                </div>
                                            </div>
                                                    <?php } ?>
                                  
                            <ul class="nav justify-content-end w-100">
                            <li class="nav-item">
                                <?php
                                //  echo LinkPager::widget([
                                // 'pagination' => $pagination ,
                                
                                // ]);
                                ?>
                            
                            
                                </li>
                            </ul>
                        </div>
                    </form>
                </div>
            </main>
        </div>
    </div>
</article>


<?php
$script = <<< JS

    // Order Mp

    $(function(){
        $('.count-product').on('click', '.btn', function(e){
            var input = $(this).parents('div.count-product').children('input');
            var value = parseInt(input.attr('value'));
            var min = parseInt(input.attr('min'));
            var max = parseInt(input.attr('max'));
            if ($(this).hasClass('up')) { var op = +1;} else {var op = -1;}
            if (!(min==value && op == -1) && !(max==value && op == +1)) {
                input.attr('value', value + op)
            }
        })
    });


    // Order Mp

    $('.item-order-map .tr').click( function () {
        $(this).parent().find('.drop-down').slideToggle();
        $(this).find('.td .btn i').toggleClass('d-none')
    });


    $('.porofile .navigation .nav-item').click( function () {
        $('.porofile .navigation .active').removeClass('active');
        $(this).addClass('active')
    });

JS;
$this->registerJs($script);
?>
