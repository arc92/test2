<?php

/* @var $this \yii\web\View */

/* @var $content string */

use app\models\Cart;
use yii\helpers\Html;
use app\assets\AppAsset;

AppAsset::register($this);

$category = \app\models\Category::find()->all();
$setting = cacheSetting();
$virtuals = \app\models\Virtuals::find()->orderBy(['id' => SORT_DESC])->all();
$menu = menu();
$subMenu = subMenu();


if (\yii::$app->users->is_loged()) {
    $user = \Yii::$app->session['user_id'];
} else {
    $user = \Yii::$app->session['guest_id'];
}


$cart = Cart::find()
    ->Where(['userID' => $user])
    ->andWhere(['status' => 0])
    ->andWhere(['submitDate' => Yii::$app->jdate->date('Y/m/d')])
    ->orderBy(['id' => SORT_DESC])
    ->one();

$totalAmount = 0;
$totalCount = 0;

if ($cart) {
    $totalAmount = $cart->getCartoptions()->sum('amount*count');
    $totalCount = $cart->getCartoptions()->count('id');
}


$footer = cacheFooter();
$url = Yii::$app->request->getAbsoluteUrl();
$urls = parse_url($url);
$str = ($urls['host']);
$str .= ($urls['path']);
?>
<?php $this->beginPage() ?>
<!DOCTYPE html>
<html lang="<?= Yii::$app->language ?>">
<head>
    <meta charset="<?= Yii::$app->charset ?>">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <?= Html::csrfMetaTags() ?>
    <link rel="shortcut icon" href="/img/foviconbcc.ico" type="image/x-icon">
    <link rel="icon" href="/img/foviconbcc.ico" type="image/x-icon">
    <link rel="canonical" href="<?= $str ?>"/>
    <title><?= Html::encode($this->title) ?></title>
    <script>
        (function (i, s, o, g, r, a, m) {
            i['GoogleAnalyticsObject'] = r;
            i[r] = i[r] || function () {
                (i[r].q = i[r].q || []).push(arguments)
            }, i[r].l = 1 * new Date();
            a = s.createElement(o), m = s.getElementsByTagName(o)[0];
            a.async = 1;
            a.src = g;
            m.parentNode.insertBefore(a, m)
        })(window, document, 'script', '//www.google-analytics.com/analytics.js', 'ga');
        ga('create', 'UA-75258810-1', 'auto', {'name': 'master'});
        ga('require', 'GTM-NX45WZH');
        ga('master.send', 'pageview');
        ga('master.require', 'linkid', 'linkid.js');
    </script>
     Hotjar Tracking Code for https://bccstyle.com/
        <script>
        (function(h,o,t,j,a,r){
            h.hj=h.hj||function(){(h.hj.q=h.hj.q||[]).push(arguments)};
            h._hjSettings={hjid:1321174,hjsv:6};
            a=o.getElementsByTagName('head')[0];
            r=o.createElement('script');r.async=1;
            r.src=t+h._hjSettings.hjid+j+h._hjSettings.hjsv;
            a.appendChild(r);
        })(window,document,'https://static.hotjar.com/c/hotjar-','.js?sv=');
    </script>

    <?php $this->head() ?>
