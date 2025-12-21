<?php
namespace frontend\assets;

use yii\web\AssetBundle;

class WarDataAsset extends AssetBundle
{
    public $basePath = '@webroot';
    public $baseUrl  = '@web';

    public $css = [
        'css/war-data.css',
    ];

    public $js = [
        // 如果你本地有 echarts.min.js，就用本地；没有也没事，view 里会自动用 CDN
        'js/war-data.js',
    ];

    public $depends = [
        'frontend\assets\AppAsset',
    ];
}
