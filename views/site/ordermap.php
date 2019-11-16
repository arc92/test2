<?php

/* @var $this yii\web\View */

$this->title = 'Order Map';
?>
<article class="contact-setting">
    <div class="container p-0 d-flex flex-wrap justify-content-between">
        <div class="col-xl-3 col-lg-3 col-md-3 col-sm-4 col-12 p-0 m-0">
            <aside class="porofile">
                <article>
                    <section class="img-account">
                        <img src="assets/img/pc-profile.png" alt="">
                    </section>
                    <section class="name-item">
                        <h6 class="name">
                            علیرضـا  درخشـان
                        </h6>
                        <span class="degree">
                    کاربر طلایی بی سی سی
                </span>
                    </section>
                    <ul class="navigation">
                        <li class="nav-item active">
                            <a href="#" class="nav-link">
                                <i class="icon-settings-work-tool"></i>
                                تنظیمات اکانت
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="#" class="nav-link">
                                <i class="icon-085-placeholder-1"></i>
                                آدرس حمل و نقل
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="#" class="nav-link">
                                <i class="icon-020-box-1"></i>
                                خرید های قبلی
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="#" class="nav-link">
                                <i class="icon-organization"></i>
                                پیگیری سفارشات
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="#" class="nav-link">
                                <i class="icon-008-medal"></i>
                                باشگاه مشتریان ما
                                <i class="icon-041-star"></i>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="#" class="nav-link">
                                <i class="icon-029-calendar"></i>
                                ثبت رویدادها
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="#" class="nav-link">
                                <i class="icon-chat" ></i>
                                انتقاد و پیشنهاد
                            </a>
                        </li>
                        <li class="nav-item log-out">
                            <a href="#" class="nav-link">
                                <i class="icon-power-button-off"></i>
                                خروج
                            </a>
                        </li>
                    </ul>
                </article>
            </aside>
        </div>
        <div class="col-xl-9 col-lg-9 col-md-9 col-sm-8 col-12 p-0">
            <main class="main d-flex flex-wrap">
                <div class="dashboard">
                    <form action="">
                        <div class="title-dashboard">
                            <div class="col-xl-12">
                    <span class="title">
                          پیگیری سفارشات
                    </span>
                            </div>
                        </div>
                        <div class="detail-dashboard d-flex flex-wrap">
                            <div class="col-xl-9 col-lg-9 col-md-8 col-sm-12 col-12">
                                <div class="input-item">
                                    <label for="name">
                                        کد پیگیری
                                    </label>
                                    <input type="text" id="name">
                                </div>
                            </div>
                            <div class="col-xl-3 col-lg-3 col-md-4 col-sm-4 col-12 d-flex justify-content-end align-items-end">
                                <button class="btn btn-submit btn-search w-100 btn-pink">
                                    جستجو کن
                                </button>
                            </div>
                            <div class="col-xl-12">
                                <div class="order-map" style="overflow-x: auto ; overflow-y: hidden">
                                    <div style="min-width: 700px">
                                        <div class="thead d-flex">
                                            <div class="th">
                                                شناسه سفارش
                                            </div>
                                            <div class="th">
                                                تاریخ ثبت
                                            </div>
                                            <div class="th">
                                                مبلغ کل
                                            </div>
                                            <div class="th">
                                                پرداخت
                                            </div>
                                            <div class="th text-center">
                                                مشاهده جزئیات
                                            </div>
                                            <div class="th text-center">
                                                وضعیت
                                            </div>
                                        </div>
                                        <div class="tbody">
                                            <div class="item item-order-map">
                                                <div class="tr d-flex">
                                                    <div class="td">
                                                        261892
                                                    </div>
                                                    <div class="td">
                                                        29 شهریورماه 1397
                                                    </div>
                                                    <div class="td">
                                                        380,000 تومان
                                                    </div>
                                                    <div class="td">
                                                        انجام شده است
                                                    </div>
                                                    <div class="td text-center">
                                                <span class="btn btn-icon">
                                                    <i class="icon-004-down-chevron"></i>
                                                    <i class="icon-007-up-chevron d-none"></i>
                                                </span>
                                                    </div>
                                                    <div class="td text-center">
                                        <span class="status green-status">
                                          موجود
                                        </span>
                                                    </div>
                                                </div>
                                                <div class="drop-down">
                                                    <div class="top-drop-down d-flex justify-content-between align-items-center">
                                                        <div class="right d-flex align-items-center">
                                                            <div class="image">
                                                                <img src="" alt="">
                                                            </div>
                                                            <div class="detail">
                                                                <h3 class="title">
                                                                    پیراهن ورزشی باشگاه بارسلونا
                                                                </h3>
                                                                <h4 class="subtitle">
                                                                    طرح رویه لیونل مسی
                                                                </h4>
                                                                <div class="count-product count">
                                                                    <button class="btn btn-minus down">
                                                                        <i class="icon-006-left-chevron"></i>
                                                                    </button>
                                                                    <input type="number" class="count" min="0" max="12" value="0"  title=""/>
                                                                    <button class="btn btn-plus up">
                                                                        <i class="icon-005-right-chevron"></i>
                                                                    </button>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="left d-flex">
                                                            <div>
                                                    <span class="discount">
