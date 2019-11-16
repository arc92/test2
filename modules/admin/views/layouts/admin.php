<?php

/* @var $this \yii\web\View */
/* @var $content string */

use app\widgets\Alert;
use yii\helpers\Html;
use yii\bootstrap\Nav;
use yii\bootstrap\NavBar;
use yii\widgets\Breadcrumbs;
use app\modules\admin\assets\AdminAsset;

AdminAsset::register($this);
?>

<?php $this->beginPage() ?>
<!DOCTYPE html>
<html lang="<?= Yii::$app->language ?>">
  <head>
    <meta charset="<?= Yii::$app->charset ?>">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <?= Html::csrfMetaTags() ?>
    <title><?= Html::encode($this->title) ?></title>
    <?php $this->head() ?>

  </head>
  <body  dir="rtl">
  <?php $this->beginBody() ?>
  <nav class="navbar navbar-default">
      <div class="container">
        <div class="navbar-header">
          <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
            <span class="sr-only">Toggle navigation</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </button>

        </div>
        <div id="navbar" class="collapse navbar-collapse">
          <ul class="nav navbar-nav  navbar-right">
            <li class="active"><a href="/admin/default/index">صفحه اصلی</a></li>
            <li><a href="/admin/category/index">دسته بندی</a></li>
            <li><a href="/admin/news/index">افزودن خبر</a></li>
            <li><a href="/admin/users/index">کاربران</a></li>
          </ul>

          <ul class="nav navbar-nav navbar-left">
            <li class="active"><a href="/admin/default/index">کاربر عزیز خوش آمدید</a></li>
            <li><a href="/site/logouted">خروج</a></li>

          </ul>
        </div><!--/.nav-collapse -->
      </div>
    </nav>


    <header id="header">
      <div class="container">
        <div class="row">
          <div class="col-md-10">
            <h1><span class="glyphicon glyphicon-cog" aria-hidden="true"></span> پیشخوان <small>تنظیمات</small></h1>
          </div>

        </div>
      </div>
    </header>
<br>



