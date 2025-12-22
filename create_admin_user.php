<?php
// Create backend admin user
$config = require __DIR__ . '/common/config/main-local.php';

$dbConfig = $config['components']['db'];

try {
    $dsn = $dbConfig['dsn'];
    $user = $dbConfig['username'];
    $pass = $dbConfig['password'];
    
    $pdo = new PDO($dsn, $user, $pass);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    
    echo "=== Create Backend Admin User ===\n";
    
    // Bootstrap Yii to use security functions
    defined('YII_DEBUG') or define('YII_DEBUG', true);
    defined('YII_ENV') or define('YII_ENV', 'dev');
    
    require __DIR__ . '/vendor/autoload.php';
    require __DIR__ . '/vendor/yiisoft/yii2/Yii.php';
    
    $app = new \yii\web\Application([
        'id' => 'app-admin-creator',
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
    
    require __DIR__ . '/common/config/bootstrap.php';
    
    // Check if admin already exists
    $adminUser = \common\models\User::findOne(['username' => 'admin']);
    
    if ($adminUser) {
        echo "Admin user already exists (id={$adminUser->id})\n";
        echo "Updating password to 'admin123456'...\n";
        $adminUser->setPassword('admin123456');
        $adminUser->generateAuthKey();
        $adminUser->status = \common\models\User::STATUS_ACTIVE;
        $adminUser->save(false);
        echo "Admin password updated!\n";
    } else {
        echo "Creating new admin user...\n";
        $adminUser = new \common\models\User();
        $adminUser->username = 'admin';
        $adminUser->email = 'admin@example.com';
        $adminUser->setPassword('admin123456');
        $adminUser->generateAuthKey();
        $adminUser->status = \common\models\User::STATUS_ACTIVE;
        
        if ($adminUser->save(false)) {
            echo "Admin user created successfully!\n";
            echo "  ID: {$adminUser->id}\n";
            echo "  Username: admin\n";
            echo "  Password: admin123456\n";
            echo "  Status: ACTIVE (10)\n";
        } else {
            echo "Failed to create admin user\n";
            print_r($adminUser->getErrors());
            exit(1);
        }
    }
    
    echo "\n=== Login Info ===\n";
    echo "Backend login: http://localhost:8084/index.php?r=site/login\n";
    echo "Username: admin\n";
    echo "Password: admin123456\n";
    
} catch (Exception $e) {
    echo "Error: " . $e->getMessage() . "\n";
    exit(1);
}
