<?php
use yii\helpers\Html;
use yii\helpers\StringHelper;

$this->title = '人物专栏';
$this->params['breadcrumbs'][] = $this->title;
?>

<div class="figure-index">
    <h1><?= Html::encode($this->title) ?></h1>

    <!-- 2×3 网格布局 -->
    <div class="row">
        <?php foreach (array_chunk($figures, 3) as $figureRow): ?>
            <div class="row" style="margin-bottom: 30px;">
                <?php foreach ($figureRow as $figure): ?>
                    <div class="col-md-4">
                        <div class="figure-card text-center" style="
                            background: #fff;
                            border-radius: 12px;
                            padding: 25px;
                            box-shadow: 0 3px 15px rgba(0,0,0,0.08);
                            transition: all 0.3s ease;
                            border: 1px solid #f0f0f0;
                            height: 100%;
                            margin: 10px;
                        ">
                            <?= Html::a(
                                Html::img($figure->getThumbUploadUrl('image'), [
                                    'class' => 'img-circle',
                                    'style' => 'width: 100px; height: 100px; object-fit: cover; border: 3px solid #f8f9fa; box-shadow: 0 3px 10px rgba(0,0,0,0.1); margin-bottom: 15px;'
                                ]),
                                ['figure/view', 'id' => $figure->id]
                            ) ?>
                            
                            <h4 style="margin: 10px 0 5px; color: #333; font-weight: 600;">
                                <?= Html::encode($figure->name) ?>
                            </h4>
                            
                            <?php if (isset($figure->title) && $figure->title): ?>
                                <p style="color: #666; font-size: 0.9em; margin-bottom: 10px; font-style: italic;">
                                    <?= Html::encode($figure->title) ?>
                                </p>
                            <?php endif; ?>
                            
                            <?php if (isset($figure->description) && $figure->description): ?>
                                <p style="color: #777; font-size: 0.85em; line-height: 1.4; text-align: left; margin: 10px 0;">
                                    <?= StringHelper::truncate(Html::encode($figure->description), 80) ?>
                                </p>
                            <?php endif; ?>
                            
                            <?php if (isset($figure->tags) && $figure->tags): ?>
                                <div style="margin: 10px 0;">
                                    <?php 
                                    $tags = is_array($figure->tags) ? $figure->tags : explode(',', $figure->tags);
                                    foreach (array_slice($tags, 0, 3) as $tag):
                                    ?>
                                        <span style="
                                            display: inline-block;
                                            background: #e9ecef;
                                            color: #495057;
                                            padding: 2px 8px;
                                            border-radius: 10px;
                                            font-size: 0.75em;
                                            margin: 2px;
                                        "><?= Html::encode(trim($tag)) ?></span>
                                    <?php endforeach; ?>
                                </div>
                            <?php endif; ?>
                            
                            <div style="display: flex; justify-content: space-around; margin-top: 15px; padding-top: 15px; border-top: 1px solid #f0f0f0;">
                                <?php if (isset($figure->view_count)): ?>
                                    <div style="text-align: center;">
                                        <div style="font-weight: bold; color: #007bff;"><?= $figure->view_count ?></div>
                                        <div style="font-size: 0.75em; color: #666;">浏览</div>
                                    </div>
                                <?php endif; ?>
                                
                                <?php if (isset($figure->like_count)): ?>
                                    <div style="text-align: center;">
                                        <div style="font-weight: bold; color: #28a745;"><?= $figure->like_count ?></div>
                                        <div style="font-size: 0.75em; color: #666;">点赞</div>
                                    </div>
                                <?php endif; ?>
                                
                                <div style="text-align: center;">
                                    <?= Html::a('查看详情', ['figure/view', 'id' => $figure->id], [
                                        'class' => 'btn btn-primary btn-sm',
                                        'style' => 'font-size: 0.8em; padding: 5px 15px;'
                                    ]) ?>
                                </div>
                            </div>
                        </div>
                    </div>
                <?php endforeach; ?>
            </div>
        <?php endforeach; ?>
    </div>
</div>

<style>
.figure-card:hover {
    transform: translateY(-3px);
    box-shadow: 0 8px 25px rgba(0,0,0,0.12);
}
.img-circle {
    border-radius: 50%;
}
</style>