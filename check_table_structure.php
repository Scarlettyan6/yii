<?php
// Quick database table structure check
require __DIR__ . '/vendor/autoload.php';

$config = array_merge(
    require __DIR__ . '/common/config/main.php',
    require __DIR__ . '/common/config/main-local.php',
    require __DIR__ . '/console/config/main.php',
    require __DIR__ . '/console/config/main-local.php'
);

$app = new yii\console\Application($config);

$db = \Yii::$app->db;
$tableSchema = $db->getTableSchema('figure');

if ($tableSchema) {
    echo "✓ figure 表存在\n";
    echo "\n字段列表：\n";
    foreach ($tableSchema->columns as $column) {
        echo "  - {$column->name} ({$column->type}) [null={$column->allowNull}]\n";
    }
} else {
    echo "✗ figure 表不存在\n";
}
?>
