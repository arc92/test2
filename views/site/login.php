<?php
use yii\helpers\Html;
use yii\bootstrap\ActiveForm;
use yii\helpers\ArrayHelper;
use backend\models\Standard;
/* @var $this yii\web\View */

$this->title = 'ورود';
?>
<main class="login d-flex align-items-center justify-content-center">
   <article>
       <section class="logo">
           <a href="/site/index" class="d-flex align-items-center">
               <img src="/img/Logo.png" alt="">
           </a>
       </section>
       <section class="form-login">
           <div class="container P-0 d-flex justify-content-between align-items-center">
               <div class="base">
                   <div class="detail">
                   
                   <?php $form = ActiveForm::begin(); ?>
                    <!-- display error message-->
                    <?php if (Yii::$app->session->hasFlash('error')): ?>
                        <div class="alert alert-danger alert-dismissable">
                            <button aria-hidden="true" data-dismiss="alert" class="close" type="button">×</button> 
                            <?= Yii::$app->session->getFlash('error') ?>
                        </div>
                    <?php endif;  ?>
                           <div class="email">
                           <?= $form->field($Users, 'username')->textInput(['class'=>'name-input','placeholder'=>'ایمیل یا موبایل '])->label('') ?>    
                           </div>
                           <div class="password">
                           <?= $form->field($Users, 'password')->passwordInput(['class'=>'password-input','placeholder'=>'کلمه عبور'])->label('') ?> 
                           </div>
                           <a href="/site/forget" style="float: left; color:#a3cced;font-size: 12px;margin-top: 10px;" class=" ">    رمز عبور خود را فراموش کرده اید ؟  </a>
                           <?= Html::submitButton('ورود', ['class' => 'btn btn-login','placeholder' => 'ورود بـــه حســـاب کاربـــری']) ?>
                           <a href="/site/register" class="btn btn-register" style="background-color:#fff;color:#a3cced;">
                               عضـــویت در بی سی سی
                           </a>
                           <?php ActiveForm::end(); ?>
                       <div class="social">
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
                       </div>
                   </div>
               </div>
           </div>
       </section>
   </article>
</main>