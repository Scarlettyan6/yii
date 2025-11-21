<?php
use yii\helpers\Html;

$this->title = '抗战数据';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="data-index">
    <h1><?= Html::encode($this->title) ?></h1>

    <?php foreach ($categories as $category): ?>
        <h2><?= Html::encode($category->name) ?></h2>
        <p><?= Html::encode($category->description) ?></p>

        <table class="table table-bordered">
            <thead>
                <tr>
                    <th>项目</th>
                    <th>数值</th>
                    <th>单位</th>
                    <th>来源</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($category->statistics as $statistic): ?>
                    <tr>
                        <td><?= Html::encode($statistic->item) ?></td>
                        <td><?= Html::encode($statistic->value) ?></td>
                        <td><?= Html::encode($statistic->unit) ?></td>
                        <td><?= Html::encode($statistic->source) ?></td>
                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    <?php endforeach; ?>

</div>