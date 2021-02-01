<?php

use app\models\Category;
use app\models\City;
use app\models\Color;
use app\models\Footer;
use app\models\Menu;
use app\models\Menu2;
use app\models\Province;
use app\models\Setting;
use app\models\Size;
use app\models\Subcat;
use Elasticsearch\ClientBuilder;

if(!function_exists('cacheCategoryList')){
    function cacheCategoryList(){

        if(!Yii::$app->cache->exists('cacheCategoryList')) {
            Yii::$app->cache->set('cacheCategoryList',Category::find()->all(),3600 * 24 * 7);
        }

        $category = Yii::$app->cache->get('cacheCategoryList');

        return $category;
    }
}

if(!function_exists('cacheSizeList')){
    function cacheSizeList(){

        if(!Yii::$app->cache->exists('cacheSizeList')) {
            Yii::$app->cache->set('cacheSizeList', Size::find()->all(),3600 * 24 * 7);
        }

        $category = Yii::$app->cache->get('cacheSizeList');

        return $category;
    }
}


if(!function_exists('cacheSubcatList')){
    function cacheSubcatList(){

        if(!Yii::$app->cache->exists('cacheSubcatList')) {
            Yii::$app->cache->set('cacheSubcatList', Subcat::find()->all(),3600 * 24 * 7);
        }

        $category = Yii::$app->cache->get('cacheSubcatList');

        return $category;
    }
}

if(!function_exists('cacheColorList')){
    function cacheColorList(){

        if(!Yii::$app->cache->exists('cacheColorList')) {
            Yii::$app->cache->set('cacheColorList', Color::find()->all(),3600 * 24 * 7);
        }

        $category = Yii::$app->cache->get('cacheColorList');

        return $category;
    }
}


if(!function_exists('cacheSlider')){
    function cacheSlider(){

        if(!Yii::$app->cache->exists('cacheSlider')) {
            Yii::$app->cache->set('cacheSlider', \app\models\Slider::find()->all() ,3600 * 24 * 7);
        }

        $category = Yii::$app->cache->get('cacheSlider');

        return $category;
    }
}

if(!function_exists('cacheFooter')){
    function cacheFooter(){

        if(!Yii::$app->cache->exists('cacheFooter')) {
            Yii::$app->cache->set('cacheFooter', Footer::find()->all() ,3600 * 24 * 7);
        }

        $category = Yii::$app->cache->get('cacheFooter');

        return $category;
    }
}

if(!function_exists('subMenu')){
    function subMenu(){

        if(!Yii::$app->cache->exists('subMenu')) {
            Yii::$app->cache->set('subMenu', Menu2::find()->where(['has_Submenu' => 0])->all() ,3600 * 24 * 7);
        }

        $category = Yii::$app->cache->get('subMenu');

        return $category;
    }
}
if(!function_exists('menu')){
    function menu(){

        if(!Yii::$app->cache->exists('menu')) {
            Yii::$app->cache->set('menu', Menu2::find()->all() ,3600 * 24 * 7);
        }

        $category = Yii::$app->cache->get('menu');

        return $category;
    }
}

if(!function_exists('cacheProvince')){
    function cacheProvince(){

        if(!Yii::$app->cache->exists('cacheProvince')) {
            Yii::$app->cache->set('cacheProvince', Province::find()->all() ,3600 * 24 * 365);
        }

        $category = Yii::$app->cache->get('cacheProvince');

        return $category;
    }
}

if(!function_exists('cacheCity')){
    function cacheCity(){

        if(!Yii::$app->cache->exists('cacheCity')) {
            Yii::$app->cache->set('cacheCity', City::find()->all() ,3600 * 24 * 365);
        }

        $category = Yii::$app->cache->get('cacheCity');

        return $category;
    }
}
if(!function_exists('cacheSetting')){
    function cacheSetting(){

        if(!Yii::$app->cache->exists('cacheSetting')) {
            Yii::$app->cache->set('cacheSetting', Setting::find()->orderBy(['id' => SORT_DESC])->one() ,3600 * 24 * 365);
        }

        $category = Yii::$app->cache->get('cacheSetting');

        return $category;
    }
}



if(!function_exists('cacheMe')){
    function cacheMe($cacheName,$cacheData,$cacheTime){

        if(!Yii::$app->cache->exists($cacheName)) {
            Yii::$app->cache->set($cacheName, $cacheData ,$cacheTime * 3600 );
        }

        $category = Yii::$app->cache->get($cacheName);

        return $category;
    }
}