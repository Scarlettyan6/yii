

<?php
/*
* Team: 实验楼C4
* Coding by 谢闻星, 2310500
* This is the media resource view for backend management of film and television information.
*/
use yii\helpers\Html;
use yii\widgets\DetailView;
use common\models\MediaResource;

/* @var $this yii\web\View */
/* @var $model common\models\MediaResource */

$this->title = $model->title;
$this->params['breadcrumbs'][] = ['label' => 'Media Resources', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
\yii\web\YiiAsset::register($this);

$typeLabels = MediaResource::typeLabels();
ksort($typeLabels);
?>
<div class="media-resource-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('返回列表', ['index'], ['class' => 'btn btn-default']) ?>
        <?= Html::a('编辑资源', ['update', 'id' => $model->id], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('删除资源', ['delete', 'id' => $model->id], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => '确定要删除这个影视资源吗？此操作不可恢复。',
                'method' => 'post',
            ],
        ]) ?>
    </p>

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'id',
            'title',
            [
                'attribute' => 'type',
                'value' => $typeLabels[$model->type] ?? $model->type,
            ],
            'url:url',
            'path',
            'description:ntext',
            'linkable_type',
            'linkable_id',
            'created_at',
            'updated_at',
        ],
    ]) ?>

</div>