<section id="main">
  <div class="container">
    <div class="row">
      <div class="col-md-3 pull-right">
        <div class="list-group">
      <a href="/admin/default/index" class="list-group-item active main-color-bg"><span class="glyphicon glyphicon-cog" aria-hidden="true"></span>
        صفحه اصلی 
      </a>
      <a href="/admin/menu/index" class="list-group-item"><span class="glyphicon glyphicon-list-alt" aria-hidden="true"></span> افزودن عنوان اصلی منو </a>
      <a href="/admin/submenu/index" class="list-group-item"><span class="glyphicon glyphicon-list-alt" aria-hidden="true"></span>افزودن عنوان زیر منو </a>
      <a href="/admin/category/index" class="list-group-item"><span class="glyphicon glyphicon-list-alt" aria-hidden="true"></span> افزودن دسته بندی</a>
      <a href="/admin/subcat/index" class="list-group-item"><span class="glyphicon glyphicon-list-alt" aria-hidden="true"></span> افزودن زیر دسته بندی</a>
      <a href="/admin/submenu2/index" class="list-group-item"><span class="glyphicon glyphicon-list-alt" aria-hidden="true"></span> افزودن زیر منو</a>
      <a href="/admin/feature/index" class="list-group-item"><span class="glyphicon glyphicon-list-alt" aria-hidden="true"></span>   افزودن عنوان ویژگی</a>
      <!-- <a href="/admin/featurevalue/index" class="list-group-item"><span class="glyphicon glyphicon-list-alt" aria-hidden="true"></span>  افزودن مقدار ویژگی </a> -->
      <a href="/admin/details/index" class="list-group-item"><span class="glyphicon glyphicon-list-alt" aria-hidden="true"></span>   افزودن عنوان مشخصات</a>
      <a href="/admin/detailsvalue/index" class="list-group-item"><span class="glyphicon glyphicon-list-alt" aria-hidden="true"></span>   افزودن مقدار مشخصات</a>
      <a href="/admin/productImg/index" class="list-group-item"><span class="glyphicon glyphicon-list-alt" aria-hidden="true"></span>   افزودن تصاویر محصول</a>
      <a href="/admin/aboutproduct/index" class="list-group-item"><span class="glyphicon glyphicon-list-alt" aria-hidden="true"></span> افزودن مشخصات محصول</a>
      <a href="/admin/product/index" class="list-group-item"><span class="glyphicon glyphicon-list-alt" aria-hidden="true"></span>   افزودن محصول</a>
      <a href="/admin/bascket/index" class="list-group-item"><span class="glyphicon glyphicon-list-alt" aria-hidden="true"></span>  مدیریت سفارشات</a>
      <a href="/admin/slider/index" class="list-group-item"><span class="glyphicon glyphicon-list-alt" aria-hidden="true"></span> اسلایدر</a>
      <a href="/admin/plan/index" class="list-group-item"><span class="glyphicon glyphicon-list-alt" aria-hidden="true"></span> طرح ها</a>
      <a href="/admin/color/index" class="list-group-item"><span class="glyphicon glyphicon-list-alt" aria-hidden="true"></span> رنگ ها</a>
      <a href="/admin/size/index" class="list-group-item"><span class="glyphicon glyphicon-list-alt" aria-hidden="true"></span>جدول سایزها</a>
      <a href="/admin/setting/index" class="list-group-item"><span class="glyphicon glyphicon-list-alt" aria-hidden="true"></span>تنظیمات سایت</a>
      <a href="/admin/virtuals/index" class="list-group-item"><span class="glyphicon glyphicon-list-alt" aria-hidden="true"></span> شبکه های مجازی</a>
      <a href="/admin/contactus/index" class="list-group-item"><span class="glyphicon glyphicon-list-alt" aria-hidden="true"></span> تماس با ما</a>
      <a href="/admin/question/index" class="list-group-item"><span class="glyphicon glyphicon-list-alt" aria-hidden="true"></span> سوالات کاربران</a>
      <a href="/admin/aboutus/index" class="list-group-item"><span class="glyphicon glyphicon-list-alt" aria-hidden="true"></span> درباره ما</a>
      <a href="/admin/history/index" class="list-group-item"><span class="glyphicon glyphicon-list-alt" aria-hidden="true"></span> افزودن تاریخچه</a>
      <a href="/admin/blogcat/index" class="list-group-item"><span class="glyphicon glyphicon-list-alt" aria-hidden="true"></span> افزودن دسته بندی وبلاگ</a>
      <a href="/admin/blog/index" class="list-group-item"><span class="glyphicon glyphicon-list-alt" aria-hidden="true"></span> افزودن متن وبلاگ</a>
      <!-- <a href="/admin/blogimg/index" class="list-group-item"><span class="glyphicon glyphicon-list-alt" aria-hidden="true"></span> افزودن تصاویر وبلاگ</a>
      <a href="/admin/blogvideo/index" class="list-group-item"><span class="glyphicon glyphicon-list-alt" aria-hidden="true"></span> افزودن ویدیو وبلاگ</a> -->
      <a href="/admin/blogcomment/index" class="list-group-item"><span class="glyphicon glyphicon-list-alt" aria-hidden="true"></span> پیشنهادات و انتقادات وبلاگ</a>
      <a href="/admin/timesend/index" class="list-group-item"><span class="glyphicon glyphicon-list-alt" aria-hidden="true"></span>ارسال محصول</a>
      <a href="/admin/subject/index" class="list-group-item"><span class="glyphicon glyphicon-list-alt" aria-hidden="true"></span> موضوع انتقاد و پیشنهاد </a>
      <a href="/admin/mysize/index" class="list-group-item"><span class="glyphicon glyphicon-list-alt" aria-hidden="true"></span> سایز البسه من</a>
      <a href="/admin/branch/index" class="list-group-item"><span class="glyphicon glyphicon-list-alt" aria-hidden="true"></span> افزودن شعبه</a>
      <a href="/admin/cathelp/index" class="list-group-item"><span class="glyphicon glyphicon-list-alt" aria-hidden="true"></span>دسته بندی راهنما</a>
      <a href="/admin/help/index" class="list-group-item"><span class="glyphicon glyphicon-list-alt" aria-hidden="true"></span> راهنما</a>
      <a href="/admin/file/index" class="list-group-item"><span class="glyphicon glyphicon-list-alt" aria-hidden="true"></span>  بروشور راهنما</a>  
      <a href="/admin/questionhelp/index" class="list-group-item"><span class="glyphicon glyphicon-list-alt" aria-hidden="true"></span> سوالات راهنما</a>
      <a href="/admin/faq/index" class="list-group-item"><span class="glyphicon glyphicon-list-alt" aria-hidden="true"></span>سوالات متداول</a>
     
  </div>
      </div>
        <div class="col-md-9" >
        
   <?=$content?>

        </div>
    </div>
  </div>
</section>

<footer id="footer" style="margin-top: 800px;">
    <p>طراحی سایت Yii2<br>2018</p>
  </footer>
   <?php $this->endBody() ?>
</body>
</html>
<?php $this->endPage() ?>