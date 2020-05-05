<?php 

use yii\helpers\Html;
use yii\bootstrap\ActiveForm;
use yii\helpers\ArrayHelper;
use \yii\widgets\Pjax;
use yii\helpers\Url;
\kl83\widgets\RatingWidgetFaAsset::register(\Yii::$app->view);

 
?>
 
<main class="product-details">
    <section class="top-details">
        <div class="container p-0">
            <div class="border d-flex flex-wrap justify-content-between">
                <div class="col-xl-6 col-lg-6 col-md-6 col-sm-12 col-12 p-0">
                    <div class="slider">
                        <div class="sync1">
                            <div id="sync1" class="owl-carousel owl-theme">
                            <?php foreach($imgs as $img){ ?>
                                <div class="item">
                               <img class="magniflier" src="/<?=$img->img?>" alt="">
                               </div>
                                <?php } ?>
                            </div>
                            <div class="nav" id="nav-detail-product">
                                <div class="caption-container d-flex justify-content-between align-content-center">
                                    <!--<div class="right">-->
                                        <!--<button class="btn">-->
                                            <!--<i class="icon-046-crop-button"></i>-->
                                        <!--</button>-->
                                    <!--</div>-->
                                    <!--<div class="left">-->
                                        <!--<button class="btn icon">-->
                                            <!--<i class="icon-043-refresh"></i>-->
                                        <!--</button>-->
                                        <!--<button class="btn icon">-->
                                            <!--<i class="icon-add"></i>-->
                                        <!--</button>-->
                                        <!--<button class="btn icon">-->
                                            <!--<i class="icon-remove"></i>-->
                                        <!--</button>-->
                                    <!--</div>-->
                                </div>
                            </div>
                        </div>
                        <div class="sync2">
                            <div id="sync2" class="owl-carousel owl-theme">
                            <?php foreach($imgs as $img){ ?>
                                <div class="item">
                                 <img  src="/<?=$img->img?>" alt="">
                                </div>
                                <?php } ?>
                            </div>
                        </div>
                    </div>
                </div>
               
                <div class="col-xl-6 col-lg-6 col-md-6 col-sm-12 col-12 p-0">
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
                    <?php endif;  ?>
                    <div class="details-img">
                    <?php  $form = ActiveForm::begin(['id' => 'submitcart']); ?>
                        <h2 class="title">
                        <?=$product->name?>
                        </h2>
                        <div class="category-item d-flex">
                            <span class="title-category">
                                دسته بندی  :
                            </span>
                                <ul class="nav category">
                                    <li class="nav-item">
                                        <a href="#" class="nav-link">
                                        <?php foreach($catrelations as $catrelation){
                                         echo $catrelation->cat->name.'<br>  '; 
                                        }?>
                                        </a>
                                    </li>
                                </ul>
                        </div>
                        <!--=======================// Rate =============-->
                        <!--======================= Star //=============-->
                        <div class="rate"> 
                            <fieldset class="rating">
                       <?php 
                            if($sum==1){  ?>
                                <?=\kl83\widgets\RatingWidget::widget([
                                    'maxRating' => 5, // stars count, default - 5
                                    'options' => ['class' => 'some-class','style'=>'color:#a3cced;'], // HTML attributes
                                    'value' =>1,  // highlighted stars count
                                ]);
                               ?>
                            <?php  }elseif($sum==2){  ?>
                                <?=\kl83\widgets\RatingWidget::widget([
                                    'maxRating' => 5, // stars count, default - 5
                                    'options' => ['class' => 'some-class','style'=>'color:#a3cced;'], // HTML attributes
                                    'value' =>2,  // highlighted stars count
                                ]);
                               ?>
                            <?php }elseif($sum==3){  ?>
                                <?=\kl83\widgets\RatingWidget::widget([
                                    'maxRating' => 5, // stars count, default - 5
                                    'options' => ['class' => 'some-class','style'=>'color:#a3cced;'], // HTML attributes
                                    'value' =>3,  // highlighted stars count
                                ]);
                               ?>
                            <?php }elseif($sum==4){  ?>
                            <?=\kl83\widgets\RatingWidget::widget([
                                    'maxRating' => 5, // stars count, default - 5
                                    'options' => ['class' => 'some-class','style'=>'color:#a3cced;'], // HTML attributes
                                    'value' =>4,  // highlighted stars count
                                ]);
                               ?>
                            <?php }elseif($sum==5 || $sum>5){  ?>
                            <?=\kl83\widgets\RatingWidget::widget([
                                    'maxRating' => 5, // stars count, default - 5
                                    'options' => ['class' => 'some-class','style'=>'color:#a3cced;'], // HTML attributes
                                    'value' =>5,  // highlighted stars count
                                ]);
                              }else{  ?>
                            <?=\kl83\widgets\RatingWidget::widget([
                                    'maxRating' => 5, // stars count, default - 5
                                    'options' => ['class' => 'some-class','style'=>'color:#a3cced;'], // HTML attributes
                                    'value' =>0,  // highlighted stars count
                                ]); ?>
                              <?php } ?>

                                <!-- <input type="radio" id="star4half" name="rating" value="4 and a half" />
                                <label class="half" for="star4half" title=""></label>
                                <input type="radio" id="star4" name="rating" value="4" />
                                <label class = "full" for="star4" title=""></label>
                                <input type="radio" id="star3half" name="rating" value="3 and a half" />
                                <label class="half" for="star3half" title=""></label>
                                <input type="radio" id="star3" name="rating" value="3" />
                                <label class = "full" for="star3" title=""></label>
                                <input type="radio" id="star2half" name="rating" value="2 and a half" />
                                <label class="half" for="star2half" title=""></label>
                                <input type="radio" id="star2" name="rating" value="2" />
                                <label class = "full" for="star2" title=""></label>
                                <input type="radio" id="star1half" name="rating" value="1 and a half" />
                                <label class="half" for="star1half" title=""></label>
                                <input type="radio" id="star1" name="rating" value="1" />
                                <label class = "full" for="star1" title=""></label>
                                <input type="radio" id="starhalf" name="rating" value="half" />
                                <label class="half" for="starhalf" title=""></label> -->
                            </fieldset> 
                        </div>
                        <!-- =======// Description  ===== -->
                        <!-- =======   cloth    //====== -->
                        <div class="description d-flex flex-wrap">
                        <?php foreach($aboutproducts as $aboutproduct){ ?>
                            <ul class="nave" style="margin-left:50px;">
                                <li class="nav-item">
                                    <?=($count== $product->count)?'':'<i class="icon-023-tick"></i>'?>
                                    <?=$aboutproduct->details?>
                                </li>
                            </ul>
                            <?php } ?>
                        </div>
                       
                        <div class="d-flex align-items-center flex-wrap">
                            <!-- =======// Add ======= -->
                            <!-- ======= to ======= -->
                            <!-- ======= Favourites //=======-->
                            <div class="liked"  id="like"  data-like="<?=$product->id?>">
                                <i class="icon-044-heart"></i> 
                            </div> 
                            <script src="https://code.jquery.com/jquery-3.3.1.min.js"></script>
                            <script>
                               jQuery('#like').on('click',function(e){
                                    e.preventDefault();
                                    var data = $(this).attr('data-like');
                                    console.log(data );
                                    $.ajax({
                                        url: '/product/like',
                                        data: {like: data} 
                                    }).done(function(response){
                                        sessionStorage.setItem('<?=$product->id?>', data); 
                                    }); 
                                });
                            </script> 
                            <!-- =======// Choose ======= -->
                            <!-- ======= Size //======= -->
                           
                            <?php if($featurevalue==true){ ?>
                            <div class="size">
                            <?php  foreach($feature as $featu){ 
                            echo '<span class="title">'.$featu->value.' :</span>';
                            $a=[];
                            foreach($featurevalue as $featurev){
                                if($featu->id==$featurev->featureID){  
                                    $a[$featurev->id]=  $featurev->value;
                                }
                             }  
                                echo  $form->field($fvoption, 'featurevID[]')->dropDownList($a,
                                ['prompt'=>'لطفا انتخاب کنید','required'=>'required','name'=>'cartprice'])->label(false);  
                            }  ?>  
                            </div>
                            <div class="d-flex align-items-center flex-wrap">
                        <!-- <div class="col-md-2"></div> -->
                        <a href="/site/size" class="size-guide" >
                            راهنمای انتخاب سایز
                        </a> 
                        </div>
                        </div>
                        <?php }else{ ?> 
                     
                            </div>
                        <?php } ?>

                        <div class="not-available" <?php if($featurevalue==true || $product->count>0){ ?> style="display:none;" id="mojod" <?php } ?>>
                        متاسفانه این سایز در حال حاضر موجود نمیباشد
                        </div>
                       
                    <div class="d-flex align-items-center" > 
                        <!-- ادیت ایتم تعداد --> 
                    <div class="size"> 
                        <div <?php if($featurevalue==true || $product->count<1){ ?>   id="counthide" style="display:none!important;" <?php } ?> >
                        <div class="number-item" style="display: flex; align-items: center;" >
                        <span class="title" style="margin-left:10px;">  انتخاب تعداد  :  </span>
                    <div class="count-product count">
                           <a class="btn btn-minus down">
                                  <i class="icon-006-left-chevron"></i>
                             </a>
                        
                <?= $form->field($cartoption, 'submitDate')->hiddenInput(['value'=>Yii::$app->jdate->date('Y/m/d')])->label(false) ?>  
                <?php if($featurevalue==true ){?>
                        <input type="number" class="count" min="1" value="1"  id="minmaxcount" name="countproduct" readonly required/>
                <?php }else{?>
                   <input type="number" class="count" min="1" max="<?=$product->count?>" value="1"    name="countproduct" readonly required/>
                <?php } ?>
                         <a class="btn btn-plus up">
                                  <i class="icon-005-right-chevron"></i>
                        </a>
                        </div>
               <!-- پایان -->
                     </div> 
                     </div> 
             
                    
                      <?php if($featurevalue==true){ ?>     
                        <input type="hidden" value="" id="mallprice" name="firstprice"> 
                        <input type="hidden" value="<?=$product->price?> " id="advance" name="advance">
                        <div class="price-item d-flex align-items-center">   
                        <div id="masterprice">
                        <del class="mall-price"> </del>
                            <span class="mall-price"></span>
                            <?php
                            if($offer=\app\models\Offer::find()->Where(['planID'=>$product->planID])->one()){
                                $BaseProductOff=($product->price-($product->price*$offer->percent)/100);
                                ?>
                                <del class="mall-price">
                                    قیمت  :
                                    <span id="pricefeature"><?=$product->price?></span>
                                    تومان
                                </del>
                                <BR>
                                <span class="online-price">قیمت با تخفیف  <?=number_format($BaseProductOff)?> تومان</span>
                            <?php }else{ ?>
                                <span class="online-price">قیمت  <?=number_format($product->price)?> تومان</span>
                            <?php } ?>


                        </div>  
                        <div  id="pricehide" style="display:none;" >
                        <?php   $today=Yii::$app->jdate->date('Y/m/d');
                         if($offer=\app\models\Offer::find()->Where(['planID'=>$product->planID])->one()){
                             if($today>=$offer->start_date and $today<=$offer->end_date){  ?> 
                              <input type="hidden" value="<?=$offer->percent?>" id="offfer">
                                <del class="mall-price"> قیمت  :<span id="pricefeature"></span> تومان</del> 
                                <span class="online-price"> قیمت با تخفیف  :<span id="offerprice"></span> تومان</span> 
                               
                             <?php }else{ ?>  
                                <span class="online-price"> قیمت  :<span id="pricefeature"></span> تومان</span> 
                                <input type="hidden" value="" id="offfer">
                             <?php } 
                            }elseif($generaloff=\app\models\Off::find()->Where(['status'=>1])->one()){  
                                $sood=(($product->price*$generaloff->percent)/100);?> 
                                    <input type="hidden" value="<?=$generaloff->percent?>" id="offfer">
                                    <div class="price-item d-flex align-items-center">   
                                    <del class="mall-price">:قیمت فروشگاه <span id="pricefeature"></span> تومان</del>
                                    </div>   
                                    <div class="price-item d-flex align-items-center"> 
                                    <span class="online-price"> سود خرید آنلاین:  <?=number_format($sood)?> تومان</span>   
                                    </div>  
                                    <div class="price-item d-flex align-items-center">   
                                    <span class="online-price"> قیمت آنلاین  :<span id="offerprice"></span> تومان</span>  
                           <?php }else{ ?>   
                             <input type="hidden" value="" id="offfer">

                                <span class="online-price"> قیمت  :<span id="pricefeature"></span> تومان</span>   
                             <?php } ?>
                            
                        <?= Html::submitButton('  اضافه به سبد', ['class' => 'btn shop-basket','name' => 'submitcart','id'=>'callyou']) ?>
                        </div>  
                        </div> 
                        <?php ActiveForm::end(); ?>     
                      </div>  
                   

                <?php  }else{
                    if($product->count>0 && $product->count!=null){ ?>
              <input type="hidden" value="<?=$product->price?>" id="offprice1" name="offprice1"> 

                       <?php  $today=Yii::$app->jdate->date('Y/m/d');
                         if($offer=\app\models\Offer::find()->Where(['planID'=>$product->planID])->one()){
                             if($today>=$offer->start_date and $today<=$offer->end_date){  ?> 
                            <div class="price-item d-flex align-items-center">    
                                <del class="mall-price"> </del>
                                <span class="mall-price"></span> 
                             <del class="mall-price">قیمت  <?=number_format($product->price)?> تومان</del>   
                      <?php   $off=($product->price-($product->price*$offer->percent)/100); ?>
                             <span class="online-price">قیمت با تخفیف  <?=number_format($off)?> تومان</span>   
                             <input type="hidden" value="<?= $off?> " id="advanceprice" name="advanceprice">
                             <?= Html::submitButton('  اضافه به سبد', ['class' => 'btn shop-basket','name' => 'submitcart']) ?>

                             </div>  
                        <?php }else{ ?>
                            <div class="price-item d-flex align-items-center">    
                            <span class="online-price">قیمت  <?=number_format($product->price)?> تومان</span>  
                            <input type="hidden" value="<?=$product->price?>" id="advanceprice"  name="advanceprice"> 
                            <?= Html::submitButton('  اضافه به سبد', ['class' => 'btn shop-basket','name' => 'submitcart']) ?>
                            </div>  
                        <?php }
                            }elseif($generaloff=\app\models\Off::find()->Where(['status'=>1])->one()){ 
                                $sood=(($product->price*$generaloff->percent)/100);?>  
                                 <div class="price-item d-flex align-items-center">  
                                <del class="mall-price">:قیمت فروشگاه  <?=number_format($product->price)?> تومان</del> 
                                </div> 
                                <div class="price-item d-flex align-items-center">  
                                <span class="online-price"> سود خرید آنلاین:  <?=number_format($sood)?> تومان</span> 
                                </div>  
                                <?php   $general=($product->price-($product->price*$generaloff->percent)/100);  ?>
                                <div class="price-item d-flex align-items-center">  
                                <span class="online-price">قیمت آنلاین :  <?=number_format($general)?> تومان</span>  
                                    <input type="hidden" value="<?= $general?> " id="advanceprice" name="advanceprice">
                                 
                            <?= Html::submitButton('  اضافه به سبد', ['class' => 'btn shop-basket','name' => 'submitcart']) ?>
                            </div>  
                            <?php }else{ ?> 
                                <div class="price-item d-flex align-items-center">    
                            <span class="online-price">قیمت  <?=number_format($product->price)?> تومان</span>  
                            <input type="hidden" value="<?=$product->price?>" id="advanceprice"  name="advanceprice"> 
                            <?= Html::submitButton('  اضافه به سبد', ['class' => 'btn shop-basket','name' => 'submitcart']) ?>
                            </div>
                            <?php } ?>
                            <?php ActiveForm::end(); ?>   
                            </div>   
                        </div> 
                            <?php }else{ ?>
                            <div class="price-item d-flex align-items-center">    
                            <del class="mall-price"> </del>
                            <span class="mall-price"></span>
                            <span class="online-price">قیمت  <?=number_format($product->price)?> تومان</span>    
                            </div>  
                            <?php ActiveForm::end(); ?>   
                            </div>   
                            </div> 

                    <?php  $form = ActiveForm::begin([
                      'options' => [ 
                     'class'=>'inform', 
                      ]
                     ]); ?>
                      <?= $form->field($letme, 'size')->hiddenInput(['id'=>'sizeletme','value'=>''])->label(false) ?>
                 <?= $form->field($letme, 'mobile')->textInput([
                     'class'=>'phone',
                     'pattern'=>'^(^(([^<>()\[\]\\.,;:\s@"]+(\.[^<>()\[\]\\.,;:\s@"]+)*)|(".+"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$)|((\+98|0)?9\d{9})$',
                     'title'=>'لطفا موبایل  خود را صحیح وارد کنید',
                        'oninvalid'=>'this.setCustomValidity("لطفا موبایل  خود را صحیح وارد کنید")',
                        'oninput'=>'this.setCustomValidity("")',
                     'placeholder'=>'شماره همراه خود را وارد کنید . . .'])->label(false) ?>  
                 <?= Html::submitButton('به من اطلاع بده', ['class' => 'click m-b16']) ?>
                <?php ActiveForm::end(); ?>


                     <?php } }?>
                  




                 <?php  $form = ActiveForm::begin([
                      'options' => [ 
                     'class'=>'inform',
                     'id' =>'callme',
                     'style'=>'display:none;'
                      ]
                     ]); ?>
                      <?= $form->field($letme, 'size')->hiddenInput(['id'=>'sizeletme','value'=>''])->label(false) ?>
                 <?= $form->field($letme, 'mobile')->textInput([
                     'class'=>'phone',
                     'pattern'=>'^(^(([^<>()\[\]\\.,;:\s@"]+(\.[^<>()\[\]\\.,;:\s@"]+)*)|(".+"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$)|((\+98|0)?9\d{9})$',
                     'title'=>'لطفا موبایل  خود را صحیح وارد کنید',
                        'oninvalid'=>'this.setCustomValidity("لطفا موبایل  خود را صحیح وارد کنید")',
                        'oninput'=>'this.setCustomValidity("")',
                     'placeholder'=>'شماره همراه خود را وارد کنید . . .'])->label(false) ?>  
                 <?= Html::submitButton('به من اطلاع بده', ['class' => 'click m-b16']) ?>
                <?php ActiveForm::end(); ?>  
               
            </div>
            
         
        </div>
       
    </div>
