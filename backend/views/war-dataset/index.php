<?php
use yii\grid\GridView;
use yii\helpers\Html;

echo Html::tag('h1', '抗战数据集管理');

echo GridView::widget([
    'dataProvider' => $dataProvider,
    'columns' => [
        'id',
        'key',
        'name',
        'source_file',
        'display_order',
        [
            'attribute' => 'is_active',
            'value' => fn($m) => $m->is_active ? '启用' : '停用',
        ],
        [
            'label' => '数据行管理',
            'format' => 'raw',
            'value' => fn($m) => Html::a('查看数据行', ['war-record/index', 'dataset_id' => $m->id]),
        ],
        [
            'class' => 'yii\grid\ActionColumn',
            'template' => '{update}',
        ],
    ],
]);
