<?php

/*
* Team: 实验楼C4
* Coding by 杜子妍, 2313312
* This is the battle create view for backend management of anti-Japanese war landmarks.
*/

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model common\models\Battle */

$this->title = '新建战役';
$this->params['breadcrumbs'][] = ['label' => '抗战地标', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="battle-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('返回列表', ['index'], ['class' => 'btn btn-default']) ?>
    </p>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
