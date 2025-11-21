<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model common\models\TimelineEvent */

$this->title = 'Update Timeline Event: ' . $model->title;
$this->params['breadcrumbs'][] = ['label' => 'Timeline Events', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->title, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="timeline-event-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