27 درصد تخفیف
                                                    </span>
                                                                <del>
                                                                    840,000 تومان
                                                                </del>
                                                                <span class="price">
720,000 تومان
                                                    </span>
                                                            </div>
                                                            <div style="margin-right: 30px">
                                                    <span class="price-item">
720,000 تومان
                                                    </span>
                                                                <button class="btn btn-submit">
                                                                    بررسی سفارش
                                                                </button>


                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="middle-drop-down">
                                                        <ul class="nav">
                                                            <li class="nav-item">
                                                        <span class="t">
نام و نام خانوادگی
                                                        </span>
                                                                <span class="d">
علیرضا درخشان
                                                        </span>
                                                            </li>
                                                            <li>
                                                                /
                                                            </li>
                                                            <li class="nav-item">
                                                        <span class="t">
 استان , شهر
                                                        </span>
                                                                <span class="d">
تهران , شهر ری
                                                        </span>
                                                            </li>
                                                            <li>
                                                                /
                                                            </li>
                                                            <li class="nav-item">
                                                        <span class="t">
 شماره تماس
                                                        </span>
                                                                <span class="d">
09120583898
                                                        </span>
                                                            </li>
                                                            <li class="nav-item w-100">
                                                        <span class="t">
 نشانی
                                                        </span>
                                                                <span class="d">
 ایران , تهران , شهر ری ,اتوبان آهنگ , بلوار شهید رجایی , خیابان شبنم , کوچه شقایق یکم , پلاک 9 , واحد 20
                                                        </span>
                                                            </li>
                                                        </ul>
                                                        <ul class="nav">
                                                            <li class="nav-item w-100">
                                                        <span class="t pink">
 پرداخت از طریق کارت به کارت
                                                        </span>
                                                                <span class="d">
  5022291064045389 بانک پاسارگاد به نام علیرضا درخشان
                                                        </span>
                                                            </li>
                                                        </ul>
                                                    </div>
                                                    <div class="drop-down-bottom">
                                                        <section class="order-status">
                                                            <ul class="nav status-items">
                                                                <li class="nav-item">
                                                                    <div class="icon">
                                                                        <i class="icon-040-round-information-button"></i>
                                                                    </div>
                                                                    <span class="title">
                            در حال بررسی
                        </span>
                                                                </li>
                                                                <li class="nav-item">
                                                                    <div class="icon">
                                                                        <i class="icon-023-tick"></i>
                                                                    </div>
                                                                    <span class="title">
                            تائید سفارش
                        </span>
                                                                </li>
                                                                <li class="nav-item active-item">
                                                                    <div class="icon">
                                                                        <i class="icon-027-telegram"></i>
                                                                    </div>
                                                                    <span class="title">
                            ارسال شده
                        </span>
                                                                </li>
                                                                <li class="nav-item">
                                                                    <div class="icon">
                                                                        <i class="icon-020-box-1"></i>
                                                                    </div>
                                                                    <span class="title">
                            وضعیت نهایی
                        </span>
                                                                </li>
                                                            </ul>
                                                            <div class="detail-status d-flex ">
                                                                <div class="col-xl-6 col-lg-6 col-sm-6 col-12 d-flex flex-wrap">
                                                                    <p class="text">
                                                                        لورم ایپسوم متن ساختگی با تولید سادگی نامفهوم از صنعت چاپ و با استفاده از طراحان گرافیک است. چاپگرها و متون بلکه روزنامه و مجله در ستون و سطرآنچنان که لازم است و برای شرایط فعلی امفهوم از صنعت چاپ است . . .
                                                                    </p>
                                                                    <span class="status">
