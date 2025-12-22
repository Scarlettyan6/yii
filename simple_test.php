<?php
echo "Testing WarRecordController modification...\n";

require 'vendor/autoload.php';

$config = require 'backend/config/main.php';
$app = new yii\web\Application($config);

$controller = new backend\controllers\WarRecordController('war-record', $app);

echo "Controller created successfully\n";

try {
    // 手动调用actionIndex
    $result = $controller->runAction('index');
    echo "Action executed successfully\n";

    if (is_array($result) && isset($result['searchModel'])) {
        echo "SUCCESS: searchModel is present in result\n";
        echo "searchModel class: " . get_class($result['searchModel']) . "\n";
    } else {
        echo "FAILED: searchModel not found in result\n";
        echo "Result keys: " . implode(', ', array_keys($result)) . "\n";
    }
} catch (Exception $e) {
    echo "Error: " . $e->getMessage() . "\n";
}
