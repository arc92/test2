<?php

use yii\helpers\Html;
use yii\bootstrap\ActiveForm;
use yii\helpers\ArrayHelper;
use yii\widgets\LinkPager;
/* @var $this yii\web\View */

 
?>
<main class="product-list">

<div class=" container p-0 d-flex justify-content-between align-items-center">
    <button class="btn-filter- ">
        <i class="icon-menu-1"></i>
        <span>
            فیلتر
        </span>
    </button>
    <button class="close-box">
        ×
    </button>
</div>
<article class="header-list-grid ">
<section class="show container p-0 d-flex  align-items-center justify-content-between">

    <!--Right Details -->

    <!--of Header Content-->

    <div class="number d-flex  align-items-center"> 
        <span class="title number-title">   بر اساس تعداد نمایش  :    </span> 
        <select name="state" class="js-example-basic-single" id="show" > 
        <option > لطفا انتخاب کنید </option> 
            <option value="10">    نمایش 10 عدد   </option> 
            <option value="20">   نمایش 20 عدد   </option> 
            <option value="30">    نمایش 30 عدد  </option>  
        </select> 
    </div>

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

    <section class="filter container p-0 d-flex flex-wrap  justify-content-around align-items-center">
        <span class="title">
        انتخاب فیلتر ها بر اساس  :
    </span>
    <?php $form = ActiveForm::begin([
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
    <?= $form->field($category, 'id', ['options' => ['style' => 'display:inline-block;']])->dropDownList( ArrayHelper::map(\app\models\Category::find()->all(), 'id', 'name'),['prompt'=>'انتخاب دسته بندی','class'=>'js-example-basic-single auto'])->label('') ?>
    <?= $form->field($subcat, 'id', ['options' => ['style' => 'display:inline-block;']])->dropDownList(ArrayHelper::map(\app\models\Subcat::find()->all(), 'id', 'name'),['prompt'=>'انتخاب جنسیت..','class'=>'js-example-basic-single auto'])->label('') ?>
    <?= $form->field($model, 'planID', ['options' => ['style' => 'display:inline-block;']])->dropDownList(ArrayHelper::map(\app\models\Plan::find()->Where(['status'=>1])->orderBy(['id'=>SORT_DESC])->all(), 'id', 'name'),['prompt'=>'انتخاب طرح..','class'=>'js-example-basic-single auto'])->label('') ?>
    <?= $form->field($model, 'colorID', ['options' => ['style' => 'display:inline-block;']])->dropDownList(ArrayHelper::map(\app\models\Color::find()->all(), 'id', 'value'),['prompt'=>'انتخاب رنگ..','class'=>'js-example-basic-single auto'])->label('') ?>
    <?= $form->field($size, 'id', ['options' => ['style' => 'display:inline-block;']])->dropDownList(ArrayHelper::map(\app\models\Size::find()->all(), 'age', 'age'),['prompt'=>'انتخاب سایز..','class'=>'js-example-basic-single auto'])->label('') ?>
   

        <?php ActiveForm::end(); ?>
    </section>
</article>

   <section class="filter-sec one list">
       <div class="container p-0">
          <div class="row d-flex justify-content-between" id="product-content">
          <?php foreach ($articles as $article) {  
               foreach ($catrelations as $catrelation){  
                foreach ($subcatrelations as $subcatrelation){  
                   if($article->id==$catrelation->productID && $article->id==$subcatrelation->productID){  ?>
              <!--with New Badge-->
              <div class="item">
                <div class="details-item">  
                      <ul class="nav">
                          <li class="nav-item">
                          <a href="/product/<?=str_replace(' ', '-',$article->name)?>/">   <i class="icon-003-buy"></i></a>
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
                                });


                            });
                        </script>
                      <a href="/product/<?=str_replace(' ', '-',$article->name)?>/">
                      <?php  foreach($imgs as $img):
                       if($img['productID']==$article['id']){ ?>
                      <img src="/<?=$img->img ?>" alt="">
                      <?php } endforeach; ?>
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
                          <?php if($offer=\app\models\Offer::find()->Where(['planID'=>$article->planID])->one()){?>
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
                    
                      <?php  }else{ ?> 
                        <span class="price"><?=number_format($article->price)?>   هزار تومان  </span>
                      <?php } } ?>
                      </div>
                  </div>
              </div>
        <?php } } } }?>
            
          </div>
         
       </div>
   </section>
     <!-- add new item -->
   <!-- for list grid -->
   <section class="filter-sec two list">
        <div class="container p-0">
        <?php foreach ($articles as $article) {  
             foreach ($catrelations as $catrelation){  
                foreach ($subcatrelations as $subcatrelation){  
                   if($article->id==$catrelation->productID && $article->id==$subcatrelation->productID){  ?>
            <div class="item item-line">
                <div class="d-flex flex-wrap justify-content-around align-items-center">
                <a href="/product/<?=str_replace(' ', '-',$article->name)?>/">
                   
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
                    <a href="/product/<?=str_replace(' ', '-',$article->name)?>/" class="show">
                       <span>
                       مشاهده محصول
                       </span>
                          </a>
                </div>
            </div>
            <?php } } } }  ?>
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



