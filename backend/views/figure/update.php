<?php

/*
* Team: 实验楼C4
* Coding by 谢闻星, 2310500
* This is the figure update view for backend management of historical figures column.
*/

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model common\models\Figure */

$this->title = '编辑人物：' . $model->name;
$this->params['breadcrumbs'][] = ['label' => '抗战人物', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->name, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = '编辑';
?>
<div class="figure-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
