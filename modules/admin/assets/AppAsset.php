<?php
/**
 * @link http://www.yiiframework.com/
 * @copyright Copyright (c) 2008 Yii Software LLC
 * @license http://www.yiiframework.com/license/
 */

namespace app\modules\admin\assets;

use yii\web\AssetBundle;

/**
 * Main application asset bundle.
 *
 * @author Qiang Xue <qiang.xue@gmail.com,
 * @since 2.0
 */
class AppAsset extends AssetBundle
{
    public $basePath = '@webroot';
    public $baseUrl = '@web';
    public $css = [
      "panel/plugins/bootstrap/css/bootstrap.min.css",
        "css/bootstrap-glyphicons.css",
        "panel/plugins/bootstrap-rtl-master/dist/css/custom-bootstrap-rtl.css",
        "panel/css/style.css",
        "panel/css/ticket.css",
        "panel/css/colors/blue.css",
        "panel/css/select2.css",
    ];
    public $js = [
       "panel/plugins/bootstrap/js/popper.min.js",
      "panel/plugins/bootstrap/js/bootstrap.min.js",
       "panel/js/jquery.slimscroll.js",
       "panel/js/waves.js",
       "panel/js/sidebarmenu.js",
       "panel/js/select2.js",
    "panel/plugins/sticky-kit-master/dist/sticky-kit.min.js",
       "panel/js/custom.min.js",
       "panel/plugins/styleswitcher/jQuery.style.switcher.js",
       "js/jquery.PrintArea.js",
    ];
    public $depends = [
   'yii\web\YiiAsset',
     //'yii\bootstrap\BootstrapAsset',
    ];
}
