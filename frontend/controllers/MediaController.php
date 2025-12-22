<?php

namespace frontend\controllers;

use Yii;
use yii\web\Controller;
use yii\data\ActiveDataProvider;
use yii\web\NotFoundHttpException;
use common\models\MediaResource;

class MediaController extends Controller
{
    /**
     * 影视列表，支持按类型筛选与分页。
     */
    public function actionIndex()
    {
        $type = Yii::$app->request->get('type');

        $query = MediaResource::find()->orderBy(['created_at' => SORT_DESC]);
        if ($type !== null && $type !== '') {
            $query->andWhere(['type' => (int)$type]);
        }

        $dataProvider = new ActiveDataProvider([
            'query' => $query,
            'pagination' => [
                'pageSize' => 12,
            ],
        ]);

        return $this->render('index', [
            'dataProvider' => $dataProvider,
            'currentType' => $type,
        ]);
    }

    /**
     * 影视详情。
     *
     * @param int $id
     * @return string
     * @throws NotFoundHttpException
     */
    public function actionView($id)
    {
        $model = MediaResource::findOne($id);
        if (!$model) {
            throw new NotFoundHttpException('影视信息不存在');
        }

        return $this->render('view', [
            'model' => $model,
        ]);
    }
}