jQuery('#size-id').change(()=>{
    var html='';
   
  var url=("/api/featu?name="+jQuery('#size-id').val());
    console.log(url);
    
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
                                html+='<div class="price-item d-flex ">'; 
                                html+=' <span class="price" style="color:#ed008c!important;"> '+ToRial(value.price)+'هزار تومان</span>';  
                               html+=' </div> ';  
                        }else{
                        html+=' <span class="price">  '+ToRial(value.price-(value.price*value.offer)/100)+'  تومان </span>';
                        }
                }
                        html+=' </div>';
                        html+=' </a>';
                        html+='</div>'; 
                        html+='</div>'; 
                 });
              
                
                $('#product-content').html(html);
                $('#pagenum').html(' ');
                ConvertNumberToPersion();
               
     });  
});  
 


jQuery('#category-id').change(()=>{
    var html='';
   
  var url=("/api/product?catID="+jQuery('#category-id').val());
    console.log(url);
    
  $.get(url,(data,status)=>{
      console.log(data);
      console.log(status); 
              
                       
                $.each(data.data, function(index, value) {  
                    console.log(value.count);
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
                                html+=' <span class="price">  '+ToRial(value.price-(value.price*value.offer)/100)+'  تومان </span>';
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
                $('#pagenum').html(' ');
                ConvertNumberToPersion();
               
     });  
});  
 


jQuery('#subcat-id').change(()=>{
    var html='';
   
  var url=("/api/product?subcatID="+jQuery('#subcat-id').val());
    console.log(url);
    
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
                                html+=' <span class="price">  '+ToRial(value.price-(value.price*value.offer)/100)+'  تومان </span>';  
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
                $('#pagenum').html(' ');
                ConvertNumberToPersion();
               
     });  
});  
 


jQuery('#product-colorid').change(()=>{
    var html='';
   
  var url=("/api/product?colorID="+jQuery('#product-colorid').val()+'&planID='+jQuery('#product-planid').val());
  console.log(url);
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
                                html+=' <span class="price">  '+ToRial(value.price-(value.price*value.offer)/100)+'  تومان </span>'; 
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
                $('#pagenum').html(' ');
                ConvertNumberToPersion();
               
     });  
});    
 


jQuery('#product-planid').change(()=>{
    var html='';
   
  var url=("/api/product?planID="+jQuery('#product-planid').val()+"&subcatID="+jQuery('#subcat-id').val());
  console.log(url);
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
                                html+=' <span class="price">  '+ToRial(value.price-(value.price*value.offer)/100)+'  تومان </span>';  
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
                $('#pagenum').html(' '); 
                ConvertNumberToPersion();
     });  
});    
 


jQuery('#subcat-id').change(()=>{
    var html='';
   
  var url=("/api/product?subcatID="+jQuery('#subcat-id').val()+"&planID="+jQuery('#product-planid').val());
  console.log(url);
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
                                html+=' <span class="price">  '+ToRial(value.price-(value.price*value.offer)/100)+'  تومان </span>';  
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
                $('#pagenum').html(' ');
                ConvertNumberToPersion();
               
     });  
});    
  
jQuery('#size-id').change(()=>{
    var html='';
   
  var url=("/api/product?name="+jQuery('#size-id').val()+"&subcatID="+jQuery('#subcat-id').val());
  console.log(url);
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
                                html+=' <span class="price">  '+ToRial(value.price-(value.price*value.offer)/100)+'  تومان </span>';
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
                $('#pagenum').html(' ');
                ConvertNumberToPersion();
               
     });  
});  
 

jQuery('#size-id').change(()=>{
    var html='';
   
  var url=("/api/product?name="+jQuery('#size-id').val()+"&planID="+jQuery('#product-planid').val());
  console.log(url);
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
                                html+=' <span class="price">  '+ToRial(value.price-(value.price*value.offer)/100)+'  تومان </span>'; 
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
                $('#pagenum').html(' ');
                ConvertNumberToPersion();
               
     });  
});    
  
jQuery('#product-planid').change(()=>{
    var html='';
   
  var url=("/api/product?planID="+jQuery('#product-planid').val()+"&name="+jQuery('#size-id').val());
  console.log(url);
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
                                html+=' <span class="price">  '+ToRial(value.price-(value.price*value.offer)/100)+'  تومان </span>';  
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
                $('#pagenum').html(' ');
                ConvertNumberToPersion();
               
     });  
});    
 
jQuery('#size-id').change(()=>{
    var html='';
   
  var url=("/api/product?name="+jQuery('#size-id').val()+"&planID="+jQuery('#product-planid').val());
  console.log(url);
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
                                html+=' <span class="price">  '+ToRial(value.price-(value.price*value.offer)/100)+'  تومان </span>';
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
                $('#pagenum').html(' ');
                ConvertNumberToPersion();
               
     });  
});    
 
 
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
                                html+=' <span class="price">  '+ToRial(value.price-(value.price*value.offer)/100)+'  تومان </span>'; 
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

 