</section>

    <div class="variable-product">
        <div class="container pr-0 pl-0">
        <?php if (Yii::$app->session->hasFlash('confirm')): ?>
                        <div class="alert alert-success alert-dismissable">
                            <button aria-hidden="true" data-dismiss="alert" class="close" type="button">×</button> 
                            <?= Yii::$app->session->getFlash('confirm') ?>
                        </div>
                    <?php endif; ?> 
            <ul class="nav">
                <li class="nav-item active category-button" data-filter="one">
                    مشخصات
                </li>
                <li class="nav-item category-button" data-filter="two">
                     نظرات کاربران
                </li>
                <li class="nav-item category-button" data-filter="three">
                    توضیحات
                </li>
                <li class="nav-item category-button" data-filter="four" >
                    راهنمای انتخاب سایز
                </li>
            </ul>
            
     <section class="filter-sec one">
     <?php foreach($details as $detail){?>
                <div class="item">  
                     <span class="title"><?=$detail->value?></span> 
              <?php    foreach($detailsvalue as $detv){
                        if($detv->detailsID==$detail->id){    ?>
                    <div class="body-item">
                        <div class="item-specification">
                            <span class="titr">
                            <?=$detv->title?>
                            </span>
                            <span class="caption">
                            <?=$detv->value?>
                              </span>
                        </div> 
                    </div>
                   <?php } } ?>
                </div>
                <?php     } ?>
            </section>

