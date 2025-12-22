<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel backend\models\BattleSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Battles';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="battle-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Create Battle', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'id',
            'name',
            'start_date',
            'end_date',
            'main_location',
            //'main_latitude',
            //'main_longitude',
            //'description:ntext',
            //'result:ntext',
            //'casualties_china',
            //'casualties_japan',
            //'created_at',
            //'updated_at',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>


</div>
