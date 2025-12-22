<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model common\models\HomepageFeature */

$this->title = '创建首页条目';
$this->params['breadcrumbs'][] = ['label' => '专题首页内容', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="homepage-feature-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
