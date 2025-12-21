<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model common\models\Figure */

$this->title = '新建人物';
$this->params['breadcrumbs'][] = ['label' => '抗战人物', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="figure-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('返回列表', ['index'], ['class' => 'btn btn-default']) ?>
    </p>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
