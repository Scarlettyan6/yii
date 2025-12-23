

<?php
/*
* Team: 实验楼C4
* Coding by 杜子妍, 2313312
* This is the important meeting view for backend management of anti-Japanese war important meetings.
*/
use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model common\models\ImportantMeeting */

$this->title = $model->title;
$this->params['breadcrumbs'][] = ['label' => '重要会议', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="important-meeting-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('返回列表', ['index'], ['class' => 'btn btn-default']) ?>
        <?= Html::a('更新会议', ['update', 'id' => $model->id], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('删除会议', ['delete', 'id' => $model->id], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => '确定要删除这条记录吗？此操作不可恢复。',
                'method' => 'post',
            ],
        ]) ?>
    </p>

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'id',
            'title',
            'meeting_date',
            'location',
            'cover_image',
            'link_url',
            'summary:ntext',
            'display_order',
            'is_active:boolean',
            'created_at:datetime',
            'updated_at:datetime',
        ],
    ]) ?>

    <?php if (!empty($model->highlights)): ?>
        <h3 style="margin-top:20px;">会议亮点</h3>
        <ul>
            <?php foreach ($model->highlights as $highlight): ?>
                <li>
                    <strong><?= Html::encode($highlight->title) ?></strong>
                    <?php if (!empty($highlight->description)): ?>
                        — <?= Html::encode($highlight->description) ?>
                    <?php endif; ?>
                    <?= Html::a('[编辑]', ['important-meeting-highlight/update', 'id' => $highlight->id], ['style' => 'margin-left:6px;']) ?>
                </li>
            <?php endforeach; ?>
        </ul>
    <?php endif; ?>

</div>
