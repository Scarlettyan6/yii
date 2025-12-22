<?php
try {
    $pdo = new PDO('mysql:host=localhost;dbname=yii2025_advanced;charset=utf8', 'root', 'yangyang0027');

    // 要标记为已完成的迁移
    $migrations = [
        'm251222_000001_create_war_dataset_and_record_tables',
        'm260101_000001_create_homepage_feature_table',
        'm260101_010000_add_deleted_at_to_figure_table'
    ];

    $now = time();
    foreach($migrations as $migration) {
        $stmt = $pdo->prepare("INSERT IGNORE INTO migration (version, apply_time) VALUES (?, ?)");
        $stmt->execute([$migration, $now]);
        echo "已标记迁移: $migration\n";
    }

    echo "所有迁移已标记为完成\n";
} catch (Exception $e) {
    echo "错误: " . $e->getMessage() . "\n";
}
