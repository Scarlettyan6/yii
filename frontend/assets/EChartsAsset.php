<?php
namespace frontend\assets;
use yii\web\AssetBundle;

/*
* Team: 实验楼C4
* Coding by 杜子妍, 2313312
* This is the EChartsAsset for anti-Japanese war landmarks map visualization.
*/

class EChartsAsset extends AssetBundle
{
    public $sourcePath = null;       // 不使用发布，直接引用 web 下的 js
    public $baseUrl = '@web';
    public $js = [
        'js/echarts.min.js',
    ];
    public $depends = [
        'frontend\assets\AppAsset',
    ];
}
