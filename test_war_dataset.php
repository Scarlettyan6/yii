<?php
require 'vendor/autoload.php';

try {
    // 测试WarDatasetSearch模型
    $searchModel = new backend\models\WarDatasetSearch();
    echo "WarDatasetSearch模型创建成功\n";

    // 测试控制器
    $config = require 'backend/config/main.php';
    $app = new yii\web\Application($config);

    $controller = new backend\controllers\WarDatasetController('war-dataset', $app);
    echo "WarDatasetController创建成功\n";

    // 测试actionIndex
    $result = $controller->runAction('index');
    echo "actionIndex执行成功\n";

} catch (Exception $e) {
    echo "错误: " . $e->getMessage() . "\n";
    echo "文件: " . $e->getFile() . " 行: " . $e->getLine() . "\n";
}
