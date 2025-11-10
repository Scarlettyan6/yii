<?php 
 namespace frontend\controllers; 
 
 use yii\web\Controller; 
 use common\models\MediaResource; // <-- 引入模型 
 
 class MediaController extends Controller 
 { 
     /** 
      * 显示影视信息列表 
      */ 
     public function actionIndex() 
     { 
         // 假设 '4' 代表 'Movie' (电影)，根据你的 media_resource 迁移文件 
         $movies = MediaResource::find() 
             ->where(['type' => 4]) 
             ->orderBy(['title' => SORT_ASC]) 
             ->all(); 
             
         return $this->render('index', [ 
             'movies' => $movies, 
         ]); 
     } 
 }