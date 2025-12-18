<?php

namespace backend\controllers;

use common\models\FigureRole;
use backend\models\FigureRoleSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;

/**
 * FigureRoleController implements the CRUD actions for FigureRole model.
 */
class FigureRoleController extends Controller
{
    /**
     * {@inheritdoc}
     */
    public function behaviors()
    {
        return [
            'verbs' => [
                'class' => VerbFilter::class,
                'actions' => [
                    'delete' => ['POST'],
                ],
            ],
        ];
    }

    /**
     * Lists all FigureRole models.
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModel = new FigureRoleSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single FigureRole model.
     * @param integer $figure_id
     * @param integer $role_id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionView($figure_id, $role_id)
    {
        return $this->render('view', [
            'model' => $this->findModel($figure_id, $role_id),
        ]);
    }

    /**
     * Creates a new FigureRole model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new FigureRole();

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'figure_id' => $model->figure_id, 'role_id' => $model->role_id]);
        }

        return $this->render('create', [
            'model' => $model,
        ]);
    }

    /**
     * Updates an existing FigureRole model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $figure_id
     * @param integer $role_id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionUpdate($figure_id, $role_id)
    {
        $model = $this->findModel($figure_id, $role_id);

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'figure_id' => $model->figure_id, 'role_id' => $model->role_id]);
        }

        return $this->render('update', [
            'model' => $model,
        ]);
    }

    /**
     * Deletes an existing FigureRole model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param integer $figure_id
     * @param integer $role_id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionDelete($figure_id, $role_id)
    {
        $this->findModel($figure_id, $role_id)->delete();

        return $this->redirect(['index']);
    }

    /**
     * Finds the FigureRole model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $figure_id
     * @param integer $role_id
     * @return FigureRole the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($figure_id, $role_id)
    {
        if (($model = FigureRole::findOne(['figure_id' => $figure_id, 'role_id' => $role_id])) !== null) {
            return $model;
        }

        throw new NotFoundHttpException('The requested page does not exist.');
    }
}