<?php 
 namespace frontend\controllers; 
 
 use yii\web\Controller; 
 use common\models\Battle; // <-- 引入模型 
 use yii\web\NotFoundHttpException; // <-- 用于处理 404 错误 
 
 class BattleController extends Controller 
 { 
     /** 
      * 显示战役列表页 (地图和列表) 
      */ 
     public function actionIndex()
     {
         // 注册 Three.js 资源包
         \frontend\assets\ThreeJsAsset::register($this->view);

         $battles = Battle::find()->orderBy(['start_date' => SORT_ASC])->all();

         return $this->render('index', [
             'battles' => $battles,
         ]);
     } 
 
     /** 
      * 显示单个战役的详情页 
      * @param integer $id 战役的 ID 
      */ 
     public function actionView($id) 
     { 
         $battle = Battle::findOne($id); 
         
         if ($battle === null) { 
             throw new NotFoundHttpException('您所查找的战役不存在。'); 
         } 
         
         // (我们还可以在这里找出所有关联的 MapMarker) 
         $markers = $battle->getMapMarkers()->all(); // 假设你在 Battle.php 中定义了 getMapMarkers() 关联 
         
         return $this->render('view', [ 
             'battle' => $battle, 
             'markers' => $markers, 
         ]); 
     } 
 }