<section class="filter-sec two">

<div class="comment-news">
<?php foreach($comments as $comment){ ?>
<div class="item-comment d-flex">
    <div class="img">
    <div class="image-person">
        <img src="" alt="">
    </div>
    </div>
    <div class="detail-comment">
        <div class="top d-flex">
       <span class="name">  <?=$comment->name?></span>
            <!-- <a href="" class="reply">   </a> -->
             <a href="" class="">   </a>
                <span class="time"> <?=$comment->submitDate?>  </span>

            </div>

            <p class="text"><?=$comment->usercheck?></p> 
        </div> 
    </div>
<?php } ?>
    <!-- <div class="item-comment item-reply d-flex">

        <div class="img">

            <div class="image-person">

                <img src="" alt="">

            </div>

        </div>

        <div class="detail-comment">

            <div class="top d-flex">

                <span class="name">

علیرضا درخشان

                </span>

                <a href="" class="reply">

                    پاسخ دادن

                </a>

                <span class="time">

25 شهریور ماه 1397

                </span>

            </div>

            <p class="text">

                دورس از الیاف پنبه بافته می شود، نسبت به دیگر پارچه های نخی ضخیم تر و مقاوم تر بوده، دارای انواع دو نخ و سه نخ است و از آن در تولید لباس های گرم و ورزشی استفاده می شود‏ , دورس از الیاف پنبه بافته می شود، نسبت به دیگر پارچه های نخی ضخیم تر و مقاوم تر بوده ...

            </p>

        </div>

    </div> -->

