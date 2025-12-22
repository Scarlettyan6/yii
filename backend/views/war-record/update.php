<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model common\models\WarRecord */

$this->title = 'Update War Record: #' . $model->id;
$this->params['breadcrumbs'][] = ['label' => 'War Records', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => '#' . $model->id, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="war-record-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', ['model' => $model]) ?>

</div>
