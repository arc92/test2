<?php
use yii\helpers\Html;
use yii\widgets\ActiveForm;
use yii\helpers\ArrayHelper;
/* @var $this yii\web\View */

$this->title = 'سایز البسه من';
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
                        <li class="nav-item active">
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
                    <!--measures-->
                    <?php $form = ActiveForm::begin(); ?>
                        <div class="title-dashboard">
                            <div class="col-xl-12">
                    <span class="title">
                          سایز البسه من
                    </span>
                            </div>
                        </div>
                        <div class="detail-dashboard d-flex flex-wrap">
                            <div class="col-xl-3 col-lg-4 col-md-4 col-sm-4 col-12 ">
                                <div class="input-item">
                                    <label for="select-1">
                                        سن
                                    </label>

                                     <?= $form->field($model, 'ageID')->dropDownList(ArrayHelper::map(\app\models\Mysize::find()->all(), 'id', 'age'),['class'=>'js-example-basic-single','prompt'=>'انتخاب کنید..'])->label(false) ?>
                                
                                </div>
                            </div>
                            <div class="col-xl-3 col-lg-4 col-md-4 col-sm-4 col-12 ">
                                <div class="input-item">
                                    <label for="select-2">
                                        قد
                                    </label>
                                    <?= $form->field($model, 'heightID')->dropDownList(ArrayHelper::map(\app\models\Mysize::find()->all(), 'id', 'height'),['class'=>'js-example-basic-single','prompt'=>'انتخاب کنید..'])->label(false) ?>

                                </div>
                            </div>
                            <div class="col-xl-3 col-lg-4 col-md-4 col-sm-4 col-12 ">
                                <div class="input-item">
                                    <label for="select-3">
                                        وزن
                                    </label>
                                    <?= $form->field($model, 'weightID')->dropDownList(ArrayHelper::map(\app\models\Mysize::find()->all(), 'id', 'weight'),['class'=>'js-example-basic-single','prompt'=>'انتخاب کنید..'])->label(false) ?>

                                </div>
                            </div>

                            <div class="col-xl-3 col-lg-4 col-md-4 col-sm-4 col-12 ">
                                <div class="input-item">
                                    <label for="select-4">
                                        دور کمر
                                    </label>
                                    <?= $form->field($model, 'waistID')->dropDownList(ArrayHelper::map(\app\models\Mysize::find()->all(), 'id', 'waist'),['class'=>'js-example-basic-single','prompt'=>'انتخاب کنید..'])->label(false) ?>

                                </div>
                            </div>
                            <div class="col-xl-3 col-lg-4 col-md-4 col-sm-4 col-12 ">
                                <div class="input-item">
                                    <label for="select-5">
                                        دور باسن
                                    </label>
                                    <?= $form->field($model, 'hipID')->dropDownList(ArrayHelper::map(\app\models\Mysize::find()->all(), 'id', 'hip'),['class'=>'js-example-basic-single','prompt'=>'انتخاب کنید..'])->label(false) ?>

                                </div>
                            </div>
                            <div class="col-xl-3 col-lg-4 col-md-4 col-sm-4 col-12 ">
                                <div class="input-item">
                                    <label for="select-6">
                                        دور شکم
                                    </label>
                                    <?= $form->field($model, 'roundID')->dropDownList(ArrayHelper::map(\app\models\Mysize::find()->all(), 'id', 'round'),['class'=>'js-example-basic-single','prompt'=>'انتخاب کنید..'])->label(false) ?>

                                </div>
                            </div>

                            <div class="col-xl-3 col-lg-4 col-md-4 col-sm-4 col-12 ">
                                <div class="input-item">
                                    <label for="select-7">
                                        دور بازو
                                    </label>
                                    <?= $form->field($model, 'armID')->dropDownList(ArrayHelper::map(\app\models\Mysize::find()->all(), 'id', 'arm'),['class'=>'js-example-basic-single','prompt'=>'انتخاب کنید..'])->label(false) ?>

                                </div>
                            </div>
                            <div class="col-xl-3 col-lg-4 col-md-4 col-sm-4 col-12 ">
                                <div class="input-item">
                                    <label for="select-8">
                                        دور مچ
                                    </label>
                                    <?= $form->field($model, 'wristID')->dropDownList(ArrayHelper::map(\app\models\Mysize::find()->all(), 'id', 'wrist'),['class'=>'js-example-basic-single','prompt'=>'انتخاب کنید..'])->label(false) ?>

                                </div>
                            </div>
                            <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12 d-flex justify-content-end"> 
                                <?= Html::submitButton('ثبت تغییرات', ['class' => 'btn btn-submit']) ?>
                            </div>
                        </div>
                        <?php ActiveForm::end(); ?>
                        <?php if (Yii::$app->session->hasFlash('success')): ?>
                        <div class="alert alert-success alert-dismissable">
                            <button aria-hidden="true" data-dismiss="alert" class="close" type="button">×</button>
                            <h4><i class="icon fa fa-check"></i>Saved!</h4>
                            <?= Yii::$app->session->getFlash('success') ?>
                        </div>
                    <?php endif; ?> 
                    <!-- display error message-->
                    <?php if (Yii::$app->session->hasFlash('error')): ?>
                        <div class="alert alert-danger alert-dismissable">
                            <button aria-hidden="true" data-dismiss="alert" class="close" type="button">×</button>
                            <h4><i class="icon fa fa-check"></i>Saved!</h4>
                            <?= Yii::$app->session->getFlash('error') ?>
                        </div>
                    <?php endif;  ?>
                </div>
            </main>
        </div>
    </div>
</article>