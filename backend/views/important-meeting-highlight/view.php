<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model common\models\ImportantMeetingHighlight */

$this->title = $model->title;
$this->params['breadcrumbs'][] = ['label' => '会议亮点', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="important-meeting-highlight-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('返回列表', ['index'], ['class' => 'btn btn-default']) ?>
        <?= Html::a('更新亮点', ['update', 'id' => $model->id], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('删除亮点', ['delete', 'id' => $model->id], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => '确定要删除这条记录吗？此操作不可恢复。',
                'method' => 'post',
            ],
        ]) ?>
    </p>

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'id',
            [
                'attribute' => 'meeting_id',
                'value' => $model->meeting ? $model->meeting->title : '',
            ],
            'title',
            'description:ntext',
            'display_order',
            'created_at:datetime',
            'updated_at:datetime',
        ],
    ]) ?>

</div>
