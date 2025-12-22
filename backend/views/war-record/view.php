<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model common\models\WarRecord */

$this->title = '战争记录 #' . $model->id;
$this->params['breadcrumbs'][] = ['label' => '战争记录', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;

\yii\web\YiiAsset::register($this);
?>
<div class="war-record-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('返回列表', ['index'], ['class' => 'btn btn-default']) ?>
        <?= Html::a('编辑记录', ['update', 'id' => $model->id], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('删除记录', ['delete', 'id' => $model->id], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => '确定要删除这条记录吗？此操作不可恢复。',
                'method' => 'post',
            ],
        ]) ?>
    </p>

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            [
                'attribute' => 'id',
                'label' => 'ID',
            ],
            [
                'attribute' => 'row_index',
                'label' => '行号',
            ],
            [
                'label' => '数据集',
                'value' => $model->dataset ? $model->dataset->name : $model->dataset_id,
            ],
            [
                'attribute' => 'data_json',
                'label' => '数据 (JSON)',
                'format' => 'raw',
                'value' => function($model) {
                    $data = json_decode($model->data_json, true);
                    if (is_array($data)) {
                        return '<pre>' . json_encode($data, JSON_PRETTY_PRINT | JSON_UNESCAPED_UNICODE) . '</pre>';
                    }
                    return $model->data_json;
                },
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
