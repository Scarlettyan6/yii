<?php

namespace backend\controllers;

use Yii;
use common\models\GuestbookMessage;
use backend\models\GuestbookMessageSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use yii\filters\AccessControl;
use yii\db\Expression;

/**
 * GuestbookMessageController implements the CRUD actions for GuestbookMessage model.
 */
class GuestbookMessageController extends Controller
{
    /**
     * {@inheritdoc}
     */
    public function behaviors()
    {
        return [
            'access' => [
                'class' => AccessControl::className(),
                'rules' => [
                    [
                        'allow' => true,
                        'roles' => ['@'],
                    ],
                ],
            ],
            'verbs' => [
                'class' => VerbFilter::className(),
                'actions' => [
                    'delete' => ['POST'],
                    'approve' => ['POST'],
                ],
            ],
        ];
    }

    /**
     * Lists all GuestbookMessage models.
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModel = new GuestbookMessageSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single GuestbookMessage model.
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
     * Creates a new GuestbookMessage model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new GuestbookMessage();

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->id]);
        }

        return $this->render('create', [
            'model' => $model,
        ]);
    }

    /**
     * Updates an existing GuestbookMessage model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionUpdate($id)
    {
        $model = $this->findModel($id);

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->id]);
        }

        return $this->render('update', [
            'model' => $model,
        ]);
    }

    /**
     * Deletes an existing GuestbookMessage model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionDelete($id)
    {
        $message = $this->findModel($id);
        if ($message->delete()) {
            Yii::$app->session->setFlash('success', '留言已删除');
        } else {
            Yii::$app->session->setFlash('error', '删除失败');
        }

        return $this->redirect(Yii::$app->request->referrer ?: ['admin']);
    }

    /**
     * 管理员审核留言（通过/撤销审核）
     */
    public function actionApprove($id)
    {
        $message = $this->findModel($id);

        if ($message->is_approved) {
            $message->is_approved = 0;
            $flashMessage = '留言审核已撤销';
        } else {
            $message->is_approved = 1;
            $flashMessage = '留言已审核通过';
        }

        if ($message->save()) {
            Yii::$app->session->setFlash('success', $flashMessage);
        } else {
            Yii::$app->session->setFlash('error', '操作失败');
        }

        return $this->redirect(Yii::$app->request->referrer ?: ['admin']);
    }

    /**
     * 管理留言的页面
     */
    public function actionAdmin()
    {
        $pendingMessages = GuestbookMessage::find()
            ->where(['is_approved' => 0])
            ->orderBy(['created_at' => SORT_DESC])
            ->all();

        $approvedMessages = GuestbookMessage::find()
            ->where(['is_approved' => 1])
            ->orderBy(['created_at' => SORT_DESC])
            ->all();

        return $this->render('admin', [
            'pendingMessages' => $pendingMessages,
            'approvedMessages' => $approvedMessages,
        ]);
    }

    /**
     * Finds the GuestbookMessage model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return GuestbookMessage the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = GuestbookMessage::findOne($id)) !== null) {
            return $model;
        }

        throw new NotFoundHttpException('The requested page does not exist.');
    }
}
