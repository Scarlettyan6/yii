<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model common\models\WarDataset */

$this->title = '编辑战争数据集: ' . $model->name;
$this->params['breadcrumbs'][] = ['label' => '战争数据集', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->name, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = '编辑';
?>
<div class="war-dataset-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', ['model' => $model]) ?>

</div>
