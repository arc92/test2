<?php
use yii\helpers\Html;
use yii\bootstrap\ActiveForm;
use yii\helpers\ArrayHelper;
use backend\models\Standard;
/* @var $this yii\web\View */

$this->title = 'تایید ثبت نام';
?>
<main class="login d-flex align-items-center justify-content-center">
   <article>
       <section class="logo">
           <a href="#" class="d-flex align-items-center">
               <img src="/img/Logo.png" alt="">
           </a>
       </section>
       <section class="form-login">
           <div class="container P-0 d-flex justify-content-between align-items-center">
               <div class="base">
                   <div class="detail">
           
                   <?php $form = ActiveForm::begin(); ?>
                    <!-- display error message-->
                    <?php if (Yii::$app->session->hasFlash('messageSignup')): ?>
                        <div class="alert alert-success alert-dismissable">
                            <button aria-hidden="true" data-dismiss="alert" class="close" type="button">×</button> 
                            <?= Yii::$app->session->getFlash('messageSignup') ?>
                        </div>
                    <?php endif;  ?>
                           <div class="password">
                           <?= $form->field($model, 'submitDate')->textInput(['class'=>'name-input','placeholder'=>'کد تایید ارسال شده به موبایل را وارد کنید'])->label(false) ?>    
                           </div>
                      
                           <?= Html::submitButton('همین حالا عضو شوید', ['class' => 'btn btn-login']) ?>  
                           <?php ActiveForm::end(); ?>

                           <?php $form = ActiveForm::begin(); ?>
                           
                           <?= Html::submitButton('ارسال مجدد', ['class' => 'btn btn-login']) ?> 
                           <?php  ActiveForm::end(); ?>
                       <!-- <div class="social">
                    <span class="or-text">
                      راه هـــای دیـــگر
                    </span>
                           <ul class="nav">
                               <li class="nav-item">
                                   <a href="#" class="nav-link twitter d-flex justify-content-center align-items-center">
                                       <i class="icon-025-twitter-1"></i>
                                   </a>
                               </li>
                               <li class="nav-item">
                                   <a href="#" class="nav-link facebook d-flex justify-content-center align-items-center">
                                       <i class="icon-024-facebook-logo"></i>
                                   </a>
                               </li>
                               <li class="nav-item">
                                   <a href="#" class="nav-link google-plus d-flex justify-content-center align-items-center">
                                       <i class="icon-037-google"></i>
                                   </a>
                               </li>
                           </ul>
                       </div> -->
                   </div>
               </div>
           </div>
       </section>
   </article>
</main>