<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model common\models\WarDataset */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="war-dataset-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'name')->label('名称')->textInput(['maxlength' => true])->hint('前台左侧目录显示的名称') ?>

    <?= $form->field($model, 'key')->label('键名')->textInput(['maxlength' => true])->hint('建议与 CSV 文件名一致，例如：01_china_casualties_estimates.csv') ?>

    <?= $form->field($model, 'source_file')->label('源文件')->textInput(['maxlength' => true])->hint('CSV源文件路径') ?>

    <?= $form->field($model, 'description')->label('描述')->textarea(['rows' => 4])->hint('数据集描述') ?>

    <div class="row">
        <div class="col-md-6">
            <?= $form->field($model, 'display_order')->label('显示顺序')->textInput()->hint('越小越靠前') ?>
        </div>
        <div class="col-md-6">
            <?= $form->field($model, 'is_active')->label('是否启用')->dropDownList([1 => '启用', 0 => '禁用'])->hint('禁用后前台不展示') ?>
        </div>
    </div>

    <div class="row">
        <div class="col-md-6">
            <?= $form->field($model, 'created_at')->label('创建时间')->textInput()->hint('可直接填时间戳；也可留空由程序自动写入') ?>
        </div>
        <div class="col-md-6">
            <?= $form->field($model, 'updated_at')->label('更新时间')->textInput()->hint('可直接填时间戳；也可留空由程序自动写入') ?>
        </div>
    </div>

    <div class="form-group" style="margin-top:12px;">
        <?= Html::submitButton('保存', ['class' => 'btn btn-success']) ?>
        <?= Html::a('返回', ['index'], ['class' => 'btn btn-default']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
