<?php
use yii\helpers\Html;
use yii\widgets\ActiveForm;
use yii\helpers\ArrayHelper;
use mohammadmahdy\datepicker\Datepicker;

?>
<article class="contact-setting">
    <div class="container p-0 d-flex flex-wrap justify-content-between">
        <div class="col-xl-3 col-lg-3 col-md-3 col-sm-4 col-12">
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
                        <li class="nav-item active">
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
                        <li class="nav-item">
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
                            <a href="/logouted/" class="nav-link">
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
                    <?php $form = ActiveForm::begin(['options' => ['enctype' => 'multipart/form-data']]); ?>
                    <?php if (Yii::$app->session->hasFlash('success')): ?>
                    <div class="alert alert-success alert-dismissable">
                        <button aria-hidden="true" data-dismiss="alert" class="close" type="button">×</button> 
                        <?= Yii::$app->session->getFlash('success') ?>
                    </div>
                    <?php endif; ?>

                            <!-- display error message-->
                            <?php if (Yii::$app->session->hasFlash('error')): ?>
                                <div class="alert alert-danger alert-dismissable">
                                    <button aria-hidden="true" data-dismiss="alert" class="close" type="button">×</button> 
                                    <?= Yii::$app->session->getFlash('error') ?>
                                </div>
                            <?php endif; ?>
                        <div class="title-dashboard">
                            <div class="col-xl-12">
                    <span class="title">
                          اطلاعات شخصی
                    </span>
                            </div>
                        </div>
                        <div class="detail-dashboard d-flex flex-wrap">
                            <div class="col-xl-6 col-lg-6 col-md-4 col-sm-12 col-12">
                                <div class="input-item">
                                    <label for="name">
                                       نام و نام خانوادگی
                                    </label>
                                    <?= $form->field($user, 'fullName')->textInput(['value'=>\yii::$app->users->name()])->label(false) ?> 
                                </div>
                            </div>
                            <div class="col-xl-6 col-lg-6 col-md-4 col-sm-12 col-12">
                                <div class="input-item">
                                    <label for="phone">
                                          شماره همراه
                                    </label>
                                    <?= $form->field($user, 'mobile')->textInput(['value'=>\yii::$app->users->mobile()])->label(false) ?> 
                                </div>
                            </div>
                            <div class="col-xl-6 col-lg-6 col-md-4 col-sm-12 col-12">
                                 <div class="input-item">
                                    <label for="phone">
                                          شماره تماس
                                    </label>
                                    <?= $form->field($user, 'tell')->textInput(['value'=>\yii::$app->users->tell()])->label(false) ?> 
                                </div>
                            </div>
                            <div class="col-xl-6 col-lg-6 col-md-4 col-sm-12 col-12">
                                <div class="input-item">
                                    <label for="phone">
                                    ایمیل
                                    </label>
                                    <?= $form->field($user, 'email')->textInput(['value'=>\yii::$app->users->email()])->label(false) ?> 
                                </div>
                            </div>
                            <div class="col-xl-6 col-lg-6 col-md-12 col-sm-12 col-12 p-0 d-flex flex-wrap">
                                <div class="col-xl-4 col-lg-4 col-md-4 col-sm-4 col-12 ">
                                    <div class="input-item">
                                        <label for="select-year">
                                            سال تولد نوزاد
                                        </label> 
                                        <?php
                                            $a= ['1397' => '1397', '1396' => '1396', '1395' => '1395'];
                                            echo $form->field($user, 'year')->dropDownList($a,['prompt'=>'سال','class'=>'js-example-basic-single','id'=>'select-year'])->label(false);
                                        ?>
                                       
                                    </div>
                                </div>
                                <div class="col-xl-4 col-lg-4 col-md-4 col-sm-4 col-12 ">
                                    <div class="input-item">
                                        <label for="select-month">
                                            ماه
                                        </label>
                                        <?php
                                            $a=['1' => '1', '2' => '2', '3' => '3', '4' => '4', '5' => '5', '6' => '6', '7' => '7', '8' => '8', '9' => '9', '10' => '10', '11' => '11', '12' => '12'];
                                            echo $form->field($user, 'mounth')->dropDownList($a,['prompt'=>'ماه','class'=>'js-example-basic-single','id'=>'select-mounth'])->label(false);
                                        ?>

                                    </div>
                                </div>
                                <div class="col-xl-4 col-lg-4 col-md-4 col-sm-4 col-12 ">
                                    <div class="input-item">
                                        <label for="select-day">
                                            روز
                                        </label>
                                        <?php
                                            $a= ['1' => '1', '2' => '2', '3' => '3', '4' => '4', '5' => '5', '6' => '6', '7' => '7', '8' => '8', '9' => '9', '10' => '10', '11' => '11', '12' => '12', '13' => '13', '14' => '14', '15' => '15', '16' => '16', '17' => '17', '18' => '18', '19' => '19', '20' => '20', '21' => '21', '22' => '22', '23' => '23', '24' => '24', '25' => '25', '26' => '26', '27' => '27', '28' => '28', '29' => '29','30'=>'30','31'=>'31' ];
                                            echo $form->field($user, 'day')->dropDownList($a,['prompt'=>'روز','class'=>'js-example-basic-single','id'=>'select-day'])->label(false);
                                        ?>
                                    </div>
                                </div>
                                </div>
                            <div class="col-xl-6 col-lg-6 col-md-4 col-sm-12 col-12">
                                <div class="input-item">
                                    <label for="uploads-imagefile">
                                    تصویر کاربر
                                    </label>
                                    <?= $form->field($upload, 'imageFile')->fileInput()->label(false) ?>  
                                    <label class="lbl3" for="uploads-imagefile">
                                            تصویر مورد نظر را انتخاب کنید ...
                                        </label>
                                </div>
                            </div>
                            
                              
                            <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12 d-flex justify-content-end">
                            
                                <?= Html::submitButton(' ثبت تغییرات', ['class' => 'btn btn-submit']) ?>
                            </div>
                        
                    
    <?php ActiveForm::end(); ?>

        <!--display success message-->
                   
                        </div>
                    <!--password-->
                    <?php $form = ActiveForm::begin(); ?> 
                
                        <div class="title-dashboard">
                            <div class="col-xl-12">
                    <span class="title">
                          رمز عبور
                    </span>
                            </div>
                  
                        </div>
                        <div class="detail-dashboard d-flex flex-wrap">
                            <div class="col-xl-4 col-lg-4 col-md-4 col-sm-12 col-12">
                                <div class="input-item">
                                    <label for="last-password">
                                        رمز عبور جدید
                                    </label>
                                    <?= $form->field($changepass, 'password')->passwordInput()->label(false) ?> 
                                </div>
                            </div>
                         
                            <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12 d-flex justify-content-end">
                             
                                <?= Html::submitButton(' ثبت تغییرات', ['class' => 'btn btn-submit']) ?>
                            </div>
                        </div>
                    <?php ActiveForm::end(); ?>
                </div>
            </main>
        </div>
    </div>
</article>