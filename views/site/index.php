<?php

/* @var $this yii\web\View */

?>

<main class="content-index">
       
 
        <section class="d-flex flex-wrap justify-content-between container p-0" >
        <a href="/girlgrid/" target="_blank"  class="box boy  d-flex justify-content-around align-items-center" style="width: 49.5%;background-image:url('/img/girl1-min.jpg');background-size:cover;background-position:center; margin-top: 10px!important;">
                
        </a> 
         <a href="/boygrid/"  target="_blank" class="box girl d-flex justify-content-around align-items-center" style="width: 49.5%;background-image:url('/img/boy1-min.jpg');background-size:cover;background-position:center; margin-top: 10px!important;">
         
        </a>
        <div class="center d-flex  justify-content-center" style="width:49%;">
        <a href="/girlgrid/" target="_blank" class="categorygirl" style="margin-top:20px;"> دختر</a>
        </div>   
        <div class="center d-flex  justify-content-center" style="width:49%;">
        <a href="/boygrid/" target="_blank"  class="categorya " style="margin-top:20px;" > پسر</a>
        </div>
     
        </section>  
 
         <!-- <section class="boy-girl d-flex flex-wrap justify-content-between container p-0">
        <a href="/product/boygrid" class="box boy  d-flex justify-content-around align-items-center">
            <div class="text">
                <h2 class="title">
                    نــــوزاد پســــر
                </h2>
                <h3 class="subtitle">
                    زندگــــی را بپــــوش . . .
                </h3>
            </div>
        </a> 
        <a href="/product/girlgrid" class="box girl d-flex justify-content-around align-items-center">
            <div class="text">
                <h2 class="title">
                    نــــوزاد دختــــر
                </h2>
                <h3 class="subtitle">
                    زندگــــی را بپــــوش . . .
                </h3>
            </div>
        </a>
        </section> -->
      <!-- <section class="boy-girl d-flex flex-wrap justify-content-between container p-0" style="margin-top:30px;">
        <a href="/product/boybaby" class="box boy  d-flex justify-content-around align-items-center">
            <div class="text">
                <h2 class="title">
                    کودک نوپا پســــر
                </h2>
                <h3 class="subtitle">
                    زندگــــی را بپــــوش . . .
                </h3>
            </div>
        </a>
        <a href="/product/girlbaby" class="box girl d-flex justify-content-around align-items-center">
            <div class="text">
                <h2 class="title">
                    کودک نو پا دختــــر
                </h2>
                <h3 class="subtitle">
                    زندگــــی را بپــــوش . . .
                </h3>
            </div>
        </a>
    </section> -->
     
    
    <article class="category-one">
        <section class="header">
            <div class="container p-0 d-flex justify-content-between">
                <span class="title">
                طرح  های  البسه
                 </span>

            </div>
        </section>
        <section class="owl-carousel container p-0" id="category-1">
        <?php foreach($plans as $plan){
            if($plan->img!="" || $plan->img!=null){
             ?>
            <div class="item">
                <a href="/collections/<?=$plan->name?>/" class="box">
                    <img src="/uploads/<?=$plan->img ?>" alt="">
                    <h3 class="title"><?=$plan->name ?>  </h3>
                </a>
            </div>
        <?php }} ?> 
        </section>
        <div id="nav2"></div>
    </article>
</main>