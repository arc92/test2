<?php
/**
 * @link http://www.yiiframework.com/
 * @copyright Copyright (c) 2008 Yii Software LLC
 * @license http://www.yiiframework.com/license/
 */

namespace app\assets;

use yii\web\AssetBundle;

/**
 * Main application asset bundle.
 *
 * @author Qiang Xue <qiang.xue@gmail.com>
 * @since 2.0
 */
class AppAsset extends AssetBundle
{
    public $basePath = '@webroot';
    public $baseUrl = '@web';
    public $css = [
        'css/select2.min.css',
        'css/bootstrap.css',
        'css/styleMain.css',
        'css/new.css',
        'css/owl.carousel.min.css',
        'css/owl.theme.default.min.css',
      
//        'https://www.google.com/recaptcha/api.js',
        
    ];
    public $js = [
        'js/bootstrap.bundle.min.js',
        'js/select2.min.js',
        'js/owl.carousel.min.js',
        'js/custom.js',
    ];
    public $depends = [
        'yii\web\YiiAsset',
      //  'yii\bootstrap\BootstrapAsset',
    ];
}
