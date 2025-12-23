

<?php
/*
* Team: 实验楼C4
* Coding by 杜子妍, 2313312
* This is the important meeting highlight create view for backend management of anti-Japanese war important meeting highlights.
*/
use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model common\models\ImportantMeetingHighlight */
/* @var $meetingList array */

$this->title = '创建会议亮点';
$this->params['breadcrumbs'][] = ['label' => '会议亮点', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="important-meeting-highlight-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('返回列表', ['index'], ['class' => 'btn btn-default']) ?>
    </p>

    <?= $this->render('_form', [
        'model' => $model,
        'meetingList' => $meetingList,
    ]) ?>

</div>
