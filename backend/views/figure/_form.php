

<?php
/*
* Team: 实验楼C4
* Coding by 谢闻星, 2310500
* This is the figure form partial for backend management of historical figures column.
*/
use yii\helpers\Html;
use yii\widgets\ActiveForm;
use common\models\Figure;

/* @var $this yii\web\View */
/* @var $model common\models\Figure */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="figure-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'name')->textInput(['maxlength' => true])->label('人物姓名') ?>

    <?= $form->field($model, 'biography')->textarea(['rows' => 6])->label('人物生平') ?>

    <?= $form->field($model, 'achievements')->textarea(['rows' => 6])->label('主要成就') ?>

    <?= $form->field($model, 'cover_image_url')->textInput(['maxlength' => true, 'placeholder' => 'http://...'])->label('封面图片链接') ?>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? '创建人物' : '更新人物', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
