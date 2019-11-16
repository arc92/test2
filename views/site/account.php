<?php

/* @var $this yii\web\View */

$this->title = 'Account Edit';
?>
<article class="account">
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
        <div class="col-xl-9 col-lg-9 col-md-9 col-sm-8 col-12 ">
            <main class="account-edit">
                <article>
        <span class="title">
            اطلاعات شخصی
        </span>
                    <form action="#">
                        <div class="row-1 d-flex justify-content-between flex-wrap">
                            <div class="item">
                                <label for="name">نام</label><br>
                                <input type="text" name="" id="name" value="">
                            </div>
                            <div class="item">
                                <label for="last-name">نام خانوادگی</label><br>
                                <input type="text" name="" id="last-name" value="">
                            </div>
                            <div class="item">
                                <label for="email">پست الکترونیک</label><br>
                                <input type="email" name="" id="email" value="">
                            </div>
                        </div>
                        <div class="row-2 d-flex justify-content-between flex-wrap">
                            <div class="item">
                                <label for="phone">شماره تماس</label><br>
                                <input type="tel" name="" id="phone" value="">
                            </div>
                            <div class="item">
                                <label for="mobile">شماره همراه</label><br>
                                <input type="tel" name="" id="mobile" value="">
                            </div>
                            <div class="item">
                                <label for="img">تصویر آواتار</label><br>
                                <div class="border-img">
                                    <div class="upload-file">
                                        <input  type="file" class="file-upload" id="img" name="file" >
                                        <label class="lbl2" for="img">
                                            تصویر مورد نظر را انتخاب کنید ...
                                        </label>

                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row-3 d-flex justify-content-between flex-wrap">
                            <div class="data-item d-flex ">
                                <div class="item data">
                                    <label for="year">سال</label><br>
                                    <select class="js-example-basic-single" id="year" name="state" >
                                        <option value="">

                                        </option>
                                        <option value="97">
                                            1397
                                        </option>
                                        <option value="96">
                                            1396
                                        </option>
                                        <option value="95">
                                            1395
                                        </option>
                                    </select>
                                </div>
                                <div class="item data">
                                    <label for="mounth">ماه</label><br>
                                    <select class="js-example-basic-single" id="mounth" name="state" >
                                        <option value="far">

                                        </option>
                                        <option value="far">
                                            فروردین
                                        </option>
                                        <option value="or">
                                            اردیبهشت
                                        </option>
                                        <option value="kho">
                                            خرداد
                                        </option>
                                    </select>

                                </div>
                                <div class="item data">
                                    <label for="days" >روز</label><br>
                                    <select class="js-example-basic-single" id="days" name="state" >
                                        <option value="">

                                        </option>
                                        <option value="1">
                                            1
                                        </option>
                                        <option value="2">
                                            2
                                        </option>
                                        <option value="3">
                                            3
                                        </option>
                                        <option value="1">
                                            4
                                        </option>
                                        <option value="2">
                                            5
                                        </option>
                                        <option value="3">
                                            6
                                        </option>
                                    </select>
                                </div>
                            </div>
                            <div class="password-item d-flex">
                                <div class="item pass">
                                    <label for="pass">رمز عبور جدید </label><br>
                                    <input type="password" class="password" name="" id="pass" value="">
                                </div>
                                <div class="item pass">
                                    <label for="repeat">تکرار رمز عبور جدید</label><br>
                                    <input type="password" class="password " name="" id="repeat" value="">
                                </div>
                            </div>
                        </div>
                        <input type="submit" class="btn change" value="ثبت تغییرات">
                    </form>
                </article>
            </main>
        </div>
    </div>
</article>