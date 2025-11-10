<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model backend\models\BattleSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="battle-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'id') ?>

    <?= $form->field($model, 'name') ?>

    <?= $form->field($model, 'start_date') ?>

    <?= $form->field($model, 'end_date') ?>

    <?= $form->field($model, 'main_location') ?>

    <?php // echo $form->field($model, 'main_latitude') ?>

    <?php // echo $form->field($model, 'main_longitude') ?>

    <?php // echo $form->field($model, 'description') ?>

    <?php // echo $form->field($model, 'result') ?>

    <?php // echo $form->field($model, 'casualties_china') ?>

    <?php // echo $form->field($model, 'casualties_japan') ?>

    <?php // echo $form->field($model, 'created_at') ?>

    <?php // echo $form->field($model, 'updated_at') ?>

    <div class="form-group">
        <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Reset', ['class' => 'btn btn-outline-secondary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
