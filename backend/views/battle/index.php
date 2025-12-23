<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel backend\models\BattleSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = '战役管理';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="battle-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('新建战役', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            [
                'attribute' => 'id',
                'label' => '编号',
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
            //'main_latitude',
            //'main_longitude',
            //'description:ntext',
            //'result:ntext',
            //'casualties_china',
            //'casualties_japan',
            //'created_at',
            //'updated_at',

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