<!-- new item -->

    <!-- creat coment -->

           <div class="cereat-comment">
           <span class="title">
               نظر خود را ارسال کنید
           </span>
                    <div class="body"  >
                        <!-- <form class="form- form-comment" action="#"> -->
                        <?php $form = ActiveForm::begin(['options' => ['class' => 'form- form-comment']]); ?>
                        <?= $form->field($checkit,'usercheck')->textarea(['class'=>'name-input','placeholder' => 'متن پیام خود را بنویسید ...','required'=>'required'])->label(false)  ?>
                            <div class="d-flex justify-content-between flex-wrap">
                                <div class="form">
                                <?= $form->field($checkit, 'name',['options' => ['style' => 'display:inline-block;']])->textInput(['class'=>'name-input','placeholder' => 'نام و نام خانوادگی','required'=>'required'])->label(false)  ?>
                                <?= $form->field($checkit, 'userEmail',['options'=>['style'=>'display:inline-block;']])->textInput(['class'=>'name-input','placeholder' => 'پست الکترونیک','required'=>'required'])->label(false)  ?>
                                <?=$form->field($checkit, 'rate',['options' => ['style' => 'display:inline-block;color:#a3cced;']])->widget('kl83\widgets\RatingInput', [
                                    'containerOptions' => [
                                        'id'=>"starhalf",
                                        'class'=>'name-input',
                                    ], // HTML attributes
                                    'maxRating' => 5,
                                    // stars count, default - 5
                                ])->label(false);?>
                                </div> 
                                <?= Html::submitButton('ارسال کنید', ['class' => 'btn btn-send']) ?>
                            </div>
                            <?php ActiveForm::end(); ?>
                    </div>
                </div>

 <!-- end new item  -->

