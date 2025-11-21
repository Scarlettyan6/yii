<?php 
 namespace frontend\controllers; 
 
 use yii\web\Controller; 
 use common\models\StatisticCategory; // <-- 引入类别模型 
 
 class DataController extends Controller 
 { 
     /** 
      * 显示抗战数据页面 
      */ 
     public function actionIndex()
     {
         // 注册 ECharts 资源包
         \frontend\assets\EChartsAsset::register($this->view);

         // 找出所有类别，并 "贪婪加载" 它们各自的统计数据
         $categories = StatisticCategory::find()->with('statistics')->all();

         return $this->render('index', [
             'categories' => $categories,
         ]);
     } 
 }