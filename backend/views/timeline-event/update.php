<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model common\models\TimelineEvent */

$this->title = '编辑时间线事件: ' . $model->title;
$this->params['breadcrumbs'][] = ['label' => '历史纪年', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->title, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = '编辑';
?>
<div class="timeline-event-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
