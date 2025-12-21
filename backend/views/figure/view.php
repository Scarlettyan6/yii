<?php

use yii\helpers\Html;
use yii\widgets\DetailView;
use common\models\Figure;

/* @var $this yii\web\View */
/* @var $model common\models\Figure */

$this->title = '人物详情：' . $model->name;
$this->params['breadcrumbs'][] = ['label' => '抗战人物', 'url' => ['index']];
$this->params['breadcrumbs'][] = '人物详情';
\yii\web\YiiAsset::register($this);
?>
<div class="figure-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('返回列表', ['index'], ['class' => 'btn btn-default']) ?>
        <?= Html::a('编辑人物', ['update', 'id' => $model->id], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('删除人物', ['delete', 'id' => $model->id], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => '确定要删除这个人物记录吗？此操作不可恢复。',
                'method' => 'post',
            ],
        ]) ?>
    </p>

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'id',
            'name',
            'biography:ntext',
            'achievements:ntext',
            'cover_image_url:url',
        ],
    ]) ?>

</div>
