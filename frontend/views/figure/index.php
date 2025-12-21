<?php
use yii\helpers\Html;
use yii\widgets\LinkPager;

/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = '人物专栏';
$this->params['breadcrumbs'][] = $this->title;
$figures = $dataProvider->getModels();
$pagination = $dataProvider->getPagination();
?>
<div class="figure-index figure-page">
    <style>
        .figure-page {
            font-family: "Microsoft YaHei", "Noto Sans SC", Arial, sans-serif;
            background: linear-gradient(180deg, #fffaf4 0%, #f6eadb 100%);
            padding: 30px 15px 60px;
            color: #2c1a10;
        }
        .figure-page h1 {
            color: #b6401a;
            font-weight: 780;
            text-align: center;
            margin-bottom: 25px;
            letter-spacing: 0.5px;
        }
        .figure-card-wrapper {
            margin-bottom: 20px;
        }
        .figure-card {
            border: 1px solid rgba(182, 90, 46, 0.12);
            border-radius: 12px;
            box-shadow: 0 10px 30px rgba(62, 32, 16, 0.08);
            overflow: hidden;
            transition: transform 0.3s ease, box-shadow 0.3s ease;
            background: #fffdf9;
        }
        .figure-card:hover {
            transform: translateY(-5px);
            box-shadow: 0 16px 36px rgba(182, 64, 26, 0.15);
        }
        .figure-card__img-wrap {
            background: #f9eee1;
            padding: 12px;
        }
        .figure-card__img {
            border-radius: 6px;
            max-height: 260px;
            object-fit: cover;
            margin: 0 auto;
        }
        .figure-card__title {
            color: #b6401a;
            font-weight: 700;
            margin: 10px 0 6px;
        }
        .btn-figure {
            background: linear-gradient(135deg, #d55b2a 0%, #b6401a 100%);
            border: none;
            color: #fff;
            padding: 6px 14px;
            border-radius: 20px;
        }
        .btn-figure:hover {
            background: linear-gradient(135deg, #b6401a 0%, #8f2c0f 100%);
            color: #fff;
        }
        .pagination > li > a,
        .pagination > li > span {
            color: #b6401a;
            border: 1px solid rgba(182, 64, 26, 0.2);
        }
        .pagination > .active > a,
        .pagination > .active > span,
        .pagination > .active > a:hover,
        .pagination > .active > span:hover,
        .pagination > .active > a:focus,
        .pagination > .active > span:focus {
            background: linear-gradient(135deg, #d55b2a 0%, #b6401a 100%);
            border-color: rgba(182, 64, 26, 0.4);
            color: #fff;
        }
    </style>

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
                        <p><?= Html::a('查看详情', ['view', 'id' => $figure->id], ['class' => 'btn btn-sm btn-figure']) ?></p>
                    </div>
                </div>
            </div>
        <?php endforeach; ?>
    </div>

    <?= LinkPager::widget([
        'pagination' => $pagination,
    ]) ?>
</div>
