<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model common\models\Battle */

$this->title = 'Create Battle';
$this->params['breadcrumbs'][] = ['label' => 'Battles', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="battle-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
