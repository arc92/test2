<?php

use yii\helpers\Html;
use yii\bootstrap\ActiveForm;
use yii\helpers\ArrayHelper;
use yii\widgets\LinkPager;
/* @var $this yii\web\View */


?>

<main class="product-list catfilter"> 

<div class=" container p-0 d-flex justify-content-between align-items-center">
<button class="filter-category">
<i class="icon-menu-1"></i>
<span>
فیلتر
</span>
</button>
<button class="cat-close">
×
</button>
</div>
<article class="header-list-grid ">
<section class="show container p-0 d-flex  align-items-center justify-content-between">

<!--Right Details -->

<!--of Header Content-->
<!-- 
<div class="number d-flex  align-items-center"> 
<span class="title number-title">   بر اساس تعداد نمایش  :    </span> 
<select name="state" class="js-example-basic-single" id="show" > 
<option > لطفا انتخاب کنید </option> 
<option value="10">    نمایش 10 عدد   </option> 
<option value="20">   نمایش 20 عدد   </option> 
<option value="30">    نمایش 30 عدد  </option>  
</select> 
</div> -->

<!--Left Details -->

<!--of Header Content-->

<div class="sort d-flex  align-items-center">

<span class="title sort-title">

مرتب سازی بر اساس  :

</span>

<ul class="nav">

<!-- <li class="nav-item ">

<a href="#" class="nav-link ">

<i class="icon-menu-1"></i>

</a>

</li> -->

<!-- <li class="nav-item ">

<div class="nav-link active">

<i class="icon-menu-2"></i>

</a>

</li> -->

<li class="nav-item active category-button" data-filter="one">

<i class="icon-menu-4"></i>

</li>

<li class="nav-item  category-button" data-filter="two">


<i class="icon-menu-3"></i>

</li>

</ul>

</div>

</section>

<!-- <section class="filter container p-0 d-flex flex-wrap  justify-content-around align-items-center">
<span class="title">
انتخاب فیلتر ها بر اساس  :
</span>
$form = ActiveForm::begin([
'action'=>'search',
'fieldConfig' => [
'template' => '{input}{label}{hint}',
'horizontalCssClasses' => [
'label' => '',
'offset' => '',
'wrapper' => '',
'error' => '',
'hint' => '',
],
]
]); ?>
$form->field($category, 'id', ['options' => ['style' => 'display:inline-block;']])->dropDownList( ArrayHelper::map(\app\models\Category::find()->all(), 'id', 'name'),['prompt'=>'انتخاب دسته بندی','class'=>'js-example-basic-single auto'])->label('') ?>
$form->field($subcat, 'id', ['options' => ['style' => 'display:inline-block;']])->dropDownList(ArrayHelper::map(\app\models\Subcat::find()->all(), 'id', 'name'),['prompt'=>'انتخاب جنسیت..','class'=>'js-example-basic-single auto'])->label('') ?>
$form->field($model, 'planID', ['options' => ['style' => 'display:inline-block;']])->dropDownList(ArrayHelper::map(\app\models\Plan::find()->Where(['status'=>1])->orderBy(['id'=>SORT_DESC])->all(), 'id', 'name'),['prompt'=>'انتخاب طرح..','class'=>'js-example-basic-single auto'])->label('') ?>
$form->field($model, 'colorID', ['options' => ['style' => 'display:inline-block;']])->dropDownList(ArrayHelper::map(\app\models\Color::find()->all(), 'id', 'value'),['prompt'=>'انتخاب رنگ..','class'=>'js-example-basic-single auto'])->label('') ?>
$form->field($size, 'id', ['options' => ['style' => 'display:inline-block;']])->dropDownList(ArrayHelper::map(\app\models\Size::find()->all(), 'age', 'age'),['prompt'=>'انتخاب سایز..','class'=>'js-example-basic-single auto'])->label('') ?>


ActiveForm::end(); ?>
</section> -->
</article>

<section class="filter-sec one list">


<div class="container p-0">
<div class="row">
<div class="col-md-3">
<aside class="side-help-single" style="">
<?php $form = ActiveForm::begin(); ?>
<article class="contact-setting">
    <div class="dashboard">
        <div class="detail-dashboard d-flex flex-wrap">
            <div class="col-xl-12">
                <div class="order-map" style="overflow-x: hidden ; overflow-y: hidden">
                    <div  >
                        <div class="tbody" style="cursor: pointer;">
                            <div class="item-filter item-order-map layer"> 
                                <?php 
                                $catproducts=\app\models\Catproduct::find()->Where(['urltitle'=>$_GET['urltitle'] ])->one();
                                ?>
                            <input type="radio" name="catproduct" value="<?=$catproducts->id?>" style="display:none!important;" >
                                <div class="tr d-flex">
                                    <div class="td" style="width:70%!important;font-weight:300!important;font-size:19px!important;"> دسته بندی </div>
                                    <div class="td text-center" style="margin-right:20px!important;">
                                        <span class="btn btn-icon">
                                            <i class="icon-004-down-chevron"></i>
                                            <i class="icon-007-up-chevron d-none"></i>
                                        </span>
                                    </div>
                                </div>
                                <div class="drop-down" style="display: none;">
                                    <div class="top-drop-down d-flex justify-content-between align-items-center">
                                        <div class="right d-flex align-items-center">
                                            <div class="detail"> 
                                                <?php foreach(\app\models\Catproduct::find()->OrderBy(['sort'=>SORT_ASC])->all() as $cat){ ?>
                                                    <div class="address d-flex justify-content-between align-items-center">
                                                        <input type="radio" name="category" value="<?=$cat->id?>" id="cat<?=$cat->id?>">
                                                        <label for="cat<?=$cat->id?>">
                                                          <?=$cat->name ?>
                                                        </label>
                                                </div>
                                                <?php } ?>
                                                <!-- $form->field($category, 'id')->radioList( ArrayHelper::map(\app\models\Category::find()->all(), 'id', 'name'))->label('') ?> -->
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="item-filter item-order-map">
                                <div class="tr d-flex">
                                    <div class="td" style="width:70%!important;font-weight:300!important;font-size:19px!important;"> جنسیت </div>
                                    <div class="td text-center" style="margin-right:20px!important;">
                <span class="btn btn-icon">
                    <i class="icon-004-down-chevron"></i>
                    <i class="icon-007-up-chevron d-none"></i>
                </span>
                                    </div>
                                </div>
                                <div class="drop-down" style="display: none;">
                                    <div class="top-drop-down d-flex justify-content-between align-items-center">
                                        <div class="right d-flex align-items-center">
                                            <div class="detail">
                                            <?php foreach(\app\models\Subcat::find()->all() as $subcat){ ?>
                                                    <div class="address d-flex justify-content-between align-items-center">
                                                        <input type="radio" name="subcat" value="<?=$subcat->id?>" id="subcat<?=$subcat->id?>">
                                                        <label for="subcat<?=$subcat->id?>">
                                                          <?=$subcat->name ?>
                                                        </label>
                                                </div>
                                                <?php } ?>
                                               <!-- $form->field($subcat, 'id', ['options' => ['style' => 'display:inline-block;']])->radioList(ArrayHelper::map(\app\models\Subcat::find()->all(), 'id', 'name'))->label('') ?> -->

                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="item-filter item-order-map">
                                <div class="tr d-flex">
                                    <div class="td" style="width:70%!important;font-weight:300!important;font-size:19px!important;"> طرح </div>
                                    <div class="td text-center" style="margin-right:20px!important;">
                <span class="btn btn-icon">
                    <i class="icon-004-down-chevron"></i>
                    <i class="icon-007-up-chevron d-none"></i>
                </span>
                                    </div>
                                </div>
                                <div class="drop-down" style="display: none;">
                                    <div class="top-drop-down d-flex justify-content-between align-items-center">
                                        <div class="right d-flex align-items-center">
                                            <div class="detail">
                                            <?php foreach(\app\models\Plan::find()->orderBy(['id'=>SORT_DESC])->all() as $Plan){ ?>
                                                    <div class="address d-flex justify-content-between align-items-center">
                                                        <input type="radio" name="plan" value="<?=$Plan->id?>" id="plan<?=$Plan->id?>">
                                                        <label for="plan<?=$Plan->id?>">
                                                          <?=$Plan->name ?>
                                                        </label>
                                                </div>
                                                <?php } ?>
                                                <!-- $form->field($model, 'planID', ['options' => ['style' => 'display:inline-block;']])->radioList(ArrayHelper::map(\app\models\Plan::find()->Where(['status'=>1])->orderBy(['id'=>SORT_DESC])->all(), 'id', 'name'))->label('') ?> -->

                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="item-filter item-order-map">
                                <div class="tr d-flex">
                                    <div class="td" style="width:70%!important;font-weight:300!important;font-size:19px!important;"> رنگ </div>
                                    <div class="td text-center" style="margin-right:20px!important;">
                <span class="btn btn-icon">
                    <i class="icon-004-down-chevron"></i>
                    <i class="icon-007-up-chevron d-none"></i>
                </span>
                                    </div>
                                </div>
                                <div class="drop-down" style="display: none;">
                                    <div class="top-drop-down d-flex justify-content-between align-items-center">
                                        <div class="right d-flex align-items-center">
                                            <div class="detail">
                                            <?php foreach(\app\models\Color::find()->all() as $Color){ ?>
                                                    <div class="address d-flex justify-content-between align-items-center">
                                                        <input type="radio" name="color" value="<?=$Color->id?>" id="color<?=$Color->id?>">
                                                        <label for="color<?=$Color->id?>">
                                                          <?=$Color->value ?>
                                                        </label>
                                                </div>
                                                <?php } ?>
                                                <!-- =$form->field($model, 'colorID', ['options' => ['style' => 'display:inline-block;']])->radioList(ArrayHelper::map(\app\models\Color::find()->all(), 'id', 'value'))->label('') ?> -->

                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>


                            <div class="item-filter item-order-map">
                                <div class="tr d-flex">
                                    <div class="td" style="width:70%!important;font-weight:300!important;font-size:19px!important;"> سایز </div>
                                    <div class="td text-center" style="margin-right:20px!important;">
                <span class="btn btn-icon">
                    <i class="icon-004-down-chevron"></i>
                    <i class="icon-007-up-chevron d-none"></i>
                </span>
                                    </div>
                                </div>
                                <div class="drop-down" style="display: none;">
                                    <div class="top-drop-down d-flex justify-content-between align-items-center">
                                        <div class="right d-flex align-items-center">
                                            <div class="detail">
                                            <?php foreach(\app\models\Size::find()->all() as $Size){ ?>
                                                    <div class="address d-flex justify-content-between align-items-center">
                                                        <input type="radio" name="size" value="<?=$Size->age?>" id="size<?=$Size->id?>">
                                                        <label for="size<?=$Size->id?>">
                                                          <?=$Size->age ?>
                                                        </label>
                                                </div>
                                                <?php } ?>
                                                <!-- $form->field($size, 'id', ['options' => ['style' => 'display:inline-block;']])->radioList(ArrayHelper::map(\app\models\Size::find()->all(), 'age', 'age'))->label('') ?> -->

                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
