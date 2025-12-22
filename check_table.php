<?php
try {
    $pdo = new PDO('mysql:host=localhost;dbname=yii2025_advanced;charset=utf8', 'root', 'yangyang0027');
    $stmt = $pdo->query('DESCRIBE map_marker');
    $columns = $stmt->fetchAll(PDO::FETCH_ASSOC);
    echo 'map_marker表结构：' . PHP_EOL;
    foreach($columns as $col) {
        echo $col['Field'] . ' - ' . $col['Type'] . ' - ' . ($col['Comment'] ?: '无注释') . PHP_EOL;
    }
} catch (Exception $e) {
    echo '错误: ' . $e->getMessage() . PHP_EOL;
}
?>