</head>
<body>
<header class="header">
    <?php if (Yii::$app->session->hasFlash('filter')): ?>
        <div class="alert alert-danger alert-dismissable"
             style="margin-bottom:0!important;text-align: center;color: #fff;background: #ed008c;">
            <button aria-hidden="true" data-dismiss="alert" class="close" type="button">×</button>
            <?= Yii::$app->session->getFlash('filter') ?>
        </div>
    <?php endif; ?>
    <div class="topheader">
        <div class="container p-0 d-flex justify-content-between align-items-center">
            <!--                --><?php //$form = ActiveForm::begin([
            //                    'action' => '/search',
            //                    'fieldConfig' => [
            //                        'template' => '{input}{label}{hint}',
            //                        'horizontalCssClasses' => [
            //                            'label' => '',
            //                            'offset' => '',
            //                            'wrapper' => '',
            //                            'error' => '',
            //                            'hint' => '',
            //                        ],
            //                    ]
            //                ]); ?>
            <div class="search">
                <img id="close" src="/uploads/close-button-big-white-black.png">

                <input type="text" id="product-name" class="form-control" name="Product[name]"
                       placeholder="برای جستجو همین حالا شروع کنید . . ." aria-required="true" aria-invalid="false">
                <!--                    <button type="submit" disabled class="btn"></button>-->
                <div id="search_result">
                    <ul id="result">

                    </ul>
                </div>
            </div>

            <!--                --><?php //ActiveForm::end(); ?>

            <div class="info">
                <ul class="nav">
                    <li class="nav-item call" style="cursor: pointer;"><a href="tel:02166962957"
                                                                          style="color:white;">
                            شماره تماس66962957 - داخلی 201
                        </a></li>
                    <!-- <li class="nav-item gift">
                        <a href="#" class="nav-link p-0">
                            هرروز صبح با هدیه
                        </a>
                    </li> -->
                    <li class="nav-item d-flex">
                        <?php if (!\yii::$app->users->is_loged()) { ?>
                            <a class="nav-link p-0" href="/login/">
                                ورود
                            </a>
                            یا
                            <a class="nav-link p-0" href="/register/">
                                عضویت
                            </a>
                        <?php } ?>


                        <?php if (\yii::$app->users->is_loged()) { ?>
                            <a class="nav-link p-0" href="/user">
                                <?= \Yii::$app->session['user_name'] . '   عزیز خوش آمدید' ?>
                            </a>
                            <!-- <a class="nav-link p-0" href="/user">
                                پروفایل
                            </a> -->
                            <a class="nav-link p-0" href="/logouted/">
                                خروج
                            </a>
                        <?php } ?>
                    </li>
                </ul>
            </div>
        </div>
    </div>
    <div class="main-header">
        <div class="container p-0 d-flex justify-content-between ">
            <nav class="navbar navbar-expand-lg navbar-light bg-light">
                <!-- <a class="navbar-brand p-0 campain_" style="width: 120px;" href="/">
                        <img style="width: 120px;" src="/img/bigsize1.png" alt="">
                    </a> -->
                <a class="navbar-brand p-0" href="/" style="width: 120px;">
                    <img style="width: 120px;" src="/uploads/<?= $setting->logo ?>" alt="">
                </a>
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav"
                        aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse mr-auto" id="navbarNav">
                    <ul class="navbar-nav ">
                        <?php foreach (menu() as $menus) { ?>
                            <li class="nav-item dropdown">
                                <?php if ($menus->has_submenu == 1) { ?>
                                    <a class="nav-link dropdown-toggle " <?php if ($menus->id == 27) { ?> href="/" <?php } ?>
                                       id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true"
                                       aria-expanded="false">
                                        <?php echo $menus->name; ?>
                                    </a>
                                <?php } ?>

                                <div class="dropdown-menu"
                                     aria-labelledby="navbarDropdown" <?= ($menus->id == 27) ? 'style="display:none!important;"' : '' ?> >
                                    <!-- new -->
                                    <div class="d-flex container p-0">
                                        <div class="width-res">

                                            <div class="column  d-flex" <?= ($menus->id == 27) ? 'style="display:none;"' : '' ?> >

                                                <article>
                                                    <div class="d-flex">
                                                        <ul class="list">
                                                            <?php foreach (subMenu() as $submenu) {
                                                                if ($menus->has_submenu == 1 && $submenu->parent == $menus->id && $submenu->row == 1) {
                                                                    ?>
                                                                    <li class="item">
                                                                        <a href="/<?= $submenu->link . '/?categoryName=' . $submenu->name ?>"
                                                                           class="link"
                                                                           style="font-weight: bold!important;color: #a3cced;!importantpadding-top: 11px!important;">
                                                                            <i class="icon-006-left-chevron"></i> <?= $submenu->name ?>
                                                                        </a>
                                                                    </li>
                                                                <?php }
                                                            } ?>
                                                        </ul>
                                                    </div>
                                                </article>
                                                <article>
                                                    <div class="d-flex">
                                                        <ul class="list">
                                                            <?php foreach (subMenu() as $submenu) {
                                                                if ($menus->has_submenu == 1 && $submenu->parent == $menus->id && $submenu->row == 2) {
                                                                    ?>
                                                                    <li class="item">
                                                                        <a href="/<?= $submenu->link . '/?categoryName=' . $submenu->name ?>"
                                                                           class="link"
                                                                           style="font-weight: bold!important;color: #a3cced;!importantpadding-top: 11px!important;">
                                                                            <i class="icon-006-left-chevron"></i> <?= $submenu->name ?>
                                                                        </a>
                                                                    </li>
                                                                <?php }
                                                            } ?>
                                                        </ul>
                                                    </div>
                                                </article>
                                                <article>
                                                    <div class="d-flex">
                                                        <ul class="list">
                                                            <?php foreach (subMenu() as $submenu) {
                                                                if ($menus->has_submenu == 1 && $submenu->parent == $menus->id && $submenu->row == 3) {
                                                                    ?>
                                                                    <li class="item">
                                                                        <a href="/<?= $submenu->link . '/?categoryName=' . $submenu->name ?>"
                                                                           class="link"
                                                                           style="font-weight: bold!important;color: #a3cced;!importantpadding-top: 11px!important;">
                                                                            <i class="icon-006-left-chevron"></i> <?= $submenu->name ?>
                                                                        </a>
                                                                    </li>
                                                                <?php }
                                                            } ?>
                                                        </ul>
                                                    </div>
                                                </article>


                                            </div>
                                            <!-- N E W  A L L P R O U D U C T -->

                                            <div class=" container p-0">
                                                <a href="/baby-clothing/" class="link all-product"
                                                   style="font-weight: bold!important;color: #a3cced;!importantpadding-top: 11px!important;">
                                                    + تمام محصولات
                                                </a>
                                            </div>


                                            <!-- N E W  A L L P R O U D U C T -->
                                        </div>


                                        <?php if ($menus->id == 1) { ?>
                                            <article class="article-mega"
                                                     style="margin-top:auto;margin-right: auto;">
                                                <div class="mega-img" style="width:526px!important;">
                                                    <img src="<?= (isset($menus->picture) ? '/uploads/' . $menus->picture : '') ?>"
                                                         alt="">
                                                </div>

                                            </article>
                                        <?php } ?>
                                        <?php if ($menus->id == 14) { ?>
                                            <article class="article-mega"
                                                     style="margin-top:auto;margin-right: auto;">
                                                <div class="mega-img">
                                                    <img src="<?= (isset($menus->picture) ? '/uploads/' . $menus->picture : '') ?>"
                                                         alt="">
                                                </div>

                                            </article>
                                        <?php } ?>
                                        <?php if ($menus->id == 27) { ?>
                                            <article class="article-mega"
                                                     style="margin-top:auto;margin-right: auto;">
                                                <div class="mega-img">
                                                    <img src="<?= (isset($menus->picture) ? '/uploads/' . $menus->picture : '') ?>"
                                                         alt="">
                                                </div>

                                            </article>
                                        <?php } ?>

                                    </div>


                                    <!-- end -->

                                </div>
                            </li>
                        <?php } ?>
                        <li class="nav-item">
                            <a href="/baby-clothing/newborn-set/" class="nav-link"
                               id="navbarDropdown">
                                ست نوزادی
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="/baby-clothing/outlet/" class="nav-link"
                               id="navbarDropdown" style="color: #ed008c!important;">
                                تخفیفی
                            </a>
                        </li>


                    </ul>

                    <?php if (\yii::$app->users->GetRole() == 'admin'){

                    }else{
                    ?>
                    <div class="shopping-card d-flex" id="cart">
                        <!-- <img src="/img/bigsize2.png" alt="بی سی سی" style="width: 120px;height: 56px;margin-left: 20px;"> -->
                        <div class="text">
                       <span class="title">
                       سبد خرید شما
                       </span>
                            <span class="price" id="price">
                       <?php if (\yii::$app->users->is_loged() || \Yii::$app->session['guest_id']) {
                           echo $totalAmount . ' تومان';
                       } else {
                           echo '0';
                       } ?>
                                  
                       </span>
                        </div>

                        <div class="basket d-flex justify-content-center align-items-center">
                            <label class="number">
                                <?php if (\yii::$app->users->is_loged() || \Yii::$app->session['guest_id']) {
                                    echo $totalCount;
                                } else {
                                    echo '0';
                                } ?>

                            </label>
                            <a href="/cart/"><i class="icon-003-buy"></i></a>
                        </div>
                        <div class="drop-menu-box-shop">
                            <div class="detail-drop-menu">
                                <div class="seen-all">
                                    <?php if (isset($cart)) { ?>
                                        <a href="/cart/">
                                            مشاهده سبد خرید
                                        </a>
                                    <?php } else { ?>
                                        <a href="/index/">
                                            مشاهده سبد خرید
                                        </a>
                                    <?php } ?>
                                </div>
                            </div>
                            <?php } ?>
                        </div>
                    </div>
                </div>
            </nav>
            <div class="shopping-card res d-flex" id="cart-res">
                <div class="text">
                    <span class="title">
                    سبد خرید شما
                    </span>
                    <span class="price" id="price">
                        <?php if (\yii::$app->users->is_loged() || \Yii::$app->session['guest_id']) {
                            echo $totalAmount . ' تومان';
                        } else {
                            echo '0';
                        } ?>

                    </span>
                </div>

                <div class="basket d-flex justify-content-center align-items-center">
                    <label class="number">
                        <?php if (\yii::$app->users->is_loged() || \Yii::$app->session['guest_id']) {
                            echo $totalCount;
                        } else {
                            echo '0';
                        } ?>

                    </label>
                    <a href="/cart/"><i class="icon-003-buy"></i></a>
                </div>
                <div class="drop-menu-box-shop">
                    <div class="detail-drop-menu">
                        <div class="seen-all">
                            <?php if ($cart) { ?>
                                <a href="/cart/">
                                    مشاهده سبد خرید
                                </a>
                            <?php } else { ?>
                                <a href="/index/">
                                    مشاهده سبد خرید
                                </a>
                            <?php } ?>
                        </div>
                    </div>
                </div>
            </div>
            <div>
            </div>
        </div>

    </div>
    </div>