</article>
<?php ActiveForm::end(); ?>
</aside>
</div>
<div class="col-md-9">
<div class="row d-flex justify-content-between" id="product-content">
<?php foreach ($articles as $article) { 
      ?>
    <!--with New Badge-->
    <div class="item">
        <div class="details-item">

            <!-- <label class="badge off">
                ناموجود
            </label>   -->
            <ul class="nav">
                <!-- <li class="nav-item shopping">
                    <i class="icon-046-crop-button"></i>
                </li> -->
                <li class="nav-item">
                    <a href="/product/<?=str_replace(' ', '-',$article->name)?>/" target="_blank">   <i class="icon-003-buy"></i></a>
                </li>
                <li class="nav-item icon-like">
                    <i class="icon-012-like" id="like<?=$article->id?>"  data-like="<?=$article->id?>"></i>
                </li>
            </ul>

            <script src="https://code.jquery.com/jquery-3.3.1.min.js"></script>
                        <script>
                            jQuery('#like<?=$article->id?>').on('click',function(e){
                                e.preventDefault();
                                var data = $(this).attr('data-like');
                                console.log(data );
                                $.ajax({
                                        url: '/product/like',
                                        data: {like: data} 
                                    }).done(function(response){
                                        sessionStorage.setItem('<?=$article->id?>', data); 
                                    });  
                            });
                            $("#like<?=$article->id?>").click(function() {
                                $("#like<?=$article->id?>").css("color", "red"); 
                            });
                        </script>

         
            <a href="/product/<?=str_replace(' ', '-',$article->name)?>/" target="_blank">
                <img src="/<?=$article->productimgs->img ?>" alt="">
            </a>
            <div class="text">
                <h3 class="title">
                    <?=$article->name?>
                </h3>
                <?php  if( $article->checkCount() ){?>
                    <div class="price-item d-flex " >
                        <span class="price" style="color: #ababab;font-size: 1.286rem;line-height: 1.222;font-weight: 400;margin-top: 20px;"> ـــــــــــــــــــــ  ناموجود   ــــــــــــــــــــــ</span>
                    </div>
                <?php }else{?>
                    <?php 
                         $today=Yii::$app->jdate->date('Y/m/d');
                           $offer=\app\models\Offer::find()->Where(['planID'=>$article->planID])->one();
                              if($offer && $today>=$offer->start_date && $today<=$offer->end_date){?>
                        <div class="price-item d-flex " >
                            <del class="price-deleted" style="color:#5e5e5e!important;">   <?=number_format($article->price)?>   </del>
                            <span class="price">
            <label class="badge off" style="border-radius:5px!important;top:0px!important;width:80px!important;height:30px!important;">
    <?=$offer->percent?>%
    </label>
            </span>
                            <!-- <span class="price" style="margin-right: 80px!important;color:#d2d2d2!important;">       تخفیف    </span> -->
                        </div>
                        <div class="price-item d-flex ">
            <span class="price" style="color:#ed008c!important;">
            <?=number_format($article->price-($article->price*$offer->percent)/100)?> هزار تومان
            </span>

                        </div>

                    <?php    }else{ ?>
                        <span class="price"><?=number_format($article->price)?>   هزار تومان  </span>
                    <?php } } ?>
            </div>
        </div>
    </div>
<?php }   ?>
     
</div>
</div>
</div>


</div>
</section>
<!-- add new item -->
<!-- for list grid -->
<section class="filter-sec two list">
<div class="container p-0" id="view2">
<?php foreach ($articles as $article) {  ?>
<div class="item item-line">
<div class="d-flex flex-wrap justify-content-around align-items-center">
<a href="/product/<?=str_replace(' ', '-',$article->name)?>/" target="_blank">

        <img src="/<?=$article->productimgs->img?>" alt=""> 
</a>
<div class="introduciton">
    <h3 class="title">  <?=$article->name?> </h3>
    <span class="price ">  <?=number_format($article->price)?>  تومان </span>
</div>
<ul class="nav attr d-block">
    <span class="title">
        ویژگی
    </span>
    <?php foreach($aboutproducts as $aboutproduct){
        if($aboutproduct->productID==$article->id){ ?>
    <li class="nav-item"> 
    <i class="icon-023-tick"></i> 
    <?=$aboutproduct->details?>  
    </li> 
    <?php } } ?>
</ul>
<a href="/product/<?=str_replace(' ', '-',$article->name)?>/" target="_blank" class="show">
    <span>
    مشاهده محصول
    </span>
        </a>
</div>
</div>
<?php } ?>
</div>
</section>
<section class="page-item">
<div class="container p-0 d-flex justify-content-between align-items-center" id="pagenum">
<span class="view">
تعداد کل محصول<?=$count?> 
</span>
<ul class="nav page align-items-center">

<li class="nav-item">
<?php echo LinkPager::widget([
'pagination' => $pagination ,

]);?>


</li>

</ul>
</div>
</section>

<?php if($contentcategory){ ?>  
<section class="filter-sec  list " style="margin-bottom:100px;height:auto;">
    <div class="container p-0"> 
        <div class="item item-line" style="padding:50px;border: 2px solid #a3cced!important;">
            <div class="d-flex flex-wrap justify-content-around align-items-center"> 
                <div class="introduciton">
                    <h1 class="title"> <?=$contentcategory->title?></h1> 
                     <?=$contentcategory->content?>
                </div> 
            </div>
         </div> 
    </div>
</section>
<?php } ?>


</main>

<!-- get subcat api-->

<?php
$script = <<< JS

function ToRial(str) {

    var objRegex = new RegExp('(-?[0-9]+)([0-9]{3})');

    while (objRegex.test(str)) {
        str = str.toString().replace(objRegex, '$1,$2');
    }

    return str;
} 

$(document).ready(function () { 
ConvertNumberToPersion();

});

 
$('input:radio[name="category"]').change(
    function(){
        if ($(this).is(':checked') ) {
    var html=''; 
    if ( $('input:radio[name="category"]').is(':checked') ) {
    var url=("/api/url?categoryID="+$(this).val());
    } 
 
    console.log(url);
    
  $.get(url,(data,status)=>{
      console.log(data);
      console.log(status); 
              
                       
                $.each(data.data, function(index, value) {  
                   
                        html+='/baby-clothing/'+value.urltitle+'/';  
                        console.log(html); 
                    });    
                    window.location.href = (html); 
                    $('.layer').css('border','1px solid #ed008c');
     });  
    }
    }
   
); 
 ////categoryID
