<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model common\models\Statistic */

$this->title = 'Update Statistic: ' . $model->title;
$this->params['breadcrumbs'][] = ['label' => 'Statistics', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->title, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="statistic-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
