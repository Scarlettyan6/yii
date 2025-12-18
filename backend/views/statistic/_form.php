<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use yii\helpers\ArrayHelper;
use common\models\StatisticCategory;

/* @var $this yii\web\View */
/* @var $model common\models\Statistic */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="statistic-form">

    <?php $form = ActiveForm::begin(); ?>

    <?php
$catItems = ArrayHelper::map(StatisticCategory::find()->all(), 'id', 'name');
?>
<?= $form->field($model, 'category_id')->dropDownList($catItems, ['prompt' => '请选择统计分类']) ?>


    <?= $form->field($model, 'value')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'unit')->textInput(['maxlength' => true]) ?>

    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
