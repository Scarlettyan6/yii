<?php
require 'vendor/autoload.php';

try {
    // 测试WarRecordSearch模型
    $searchModel = new backend\models\WarRecordSearch();
    echo "WarRecordSearch模型创建成功\n";

    // 测试控制器
    $config = require 'backend/config/main.php';
    $app = new yii\web\Application($config);

    $controller = new backend\controllers\WarRecordController('war-record', $app);
    echo "WarRecordController创建成功\n";

    // 测试actionIndex
    $result = $controller->runAction('index');
    echo "actionIndex执行成功\n";

    if (is_array($result) && isset($result['searchModel'])) {
        echo "searchModel传递成功\n";
    } else {
        echo "searchModel传递失败\n";
    }

} catch (Exception $e) {
    echo "错误: " . $e->getMessage() . "\n";
    echo "文件: " . $e->getFile() . " 行: " . $e->getLine() . "\n";
}
