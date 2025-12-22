<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel backend\models\WarDatasetSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = '战争数据集';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="war-dataset-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('创建战争数据集', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?= $this->render('_search', ['model' => $searchModel]); ?>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

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
                'attribute' => 'is_active',
                'label' => '是否启用',
                'format' => 'boolean',
            ],

            [
                'attribute' => 'source_file',
                'label' => '源文件',
                'contentOptions' => ['style' => 'max-width:220px; white-space:nowrap; overflow:hidden; text-overflow:ellipsis;'],
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

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>

</div>
