<?php
use yii\helpers\Html;
use yii\widgets\ActiveForm;

echo Html::tag('h1', '编辑数据集：' . Html::encode($model->key));

$form = ActiveForm::begin();
echo $form->field($model, 'name');
echo $form->field($model, 'description')->textarea(['rows' => 4]);
echo $form->field($model, 'display_order');
echo $form->field($model, 'is_active')->dropDownList([1=>'启用', 0=>'停用']);
echo Html::submitButton('保存', ['class' => 'btn btn-primary']);
ActiveForm::end();
