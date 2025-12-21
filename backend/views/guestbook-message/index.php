<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel common\models\GuestbookMessageSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = '留言管理';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="guestbook-message-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('新建留言', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            [
                'attribute' => 'id',
                'label' => '标号',
            ],
            [
                'attribute' => 'nickname',
                'label' => '昵称',
            ],
            [
                'attribute' => 'content',
                'label' => '内容',
            ],
            [
                'attribute' => 'is_approved',
                'label' => '是否审核',
                'format' => 'raw',
                'value' => function ($model) {
                    return $model->is_approved ? '<span class="label label-success">已审核</span>' : '<span class="label label-warning">待审核</span>';
                },
                'filter' => [1 => '已审核', 0 => '待审核'],
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
