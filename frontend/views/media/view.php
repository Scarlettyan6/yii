
<?php
use yii\helpers\Html;
/*
* Team: 实验楼C4
* Coding by 谢闻星, 2310500
* This is the film and television information page.
*/

/* @var $model common\models\MediaResource */

$this->title = $model->title;
$this->params['breadcrumbs'][] = ['label' => '影视信息', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;

$linkedFigure = $model->getLinkedFigure();
?>

<div class="media-view row">
    <div class="col-md-4">
        <div class="thumbnail">
            <img src="<?= Html::encode($model->getCoverUrl()) ?>" alt="<?= Html::encode($model->title) ?>" class="img-responsive">
        </div>
    </div>
    <div class="col-md-8">
        <h1><?= Html::encode($model->title) ?></h1>
        <p><span class="label label-info"><?= Html::encode($model->getTypeLabel()) ?></span></p>

        <?php if (!empty($model->description)): ?>
            <h4>简介</h4>
            <p><?= nl2br(Html::encode($model->description)) ?></p>
        <?php endif; ?>

        <?php if (!empty($model->url)): ?>
            <p><?= Html::a('前往观看/了解', $model->url, ['class' => 'btn btn-success', 'target' => '_blank', 'rel' => 'noopener']) ?></p>
        <?php endif; ?>

        <?php if ($linkedFigure): ?>
            <h4>关联人物</h4>
            <p><?= Html::a(Html::encode($linkedFigure->name), ['/figure/view', 'id' => $linkedFigure->id], ['class' => 'btn btn-link']) ?></p>
        <?php endif; ?>

        <p><?= Html::a('返回列表', ['index'], ['class' => 'btn btn-default']) ?></p>
    </div>
</div>
