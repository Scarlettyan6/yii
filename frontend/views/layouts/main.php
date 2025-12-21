<?php

/** @var \yii\web\View $this */
/** @var string $content */

use frontend\assets\AppAsset;
use common\widgets\Alert;
use yii\helpers\Html;

// --- 修正点 1: 引入正确的命名空间 ---
use yii\bootstrap\Nav;       // <-- 不是 bootstrap5
use yii\bootstrap\NavBar;    // <-- 不是 bootstrap5
use yii\widgets\Breadcrumbs; // <-- Breadcrumbs 在 yii\widgets 里

AppAsset::register($this);
?>
<?php $this->beginPage() ?>
<!DOCTYPE html>
<html lang="<?= Yii::$app->language ?>" class="h-100">
<head>
    <meta charset="<?= Yii::$app->charset ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <?php $this->registerCsrfMetaTags() ?>
    <title><?= Html::encode($this->title) ?></title>
    <?php $this->head() ?>
</head>
<body class="d-flex flex-column h-100">
<?php $this->beginBody() ?>

<header>
    <?php
    // --- 修正点 2: NavBar::begin() 是正确的 ---
    NavBar::begin([
        'brandLabel' => '抗战80周年纪念', // 你的网站标题
        'brandUrl' => Yii::$app->homeUrl,
        'options' => [
            // 'class' => 'navbar-inverse navbar-fixed-top', // 这是 Bootstrap 3 的深色固定顶部
            'class' => 'navbar navbar-inverse', // 使用 'navbar-inverse' 配合深色
            'style' => 'background-color: #C00; border-color: #FFD700; border-bottom: 3px solid #FFD700;', // 你的自定义样式
        ],
    ]);

    // !! 你的横向菜单栏 (这个数组是正确的) !!
    $menuItems = [
        ['label' => '专题首页', 'url' => ['/site/index']],
        ['label' => '时间戳', 'url' => ['/timeline/index']],
        ['label' => '抗战地标', 'url' => ['/battle/index']],
        ['label' => '抗战数据', 'url' => ['/data/index']],
        ['label' => '人物专栏', 'url' => ['/figure/index']],
        ['label' => '影视信息', 'url' => ['/media/index']],
        ['label' => '留言板', 'url' => ['/guestbook/index']],
        ['label' => '团队介绍', 'url' => ['/site/team']],
        [
            'label' => '<i class="glyphicon glyphicon-cog"></i> 后台管理',
            'url' => '/yii2025/backend/web/index.php?r=site/login',
            'linkOptions' => ['target' => '_blank', 'title' => '登录后台管理系统'],
            'encode' => false,
        ],
    ];

    // --- 修正点 3: Nav::widget() 也是正确的 ---
    echo Nav::widget([
        // --- 修正点 4: Bootstrap 3/4 用 'navbar-right' 而不是 'ms-auto'
        'options' => ['class' => 'nav navbar-nav navbar-right'], // <-- 修正了 CSS 类
        'items' => $menuItems,
    ]);
    NavBar::end();
    ?>
</header>

<!-- 'flex-shrink-0' 是 BS5 的, 'wrap' 是 Yii 默认的 -->
<main role="main" class="wrap"> 
    <div class="container">
        <?php
        $route = Yii::$app->controller->route;
        $hideBreadcrumbRoutes = [
            'battle/index',
            'battle/view',
            'figure/index',
            'figure/view',
            'media/index',
            'media/view',
            'guestbook/index',
            'site/team',
        ];
        $showBreadcrumbs = !in_array($route, $hideBreadcrumbRoutes, true);
        ?>
        <?php if ($showBreadcrumbs): ?>
            <?= Breadcrumbs::widget([
                'links' => isset($this->params['breadcrumbs']) ? $this->params['breadcrumbs'] : [],
            ]) ?>
        <?php endif; ?>
        <?= Alert::widget() ?>
        <?= $content ?>
    </div>
</main>

<!-- 'mt-auto' 和 'py-3' 是 BS5 的, 我们用 Yii 默认的 'footer' -->
<footer class="footer">
    <div class="container">
        <!-- --- 修正点 5: Bootstrap 3/4 用 'pull-left' 和 'pull-right' --- -->
        <p class="pull-left">&copy; <?= Html::encode(Yii::$app->name) ?> <?= date('Y') ?></p>
        <p class="pull-right"><?= Yii::powered() ?></p>
    </div>
</footer>

<?php $this->endBody() ?>
</body>
</html>
<?php $this->endPage();
