<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use yii\helpers\ArrayHelper;

/* @var $this yii\web\View */
/* @var $model backend\models\WarRecordSearch */
/* @var $form yii\widgets\ActiveForm */
/* @var $datasets common\models\WarDataset[] */

$datasetOptions = ['' => '全部'] + ArrayHelper::map($datasets, 'id', 'name');
?>

<div class="war-record-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <div class="row">
        <div class="col-md-2"><?= $form->field($model, 'id')->label('ID') ?></div>
        <div class="col-md-3"><?= $form->field($model, 'dataset_id')->label('数据集')->dropDownList($datasetOptions) ?></div>
        <div class="col-md-3"><?= $form->field($model, 'row_index')->label('行号') ?></div>
        <div class="col-md-4"><?= $form->field($model, 'q')->label('搜索关键词')->textInput()->hint('在 JSON 数据中模糊搜索') ?></div>
    </div>

    <div class="form-group">
        <?= Html::submitButton('搜索', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('重置', ['class' => 'btn btn-outline-secondary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
