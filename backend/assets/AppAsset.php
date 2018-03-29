<?php

namespace backend\assets;

use yii\web\AssetBundle;

/**
 * Main backend application asset bundle.
 */
class AppAsset extends AssetBundle
{
    public $basePath = '@webroot';
    public $baseUrl = '@web';
    public $css = [
        'css/bootstrap.min.css',
        'css/oneui.css',
        'css/themes/flat.min.css'
    ];
    public $js = [
//         'js/core/jquery.min.js',
        'js/core/bootstrap.min.js',
        'js/core/jquery.slimscroll.min.js',
        'js/core/jquery.scrollLock.min.js',
        'js/core/jquery.appear.min.js',
        'js/core/jquery.countTo.min.js',
        'js/core/jquery.placeholder.min.js',
        'js/core/js.cookie.min.js',
        'js/app.js',
        'js/plugins/chartjs/Chart.min.js',
//        'js/pages/base_pages_dashboard_v2.js',
//        'js/plugins/cropperjs/cropper.min.js',
//        'js/pages/base_comp_image_cropper.js',

    ];
    public $depends = [
        'yii\web\YiiAsset',
        'yii\bootstrap\BootstrapAsset',
    ];
}
