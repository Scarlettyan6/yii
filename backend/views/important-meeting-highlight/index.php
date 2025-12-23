<?php

use yii\helpers\Html;
use yii\grid\GridView;
use yii\widgets\Pjax;

/* @var $this yii\web\View */
/* @var $searchModel backend\models\ImportantMeetingHighlightSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = '会议亮点';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="important-meeting-highlight-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('新增亮点', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?php Pjax::begin(); ?>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],
            [
                'attribute' => 'meeting_id',
                'value' => static function ($model) {
                    return $model->meeting ? $model->meeting->title : '';
                },
            ],
            'title',
            'display_order',
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

    <?php Pjax::end(); ?>

</div>
