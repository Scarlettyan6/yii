<?php
namespace backend\controllers;

use Yii;
use yii\web\Controller;
use yii\data\ActiveDataProvider;
use yii\web\NotFoundHttpException;
use common\models\WarDataset;

class WarDatasetController extends Controller
{
    public function actionIndex()
    {
        $dp = new ActiveDataProvider([
            'query' => WarDataset::find()->orderBy(['display_order' => SORT_ASC, 'id' => SORT_ASC]),
            'pagination' => ['pageSize' => 20],
        ]);

        return $this->render('index', ['dataProvider' => $dp]);
    }

    public function actionUpdate($id)
    {
        $model = WarDataset::findOne($id);
        if (!$model) throw new NotFoundHttpException();

        if ($model->load(Yii::$app->request->post())) {
            $model->updated_at = time();
            if ($model->save()) {
                return $this->redirect(['index']);
            }
        }
        return $this->render('update', ['model' => $model]);
    }
}
