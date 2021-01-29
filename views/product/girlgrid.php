<?php

use yii\helpers\Html;
use yii\bootstrap\ActiveForm;
use yii\helpers\ArrayHelper;
use yii\widgets\LinkPager;

/* @var $this yii\web\View */


?>

<main class="product-list catfilter">


    <article class="header-list-grid ">


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
                <div class="col-md-12">
                    <div class="row d-flex justify-content-between" id="product-content">
                        <?php foreach ($articles as $article) { ?>
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
                                            <a href="/product/<?= str_replace(' ', '-', $article->name) ?>/"
                                               target="_blank"> <i class="icon-003-buy"></i></a>
                                        </li>
                                        <li class="nav-item icon-like">
                                            <i class="icon-012-like" id="like<?= $article->id ?>"
                                               data-like="<?= $article->id ?>"></i>
                                        </li>
                                    </ul>

                                    <script src="https://code.jquery.com/jquery-3.3.1.min.js"></script>
                                    <script>
                                        jQuery('#like<?=$article->id?>').on('click', function (e) {
                                            e.preventDefault();
                                            var data = $(this).attr('data-like');
                                            console.log(data);
                                            $.ajax({
                                                url: '/product/like',
                                                data: {like: data}
                                            }).done(function (response) {
                                                sessionStorage.setItem('<?=$article->id?>', data);
                                            });
                                        });
                                        $("#like<?=$article->id?>").click(function () {
                                            $("#like<?=$article->id?>").css("color", "red");
                                        });
                                    </script>


                                    <a href="/product/<?= str_replace(' ', '-', $article->name) ?>/" target="_blank">
                                        <img src="/<?= $article->productimgs->img ?>" alt="">
                                    </a>
                                    <div class="text">
                                        <h3 class="title">
                                            <?= $article->name ?>
                                        </h3>
                                        <?php if ($article->checkCount()) { ?>
                                            <div class="price-item d-flex ">
                                                <span class="price"
                                                      style="color: #ababab;font-size: 1.286rem;line-height: 1.222;font-weight: 400;margin-top: 20px;"> ـــــــــــــــــــــ  ناموجود   ــــــــــــــــــــــ</span>
                                            </div>
                                        <?php } else { ?>
                                            <?php if ($offer = \app\models\Offer::find()->Where(['planID' => $article->planID])->one()) { ?>
                                                <div class="price-item d-flex ">
                                                    <del class="price-deleted"
                                                         style="color:#5e5e5e!important;">   <?= number_format($article->price) ?>   </del>
                                                    <span class="price">
            <label class="badge off"
                   style="border-radius:5px!important;top:0px!important;width:80px!important;height:30px!important;">
    <?= $offer->percent ?>%
    </label>
            </span>
                                                    <!-- <span class="price" style="margin-right: 80px!important;color:#d2d2d2!important;">       تخفیف    </span> -->
                                                </div>
                                                <div class="price-item d-flex ">
            <span class="price" style="color:#ed008c!important;">
            <?= number_format($article->price - ($article->price * $offer->percent) / 100) ?> هزار تومان
            </span>

                                                </div>

                                            <?php } else { ?>
                                                <span class="price"><?= number_format($article->price) ?>   هزار تومان  </span>
                                            <?php }
                                        } ?>
                                    </div>
                                </div>
                            </div>
                        <?php } ?>

                    </div>
                </div>
            </div>


        </div>
    </section>
    <!-- add new item -->
    <!-- for list grid -->
    <section class="filter-sec two list">
        <div class="container p-0">
            <?php foreach ($articles as $article) { ?>
                <div class="item item-line">
                    <div class="d-flex flex-wrap justify-content-around align-items-center">
                        <a href="/product/<?= str_replace(' ', '-', $article->name) ?>/" target="_blank">

                            <img src="/<?= $article->productimgs->img ?>" alt="">
                        </a>
                        <div class="introduciton">
                            <h3 class="title">  <?= $article->name ?> </h3>
                            <span class="price ">  <?= number_format($article->price) ?>  تومان </span>
                        </div>
                        <a href="/product/<?= str_replace(' ', '-', $article->name) ?>/" target="_blank" class="show">
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
تعداد کل محصول<?= $count ?>
</span>
            <ul class="nav page align-items-center">

                <li class="nav-item">
                    <?php echo LinkPager::widget([
                        'pagination' => $pagination,
                        //Css option for container


                        //Previous option value
                        'prevPageLabel' => 'قبلی',
                        //Next option value
                        'nextPageLabel' => 'بعدی',
                        //Current Active option value
                        'activePageCssClass' => 'paginationActivePage',
                        //Max count of allowed options
                        'maxButtonCount' => 5,


                        // Customzing CSS class for navigating link
                        'prevPageCssClass' => 'currentPage',
                        'nextPageCssClass' => 'currentPage',

                    ]); ?>


                </li>

            </ul>
        </div>
    </section>


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



JS;
$this->registerJs($script);
?>

<?php
$script = <<< JS
 
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

      
   
   



JS;
$this->registerJs($script);
?>

<?php
$script = <<< JS
 ////categoryID
// $('input:radio[name="category"]').change(
//     function(){
//         if ($(this).is(':checked') ) {
//            var cat= $('input:radio[name="category"]:checked').val();
//            window.location.href = "/baby-clothing/baby-romper/";
        
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
//                         html+=' <a target="_blank" href="/product/'+value.id+'/'+text+'/ ">'; 
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
                        html+=' <a target="_blank" href="/product/'+value.id+'/'+text+'/ ">'; 
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
                        html+=' <a target="_blank" href="/product/'+value.id+'/'+text+'/ ">'; 
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
                        html+=' <a target="_blank" href="/product/'+value.id+'/'+text+'/ ">'; 
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
                        html+=' <a target="_blank" href="/product/'+value.id+'/'+text+'/ ">'; 
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
                        html+=' <a target="_blank" href="/product/'+value.id+'/'+text+'/ ">'; 
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


 



