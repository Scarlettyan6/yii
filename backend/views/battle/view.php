<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model common\models\Battle */

$this->title = '战役详情：' . $model->name;
$this->params['breadcrumbs'][] = ['label' => '抗战地标', 'url' => ['index']];
$this->params['breadcrumbs'][] = '战役详情';
\yii\web\YiiAsset::register($this);
?>
<div class="battle-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('返回列表', ['index'], ['class' => 'btn btn-default']) ?>
        <?= Html::a('编辑战役', ['update', 'id' => $model->id], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('删除战役', ['delete', 'id' => $model->id], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => '确定要删除这个战役记录吗？此操作不可恢复。',
                'method' => 'post',
            ],
        ]) ?>
    </p>

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            [
                'attribute' => 'id',
                'label' => '战役ID',
            ],
            [
                'attribute' => 'name',
                'label' => '战役名称',
            ],
            [
                'attribute' => 'start_date',
                'label' => '开始日期',
                'format' => 'date',
            ],
            [
                'attribute' => 'end_date',
                'label' => '结束日期',
                'format' => 'date',
            ],
            [
                'attribute' => 'main_location',
                'label' => '主要地点',
            ],
            [
                'attribute' => 'main_latitude',
                'label' => '纬度',
            ],
            [
                'attribute' => 'main_longitude',
                'label' => '经度',
            ],
            [
                'attribute' => 'description',
                'label' => '战役描述',
                'format' => 'ntext',
            ],
            [
                'attribute' => 'result',
                'label' => '战役结果',
                'format' => 'ntext',
            ],
            [
                'attribute' => 'casualties_china',
                'label' => '中国方伤亡',
            ],
            [
                'attribute' => 'casualties_japan',
                'label' => '日方伤亡',
            ],
            [
                'attribute' => 'created_at',
                'label' => '创建时间',
                'format' => 'datetime',
            ],
            [
                'attribute' => 'updated_at',
                'label' => '更新时间',
                'format' => 'datetime',
            ],
        ],
    ]) ?>

</div>
