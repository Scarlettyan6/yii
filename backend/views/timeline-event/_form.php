<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model common\models\TimelineEvent */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="timeline-event-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'event_date')->input('date')->label('事件日期') ?>

    <?= $form->field($model, 'title')->textInput(['maxlength' => true])->label('事件标题') ?>

    <?= $form->field($model, 'description')->textarea(['rows' => 6])->label('事件描述') ?>

    <?= $form->field($model, 'cover_image_url')->textInput(['maxlength' => true])->label('封面图片链接') ?>

    <?= $form->field($model, 'importance')->dropDownList([
        1 => '普通',
        2 => '重要',
        3 => '非常重要'
    ], ['prompt' => '请选择重要程度'])->label('重要程度') ?>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? '创建事件' : '更新事件', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
