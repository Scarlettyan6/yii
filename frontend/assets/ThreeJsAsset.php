<?php
namespace frontend\assets;
use yii\web\AssetBundle;

class ThreeJsAsset extends AssetBundle
{
    public $sourcePath = null; // 我们用 CDN
    public $js = [
        'https://cdn.jsdelivr.net/npm/three@0.164.1/build/three.module.min.js', // 这是 three.js 核心库
        // 注意：three.js 还需要 OrbitControls.js, GLTFLoader.js 等
        // 我们暂时只加载核心库
    ];
    public $jsOptions = [
        // 关键：告诉浏览器这个 JS 是一个 ES Module
        'type' => 'module'
    ];
    public $depends = [
        'frontend\assets\AppAsset',
    ];
}