<?php

/* @var $this yii\web\View */

$this->title = 'Shopping Cart';
?>
<main class="shopping-cart">
    <div class="container p-0 over-flow-responsive">
        <section class="name-bar">
         <span class="title img">
            عکس محصول
        </span>
            <span class="title">
            عنوان و ویژگی انتخاب شده
        </span>
            <span class="title number">
            انتخاب تعداد
        </span>
            <span class="title off">
            میزان تخفیف
        </span>
            <span class="title price">
            قیمت بعد از تخفیف
        </span>
            <span class="title delete">
            حذف از سبد
        </span>
        </section>
    </div>
    <section class="boxes">
        <div class="container p-0 over-flow-responsive">
            <div class="item ">
                <div class="img">
                    <img src="" alt="">
                </div>
                <div class="text-item">
                    <h3 class="title">
                        شلوار سرهمی پسرانه
                    </h3>
                    <h4 class="model">
                        مدل فرست فارنت
                    </h4>
                </div>
                <div class="number">
                    <form action="#">
                        <div class="count-product count">
                            <button class="btn btn-minus down">
                                <i class="icon-006-left-chevron"></i>
                            </button>
                            <input type="number" class="count" min="0" max="12" value="0"  title=""/>
                            <button class="btn btn-plus up">
                                <i class="icon-005-right-chevron"></i>
                            </button>

                        </div>
                    </form>
                </div>

                <span class="off">
                    %20
                </span>
                <span class="price">
                    720,000 تومان
                </span>
                <button class="btn deleted bg-transparent">
                    <i class="icon-dump"></i>
                </button>
            </div>
            <div class="item ">
                <div class="img">
                    <img src="" alt="">
                </div>
                <div class="text-item">
                    <h3 class="title">
                        شلوار سرهمی پسرانه
                    </h3>
                    <h4 class="model">
                        مدل فرست فارنت
                    </h4>
                </div>
                <div class="number">
                    <form action="#">
                        <div class="count-product count">
                            <button class="btn btn-minus down">
                                <i class="icon-006-left-chevron"></i>
                            </button>
                            <input type="number" class="count" min="0" max="12" value="0"  title=""/>
                            <button class="btn btn-plus up">
                                <i class="icon-005-right-chevron"></i>
                            </button>

                        </div>
                    </form>
                </div>

                <span class="off">
                    %20
                </span>
                <span class="price">
                    720,000 تومان
                </span>
                <button class="btn deleted bg-transparent">
                    <i class="icon-dump"></i>
                </button>
            </div>
            <div class="item ">
                <div class="img">
                    <img src="" alt="">
                </div>
                <div class="text-item">
                    <h3 class="title">
                        شلوار سرهمی پسرانه
                    </h3>
                    <h4 class="model">
                        مدل فرست فارنت
                    </h4>
                </div>
                <div class="number">
                    <form action="#">
                        <div class="count-product count">
                            <button class="btn btn-minus down">
                                <i class="icon-006-left-chevron"></i>
                            </button>
                            <input type="number" class="count" min="0" max="12" value="0"  title=""/>
                            <button class="btn btn-plus up">
                                <i class="icon-005-right-chevron"></i>
                            </button>

                        </div>
                    </form>
                </div>

                <span class="off">
                    %20
                </span>
                <span class="price">
                    720,000 تومان
                </span>
                <button class="btn deleted bg-transparent">
                    <i class="icon-dump"></i>
                </button>
            </div>
        </div>
    </section>
    <section class="btn-groups">
        <div class="container p-0 d-flex flex-wrap align-items-center justify-content-between">
            <a class="btn add" href="#">
              <span>
                  افزودن محصول دیگر
              </span>
            </a>
            <div class="two-btn d-flex flex-wrap align-items-center">
                <div class="total-price">
                <span class="title">
                قیمت کل محصولات
            </span>
                    <span class="price">
                    380,000 تومان
                </span>
                </div>
                <a class="btn next-step" href="#">
                 <span>
                      رفتن به مرحله نهایی
                 </span>
                </a>
            </div>
        </div>
    </section>
</main>