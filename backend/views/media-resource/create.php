<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model common\models\MediaResource */

$this->title = 'Create Media Resource';
$this->params['breadcrumbs'][] = ['label' => 'Media Resources', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="media-resource-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
