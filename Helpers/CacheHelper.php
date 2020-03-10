<?php

use app\models\Category;
use app\models\Color;
use app\models\Menu;
use app\models\Size;
use app\models\Subcat;

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

if(!function_exists('cacheMenuList')){
    function cacheMenuList(){

        if(!Yii::$app->cache->exists('cacheMenuList')) {
            Yii::$app->cache->set('cacheMenuList', Menu::find()->Where(['parent'=>0])->orWhere(['parent'=>null])->all() ,3600 * 24 * 7);
        }

        $category = Yii::$app->cache->get('cacheMenuList');

        return $category;
    }
}

if(!function_exists('cacheMenu2List')){
    function cacheMenu2List(){

        if(!Yii::$app->cache->exists('cacheMenu2List')) {
            Yii::$app->cache->set('cacheMenu2List', Menu::find()->all() ,3600 * 24 * 7);
        }

        $category = Yii::$app->cache->get('cacheMenu2List');

        return $category;
    }
}

