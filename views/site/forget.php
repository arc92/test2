<?php
use yii\helpers\Html;
use yii\bootstrap\ActiveForm;
use yii\helpers\ArrayHelper;
use backend\models\Standard;
/* @var $this yii\web\View */

$this->title = 'بازیابی رمز عبور';
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
                           <?= $form->field($model, 'mobile')->textInput([
                               'class'=>'name-input','placeholder'=>'شماره موبایل', 
                            'required'=>'required',
                            'pattern'=>'^(^(([^<>()\[\]\\.,;:\s@"]+(\.[^<>()\[\]\\.,;:\s@"]+)*)|(".+"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$)|((\+98|0)?9\d{9})$',
                            'title'=>'لطفا موبایل خود را صحیح وارد کنید',
                            'oninvalid'=>'this.setCustomValidity("لطفا موبایل  خود را صحیح وارد کنید")',
                            'oninput'=>'this.setCustomValidity("")'    ])->label('') ?>    
                           </div>
                           <?= Html::submitButton('دریافت رمز عبور', ['class' => 'btn btn-login','placeholder' => 'ورود بـــه حســـاب کاربـــری']) ?>
                           
                           <?php ActiveForm::end(); ?>
                   
                   </div>
               </div>
           </div>
       </section>
   </article>
</main>