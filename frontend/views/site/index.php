<?php
use yii\helpers\Html;
use yii\helpers\Json;

/* @var $this yii\web\View */
/* @var $homepageFeatures common\models\HomepageFeature[] */

$this->title = '专题首页';
$mainFeature = $homepageFeatures[0] ?? null;
$sideFeatures = array_slice($homepageFeatures, 1);
$buildUrl = static function ($url) {
    if (empty($url)) {
        return '#';
    }
    $isAbsolute = (stripos($url, 'http://') === 0) || (stripos($url, 'https://') === 0) || (strpos($url, '//') === 0);
    if ($isAbsolute) {
        return $url;
    }
    $base = rtrim(Yii::$app->request->baseUrl, '/');
    if (strpos($url, '/') === 0) {
        return $base . $url;
    }
    return $base . '/' . $url;
};

?>
<div class="site-index homepage-showcase">
    <style>
        .homepage-showcase {
            font-family: "Microsoft YaHei", "Noto Sans SC", Arial, sans-serif;
            background: linear-gradient(180deg, #fff7eb 0%, #f9ecd9 100%);
            color: #2c1a10;
            padding: 20px 0 60px;
        }
        .homepage-showcase .hero {
            text-align: center;
            padding: 20px 10px 10px;
            color: #b32010;
        }
        .homepage-showcase .hero h1 {
            font-size: 32px;
            font-weight: 800;
            line-height: 1.3;
            margin-bottom: 12px;
        }
        .homepage-showcase .hero .subtitle {
            font-size: 16px;
            color: #9b1f00;
            margin-bottom: 10px;
        }
        .homepage-showcase .hero .tags {
            display: flex;
            justify-content: center;
            flex-wrap: wrap;
            gap: 10px;
            font-size: 13px;
        }
        .homepage-showcase .hero .tag {
            padding: 6px 10px;
            border-radius: 999px;
            background: rgba(179, 32, 16, 0.08);
            color: #b32010;
            border: 1px solid rgba(179, 32, 16, 0.2);
        }
        .homepage-showcase .content-wrap {
            max-width: 1100px;
            margin: 0 auto;
            padding: 20px 15px;
        }
        .homepage-showcase .card {
            background: #fff;
            border-radius: 16px;
            box-shadow: 0 12px 30px rgba(126, 74, 45, 0.16);
            padding: 18px;
            border: 1px solid rgba(179, 32, 16, 0.08);
        }
        .homepage-showcase .grid {
            display: grid;
            grid-template-columns: 2fr 1fr;
            gap: 18px;
        }
        .homepage-showcase .main-feature {
            position: relative;
            overflow: hidden;
            border-radius: 14px;
            background: linear-gradient(135deg, #d02a0f 0%, #a51d0c 100%);
            min-height: 420px;
        }
        .homepage-showcase .main-feature a {
            color: #fff;
            text-decoration: none;
        }
        .homepage-showcase .main-feature .image {
            position: relative;
            padding: 16px;
            background: #fff;
            margin: 16px;
            border-radius: 10px;
            box-shadow: inset 0 0 0 1px rgba(255, 255, 255, 0.08);
        }
        .homepage-showcase .main-feature .image img {
            width: 100%;
            border-radius: 6px;
            display: block;
            object-fit: cover;
        }
        .homepage-showcase .main-feature .caption {
            padding: 12px 18px 16px;
            background: linear-gradient(180deg, rgba(255, 255, 255, 0.12), rgba(0, 0, 0, 0.12));
            color: #ffe8db;
            font-weight: 700;
            letter-spacing: 0.5px;
        }
        .homepage-showcase .side-list {
            background: linear-gradient(180deg, #fdf7ef 0%, #f7eedf 100%);
            border-radius: 12px;
            padding: 16px;
            border: 1px solid rgba(179, 32, 16, 0.1);
            box-shadow: inset 0 1px 0 rgba(255, 255, 255, 0.6);
        }
        .homepage-showcase .side-list h3 {
            margin: 0 0 10px;
            color: #b32010;
            font-size: 18px;
            font-weight: 700;
        }
        .homepage-showcase .feature-item {
            display: flex;
            gap: 10px;
            padding: 10px 6px;
            border-bottom: 1px dashed rgba(179, 32, 16, 0.18);
            align-items: flex-start;
        }
        .homepage-showcase .feature-item:last-child {
            border-bottom: none;
        }
        .homepage-showcase .feature-dot {
            flex: 0 0 auto;
            width: 10px;
            height: 10px;
            margin-top: 4px;
            border-radius: 50%;
            display: inline-block;
            background: linear-gradient(135deg, #d34b1f, #b32010);
            box-shadow: 0 0 0 3px rgba(179, 32, 16, 0.12);
        }
        .homepage-showcase .feature-content a {
            color: #5a2c16;
            font-weight: 600;
            text-decoration: none;
        }
        .homepage-showcase .feature-content a:hover {
            color: #b32010;
        }
        .homepage-showcase .feature-subtitle {
            font-size: 13px;
            color: #8a6b52;
            margin-top: 4px;
        }
        @media (max-width: 900px) {
            .homepage-showcase .grid {
                grid-template-columns: 1fr;
            }
            .homepage-showcase .main-feature {
                min-height: auto;
            }
        }
    </style>

    <div class="hero">
        <?php
        $heroText = '纪念中国人民抗日战争暨世界反法西斯战争胜利80周年大会在京隆重举行 习近平发表重要讲话 并检阅受阅部队';
        $heroLink = $mainFeature ? $buildUrl($mainFeature->link_url) : '#';
        ?>
        <h1>
            <a href="<?= Html::encode($heroLink) ?>" style="color:#b32010; text-decoration:none;" target="_blank" rel="noopener">
                <?= Html::encode($heroText) ?>
            </a>
        </h1>
        <?php if ($mainFeature && !empty($mainFeature->subtitle)): ?>
            <div class="subtitle"><?= Html::encode($mainFeature->subtitle) ?></div>
        <?php endif; ?>
        <?php if ($mainFeature && !empty($mainFeature->description)): ?>
            <div class="tags">
                <span class="tag"><?= Html::encode($mainFeature->description) ?></span>
            </div>
        <?php endif; ?>
    </div>

    <div class="content-wrap">
        <div class="card">
            <?php if ($mainFeature): ?>
                <div class="grid">
                    <div class="main-feature">
                        <a href="<?= Html::encode($buildUrl($mainFeature->link_url)) ?>" target="_blank" rel="noopener">
                            <div class="image">
                                <img src="<?= Html::encode($buildUrl($mainFeature->image_url)) ?>" alt="<?= Html::encode($mainFeature->title) ?>">
                            </div>
                            <div class="caption"><?= Html::encode($mainFeature->title) ?></div>
                        </a>
                    </div>
                    <div class="side-list">
                        <h3>更多图文速览</h3>
                        <?php if ($sideFeatures): ?>
                            <?php foreach ($sideFeatures as $item): ?>
                                <div class="feature-item">
                                    <span class="feature-dot"></span>
                                    <div class="feature-content">
                                        <a href="<?= Html::encode($buildUrl($item->link_url)) ?>" target="_blank" rel="noopener">
                                            <?= Html::encode($item->title) ?>
                                        </a>
                                        <?php if (!empty($item->subtitle)): ?>
                                            <div class="feature-subtitle"><?= Html::encode($item->subtitle) ?></div>
                                        <?php endif; ?>
                                    </div>
                                </div>
                            <?php endforeach; ?>
                        <?php else: ?>
                            <div style="padding:8px 0; color:#8a6b52;">暂无更多条目，快去后台添加吧。</div>
                        <?php endif; ?>
                    </div>
                </div>
            <?php else: ?>
                <div style="text-align:center; padding:40px 0; color:#8a6b52;">
                    暂无首页内容，请先在后台“专题首页内容”中添加图文链接。
                </div>
            <?php endif; ?>
        </div>
    </div>
</div>

<?php if (!empty($battleSeries)): ?>
<script>
(function() {
    const data = <?= Json::htmlEncode($battleSeries) ?>;
    const mapContainer = document.getElementById('echarts-battle-map');
    if (!mapContainer || !window.echarts) return;

    fetch('<?= Html::encode($mapJsonUrl) ?>')
        .then(resp => resp.json())
        .then(geoJson => {
            echarts.registerMap('china', geoJson);
            const chart = echarts.init(mapContainer);
            const option = {
                tooltip: {
                    trigger: 'item',
                    formatter: function (params) {
                        const d = params.data || {};
                        const lines = [
                            `<strong>${params.name || ''}</strong>`,
                            d.location ? `地点：${d.location}` : '',
                            d.dateRange ? `时间：${d.dateRange}` : '',
                            d.description ? `简介：${d.description}` : ''
                        ].filter(Boolean);
                        return lines.join('<br>');
                    }
                },
                geo: {
                    map: 'china',
                    roam: true,
                    zoom: 1.2,
                    itemStyle: {
                        areaColor: '#f5e6d6',
                        borderColor: '#b32010',
                        borderWidth: 1
                    },
                    emphasis: {
                        itemStyle: {
                            areaColor: '#f3d8c4'
                        }
                    }
                },
                series: [
                    {
                        type: 'effectScatter',
                        coordinateSystem: 'geo',
                        data: data,
                        symbolSize: 10,
                        rippleEffect: {
                            brushType: 'stroke',
                            scale: 3
                        },
                        itemStyle: {
                            color: '#b32010',
                            shadowBlur: 10,
                            shadowColor: 'rgba(179,32,16,0.35)'
                        }
                    }
                ]
            };
            chart.setOption(option);
            window.addEventListener('resize', () => chart.resize());
        })
        .catch(() => {
            // fallback: do nothing; background图仍可用
        });
})();
</script>
<?php endif; ?>
