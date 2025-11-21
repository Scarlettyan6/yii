<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model common\models\Battle */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="battle-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'name')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'start_date')->textInput() ?>

    <?= $form->field($model, 'end_date')->textInput() ?>

    <?= $form->field($model, 'main_location')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'main_latitude')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'main_longitude')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'description')->textarea(['rows' => 6]) ?>

    <?= $form->field($model, 'result')->textarea(['rows' => 6]) ?>

    <?= $form->field($model, 'casualties_china')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'casualties_japan')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'created_at')->textInput() ?>

    <?= $form->field($model, 'updated_at')->textInput() ?>

    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
