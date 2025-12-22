<?php
namespace backend\controllers;

use Yii;
use yii\web\Controller;
use yii\data\ActiveDataProvider;
use yii\web\NotFoundHttpException;
use common\models\WarDataset;
use common\models\WarRecord;

class WarRecordController extends Controller
{
    public function actionIndex($dataset_id = null, $q = null)
    {
        $datasets = WarDataset::find()->orderBy(['display_order'=>SORT_ASC,'id'=>SORT_ASC])->all();

        $query = WarRecord::find()->with('dataset')->orderBy(['id'=>SORT_ASC]);
        if ($dataset_id) $query->andWhere(['dataset_id' => (int)$dataset_id]);
        if ($q) $query->andWhere(['like', 'data_json', $q]);

        $dp = new ActiveDataProvider([
            'query' => $query,
            'pagination' => ['pageSize' => 50],
        ]);

        return $this->render('index', [
            'dataProvider' => $dp,
            'datasets' => $datasets,
            'dataset_id' => $dataset_id,
            'q' => $q,
        ]);
    }

    public function actionUpdate($id)
    {
        $model = WarRecord::findOne($id);
        if (!$model) throw new NotFoundHttpException();

        if ($model->load(Yii::$app->request->post())) {
            $model->updated_at = time();
            if ($model->save()) {
                return $this->redirect(['index', 'dataset_id' => $model->dataset_id]);
            }
        }

        return $this->render('update', ['model' => $model]);
    }

    public function actionDelete($id)
    {
        $model = WarRecord::findOne($id);
        if (!$model) throw new NotFoundHttpException();
        $datasetId = $model->dataset_id;
        $model->delete();
        return $this->redirect(['index', 'dataset_id' => $datasetId]);
    }
}
