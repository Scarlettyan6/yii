

<?php
/*
* Team: 实验楼C4
* Coding by 杜子妍, 2313312
* This is the homepage feature view for backend management.
*/
use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model common\models\HomepageFeature */

$this->title = $model->title;
$this->params['breadcrumbs'][] = ['label' => '专题首页内容', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="homepage-feature-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('返回列表', ['index'], ['class' => 'btn btn-default']) ?>
        <?= Html::a('编辑条目', ['update', 'id' => $model->id], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('删除条目', ['delete', 'id' => $model->id], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => '确定要删除这个首页条目吗？此操作不可恢复。',
                'method' => 'post',
            ],
        ]) ?>
    </p>

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'id',
            'title',
            'subtitle',
            'description:ntext',
            'image_url:url',
            'link_url:url',
            'display_order',
            [
                'attribute' => 'is_active',
                'value' => $model->is_active ? '启用' : '停用',
            ],
            'created_at:datetime',
            'updated_at:datetime',
        ],
    ]) ?>

</div>
