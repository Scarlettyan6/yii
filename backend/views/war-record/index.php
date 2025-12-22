<?php
use yii\grid\GridView;
use yii\helpers\Html;
use yii\helpers\ArrayHelper;

echo Html::tag('h1', '抗战数据行管理');

$items = ArrayHelper::map($datasets, 'id', fn($d) => $d->name . " ({$d->key})");

echo Html::beginForm(['index'], 'get', ['style'=>'margin-bottom:12px;display:flex;gap:8px;align-items:center;flex-wrap:wrap;']);
echo Html::dropDownList('dataset_id', $dataset_id, $items, ['prompt'=>'选择数据集', 'class'=>'form-control', 'style'=>'width:360px;']);
echo Html::textInput('q', $q, ['class'=>'form-control', 'placeholder'=>'按 JSON 内容搜索', 'style'=>'width:260px;']);
echo Html::submitButton('筛选', ['class' => 'btn btn-primary']);
echo Html::a('回到数据集', ['war-dataset/index'], ['class' => 'btn btn-default']);
echo Html::endForm();

echo GridView::widget([
    'dataProvider' => $dataProvider,
    'columns' => [
        'id',
        'dataset_id',
        'row_index',
        [
            'attribute' => 'data_json',
            'value' => fn($m) => mb_strimwidth($m->data_json, 0, 120, '...','UTF-8'),
        ],
        [
            'class' => 'yii\grid\ActionColumn',
            'template' => '{update} {delete}',
        ],
    ],
]);
