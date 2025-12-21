<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model common\models\GuestbookMessageSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="guestbook-message-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'id')->label('留言ID') ?>

    <?= $form->field($model, 'nickname')->label('昵称') ?>

    <?= $form->field($model, 'content')->label('留言内容') ?>

    <?= $form->field($model, 'is_approved')->dropDownList([
        1 => '已审核',
        0 => '待审核'
    ], ['prompt' => '全部'])->label('审核状态') ?>

    <?= $form->field($model, 'created_at')->label('创建时间') ?>

    <?php // echo $form->field($model, 'updated_at') ?>

    <div class="form-group">
        <?= Html::submitButton('搜索', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('重置', ['class' => 'btn btn-outline-secondary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
