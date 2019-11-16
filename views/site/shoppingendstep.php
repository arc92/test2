<?php

/* @var $this yii\web\View */

$this->title = 'Shopping End Step';
?>
<main class="shopping-end-step">
    <div class="container p-0 d-flex flex-wrap justify-content-between">
        <section class="information-recipient col-lg-6 col-sm-12 col-12 p-0">
            <span class="title">
            اطلاعات گیرنده
             </span>
            <label class="self">
                <input type="checkbox" checked="checked">
                <span class="checkmark"></span>
                دریافت کننده این محصول خودم هستم
            </label>
            <form action="#" class="d-flex justify-content-between flex-wrap">
                <div class="item">
                    <label for="name">
                        نام
                    </label>
                    <input type="text" id="name" required>
                </div>
                <div class="item">
                    <label for="last-name">
                        نام و نام خانوادگی
                    </label>
                    <input type="text" id="last-name" required>
                </div>
                <div class="item">
                    <label for="country">
                        کشور
                    </label>
                    <input class="disabled" type="text" id="country" placeholder="جمهوری اسلامی ایران" readonly>
                </div>
                <div class="item">
                    <label for="city">
                        استان  /  شهر
                    </label>
                    <select class="js-example-basic-single" id="city" name="state">
                        <option>تست</option>
                        <option>تست</option>
                        <option>تست</option>
                    </select>
                </div>
                <div class="item address-item">
                    <label for="address">
                        نشانی گیرنده محصول
                    </label>
                    <input class="address" type="text" id="address" required>
                </div>
                <div class="item">
                    <label for="tel">
                        شماره تماس
                    </label>
                    <input type="tel" id="tel" required>
                </div>
                <div class="item">
                    <label for="phone">
                        شماره همراه
                    </label>
                    <input type="tel" id="phone" required>
                </div>
                <label for="time" class="label-table">
                    تاریخ ارسال  /  شهر تهران
                </label>
                <table>

                    <tr>
                        <td id="time" class="disabled">
                            دوشنبه (26/08/1397)
                        </td>
                        <td>
                            <input type="radio" class="day" name="day" value="day" id="day1"  disabled>
                            <label for="day1" class="disabled">
                                ساعت 9 - 15
                            </label>

                        </td>
                        <td>
                            <input type="radio" class="day" name="day" value="day" id="day2"  disabled>
                            <label for="day2" class="disabled" >
                                ساعت 9 - 15
                            </label>
                        </td>
                    </tr>
                    <tr>
                        <td>
                            دوشنبه (26/08/1397)
                        </td>
                        <td>
                            <input type="radio" class="day" name="day" value="day" id="day3" checked>
                            <label for="day3" >
                                ساعت 9 - 15
                            </label>
                        </td>
                        <td>
                            <input type="radio" class="day" name="day" value="day" id="day4" >
                            <label for="day4">
                                ساعت 9 - 15
                            </label>
                        </td>
                    </tr>
                    <tr>
                        <td>
                            دوشنبه (26/08/1397)
                        </td>
                        <td>
                            <input type="radio" class="day" name="day" value="day" id="day5" >
                            <label for="day5">
                                ساعت 9 - 15
                            </label>
                        </td>
                        <td>
                            <input type="radio" class="day" name="day" value="day" id="day6" >
                            <label for="day6">
                                ساعت 9 - 15
                            </label>
                        </td>
                    </tr>

                </table>
                <div class="item">
                    <label for="comment">
                        اگر پیشنهاد و انتقادی دارید یادداشت کنید ...
                    </label><br>
                    <textarea type="text" id="comment" ></textarea>
                </div>
                <div class="item">
                    <label class="new">
                        <input type="checkbox"  class="self" name="new" value="new" id="new" checked="checked">
                        <span class="checkmark2"></span>
                        آیا میخواهید اکانت کاربری جدید بسازید ؟
                    </label>
                </div>
            </form>
        </section>
        <section class="information-product col-lg-6 col-sm-12 col-12 p-0">
            <div class="slider">
                <div class="sync3">
                    <div id="sync3" class="owl-carousel owl-theme">
                        <div class="item">
                            <img class="magniflier" src="assets/img/product/product-1.png" alt="">
                        </div>
                        <div class="item">
                            <img class="magniflier" src="assets/img/product/product-2.png" alt="">
                        </div>
                        <div class="item">
                            <img class="magniflier" src="assets/img/product/product-3.png" alt="">
                        </div>
                    </div>
                    <div class="nav" id="nav-detail-product">

                    </div>
                </div>
                <div class="sync4">
                    <div id="sync4" class="owl-carousel owl-theme">
                        <div class="item">
                            <img src="assets/img/product/product-1.png" alt="">
                        </div>
                        <div class="item">
                            <img src="assets/img/product/product-2.png" alt="">
                        </div>
                        <div class="item">
                            <img src="assets/img/product/product-3.png" alt="">
                        </div>
                    </div>
                </div>
            </div>
            <div class="details-order">
                <span class="title">
                    جزئیات سفارش شما
                </span>

                <table>
                    <tr>
                        <td  class="name-header">
                            نام محصول
                        </td>
                        <td class="number-header">
                            تعداد

                        </td>
                        <td class="price-header">
                            مبلغ
                        </td>
                    </tr>
                    <tr>
                        <td  class="name">
                            سرهمی شورتی طرح فاکس
                        </td>
                        <td class="number">
                            2

                        </td>
                        <td class="price">
                            260,000 تومان
                        </td>
                    </tr>
                    <tr>
                        <td class="name">
                            سرهمی شورتی طرح فاکس
                        </td>
                        <td class="number">
                            3
                        </td>
                        <td class="price">
                            360,000 تومان
                        </td>
                    </tr>
                    <tr>
                        <td class="name">
                            سرهمی شورتی طرح فاکس
                        </td>
                        <td class="number">
                            4
                        </td>
                        <td class="price">
                            390,000 تومان
                        </td>
                    </tr>

                </table>
                <form action="#" class="off">
                    <div class="item item-off">
                        <label for="off">
                            اعمال کد تخفیف
                        </label>
                        <span class="d-flex">

                        <input type="text" id="off">
                        <button class="btn">
                            <i class="icon-add"></i>
                        </button>
                        </span>
                    </div>
                    <div class="item item-member">
                        <label for="member" class="member">
                            اعمال کد اعضای باشگاه مشتریان
                        </label>
                        <div class="d-flex">
                            <input class="member" type="text" id="member">
                            <button class="btn member">
                                <i class="icon-add"></i>
                            </button>
                        </div>
                    </div>
                </form>
                <div class="factor ">
                      <span class="title">
                        فاکتور نهایی
                    </span>
                    <div class="d-flex justify-content-between">
                        <span class="total-product">
                        مجموع محصولات
                    </span>
                        <span class="number">
                        5 عدد
                    </span>
                        <span class="price">
                        347,000 تومان
                    </span>
                    </div>
                </div>
                <div class="bank">
                    <span class="title">
                        اتصال به درگاه بانک
                    </span>
                    <form action="#" class="banks-logos d-flex align-items-center justify-content-between">
                        <div class="logos">
                            <input class="bank-logo active" type="image" src="assets/img/bank/pasargad.png">
                            <input class="bank-logo" type="image" src="assets/img/bank/mellat.jpg">
                            <input class="bank-logo" type="image" src="assets/img/bank/saman.jpg">
                        </div>
                        <button type="submit" class="btn payment">
                            پرداخت نهایی
                        </button>
                    </form>
                </div>
            </div>
        </section>
    </div>
</main>