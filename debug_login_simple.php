<?php
// Direct DB query to debug login issue - no Yii app needed
$config = require __DIR__ . '/common/config/main-local.php';

$dbConfig = $config['components']['db'];

try {
    // Connect directly
    $dsn = $dbConfig['dsn'];
    $user = $dbConfig['username'];
    $pass = $dbConfig['password'];
    
    $pdo = new PDO($dsn, $user, $pass);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    
    echo "=== Database Connection ===\n";
    echo "DSN: $dsn\n";
    echo "Connected: OK\n\n";
    
    // Query user
    echo "=== User Query ===\n";
    $stmt = $pdo->prepare("SELECT id, username, password_hash, status FROM user WHERE username = ?");
    $stmt->execute(['xwx']);
    $row = $stmt->fetch(PDO::FETCH_ASSOC);
    
    if ($row) {
        echo "Found user:\n";
        echo "  id: {$row['id']}\n";
        echo "  username: {$row['username']}\n";
        echo "  password_hash: {$row['password_hash']}\n";
        echo "  status: {$row['status']}\n";
        
        // Now bootstrap Yii to test password validation
        echo "\n=== Password Validation (using Yii) ===\n";
        defined('YII_DEBUG') or define('YII_DEBUG', true);
        defined('YII_ENV') or define('YII_ENV', 'dev');
        
        require __DIR__ . '/vendor/autoload.php';
        require __DIR__ . '/vendor/yiisoft/yii2/Yii.php';
        
        // Create a minimal app with DB
        $app = new \yii\web\Application([
            'id' => 'app-test',
            'basePath' => __DIR__,
            'components' => [
                'db' => [
                    'class' => 'yii\db\Connection',
                    'dsn' => $dbConfig['dsn'],
                    'username' => $dbConfig['username'],
                    'password' => $dbConfig['password'],
                    'charset' => 'utf8',
                ]
            ]
        ]);
        
        // Test password
        $password = 'qwerxjl1593573';
        $valid = \Yii::$app->security->validatePassword($password, $row['password_hash']);
        echo "Password '$password' valid: " . ($valid ? "YES" : "NO") . "\n";
        
        // Try User model
        echo "\n=== Using User Model ===\n";
        require __DIR__ . '/common/config/bootstrap.php';
        
        $user = \common\models\User::findByUsername('xwx');
        echo "User found by findByUsername: " . ($user ? "YES (id={$user->id})" : "NO") . "\n";
        
        if ($user) {
            $passwordValid = $user->validatePassword('qwerxjl1593573');
            echo "User validatePassword: " . ($passwordValid ? "YES" : "NO") . "\n";
        }
        
    } else {
        echo "User 'xwx' not found in database\n";
    }
    
} catch (Exception $e) {
    echo "Error: " . $e->getMessage() . "\n";
}
