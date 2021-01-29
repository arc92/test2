<?php

use yii\helpers\Html;
use yii\bootstrap\ActiveForm;
use yii\helpers\ArrayHelper;
use yii\widgets\LinkPager;

/* @var $this yii\web\View */
?>

<main class="product-list catfilter">
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
                                            <a href="/product/<?= str_replace(' ', '-', $article->name) ?>/"> <i
                                                        class="icon-003-buy"></i></a>
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
                                                url: '/plan/like',
                                                data: {like: data}
                                            }).done(function (response) {
                                                sessionStorage.setItem('<?=$article->id?>', data);
                                            });
                                        });
                                        $("#like<?=$article->id?>").click(function () {
                                            $("#like<?=$article->id?>").css("color", "red");
                                        });
                                    </script>
                                    <a href="/product/<?= str_replace(' ', '-', $article->name) ?>/">
                                        <img src="/<?= (isset($article->productimgs->img)) ? $article->productimgs->img : '' ?>"
                                             alt="">
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
                                            <?php
                                            $today = Yii::$app->jdate->date('Y/m/d');
                                            $offer = \app\models\Offer::find()->Where(['planID' => $article->planID])->one();
                                            if ($offer && $today >= $offer->start_date && $today <= $offer->end_date) {
                                                ?>
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
                        <a href="/product/<?= str_replace(' ', '-', $article->name) ?>/">

                            <img src="/<?= (isset($article->productimgs->img)) ? $article->productimgs->img : '' ?>"
                                 alt="">
                        </a>
                        <div class="introduciton">
                            <h3 class="title">  <?= $article->name ?> </h3>
                            <span class="price ">  <?= number_format($article->price) ?>  تومان </span>
                        </div>
                        <ul class="nav attr d-block">
    <span class="title">
        ویژگی
    </span>
                            <?php foreach ($aboutproducts as $aboutproduct) {
                                if ($aboutproduct->productID == $article->id) { ?>
                                    <li class="nav-item">
                                        <i class="icon-023-tick"></i>
                                        <?= $aboutproduct->details ?>
                                    </li>
                                <?php }
                            } ?>
                        </ul>
                        <a href="/product/<?= str_replace(' ', '-', $article->name) ?>/" class="show">
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

 ////categoryID
 $('input:radio[name="plan"]').change(
    function(){
        if ($(this).is(':checked') ) {
    var html=''; 
        if ( $('input:radio[name="subcat"]').is(':checked') && $('input:radio[name="category"]').is(':checked') && $('input:radio[name="color"]').is(':checked') && $('input:radio[name="size"]').is(':checked')) {
             var url=("/api/collection?planID="+$(this).val()+"&subcatID="+$('input:radio[name="subcat"]:checked').val()+"&categoryID="+$('input:radio[name="category"]:checked').val()+"&colorID="+$('input:radio[name="color"]:checked').val()+"&name="+$('input:radio[name="size"]:checked').val());
        }else if ( $('input:radio[name="subcat"]').is(':checked') && $('input:radio[name="category"]').is(':checked') && $('input:radio[name="color"]').is(':checked')) {
             var url=("/api/collection?planID="+$(this).val()+"&subcatID="+$('input:radio[name="subcat"]:checked').val()+"&categoryID="+$('input:radio[name="category"]:checked').val()+"&colorID="+$('input:radio[name="color"]:checked').val() );
        }else if ( $('input:radio[name="subcat"]').is(':checked') && $('input:radio[name="category"]').is(':checked') ) {
             var url=("/api/collection?planID="+$(this).val()+"&subcatID="+$('input:radio[name="subcat"]:checked').val()+"&categoryID="+$('input:radio[name="category"]:checked').val());
        }else if ($('input:radio[name="subcat"]').is(':checked')) {
             var url=("/api/collection?planID="+$(this).val()+"&subcatID="+$('input:radio[name="subcat"]:checked').val());
        }else if ($('input:radio[name="category"]').is(':checked')) {
             var url=("/api/collection?planID="+$(this).val()+"&categoryID="+$('input:radio[name="category"]:checked').val());
        }else if ($('input:radio[name="color"]').is(':checked')) {
             var url=("/api/collection?planID="+$(this).val()+"&colorID="+$('input:radio[name="color"]:checked').val());
        }else if ($('input:radio[name="size"]').is(':checked')) {
             var url=("/api/collection?planID="+$(this).val()+"&name="+$('input:radio[name="size"]:checked').val());
        }else{
             var url=("/api/collection?planID="+$(this).val());
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
                        html+=' <a target="_blank" href="/product/'+text+'/ ">'; 
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

////subcatID
$('input:radio[name="subcat"]').change(
    function(){
        if ($(this).is(':checked') ) {
    var html=''; 
    if ( $('input:radio[name="plan"]').is(':checked') && $('input:radio[name="category"]').is(':checked') && $('input:radio[name="color"]').is(':checked') && $('input:radio[name="size"]').is(':checked')) {
    var url=("/api/filter?subcatID="+$(this).val()+"&planID="+$('input:radio[name="plan"]:checked').val()+"&categoryID="+$('input:radio[name="category"]:checked').val()+"&colorID="+$('input:radio[name="color"]:checked').val()+"&name="+$('input:radio[name="size"]:checked').val());
    }else if ( $('input:radio[name="plan"]').is(':checked') && $('input:radio[name="category"]').is(':checked') && $('input:radio[name="color"]').is(':checked')) {
    var url=("/api/filter?subcatID="+$(this).val()+"&planID="+$('input:radio[name="plan"]:checked').val()+"&categoryID="+$('input:radio[name="category"]:checked').val()+"&colorID="+$('input:radio[name="color"]:checked').val() );
    }else if ( $('input:radio[name="plan"]').is(':checked') && $('input:radio[name="category"]').is(':checked') ) {
    var url=("/api/filter?subcatID="+$(this).val()+"&planID="+$('input:radio[name="plan"]:checked').val()+"&categoryID="+$('input:radio[name="category"]:checked').val());
    }else if ($('input:radio[name="plan"]').is(':checked')) {
    var url=("/api/filter?subcatID="+$(this).val()+"&planID="+$('input:radio[name="plan"]:checked').val());
    }else if ($('input:radio[name="plan"]').is(':checked') && $('input:radio[name="color"]').is(':checked')) {
    var url=("/api/filter?subcatID="+$(this).val()+"&planID="+$('input:radio[name="plan"]:checked').val()+"&colorID="+$('input:radio[name="color"]:checked').val());
    }else if ($('input:radio[name="plan"]').is(':checked') && $('input:radio[name="size"]').is(':checked')) {
    var url=("/api/filter?subcatID="+$(this).val()+"&planID="+$('input:radio[name="plan"]:checked').val()+ "&name="+$('input:radio[name="size"]:checked').val());
    } else if ($('input:radio[name="category"]').is(':checked') && $('input:radio[name="color"]').is(':checked') && $('input:radio[name="size"]').is(':checked')) {
    var url=("/api/filter?subcatID="+$(this).val()+"&planID="+$('input:radio[name="planproduct"]').val()+"&categoryID="+$('input:radio[name="category"]:checked').val()+"&colorID="+$('input:radio[name="color"]:checked').val()+"&name="+$('input:radio[name="size"]:checked').val());
    }else if ($('input:radio[name="category"]').is(':checked') && $('input:radio[name="color"]').is(':checked')) {
    var url=("/api/filter?subcatID="+$(this).val()+"&planID="+$('input:radio[name="planproduct"]').val()+"&categoryID="+$('input:radio[name="category"]:checked').val()+"&colorID="+$('input:radio[name="color"]:checked').val() );
    }else if ( $('input:radio[name="category"]').is(':checked') ) {
    var url=("/api/filter?subcatID="+$(this).val()+"&planID="+$('input:radio[name="planproduct"]').val()+"&categoryID="+$('input:radio[name="category"]:checked').val());
    }else if ($('input:radio[name="color"]').is(':checked')) {
    var url=("/api/filter?subcatID="+$(this).val()+"&planID="+$('input:radio[name="planproduct"]').val()+"&colorID="+$('input:radio[name="color"]:checked').val());
    }else if ($('input:radio[name="size"]').is(':checked')) {
    var url=("/api/filter?subcatID="+$(this).val()+"&planID="+$('input:radio[name="planproduct"]').val()+"&name="+$('input:radio[name="size"]:checked').val());
    }else {
    var url=("/api/filter?subcatID="+$(this).val()+"&planID="+$('input:radio[name="planproduct"]').val());
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
                        html+=' <a target="_blank" href="/product/'+text+'/ ">'; 
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

////categoryID
$('input:radio[name="plan"]').change(
    function(){
        if ($(this).is(':checked') ) {
    var html=''; 
        if ( $('input:radio[name="subcat"]').is(':checked') && $('input:radio[name="category"]').is(':checked') && $('input:radio[name="color"]').is(':checked') && $('input:radio[name="size"]').is(':checked')) {
             var url=("/api/collection?planID="+$(this).val()+"&subcatID="+$('input:radio[name="subcat"]:checked').val()+"&categoryID="+$('input:radio[name="category"]:checked').val()+"&colorID="+$('input:radio[name="color"]:checked').val()+"&name="+$('input:radio[name="size"]:checked').val());
        }else if ( $('input:radio[name="subcat"]').is(':checked') && $('input:radio[name="category"]').is(':checked') && $('input:radio[name="color"]').is(':checked')) {
             var url=("/api/collection?planID="+$(this).val()+"&subcatID="+$('input:radio[name="subcat"]:checked').val()+"&categoryID="+$('input:radio[name="category"]:checked').val()+"&colorID="+$('input:radio[name="color"]:checked').val() );
        }else if ( $('input:radio[name="subcat"]').is(':checked') && $('input:radio[name="category"]').is(':checked') ) {
             var url=("/api/collection?planID="+$(this).val()+"&subcatID="+$('input:radio[name="subcat"]:checked').val()+"&categoryID="+$('input:radio[name="category"]:checked').val());
        }else if ($('input:radio[name="subcat"]').is(':checked')) {
             var url=("/api/collection?planID="+$(this).val()+"&subcatID="+$('input:radio[name="subcat"]:checked').val());
        }else if ($('input:radio[name="category"]').is(':checked')) {
             var url=("/api/collection?planID="+$(this).val()+"&categoryID="+$('input:radio[name="category"]:checked').val());
        }else if ($('input:radio[name="color"]').is(':checked')) {
             var url=("/api/collection?planID="+$(this).val()+"&colorID="+$('input:radio[name="color"]:checked').val());
        }else if ($('input:radio[name="size"]').is(':checked')) {
             var url=("/api/collection?planID="+$(this).val()+"&name="+$('input:radio[name="size"]:checked').val());
        }else{
             var url=("/api/collection?planID="+$(this).val());
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
                        html+=' <a target="_blank" href="/product/'+text+'/ ">'; 
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

////categoryID
$('input:radio[name="category"]').change(
    function(){
        if ($(this).is(':checked') ) {
    var html=''; 
    if ( $('input:radio[name="plan"]').is(':checked') && $('input:radio[name="subcat"]').is(':checked') && $('input:radio[name="color"]').is(':checked') && $('input:radio[name="size"]').is(':checked')) {
    var url=("/api/collection?categoryID="+$(this).val()+"&planID="+$('input:radio[name="plan"]:checked').val()+"&subcatID="+$('input:radio[name="subcat"]:checked').val()+"&colorID="+$('input:radio[name="color"]:checked').val()+"&name="+$('input:radio[name="size"]:checked').val());
    }else if ( $('input:radio[name="plan"]').is(':checked') && $('input:radio[name="subcat"]').is(':checked') && $('input:radio[name="color"]').is(':checked')) {
    var url=("/api/collection?categoryID="+$(this).val()+"&planID="+$('input:radio[name="plan"]:checked').val()+"&subcatID="+$('input:radio[name="subcat"]:checked').val()+"&colorID="+$('input:radio[name="color"]:checked').val() );
    }else if ( $('input:radio[name="plan"]').is(':checked') && $('input:radio[name="subcat"]').is(':checked') ) {
    var url=("/api/collection?categoryID="+$(this).val()+"&planID="+$('input:radio[name="plan"]:checked').val()+"&subcatID="+$('input:radio[name="subcat"]:checked').val());
    }else if ($('input:radio[name="plan"]').is(':checked')) {
    var url=("/api/collection?categoryID="+$(this).val()+"&planID="+$('input:radio[name="plan"]:checked').val());
    }else if ($('input:radio[name="plan"]').is(':checked') && $('input:radio[name="color"]').is(':checked')) {
    var url=("/api/collection?categoryID="+$(this).val()+"&planID="+$('input:radio[name="plan"]:checked').val()+"&colorID="+$('input:radio[name="color"]:checked').val());
    }else if ($('input:radio[name="plan"]').is(':checked') && $('input:radio[name="size"]').is(':checked')) {
    var url=("/api/collection?categoryID="+$(this).val()+"&planID="+$('input:radio[name="plan"]:checked').val()+ "&name="+$('input:radio[name="size"]:checked').val());
    } else if ($('input:radio[name="subcat"]').is(':checked') && $('input:radio[name="color"]').is(':checked') && $('input:radio[name="size"]').is(':checked')) {
    var url=("/api/collection?categoryID="+$(this).val()+"&planID="+$('input:radio[name="planproduct"]').val()+"&subcatID="+$('input:radio[name="subcat"]:checked').val()+"&colorID="+$('input:radio[name="color"]:checked').val()+"&name="+$('input:radio[name="size"]:checked').val());
    }else if ($('input:radio[name="subcat"]').is(':checked') && $('input:radio[name="color"]').is(':checked')) {
    var url=("/api/collection?categoryID="+$(this).val()+"&planID="+$('input:radio[name="planproduct"]').val()+"&subcatID="+$('input:radio[name="subcat"]:checked').val()+"&colorID="+$('input:radio[name="color"]:checked').val() );
    }else if ( $('input:radio[name="subcat"]').is(':checked') ) {
    var url=("/api/collection?categoryID="+$(this).val()+"&planID="+$('input:radio[name="planproduct"]').val()+"&subcatID="+$('input:radio[name="subcat"]:checked').val());
    }else if ($('input:radio[name="color"]').is(':checked')) {
    var url=("/api/collection?categoryID="+$(this).val()+"&planID="+$('input:radio[name="planproduct"]').val()+"&colorID="+$('input:radio[name="color"]:checked').val());
    }else if ($('input:radio[name="size"]').is(':checked')) {
    var url=("/api/collection?categoryID="+$(this).val()+"&planID="+$('input:radio[name="planproduct"]').val()+"&name="+$('input:radio[name="size"]:checked').val());
    }else {
    var url=("/api/collection?categoryID="+$(this).val()+"&planID="+$('input:radio[name="planproduct"]').val());
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
                        html+=' <a target="_blank" href="/product/'+text+'/ ">'; 
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

////subcatID
$('input:radio[name="color"]').change(
    function(){
        if ($(this).is(':checked') ) {
    var html=''; 
    if ( $('input:radio[name="plan"]').is(':checked') && $('input:radio[name="subcat"]').is(':checked') && $('input:radio[name="category"]').is(':checked') && $('input:radio[name="size"]').is(':checked')) {
    var url=("/api/collection?colorID="+$(this).val()+"&planID="+$('input:radio[name="plan"]:checked').val()+"&subcatID="+$('input:radio[name="subcat"]:checked').val()+"&categoryID="+$('input:radio[name="category"]:checked').val()+"&name="+$('input:radio[name="size"]:checked').val());
    }else if ( $('input:radio[name="plan"]').is(':checked') && $('input:radio[name="subcat"]').is(':checked') && $('input:radio[name="category"]').is(':checked')) {
    var url=("/api/collection?colorID="+$(this).val()+"&planID="+$('input:radio[name="plan"]:checked').val()+"&subcatID="+$('input:radio[name="subcat"]:checked').val()+"&categoryID="+$('input:radio[name="category"]:checked').val() );
    }else if ( $('input:radio[name="plan"]').is(':checked') && $('input:radio[name="subcat"]').is(':checked') ) {
    var url=("/api/collection?colorID="+$(this).val()+"&planID="+$('input:radio[name="plan"]:checked').val()+"&subcatID="+$('input:radio[name="subcat"]:checked').val());
    }else if ($('input:radio[name="plan"]').is(':checked')) {
    var url=("/api/collection?colorID="+$(this).val()+"&planID="+$('input:radio[name="plan"]:checked').val());
    }else if ($('input:radio[name="plan"]').is(':checked') && $('input:radio[name="category"]').is(':checked')) {
    var url=("/api/collection?colorID="+$(this).val()+"&planID="+$('input:radio[name="plan"]:checked').val()+"&categoryID="+$('input:radio[name="category"]:checked').val());
    }else if ($('input:radio[name="plan"]').is(':checked') && $('input:radio[name="size"]').is(':checked')) {
    var url=("/api/collection?colorID="+$(this).val()+"&planID="+$('input:radio[name="plan"]:checked').val()+ "&name="+$('input:radio[name="size"]:checked').val());
    } else if ($('input:radio[name="subcat"]').is(':checked') && $('input:radio[name="category"]').is(':checked') && $('input:radio[name="size"]').is(':checked')) {
    var url=("/api/collection?colorID="+$(this).val()+"&planID="+$('input:radio[name="planproduct"]').val()+"&subcatID="+$('input:radio[name="subcat"]:checked').val()+"&categoryID="+$('input:radio[name="category"]:checked').val()+"&name="+$('input:radio[name="size"]:checked').val());
    }else if ($('input:radio[name="subcat"]').is(':checked') && $('input:radio[name="category"]').is(':checked')) {
    var url=("/api/collection?colorID="+$(this).val()+"&planID="+$('input:radio[name="planproduct"]').val()+"&subcatID="+$('input:radio[name="subcat"]:checked').val()+"&categoryID="+$('input:radio[name="category"]:checked').val() );
    }else if ( $('input:radio[name="subcat"]').is(':checked') ) {
    var url=("/api/collection?colorID="+$(this).val()+"&planID="+$('input:radio[name="planproduct"]').val()+"&subcatID="+$('input:radio[name="subcat"]:checked').val());
    }else if ($('input:radio[name="category"]').is(':checked')) {
    var url=("/api/collection?colorID="+$(this).val()+"&planID="+$('input:radio[name="planproduct"]').val()+"&categoryID="+$('input:radio[name="category"]:checked').val());
    }else if ($('input:radio[name="size"]').is(':checked')) {
    var url=("/api/collection?colorID="+$(this).val()+"&planID="+$('input:radio[name="planproduct"]').val()+"&name="+$('input:radio[name="size"]:checked').val());
    }else {
    var url=("/api/collection?colorID="+$(this).val()+"&planID="+$('input:radio[name="planproduct"]').val());
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
                        html+=' <a target="_blank" href="/product/'+text+'/ ">'; 
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
    if ( $('input:radio[name="plan"]').is(':checked') && $('input:radio[name="subcat"]').is(':checked') && $('input:radio[name="category"]').is(':checked') && $('input:radio[name="color"]').is(':checked')) {
    var url=("/api/collection?name="+$(this).val()+"&planID="+$('input:radio[name="plan"]:checked').val()+"&subcatID="+$('input:radio[name="subcat"]:checked').val()+"&categoryID="+$('input:radio[name="category"]:checked').val()+"&colorID="+$('input:radio[name="color"]:checked').val());
    }else if ( $('input:radio[name="plan"]').is(':checked') && $('input:radio[name="subcat"]').is(':checked') && $('input:radio[name="category"]').is(':checked')) {
    var url=("/api/collection?name="+$(this).val()+"&planID="+$('input:radio[name="plan"]:checked').val()+"&subcatID="+$('input:radio[name="subcat"]:checked').val()+"&categoryID="+$('input:radio[name="category"]:checked').val() );
    }else if ( $('input:radio[name="plan"]').is(':checked') && $('input:radio[name="subcat"]').is(':checked') ) {
    var url=("/api/collection?name="+$(this).val()+"&planID="+$('input:radio[name="plan"]:checked').val()+"&subcatID="+$('input:radio[name="subcat"]:checked').val());
    }else if ($('input:radio[name="plan"]').is(':checked')) {
    var url=("/api/collection?name="+$(this).val()+"&planID="+$('input:radio[name="plan"]:checked').val());
    }else if ($('input:radio[name="plan"]').is(':checked') && $('input:radio[name="category"]').is(':checked')) {
    var url=("/api/collection?name="+$(this).val()+"&planID="+$('input:radio[name="plan"]:checked').val()+"&categoryID="+$('input:radio[name="category"]:checked').val());
    }else if ($('input:radio[name="plan"]').is(':checked') && $('input:radio[name="color"]').is(':checked')) {
    var url=("/api/collection?name="+$(this).val()+"&planID="+$('input:radio[name="plan"]:checked').val()+ "&colorID="+$('input:radio[name="color"]:checked').val());
    } else if ($('input:radio[name="subcat"]').is(':checked') && $('input:radio[name="category"]').is(':checked') && $('input:radio[name="color"]').is(':checked')) {
    var url=("/api/collection?name="+$(this).val()+"&planID="+$('input:radio[name="planproduct"]').val()+"&subcatID="+$('input:radio[name="subcat"]:checked').val()+"&categoryID="+$('input:radio[name="category"]:checked').val()+"&colorID="+$('input:radio[name="color"]:checked').val());
    }else if ($('input:radio[name="subcat"]').is(':checked') && $('input:radio[name="category"]').is(':checked')) {
    var url=("/api/collection?name="+$(this).val()+"&planID="+$('input:radio[name="planproduct"]').val()+"&subcatID="+$('input:radio[name="subcat"]:checked').val()+"&categoryID="+$('input:radio[name="category"]:checked').val() );
    }else if ( $('input:radio[name="subcat"]').is(':checked') ) {
    var url=("/api/collection?name="+$(this).val()+"&planID="+$('input:radio[name="planproduct"]').val()+"&subcatID="+$('input:radio[name="subcat"]:checked').val());
    }else if ($('input:radio[name="category"]').is(':checked')) {
    var url=("/api/collection?name="+$(this).val()+"&planID="+$('input:radio[name="planproduct"]').val()+"&categoryID="+$('input:radio[name="category"]:checked').val());
    }else if ($('input:radio[name="color"]').is(':checked')) {
    var url=("/api/collection?name="+$(this).val()+"&planID="+$('input:radio[name="planproduct"]').val()+"&colorID="+$('input:radio[name="color"]:checked').val());
    }else {
    var url=("/api/collection?name="+$(this).val()+"&planID="+$('input:radio[name="planproduct"]').val());
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
                        html+=' <a target="_blank" href="/product/'+text+'/ ">'; 
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
                        html+=' <a target="_blank" href="/product/'+text+'/ ">'; 
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


 



