<?php
/*
* Team: 实验楼C4
* Coding by 杜子妍, 2313312
* This is the battle search form partial for backend management of anti-Japanese war landmarks.
*/

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

    <?= $form->field($model, 'id')->label('战役ID') ?>

    <?= $form->field($model, 'name')->label('战役名称') ?>

    <?= $form->field($model, 'start_date')->label('开始日期') ?>

    <?= $form->field($model, 'end_date')->label('结束日期') ?>

    <?= $form->field($model, 'main_location')->label('主要地点') ?>

    <?php // echo $form->field($model, 'main_latitude') ?>

    <?php // echo $form->field($model, 'main_longitude') ?>

    <?php // echo $form->field($model, 'description') ?>

    <?php // echo $form->field($model, 'result') ?>

    <?php // echo $form->field($model, 'casualties_china') ?>

    <?php // echo $form->field($model, 'casualties_japan') ?>

    <?php // echo $form->field($model, 'created_at') ?>

    <?php // echo $form->field($model, 'updated_at') ?>

    <div class="form-group">
        <?= Html::submitButton('搜索', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('重置', ['class' => 'btn btn-outline-secondary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