</header>
<?php $this->beginBody() ?>
<?= $content ?>

<footer class="footer">
    <section class="top-footer d-flex align-items-center">
        <div class="container p-0 d-flex   align-items-center justify-content-between">
            <?php foreach (\app\models\Icon::find()->Where(['status' => 1])->all() as $icon) { ?>
                <div class="item" style="width:150px;height:150px;">
                    <a href="/<?= $icon->link ?>/" class="box">
                        <img src="/uploads/<?= $icon->picture ?>" alt=""
                             style="width:90px;height:70px;margin-right:30px;margin-bottom:10px">
                        <h3 class="title"
                            style="background-image:none!important;color: #7d7d7d;font-size: 15px;text-align: center;"> <?= $icon->title ?></h3>
                    </a>
                </div>
            <?php } ?>
        </div>
    </section>
    <section class="main-footer top-footer">
        <div class="container  d-flex justify-content-between flex-wrap">
            <div class="logo-item" style="margin-top: 20px;">
                <img class="logo" src="/uploads/<?= $setting->footerlogo ?>" alt="">
                <article class="art">
                    <div id="ewq" style="display:none">  <?= $setting->about ?>  </div>
                    <div id="rew">  <?= substr($setting->about, '0', '500') ?>
                        <!-- <button id="clickqwe" class="call2"  style="background-image: url('/img/noun.png')">ادامه</button> -->
                        <button id="clickqwe" class="call2"
                                style="background-color:#a3cced;width:37px;height:19px;border:white;border-radius:30px;display:inline-block;color:white; ">
                            >>>
                        </button>
                    </div>
                </article>
                <a class="call" href="/contactus/">
                    تماس با کارشناسان
                </a>
            </div>
            <div class="links-item" style="margin-top: 20px;">
                <div class="titles d-flex justify-content-between">
                    <h5>
                        خدمات مشتریان
                    </h5>
                    <h5>
                        درباره ما
                    </h5>
                    <h5>
                        دسته بندی ها
                    </h5>
                </div>
                <div class="links d-flex justify-content-between">
                    <ul class="nav">
                        <li class="nav-item">
                            <a class="nav-link" href="/faq/">
                                تعویض و بازگشت کالا
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="/transport/">
                                حمل و نقل
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="/size/">
                                جدول سایز
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="/privacy/" class="nav-link">
                                باشگاه مشتریان
                            </a>
                        </li>
                        </li>
                        <!--                        <li class="nav-item">-->
                        <!--                            <a href="/blog/" class="nav-link">-->
                        <!--                                وبلاگ-->
                        <!--                            </a>-->
                        <!--                        </li>-->
                    </ul>
                    <ul class="nav">
                        <li class="nav-item">
                            <a class="nav-link" href="/about/">
                                درباره بی سی سی
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="/branches/">
                                فروشگاه ها
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="/certificates/">
                                گواهینامه </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="/contactus/">
                                تماس با ما
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="/help/">
                                راهنما
                            </a>
                        </li>
                    </ul>
                    <ul class="nav">
                        <?php foreach ($category as $cat) {
                            if ($cat->id == 1) {
                                ?>
                                <li class="nav-item">
                                    <a class="nav-link" href="/baby-clothing/">  <?= $cat->name ?>  </a>
                                </li>
                            <?php } elseif ($cat->id == 2) { ?>
                                <li class="nav-item">
                                    <a class="nav-link"
                                       href="/baby-clothing/baby-clothes-gift-set/">  <?= $cat->name ?>  </a>
                                </li>
                            <?php }
                        } ?>
                    </ul>
                </div>
            </div>
        </div>
        <div class="container">
            <?php
            $footer1 = \app\models\Footer::find()->Where(['id' => 1])->one();
            $footer2 = \app\models\Footer::find()->Where(['id' => 2])->one();
            $footer3 = \app\models\Footer::find()->Where(['id' => 3])->one();
            $footer4 = \app\models\Footer::find()->Where(['id' => 4])->one();
            $footer5 = \app\models\Footer::find()->Where(['id' => 5])->one();
            ?>
            <div class="img-e-namad w-100 d-flex justify-content-center flex-wrap" style="margin-top: 30px;">
                <img src="<?= (isset($footer1) ? '/uploads/' . $footer1->img : '') ?>" alt=""
                     onclick="window.open(&quot;https://logo.samandehi.ir/Verify.aspx?id=44343&amp;p=aodsaodsxlaoaodsxlao&quot;, &quot;Popup&quot;,&quot;toolbar=no, location=no, statusbar=no, menubar=no, scrollbars=1, resizable=0, width=580, height=600, top=30&quot;)"
                     style="cursor:pointer" id="wlaowlaorgvjwlaorgvj">
                <img src="<?= (isset($footer2) ? '/uploads/' . $footer2->img : '') ?>" alt=""
                     onclick="window.open(&quot;https://trustseal.enamad.ir/Verify.aspx?id=30679&amp;p=pB3M5FniFOeBLp3Q&quot;, &quot;Popup&quot;,&quot;toolbar=no, location=no, statusbar=no, menubar=no, scrollbars=1, resizable=0, width=580, height=600, top=30&quot;)"
                     style="cursor:pointer" id="pB3M5FniFOeBLp3Q">

                <a href="#">
                    <img src="<?= (isset($footer3) ? '/uploads/' . $footer3->img : '') ?>" alt="">
                </a>
                <a href="#">
                    <img src="<?= (isset($footer4) ? '/uploads/' . $footer4->img : '') ?>" alt="">
                </a>
                <a href="#">
                    <img src="<?= (isset($footer5) ? '/uploads/' . $footer5->img : '') ?>" alt="">
                </a>


            </div>
        </div>
    </section>

    <section class="poshtibani top-footer d-flex align-items-center">
        <div class="container p-0 d-flex align-items-center justify-content-between">
            <a href="" class="box">
                <h3 class="title"
                    style="background-image:none!important;color: #7d7d7d;font-size: 12px;text-align: center;"><a
                            href="tel:02166962957" style="color: gray;">
                        پشتیبانی خرید اینترنتی - شماره تماس 66962957 - داخلی ۲۰۱
                    </a>

                </h3>
            </a>

        </div>
    </section>
    <section class="end-footer d-flex align-items-center">
        <div class="container d-flex align-items-center p-0">
            <div class="copyright">
                <span>
                   تمامی حقوق این سایت متعلق به  بی سی سی  می باشد .
                </span>
            </div>
            <div class="social">
                <ul class="nav social">
                    <?php foreach ($virtuals as $virtual) { ?>
                        <li class="nav-item">
                            <a class="nav-link" href="<?= $virtual->link ?>">
                                <?= $virtual->img ?>
                            </a>
                        </li>
                    <?php } ?>
                </ul>
            </div>
        </div>
    </section>
