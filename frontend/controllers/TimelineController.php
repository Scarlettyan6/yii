<?php
namespace frontend\controllers;

/*
* Team: 实验楼C4
* Coding by 姚智博, 2313557
* This is the Timeline controller for anti-Japanese war timeline frontend.
*/

use yii\web\Controller;
use common\models\TimelineEvent;

class TimelineController extends Controller
{
    public function actionIndex()
    {
        // 不要 asArray()，让视图拿到 ActiveRecord 对象更稳
        $events = TimelineEvent::find()
            ->orderBy(['event_date' => SORT_ASC, 'importance' => SORT_DESC])
            ->all();

        return $this->render('index', [
            'events' => $events,
        ]);
    }
}