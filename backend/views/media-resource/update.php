<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model common\models\MediaResource */

$this->title = '编辑影视资源: ' . $model->title;
$this->params['breadcrumbs'][] = ['label' => '影视资源', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->title, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = '编辑';
?>
<div class="media-resource-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
