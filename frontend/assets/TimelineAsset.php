<?php
namespace frontend\assets;

use yii\web\AssetBundle;

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
