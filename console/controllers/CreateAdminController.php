<?php

namespace console\controllers;

use Yii;
use yii\console\Controller;
use common\models\User;

/**
 * 创建管理员用户的控制台命令
 */
class CreateAdminController extends Controller
{
    /**
     * 创建管理员用户
     * 用法: php yii create-admin/create-admin username email password
     *
     * @param string $username 用户名
     * @param string $email 邮箱
     * @param string $password 密码
     */
    public function actionCreateAdmin($username, $email, $password)
    {
        $user = new User();
        $user->username = $username;
        $user->email = $email;
        $user->setPassword($password);
        $user->generateAuthKey();
        $user->status = User::STATUS_ACTIVE;

        if ($user->save()) {
            $this->stdout("管理员用户 '{$username}' 创建成功！\n");
            return self::EXIT_CODE_NORMAL;
        } else {
            $this->stderr("创建失败: " . print_r($user->errors, true) . "\n");
            return self::EXIT_CODE_ERROR;
        }
    }
}
