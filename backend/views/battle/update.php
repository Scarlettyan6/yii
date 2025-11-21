<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model common\models\Battle */

$this->title = 'Update Battle: ' . $model->name;
$this->params['breadcrumbs'][] = ['label' => 'Battles', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->name, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="battle-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
