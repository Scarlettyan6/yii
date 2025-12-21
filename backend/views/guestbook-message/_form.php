<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model common\models\GuestbookMessage */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="guestbook-message-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'nickname')->textInput(['maxlength' => true])->label('昵称') ?>

    <?= $form->field($model, 'content')->textarea(['rows' => 6])->label('留言内容') ?>

    <?= $form->field($model, 'is_approved')->dropDownList([
        1 => '已审核',
        0 => '待审核'
    ], ['prompt' => '请选择审核状态'])->label('审核状态') ?>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? '创建留言' : '更新留言', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
