<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model common\models\StatisticCategory */

$this->title = 'Create Statistic Category';
$this->params['breadcrumbs'][] = ['label' => 'Statistic Categories', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="statistic-category-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
