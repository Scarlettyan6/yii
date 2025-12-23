<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model common\models\ImportantMeetingHighlight */
/* @var $form yii\widgets\ActiveForm */
/* @var $meetingList array */
?>

<div class="important-meeting-highlight-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'meeting_id')->dropDownList($meetingList, ['prompt' => '选择所属会议']) ?>

    <?= $form->field($model, 'title')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'description')->textarea(['rows' => 4]) ?>

    <?= $form->field($model, 'display_order')->textInput() ?>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? '创建' : '更新', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