</div>

</section>

            <section class="filter-sec three" >
                <!--text-->
                <section class="text-section">
                    <div class="container">
                        <p class="text"><?=$product->description?></p>
                    </div>
                </section>
            </section> 
            <section class="filter-sec four" id="four">
                <!--text-->
                <section class="text-section">
                    <div class="container">
                        <!-- <table id="t01">
                            <tr>
                                <th>سن </th>
                                <th>ارتفاع (سانتی متر)</th>
                                <th>وزن (کیلوگرم)</th>
                            </tr>
                            <?php foreach($sizes as $size){ ?>
                            <tr>
                                <td><?=$size->age?> </td>
                                <td><?=$size->height?> </td>
                                <td><?=$size->width?> </td>
                            </tr>
                            <?php } ?>
                           
                        </table> -->
                        <?php foreach(\app\models\Sizeimg::find()->all() as $size){ ?>
                        <img class="table-img" src="/uploads/<?=$size->img?>" alt="">
                        <?php } ?>
         
                    </div>
                </section>
            </section>
        </div>
    </div>
</main>
<?php
$script = <<< JS

jQuery('#fvoption-featurevid').change(()=>{ 
    $("#minmaxcount").attr({
            "value" :1
            }); 
});
 
  
JS;
$this->registerJs($script);
?>
<?php
$script = <<< JS

