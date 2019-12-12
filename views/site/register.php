<?php
use yii\helpers\Html;
use yii\bootstrap\ActiveForm;
use yii\helpers\ArrayHelper;
use backend\models\Standard;
/* @var $this yii\web\View */

$this->title = 'ثبت نام';
?>
<main class="register d-flex justify-content-center align-items-center">
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
                   <?php $form = ActiveForm::begin(['id' => 'register']); ?>
                   <?php if (Yii::$app->session->hasFlash('success')): ?>
					<div class="alert alert-success alert-dismissable">
					<button aria-hidden="true" data-dismiss="alert" class="close" type="button">×</button>
					<?= Yii::$app->session->getFlash('success') ?>
					</div>
				<?php endif; ?>
                <div class="name" >
                           <?= $form->field($Users, 'fullName')->textInput(['class'=>'input','placeholder'=>'نام و نام خانوادگی'])->label('')?>
                           </div>
                           <div class="password">
                           <?= $form->field($Users, 'password')->passwordInput(['class'=>'input','placeholder'=>'کلمـــه عبـــور شـــما'])->label('')?>
                           </div>
                           <div class="email">
                           <?= $form->field($Users, 'email')->textInput(['class'=>'input','placeholder'=>'پست الکترونیکی(اختیاری)'])->label('')?>
                           </div>
                          
                      <!-- $form->field($Users, 'has_mobile')->dropDownList([
                               '0'=>'عضویـــت از طریـــق',
                                'mobile'=>'موبایل',
                                'email'=>'ایمیل',
                           ],['class'=>'js-example-basic-single box','id'=>'one'])->label('')  -->
                        
                           <div class="mobile box">
                           <?= $form->field($Users, 'mobile')->textInput(['class'=>'input ','placeholder'=>' شماره تلفن همراه'])->label('')?>
                           </div>
                           <?= Html::submitButton('عضویت در بی سی سی', ['class' => 'btn btn-login','name' => 'register']) ?>
                         
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

<?php
// $script=<<<JS

// $(document).ready(function(){
//         $("#one").change(function(){
//             $( "#one").each(function(){
//                 if($(this).attr("value")=="mobile"){
//                     $(".box").hide();
//                     $(".mobile").show();
//                 }
               
               
//             });
//         }).change();
//     });

// JS;
// $this->registerJs($script);
?>