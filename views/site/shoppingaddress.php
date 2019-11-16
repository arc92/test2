<?php

/* @var $this yii\web\View */

$this->title = 'Shoping Address';
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
                    <!--personal-->
                    <div class="title-dashboard">
                        <div class="col-xl-12">
                    <span class="title">
                          آدرس های حمل و نقل
                    </span>
                        </div>
                    </div>
                    <form action="">
                        <div class="detail-dashboard d-flex flex-wrap">
                            <div class="address d-flex justify-content-between align-items-center">
                                <input type="radio" name="address" value="address-1" id="address-1" checked>
                                <label for="address-1">
                                    تهران , چهار راه یافت آباد , بلوار معلم , خیابان شهید رجایی , کوچه آلاله سوم , پلاک 8 , طبقه 4
                                </label>
                                <div class="d-flex justify-content-end">
                                    <button class="btn btn-icon">
                                        <i class="icon-pencell"></i>
                                    </button>
                                    <button class="btn btn-icon">
                                        <i class="icon-dump"></i>
                                    </button>
                                </div>
                            </div>
                            <div class="address d-flex justify-content-between align-items-center">
                                <input type="radio" name="address" value="address-1" id="address-2">
                                <label for="address-2">
                                    تهران , میدان هفت تیر , خیابان بهار شیراز , پلاک 144 ,واحد 7
                                </label>
                                <div class="d-flex justify-content-end">
                                    <button class="btn btn-icon">
                                        <i class="icon-pencell"></i>
                                    </button>
                                    <button class="btn btn-icon">
                                        <i class="icon-dump"></i>
                                    </button>
                                </div>
                            </div>
                            <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
                                <div class="input-item">
                                    <label for="address">
                                        اضافه کردن مسیر جدید
                                    </label>
                                    <input type="text" id="address">
                                </div>
                            </div>
                            <div class="col-xl-4 col-lg-4 col-md-4 col-sm-12 col-12">
                                <div class="input-item">
                                    <label for="name-post">
                                        کد پستی شما
                                    </label>
                                    <input type="text" id="name-post">
                                </div>
                            </div>
                            <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12 d-flex justify-content-start">
                                <button class="btn btn-submit btn-pink mr-0">
                                    ثبت تغییرات
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </main>
        </div>
    </div>
</article>