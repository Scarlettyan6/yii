<?php
/*
* Team: 实验楼C4
* Coding by 谭诗洋, 2314003
* This is the guestbook message create view for backend management of message board/guestbook.
*/

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model common\models\GuestbookMessage */

$this->title = '新建留言';
$this->params['breadcrumbs'][] = ['label' => '留言管理', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="guestbook-message-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('返回列表', ['index'], ['class' => 'btn btn-default']) ?>
    </p>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
