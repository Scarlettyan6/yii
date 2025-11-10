<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model common\models\TimelineEvent */

$this->title = 'Create Timeline Event';
$this->params['breadcrumbs'][] = ['label' => 'Timeline Events', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="timeline-event-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