// $('input:radio[name="category"]').change(
//     function(){
//         if ($(this).is(':checked') ) {
//     var html=''; 
//     if ( $('input:radio[name="subcat"]').is(':checked') && $('input:radio[name="plan"]').is(':checked') && $('input:radio[name="color"]').is(':checked') && $('input:radio[name="size"]').is(':checked')) {
//     var url=("/api/filter?categoryID="+$(this).val()+"&subcatID="+$('input:radio[name="subcat"]:checked').val()+"&planID="+$('input:radio[name="plan"]:checked').val()+"&colorID="+$('input:radio[name="color"]:checked').val()+"&name="+$('input:radio[name="size"]:checked').val());
//     }else if ( $('input:radio[name="subcat"]').is(':checked') && $('input:radio[name="plan"]').is(':checked') && $('input:radio[name="color"]').is(':checked')) {
//     var url=("/api/filter?categoryID="+$(this).val()+"&subcatID="+$('input:radio[name="subcat"]:checked').val()+"&planID="+$('input:radio[name="plan"]:checked').val()+"&colorID="+$('input:radio[name="color"]:checked').val() );
//     }else if ( $('input:radio[name="subcat"]').is(':checked') && $('input:radio[name="plan"]').is(':checked') ) {
//     var url=("/api/filter?categoryID="+$(this).val()+"&subcatID="+$('input:radio[name="subcat"]:checked').val()+"&planID="+$('input:radio[name="plan"]:checked').val());
//     }else if ($('input:radio[name="subcat"]').is(':checked')) {
//     var url=("/api/filter?categoryID="+$(this).val()+"&subcatID="+$('input:radio[name="subcat"]:checked').val());
//     }else if ($('input:radio[name="plan"]').is(':checked')) {
//     var url=("/api/filter?categoryID="+$(this).val()+"&planID="+$('input:radio[name="plan"]:checked').val());
//     }else if ($('input:radio[name="color"]').is(':checked')) {
//     var url=("/api/filter?categoryID="+$(this).val()+"&colorID="+$('input:radio[name="color"]:checked').val());
//     }else if ($('input:radio[name="size"]').is(':checked')) {
//     var url=("/api/filter?categoryID="+$(this).val()+"&name="+$('input:radio[name="size"]:checked').val());
//     }else{
//     var url=("/api/filter?categoryID="+$(this).val());
//     }
 
//     console.log(url);
    
//   $.get(url,(data,status)=>{
//       console.log(data);
//       console.log(status); 
              
     
//                 $.each(data.data, function(index, value) {  
//                         var text=value.name; 
//                      text=text.replace(/ /g, "-"); 
//                      if(value.count==1 ){ 

//                      }else{
//                      html+='<div class="item" >';
//                         html+=' <div class="details-item"> ';  
//                         html+=' <a target="_blank" href="/product/'+text+'/ ">'; 
//                         html+='<img src="/'+value.image+'">'; 
//                         html+='<div class="text">';
//                         html+=' <h3 class="title">'+value.name+'</h3>     ';   
//                         if(value.count==1 ){   
//                             html+=' <div class="price-item d-flex " > ';  
//                             html+='<span class="price" style="color: #ababab;font-size: 1.286rem;line-height: 1.222;font-weight: 400;margin-top: 20px;"> ـــــــــــــــــــــ  ناموجود   ــــــــــــــــــــــ</span> ';  
//                             html+='</div>  ';  
//                         }else{
//                             if(value.offer!=null ){
//                                 html+=' <div class="price-item d-flex " >'; 
//                                 html+='<del class="price-deleted" style="color:#5e5e5e!important;">'+ToRial(value.price)+'</del>'; 
//                                 html+='<span class="price"> '; 
//                                 html+='<label class="badge off" style="border-radius:5px!important;top:0px!important;width:80px!important;height:30px!important;">'+value.offer+'%</label>'; 
//                                 html+=' </span>';  
//                                 html+='</div> ';  
//                                 html+=' <span class="price" style="color:#ed008c!important;"> '+ToRial(value.price)+'هزار تومان</span>';   
//                         }else{
//                         html+=' <span class="price">  '+ToRial(value.price)+'  تومان </span>';
//                         }
//                 }
//                         html+=' </div>';
//                         html+=' </a>';
//                         html+='</div>'; 
//                         html+='</div>'; 
//                      }
//                  });

          
//                 $('#product-content').html(html);
//                 $('#pagenum').html(' ');
//                 ConvertNumberToPersion();
               
//      });  
//     }
// }
// );   

 

  ////subcatID
