<?php
namespace frontend\assets;
use yii\web\AssetBundle;

class EChartsAsset extends AssetBundle
{
    public $sourcePath = null; // 我们用 CDN
    public $js = [
        'https://cdn.jsdelivr.net/npm/echarts@5.4.3/dist/echarts.min.js', // 使用 CDN
    ];
    public $depends = [
        'frontend\assets\AppAsset', // 依赖于主资源包
    ];
}