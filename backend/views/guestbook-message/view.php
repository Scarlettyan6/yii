<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model common\models\GuestbookMessage */

$this->title = '留言详情 #' . $model->id;
$this->params['breadcrumbs'][] = ['label' => '留言管理', 'url' => ['index']];
$this->params['breadcrumbs'][] = '留言详情';
\yii\web\YiiAsset::register($this);
?>
<div class="guestbook-message-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('返回列表', ['index'], ['class' => 'btn btn-default']) ?>
        <?= Html::a('编辑留言', ['update', 'id' => $model->id], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('删除留言', ['delete', 'id' => $model->id], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => '确定要删除这条留言吗？此操作不可恢复。',
                'method' => 'post',
            ],
        ]) ?>
    </p>

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            [
                'attribute' => 'id',
                'label' => '留言ID',
            ],
            [
                'attribute' => 'nickname',
                'label' => '昵称',
            ],
            [
                'attribute' => 'content',
                'label' => '留言内容',
                'format' => 'ntext',
            ],
            [
                'attribute' => 'is_approved',
                'label' => '审核状态',
                'format' => 'raw',
                'value' => $model->is_approved ? '<span class="label label-success">已审核</span>' : '<span class="label label-warning">待审核</span>',
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
        ],
    ]) ?>

</div>
