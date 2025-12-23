<?php
 namespace frontend\controllers; 
 
 use Yii; 
 use yii\web\Controller; 
 use common\models\GuestbookMessage; // <-- 引入模型 
 
 class GuestbookController extends Controller 
 { 
     public function actionIndex() 
     { 
         $model = new GuestbookMessage(); 
 
        if ($model->load(Yii::$app->request->post())) {
            $model->is_approved = 0; // 强制新留言为"未审核"
            if ($model->save()) {
                 Yii::$app->session->setFlash('success', '您的留言已提交，请等待管理员审核。'); 
                 return $this->refresh(); // 重定向，防止用户刷新页面重复提交 
             } 
         } 
 
        $messages = GuestbookMessage::find()
            ->where(['is_approved' => 1]) // 只显示"已审核"的留言
            ->orderBy(['created_at' => SORT_DESC])
            ->all();
 
        return $this->render('index', [
            'messages' => $messages,
            'model' => $model,
        ]);
    }

}