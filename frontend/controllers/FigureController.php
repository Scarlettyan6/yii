<?php

namespace frontend\controllers;

use yii\web\Controller;
use yii\data\ActiveDataProvider;
use common\models\Figure;
use yii\web\NotFoundHttpException;

class FigureController extends Controller
{
    /**
     * 人物列表（分页）。
     */
    public function actionIndex()
    {
        $dataProvider = new ActiveDataProvider([
            'query' => Figure::find()->where(['deleted_at' => null])->orderBy(['name' => SORT_ASC]),
            'pagination' => [
                'pageSize' => 12,
            ],
        ]);

        return $this->render('index', [
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * 人物详情。
     *
     * @param int $id
     * @return string
     * @throws NotFoundHttpException
     */
    public function actionView($id)
    {
        $figure = Figure::find()->where(['id' => $id, 'deleted_at' => null])->one();

        if ($figure === null) {
            throw new NotFoundHttpException('您所查找的人物不存在。');
        }

        return $this->render('view', [
            'figure' => $figure,
        ]);
    }
}
