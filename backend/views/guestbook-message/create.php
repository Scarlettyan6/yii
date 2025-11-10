<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model common\models\GuestbookMessage */

$this->title = 'Create Guestbook Message';
$this->params['breadcrumbs'][] = ['label' => 'Guestbook Messages', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="guestbook-message-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
