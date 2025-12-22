<?php
try {
    $pdo = new PDO('mysql:host=localhost;dbname=yii2025_advanced;charset=utf8', 'root', 'yangyang0027');
    $stmt = $pdo->query('SELECT * FROM migration ORDER BY version');
    $migrations = $stmt->fetchAll(PDO::FETCH_ASSOC);

    echo "已执行的迁移:\n";
    foreach($migrations as $m) {
        echo $m['version'] . "\n";
    }
} catch (Exception $e) {
    echo "错误: " . $e->getMessage() . "\n";
}
?>
