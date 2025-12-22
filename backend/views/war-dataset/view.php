<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model common\models\WarDataset */

$this->title = $model->name;
$this->params['breadcrumbs'][] = ['label' => '战争数据集', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;

\yii\web\YiiAsset::register($this);
?>
<div class="war-dataset-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('返回列表', ['index'], ['class' => 'btn btn-default']) ?>
        <?= Html::a('编辑数据集', ['update', 'id' => $model->id], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('删除数据集', ['delete', 'id' => $model->id], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => '确定要删除这个数据集吗？此操作不可恢复。',
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
                'attribute' => 'display_order',
                'label' => '显示顺序',
            ],
            [
                'attribute' => 'name',
                'label' => '名称',
            ],
            [
                'attribute' => 'key',
                'label' => '键名',
            ],
            [
                'attribute' => 'source_file',
                'label' => '源文件',
            ],
            [
                'attribute' => 'description',
                'label' => '描述',
                'format' => 'ntext',
            ],
            [
                'attribute' => 'is_active',
                'label' => '是否启用',
                'format' => 'boolean',
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
