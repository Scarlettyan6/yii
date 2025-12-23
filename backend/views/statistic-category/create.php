<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model common\models\StatisticCategory */

$this->title = '创建统计类别';
$this->params['breadcrumbs'][] = ['label' => '统计类别', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="statistic-category-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('返回列表', ['index'], ['class' => 'btn btn-default']) ?>
    </p>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
