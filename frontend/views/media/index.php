<?php
use yii\helpers\Html;

$this->title = '影视信息';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="media-index">
    <h1><?= Html::encode($this->title) ?></h1>

    <div class="row">
        <?php foreach ($movies as $movie): ?>
            <div class="col-md-3">
                <div class="thumbnail">
                    <?= Html::a(
                        Html::img($movie->getThumbUploadUrl('image'), ['class' => 'img-responsive']) . 
                        '<div class="caption">' . 
                            '<h4>' . Html::encode($movie->title) . '</h4>' . 
                        '</div>',
                        ['media/view', 'id' => $movie->id]
                    ) ?>
                </div>
            </div>
        <?php endforeach; ?>
    </div>
</div>