مرسوله ارسال شده است
                        </span>
                                                                </div>
                                                                <div class="col-xl-6 col-lg-6 col-sm-6 col-12">
                                                                    <div class="image">
                                                                        <div class="icon">
                                                                            <i style="background-image: url('assets/img/status-truck.png')"></i>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </section>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="item item-order-map">
                                                <div class="tr d-flex align-items-center">
                                                    <div class="td">
                                                        261892
                                                    </div>
                                                    <div class="td">
                                                        29 شهریورماه 1397
                                                    </div>
                                                    <div class="td">
                                                        380,000 تومان
                                                    </div>
                                                    <div class="td">
                                                        انجام شده است
                                                    </div>
                                                    <div class="td text-center">
                                                <span class="btn btn-icon">
                                                    <i class="icon-004-down-chevron"></i>
                                                    <i class="icon-007-up-chevron d-none"></i>
                                                </span>
                                                    </div>
                                                    <div class="td text-center">
                                        <span class="status yellow-status">
                                          بررسی
                                        </span>
                                                    </div>
                                                </div>
                                                <div class="drop-down">
                                                    <div class="top-drop-down d-flex justify-content-between align-items-center">
                                                        <div class="right d-flex align-items-center">
                                                            <div class="image">
                                                                <img src="" alt="">
                                                            </div>
                                                            <div class="detail">
                                                                <h3 class="title">
                                                                    پیراهن ورزشی باشگاه بارسلونا
                                                                </h3>
                                                                <h4 class="subtitle">
                                                                    طرح رویه لیونل مسی
                                                                </h4>
                                                                <div class="count-product count">
                                                                    <button class="btn btn-minus down">
                                                                        <i class="icon-006-left-chevron"></i>
                                                                    </button>
                                                                    <input type="number" class="count" min="0" max="12" value="0"  title=""/>
                                                                    <button class="btn btn-plus up">
                                                                        <i class="icon-005-right-chevron"></i>
                                                                    </button>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="left d-flex">
                                                            <div>
                                                    <span class="discount">
27 درصد تخفیف
                                                    </span>
                                                                <del>
                                                                    840,000 تومان
                                                                </del>
                                                                <span class="price">
720,000 تومان
                                                    </span>
                                                            </div>
                                                            <div style="margin-right: 30px">
                                                    <span class="price-item">
720,000 تومان
                                                    </span>
                                                                <button class="btn btn-submit">
                                                                    بررسی سفارش
                                                                </button>


                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="middle-drop-down">
                                                        <ul class="nav">
                                                            <li class="nav-item">
                                                        <span class="t">
نام و نام خانوادگی
                                                        </span>
                                                                <span class="d">
علیرضا درخشان
                                                        </span>
                                                            </li>
                                                            <li>
                                                                /
                                                            </li>
                                                            <li class="nav-item">
                                                        <span class="t">
 استان , شهر
                                                        </span>
                                                                <span class="d">
تهران , شهر ری
                                                        </span>
                                                            </li>
                                                            <li>
                                                                /
                                                            </li>
                                                            <li class="nav-item">
                                                        <span class="t">
 شماره تماس
                                                        </span>
                                                                <span class="d">
