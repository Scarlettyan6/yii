<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel backend\models\HomepageFeatureSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = '专题首页内容';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="homepage-feature-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('创建条目', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?= $this->render('_search', ['model' => $searchModel]); ?>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => null,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            [
                'attribute' => 'title',
                'label' => '标题',
            ],
            [
                'attribute' => 'subtitle',
                'label' => '副标题',
            ],
            [
                'attribute' => 'link_url',
                'label' => '链接地址',
                'format' => 'url',
            ],
            [
                'attribute' => 'display_order',
                'label' => '显示顺序',
                'contentOptions' => ['style' => 'width:100px;'],
            ],
            [
                'attribute' => 'is_active',
                'label' => '是否启用',
                'format' => 'raw',
                'value' => function ($model) {
                    return $model->is_active ? '<span class="label label-success">启用</span>' : '<span class="label label-default">禁用</span>';
                },
                'value' => function ($model) {
                    return $model->is_active ? '启用' : '停用';
                },
                'contentOptions' => ['style' => 'width:80px;'],
            ],

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>

</div>
