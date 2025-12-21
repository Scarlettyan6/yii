<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel common\models\TimelineEventSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = '时间戳管理';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="timeline-event-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('新建时间戳', ['create'], ['class' => 'btn btn-success']) ?>
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
                'attribute' => 'event_date',
                'label' => '事件日期',
                'format' => 'date',
            ],
            [
                'attribute' => 'title',
                'label' => '事件标题',
            ],
            [
                'attribute' => 'description',
                'label' => '事件描述',
                'format' => 'ntext',
            ],
            [
                'attribute' => 'cover_image_url',
                'label' => '封面图片',
                'format' => 'url',
            ],
            //'importance',
            //'created_at',
            //'updated_at',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>


</div>