09120583898
                                                        </span>
                                                            </li>
                                                            <li class="nav-item w-100">
                                                        <span class="t">
 نشانی
                                                        </span>
                                                                <span class="d">
 ایران , تهران , شهر ری ,اتوبان آهنگ , بلوار شهید رجایی , خیابان شبنم , کوچه شقایق یکم , پلاک 9 , واحد 20
                                                        </span>
                                                            </li>
                                                        </ul>
                                                        <ul class="nav">
                                                            <li class="nav-item w-100">
                                                        <span class="t pink">
 پرداخت از طریق کارت به کارت
                                                        </span>
                                                                <span class="d">
  5022291064045389 بانک پاسارگاد به نام علیرضا درخشان
                                                        </span>
                                                            </li>
                                                        </ul>
                                                    </div>
                                                    <div class="drop-down-bottom">
                                                        <section class="order-status">
                                                            <ul class="nav status-items">
                                                                <li class="nav-item">
                                                                    <div class="icon">
                                                                        <i class="icon-040-round-information-button"></i>
                                                                    </div>
                                                                    <span class="title">
                            در حال بررسی
                        </span>
                                                                </li>
                                                                <li class="nav-item">
                                                                    <div class="icon">
                                                                        <i class="icon-023-tick"></i>
                                                                    </div>
                                                                    <span class="title">
                            تائید سفارش
                        </span>
                                                                </li>
                                                                <li class="nav-item active-item">
                                                                    <div class="icon">
                                                                        <i class="icon-027-telegram"></i>
                                                                    </div>
                                                                    <span class="title">
                            ارسال شده
                        </span>
                                                                </li>
                                                                <li class="nav-item">
                                                                    <div class="icon">
                                                                        <i class="icon-020-box-1"></i>
                                                                    </div>
                                                                    <span class="title">
                            وضعیت نهایی
                        </span>
                                                                </li>
                                                            </ul>
                                                            <div class="detail-status d-flex ">
                                                                <div class="col-xl-6 col-lg-6 col-sm-6 col-12 d-flex flex-wrap">
                                                                    <p class="text">
                                                                        لورم ایپسوم متن ساختگی با تولید سادگی نامفهوم از صنعت چاپ و با استفاده از طراحان گرافیک است. چاپگرها و متون بلکه روزنامه و مجله در ستون و سطرآنچنان که لازم است و برای شرایط فعلی امفهوم از صنعت چاپ است . . .
                                                                    </p>
                                                                    <span class="status">
مرسوله ارسال شده است
                        </span>
                                                                </div>
                                                                <div class="col-xl-6 col-lg-6 col-sm-6 col-12">
                                                                    <div class="image">
                                                                        <div class="icon">
                                                                            <i style="background-image: url('assets/img/status-truck.png')"></i>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </section>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="item item-order-map">
                                                <div class="tr d-flex align-items-center">
                                                    <div class="td">
                                                        261892
                                                    </div>
                                                    <div class="td">
                                                        29 شهریورماه 1397
                                                    </div>
                                                    <div class="td">
                                                        380,000 تومان
                                                    </div>
                                                    <div class="td">
                                                        انجام شده است
                                                    </div>
                                                    <div class="td text-center">
                                                <span class="btn btn-icon">
                                                    <i class="icon-004-down-chevron"></i>
                                                    <i class="icon-007-up-chevron d-none"></i>
                                                </span>
                                                    </div>
                                                    <div class="td text-center">
                                        <span class="status red-status">
                                          ناموجود
                                        </span>
                                                    </div>
                                                </div>
                                                <div class="drop-down">
                                                    <div class="top-drop-down d-flex justify-content-between align-items-center">
                                                        <div class="right d-flex align-items-center">
                                                            <div class="image">
                                                                <img src="" alt="">
                                                            </div>
                                                            <div class="detail">
                                                                <h3 class="title">
                                                                    پیراهن ورزشی باشگاه بارسلونا
                                                                </h3>
                                                                <h4 class="subtitle">
                                                                    طرح رویه لیونل مسی
                                                                </h4>
                                                                <div class="count-product count">
                                                                    <button class="btn btn-minus down">
                                                                        <i class="icon-006-left-chevron"></i>
                                                                    </button>
                                                                    <input type="number" class="count" min="0" max="12" value="0"  title=""/>
                                                                    <button class="btn btn-plus up">
                                                                        <i class="icon-005-right-chevron"></i>
                                                                    </button>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="left d-flex">
                                                            <div>
                                                    <span class="discount">
27 درصد تخفیف
                                                    </span>
                                                                <del>
                                                                    840,000 تومان
                                                                </del>
                                                                <span class="price">
