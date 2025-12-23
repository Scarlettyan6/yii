<?php
namespace backend\controllers;

/*
* Team: 实验楼C4
* Coding by 杜子妍, 2313312
* This is the ImportantMeetingHighlight controller for backend management of anti-Japanese war important meeting highlights.
*/

use Yii;
use common\models\ImportantMeetingHighlight;
use common\models\ImportantMeeting;
use backend\models\ImportantMeetingHighlightSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use yii\filters\AccessControl;

/**
 * ImportantMeetingHighlightController implements CRUD for ImportantMeetingHighlight model.
 */
class ImportantMeetingHighlightController extends Controller
{
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

    public function actionIndex()
    {
        $searchModel = new ImportantMeetingHighlightSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    public function actionView($id)
    {
        return $this->render('view', [
            'model' => $this->findModel($id),
        ]);
    }

    public function actionCreate()
    {
        $model = new ImportantMeetingHighlight(['display_order' => 0]);

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->id]);
        }

        return $this->render('create', [
            'model' => $model,
            'meetingList' => $this->getMeetingList(),
        ]);
    }

    public function actionUpdate($id)
    {
        $model = $this->findModel($id);

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->id]);
        }

        return $this->render('update', [
            'model' => $model,
            'meetingList' => $this->getMeetingList(),
        ]);
    }

    public function actionDelete($id)
    {
        $this->findModel($id)->delete();
        return $this->redirect(['index']);
    }

    protected function findModel($id)
    {
        if (($model = ImportantMeetingHighlight::findOne($id)) !== null) {
            return $model;
        }

        throw new NotFoundHttpException('The requested page does not exist.');
    }

    protected function getMeetingList(): array
    {
        return ImportantMeeting::find()
            ->select(['title', 'id'])
            ->indexBy('id')
            ->orderBy(['display_order' => SORT_ASC, 'meeting_date' => SORT_DESC])
            ->column();
    }
}