</footer>


<!--    <script type="text/javascript">window.$crisp=[];window.CRISP_WEBSITE_ID="642709d0-bdbb-4c92-be13-61d8b725d594";(function(){d=document;s=d.createElement("script");s.src="https://client.crisp.chat/l.js";s.async=1;d.getElementsByTagName("head")[0].appendChild(s);})();</script>-->
<!--     Hotjar Tracking Code for www.bccstyle.com-->
<script>
    $(".navbar .navbar-nav .nav-item .nav-link").hover(
        function () {
            $(this).addClass('active-hover');
        },
//   function () {
//     $(this).removeClass("active-hover");
//   }
    );
    $(".navbar .navbar-nav .nav-item .nav-link").mouseout(
        function () {
            $(this).removeClass('active-hover');
        },
//   function () {
//     $(this).removeClass("active-hover");
//   }
    );
    // fixed header
    $(document).on("scroll", function () {
        if ($(document).scrollTop() > 33) {
            $(".main-header").removeClass("large").addClass("small");
        } else {
            $(".main-header").removeClass("small").addClass("large");
        }
    });
    // Shop Box
    $('#cart').hover(function () {
        $(this).find('.header-index .drop-menu-box-shop').fadeIn()
    });

    $('#cart').mouseleave(function () {
        $(this).find('.header-index .dropdown-menu').fadeOut()
    });

    // $('.navbar .dropdown').hover(function() {
    //     $(this).find('.dropdown-menu').stop(true, true).delay(60).fadeIn(60);
    // }, function() {
    //     $(this).find('.dropdown-menu').stop(true, true).delay(100).fadeOut(100);

    // });

    // Shop Box
    $('#cart').hover(function () {
        $(this).find('.drop-menu-box-shop').fadeIn()
    });

    $('#cart').mouseleave(function () {
        $(this).find('.drop-menu-box-shop').fadeOut()
    });
    // Order Mp

    $(function () {
        $('.count-product').on('click', '.btn', function (e) {
            var input = $(this).parents('div.count-product').children('input');
            var value = parseInt(input.attr('value'));
            var min = parseInt(input.attr('min'));
            var max = parseInt(input.attr('max'));
            if ($(this).hasClass('up')) {
                var op = +1;
            } else {
                var op = -1;
            }
            if (!(min == value && op == -1) && !(max == value && op == +1)) {
                input.attr('value', value + op)
            }
        })
    });


    // Order Mp

    $('.item-order-map .tr').click(function () {
        $(this).parent().find('.drop-down').slideToggle();
        $(this).find('.td .btn i').toggleClass('d-none')
    });


    $('.porofile .navigation .nav-item').click(function () {
        $('.porofile .navigation .active').removeClass('active');
        $(this).addClass('active')
    });


    // Shop Box
    $('#cart').hover(function () {
        $(this).find('.drop-menu-box-shop').fadeIn()
    });

    $('#cart').mouseleave(function () {
        $(this).find('.drop-menu-box-shop').fadeOut()
    });
    // $('#click').click(function () {
    //     $('#qwe').show();
    //     $('#hide').hide();
    //     $('#click').hide();

    // });

</script>
<?php $this->endBody() ?>
</body>
</html>
<?php $this->endPage() ?>
