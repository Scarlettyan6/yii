<?php
use yii\helpers\Html;
use yii\widgets\LinkPager;
use common\models\MediaResource;

/* @var $dataProvider yii\data\ActiveDataProvider */
/* @var $currentType mixed */

$this->title = '影视信息';
$this->params['breadcrumbs'][] = $this->title;

$typeOptions = MediaResource::typeLabels();
$mediaList = $dataProvider->getModels();
$pagination = $dataProvider->getPagination();
?>
<div class="media-index">
    <h1><?= Html::encode($this->title) ?></h1>

    <div class="btn-group" role="group" aria-label="media-type-filter">
        <?= Html::a('全部', ['index'], ['class' => $currentType === null || $currentType === '' ? 'btn btn-primary active' : 'btn btn-default']) ?>
        <?php foreach ($typeOptions as $typeValue => $typeLabel): ?>
            <?= Html::a(
                Html::encode($typeLabel),
                ['index', 'type' => $typeValue],
                ['class' => (string)$currentType === (string)$typeValue ? 'btn btn-primary active' : 'btn btn-default']
            ) ?>
        <?php endforeach; ?>
    </div>

    <div class="row" style="margin-top: 20px;">
        <?php if (empty($mediaList)): ?>
            <div class="col-xs-12">
                <p class="text-muted">暂无数据。</p>
            </div>
        <?php else: ?>
            <?php foreach ($mediaList as $media): ?>
                <div class="col-sm-6 col-md-3">
                    <div class="thumbnail text-center media-card">
                        <a href="<?= Html::encode(\yii\helpers\Url::to(['view', 'id' => $media->id])) ?>">
                            <img src="<?= Html::encode($media->getCoverUrl()) ?>" alt="<?= Html::encode($media->title) ?>" class="img-responsive media-card__img">
                        </a>
                        <div class="caption">
                            <h4 class="media-card__title"><?= Html::encode($media->title) ?></h4>
                            <p><span class="label label-info"><?= Html::encode($media->getTypeLabel()) ?></span></p>
                        </div>
                    </div>
                </div>
            <?php endforeach; ?>
        <?php endif; ?>
    </div>

    <?= LinkPager::widget([
        'pagination' => $pagination,
    ]) ?>
</div>
