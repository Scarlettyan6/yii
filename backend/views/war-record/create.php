<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model common\models\WarRecord */

$this->title = '创建战争记录';
$this->params['breadcrumbs'][] = ['label' => '战争记录', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="war-record-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('返回列表', ['index'], ['class' => 'btn btn-default']) ?>
    </p>

    <?= $this->render('_form', ['model' => $model]) ?>

</div>
