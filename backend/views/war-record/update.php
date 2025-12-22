<?php
use yii\helpers\Html;
use yii\widgets\ActiveForm;

echo Html::tag('h1', '编辑数据行 #' . $model->id);

$form = ActiveForm::begin();
echo $form->field($model, 'data_json')->textarea(['rows' => 18])->hint('这里是整行 JSON。修改后保存即可。');
echo Html::submitButton('保存', ['class' => 'btn btn-primary']);
echo Html::a('返回列表', ['index', 'dataset_id' => $model->dataset_id], ['class' => 'btn btn-default', 'style'=>'margin-left:8px;']);
ActiveForm::end();