720,000 تومان
                                                    </span>
                                                            </div>
                                                            <div style="margin-right: 30px">
                                                    <span class="price-item">
720,000 تومان
                                                    </span>
                                                                <button class="btn btn-submit">
                                                                    بررسی سفارش
                                                                </button>


                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="middle-drop-down">
                                                        <ul class="nav">
                                                            <li class="nav-item">
                                                        <span class="t">
نام و نام خانوادگی
                                                        </span>
                                                                <span class="d">
علیرضا درخشان
                                                        </span>
                                                            </li>
                                                            <li>
                                                                /
                                                            </li>
                                                            <li class="nav-item">
                                                        <span class="t">
 استان , شهر
                                                        </span>
                                                                <span class="d">
تهران , شهر ری
                                                        </span>
                                                            </li>
                                                            <li>
                                                                /
                                                            </li>
                                                            <li class="nav-item">
                                                        <span class="t">
 شماره تماس
                                                        </span>
                                                                <span class="d">
09120583898
                                                        </span>
                                                            </li>
                                                            <li class="nav-item w-100">
                                                        <span class="t">
 نشانی
                                                        </span>
                                                                <span class="d">
 ایران , تهران , شهر ری ,اتوبان آهنگ , بلوار شهید رجایی , خیابان شبنم , کوچه شقایق یکم , پلاک 9 , واحد 20
                                                        </span>
                                                            </li>
                                                        </ul>
                                                        <ul class="nav">
                                                            <li class="nav-item w-100">
                                                        <span class="t pink">
 پرداخت از طریق کارت به کارت
                                                        </span>
                                                                <span class="d">
  5022291064045389 بانک پاسارگاد به نام علیرضا درخشان
                                                        </span>
                                                            </li>
                                                        </ul>
                                                    </div>
                                                    <div class="drop-down-bottom">
                                                        <section class="order-status">
                                                            <ul class="nav status-items">
                                                                <li class="nav-item">
                                                                    <div class="icon">
                                                                        <i class="icon-040-round-information-button"></i>
                                                                    </div>
                                                                    <span class="title">
                            در حال بررسی
                        </span>
                                                                </li>
                                                                <li class="nav-item">
                                                                    <div class="icon">
                                                                        <i class="icon-023-tick"></i>
                                                                    </div>
                                                                    <span class="title">
                            تائید سفارش
                        </span>
                                                                </li>
                                                                <li class="nav-item active-item">
                                                                    <div class="icon">
                                                                        <i class="icon-027-telegram"></i>
                                                                    </div>
                                                                    <span class="title">
                            ارسال شده
                        </span>
                                                                </li>
                                                                <li class="nav-item">
                                                                    <div class="icon">
                                                                        <i class="icon-020-box-1"></i>
                                                                    </div>
                                                                    <span class="title">
                            وضعیت نهایی
                        </span>
                                                                </li>
                                                            </ul>
                                                            <div class="detail-status d-flex ">
                                                                <div class="col-xl-6 col-lg-6 col-sm-6 col-12 d-flex flex-wrap">
                                                                    <p class="text">
                                                                        لورم ایپسوم متن ساختگی با تولید سادگی نامفهوم از صنعت چاپ و با استفاده از طراحان گرافیک است. چاپگرها و متون بلکه روزنامه و مجله در ستون و سطرآنچنان که لازم است و برای شرایط فعلی امفهوم از صنعت چاپ است . . .
                                                                    </p>
                                                                    <span class="status">
مرسوله ارسال شده است
                        </span>
                                                                </div>
                                                                <div class="col-xl-6 col-lg-6 col-sm-6 col-12">
                                                                    <div class="image">
                                                                        <div class="icon">
                                                                            <i style="background-image: url('assets/img/status-truck.png')"></i>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </section>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <ul class="nav justify-content-end w-100">
                                <li class="nav-item">
                                    <a href="#" class="nav-link">
                                        3
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a href="#" class="nav-link">
                                        2
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a href="#" class="nav-link">
                                        1
                                    </a>
                                </li>
                            </ul>
                        </div>
                    </form>
                </div>
            </main>
        </div>
    </div>
</article>