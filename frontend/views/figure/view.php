<?php
use yii\helpers\Html;

/* @var $figure common\models\Figure */

$this->title = $figure->name;
$this->params['breadcrumbs'][] = ['label' => '人物专栏', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>

<div class="figure-view row">
    <div class="col-md-4">
        <div class="thumbnail">
            <?php $imageUrl = $figure->cover_image_url ?: 'https://via.placeholder.com/400x400?text=Figure'; ?>
            <img src="<?= Html::encode($imageUrl) ?>" alt="<?= Html::encode($figure->name) ?>" class="img-responsive">
        </div>
    </div>
    <div class="col-md-8">
        <h1><?= Html::encode($figure->name) ?></h1>
        <?php if ($figure->achievements): ?>
            <h4>主要功绩</h4>
            <p><?= nl2br(Html::encode($figure->achievements)) ?></p>
        <?php endif; ?>
    </div>
</div>

<?php if ($figure->biography): ?>
    <div class="panel panel-default">
        <div class="panel-heading">人物简介</div>
        <div class="panel-body">
            <?= nl2br(Html::encode($figure->biography)) ?>
        </div>
    </div>
<?php endif; ?>

<p><?= Html::a('返回列表', ['index'], ['class' => 'btn btn-default']) ?></p>
