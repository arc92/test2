<?php

/* @var $this \yii\web\View */
/* @var $content string */

use app\widgets\Alert;
use yii\helpers\Html;
use yii\bootstrap\Nav;
use yii\bootstrap\NavBar;
use yii\widgets\Breadcrumbs;
use app\modules\admin\assets\AppAsset;

AppAsset::register($this);
?>
<?php $this->beginPage() ?>
<!DOCTYPE html>
<html lang="<?= Yii::$app->language ?>">
<head>
    <meta charset="<?= Yii::$app->charset ?>">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="shortcut icon" type="image/png" href="/img/favicon.icon"/>
    <?= Html::csrfMetaTags() ?>
    <link rel="icon" type="image/x-icon" href="/img/foviconbcc.png" />
    <title><?= Html::encode($this->title) ?></title>
    <?php $this->head() ?>
</head>
<body class="fix-header fix-sidebar card-no-border">
<?php $this->beginBody() ?>

    <!-- ============================================================== -->
    <!-- Preloader - style you can find in spinners.css -->
    <!-- ============================================================== -->
    <div class="preloader">
        <svg class="circular" viewBox="25 25 50 50">
            <circle class="path" cx="50" cy="50" r="20" fill="none" stroke-width="2" stroke-miterlimit="10" /> </svg>
    </div>
    <!-- ============================================================== -->
    <!-- Main wrapper - style you can find in pages.scss -->
    <!-- ============================================================== -->
    <div id="main-wrapper">
        <!-- ============================================================== -->
        <!-- Topbar header - style you can find in pages.scss -->
        <!-- ============================================================== -->
        <header class="topbar">
            <nav class="navbar top-navbar navbar-expand-md navbar-light">
                <!-- ============================================================== -->
                <!-- Logo -->
                <!-- ============================================================== -->
                <div class="navbar-header">
                
                </div>
                <!-- ============================================================== -->
                <!-- End Logo -->
                <!-- ============================================================== -->
               
            </nav>
        </header>
        <!-- ============================================================== -->
        <!-- End Topbar header -->
        <!-- ============================================================== -->
        <!-- ============================================================== -->
        <!-- Left Sidebar - style you can find in sidebar.scss  -->
        <!-- ============================================================== -->
        <aside class="left-sidebar">
            <!-- Sidebar scroll-->
            <div class="scroll-sidebar">
                <!-- User profile -->
                <div class="user-profile">
                    <!-- User profile image -->
                    <div class="profile-img"> <img src="http://multidataextender.com/wp-content/uploads/2016/08/158274-200.png" alt="user" /> </div>
                    <!-- User profile text-->
                    <div class="profile-text"> <a href="#" class="dropdown-toggle link u-dropdown" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="true">ادمین <span class="caret"></span></a>
                        <div class="dropdown-menu animated flipInY">
                            <!-- <a href="/admin/user" class="dropdown-item"><i class="ti-user"></i> پروفایل من</a>
                            <div class="dropdown-divider"></div> <a href="/admin/change-password" class="dropdown-item"><i class="ti-settings"></i> تغییر رمز عبور</a> -->
                            <!-- <div class="dropdown-divider"></div>--> <a href="/site/logouted" class="dropdown-item"><i class="fa fa-power-off"></i> خروج</a> 
                        </div>
                    </div>
                </div>
                <!-- End User profile text-->
                <!-- Sidebar navigation-->
                <nav class="sidebar-nav">
                    <ul id="sidebarnav">
                        <li>
                            <a href="/admin"><i class="mdi mdi-gauge"></i><span class="hide-menu">داشبورد</a>
                        </li>
                        <li>
                            <a href="/admin/bascket/index"><i class="mdi mdi-gauge"></i><span class="hide-menu">مدیریت سفارشات</a>
                        </li>
                        
                        <li >
                            <a  href="/admin/catproduct/index" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="true"> <i class="mdi mdi-gauge"></i><span class="hide-menu">مدیریت  Category</a>
                            <ul class="dropdown-menu">
                                <li><a href="/admin/catproduct/index">افزودن دسته بندی </a></li>
                                <li><a href="/admin/slider/index">اسلایدر </a></li> 
                                <li><a href="/admin/piccat/index">تصویر نوزاد دختر و پسر </a></li> 
                                <li><a href="/admin/setbabycat/index">ست نوزادی </a></li> 
                                <li><a href="/admin/contentcategory/index">محتوای هر دسته بندی </a></li> 
                            </ul>
                        </li>
                        <li>
                            <a href="/admin/product/index"><i class="mdi mdi-gauge"></i><span class="hide-menu">افزودن محصول</a>
                        </li>
                        <li>
                            <a href="/admin/users/index"><i class="mdi mdi-gauge"></i><span class="hide-menu"> کاربران</a>
                        </li>
                        <li>
                            <a href="/admin/category/index"><i class="mdi mdi-gauge"></i><span class="hide-menu">دسته بندی</a>
                        </li>
                        <li>
                            <a href="/admin/subcat/index"><i class="mdi mdi-gauge"></i><span class="hide-menu">زیر دسته بندی</a>
                        </li>
                        <li>
                            <a href="/admin/feature/index"><i class="mdi mdi-gauge"></i><span class="hide-menu">ویژگی های محصول</a>
                        </li> 
                        <li>
                            <a href="/admin/details/index"><i class="mdi mdi-gauge"></i><span class="hide-menu">مشخصات محصول</a>
                        </li>
                       
                        <!-- <li>
                            <a href="/admin/detailsvalue/index"><i class="mdi mdi-gauge"></i><span class="hide-menu">مقادیر مشخصات</a>
                        </li> -->
                        <!-- <li>
                            <a href="/admin/productImg/index"><i class="mdi mdi-gauge"></i><span class="hide-menu">تصویر محصول</a>
                        </li> -->
                        <!-- <li>
                            <a href="/admin/aboutproduct/index"><i class="mdi mdi-gauge"></i><span class="hide-menu">مشخصات محصول</a>
                        </li> -->
                        <li>
                            <a href="/admin/plan/index"><i class="mdi mdi-gauge"></i><span class="hide-menu">طرح ها</a>
                        </li>
                  
                        <li>
                            <a href="/admin/offer/index"><i class="mdi mdi-gauge"></i><span class="hide-menu" > مدیریت تخفیف </a>
                        </li>
                        <li>
                            <a href="/admin/off/index"><i class="mdi mdi-gauge"></i><span class="hide-menu" >  تخفیف  کلی </a>
                        </li>
                        <!-- <li>
                            <a href="/admin/product-offer/index"><i class="mdi mdi-gauge"></i><span class="hide-menu">تخفیف محصول </a>
                        </li> -->
                      
                       
                        <li>
                            <a href="/admin/slider/index"><i class="mdi mdi-gauge"></i><span class="hide-menu">اسلایدر</a>
                        </li>
                       
                        <li>
                            <a href="/admin/color/index"><i class="mdi mdi-gauge"></i><span class="hide-menu">رنگ محصول</a>
                        </li>
                        <li>
                            <a href="/admin/size/index"><i class="mdi mdi-gauge"></i><span class="hide-menu">جدول سایز ها</a>
                        </li>
                        <li>
                            <a href="/admin/sizeimg/index"><i class="mdi mdi-gauge"></i><span class="hide-menu">تصاویر راهنمای سایز</a>
                        </li>
                        <li>
                            <a href="/admin/setting/index"><i class="mdi mdi-gauge"></i><span class="hide-menu">تنظیمات</a>
                        </li> 
                        <li>
                            <a href="/admin/footer/index"><i class="mdi mdi-gauge"></i><span class="hide-menu">مدیریت لوگوهای فوتر</a>
                        </li>
                        <li>
                            <a href="/admin/icon/index"><i class="mdi mdi-gauge"></i><span class="hide-menu">مدیریت آیکن فوتر</a>
                        </li> 
                        <li>
                            <a href="/admin/menu2/index"><i class="mdi mdi-gauge"></i><span class="hide-menu">منو ساز</a>
                        </li>
                        <li>
                            <a href="/admin/virtuals/index"><i class="mdi mdi-gauge"></i><span class="hide-menu">شبکه های مجازی</a>
                        </li>
                        <!-- <li>
                            <a href="/admin/shegeft/index"><i class="mdi mdi-gauge"></i><span class="hide-menu">شگفت انگیز </a>
                        </li> -->
                        <li>
                            <a href="/admin/contactus/index"><i class="mdi mdi-gauge"></i><span class="hide-menu">تماس با ما</a>
                        </li>
                        <li>
                            <a href="/admin/question/index"><i class="mdi mdi-gauge"></i><span class="hide-menu">سوالات کاربران</a>
                        </li>
                        <li>
                            <a href="/admin/aboutus/index"><i class="mdi mdi-gauge"></i><span class="hide-menu">درباره ما</a>
                        </li>
                        <li>
                            <a href="/admin/aboutimg/index"><i class="mdi mdi-gauge"></i><span class="hide-menu">تصاویر درباره ما</a>
                        </li>
                        <li>
                            <a href="/admin/history/index"><i class="mdi mdi-gauge"></i><span class="hide-menu">افزودن تاریخچه</a>
                        </li>
                        <li>
                            <a href="/admin/blogcat/index"><i class="mdi mdi-gauge"></i><span class="hide-menu">دسته بندی وبلاگ</a>
                        </li>
                        <li>
                            <a href="/admin/blog/index"><i class="mdi mdi-gauge"></i><span class="hide-menu">افزودن متن وبلاگ</a>
                        </li>
                        <li>
                            <a href="/admin/blogcomment/index"><i class="mdi mdi-gauge"></i><span class="hide-menu">پیشنهادات و انتقادات وبلاگ</a>
                        </li>
                       
                        <li>
                            <a href="/admin/checkit/index"><i class="mdi mdi-gauge"></i><span class="hide-menu">نظرات محصولات</a>
                        </li>
                       
                        <!-- <li>
                            <a href="/admin/timesend/index"><i class="mdi mdi-gauge"></i><span class="hide-menu">ساعت ارسال محصول</a>
                        </li> -->

                        <li>
                            <a href="/admin/send/index"><i class="mdi mdi-gauge"></i><span class="hide-menu"> مدیریت ارسال</a>
                        </li>

                        <li>
                            <a href="/admin/expresssend/index"><i class="mdi mdi-gauge"></i><span class="hide-menu">نحوه ارسال محصول</a>
                        </li>
                        <li>
                            <a href="/admin/subject/index"><i class="mdi mdi-gauge"></i><span class="hide-menu">موضوع انتقاد و پیشنهاد </a>
                        </li>
                        <li>
                            <a href="/admin/mysize/index"><i class="mdi mdi-gauge"></i><span class="hide-menu">سایز البسه من</a>
                        </li>
                     
                        <li>
                            <a href="/admin/cathelp/index"><i class="mdi mdi-gauge"></i><span class="hide-menu">دسته بندی راهنما</a>
                        </li>
                        <li>
                            <a href="/admin/help/index"><i class="mdi mdi-gauge"></i><span class="hide-menu">راهنما</a>
                        </li>
                        <li>
                            <a href="/admin/questionhelp/index"><i class="mdi mdi-gauge"></i><span class="hide-menu">سوالات راهنما</a>
                        </li>
                        <li>
                            <a href="/admin/file/index"><i class="mdi mdi-gauge"></i><span class="hide-menu">بروشور راهنما</a>
                        </li>
                        <li>
                            <a href="/admin/faq/index"><i class="mdi mdi-gauge"></i><span class="hide-menu">سوالات متداول</a>
                        </li>
                        <li>
                            <a href="/admin/transport/index"><i class="mdi mdi-gauge"></i><span class="hide-menu">حمل و نقل</a>
                        </li>
                        <li>
                            <a href="/admin/privacy/index"><i class="mdi mdi-gauge"></i><span class="hide-menu">حریم خصوصی</a>
                        </li>
                        <li>
                            <a href="/admin/letme/index"><i class="mdi mdi-gauge"></i><span class="hide-menu">به من اطلاع  بده</a>
                        </li>
                        <li>
                            <a href="/admin/newsletters/index"><i class="mdi mdi-gauge"></i><span class="hide-menu">خبرنامه</a>
                        </li>
                        <li>
                            <a href="/admin/branch/index"><i class="mdi mdi-gauge"></i><span class="hide-menu">افزودن شعبه</a>
                        </li>
                        <li>
                            <a href="/admin/branchimg/index"><i class="mdi mdi-gauge"></i><span class="hide-menu">افزودن تصویر شعبه</a>
                        </li>
                        <li>
                            <a href="/admin/certificates/index"><i class="mdi mdi-gauge"></i><span class="hide-menu">گواهینامه  </a>
                        </li>
                        <li>
                            <a href="/admin/province/index"><i class="mdi mdi-gauge"></i><span class="hide-menu">استان  </a>
                        </li>
                        <li>
                            <a href="/admin/city/index"><i class="mdi mdi-gauge"></i><span class="hide-menu">شهر  </a>
                        </li>
                        
                       
                    </ul>
                </nav>
                <!-- End Sidebar navigation -->
            </div>
            <!-- End Sidebar scroll-->
            <!-- Bottom points-->
          
            <!-- End Bottom points-->
        </aside>
        <!-- ============================================================== -->
        <!-- End Left Sidebar - style you can find in sidebar.scss  -->
        <!-- ============================================================== -->
        <div class="page-wrapper">
            <!-- ============================================================== -->
            <!-- Container fluid  -->
            <!-- ============================================================== -->
            <div class="container-fluid">
        <?=$content?>
        </div>
                <!-- ============================================================== -->
                <!-- End Right sidebar -->
                <!-- ============================================================== -->
            </div>

    </div>
    <!-- ============================================================== -->
    <!-- End Wrapper -->
    <!-- ============================================================== -->

        <?php $this->endBody() ?>
</body>
</html>
<?php $this->endPage() ?>
