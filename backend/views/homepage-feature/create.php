
<?php
/*
* Team: 实验楼C4
* Coding by 杜子妍, 2313312
* This is the homepage feature create view for backend management.
*/

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model common\models\HomepageFeature */

$this->title = '创建首页条目';
$this->params['breadcrumbs'][] = ['label' => '专题首页内容', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="homepage-feature-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('返回列表', ['index'], ['class' => 'btn btn-default']) ?>
    </p>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
