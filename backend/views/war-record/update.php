<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model common\models\WarRecord */

$this->title = '编辑战争记录: #' . $model->id;
$this->params['breadcrumbs'][] = ['label' => '战争记录', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => '#' . $model->id, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = '编辑';
?>
<div class="war-record-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', ['model' => $model]) ?>

</div>
