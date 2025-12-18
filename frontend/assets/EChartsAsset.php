<?php
namespace frontend\assets;

use Yii;
use yii\web\AssetBundle;

class EChartsAsset extends AssetBundle
{
    public $basePath = '@webroot';
    public $baseUrl  = '@web';

    public $js = [];

    public function init()
    {
        parent::init();

        // 优先本地：frontend/web/vendor/echarts/echarts.min.js
        $local = Yii::getAlias('@webroot/vendor/echarts/echarts.min.js');
        if (is_file($local)) {
            $this->js = ['vendor/echarts/echarts.min.js'];
        } else {
            // 没有外网就会加载失败，但页面会给提示；你想离线就把文件放到上面那个路径
            $this->js = ['https://cdn.jsdelivr.net/npm/echarts@5/dist/echarts.min.js'];
        }
    }
}