$('input:radio[name="subcat"]').change(
    function(){
        if ($(this).is(':checked') ) {
    var html=''; 
    if ( $('input:radio[name="category"]').is(':checked') && $('input:radio[name="plan"]').is(':checked') && $('input:radio[name="color"]').is(':checked') && $('input:radio[name="size"]').is(':checked')) {
    var url=("/api/filter?subcatID="+$(this).val()+"&categoryID="+$('input:radio[name="category"]:checked').val()+"&planID="+$('input:radio[name="plan"]:checked').val()+"&colorID="+$('input:radio[name="color"]:checked').val()+"&name="+$('input:radio[name="size"]:checked').val());
    }else if ( $('input:radio[name="category"]').is(':checked') && $('input:radio[name="plan"]').is(':checked') && $('input:radio[name="color"]').is(':checked')) {
    var url=("/api/filter?subcatID="+$(this).val()+"&categoryID="+$('input:radio[name="category"]:checked').val()+"&planID="+$('input:radio[name="plan"]:checked').val()+"&colorID="+$('input:radio[name="color"]:checked').val() );
    }else if ( $('input:radio[name="category"]').is(':checked') && $('input:radio[name="plan"]').is(':checked') ) {
    var url=("/api/filter?subcatID="+$(this).val()+"&categoryID="+$('input:radio[name="category"]:checked').val()+"&planID="+$('input:radio[name="plan"]:checked').val());
    }else if ($('input:radio[name="category"]').is(':checked')) {
    var url=("/api/filter?subcatID="+$(this).val()+"&categoryID="+$('input:radio[name="category"]:checked').val());
    }else if ($('input:radio[name="category"]').is(':checked') && $('input:radio[name="color"]').is(':checked')) {
    var url=("/api/filter?subcatID="+$(this).val()+"&categoryID="+$('input:radio[name="category"]:checked').val()+"&colorID="+$('input:radio[name="color"]:checked').val());
    }else if ($('input:radio[name="category"]').is(':checked') && $('input:radio[name="size"]').is(':checked')) {
    var url=("/api/filter?subcatID="+$(this).val()+"&categoryID="+$('input:radio[name="category"]:checked').val()+ "&name="+$('input:radio[name="size"]:checked').val());
    } else if ($('input:radio[name="plan"]').is(':checked') && $('input:radio[name="color"]').is(':checked') && $('input:radio[name="size"]').is(':checked')) {
    var url=("/api/filter?subcatID="+$(this).val()+"&categoryID="+$('input:radio[name="catproduct"]').val()+"&planID="+$('input:radio[name="plan"]:checked').val()+"&colorID="+$('input:radio[name="color"]:checked').val()+"&name="+$('input:radio[name="size"]:checked').val());
    }else if ($('input:radio[name="plan"]').is(':checked') && $('input:radio[name="color"]').is(':checked')) {
    var url=("/api/filter?subcatID="+$(this).val()+"&categoryID="+$('input:radio[name="catproduct"]').val()+"&planID="+$('input:radio[name="plan"]:checked').val()+"&colorID="+$('input:radio[name="color"]:checked').val() );
    }else if ( $('input:radio[name="plan"]').is(':checked') ) {
    var url=("/api/filter?subcatID="+$(this).val()+"&categoryID="+$('input:radio[name="catproduct"]').val()+"&planID="+$('input:radio[name="plan"]:checked').val());
    }else if ($('input:radio[name="color"]').is(':checked')) {
    var url=("/api/filter?subcatID="+$(this).val()+"&categoryID="+$('input:radio[name="catproduct"]').val()+"&colorID="+$('input:radio[name="color"]:checked').val());
    }else if ($('input:radio[name="size"]').is(':checked')) {
    var url=("/api/filter?subcatID="+$(this).val()+"&categoryID="+$('input:radio[name="catproduct"]').val()+"&name="+$('input:radio[name="size"]:checked').val());
    }else {
    var url=("/api/filter?subcatID="+$(this).val()+"&categoryID="+$('input:radio[name="catproduct"]').val());
    }
 
 
    console.log(url);
    
  $.get(url,(data,status)=>{
      console.log(data);
      console.log(status); 
              
                       
                $.each(data.data, function(index, value) {  
                        var text=value.name; 
                     text=text.replace(/ /g, "-"); 
                     if(value.count==1 ){ 

                     }else{
                     html+='<div class="item" >';
                        html+=' <div class="details-item"> ';  
                        html+=' <a target="_blank" href="/product/'+text+'/">'; 
                        html+='<img src="/'+value.image+'">'; 
                        html+='<div class="text">';
                        html+=' <h3 class="title">'+value.name+'</h3>     ';   
                        if(value.count==1 ){   
                            html+=' <div class="price-item d-flex " > ';  
                            html+='<span class="price" style="color: #ababab;font-size: 1.286rem;line-height: 1.222;font-weight: 400;margin-top: 20px;"> ـــــــــــــــــــــ  ناموجود   ــــــــــــــــــــــ</span> ';  
                            html+='</div>  ';  
                        }else{
                            if(value.offer!=null ){
                                html+=' <div class="price-item d-flex " >'; 
                                html+='<del class="price-deleted" style="color:#5e5e5e!important;">'+ToRial(value.price)+'</del>'; 
                                html+='<span class="price"> '; 
                                html+='<label class="badge off" style="border-radius:5px!important;top:0px!important;width:80px!important;height:30px!important;">'+value.offer+'%</label>'; 
                                html+=' </span>';  
                                html+='</div> ';  
                                html+=' <span class="price" style="color:#ed008c!important;"> '+ToRial(value.price)+'هزار تومان</span>';   
                        }else{
                        html+=' <span class="price">  '+ToRial(value.price)+'  تومان </span>';
                        }
                }
                        html+=' </div>';
                        html+=' </a>';
                        html+='</div>'; 
                        html+='</div>'; 
                     }
                 });
              
                $('#product-content').html(html);
                $('#pagenum').html(' ');
                ConvertNumberToPersion();
               
     });  
    }
}
); 

  ////planID
  $('input:radio[name="plan"]').change(
    function(){
        if ($(this).is(':checked') ) {
    var html=''; 
    if ( $('input:radio[name="category"]').is(':checked') && $('input:radio[name="subcat"]').is(':checked') && $('input:radio[name="color"]').is(':checked') && $('input:radio[name="size"]').is(':checked')) {
    var url=("/api/filter?planID="+$(this).val()+"&categoryID="+$('input:radio[name="category"]:checked').val()+"&subcatID="+$('input:radio[name="subcat"]:checked').val()+"&colorID="+$('input:radio[name="color"]:checked').val()+"&name="+$('input:radio[name="size"]:checked').val());
    }else if ( $('input:radio[name="category"]').is(':checked') && $('input:radio[name="subcat"]').is(':checked') && $('input:radio[name="color"]').is(':checked')) {
    var url=("/api/filter?planID="+$(this).val()+"&categoryID="+$('input:radio[name="category"]:checked').val()+"&subcatID="+$('input:radio[name="subcat"]:checked').val()+"&colorID="+$('input:radio[name="color"]:checked').val() );
    }else if ( $('input:radio[name="category"]').is(':checked') && $('input:radio[name="subcat"]').is(':checked') ) {
    var url=("/api/filter?planID="+$(this).val()+"&categoryID="+$('input:radio[name="category"]:checked').val()+"&subcatID="+$('input:radio[name="subcat"]:checked').val());
    }else if ($('input:radio[name="category"]').is(':checked')) {
    var url=("/api/filter?planID="+$(this).val()+"&categoryID="+$('input:radio[name="category"]:checked').val());
    }else if ($('input:radio[name="category"]').is(':checked') && $('input:radio[name="color"]').is(':checked')) {
    var url=("/api/filter?planID="+$(this).val()+"&categoryID="+$('input:radio[name="category"]:checked').val()+"&colorID="+$('input:radio[name="color"]:checked').val());
    }else if ($('input:radio[name="category"]').is(':checked') && $('input:radio[name="size"]').is(':checked')) {
    var url=("/api/filter?planID="+$(this).val()+"&categoryID="+$('input:radio[name="category"]:checked').val()+ "&name="+$('input:radio[name="size"]:checked').val());
    }else if ($('input:radio[name="subcat"]').is(':checked') && $('input:radio[name="color"]').is(':checked') && $('input:radio[name="size"]').is(':checked')) {
    var url=("/api/filter?planID="+$(this).val()+"&categoryID="+$('input:radio[name="catproduct"]').val()+"&subcatID="+$('input:radio[name="subcat"]:checked').val()+"&colorID="+$('input:radio[name="color"]:checked').val()+"&name="+$('input:radio[name="size"]:checked').val());
    }else if ($('input:radio[name="subcat"]').is(':checked') && $('input:radio[name="color"]').is(':checked')) {
    var url=("/api/filter?planID="+$(this).val()+"&categoryID="+$('input:radio[name="catproduct"]').val()+"&subcatID="+$('input:radio[name="subcat"]:checked').val()+"&colorID="+$('input:radio[name="color"]:checked').val() );
    }else if ($('input:radio[name="color"]').is(':checked') && $('input:radio[name="size"]').is(':checked')) {
    var url=("/api/filter?planID="+$(this).val()+"&categoryID="+$('input:radio[name="catproduct"]').val()+"&colorID="+$('input:radio[name="color"]:checked').val()+"&name="+$('input:radio[name="size"]:checked').val() );
    }else if ( $('input:radio[name="subcat"]').is(':checked') ) {
    var url=("/api/filter?planID="+$(this).val()+"&categoryID="+$('input:radio[name="catproduct"]').val()+"&subcatID="+$('input:radio[name="subcat"]:checked').val());
    }else if ($('input:radio[name="color"]').is(':checked')) {
    var url=("/api/filter?planID="+$(this).val()+"&categoryID="+$('input:radio[name="catproduct"]').val()+"&colorID="+$('input:radio[name="color"]:checked').val());
    }else if ($('input:radio[name="size"]').is(':checked')) {
    var url=("/api/filter?planID="+$(this).val()+"&categoryID="+$('input:radio[name="catproduct"]').val()+"&name="+$('input:radio[name="size"]:checked').val());
    }else {
    var url=("/api/filter?planID="+$(this).val()+"&categoryID="+$('input:radio[name="catproduct"]').val());
    }
 
 
    console.log(url);
    
  $.get(url,(data,status)=>{
      console.log(data);
      console.log(status); 
              
                       
                $.each(data.data, function(index, value) {  
                        var text=value.name; 
                     text=text.replace(/ /g, "-"); 
                     if(value.count==1 ){ 

                     }else{
                     html+='<div class="item" >';
                        html+=' <div class="details-item"> ';  
                        html+=' <a target="_blank" href="/product/'+text+'/">'; 
                        html+='<img src="/'+value.image+'">'; 
                        html+='<div class="text">';
                        html+=' <h3 class="title">'+value.name+'</h3>     ';   
                        if(value.count==1 ){   
                            html+=' <div class="price-item d-flex " > ';  
                            html+='<span class="price" style="color: #ababab;font-size: 1.286rem;line-height: 1.222;font-weight: 400;margin-top: 20px;"> ـــــــــــــــــــــ  ناموجود   ــــــــــــــــــــــ</span> ';  
                            html+='</div>  ';  
                        }else{
                            if(value.offer!=null ){
                                html+=' <div class="price-item d-flex " >'; 
                                html+='<del class="price-deleted" style="color:#5e5e5e!important;">'+ToRial(value.price)+'</del>'; 
                                html+='<span class="price"> '; 
                                html+='<label class="badge off" style="border-radius:5px!important;top:0px!important;width:80px!important;height:30px!important;">'+value.offer+'%</label>'; 
                                html+=' </span>';  
                                html+='</div> ';  
                                html+=' <span class="price" style="color:#ed008c!important;"> '+ToRial(value.price)+'هزار تومان</span>';   
                        }else{
                        html+=' <span class="price">  '+ToRial(value.price)+'  تومان </span>';
                        }
                }
                        html+=' </div>';
                        html+=' </a>';
                        html+='</div>'; 
                        html+='</div>'; 
                     }
                 });
              
                $('#product-content').html(html);
                $('#pagenum').html(' ');
                ConvertNumberToPersion();
               
     });  
    }
}
); 

 
 ////colorID
 $('input:radio[name="color"]').change(
    function(){
        if ($(this).is(':checked') ) {
    var html=''; 
    if ( $('input:radio[name="category"]').is(':checked') && $('input:radio[name="subcat"]').is(':checked') && $('input:radio[name="plan"]').is(':checked') && $('input:radio[name="size"]').is(':checked')) {
    var url=("/api/filter?colorID="+$(this).val()+"&categoryID="+$('input:radio[name="category"]:checked').val()+"&subcatID="+$('input:radio[name="subcat"]:checked').val()+"&planID="+$('input:radio[name="plan"]:checked').val()+"&name="+$('input:radio[name="size"]:checked').val());
    }else if ( $('input:radio[name="category"]').is(':checked') && $('input:radio[name="subcat"]').is(':checked') && $('input:radio[name="plan"]').is(':checked')) {
    var url=("/api/filter?colorID="+$(this).val()+"&categoryID="+$('input:radio[name="category"]:checked').val()+"&subcatID="+$('input:radio[name="subcat"]:checked').val()+"&planID="+$('input:radio[name="plan"]:checked').val() );
    }else if ( $('input:radio[name="category"]').is(':checked') && $('input:radio[name="subcat"]').is(':checked') ) {
    var url=("/api/filter?colorID="+$(this).val()+"&categoryID="+$('input:radio[name="category"]:checked').val()+"&subcatID="+$('input:radio[name="subcat"]:checked').val());
    }else if ($('input:radio[name="category"]').is(':checked')) {
    var url=("/api/filter?colorID="+$(this).val()+"&categoryID="+$('input:radio[name="category"]:checked').val());
    }else if ($('input:radio[name="category"]').is(':checked') && $('input:radio[name="plan"]').is(':checked')) {
    var url=("/api/filter?colorID="+$(this).val()+"&categoryID="+$('input:radio[name="category"]:checked').val()+"&planID="+$('input:radio[name="plan"]:checked').val());
    }else if ($('input:radio[name="category"]').is(':checked') && $('input:radio[name="size"]').is(':checked')) {
    var url=("/api/filter?colorID="+$(this).val()+"&categoryID="+$('input:radio[name="category"]:checked').val()+ "&name="+$('input:radio[name="size"]:checked').val());
    }else if ($('input:radio[name="subcat"]').is(':checked') && $('input:radio[name="plan"]').is(':checked') && $('input:radio[name="size"]').is(':checked')) {
    var url=("/api/filter?colorID="+$(this).val()+"&categoryID="+$('input:radio[name="catproduct"]').val()+"&subcatID="+$('input:radio[name="subcat"]:checked').val()+"&planID="+$('input:radio[name="plan"]:checked').val()+"&name="+$('input:radio[name="size"]:checked').val());
    }else if ($('input:radio[name="subcat"]').is(':checked') && $('input:radio[name="plan"]').is(':checked')) {
    var url=("/api/filter?colorID="+$(this).val()+"&categoryID="+$('input:radio[name="catproduct"]').val()+"&subcatID="+$('input:radio[name="subcat"]:checked').val()+"&planID="+$('input:radio[name="plan"]:checked').val() );
    }else if ($('input:radio[name="plan"]').is(':checked') && $('input:radio[name="size"]').is(':checked')) {
    var url=("/api/filter?colorID="+$(this).val()+"&categoryID="+$('input:radio[name="catproduct"]').val()+"&planID="+$('input:radio[name="plan"]:checked').val()+"&name="+$('input:radio[name="size"]:checked').val() );
    }else if ( $('input:radio[name="subcat"]').is(':checked') ) {
    var url=("/api/filter?colorID="+$(this).val()+"&categoryID="+$('input:radio[name="catproduct"]').val()+"&subcatID="+$('input:radio[name="subcat"]:checked').val());
    }else if ($('input:radio[name="plan"]').is(':checked')) {
    var url=("/api/filter?colorID="+$(this).val()+"&categoryID="+$('input:radio[name="catproduct"]').val()+"&planID="+$('input:radio[name="plan"]:checked').val());
    }else if ($('input:radio[name="size"]').is(':checked')) {
    var url=("/api/filter?colorID="+$(this).val()+"&categoryID="+$('input:radio[name="catproduct"]').val()+"&name="+$('input:radio[name="size"]:checked').val());
    }else {
    var url=("/api/filter?colorID="+$(this).val()+"&categoryID="+$('input:radio[name="catproduct"]').val());
    }
 
 
    console.log(url);
    
  $.get(url,(data,status)=>{
      console.log(data);
      console.log(status); 
              
                       
                $.each(data.data, function(index, value) {  
                        var text=value.name; 
                     text=text.replace(/ /g, "-"); 
                     if(value.count==1 ){ 

                     }else{
                     html+='<div class="item" >';
                        html+=' <div class="details-item"> ';  
                        html+=' <a target="_blank" href="/product/'+text+'/">'; 
                        html+='<img src="/'+value.image+'">'; 
                        html+='<div class="text">';
                        html+=' <h3 class="title">'+value.name+'</h3>     ';   
                        if(value.count==1 ){   
                            html+=' <div class="price-item d-flex " > ';  
                            html+='<span class="price" style="color: #ababab;font-size: 1.286rem;line-height: 1.222;font-weight: 400;margin-top: 20px;"> ـــــــــــــــــــــ  ناموجود   ــــــــــــــــــــــ</span> ';  
                            html+='</div>  ';  
                        }else{
                            if(value.offer!=null ){
                                html+=' <div class="price-item d-flex " >'; 
                                html+='<del class="price-deleted" style="color:#5e5e5e!important;">'+ToRial(value.price)+'</del>'; 
                                html+='<span class="price"> '; 
                                html+='<label class="badge off" style="border-radius:5px!important;top:0px!important;width:80px!important;height:30px!important;">'+value.offer+'%</label>'; 
                                html+=' </span>';  
                                html+='</div> ';  
                                html+=' <span class="price" style="color:#ed008c!important;"> '+ToRial(value.price)+'هزار تومان</span>';   
                        }else{
                        html+=' <span class="price">  '+ToRial(value.price)+'  تومان </span>';
                        }
                }
                        html+=' </div>';
                        html+=' </a>';
                        html+='</div>'; 
                        html+='</div>'; 
                     }
                 });
              
                $('#product-content').html(html);
                $('#pagenum').html(' ');
                ConvertNumberToPersion();
               
     });  
    }
}
); 
 ////size
 $('input:radio[name="size"]').change(
    function(){
        if ($(this).is(':checked') ) {
    var html=''; 
    if ( $('input:radio[name="category"]').is(':checked') && $('input:radio[name="subcat"]').is(':checked') && $('input:radio[name="plan"]').is(':checked') && $('input:radio[name="color"]').is(':checked')) {
    var url=("/api/filter?name="+$(this).val()+"&categoryID="+$('input:radio[name="category"]:checked').val()+"&subcatID="+$('input:radio[name="subcat"]:checked').val()+"&planID="+$('input:radio[name="plan"]:checked').val()+"&colorID="+$('input:radio[name="color"]:checked').val());
    }else if ( $('input:radio[name="category"]').is(':checked') && $('input:radio[name="subcat"]').is(':checked') && $('input:radio[name="plan"]').is(':checked')) {
    var url=("/api/filter?name="+$(this).val()+"&categoryID="+$('input:radio[name="category"]:checked').val()+"&subcatID="+$('input:radio[name="subcat"]:checked').val()+"&planID="+$('input:radio[name="plan"]:checked').val() );
    }else if ( $('input:radio[name="category"]').is(':checked') && $('input:radio[name="subcat"]').is(':checked') ) {
    var url=("/api/filter?name="+$(this).val()+"&categoryID="+$('input:radio[name="category"]:checked').val()+"&subcatID="+$('input:radio[name="subcat"]:checked').val());
    }else if ($('input:radio[name="category"]').is(':checked')) {
    var url=("/api/filter?name="+$(this).val()+"&categoryID="+$('input:radio[name="category"]:checked').val());
    }else if ($('input:radio[name="category"]').is(':checked') && $('input:radio[name="plan"]').is(':checked')) {
    var url=("/api/filter?name="+$(this).val()+"&categoryID="+$('input:radio[name="category"]:checked').val()+"&planID="+$('input:radio[name="plan"]:checked').val());
    }else if ($('input:radio[name="category"]').is(':checked') && $('input:radio[name="color"]').is(':checked')) {
    var url=("/api/filter?name="+$(this).val()+"&categoryID="+$('input:radio[name="category"]:checked').val()+ "&colorID="+$('input:radio[name="color"]:checked').val());
    }else if ($('input:radio[name="subcat"]').is(':checked') && $('input:radio[name="plan"]').is(':checked') && $('input:radio[name="color"]').is(':checked')) {
    var url=("/api/filter?name="+$(this).val()+"&categoryID="+$('input:radio[name="catproduct"]').val()+"&subcatID="+$('input:radio[name="subcat"]:checked').val()+"&planID="+$('input:radio[name="plan"]:checked').val()+"&colorID="+$('input:radio[name="color"]:checked').val());
    }else if ($('input:radio[name="subcat"]').is(':checked') && $('input:radio[name="plan"]').is(':checked')) {
    var url=("/api/filter?name="+$(this).val()+"&categoryID="+$('input:radio[name="catproduct"]').val()+"&subcatID="+$('input:radio[name="subcat"]:checked').val()+"&planID="+$('input:radio[name="plan"]:checked').val() );
    }else if ($('input:radio[name="plan"]').is(':checked') && $('input:radio[name="color"]').is(':checked')) {
    var url=("/api/filter?name="+$(this).val()+"&categoryID="+$('input:radio[name="catproduct"]').val()+"&planID="+$('input:radio[name="plan"]:checked').val()+"&colorID="+$('input:radio[name="color"]:checked').val() );
    }else if ( $('input:radio[name="subcat"]').is(':checked') ) {
    var url=("/api/filter?name="+$(this).val()+"&categoryID="+$('input:radio[name="catproduct"]').val()+"&subcatID="+$('input:radio[name="subcat"]:checked').val());
    }else if ($('input:radio[name="plan"]').is(':checked')) {
    var url=("/api/filter?name="+$(this).val()+"&categoryID="+$('input:radio[name="catproduct"]').val()+"&planID="+$('input:radio[name="plan"]:checked').val());
    }else if ($('input:radio[name="color"]').is(':checked')) {
    var url=("/api/filter?name="+$(this).val()+"&categoryID="+$('input:radio[name="catproduct"]').val()+"&colorID="+$('input:radio[name="color"]:checked').val());
    }else {
    var url=("/api/filter?name="+$(this).val()+"&categoryID="+$('input:radio[name="catproduct"]').val());
    }
 
 
    console.log(url);
    
  $.get(url,(data,status)=>{
      console.log(data);
      console.log(status); 
              
                       
                $.each(data.data, function(index, value) {  
                        var text=value.name; 
                     text=text.replace(/ /g, "-"); 
                     if(value.count==1 ){ 

                     }else{
                     html+='<div class="item" >';
                        html+=' <div class="details-item"> ';  
                        html+=' <a target="_blank" href="/product/'+text+'/">'; 
                        html+='<img src="/'+value.image+'">'; 
                        html+='<div class="text">';
                        html+=' <h3 class="title">'+value.name+'</h3>     ';   
                        if(value.count==1 ){   
                            html+=' <div class="price-item d-flex " > ';  
                            html+='<span class="price" style="color: #ababab;font-size: 1.286rem;line-height: 1.222;font-weight: 400;margin-top: 20px;"> ـــــــــــــــــــــ  ناموجود   ــــــــــــــــــــــ</span> ';  
                            html+='</div>  ';  
                        }else{
                            if(value.offer!=null ){
                                html+=' <div class="price-item d-flex " >'; 
                                html+='<del class="price-deleted" style="color:#5e5e5e!important;">'+ToRial(value.price)+'</del>'; 
                                html+='<span class="price"> '; 
                                html+='<label class="badge off" style="border-radius:5px!important;top:0px!important;width:80px!important;height:30px!important;">'+value.offer+'%</label>'; 
                                html+=' </span>';  
                                html+='</div> ';  
                                html+=' <span class="price" style="color:#ed008c!important;"> '+ToRial(value.price)+'هزار تومان</span>';   
                        }else{
                        html+=' <span class="price">  '+ToRial(value.price)+'  تومان </span>';
                        }
                }
                        html+=' </div>';
                        html+=' </a>';
                        html+='</div>'; 
                        html+='</div>'; 
                     }
                 });
              
                $('#product-content').html(html);
                $('#pagenum').html(' ');
                ConvertNumberToPersion();
               
     });  
    }
}
); 
 













