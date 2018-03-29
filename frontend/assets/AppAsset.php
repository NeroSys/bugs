<?php

namespace frontend\assets;

use yii\web\AssetBundle;

/**
 * Main frontend application asset bundle.
 */
class AppAsset extends AssetBundle
{
    public $basePath = '@webroot';
    public $baseUrl = '@web';
    public $css = [
        'css/swiper.css',
        'css/font-awesome.css',
        'css/styles.css',
    ];
    public $js = [
        'js/jquery-3.1.0.min.js',
        'js/hash-nav.js',
        'js/jquery.nicescroll.min.js',
        'js/jquery-ui.min.js',
        'js/jquery.ui.touch-punch.min.js',
        'js/swiper.jquery.min.js',
        'js/slider.js',
        'js/component.js',
        'js/select-block.js',
        'js/modal-popup.js',
        'js/scripts.js',
    ];
    public $depends = [
        'yii\web\YiiAsset',
        'yii\bootstrap\BootstrapAsset',
    ];
}
