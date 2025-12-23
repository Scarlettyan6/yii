<?php
/*
* Team: 实验楼C4
* Coding by 杜子妍, 2313312
* This is the battle form partial for backend management of anti-Japanese war landmarks.
*/

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model common\models\Battle */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="battle-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'name')->textInput(['maxlength' => true])->label('战役名称') ?>

    <?= $form->field($model, 'start_date')->input('date')->label('开始日期') ?>

    <?= $form->field($model, 'end_date')->input('date')->label('结束日期') ?>

    <?= $form->field($model, 'main_location')->textInput(['maxlength' => true])->label('主要地点') ?>

    <?= $form->field($model, 'main_latitude')->textInput(['maxlength' => true])->label('纬度') ?>

    <?= $form->field($model, 'main_longitude')->textInput(['maxlength' => true])->label('经度') ?>

    <?= $form->field($model, 'description')->textarea(['rows' => 6])->label('战役描述') ?>

    <?= $form->field($model, 'result')->textarea(['rows' => 6])->label('战役结果') ?>

    <?= $form->field($model, 'casualties_china')->textInput(['maxlength' => true])->label('中国方伤亡') ?>

    <?= $form->field($model, 'casualties_japan')->textInput(['maxlength' => true])->label('日方伤亡') ?>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? '创建战役' : '更新战役', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
