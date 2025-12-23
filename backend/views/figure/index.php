<?php
/*
* Team: 实验楼C4
* Coding by 谢闻星, 2310500
* This is the figure index view for backend management of historical figures column.
*/

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = '人物管理';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="figure-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('新增人物', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            [
                'attribute' => 'id',
                'label' => '编号',
            ],
            [
                'attribute' => 'name',
                'label' => '人物姓名',
            ],
            [
                'attribute' => 'biography',
                'label' => '人物生平',
                'format' => 'ntext',
                'contentOptions' => ['style' => 'max-width:300px; white-space:normal;'],
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
