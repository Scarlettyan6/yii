<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model common\models\HomepageFeature */

$this->title = '编辑首页条目: ' . $model->title;
$this->params['breadcrumbs'][] = ['label' => '专题首页内容', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->title, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = '编辑';
?>
<div class="homepage-feature-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
