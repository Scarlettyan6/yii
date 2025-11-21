<?php 
 namespace frontend\controllers; 
 
 use yii\web\Controller; 
 use common\models\Figure; // <-- 引入模型 
 use yii\web\NotFoundHttpException; 
 
 class FigureController extends Controller 
 { 
     /** 
      * 显示人物专栏列表页 
      */ 
     public function actionIndex() 
     { 
         $figures = Figure::find()->orderBy(['name' => SORT_ASC])->all(); 
         
         return $this->render('index', [ 
             'figures' => $figures, 
         ]); 
     } 
 
     /** 
      * 显示单个人物的详情页 
      * @param integer $id 人物的 ID 
      */ 
     public function actionView($id) 
     { 
         $figure = Figure::findOne($id); 
         
         if ($figure === null) { 
             throw new NotFoundHttpException('您所查找的人物不存在。'); 
         } 
         
         return $this->render('view', [ 
             'figure' => $figure, 
         ]); 
     } 
 }