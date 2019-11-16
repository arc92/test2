    <?php
use yii\helpers\Html;
use yii\bootstrap\ActiveForm;
use yii\helpers\ArrayHelper;
use yii\widgets\LinkPager;
?>
    <!-- <main class="content-index">
        <section class="boy-girl d-flex flex-wrap justify-content-between container p-0">
        <a href="/product/boygrid" class="box boy  d-flex justify-content-around align-items-center" style="height:350px!important;width: 100%;">
            <div class="text">
                <h2 class="title">
                    نــــوزاد پســــر
                </h2>
                <h3 class="subtitle">
                    زندگــــی را بپــــوش . . .
                </h3>
            </div>
        </a> 
   
        </section>  
</main> -->
<main class="content-blog-single">
<section class="blog-text">
        <div class="container p-0">
            <article>
          
                <div class="owl-carousel slide" id="sider-blog"> 
                <?php foreach($slider as $slide){   ?>
                    <div class="item">
                        <div class="slider-base"> 
                        <img src="/uploads/<?=$slide->img ?>" style="height:100%;" >  
                        </div>
                    </div> 
                    <?php } ?> 
                </div>
              
                <div class="nav" id="nav-blog"></div>
               
            </article>
        </div>
    </section>

</main>
    <main class="content-index" style="margin-top:-100px;">
        <section class="d-flex flex-wrap justify-content-between container p-0">
        <a href="/girlgrid/" target="_blank"  class="box boy  d-flex justify-content-around align-items-center" style="width: 49.5%;background-image:url('/uploads/<?=$piccat->imgtow?>');background-size:cover;background-position:center; margin-top: 160px;"> 
                
        </a> 
         <a href="/boygrid/"  target="_blank" class="box girl d-flex justify-content-around align-items-center" style="width: 49.5%;background-image:url('/uploads/<?=$piccat->imgone?>');background-size:cover;background-position:center; margin-top: 160px;">
         
        </a>
        <div class="center d-flex  justify-content-center" style="width:49%;">
        <a href="/girlgrid/" target="_blank" class="categorygirl" style="margin-top:20px;"> دختر</a>
        </div>   
        <div class="center d-flex  justify-content-center" style="width:49%;">
        <a href="/boygrid/" target="_blank"  class="categorya " style="margin-top:20px;" > پسر</a>
        </div>
     
        </section>  
</main>
<main class="content-index">
   <article class="category-one">
   <section class="header">
            <div class="container p-0 justify-content-between" style="text-align:center!important;">
                <span class="title" style="color:black!important;">
                محصولات بی سی سی 
                 </span>
             <hr style="height: 2px;background-color: #aaafb5; ">
            </div>
           
 </section>
 </article>
 </main>
<main class="product-list" style="margin-top:20px;">
    <!-- <article class="header-list-grid ">
        <section class="show container p-0 d-flex  align-items-center justify-content-between">
    
        </section>
    </article> -->

   <section class="filter-sec one list">
       <div class="container p-0">
          <div class="row d-flex justify-content-between" id="product-content">
              <!--with New Badge-->
              <?php foreach($category as $cat){ ?>
                 <div class="item item-categoty" style="width:170px!important;height:200px!important;">
                      <div class="details-item"style="width:170px!important;height:225px!important;background-color: #ffff!important;" >
                      
                      <a href="/baby-clothing/<?=$cat->urltitle?>/" target="_blank" >  
                      <img src="/uploads/<?=$cat->img?>" alt="" >
                      <div class="text">
                            <h3 class="title">
                                <?=$cat->name?>
                            </h3>
                           
                    </div>
                      </a>
                  </div>
                </div> 
              <?php } ?> 
          </div> 
       </div>
   </section> 
   </main>
   <main class="content-index">
   <article class="category-one">
   <section class="header">
            <div class="container p-0 justify-content-between" style="text-align:center!important;">
                <span class="title" style="color:black!important;">
                دنیای شادی و رنگ
                 </span>
             <hr style="height: 2px;background-color: #aaafb5; ">
            </div>
           
 </section>
   <section class="owl-carousel container p-0" id="category-1">
        <?php foreach($plans as $plan){
            if($plan->img!="" || $plan->img!=null){
             ?>
            <div class="item">
                <a href="/collections/<?=$plan->name?>/" class="box" target="_blank" >
                    <img src="/uploads/<?=$plan->img ?>" alt="">
                    <h3 class="title"><?=$plan->name ?>  </h3>
                </a>
            </div>
        <?php }} ?> 
        </section>
        <div id="nav2"></div>
        <div style="width: 200px; border: 2px solid black;height: 50px;text-align: center; padding-top: 10px; font-weight: 600; margin-top: 30px; margin-left: auto ; margin-right: auto">
        <a href="/collections/" style="color:black" target="_blank" >
        مشاهده همه
            </a>
    </div>

 </article>
</main>
<main class="content-index">
   <article class="category-one">
   <section class="header">
            <div class="container p-0 justify-content-between" style="text-align:center!important;">
                <span class="title" style="color:black!important;">
              ست نوزادی
                 </span>
             <hr style="height: 2px;background-color: #aaafb5; ">
            </div>
           
 </section>
 </main>
 <main class="content-blog-single">
 <section class="news">
 <div class="container p-0 d-flex flex-wrap  justify-content-between"> 
      <!-- <div class="owl-carousel slide" id="sider-news">   -->
        <?php foreach($set as $sets){   ?>
            <div class=" box-not-slider" >
                    <a href="/baby-clothing/baby-clothes-gift-set/<?=str_replace(' ','-',$sets->name)?>/" target="_blank" > 
                     <div class="d-flex flex-wrap">
                            <div class="right" style="background-image: url('/uploads/<?=$sets->img ?>');">  </div> 
                        </div>
                    </a>
                    </div>
                <?php } ?> 
        <!-- </div> -->
<!--     
        <div class="nav" id="nav-news"></div>   -->
        <!-- <a href="#" class="categorya" style="padding-top: 0 ; margin-right:auto; margin-left: auto  ;margin-top:20px; display: flex ; justify-content: center ; align-items: center">مشاهده همه</a> -->
        </section>
        <!-- <div style="width: 300px; border: 2px solid black;height: 50px;text-align: center; padding-top: 10px; font-weight: 600; margin-bottom: 70px; margin-left: auto ; margin-right: auto"> -->
        <a class="all" href="/baby-clothing/baby-clothes-gift-set/" style="color:black; width: 200px;   display: flex; justify-content: center; align-items: center; margin-top: 20px; border: 2px solid black;height: 50px;text-align: center; font-weight: 600; margin-bottom: 40px; margin-left: auto ; margin-right: auto " target="_blank" >
        مشاهده همه
            </a> 
            <!-- </div>  -->
</main>
 







