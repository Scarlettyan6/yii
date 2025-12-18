<?php

/** @var \yii\web\View $this */
/** @var string $content */

use frontend\assets\AppAsset;
use common\widgets\Alert;
use yii\helpers\Html;

use yii\bootstrap\Nav;
use yii\bootstrap\NavBar;
use yii\widgets\Breadcrumbs;

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
    NavBar::begin([
        'brandLabel' => '抗战80周年纪念',
        'brandUrl' => Yii::$app->homeUrl,
        'options' => [
            'class' => 'navbar navbar-inverse',
            // 贴顶 + 底部金线
            'style' => 'background-color:#C00;border-color:#FFD700;border-bottom:3px solid #FFD700;margin-bottom:0;',
        ],
    ]);

    $menuItems = [
        ['label' => '专题首页', 'url' => ['/site/index']],
        ['label' => '时间戳', 'url' => ['/timeline/index']],
        ['label' => '抗战地标', 'url' => ['/battle/index']],
        ['label' => '抗战数据', 'url' => ['/data/index']],
        ['label' => '人物专栏', 'url' => ['/figure/index']],
        ['label' => '影视信息', 'url' => ['/media/index']],
        ['label' => '留言板', 'url' => ['/guestbook/index']],
        ['label' => '团队介绍', 'url' => ['/site/team']],
    ];

    echo Nav::widget([
        'options' => ['class' => 'nav navbar-nav navbar-right'],
        'items' => $menuItems,
    ]);

    NavBar::end();
    ?>
</header>

<main role="main" class="wrap" style="padding-top:0;">
    <!-- ✅ 改成全宽，避免顶部/左右出现“居中展示页”的空白感 -->
    <div class="container-fluid" style="padding-left:0;padding-right:0;">
        <?= Breadcrumbs::widget([
            'links' => isset($this->params['breadcrumbs']) ? $this->params['breadcrumbs'] : [],
        ]) ?>
        <?= Alert::widget() ?>
        <?= $content ?>
    </div>
</main>

<footer class="footer">
    <div class="container-fluid" style="padding-left:18px;padding-right:18px;">
        <p class="pull-left">&copy; <?= Html::encode(Yii::$app->name) ?> <?= date('Y') ?></p>
        <p class="pull-right"><?= Yii::powered() ?></p>
    </div>
</footer>

<?php $this->endBody() ?>
</body>
</html>
<?php $this->endPage(); ?>
