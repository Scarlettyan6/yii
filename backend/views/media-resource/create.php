<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model common\models\MediaResource */

$this->title = '创建影视资源';
$this->params['breadcrumbs'][] = ['label' => '影视资源', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="media-resource-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('返回列表', ['index'], ['class' => 'btn btn-default']) ?>
    </p>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
