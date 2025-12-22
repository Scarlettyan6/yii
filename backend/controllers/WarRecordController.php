<?php

namespace backend\controllers;

use Yii;
use common\models\WarDataset;
use common\models\WarRecord;
use backend\models\WarRecordSearch;
use yii\data\ActiveDataProvider;
use yii\filters\VerbFilter;
use yii\filters\AccessControl;
use yii\web\Controller;
use yii\web\NotFoundHttpException;

/**
 * WarRecordController implements the CRUD actions for WarRecord model.
 */
class WarRecordController extends Controller
{
    /**
     * {@inheritdoc}
     */
    public function behaviors()
    {
        return [
            'access' => [
                'class' => AccessControl::class,
                'rules' => [
                    [
                        'allow' => true,
                        'roles' => ['@'],
                    ],
                ],
            ],
            'verbs' => [
                'class' => VerbFilter::class,
                'actions' => [
                    'delete' => ['POST'],
                ],
            ],
        ];
    }

    /**
     * Lists all WarRecord models (supports dataset filter + keyword search).
     * @param integer|null $dataset_id
     * @param string|null $q
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModel = new WarRecordSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);
        $datasets = WarDataset::find()->orderBy(['display_order' => SORT_ASC, 'id' => SORT_ASC])->all();

        // 调试信息
        Yii::info('WarRecordController actionIndex called', 'debug');
        Yii::info('searchModel type: ' . get_class($searchModel), 'debug');

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
            'datasets' => $datasets,
        ]);
    }

    /**
     * Displays a single WarRecord model.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionView($id)
    {
        return $this->render('view', [
            'model' => $this->findModel($id),
        ]);
    }

    /**
     * Creates a new WarRecord model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @param integer|null $dataset_id
     * @return mixed
     */
    public function actionCreate($dataset_id = null)
    {
        $model = new WarRecord();
        if (!empty($dataset_id)) {
            $model->dataset_id = (int)$dataset_id;
        }

        if ($model->load(Yii::$app->request->post())) {
            $model->created_at = $model->created_at ?: time();
            $model->updated_at = time();
            if ($model->save()) {
                return $this->redirect(['view', 'id' => $model->id]);
            }
        }

        return $this->render('create', [
            'model' => $model,
        ]);
    }

    /**
     * Updates an existing WarRecord model.
     * If update is successful, the browser will be redirected to the 'index' page (keeps dataset filter).
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionUpdate($id)
    {
        $model = $this->findModel($id);

        if ($model->load(Yii::$app->request->post())) {
            $model->updated_at = time();
            if ($model->save()) {
                return $this->redirect(['index', 'dataset_id' => $model->dataset_id]);
            }
        }

        return $this->render('update', [
            'model' => $model,
        ]);
    }

    /**
     * Deletes an existing WarRecord model.
     * If deletion is successful, the browser will be redirected to the 'index' page (keeps dataset filter).
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionDelete($id)
    {
        $model = $this->findModel($id);
        $datasetId = $model->dataset_id;

        $model->delete();

        return $this->redirect(['index', 'dataset_id' => $datasetId]);
    }

    /**
     * Finds the WarRecord model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return WarRecord the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = WarRecord::findOne((int)$id)) !== null) {
            return $model;
        }

        throw new NotFoundHttpException('The requested page does not exist.');
    }
}
