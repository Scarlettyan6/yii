<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model common\models\ImportantMeeting */

$this->title = '创建重要会议';
$this->params['breadcrumbs'][] = ['label' => '重要会议', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="important-meeting-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
