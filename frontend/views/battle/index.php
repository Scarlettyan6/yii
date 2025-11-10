<?php
/* @var $this yii\web\View */
/* @var $battles array (由 BattleController 传入) */

use yii\helpers\Url;
use yii\helpers\Html;

// !! 关键：只在这个页面注册 ECharts 或 Three.js !!
// \frontend\assets\EChartsAsset::register($this);
\frontend\assets\ThreeJsAsset::register($this); // <-- 注册你的 3D 资源包

$this->title = '抗战地标';
$this->params['breadcrumbs'][] = $this->title; // (添加面包屑导航)
?>

<div class="battle-index">
    <h1><?= Html::encode($this->title) ?></h1>
    <p>这里是抗战地标 3D 地图展示区。</p>

    <div id="three-js-map-container" style="width: 100%; height: 600px; border: 1px solid #000;">
        </div>

    <hr>

    <h2>战役列表</h2>
    <div class="row">
        <?php foreach ($battles as $battle): ?>
            <div class="col-md-4">
                <h4><?= Html::encode($battle->name) ?></h4>
                <p>地点：<?= Html::encode($battle->main_location) ?></p>
                <p><a class="btn btn-default" href="<?= Url::to(['/battle/view', 'id' => $battle->id]) ?>">查看详情 &raquo;</a></p>
            </div>
        <?php endforeach; ?>
    </div>

</div>