
<?php
/* @var $this yii\web\View */
/* @var $battle common\models\Battle */

/*
* Team: 实验楼C4
* Coding by 杜子妍, 2313312
* This is the anti-Japanese war landmarks page.
*/

use yii\helpers\Html;
use yii\widgets\DetailView;

$this->title = $battle->name;
$this->params['breadcrumbs'][] = ['label' => '抗战地标', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>

<div class="battle-view" style="padding:10px 0 30px;">
    <h1><?= Html::encode($this->title) ?></h1>

    <?= DetailView::widget([
        'model' => $battle,
        'attributes' => [
            ['attribute' => 'name', 'label' => '战役名称'],
            ['attribute' => 'main_location', 'label' => '主要地点'],
            ['attribute' => 'start_date', 'label' => '开始日期'],
            ['attribute' => 'end_date', 'label' => '结束日期'],
            ['attribute' => 'main_latitude', 'label' => '纬度'],
            ['attribute' => 'main_longitude', 'label' => '经度'],
            ['attribute' => 'casualties_china', 'label' => '中方伤亡'],
            ['attribute' => 'casualties_japan', 'label' => '日方伤亡'],
            [
                'attribute' => 'description',
                'format' => 'ntext',
                'label' => '描述',
            ],
            [
                'attribute' => 'result',
                'format' => 'ntext',
                'label' => '结果',
            ],
        ],
    ]) ?>

    <p>
        <?= Html::a('返回列表', ['index'], ['class' => 'btn btn-default']) ?>
    </p>
</div>
