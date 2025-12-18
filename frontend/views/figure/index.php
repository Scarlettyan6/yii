<?php
use yii\helpers\Html;

$this->title = '人物专栏';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="figure-index">
    <h1><?= Html::encode($this->title) ?></h1>

    <div class="row">
        <?php foreach ($figures as $figure): ?>
            <div class="col-md-3 text-center">
                <?= Html::a(
                    Html::img($figure->getThumbUploadUrl('image'), ['class' => 'img-circle']) . 
                    '<h4>' . Html::encode($figure->name) . '</h4>',
                    ['figure/view', 'id' => $figure->id]
                ) ?>
            </div>
        <?php endforeach; ?>
    </div>
</div>