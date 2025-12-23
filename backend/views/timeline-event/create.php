<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model common\models\TimelineEvent */

$this->title = '创建时间线事件';
$this->params['breadcrumbs'][] = ['label' => '历史纪年', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="timeline-event-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('返回列表', ['index'], ['class' => 'btn btn-default']) ?>
    </p>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
