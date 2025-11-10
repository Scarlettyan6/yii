<?php 
 namespace frontend\controllers; 
 
 use yii\web\Controller; 
 use common\models\TimelineEvent; // <-- 引入你的模型 
 
 class TimelineController extends Controller 
 { 
     /** 
      * 显示时间轴页面 
      */ 
     public function actionIndex()
     {
         // 注册 Timeline.js 资源包
         \frontend\assets\TimelineAsset::register($this->view);

         // 1. 从数据库获取所有事件 (按日期排序)
         $events = TimelineEvent::find()
             ->orderBy(['event_date' => SORT_ASC]) // <-- 已修正
             ->all();

         // 2. 将数据传入视图文件
         return $this->render('index', [
             'events' => $events,
         ]);
     } 
 }