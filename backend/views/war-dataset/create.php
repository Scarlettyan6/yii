<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model common\models\WarDataset */

$this->title = '创建战争数据集';
$this->params['breadcrumbs'][] = ['label' => '战争数据集', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="war-dataset-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('返回列表', ['index'], ['class' => 'btn btn-default']) ?>
    </p>

    <?= $this->render('_form', ['model' => $model]) ?>

</div>
