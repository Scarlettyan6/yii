<?php
// Simulate LoginForm validation to debug
defined('YII_DEBUG') or define('YII_DEBUG', true);
defined('YII_ENV') or define('YII_ENV', 'dev');

require __DIR__ . '/vendor/autoload.php';
require __DIR__ . '/vendor/yiisoft/yii2/Yii.php';
require __DIR__ . '/common/config/bootstrap.php';

// Load only common config (DB connection)
$commonConfig = yii\helpers\ArrayHelper::merge(
    require __DIR__ . '/common/config/main.php',
    require __DIR__ . '/common/config/main-local.php'
);

// Manually set up Yii with DB connection
Yii::$app = new yii\di\ServiceLocator();
foreach ($commonConfig['components'] as $id => $component) {
    Yii::$app->set($id, $component);
}

echo "=== LoginForm Debug ===\n";

// Simulate what happens when user submits login form
$username = 'xwx';
$password = 'qwerxjl1593573';

// Step 1: Find user by username
$user = \common\models\User::findByUsername($username);
echo "1. findByUsername('$username'): " . ($user ? "Found (id={$user->id}, status={$user->status})" : "NOT FOUND") . "\n";

if ($user) {
    // Step 2: Validate password
    $passwordValid = $user->validatePassword($password);
    echo "2. validatePassword('$password'): " . ($passwordValid ? "PASS" : "FAIL") . "\n";
    
    if (!$passwordValid) {
        echo "   Password hash in DB: {$user->password_hash}\n";
        echo "   Attempting to manually check...\n";
        $manualCheck = \Yii::$app->security->validatePassword($password, $user->password_hash);
        echo "   Manual validatePassword: " . ($manualCheck ? "PASS" : "FAIL") . "\n";
    }
    
    // Step 3: Create LoginForm and validate
    $model = new \common\models\LoginForm();
    $model->username = $username;
    $model->password = $password;
    $model->rememberMe = true;
    
    echo "3. LoginForm->validate(): " . ($model->validate() ? "PASS" : "FAIL") . "\n";
    if (!$model->validate()) {
        echo "   Errors: " . json_encode($model->getErrors()) . "\n";
    }
    
    // Step 4: Try login
    if ($model->validate()) {
        echo "4. LoginForm->login(): ";
        $loginResult = $model->login();
        echo ($loginResult ? "SUCCESS" : "FAILED") . "\n";
    }
} else {
    echo "Cannot continue - user not found!\n";
}

echo "\nDone.\n";