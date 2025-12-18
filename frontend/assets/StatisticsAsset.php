<?php
namespace frontend\assets;

use yii\web\AssetBundle;

class StatisticsAsset extends AssetBundle
{
    public $basePath = '@webroot';
    public $baseUrl  = '@web';

    public $css = [
        'css/war-stats.css',
    ];

    public $js = [
        'js/war-stats.js',
    ];

    public $depends = [
        'frontend\assets\AppAsset',
        'frontend\assets\EChartsAsset',
    ];
}