////part list view

 ////categoryID
 $('input:radio[name="category"]').change(
    function(){
        if ($(this).is(':checked') ) {
    var html=''; 
    if ( $('input:radio[name="subcat"]').is(':checked') && $('input:radio[name="plan"]').is(':checked') && $('input:radio[name="color"]').is(':checked') && $('input:radio[name="size"]').is(':checked')) {
    var url=("/api/filter?categoryID="+$(this).val()+"&subcatID="+$('input:radio[name="subcat"]:checked').val()+"&planID="+$('input:radio[name="plan"]:checked').val()+"&colorID="+$('input:radio[name="color"]:checked').val()+"&name="+$('input:radio[name="size"]:checked').val());
    }else if ( $('input:radio[name="subcat"]').is(':checked') && $('input:radio[name="plan"]').is(':checked') && $('input:radio[name="color"]').is(':checked')) {
    var url=("/api/filter?categoryID="+$(this).val()+"&subcatID="+$('input:radio[name="subcat"]:checked').val()+"&planID="+$('input:radio[name="plan"]:checked').val()+"&colorID="+$('input:radio[name="color"]:checked').val() );
    }else if ( $('input:radio[name="subcat"]').is(':checked') && $('input:radio[name="plan"]').is(':checked') ) {
    var url=("/api/filter?categoryID="+$(this).val()+"&subcatID="+$('input:radio[name="subcat"]:checked').val()+"&planID="+$('input:radio[name="plan"]:checked').val());
    }else if ($('input:radio[name="subcat"]').is(':checked')) {
    var url=("/api/filter?categoryID="+$(this).val()+"&subcatID="+$('input:radio[name="subcat"]:checked').val());
    }else if ($('input:radio[name="plan"]').is(':checked')) {
    var url=("/api/filter?categoryID="+$(this).val()+"&planID="+$('input:radio[name="plan"]:checked').val());
    }else if ($('input:radio[name="color"]').is(':checked')) {
    var url=("/api/filter?categoryID="+$(this).val()+"&colorID="+$('input:radio[name="color"]:checked').val());
    }else if ($('input:radio[name="size"]').is(':checked')) {
    var url=("/api/filter?categoryID="+$(this).val()+"&name="+$('input:radio[name="size"]:checked').val());
    }else{
    var url=("/api/filter?categoryID="+$(this).val());
    }
 
    console.log(url);
    
  $.get(url,(data,status)=>{
      console.log(data);
      console.log(status); 
              
     
                $.each(data.data, function(index, value) {  
                        var text=value.name; 
                     text=text.replace(/ /g, "-"); 
                     if(value.count==1 ){ 

                     }else{
                        html+='<div class="item item-line">';
                        html+='<div class="d-flex flex-wrap justify-content-around align-items-center">';
                        html+='<a href="/product/'+text+'/" target="_blank">'; 
                        html+='<img src="/'+value.image+'" alt=""></a>';
                        html+='<div class="introduciton">';
                        html+='<h3 class="title">'+value.name+'</h3>';
                        html+='<span class="price ">'+ToRial(value.price)+' تومان </span>';
                        html+='</div>'; 
                        html+='<a href="/product/'+text+'/" target="_blank" class="show">';
                        html+=' <span>   مشاهده محصول </span> </a>';
                        html+='</div>';
                        html+='</div>';
                     }
                 });

          
                $('#view2').html(html);
                $('#pagenum').html(' ');
                ConvertNumberToPersion();
               
     });  
    }
}
);   

 

  ////subcatID
