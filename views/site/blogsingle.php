<?php
use yii\helpers\Html;
use yii\widgets\ActiveForm;
use yii\helpers\ArrayHelper;
/* @var $this yii\web\View */

 
?>
<main class="content-blog-single">
    <section class="top-content">
        <div class="container p-0">
            <div class="d-flex justify-content-between align-items-center flex-wrap-reverse">
                <div class="data-share">
                    <i class="title">
                        تاریخ انتشار
                    </i>
                    <i class="data">
                       <?=$blog->create_date ?>
                    </i>
                </div>
                <!-- <form role="search">
                    <input type="search" id="site-search" name="">
                    <button class="btn">
                        <i class="icon-002-search"></i>
                    </button>
                </form> -->
                <?php
                    $model=new \app\models\Blog();
                    $form = ActiveForm::begin(['action'=>'/site/blog','options'=>['class'=>'form','role'=>'search']]); ?>
                        <?= $form->field($model, 'name')->textInput(['id'=>"site-search"])->label(false) ?>
                        <button class="btn" href="#">
                        <i class="icon-002-search"></i>
                        </button>
                        <?php ActiveForm::end(); ?>        
            </div>
        </div>
    </section>
    <section class="blog-text">
        <div class="container p-0">
            <article>
              <h6 class="title"><?=$blog->name ?> </h6>
                <h4 class="title"> <?=$blog->title?> </h4>
                <p class="text"><?=$blog->text?></p>
                <div class="owl-carousel slide" id="sider-blog"> 
                    <div class="item">
                        <div class="slider-base">
                        <img src="/uploads/<?=$blog->img?>" alt="<?=$blog->name ?>">
                       
                            <div class="details-img">
                                <i class="icon-028-photograph"></i>
                                <h3 class="title">
                                    <?=$blog->aboutimg?>
                                </h3>
                            </div>
                        </div>
                    </div> 
                </div>
                <div class="nav" id="nav-blog"></div>
               
            </article>
        </div>
    </section>
    <section class="tag-share">
        <div class="container p-0">
            <div class="body">
                <div class="d-flex justify-content-between flex-wrap align-items-center">
                    <div class="labels d-flex align-items-center">
                   <span class="title">
                       برچسب ها  :
                   </span>
                        <ul class="nav">
                        <?php foreach($tags as $tag){  ?>
                            <li class="nav-item">
                                <a href="#" class="nav-link">
                                    <?=$tag->name ?>
                                </a>
                            </li>
                        <?php }  ?>
                        </ul>
                    </div>
                    <div class="share-social d-flex">
                   <span class="title">
                       اشتراک گذاری  :
                   </span>
                        <ul class="nav">  
                <?php foreach(\app\models\Virtuals::find()->all() as $virtual){ ?>
                            <li class="nav-item">
                                <a href="<?=$virtual->link?>" class="nav-link">
                                <?=$virtual->img?>
                                </a>
                            </li>
                            <?php } ?>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <section class="comments">
   
        <div class="container p-0">
            <div class="top">
               <span class="title">
                   نظرات کاربران
               </span>
                <div class="body" >
                <?php foreach( $blogcomment as $comments){ ?>
                    <div class="detail-comment first-comment d-flex">
                        <div class="img-pro">
                            <img class="profile-img" src="/img/user-comment/person.png">
                        </div>
                        <div class="comment" >
                            <div class="detail-user">
                               <span class="name"> <?=$comments->fullname?>  </span>
                                <span class="time" ><?=$comments->create_date?>  </span>
                                <!-- <a href="#" class="reply d-flex  justify-content-end">
                                    پاسخ دادن
                                    <i class="icon-023-reply"></i>
                                </a> -->
                            </div>
                            <p class="text"><?=$comments->text?>

                            </p>
                        </div>
                    </div>
                <?php } ?>
                    <!-- <div class="detail-comment reply d-flex">
                        <div class="img-pro">
                            <img class="profile-img" src="/img/user-comment/img-1.png">
                        </div>
                        <div class="comment" >
                            <div class="detail-user"  >
                               <span class="name">
                                   علیرضا درخشان
                               </span>
                                <span class="time" >
                                   25 شهریور ماه 1395
                               </span>
                                <a href="#" class="reply d-flex justify-content-end">
                                    پاسخ دادن
                                    <i class="icon-023-reply"></i>
                                </a>
                            </div>
                            <p class="text">

                                باید به این نکته اشاره کرده است که ایالات متحده‌ی آمریکا سهمی در تولید پنل‌های ال‌سی‌دی ندارد، حال آنکه
                                این دومین بازار تلویزیون‌های ال‌سی‌دی در کل جهان است. بر اساس اطلاعات ارائه‌شده توسط گو،
                                احتمالا میزان سرمایه‌گذاری فراتر از 7 میلیارد دلار خواهد بود که به‌ سبب آن 30 تا 50 هزار شغل
                                ایجاد خواهد شد. این اطلاعات برگرفته از مذاکراتی است که بین سان و گو انجام شده است ...

                            </p>
                        </div>
                    </div>
                </div> -->
            </div>
            <div class="cereat-comment">
               <span class="title" >
                   نظر خود را ارسال کنید
               </span>
                <div class="body"  >
                <?php $form = ActiveForm::begin(); ?>
                <?php if (Yii::$app->session->hasFlash('success')): ?>
    <div class="alert alert-success alert-dismissable">
    <button aria-hidden="true" data-dismiss="alert" class="close" type="button">×</button> 
    <?= Yii::$app->session->getFlash('success') ?>
    </div>
    <?php endif; ?>
                <?= $form->field($comment, 'text')->textarea(['class'=>'name-input','placeholder' => 'متن پیام خود را بنویسید ...','required'])->label(false) ?>

                <div class="d-flex justify-content-between flex-wrap">
                    <div class="form">
                    <?= $form->field($comment, 'fullname', ['options' => ['style' => 'display:inline-block;']])->textInput(['class'=>'name-input','placeholder' => 'نام و نام خانوادگی','required'])->label(false) ?>
                    <?= $form->field($comment, 'email', ['options' => ['style' => 'display:inline-block;']])->textInput(['class'=>'name-input','placeholder' => 'پست الکترونیک','required'])->label(false) ?>
                        
                    </div>
                    <?= Html::submitButton('ارسال کنید', ['class' => 'btn btn-send']) ?>
                </div>
                <?php ActiveForm::end(); ?>
                </div>
    

    <!-- display error message-->
    <?php if (Yii::$app->session->hasFlash('error')): ?>
    <div class="alert alert-danger alert-dismissable">
    <button aria-hidden="true" data-dismiss="alert" class="close" type="button">×</button> 
    <?= Yii::$app->session->getFlash('error') ?>
    </div>
    <?php endif; ?>
            </div>
        </div>
    </section>
    <section class="news">
        <div class="header-news">
            <div class="container p-0">
                <div class="d-flex justify-content-between align-items-center">
                    <span class="title" >
                سایر مطالب
                    </span>
                    <a href="#" class="more">
                      <span>
                            مشاهده آرشیو
                      </span>
                    </a>
                </div>
            </div>
        </div> 
        <div class="container p-0">
      
            <div class="owl-carousel slide" id="sider-news">  
            <?php foreach($weblogs as $weblog){   ?>
                <div class="item">
                    <div class="box" >
                        <div class="d-flex flex-wrap">
                            <div class="right" style="background-image: url('/uploads/<?=$weblog->img ?>')">
                    <span class="badge badge-secondary"><?=$weblog->cat->name ?> </span>
                            </div>
                            <div class="left">
                    <span class="data">  <?=$weblog->create_date?> </span>
                                <h4 class="title"><?=$weblog->name ?>  </h4>
                                <p class="text"><?=$weblog->title ?>  </p>
                                <a href="/site/blogsingle?id=<?=$weblog->id ?>" class="more">
                                    ...
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
                <?php }  ?> 
            </div>
          
            <div class="nav" id="nav-news"></div>
        </div>
    
    </section>
</main>