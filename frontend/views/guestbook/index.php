<?php
use yii\helpers\Html;
use yii\widgets\ActiveForm;
use yii\widgets\ListView;

$this->title = '留言板';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="guestbook-index">
    <h1><?= Html::encode($this->title) ?></h1>

    <div class="guestbook-form">
        <?php $form = ActiveForm::begin(); ?>

        <?= $form->field($model, 'nickname')->textInput(['maxlength' => true]) ?>

        <?= $form->field($model, 'content')->textarea(['rows' => 6]) ?>

        <div class="form-group">
            <?= Html::submitButton('提交', ['class' => 'btn btn-primary'])
            ?>
        </div>

        <?php ActiveForm::end(); ?>
    </div>

    <hr>

    <?= ListView::widget([
        'dataProvider' => $dataProvider,
        'itemView' => '_message',
        'summary' => '',
    ]) ?>

</div>