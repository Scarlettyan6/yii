<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model common\models\MediaResource */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="media-resource-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'title')->textInput(['maxlength' => true])->label('标题') ?>

    <?= $form->field($model, 'type')->dropDownList([
        'video' => '视频',
        'audio' => '音频',
        'image' => '图片',
        'document' => '文档'
    ], ['prompt' => '请选择媒体类型'])->label('媒体类型') ?>

    <?= $form->field($model, 'url')->textInput(['maxlength' => true])->label('资源链接') ?>

    <?= $form->field($model, 'path')->textInput(['maxlength' => true])->label('本地路径') ?>

    <?= $form->field($model, 'description')->textarea(['rows' => 6])->label('资源描述') ?>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? '创建资源' : '更新资源', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
