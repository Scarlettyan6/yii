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
        'css/site.css',
        'css/custom.css', // <-- 确保你添加了这一行
    ];
    public $js = [
        // 'js/main.js', // 你可以创建一个 main.js 来放你自己的全站JS
    ];
    public $depends = [
        'yii\web\YiiAsset',
        'yii\bootstrap\BootstrapAsset', // 确保依赖 Bootstrap 5
    ];
}
