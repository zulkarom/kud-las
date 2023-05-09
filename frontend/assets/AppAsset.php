<?php

namespace frontend\assets;

use yii\web\AssetBundle;

/**
 * Main frontend application asset bundle.
 */
class AppAsset extends AssetBundle
{
    public $sourcePath = '@frontend/assets/sijil';
    public $css = [
        'css/default.css',
        'css/style.css',
        'fontawesome/css/all.min.css',
        'responsive.css'
    ];

    public $js = [
        'js/jquery.nav.js'
    ];
    public $depends = [
        'yii\web\YiiAsset',
        'yii\bootstrap4\BootstrapAsset',
    ];
}
