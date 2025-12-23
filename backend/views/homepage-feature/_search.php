
<?php
/*
* Team: 实验楼C4
* Coding by 杜子妍, 2313312
* This is the homepage feature search form partial for backend management.
*/

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model backend\models\HomepageFeatureSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="homepage-feature-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'title') ?>

    <?= $form->field($model, 'link_url') ?>

    <?= $form->field($model, 'is_active')->dropDownList(['' => '全部', 1 => '启用', 0 => '停用']) ?>

    <div class="form-group">
        <?= Html::submitButton('搜索', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('重置', ['class' => 'btn btn-default']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
