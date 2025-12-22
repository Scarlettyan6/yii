<?php
use yii\helpers\Html;
use yii\widgets\ActiveForm;

$this->title = '留言板';
$this->params['breadcrumbs'][] = $this->title;
?>

<style>
.guestbook-form {
    border: 1px solid #ddd;
    border-radius: 8px;
    padding: 20px;
    margin-bottom: 30px;
}

.messages-section {
    border: 1px solid #ddd;
    border-radius: 8px;
    padding: 20px;
}

.messages-section h3 {
    margin-top: 0;
    margin-bottom: 20px;
    padding-bottom: 10px;
    border-bottom: 1px solid #eee;
}

.message-item {
    border: 1px solid #e0e0e0;
    border-radius: 6px;
    padding: 15px;
    margin-bottom: 12px;
}

.message-item:last-child {
    margin-bottom: 0;
}

.message-header {
    display: flex;
    justify-content: space-between;
    margin-bottom: 10px;
    font-size: 0.9rem;
}

.message-author {
    font-weight: 600;
    color: #333;
}

.message-time {
    color: #999;
}

.message-content {
    color: #555;
    line-height: 1.6;
}

.empty-message {
    text-align: center;
    color: #999;
    padding: 30px;
}
</style>

<div class="guestbook-index">
    <h1><?= Html::encode($this->title) ?></h1>

    <!-- 留言表单区 -->
    <div class="guestbook-form">
        <?php $form = ActiveForm::begin(); ?>

        <?= $form->field($model, 'nickname')->textInput(['maxlength' => true]) ?>

        <?= $form->field($model, 'content')->textarea(['rows' => 5]) ?>

        <div class="form-group">
            <?= Html::submitButton('提交', ['class' => 'btn btn-primary']) ?>
        </div>

        <?php ActiveForm::end(); ?>
    </div>

    <!-- 留言列表区 -->
    <div class="messages-section">
        <h3>留言列表</h3>
        
        <?php if (!empty($messages)): ?>
            <?php foreach ($messages as $message): ?>
                <div class="message-item">
                    <div class="message-header">
                        <span class="message-author"><?= Html::encode($message->nickname) ?></span>
                        <span class="message-time"><?= Yii::$app->formatter->asDatetime($message->created_at) ?></span>
                    </div>
                    <div class="message-content">
                        <?= Html::encode($message->content) ?>
                    </div>
                </div>
            <?php endforeach; ?>
        <?php else: ?>
            <p class="empty-message">暂无留言</p>
        <?php endif; ?>
    </div>
</div>