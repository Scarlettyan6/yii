<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use common\models\Figure;

/* @var $this yii\web\View */
/* @var $model common\models\Figure */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="figure-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'name')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'biography')->textarea(['rows' => 6]) ?>

    <?= $form->field($model, 'achievements')->textarea(['rows' => 6]) ?>

    <?= $form->field($model, 'cover_image_url')->textInput(['maxlength' => true, 'placeholder' => 'http://...']) ?>

    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