function ToRial(str) {

var objRegex = new RegExp('(-?[0-9]+)([0-9]{3})');

while (objRegex.test(str)) {
    str = str.toString().replace(objRegex, '$1,$2');
}

return str;
} 

jQuery('#fvoption-featurevid').change(()=>{
    var html='';
    $.get("/api/featurev/"+jQuery('#fvoption-featurevid').val()).done((data,status)=>{
      console.log(data);
      console.log(status); ;
      $.each(data.data, function(index, value) {
        html+='<span >'+ToRial(value.price)+'</span>'; 
        $("#mallprice").attr({
            "value" : +value.price,  
            });  
        $("#sizeletme").attr({
            "value" : +value.id,  
            });  

          

        
        if(value.count==0 || value.count==null || value.count<1){  
            $('#masterprice').hide(); 
            $('#pricefeature').html(html);
            $('#callyou').hide();  
            $('#counthide').hide();
            $('#pricehide').show(); 
            $('#callme').show();
            $('#mojod').show();
        }else if(value.count>0 && value.count!=null ){   
        $('#masterprice').hide(); 
        $('#callme').hide(); 
        $('#counthide').show();
        $('#pricehide').show();
        $('#pricefeature').html(html); 
        $('#callyou').show();
        $('#mojod').hide();
       
        var a=parseInt($('#mallprice').val());
        console.log(a); 
        var b=parseInt($('#offfer').val());
        console.log(b)
        var c=a-((a*b)/100);
        console.log(c)

        $('#offerprice').html(ToRial(c)); 
        if($('#offfer').val()!=''){
        $("#advance").attr({
            "value" : +c,  
            });  
        }else{
            $("#advance").attr({
            "value" : +a,  
            });    
        }

        }
 
      });
      ConvertNumberToPersion();
     
    });      
});
 
  
JS;
$this->registerJs($script);
?>
<?php
$script = <<< JS

jQuery('#fvoption-featurevid').change(()=>{  
    var html='';
    $.get("/api/featurev/"+jQuery('#fvoption-featurevid').val()).done((data,status)=>{
      console.log(data);
      console.log(status); ;
      $.each(data.data, function(index, value) {  
        $("#minmaxcount").attr({
            "max" : +value.count,
            "min" : 1
            });
      });
    
      ConvertNumberToPersion();
     
    });      
});
 
  
JS;
$this->registerJs($script);
?>

 
