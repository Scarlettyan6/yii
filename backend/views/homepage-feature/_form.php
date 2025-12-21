<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model common\models\HomepageFeature */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="homepage-feature-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'title')->textInput(['maxlength' => true])->label('标题') ?>

    <?= $form->field($model, 'subtitle')->textInput(['maxlength' => true])->label('副标题') ?>

    <?= $form->field($model, 'description')->textarea(['rows' => 3])->label('描述内容') ?>

    <?= $form->field($model, 'image_url')->textInput(['maxlength' => true])->label('图片链接')->hint('填写可访问的图片URL，如 /img/home/banner1.jpg') ?>

    <?= $form->field($model, 'link_url')->textInput(['maxlength' => true])->label('跳转链接')->hint('点击后跳转的链接，例如外部文章或站内路由') ?>

    <?= $form->field($model, 'display_order')->input('number')->label('显示顺序')->hint('数字越小越靠前') ?>

    <?= $form->field($model, 'is_active')->checkbox()->label('是否启用') ?>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? '创建特色内容' : '更新特色内容', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