$('input:radio[name="subcat"]').change(
    function(){
        if ($(this).is(':checked') ) {
    var html=''; 
    if ( $('input:radio[name="category"]').is(':checked') && $('input:radio[name="plan"]').is(':checked') && $('input:radio[name="color"]').is(':checked') && $('input:radio[name="size"]').is(':checked')) {
    var url=("/api/filter?subcatID="+$(this).val()+"&categoryID="+$('input:radio[name="category"]:checked').val()+"&planID="+$('input:radio[name="plan"]:checked').val()+"&colorID="+$('input:radio[name="color"]:checked').val()+"&name="+$('input:radio[name="size"]:checked').val());
    }else if ( $('input:radio[name="category"]').is(':checked') && $('input:radio[name="plan"]').is(':checked') && $('input:radio[name="color"]').is(':checked')) {
    var url=("/api/filter?subcatID="+$(this).val()+"&categoryID="+$('input:radio[name="category"]:checked').val()+"&planID="+$('input:radio[name="plan"]:checked').val()+"&colorID="+$('input:radio[name="color"]:checked').val() );
    }else if ( $('input:radio[name="category"]').is(':checked') && $('input:radio[name="plan"]').is(':checked') ) {
    var url=("/api/filter?subcatID="+$(this).val()+"&categoryID="+$('input:radio[name="category"]:checked').val()+"&planID="+$('input:radio[name="plan"]:checked').val());
    }else if ($('input:radio[name="category"]').is(':checked')) {
    var url=("/api/filter?subcatID="+$(this).val()+"&categoryID="+$('input:radio[name="category"]:checked').val());
    }else if ($('input:radio[name="category"]').is(':checked') && $('input:radio[name="color"]').is(':checked')) {
    var url=("/api/filter?subcatID="+$(this).val()+"&categoryID="+$('input:radio[name="category"]:checked').val()+"&colorID="+$('input:radio[name="color"]:checked').val());
    }else if ($('input:radio[name="category"]').is(':checked') && $('input:radio[name="size"]').is(':checked')) {
    var url=("/api/filter?subcatID="+$(this).val()+"&categoryID="+$('input:radio[name="category"]:checked').val()+ "&name="+$('input:radio[name="size"]:checked').val());
    } else if ($('input:radio[name="plan"]').is(':checked') && $('input:radio[name="color"]').is(':checked') && $('input:radio[name="size"]').is(':checked')) {
    var url=("/api/filter?subcatID="+$(this).val()+"&categoryID="+$('input:radio[name="catproduct"]').val()+"&planID="+$('input:radio[name="plan"]:checked').val()+"&colorID="+$('input:radio[name="color"]:checked').val()+"&name="+$('input:radio[name="size"]:checked').val());
    }else if ($('input:radio[name="plan"]').is(':checked') && $('input:radio[name="color"]').is(':checked')) {
    var url=("/api/filter?subcatID="+$(this).val()+"&categoryID="+$('input:radio[name="catproduct"]').val()+"&planID="+$('input:radio[name="plan"]:checked').val()+"&colorID="+$('input:radio[name="color"]:checked').val() );
    }else if ( $('input:radio[name="plan"]').is(':checked') ) {
    var url=("/api/filter?subcatID="+$(this).val()+"&categoryID="+$('input:radio[name="catproduct"]').val()+"&planID="+$('input:radio[name="plan"]:checked').val());
    }else if ($('input:radio[name="color"]').is(':checked')) {
    var url=("/api/filter?subcatID="+$(this).val()+"&categoryID="+$('input:radio[name="catproduct"]').val()+"&colorID="+$('input:radio[name="color"]:checked').val());
    }else if ($('input:radio[name="size"]').is(':checked')) {
    var url=("/api/filter?subcatID="+$(this).val()+"&categoryID="+$('input:radio[name="catproduct"]').val()+"&name="+$('input:radio[name="size"]:checked').val());
    }else {
    var url=("/api/filter?subcatID="+$(this).val()+"&categoryID="+$('input:radio[name="catproduct"]').val());
    }
 
 
    console.log(url);
    
  $.get(url,(data,status)=>{
      console.log(data);
      console.log(status); 
              
                       
                $.each(data.data, function(index, value) {  
                        var text=value.name; 
                     text=text.replace(/ /g, "-"); 
                     if(value.count==1 ){ 

                     }else{
                        html+='<div class="item item-line">';
                        html+='<div class="d-flex flex-wrap justify-content-around align-items-center">';
                        html+='<a href="/product/'+text+'/" target="_blank">'; 
                        html+='<img src="/'+value.image+'" alt=""></a>';
                        html+='<div class="introduciton">';
                        html+='<h3 class="title">'+value.name+'</h3>';
                        html+='<span class="price ">'+ToRial(value.price)+' تومان </span>';
                        html+='</div>'; 
                        html+='<a href="/product/'+text+'/" target="_blank" class="show">';
                        html+=' <span>   مشاهده محصول </span> </a>';
                        html+='</div>';
                        html+='</div>';
                     }
                 });
              
                $('#view2').html(html);
                $('#pagenum').html(' ');
                ConvertNumberToPersion();
               
     });  
    }
}
); 

  ////planID
  $('input:radio[name="plan"]').change(
    function(){
        if ($(this).is(':checked') ) {
    var html=''; 
    if ( $('input:radio[name="category"]').is(':checked') && $('input:radio[name="subcat"]').is(':checked') && $('input:radio[name="color"]').is(':checked') && $('input:radio[name="size"]').is(':checked')) {
    var url=("/api/filter?planID="+$(this).val()+"&categoryID="+$('input:radio[name="category"]:checked').val()+"&subcatID="+$('input:radio[name="subcat"]:checked').val()+"&colorID="+$('input:radio[name="color"]:checked').val()+"&name="+$('input:radio[name="size"]:checked').val());
    }else if ( $('input:radio[name="category"]').is(':checked') && $('input:radio[name="subcat"]').is(':checked') && $('input:radio[name="color"]').is(':checked')) {
    var url=("/api/filter?planID="+$(this).val()+"&categoryID="+$('input:radio[name="category"]:checked').val()+"&subcatID="+$('input:radio[name="subcat"]:checked').val()+"&colorID="+$('input:radio[name="color"]:checked').val() );
    }else if ( $('input:radio[name="category"]').is(':checked') && $('input:radio[name="subcat"]').is(':checked') ) {
    var url=("/api/filter?planID="+$(this).val()+"&categoryID="+$('input:radio[name="category"]:checked').val()+"&subcatID="+$('input:radio[name="subcat"]:checked').val());
    }else if ($('input:radio[name="category"]').is(':checked')) {
    var url=("/api/filter?planID="+$(this).val()+"&categoryID="+$('input:radio[name="category"]:checked').val());
    }else if ($('input:radio[name="category"]').is(':checked') && $('input:radio[name="color"]').is(':checked')) {
    var url=("/api/filter?planID="+$(this).val()+"&categoryID="+$('input:radio[name="category"]:checked').val()+"&colorID="+$('input:radio[name="color"]:checked').val());
    }else if ($('input:radio[name="category"]').is(':checked') && $('input:radio[name="size"]').is(':checked')) {
    var url=("/api/filter?planID="+$(this).val()+"&categoryID="+$('input:radio[name="category"]:checked').val()+ "&name="+$('input:radio[name="size"]:checked').val());
    }else if ($('input:radio[name="subcat"]').is(':checked') && $('input:radio[name="color"]').is(':checked') && $('input:radio[name="size"]').is(':checked')) {
    var url=("/api/filter?planID="+$(this).val()+"&categoryID="+$('input:radio[name="catproduct"]').val()+"&subcatID="+$('input:radio[name="subcat"]:checked').val()+"&colorID="+$('input:radio[name="color"]:checked').val()+"&name="+$('input:radio[name="size"]:checked').val());
    }else if ($('input:radio[name="subcat"]').is(':checked') && $('input:radio[name="color"]').is(':checked')) {
    var url=("/api/filter?planID="+$(this).val()+"&categoryID="+$('input:radio[name="catproduct"]').val()+"&subcatID="+$('input:radio[name="subcat"]:checked').val()+"&colorID="+$('input:radio[name="color"]:checked').val() );
    }else if ($('input:radio[name="color"]').is(':checked') && $('input:radio[name="size"]').is(':checked')) {
    var url=("/api/filter?planID="+$(this).val()+"&categoryID="+$('input:radio[name="catproduct"]').val()+"&colorID="+$('input:radio[name="color"]:checked').val()+"&name="+$('input:radio[name="size"]:checked').val() );
    }else if ( $('input:radio[name="subcat"]').is(':checked') ) {
    var url=("/api/filter?planID="+$(this).val()+"&categoryID="+$('input:radio[name="catproduct"]').val()+"&subcatID="+$('input:radio[name="subcat"]:checked').val());
    }else if ($('input:radio[name="color"]').is(':checked')) {
    var url=("/api/filter?planID="+$(this).val()+"&categoryID="+$('input:radio[name="catproduct"]').val()+"&colorID="+$('input:radio[name="color"]:checked').val());
    }else if ($('input:radio[name="size"]').is(':checked')) {
    var url=("/api/filter?planID="+$(this).val()+"&categoryID="+$('input:radio[name="catproduct"]').val()+"&name="+$('input:radio[name="size"]:checked').val());
    }else {
    var url=("/api/filter?planID="+$(this).val()+"&categoryID="+$('input:radio[name="catproduct"]').val());
    }
 
 
    console.log(url);
    
  $.get(url,(data,status)=>{
      console.log(data);
      console.log(status); 
              
                       
                $.each(data.data, function(index, value) {  
                        var text=value.name; 
                     text=text.replace(/ /g, "-"); 
                     if(value.count==1 ){ 

                     }else{
                        html+='<div class="item item-line">';
                        html+='<div class="d-flex flex-wrap justify-content-around align-items-center">';
                        html+='<a href="/product/'+text+'/" target="_blank">'; 
                        html+='<img src="/'+value.image+'" alt=""></a>';
                        html+='<div class="introduciton">';
                        html+='<h3 class="title">'+value.name+'</h3>';
                        html+='<span class="price ">'+ToRial(value.price)+' تومان </span>';
                        html+='</div>'; 
                        html+='<a href="/product/'+text+'/" target="_blank" class="show">';
                        html+=' <span>   مشاهده محصول </span> </a>';
                        html+='</div>';
                        html+='</div>';
                     }
                 });
              
                $('#view2').html(html);
                $('#pagenum').html(' ');
                ConvertNumberToPersion();
               
     });  
    }
}
); 

 
 ////colorID
 $('input:radio[name="color"]').change(
    function(){
        if ($(this).is(':checked') ) {
    var html=''; 
    if ( $('input:radio[name="category"]').is(':checked') && $('input:radio[name="subcat"]').is(':checked') && $('input:radio[name="plan"]').is(':checked') && $('input:radio[name="size"]').is(':checked')) {
    var url=("/api/filter?colorID="+$(this).val()+"&categoryID="+$('input:radio[name="category"]:checked').val()+"&subcatID="+$('input:radio[name="subcat"]:checked').val()+"&planID="+$('input:radio[name="plan"]:checked').val()+"&name="+$('input:radio[name="size"]:checked').val());
    }else if ( $('input:radio[name="category"]').is(':checked') && $('input:radio[name="subcat"]').is(':checked') && $('input:radio[name="plan"]').is(':checked')) {
    var url=("/api/filter?colorID="+$(this).val()+"&categoryID="+$('input:radio[name="category"]:checked').val()+"&subcatID="+$('input:radio[name="subcat"]:checked').val()+"&planID="+$('input:radio[name="plan"]:checked').val() );
    }else if ( $('input:radio[name="category"]').is(':checked') && $('input:radio[name="subcat"]').is(':checked') ) {
    var url=("/api/filter?colorID="+$(this).val()+"&categoryID="+$('input:radio[name="category"]:checked').val()+"&subcatID="+$('input:radio[name="subcat"]:checked').val());
    }else if ($('input:radio[name="category"]').is(':checked')) {
    var url=("/api/filter?colorID="+$(this).val()+"&categoryID="+$('input:radio[name="category"]:checked').val());
    }else if ($('input:radio[name="category"]').is(':checked') && $('input:radio[name="plan"]').is(':checked')) {
    var url=("/api/filter?colorID="+$(this).val()+"&categoryID="+$('input:radio[name="category"]:checked').val()+"&planID="+$('input:radio[name="plan"]:checked').val());
    }else if ($('input:radio[name="category"]').is(':checked') && $('input:radio[name="size"]').is(':checked')) {
    var url=("/api/filter?colorID="+$(this).val()+"&categoryID="+$('input:radio[name="category"]:checked').val()+ "&name="+$('input:radio[name="size"]:checked').val());
    }else if ($('input:radio[name="subcat"]').is(':checked') && $('input:radio[name="plan"]').is(':checked') && $('input:radio[name="size"]').is(':checked')) {
    var url=("/api/filter?colorID="+$(this).val()+"&categoryID="+$('input:radio[name="catproduct"]').val()+"&subcatID="+$('input:radio[name="subcat"]:checked').val()+"&planID="+$('input:radio[name="plan"]:checked').val()+"&name="+$('input:radio[name="size"]:checked').val());
    }else if ($('input:radio[name="subcat"]').is(':checked') && $('input:radio[name="plan"]').is(':checked')) {
    var url=("/api/filter?colorID="+$(this).val()+"&categoryID="+$('input:radio[name="catproduct"]').val()+"&subcatID="+$('input:radio[name="subcat"]:checked').val()+"&planID="+$('input:radio[name="plan"]:checked').val() );
    }else if ($('input:radio[name="plan"]').is(':checked') && $('input:radio[name="size"]').is(':checked')) {
    var url=("/api/filter?colorID="+$(this).val()+"&categoryID="+$('input:radio[name="catproduct"]').val()+"&planID="+$('input:radio[name="plan"]:checked').val()+"&name="+$('input:radio[name="size"]:checked').val() );
    }else if ( $('input:radio[name="subcat"]').is(':checked') ) {
    var url=("/api/filter?colorID="+$(this).val()+"&categoryID="+$('input:radio[name="catproduct"]').val()+"&subcatID="+$('input:radio[name="subcat"]:checked').val());
    }else if ($('input:radio[name="plan"]').is(':checked')) {
    var url=("/api/filter?colorID="+$(this).val()+"&categoryID="+$('input:radio[name="catproduct"]').val()+"&planID="+$('input:radio[name="plan"]:checked').val());
    }else if ($('input:radio[name="size"]').is(':checked')) {
    var url=("/api/filter?colorID="+$(this).val()+"&categoryID="+$('input:radio[name="catproduct"]').val()+"&name="+$('input:radio[name="size"]:checked').val());
    }else {
    var url=("/api/filter?colorID="+$(this).val()+"&categoryID="+$('input:radio[name="catproduct"]').val());
    }
 
 
    console.log(url);
    
  $.get(url,(data,status)=>{
      console.log(data);
      console.log(status); 
              
                       
                $.each(data.data, function(index, value) {  
                        var text=value.name; 
                     text=text.replace(/ /g, "-"); 
                     if(value.count==1 ){ 

                     }else{
                        html+='<div class="item item-line">';
                        html+='<div class="d-flex flex-wrap justify-content-around align-items-center">';
                        html+='<a href="/product/'+text+'/" target="_blank">'; 
                        html+='<img src="/'+value.image+'" alt=""></a>';
                        html+='<div class="introduciton">';
                        html+='<h3 class="title">'+value.name+'</h3>';
                        html+='<span class="price ">'+ToRial(value.price)+' تومان </span>';
                        html+='</div>'; 
                        html+='<a href="/product/'+text+'/" target="_blank" class="show">';
                        html+=' <span>   مشاهده محصول </span> </a>';
                        html+='</div>';
                        html+='</div>';
                     }
                 });
              
                $('#view2').html(html);
                $('#pagenum').html(' ');
                ConvertNumberToPersion();
               
     });  
    }
}
); 
 ////size
 $('input:radio[name="size"]').change(
    function(){
        if ($(this).is(':checked') ) {
    var html=''; 
    if ( $('input:radio[name="category"]').is(':checked') && $('input:radio[name="subcat"]').is(':checked') && $('input:radio[name="plan"]').is(':checked') && $('input:radio[name="color"]').is(':checked')) {
    var url=("/api/filter?name="+$(this).val()+"&categoryID="+$('input:radio[name="category"]:checked').val()+"&subcatID="+$('input:radio[name="subcat"]:checked').val()+"&planID="+$('input:radio[name="plan"]:checked').val()+"&colorID="+$('input:radio[name="color"]:checked').val());
    }else if ( $('input:radio[name="category"]').is(':checked') && $('input:radio[name="subcat"]').is(':checked') && $('input:radio[name="plan"]').is(':checked')) {
    var url=("/api/filter?name="+$(this).val()+"&categoryID="+$('input:radio[name="category"]:checked').val()+"&subcatID="+$('input:radio[name="subcat"]:checked').val()+"&planID="+$('input:radio[name="plan"]:checked').val() );
    }else if ( $('input:radio[name="category"]').is(':checked') && $('input:radio[name="subcat"]').is(':checked') ) {
    var url=("/api/filter?name="+$(this).val()+"&categoryID="+$('input:radio[name="category"]:checked').val()+"&subcatID="+$('input:radio[name="subcat"]:checked').val());
    }else if ($('input:radio[name="category"]').is(':checked')) {
    var url=("/api/filter?name="+$(this).val()+"&categoryID="+$('input:radio[name="category"]:checked').val());
    }else if ($('input:radio[name="category"]').is(':checked') && $('input:radio[name="plan"]').is(':checked')) {
    var url=("/api/filter?name="+$(this).val()+"&categoryID="+$('input:radio[name="category"]:checked').val()+"&planID="+$('input:radio[name="plan"]:checked').val());
    }else if ($('input:radio[name="category"]').is(':checked') && $('input:radio[name="color"]').is(':checked')) {
    var url=("/api/filter?name="+$(this).val()+"&categoryID="+$('input:radio[name="category"]:checked').val()+ "&colorID="+$('input:radio[name="color"]:checked').val());
    }else if ($('input:radio[name="subcat"]').is(':checked') && $('input:radio[name="plan"]').is(':checked') && $('input:radio[name="color"]').is(':checked')) {
    var url=("/api/filter?name="+$(this).val()+"&categoryID="+$('input:radio[name="catproduct"]').val()+"&subcatID="+$('input:radio[name="subcat"]:checked').val()+"&planID="+$('input:radio[name="plan"]:checked').val()+"&colorID="+$('input:radio[name="color"]:checked').val());
    }else if ($('input:radio[name="subcat"]').is(':checked') && $('input:radio[name="plan"]').is(':checked')) {
    var url=("/api/filter?name="+$(this).val()+"&categoryID="+$('input:radio[name="catproduct"]').val()+"&subcatID="+$('input:radio[name="subcat"]:checked').val()+"&planID="+$('input:radio[name="plan"]:checked').val() );
    }else if ($('input:radio[name="plan"]').is(':checked') && $('input:radio[name="color"]').is(':checked')) {
    var url=("/api/filter?name="+$(this).val()+"&categoryID="+$('input:radio[name="catproduct"]').val()+"&planID="+$('input:radio[name="plan"]:checked').val()+"&colorID="+$('input:radio[name="color"]:checked').val() );
    }else if ( $('input:radio[name="subcat"]').is(':checked') ) {
    var url=("/api/filter?name="+$(this).val()+"&categoryID="+$('input:radio[name="catproduct"]').val()+"&subcatID="+$('input:radio[name="subcat"]:checked').val());
    }else if ($('input:radio[name="plan"]').is(':checked')) {
    var url=("/api/filter?name="+$(this).val()+"&categoryID="+$('input:radio[name="catproduct"]').val()+"&planID="+$('input:radio[name="plan"]:checked').val());
    }else if ($('input:radio[name="color"]').is(':checked')) {
    var url=("/api/filter?name="+$(this).val()+"&categoryID="+$('input:radio[name="catproduct"]').val()+"&colorID="+$('input:radio[name="color"]:checked').val());
    }else {
    var url=("/api/filter?name="+$(this).val()+"&categoryID="+$('input:radio[name="catproduct"]').val());
    }
 
 
    console.log(url);
    
  $.get(url,(data,status)=>{
      console.log(data);
      console.log(status); 
              
                       
                $.each(data.data, function(index, value) {  
                        var text=value.name; 
                     text=text.replace(/ /g, "-"); 
                     if(value.count==1 ){ 

                     }else{
                        html+='<div class="item item-line">';
                        html+='<div class="d-flex flex-wrap justify-content-around align-items-center">';
                        html+='<a href="/product/'+text+'/" target="_blank">'; 
                        html+='<img src="/'+value.image+'" alt=""></a>';
                        html+='<div class="introduciton">';
                        html+='<h3 class="title">'+value.name+'</h3>';
                        html+='<span class="price ">'+ToRial(value.price)+' تومان </span>';
                        html+='</div>'; 
                        html+='<a href="/product/'+text+'/" target="_blank" class="show">';
                        html+=' <span>   مشاهده محصول </span> </a>';
                        html+='</div>';
                        html+='</div>';
                     }
                 });
              
                $('#view2').html(html);
                $('#pagenum').html(' ');
                ConvertNumberToPersion();
               
     });  
    }
}
);





























