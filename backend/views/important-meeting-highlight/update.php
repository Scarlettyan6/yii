
<?php
/*
* Team: 实验楼C4
* Coding by 杜子妍, 2313312
* This is the important meeting highlight update view for backend management of anti-Japanese war important meeting highlights.
*/

use yii\helpers\Html;

/* @var $this yii\web.View */
/* @var $model common\models\ImportantMeetingHighlight */
/* @var $meetingList array */

$this->title = '更新亮点: ' . $model->title;
$this->params['breadcrumbs'][] = ['label' => '会议亮点', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->title, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = '更新';
?>
<div class="important-meeting-highlight-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
        'meetingList' => $meetingList,
    ]) ?>

</div>
