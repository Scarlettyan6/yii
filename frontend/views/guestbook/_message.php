

<?php
/*
* Team: 实验楼C4
* Coding by 谭诗洋, 2314003
* This is the guestbook/message board page.
*/

use yii\helpers\Html;
?>

<div class="message">
    <p><strong><?= Html::encode($model->nickname) ?></strong> <em>(<?= Yii::$app->formatter->asDatetime($model->created_at) ?>)</em></p>
    <p><?= nl2br(Html::encode($model->content)) ?></p>
</div>