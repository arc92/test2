<?php

use yii\helpers\Html;

use yii\widgets\ActiveForm;

use yii\helpers\ArrayHelper; 

use yii\widgets\LinkPager;

/* @var $this yii\web\View */



$this->title = 'انتقادات و پیشنهادات';

?>

<article class="contact-setting">

    <div class="container p-0 d-flex flex-wrap justify-content-between">

        <div class="col-xl-3 col-lg-3 col-md-3 col-sm-4 col-12 p-0">

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

                       

                        <li class="nav-item active">

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

                    <!--suggest-->

                    <div class="title-dashboard">

                        <div class="col-xl-12">

                    <span class="title">

                          آخرین انتقادات و پیشنهادها

                    </span>

                        </div>

                    </div>

                    <div class="detail-dashboard">

                        <div class="table-res" style="overflow-x: auto">

                            <table class="table">

                                <tbody>

                                <?php foreach($articles as $article){ ?>

                                <tr>

                                    <td><?=$article->description?></td>

                                    <td class="text-center">موضوع  :  <?=$article->subject->name?></td>

                                    <td class="text-center"><?=$article->submitDate?></td>

                                    <td class="text-center"><?php

                                    if($article->status==0){

                                        echo'در حال بررسی';

                                    }

                                    ?></td>

                                    <td>

                                        <div class="d-flex justify-content-end">

                                            <!-- <button class="btn btn-icon">

                                                <i class="icon-pencell"></i>

                                            </button> -->

                                            <!-- <button class="btn btn-icon">

                                                <i class="icon-dump"></i>

                                            </button> -->



                <?= Html::a('<i class="icon-pencell"></i>',['/user/addcomment/index?id='.$article->id], ['class' => 'btn btn-icon']) ?> 
                <?= Html::a('<i class="icon-dump"></i>',['/user/addcomment/delete?id='.$article->id], ['class' => 'btn btn-icon']) ?>



                                        </div>

                                    </td>

                                </tr>

                                <?php } ?>

                                </tbody>

                            </table>

                        </div>

                        <ul class="nav">

                        <li class="nav-item">

                            <?php echo LinkPager::widget([

                            'pagination' => $pagination , 

                            ]);?>

                         </li>          

                        </ul>

                    </div>

                    <!--comment-->

                    <?php $form = ActiveForm::begin(); ?>

                        <div class="title-dashboard">

                            <div class="col-xl-12">

                                <span class="title">

                                    ثبت درخواست جدید

                                </span>

                            </div>

                        </div>

                        <div class="detail-dashboard d-flex flex-wrap">

                            

                            <div class="col-xl-12">

                                <div class="input-item">

                                    <label for="select-title">

                                        موضوع

                                    </label>

                                    <?= $form->field($model, 'subjectID')->dropdownList(

                                     ArrayHelper::map(\app\models\Subject::find()->all(),'id','name'),['class' => 'js-example-basic-single','prompt'=>'انتخاب کنید..'])->label(false) ?>

                                  

                                </div>

                            </div>

                            <div class="col-xl-12">

                                <div class="input-item">

                                <?= $form->field($model,'description')->textarea(['rows' => 6]) ?> 

                                </div>

                            </div>

                            <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12 d-flex justify-content-end">

                                <!-- <div class="btn btn-submit mr-0" id="pluss">

                                    اضافه کردن

                                </div>  -->

                                <?= Html::submitButton(' ثبت تغییرات', ['class' => 'btn btn-submit btn-pink']) ?>

                            </div>

                        </div>

                        <?php ActiveForm::end(); ?>

                </div>

            </main>

        </div>

    </div>

</article>



<?php

$script=<<<JS

// var a=jQuery('.col-xl-9 col-lg-9 col-md-9 col-sm-8 col-12 p-0');

// a.remove();

// jQuery('#pluss').click(()=>{

// console.log(1);

// jQuery('.col-xl-9 col-lg-9 col-md-9 col-sm-8 col-12 p-0').remove();

// if (jQuery('#pluss').click) {

//     var html='';

//     $.get("http://localhost:8080/api/subject").done((data,status)=>{

//       console.log(data);

//       console.log(status);



//         html+=' <div class="col-xl-9 col-lg-9 col-md-9 col-sm-8 col-12 p-0"> '; 

//         html+='<div class="detail-dashboard d-flex flex-wrap"> ';

//         html+='<div class="col-xl-12">';

//         html+='<div class="input-item">';

//         html+='<label for="select-title">موضوع';

//         html+='</label>';

//         html+='<div class="form-group field-addcomment-subjectid required">'; 

//         html+='<select id="addcomment-subjectid" class="js-example-basic-single " name="Addcomment[subjectID][]"  aria-hidden="true">';

//         $.each(data.data, function(index, value) {

//         html+='<option value="'+value.id+'">'+value.name+'</option>';

//          });

//         html+='</select>';

//         html+='</div>';                             

//         html+='</div>';

//         html+='</div>';

//         html+='<div class="col-md-12">';

//         html+='<div class="input-item">';

//         html+='<div class="form-group field-addcomment-description required">';

//         html+='<label class="control-label" for="addcomment-description">متن </label>';

//         html+='<textarea id="addcomment-description" class="form-control" name="Addcomment[description][]" rows="6"></textarea>';



//         html+='<div class="help-block"></div>';

//         html+='</div>';

//         html+='</div>';

//         html+='</div>';

//         html+='</div>';  

//         html+='</div>'; 





     

//     jQuery('#pluss').before(html);

// });

//        }else{

//     a.remove();

// }

// });





JS;

$this->registerJs($script);

?>