<?php

use yii\helpers\Html;

use yii\widgets\ActiveForm;

use yii\helpers\ArrayHelper; 

use mohammadmahdy\datepicker\Datepicker;

/* @var $this yii\web\View */



$this->title = 'Shoping Address';

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

                        <li class="nav-item active">

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

                    <!--personal-->

                    <div class="title-dashboard">

                        <div class="col-xl-12">

                    <span class="title">

                          آدرس های حمل و نقل

                    </span>

                        </div>

                    </div>

                   

                  

                    <div class="detail-dashboard d-flex flex-wrap">
                    <?php if (Yii::$app->session->hasFlash('success')): ?>

<div class="alert alert-success alert-dismissable" style="margin-top:50px;">

    <button aria-hidden="true" data-dismiss="alert" class="close" type="button">×</button> 

    <?= Yii::$app->session->getFlash('success') ?>

</div>

<?php endif; ?>



        <!-- display error message-->

        <?php if (Yii::$app->session->hasFlash('error')): ?>

            <div class="alert alert-danger alert-dismissable" style="margin-top:50px;">

                <button aria-hidden="true" data-dismiss="alert" class="close" type="button">×</button> 

                <?= Yii::$app->session->getFlash('error') ?>

            </div>

        <?php endif; ?>

                    <?php foreach($address as $ad){ ?>

                            <div class="address d-flex justify-content-between align-items-center">

                                <p id="address<?=$ad->id?>" data-status="<?=$ad->id?>" >

                              

                                <label for="address-1">

                                    <?=$ad->address ?>

                                </label>

                               

                                <div class="d-flex justify-content-end">

                                    <!-- <button class="btn btn-icon">

                                        <i class="icon-pencell"></i>

                                    </button> -->

                                    

                                    <?= Html::a('<i class="icon-pencell"></i>',['/user/address/address?id='.$ad->id], ['class' => 'btn btn-icon']) ?>
                                    <?= Html::a('<i class="icon-dump"></i>',['/user/address/delete?id='.$ad->id], ['class' => 'btn btn-icon']) ?>

                                 

                                </div>

                            </div>

                            <script src="https://code.jquery.com/jquery-3.3.1.min.js"></script>

                                <script>

                                    jQuery('#address<?=$ad->id?>').on('click',function(e){

                                    e.preventDefault();

                                    var data = $(this).attr('data-status');

                                    console.log(data );

                                    $.ajax({

                                        url: '/user/address/add',

                                        data: {id: data} 

                                    })





                                });

                                        </script>

                            <?php } ?>

                            <?php $form = ActiveForm::begin(); ?>


                            <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">

                                <div class="input-item">

                                    <label for="address">

                                        اضافه کردن مسیر جدید

                                    </label>

                                    <?= $form->field($model, 'address')->textInput()->label(false) ?> 

                                </div>

                            </div>

                            <div class="col-xl-4 col-lg-4 col-md-4 col-sm-12 col-12">

                                <div class="input-item">

                                    <label for="name-post">

                                        کد پستی شما

                                    </label>

                                    <?= $form->field($model, 'postalCode')->textInput()->label(false) ?> 

                                </div>

                            </div>

                            <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12 d-flex justify-content-start">

                               

                                <?= Html::submitButton(' ثبت تغییرات', ['class' => 'btn btn-submit btn-pink mr-0']) ?>

                            </div>

                            <?php ActiveForm::end(); ?>

                        </div>

                     

                </div>

              

            </main>

           

        </div>

    </div>

</article>