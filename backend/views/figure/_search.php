

<?php

/*
* Team: 实验楼C4
* Coding by 谢闻星, 2310500
* This is the figure search form partial for backend management of historical figures column.
*/

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model backend\models\FigureSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="figure-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'id')->label('人物ID') ?>

    <?= $form->field($model, 'name')->label('人物姓名') ?>

    <?= $form->field($model, 'birth_date')->label('出生日期') ?>

    <?= $form->field($model, 'death_date')->label('逝世日期') ?>

    <?= $form->field($model, 'biography')->label('人物生平') ?>

    <?php // echo $form->field($model, 'achievements') ?>

    <?php // echo $form->field($model, 'cover_image_url') ?>

    <?php // echo $form->field($model, 'created_at') ?>

    <?php // echo $form->field($model, 'updated_at') ?>

    <div class="form-group">
        <?= Html::submitButton('搜索', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('重置', ['class' => 'btn btn-outline-secondary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
