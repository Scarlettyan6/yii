<?php
namespace frontend\assets;

use yii\web\AssetBundle;
/*
* Team: 实验楼C4
* Coding by 姚智博, 2313557
* This is the TimelineAsset for anti-Japanese war timeline visualization.
*/
class TimelineAsset extends AssetBundle
{
    public $basePath = '@webroot';
    public $baseUrl  = '@web';

    public $css = [
        'css/timeline-film.css',
    ];

    public $js = [
        'js/timeline-film.js',
    ];

    public $depends = [
        'frontend\assets\AppAsset',
    ];
}
