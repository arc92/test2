<?php
use yii\helpers\Html;
use yii\bootstrap\ActiveForm;
use yii\helpers\ArrayHelper;
use backend\models\Standard;
use yii\captcha\Captcha;
/* @var $this yii\web\View */


?>
<main class="content-contact-us">
   <article>
       <section class="text header-form">
           <div class="container p-0">
            <span class="suptitle">
            بپرسید و اطلاعات کسب کنید
        </span>
               <span class="title">
            ارسال درخواست پشتیبانی آنلاین
        </span>

           </div>
       </section>
       <section class="form-question"> 
           <div class="container p-0">
           <?php $form = ActiveForm::begin(['id' => 'contactus']);?> 
           <?php       if (Yii::$app->session->hasFlash('success')): ?>
                <div class="alert alert-success alert-dismissable">
                <button aria-hidden="true" data-dismiss="alert" class="close" type="button">×</button>
                <?= Yii::$app->session->getFlash('success') ?>
                </div>
       <?php endif; ?>
        <?php if (Yii::$app->session->hasFlash('error')): ?>
            <div class="alert alert-danger alert-dismissable">
                <button aria-hidden="true" data-dismiss="alert" class="close" type="button">×</button>
                <?= Yii::$app->session->getFlash('error') ?>
            </div>
        <?php endif; ?>
                   <div class="form d-flex flex-wrap justify-content-between">
                    <div class="col-lg-4 col-md-6 col-sm-12 col-12">
                    <?= $form->field($question, 'name')->textInput(['class'=>'name-input','placeholder'=>'نام و نام خانوادگی'])->label('')?>
                    </div>
                       <div class="col-lg-4 col-md-6 col-sm-12 col-12">
                       <?= $form->field($question, 'email')->textInput(['class'=>'name-input','placeholder'=>'پست الکترونیک'])->label('')?>
                       </div>
                       <div class="col-lg-4 col-md-6 col-sm-12 col-12">
                       <?= $form->field($question, 'mobile')->textInput(['class'=>'name-input','placeholder'=>'شماره تماس شما'])->label('')?>
                                              </div>

                   </div>
                   <div class="col-lg-12 col-md-12 col-sm-12 col-12">
                   <?= $form->field($question, 'question')->textarea(['rows' => '6','class'=>'name-input','placeholder'=>'نظر خود را در این بخش میتوانید بنویسید ...'])->label('')?>

                   </div>
                   <div class="col-lg-12 col-md-12 col-sm-12 col-12">
                   <?= $form->field($upload, 'imgFile')->fileInput()->label('') ?>
                </div>
                <label class="btn btn-send" for="upload-imgfile">
        افزودن فایل
        </label>
        <style>
            #upload-imgfile {
                display: none;
            }
            .field-upload-imgfile {
                display: none;
            }
        </style>
                   <div class="col-lg-12 col-md-12 col-sm-12 col-12">
                   <?= $form->field($question, 'reCaptcha')->widget(\himiklab\yii2\recaptcha\ReCaptcha::className()) ?>
                    <!-- $form->field($question, 'verifyCode')->widget(Captcha::className()) ?>   -->
                   </div>
           
                   <div class="g-recaptcha" data-sitekey="== Your site Key =="></div>
                   <div class="col-lg-12 col-md-12 col-sm-12 col-12">
                       <div class="d-flex justify-content-between flex-wrap align-items-center">
                    <span class="text-btn">
                        این اطمینان را به شما خواهیم تا در کمتر از 24 ساعت به پیام ارسالی شما پاسخ خواهیم داد ...
                    </span>

                    <?= Html::submitButton('ارسال کنید', ['class' => 'btn btn-send','name' => 'send']) ?>
                       </div>
                   </div>
                   <?php ActiveForm::end(); ?>
           </div>
       </section>
       <section class="text header-map">
           <div class="container p-0">
            <span class="suptitle">
با ما در ارتباط باشید
        </span>
               <span class="title">
            کارشناسان ما منتظر شما هستند
        </span>

           </div>
       </section>
       <section class="map">
           <div class="container p-0 d-flex">
               <div class="leave-message">
                   <div class="text-content">
                       <div class="header-1">
                        <span class="subtitle">
                        در ارتباط باشید
                    </span>
                           <h1 class="title">
                               <?=$contactus->sitename ?>
                           </h1>
                           <span class="bottom-title">
                        <?=$contactus->about ?>
                    </span>
                       </div>
                       <div class="address-item">
                        <span class="address-title">
                        نشانی محل شرکت
                    </span>
                    <span class="address">
                    <?=$contactus->address  ?>
                    </span>
                       </div>
                       <div class="address-item">
                        <span class="address-title">
                     کارخانه
                    </span>
                    <span class="address">
                    <?=$contactus->company  ?>
                    </span>
                       </div>
                       <div class="phone-item">
                        <span class="phone-title">
                        شماره تماس
                    </span>
                           <span class="phone">
                           <?=$contactus->tel  ?>
                    </span>
                       </div>
                       <div class="mail-item">
                        <span class="mail-title">
                        پست الکترونیک
                    </span>
                           <span class="mail">
                           <?=$contactus->email  ?>
                    </span>
                       </div>
                       <ul class="nav social">
                           <li class="nav-item">
                               <a href="#" class="nav-link">
                                   <i class="icon-024-facebook-logo"></i>
                               </a>
                           </li>
                           <li class="nav-item">
                               <a href="#" class="nav-link">
                                   <i class="icon-026-instagram-1"></i>
                               </a>
                           </li>
                           <li class="nav-item">
                               <a href="#" class="nav-link">
                                   <i class="icon-025-twitter-1"></i>
                               </a>
                           </li>
                           <li class="nav-item">
                               <a href="#" class="nav-link">
                                   <i class="icon-027-telegram"></i>
                               </a>
                           </li>
                       </ul>
                   </div>
               </div>
               <div class="map-img" style="background-image: url('/img/map.png')">
               </div>
           </div>
       </section>
   </article>
</main>

