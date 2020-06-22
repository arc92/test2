$(document).ready(function () {
    $('.details-fvrt').hide();
    $('.item-favourite .detail #item1').on('click', function () {
        $(this)
        $('.details-fvrt').slideDown(200)
    });
});
$(document).ready(function () {
    $('#clickqwe').click(function () {
        $('#ewq').show();
        $('#rew').hide();
        $('#clickqwe').hide();
    });
});
$(document).ready(function () {
    var closebox = $('.close-box');
    var btn = $('.btn-filter-')
    closebox.hide();
    btn.on('click', function () {
        $('.header-list-grid ').slideDown(100);
        closebox.show();
    });
    closebox.on('click', function () {
        $('.header-list-grid ').slideUp(100);
        closebox.hide();
    });
})
$(document).ready(function () {
    var closeboxx = $('.cat-close');
    var btnn = $('.filter-category')
    closeboxx.hide();
    btnn.on('click', function () {
        $('.side-help-single').slideDown(100);
        closeboxx.show();
    });
    closeboxx.on('click', function () {
        $('.side-help-single').slideUp(100);
        closeboxx.hide();
    });
})
$(document).ready(function () {
    ConvertNumberToPersion();
});

function ConvertNumberToPersion() {
    persian = {0: '۰', 1: '۱', 2: '۲', 3: '۳', 4: '۴', 5: '۵', 6: '۶', 7: '۷', 8: '۸', 9: '۹'};

    function traverse(el) {
        if (el.nodeType == 3) {
            var list = el.data.match(/[0-9]/g);
            if (list != null && list.length != 0) {
                for (var i = 0; i < list.length; i++)
                    el.data = el.data.replace(list[i], persian[list[i]]);
            }
        }
        for (var i = 0; i < el.childNodes.length; i++) {
            traverse(el.childNodes[i]);
        }
    }

    traverse(document.body);
};$('#slider').owlCarousel({
    loop: true,
    margin: 0,
    rtl: true,
    // nav: true,
    dots: true,
    dots: true,
    // navContainer: '#nav',
    dotsContainer: '#dot',
    autoplay: true,
    autoplayTimeout: 4000,
    autoplayHoverPause: false,
    // navText: ['<i class="icon-005-right-chevron"></i>', '<i class="icon-006-left-chevron"></i>'],
    responsive: {0: {items: 1}, 600: {items: 1}, 1000: {items: 1}}
});
$('#history').owlCarousel({
    loop: false,
    margin: 0,
    rtl: true,
    nav: true,
    autoplay: true,
    autoplayTimeout: 3000,
    autoplayHoverPause: true,
    dotsContainer: '#slider-dot2',
    navContainer: '#nav-history',
    navText: ['<i class="icon-005-right-chevron"></i>', '<i class="icon-006-left-chevron"></i>'],
    responsive: {0: {items: 1}, 600: {items: 1}, 1000: {items: 1}}
});
$('#category-1').owlCarousel({
    loop: true,
    margin: 30,
    rtl: true,
    nav: true,
    dots: false,
    autoplay: true,
    autoplayTimeout: 2100,
    autoplayHoverPause: false,
    navContainer: '#nav2',
    navText: ['<i class="icon-005-right-chevron"></i>', '<i class="icon-006-left-chevron"></i>'],
    responsive: {0: {items: 1}, 600: {items: 2}, 1000: {items: 5}}
});
$('#sider-news').owlCarousel({
    loop: false,
    margin: 0,
    rtl: true,
    nav: true,
    autoplay: false,
    autoplayTimeout: 3000,
    autoplayHoverPause: true,
    dots: false,
    navContainer: '#nav-news',
    navText: ['<i class="icon-005-right-chevron"></i>', '<i class="icon-006-left-chevron"></i>'],
    responsive: {0: {items: 1}, 600: {items: 1}, 1000: {items: 2}}
});
$('#sider-blog').owlCarousel({
    loop: true,
    margin: 0,
    rtl: true,
    nav: true,
    autoplay: true,
    autoplayTimeout: 2100,
    autoplayHoverPause: true,
    dots: false,
    navContainer: '#nav-blog',
    navText: ['<i class="icon-005-right-chevron"></i>', '<i class="icon-006-left-chevron"></i>'],
    responsive: {0: {items: 1}, 600: {items: 1}, 1000: {items: 1}}
});
$('#sider-news').owlCarousel({
    loop: false,
    margin: 0,
    rtl: true,
    nav: true,
    autoplay: false,
    autoplayTimeout: 3000,
    autoplayHoverPause: true,
    dots: false,
    navContainer: '#nav-news',
    navText: ['<i class="icon-005-right-chevron"></i>', '<i class="icon-006-left-chevron"></i>'],
    responsive: {0: {items: 1}, 600: {items: 1}, 1000: {items: 2}}
});
$('#cart').hover(function () {
    $(this).find('.drop-menu-box-shop').fadeIn()
});
$('#cart').mouseleave(function () {
    $(this).find('.drop-menu-box-shop').fadeOut()
});
$(document).ready(function () {
    $('.js-example-basic-single').select2();
});
$('.porofile .navigation .nav-item').click(function () {
    $('.porofile .navigation .active').removeClass('active');
    $(this).addClass('active')
});
$(document).on("scroll", function () {
    if ($(document).scrollTop() > 33) {
        $(".main-header").removeClass("large").addClass("small");
    } else {
        $(".main-header").removeClass("small").addClass("large");
    }
});
$('.bottom-details .header-text .nav-item').click(function () {
    $('.bottom-details .header-text .active').removeClass('active');
    $(this).addClass('active')
});
$('.liked').click(function () {
    $(this).toggleClass('active')
});
$(document).ready(function () {
    var sync1 = $("#sync1");
    var sync2 = $("#sync2");
    var slidesPerPage = 4;
    var syncedSecondary = true;
    sync1.owlCarousel({
        items: 1,
        slideSpeed: 2000,
        nav: true,
        dots: false,
        loop: true,
        rtl: true,
        responsiveRefreshRate: 200,
        navContainer: '#nav-detail-product',
        navText: ['<i class="icon-006-left-chevron"></i>', '<i class="icon-005-right-chevron"></i>']
    }).on('changed.owl.carousel', syncPosition);
    sync2.on('initialized.owl.carousel', function () {
        sync2.find(".owl-item").eq(0).addClass("current");
    }).owlCarousel({
        items: slidesPerPage,
        dots: false,
        nav: false,
        smartSpeed: 200,
        slideSpeed: 500,
        rtl: true,
        slideBy: slidesPerPage,
        responsiveRefreshRate: 100
    }).on('changed.owl.carousel', syncPosition2);

    function syncPosition(el) {
        var count = el.item.count - 1;
        var current = Math.round(el.item.index - (el.item.count / 2) - .5);
        if (current < 0) {
            current = count;
        }
        if (current > count) {
            current = 0;
        }
        sync2.find(".owl-item").removeClass("current").eq(current).addClass("current");
        var onscreen = sync2.find('.owl-item.active').length - 1;
        var start = sync2.find('.owl-item.active').first().index();
        var end = sync2.find('.owl-item.active').last().index();
        if (current > end) {
            sync2.data('owl.carousel').to(current, 100, true);
        }
        if (current < start) {
            sync2.data('owl.carousel').to(current - onscreen, 100, true);
        }
    }

    function syncPosition2(el) {
        if (syncedSecondary) {
            var number = el.item.index;
            sync1.data('owl.carousel').to(number, 100, true);
        }
    }

    sync2.on("click", ".owl-item", function (e) {
        e.preventDefault();
        var number = $(this).index();
        sync1.data('owl.carousel').to(number, 300, true);
    });
});
$(document).ready(function () {
    var sync3 = $("#sync3");
    var sync4 = $("#sync4");
    var slidesPerPage = 4;
    var syncedSecondary = true;
    sync3.owlCarousel({
        items: 1,
        slideSpeed: 2000,
        margin: 5,
        nav: true,
        dots: false,
        loop: true,
        rtl: true,
        responsiveRefreshRate: 200,
        navContainer: '#nav-detail-product',
        navText: ['<i class="icon-004-left-chevron"></i>', '<i class="icon-004-left-chevron"></i>']
    }).on('changed.owl.carousel', syncPosition);
    sync4.on('initialized.owl.carousel', function () {
        sync4.find(".owl-item").eq(0).addClass("current");
    }).owlCarousel({
        items: slidesPerPage,
        dots: false,
        nav: false,
        smartSpeed: 200,
        slideSpeed: 500,
        rtl: true,
        slideBy: slidesPerPage,
        responsiveRefreshRate: 100
    }).on('changed.owl.carousel', syncPosition2);

    function syncPosition(el) {
        var count = el.item.count - 1;
        var current = Math.round(el.item.index - (el.item.count / 2) - .5);
        if (current < 0) {
            current = count;
        }
        if (current > count) {
            current = 0;
        }
        sync4.find(".owl-item").removeClass("current").eq(current).addClass("current");
        var onscreen = sync4.find('.owl-item.active').length - 1;
        var start = sync4.find('.owl-item.active').first().index();
        var end = sync4.find('.owl-item.active').last().index();
        if (current > end) {
            sync4.data('owl.carousel').to(current, 100, true);
        }
        if (current < start) {
            sync4.data('owl.carousel').to(current - onscreen, 100, true);
        }
    }

    function syncPosition2(el) {
        if (syncedSecondary) {
            var number = el.item.index;
            sync3.data('owl.carousel').to(number, 100, true);
        }
    }

    sync4.on("click", ".owl-item", function (e) {
        e.preventDefault();
        var number = $(this).index();
        sync3.data('owl.carousel').to(number, 300, true);
    });
});
$(function () {
    var native_width = 0;
    var native_height = 0;
    var mouse = {x: 0, y: 0};
    var magnify;
    var cur_img;
    var ui = {magniflier: $('.magniflier')};
    if (ui.magniflier.length) {
        var div = document.createElement('div');
        div.setAttribute('class', 'glass');
        ui.glass = $(div);
        $('body').append(div);
    }
    var mouseMove = function (e) {
        var $el = $(this);
        var magnify_offset = cur_img.offset();
        mouse.x = e.pageX - magnify_offset.left;
        mouse.y = e.pageY - magnify_offset.top;
        if (mouse.x < cur_img.width() && mouse.y < cur_img.height() && mouse.x > 0 && mouse.y > 0) {
            magnify(e);
        } else {
            ui.glass.fadeOut(100);
        }
        return;
    };
    var magnify = function (e) {
        var rx = Math.round(mouse.x / cur_img.width() * native_width - ui.glass.width() / 2) * -1;
        var ry = Math.round(mouse.y / cur_img.height() * native_height - ui.glass.height() / 2) * -1;
        var bg_pos = rx + "px " + ry + "px";
        var glass_left = e.pageX - ui.glass.width() / 2;
        var glass_top = e.pageY - ui.glass.height() / 2;
        ui.glass.css({left: glass_left, top: glass_top, backgroundPosition: bg_pos});
        return;
    };
    $('.magniflier').on('mousemove', function () {
        ui.glass.fadeIn(200);
        cur_img = $(this);
        var large_img_loaded = cur_img.data('large-img-loaded');
        var src = cur_img.data('large') || cur_img.attr('src');
        if (src) {
            ui.glass.css({'background-image': 'url(' + src + ')', 'background-repeat': 'no-repeat'});
        }
        if (!cur_img.data('native_width')) {
            var image_object = new Image();
            image_object.onload = function () {
                native_width = image_object.width;
                native_height = image_object.height;
                cur_img.data('native_width', native_width);
                cur_img.data('native_height', native_height);
                mouseMove.apply(this, arguments);
                ui.glass.on('mousemove', mouseMove);
            };
            image_object.src = src;
            return;
        } else {
            native_width = cur_img.data('native_width');
            native_height = cur_img.data('native_height');
        }
        mouseMove.apply(this, arguments);
        ui.glass.on('mousemove', mouseMove);
    });
});
$('.nav .nav-item').click(function () {
    $('.nav').find('.active').removeClass('active');
    $(this).addClass('active')
});
$(document).ready(function () {
    $(".navbar-toggler").click(function () {
        $(".res").toggle();
    });
});
$(document).ready(function () {
    $(".category-button").click(function () {
        var filterValue = $(this).attr('data-filter');
        $(".filter-sec").not('.' + filterValue).hide();
        $(".filter-sec").filter('.' + filterValue).show();
    });
});
$('.dropdown').hover(function () {
    $(this).find('.dropdown-menu').stop(true, true).delay(50).show();
}, function () {
    $(this).find('.dropdown-menu').stop(true, true).delay(50).hide();
});
$(document).ready(function () {
    $('#product-name').focus();
    $('#product-name').keyup(function (e) {

        if ((this.value.length) > 1) {
            var settings = {
                "url": "/api/search/?search=" + this.value,
                "method": "GET",
                "timeout": 0,
            };


            $.ajax(settings).done(function (response,) {
                var out = '';


                if (response['data']['products'].length === 0 && response['data']['categories'].length === 0) {

                    out += "<li>\n" +
                        "<div class='item'>\n" +
                        "<span style='padding: 5px'>موردی یافت نشد</span>" +
                        "</div>\n" +
                        "</li>";
                }
                //category like بادی و دستکش
                $.each(response['data']['categories'], function (key, value) {
                    var categoryTitle = value['category_name'];
                    var categoryUrl = "/search/searchincategory?search_keyword=" + response['searchedKeyword'] + "&category_name=" + value['category_name'];

                    out +=
                    "<li>" +
                        "<div class='item'>" +
                            "<div class='product-item-image'>" +
                                "<img src='/uploads/icon21561444275.png'>" +
                            "</div>" +
                            "<div class='product-item-details' style='max-width: 300px;'>" +
                                    "<span id='title' style='float: right;width: 100%;'>" +
                                        "<a href='" + categoryUrl + "'>" +
                                            "<span style='color: black'> جستجوی </span>" +
                                                response['searchedKeyword'] +
                                            "<span style='color: black'> در دسته بندی </span>" +
                                            categoryTitle +
                                        "</a>"+
                                    "</span>" +
                            "</div>" +
                        "</div>" +
                    "</li>" +
                    "<hr>"
                });

                //products
                $.each(response['data']['products'], function (key, value) {
                    var productTitle = value['_source']['product_name'];
                    var productUrl = '/product/' + value['_source']['product_name'] + '/';
                    var categoryTitle = value['_source']['cat_products'][0]['name'];
                    var categoryUrl = '/baby-clothing/' + value['_source']['cat_products'][0]['urltitle'] + '/';
                    var productImage = '/' + value['_source']['product_images'][0]['url'];
                    out +=

                        "<li>\n" +
                            "<div class='item'>\n" +
                                "<div class='product-item-image'>" +
                                    "<img src='" + productImage + "'> " +
                                "</div>\n" +
                            "<div class='product-item-details'>\n" +
                                "<span id='title' style='float: right;width: 100%;'>" +
                                    "<a href='" + productUrl + "'>" + productTitle + "</a>" +
                                "</span>\n" +
                                "<span class='product-item-category'>" +
                                    "<label>دسته بندی:</lable>" +
                                    " <a href='" + categoryUrl + "'>" + categoryTitle + "</a>" +
                                "</span>\n" +
                                "</div>\n" +
                            "</div>\n" +
                        "</li>" +
                        "<hr>"

                });

                $('#search_result').fadeIn();
                $("#result").html(out);
                $("#close").fadeIn();
            });
        } else {
            $('#search_result').fadeOut();
            $("#close").fadeOut();
        }
    });
});

$(document).click(function (e) {
    if (!$(e.target).closest('#search_result').length) {
        $('#search_result').fadeOut(1000);
    }
});

$('#close').click(function (e) {
    $("#close").fadeOut();
    $('#search_result').fadeOut();
    $('#product-name').val('');
});

$('#close').click(function (e) {
    $("#close").fadeOut();
    $('#search_result').fadeOut();
    $('#product-name').val('');
});


//
// out += '</table>';
//
// //append out to your div
