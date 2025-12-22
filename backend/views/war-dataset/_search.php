<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model backend\models\WarDatasetSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="war-dataset-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <div class="row">
        <div class="col-md-2"><?= $form->field($model, 'id')->label('ID') ?></div>
        <div class="col-md-3"><?= $form->field($model, 'name')->label('名称') ?></div>
        <div class="col-md-3"><?= $form->field($model, 'key')->label('键名') ?></div>
        <div class="col-md-2"><?= $form->field($model, 'is_active')->label('是否启用')->dropDownList(['' => '全部', 1 => '启用', 0 => '禁用']) ?></div>
        <div class="col-md-2"><?= $form->field($model, 'display_order')->label('显示顺序') ?></div>
    </div>

    <div class="row">
        <div class="col-md-6"><?= $form->field($model, 'source_file')->label('源文件') ?></div>
        <div class="col-md-6"><?= $form->field($model, 'description')->label('描述') ?></div>
    </div>

    <div class="form-group">
        <?= Html::submitButton('搜索', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('重置', ['class' => 'btn btn-outline-secondary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
