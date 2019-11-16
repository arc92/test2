<?php

/* @var $this yii\web\View */

// $this->title = 'درباره بی سی سی';
?>
<main class="content-about-us">
    <section class="qoute">
        <article>
            <div class="container p-0">
                <div class="comma"  >
                    <img src="/img/common.png" alt="">
                </div>
                <h5 class="title">
                    <?=$aboutus->titr ?>
                </h5>
                <p class="text">
                <?=$aboutus->text ?>
                 </p>

            </div>
        </article>
    </section>
    <section class="team-work container p-0">
        <div class="d-flex flex-wrap-reverse">
            <div class="join-us col-lg-3 col-md-4 col-sm-6 col-12 pl-0 pr-0" >
                <div class="detail-join">
                    <i class="title">
                        به ما بپیوندید
                    </i>
                    <i class="text">
                        همیشه نیاز داریم تا بهترین و مجرب ترین افراد را به مجموعه خود کنیم ...
                    </i>
                    <a class="click" href="/contactus/">
                            <span>
                                کلیک کنید
                            </span>
                    </a>
                </div>
            </div>
            <?php foreach($aboutimgs as $aboutimg){?>
            <div class="img col-lg-3 col-md-4 col-sm-6 col-12 pl-0 pr-0" style="background-image: url('/uploads/<?=$aboutimg->img?>')">

            </div>
            <?php } ?>
        </div>
    </section>
    <!--slider -->
    <section class="container p-0">
        <div class="owl-carousel" id="history">
        <?php foreach($history as $hist){ ?>
            <div class="item">
                <div class="slider">
                    <h6 class="title">
                    <?=$hist->titr ?>
                    </h6>
                    <p class="text"> 
                        <?=$hist->about ?>
                     </p>
                </div>
            </div>
            <?php } ?>
        </div>
        <div class="nav" id="nav-history"></div>
        
        <div class="container-dots d-flex justify-content-around" id="slider-dot2">
        <?php foreach($history as $hist){ ?>
            <div class="owl-dot active<?=$hist->id?>"><span> <?=$hist->years ?></span></div>
            <?php } ?>
        </div>
        
    </section>
</main>
