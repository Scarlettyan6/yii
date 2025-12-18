<?php
// Bootstrap frontend application to check database connection
defined('YII_DEBUG') or define('YII_DEBUG', true);
defined('YII_ENV') or define('YII_ENV', 'dev');

require __DIR__ . '/vendor/autoload.php';
require __DIR__ . '/vendor/yiisoft/yii2/Yii.php';
require __DIR__ . '/common/config/bootstrap.php';
require __DIR__ . '/frontend/config/bootstrap.php';

$config = yii\helpers\ArrayHelper::merge(
    require __DIR__ . '/common/config/main.php',
    require __DIR__ . '/common/config/main-local.php',
    require __DIR__ . '/frontend/config/main.php',
    file_exists(__DIR__ . '/frontend/config/main-local.php') ? require __DIR__ . '/frontend/config/main-local.php' : []
);

$app = new \yii\web\Application($config);

// Check database connection
echo "=== Database Connection Check ===\n";
try {
    $db = \Yii::$app->getDb();
    echo "DB DSN: {$db->dsn}\n";
    echo "DB Connection: OK\n";
    
    // Try to get current database name
    $result = $db->createCommand("SELECT DATABASE()")->queryScalar();
    echo "Current Database: {$result}\n";
} catch (\Exception $e) {
    echo "DB Connection Failed: {$e->getMessage()}\n";
}

// Check if user table exists and query user
echo "\n=== User Table Check ===\n";
try {
    $user = \common\models\User::findOne(['username' => 'xwx']);
    if ($user) {
        echo "Found user: id={$user->id}, username={$user->username}, status={$user->status}\n";
        echo "Password hash: {$user->password_hash}\n";
        echo "Test password validate: " . ($user->validatePassword('qwerxjl1593573') ? "PASS" : "FAIL") . "\n";
    } else {
        echo "User 'xwx' not found in this database\n";
    }
} catch (\Exception $e) {
    echo "User Query Failed: {$e->getMessage()}\n";
}

$app->end();
