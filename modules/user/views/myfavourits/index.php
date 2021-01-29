

<?php



/* @var $this yii\web\View */



$this->title = 'خرید های قبلی من';

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

                        <span class="degree">

                    کاربر <?php if(\yii::$app->users->status()=='normal'){

                        echo 'عادی';

                    }elseif(\yii::$app->users->status()=='silver'){

                        echo'نقره ای';

                    }elseif(\yii::$app->users->status()=='gold'){

                        echo'طلایی';

                    }

                        ?> بی سی سی

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

                        <li class="nav-item active">

                            <a href="/user/myfavourits/index" class="nav-link">

                                <i class="icon-020-box-1"></i>

                                خرید های قبلی

                            </a>

                        </li>

                        <li class="nav-item">

                            <a href="/user/order/index"" class="nav-link">

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

                    <!--favourite-->

                    <div class="title-dashboard">

                        <div class="col-xl-12">

                    <span class="title">

                          خرید های قبلی من

                    </span>

                        </div>

                    </div>

                    <div class="detail-dashboard d-flex flex-wrap">

                        <?php   foreach($carts as $cart){   
                                    foreach($cart->cartoptions as $option){
                                    foreach($option->product as $product){


                                    foreach($cart->basckets as $bascket){
                                        ?>
                        <div class="col-xl-12">

                            <div class="item-favourite">

                                <article class="d-flex align-items-center flex-wrap">

                                    <div class="image">

                                        <a href="/product/<?=$product->name?>/">
                                            <img src="/<?=$product->productimgs->img?>" alt="">
                                        </a>

                                    </div>

                                    <div class="detail">

                                        <h3 class="title"><?=$product->name?></h3>

                                        <h4 class="subtitle"><?=$product->plan->name?>  </h4>

                                        <h4 class="subtitle"><?=(isset($feature->value))?$feature->value:''?> </h4>

                                        <div class="seen-detail" id="item1">

                                            مشاهده جزئیات

                                        </div>

                                    </div>
                                    <div class="price-unit"> 
                                     <span class="titr"> قیمت هر واحد   </span> 
                                        <span class="price"> <?=$option->amount?> تومان  </span> 
                                    </div> 
                                    <!-- <span class="status">  موجود  </span> -->

                                </article>
                                <div class="details-fvrt">
                                <div class="item">
                                    <span class="title name-title">
                                        نام گیرنده :
                                    </span>
                                    <span class="text name">
                                    <?=$bascket->name?>ـــــ<?=$bascket->family?>
                                    </span>
                                </div>
                                <div class="item">
                                    <span class="title address-title">
                                        آدرس گیرنده :
                                    </span>
                                    <span class="text address">
                                      <?=$bascket->address?>
                                    </span>
                                </div>
                                <div class="row">
                                    <span class="title code-title">
                                      شماره سفارش :
                                    </span>
                                    <span class="text code">
                                        <?=$bascket->refID?>
                                    </span>
                                    <span class="title price-title">
                                        مبلغ کل :
                                    </span>
                                    <span class="text price">
                                       <?=$bascket->amount?> تومان
                                    </span>
                                    <span class="title number-title">
                                        تعداد مرسوله :
                                    </span>
                                    <span class="text number">
                                       <?=$bascket->count?> مرسوله
                                    </span>
                                    <!-- <span class="title time-title">
                                        زمان تحویل :
                                    </span>
                                    <span class="text time">
                                        جمعه 2 آذر 1397 بازه 12-15
                                    </span> -->
                                </div>
                            </div>  
                            </div>
                            
                        </div>

                        <?php  } }   } }?>

                    </div>

                </div>

            </main>

        </div>

    </div>

</article>