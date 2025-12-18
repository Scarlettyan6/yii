<?php
use yii\helpers\Html;
use yii\widgets\LinkPager;

/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = '人物专栏';
$this->params['breadcrumbs'][] = $this->title;
$figures = $dataProvider->getModels();
$pagination = $dataProvider->getPagination();
?>
<div class="figure-index">
    <h1><?= Html::encode($this->title) ?></h1>

    <div class="row">
        <?php foreach ($figures as $figure): ?>
            <div class="col-sm-6 col-md-3 figure-card-wrapper">
                <div class="thumbnail text-center figure-card">
                    <?php
                    $imageUrl = $figure->cover_image_url ?: 'https://via.placeholder.com/300x300?text=Figure';
                    ?>
                    <a href="<?= Html::encode(\yii\helpers\Url::to(['view', 'id' => $figure->id])) ?>">
                        <div class="figure-card__img-wrap">
                            <img src="<?= Html::encode($imageUrl) ?>" alt="<?= Html::encode($figure->name) ?>" class="img-responsive figure-card__img">
                        </div>
                    </a>
                    <div class="caption">
                        <h4 class="figure-card__title"><?= Html::encode($figure->name) ?></h4>
                        <p><?= Html::a('查看详情', ['view', 'id' => $figure->id], ['class' => 'btn btn-sm btn-info']) ?></p>
                    </div>
                </div>
            </div>
        <?php endforeach; ?>
    </div>

    <?= LinkPager::widget([
        'pagination' => $pagination,
    ]) ?>
</div>

