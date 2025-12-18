<?php
namespace frontend\controllers;

use yii\web\Controller;
use common\models\Battle;
use yii\web\NotFoundHttpException;
use frontend\assets\EChartsAsset;

class BattleController extends Controller
{
    /**
     * 显示战役列表页面（地图和列表）
     */
    public function actionIndex()
    {
        // 使用 ECharts 展示交互地图
        EChartsAsset::register($this->view);

        $battles = Battle::find()->orderBy(['start_date' => SORT_ASC])->all();

        // 前端地图数据（仅含必需字段，且要求有经纬度）
        $battlePoints = Battle::find()
            ->select([
                'id', 'name', 'main_location', 'start_date', 'end_date',
                'description', 'main_latitude', 'main_longitude'
            ])
            ->where(['not', ['main_latitude' => null]])
            ->andWhere(['not', ['main_longitude' => null]])
            ->asArray()
            ->all();

        return $this->render('index', [
            'battles' => $battles,
            'battlePoints' => $battlePoints,
        ]);
    }

    /**
     * 显示单个战役详情页
     * @param integer $id 战役ID
     */
    public function actionView($id)
    {
        $battle = Battle::findOne($id);

        if ($battle === null) {
            throw new NotFoundHttpException('您所查找的战役不存在。');
        }

        // 假设在 Battle.php 中定义了 getMapMarkers()
        $markers = method_exists($battle, 'getMapMarkers') ? $battle->getMapMarkers()->all() : [];

        return $this->render('view', [
            'battle' => $battle,
            'markers' => $markers,
        ]);
    }
}
