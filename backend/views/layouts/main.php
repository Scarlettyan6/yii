<?php
/*
* Team: 实验楼C4
* Coding by 谭诗洋, 2314003
* This is the layout of backend management interface.
*/

/* @var $this \yii\web\View */
/* @var $content string */

use backend\assets\AppAsset;
use yii\helpers\Html;
use yii\bootstrap\Nav;
use yii\bootstrap\NavBar;
use common\widgets\Alert;

AppAsset::register($this);

// Build frontend entry URL for local “advanced” style layout:
// backend:   /<project>/backend/web
// frontend:  /<project>/frontend/web
$frontendBaseUrl = Yii::$app->request->baseUrl;
if (str_ends_with($frontendBaseUrl, '/backend/web')) {
    $frontendBaseUrl = substr($frontendBaseUrl, 0, -strlen('/backend/web')) . '/frontend/web';
} elseif (!str_ends_with($frontendBaseUrl, '/frontend/web')) {
    $frontendBaseUrl = '/frontend/web';
}
$frontendHomeUrl = $frontendBaseUrl . '/index.php';
?>
<?php $this->beginPage() ?>
<!DOCTYPE html>
<html lang="<?= Yii::$app->language ?>">
<head>
    <meta charset="<?= Yii::$app->charset ?>">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <?php $this->registerCsrfMetaTags() ?>
    <title><?= Html::encode($this->title) ?></title>
    <?php $this->head() ?>
</head>
<body>
<?php $this->beginBody() ?>

<div class="wrap">
    <?php
    NavBar::begin([
        'brandLabel' => '抗日战争胜利80周年纪念 - 后台管理',
        'brandUrl' => Yii::$app->homeUrl,
        'options' => [
            'class' => 'navbar-inverse navbar-fixed-top',
            'style' => 'background-color: #C00; border-color: #FFD700; border-bottom: 3px solid #FFD700; box-shadow: 0 2px 8px rgba(192,0,0,0.3);',
        ],
    ]);
    $menuItems = [
        ['label' => '<i class="glyphicon glyphicon-home"></i> 返回首页', 'url' => $frontendHomeUrl, 'encode' => false, 'linkOptions' => ['title' => '返回网站首页']],
        ['label' => '<i class="glyphicon glyphicon-dashboard"></i> 管理首页', 'url' => ['/site/index'], 'encode' => false],
        ['label' => '<i class="glyphicon glyphicon-tower"></i> 抗战地标', 'url' => ['/battle/index'], 'encode' => false],
        ['label' => '<i class="glyphicon glyphicon-user"></i> 抗战英雄', 'url' => ['/figure/index'], 'encode' => false],
        ['label' => '<i class="glyphicon glyphicon-file"></i> 战争记录', 'url' => ['/war-record/index'], 'encode' => false],
        ['label' => '<i class="glyphicon glyphicon-time"></i> 历史纪年', 'url' => ['/timeline-event/index'], 'encode' => false],
        ['label' => '<i class="glyphicon glyphicon-film"></i> 影视档案', 'url' => ['/media-resource/index'], 'encode' => false],
        ['label' => '<i class="glyphicon glyphicon-envelope"></i> 民众留言', 'url' => ['/guestbook-message/index'], 'encode' => false],
        ['label' => '<i class="glyphicon glyphicon-star"></i> 首页精选', 'url' => ['/homepage-feature/index'], 'encode' => false],
        [
            'label' => '<i class="glyphicon glyphicon-briefcase"></i> 重要会议',
            'encode' => false,
            'items' => [
                ['label' => '会议列表', 'url' => ['/important-meeting/index'], 'encode' => false],
                ['label' => '会议亮点', 'url' => ['/important-meeting-highlight/index'], 'encode' => false],
            ],
        ],
    ];
    if (Yii::$app->user->isGuest) {
        $menuItems[] = ['label' => '登录', 'url' => ['/site/login']];
    } else {
        $menuItems[] = [
            'label' => '<i class="glyphicon glyphicon-user"></i> ' . Html::encode(Yii::$app->user->identity->username),
            'encode' => false,
            'items' => [
                ['label' => '退出登录', 'url' => ['/site/logout'], 'linkOptions' => ['data-method' => 'post']],
            ],
        ];
    }
    echo Nav::widget([
        'options' => ['class' => 'navbar-nav navbar-right'],
        'items' => $menuItems,
    ]);
    NavBar::end();
    ?>

    <div class="container" style="padding-top: 90px;">
        <?= Alert::widget() ?>
        <?= $content ?>
    </div>
</div>

<footer class="footer">
    <div class="container">
        <p class="pull-left">&copy; <?= Html::encode(Yii::$app->name) ?> <?= date('Y') ?></p>

        <p class="pull-right"><?= Yii::powered() ?></p>
    </div>
</footer>

<?php $this->endBody() ?>
</body>
</html>
<?php $this->endPage() ?>
