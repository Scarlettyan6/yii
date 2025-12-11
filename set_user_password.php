<?php
// Bootstrap Yii without executing the console entry script (which calls run()).
defined('YII_DEBUG') or define('YII_DEBUG', true);
defined('YII_ENV') or define('YII_ENV', 'dev');

require __DIR__ . '/vendor/autoload.php';
require __DIR__ . '/vendor/yiisoft/yii2/Yii.php';
require __DIR__ . '/common/config/bootstrap.php';
require __DIR__ . '/console/config/bootstrap.php';

$config = yii\helpers\ArrayHelper::merge(
    require __DIR__ . '/common/config/main.php',
    require __DIR__ . '/common/config/main-local.php',
    require __DIR__ . '/console/config/main.php',
    file_exists(__DIR__ . '/console/config/main-local.php') ? require __DIR__ . '/console/config/main-local.php' : []
);

$app = new \yii\console\Application($config);

$u = \common\models\User::findOne(['username' => 'xwx']);
if (!$u) {
    echo "user not found, creating new user 'xwx'...\n";
    $u = new \common\models\User();
    $u->username = 'xwx';
    // provide a default email to satisfy unique/email rules if any
    $u->email = 'xwx@example.com';
    $u->setPassword('qwerxjl1593573');
    $u->generateAuthKey();
    $u->status = \common\models\User::STATUS_ACTIVE;
    if ($u->save(false)) {
        echo "created user id={$u->id}, username={$u->username}\n";
    } else {
        echo "failed to create user\n";
        print_r($u->getErrors());
        exit(1);
    }
} else {
    echo "Found user id={$u->id}, username={$u->username}, status={$u->status}\n";
    $u->setPassword('qwerxjl1593573');
    $u->generateAuthKey();
    $u->status = \common\models\User::STATUS_ACTIVE;
    $u->save(false);
    echo "password updated and status set to ACTIVE. done\n";
}

$app->end();