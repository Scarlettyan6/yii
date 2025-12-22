<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use yii\helpers\ArrayHelper;

/* @var $this yii\web\View */
/* @var $model common\models\WarRecord */
/* @var $form yii\widgets\ActiveForm */

$datasets = \common\models\WarDataset::find()
    ->orderBy(['display_order' => SORT_ASC, 'id' => SORT_ASC])
    ->all();
$datasetOptions = ArrayHelper::map($datasets, 'id', 'name');
?>

<div class="war-record-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'dataset_id')->label('数据集')->dropDownList($datasetOptions, ['prompt' => '请选择所属数据集']) ?>

    <?= $form->field($model, 'row_index')->label('行号')->textInput()->hint('CSV文件中的行号（从2开始）') ?>

    <?= $form->field($model, 'data_json')->label('数据 (JSON)')->textarea(['rows' => 10])->hint('JSON格式的数据，包含从CSV文件导入的所有字段') ?>

    <div class="row">
        <div class="col-md-6">
            <?= $form->field($model, 'created_at')->label('创建时间')->textInput()->hint('创建时间戳，可留空自动生成') ?>
        </div>
        <div class="col-md-6">
            <?= $form->field($model, 'updated_at')->label('更新时间')->textInput()->hint('更新时间戳，可留空自动生成') ?>
        </div>
    </div>

    <div class="form-group" style="margin-top:12px;">
        <?= Html::submitButton('保存', ['class' => 'btn btn-success']) ?>
        <?= Html::a('返回', ['index'], ['class' => 'btn btn-default']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
