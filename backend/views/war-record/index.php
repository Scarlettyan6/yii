<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel backend\models\WarRecordSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */


$this->title = '战争记录';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="war-record-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('创建战争记录', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?php if (isset($searchModel)): ?>
        <?= $this->render('_search', ['model' => $searchModel, 'datasets' => $datasets]); ?>
    <?php endif; ?>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => isset($searchModel) ? $searchModel : null,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            [
                'attribute' => 'id',
                'label' => 'ID',
            ],
            [
                'attribute' => 'row_index',
                'label' => '行号',
            ],

            [
                'attribute' => 'dataset_id',
                'value' => function($model){
                    return $model->dataset ? $model->dataset->name : $model->dataset_id;
                },
                'label' => '数据集',
                'filter' => \yii\helpers\ArrayHelper::map($datasets, 'id', 'name'),
            ],

            [
                'attribute' => 'data_json',
                'label' => '数据 (JSON)',
                'value' => function($model) {
                    $data = json_decode($model->data_json, true);
                    if (is_array($data)) {
                        // 显示前几个字段作为预览
                        $preview = [];
                        foreach (array_slice($data, 0, 3) as $key => $value) {
                            $preview[] = "$key: " . (is_scalar($value) ? $value : json_encode($value));
                        }
                        return implode('; ', $preview) . (count($data) > 3 ? '...' : '');
                    }
                    return $model->data_json;
                },
                'contentOptions' => ['style' => 'max-width:400px; white-space:nowrap; overflow:hidden; text-overflow:ellipsis;'],
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

            [
                'class' => 'yii\grid\ActionColumn',
                'template' => '{view} {update} {delete}',
                'buttons' => [
                    'delete' => function ($url, $model, $key) {
                        return Html::a('<span class="glyphicon glyphicon-trash"></span>', $url, [
                            'title' => '删除',
                            'data-confirm' => '确定要删除这条内容吗？此操作不可恢复。',
                            'data-method' => 'post',
                        ]);
                    },
                ],
            ],
        ],
    ]); ?>

</div>
