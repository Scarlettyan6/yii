<?php
namespace frontend\assets;
use yii\web\AssetBundle;

class TimelineAsset extends AssetBundle
{
    public $sourcePath = null; // 我们用 CDN
    // Timeline.js 需要它自己的 CSS 和 JS
    public $css = [
        'https://cdn.knightlab.com/libs/timeline3/latest/css/timeline.css',
    ];
    public $js = [
        'https://cdn.knightlab.com/libs/timeline3/latest/js/timeline.js',
    ];
    public $depends = [
        'frontend\assets\AppAsset',
    ];
}