jQuery('#show').change(()=>{   
var html='';
var url=("/api/limit/"+jQuery('#show').val());
$.get(url,(data,status)=>{
      console.log(data);
      console.log(status); 
         
                $.each(data.data, function(index, value) {  
                    var text=value.name;
                     text=text.replace(/ /g, "-"); 

                     html+='<div class="item" >';
                        html+=' <div class="details-item"> ';  
                        html+=' <a target="_blank" href="/product/'+text+'/">'; 
                        html+='<img src="/'+value.image+'">'; 
                        html+='<div class="text">';
                        html+=' <h3 class="title">'+value.name+'</h3>     ';   
                        if(value.count==1 ){   
                            html+=' <div class="price-item d-flex " > ';  
                            html+='<span class="price" style="color: #ababab;font-size: 1.286rem;line-height: 1.222;font-weight: 400;margin-top: 20px;"> ـــــــــــــــــــــ  ناموجود   ــــــــــــــــــــــ</span> ';  
                            html+='</div>  ';  
                        }else{
                            if(value.offer!=null ){
                                html+=' <div class="price-item d-flex " >'; 
                                html+='<del class="price-deleted" style="color:#5e5e5e!important;">'+ToRial(value.price)+'</del>'; 
                                html+='<span class="price"> '; 
                                html+='<label class="badge off" style="border-radius:5px!important;top:0px!important;width:80px!important;height:30px!important;">'+value.offer+'%</label>'; 
                                html+=' </span>';  
                                html+='</div> ';  
                                html+=' <span class="price" style="color:#ed008c!important;"> '+ToRial(value.price)+'هزار تومان</span>';   
                        }else{
                        html+=' <span class="price">  '+ToRial(value.price)+'  تومان </span>';
                        }
                }
                        html+=' </div>';
                        html+=' </a>';
                        html+='</div>'; 
                        html+='</div>'; 
                 });
              
                $('#product-content').html(html);
                // $('#pagenum').html(' ');
                ConvertNumberToPersion();
               
     });  
}); 

  
JS;
$this->registerJs($script);
?>


 



