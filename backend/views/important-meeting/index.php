<?php

use yii\helpers\Html;
use yii\grid\GridView;
use yii\widgets\Pjax;

/* @var $this yii\web\View */
/* @var $searchModel backend\models\ImportantMeetingSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = '重要会议';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="important-meeting-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('新增会议', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?php Pjax::begin(); ?>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],
            'title',
            'meeting_date',
            'location',
            'display_order',
            [
                'attribute' => 'is_active',
                'format' => 'boolean',
            ],
            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>

    <?php Pjax::end(); ?>

</div>
