<?php
/*
* Team: 实验楼C4
* Coding by 杜子妍, 2313312
* This is the anti-Japanese war landmarks page.
*/

/* @var $this yii\web\View */
/* @var $battles common\models\Battle[] */
/* @var $battlePoints array */

use yii\helpers\Url;
use yii\helpers\Html;
use yii\helpers\Json;
use frontend\assets\EChartsAsset;

// 显式加载本地 echarts，避免发布目录权限问题
$baseUrl = rtrim(Yii::$app->request->baseUrl, '/');
echo Html::script('', ['src' => $baseUrl . '/js/echarts.min.js']);

$this->title = '抗战地标';
$this->params['breadcrumbs'][] = $this->title;

$points = [];
if (!empty($battlePoints)) {
    foreach ($battlePoints as $b) {
        $dateRange = '';
        if (!empty($b['start_date']) || !empty($b['end_date'])) {
            $dateRange = trim(($b['start_date'] ?? '') . ' - ' . ($b['end_date'] ?? ''));
        }
        $points[] = [
            'name' => $b['name'] ?? '未命名战役',
            'value' => [(float)$b['main_longitude'], (float)$b['main_latitude']],
            'location' => $b['main_location'] ?? '',
            'dateRange' => $dateRange,
            'description' => $b['description'] ?? '',
            'id' => $b['id'],
        ];
    }
}
$chinaGeo = [];
$chinaPath = Yii::getAlias('@frontend/web/js/china.json');
if (is_file($chinaPath)) {
    $json = file_get_contents($chinaPath);
    $decoded = json_decode($json, true);
    if (json_last_error() === JSON_ERROR_NONE) {
        $chinaGeo = $decoded;
    }
}
?>

<div class="battle-index" style="padding: 10px 0 40px;">
    <div class="page-hero" style="text-align:center; margin-bottom:20px;">
        <h1 style="color:#b32010;font-weight:800;margin:0 0 6px;"><?= Html::encode($this->title) ?></h1>
        <div style="color:#8a6b52;">点击地图气泡或列表查看战役信息，支持拖拽缩放</div>
    </div>

    <?php if (!empty($points)): ?>
    <div class="battle-map-wrap" style="margin-bottom:20px;">
        <div id="battle-map" style="width:100%;height:520px;border-radius:12px;background:#fffaf4;border:1px solid rgba(179,32,16,0.18);box-shadow: inset 0 1px 0 rgba(255,255,255,0.6), 0 12px 28px rgba(126,74,45,0.12);position:relative;overflow:hidden;"></div>
    </div>
    <?php else: ?>
    <div class="alert alert-warning">暂无地理坐标数据的战役，请在后台为战役添加经纬度。</div>
    <?php endif; ?>

    <h3>战役列表</h3>
    <div class="row">
        <?php foreach ($battles as $battle): ?>
            <div class="col-md-4" style="margin-bottom:16px;">
                <div class="panel panel-default">
                    <div class="panel-heading" style="font-weight:700;"><?= Html::encode($battle->name) ?></div>
                    <div class="panel-body">
                        <p><strong>地点：</strong><?= Html::encode($battle->main_location) ?></p>
                        <p><strong>时间：</strong><?= Html::encode($battle->start_date) ?><?= $battle->end_date ? ' - ' . Html::encode($battle->end_date) : '' ?></p>
                        <p><a class="btn btn-primary btn-sm" href="<?= Url::to(['/battle/view', 'id' => $battle->id]) ?>">查看详情 &raquo;</a></p>
                    </div>
                </div>
            </div>
        <?php endforeach; ?>
    </div>
</div>

<?php if (!empty($points)): ?>
<script>
(function() {
    const container = document.getElementById('battle-map');
    const points = <?= Json::htmlEncode($points) ?>;
    const chinaGeo = <?= Json::htmlEncode($chinaGeo) ?>;
    if (!container) return;

    // fallback for无ECharts或加载失败
    const renderFallback = () => {
        container.innerHTML = '';
        container.style.position = 'relative';
        const tooltip = document.createElement('div');
        tooltip.style.position = 'absolute';
        tooltip.style.transform = 'translate(-50%, -110%)';
        tooltip.style.minWidth = '180px';
        tooltip.style.maxWidth = '240px';
        tooltip.style.background = '#fff';
        tooltip.style.border = '1px solid rgba(179,32,16,0.16)';
        tooltip.style.borderRadius = '8px';
        tooltip.style.boxShadow = '0 10px 24px rgba(0,0,0,0.15)';
        tooltip.style.padding = '8px 10px';
        tooltip.style.display = 'none';
        tooltip.style.pointerEvents = 'none';
        tooltip.style.zIndex = '2';
        container.appendChild(tooltip);

        const bbox = { minLon: 73, maxLon: 135, minLat: 18, maxLat: 54 };
        const project = (lat, lon, w, h) => {
            const x = (lon - bbox.minLon) / (bbox.maxLon - bbox.minLon) * w;
            const y = (bbox.maxLat - lat) / (bbox.maxLat - bbox.minLat) * h;
            return { x, y };
        };
        const renderMarkers = () => {
            const rect = container.getBoundingClientRect();
            container.innerHTML = '';
            container.appendChild(tooltip);
            points.forEach(p => {
                const pos = project(p.value[1], p.value[0], rect.width, rect.height);
                const marker = document.createElement('div');
                marker.style.position = 'absolute';
                marker.style.width = '12px';
                marker.style.height = '12px';
                marker.style.borderRadius = '50%';
                marker.style.transform = 'translate(-50%, -50%)';
                marker.style.left = `${pos.x}px`;
                marker.style.top = `${pos.y}px`;
                marker.style.background = 'radial-gradient(circle at 30% 30%, #ffdfc5, #b32010)';
                marker.style.border = '2px solid rgba(255,255,255,0.9)';
                marker.style.boxShadow = '0 0 0 6px rgba(179,32,16,0.14)';
                marker.style.cursor = 'pointer';
                marker.addEventListener('mouseenter', () => {
                    tooltip.innerHTML = `
                        <strong>${p.name || ''}</strong><br>
                        ${p.location ? '地点：' + p.location + '<br>' : ''}
                        ${p.dateRange ? '时间：' + p.dateRange + '<br>' : ''}
                        ${p.description ? '简介：' + p.description : ''}
                    `;
                    tooltip.style.left = marker.style.left;
                    tooltip.style.top = marker.style.top;
                    tooltip.style.display = 'block';
                });
                marker.addEventListener('mouseleave', () => {
                    tooltip.style.display = 'none';
                });
                container.appendChild(marker);
            });
        };
        renderMarkers();
        window.addEventListener('resize', renderMarkers);
    };

    if (!window.echarts) {
        renderFallback();
        return;
    }

    try {
        const geoJson = (chinaGeo && chinaGeo.type) ? chinaGeo : {
            type: 'FeatureCollection',
            features: [{
                type: 'Feature',
                properties: { name: 'China' },
                geometry: { type: 'Polygon', coordinates: [[[73,18],[135,18],[135,54],[73,54],[73,18]]] }
            }]
        };

        echarts.registerMap('china', geoJson);
        const chart = echarts.init(container);
        const option = {
            backgroundColor: '#fffaf4',
            tooltip: {
                trigger: 'item',
                position: function (pos) {
                    // 将提示框放在鼠标正下方，避免遮挡
                    return [pos[0], pos[1] + 10];
                },
                confine: true,
                extraCssText: 'max-width:240px; white-space:normal; word-break:break-all; padding:8px 10px; border-radius:8px; box-shadow:0 12px 28px rgba(0,0,0,0.15);',
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
                    areaColor: '#f1d3b4',
                    borderColor: '#b32010',
                    borderWidth: 1.2,
                    shadowColor: 'rgba(0,0,0,0.08)',
                    shadowBlur: 12,
                    shadowOffsetX: 0,
                    shadowOffsetY: 6
                },
                emphasis: { itemStyle: { areaColor: '#f0b87d' } }
            },
            series: [{
                type: 'effectScatter',
                coordinateSystem: 'geo',
                data: points,
                symbolSize: 10,
                rippleEffect: { brushType: 'stroke', scale: 3 },
                itemStyle: { color: '#b32010', shadowBlur: 10, shadowColor: 'rgba(179,32,16,0.35)' }
            }]
        };
        chart.setOption(option);
        window.addEventListener('resize', () => chart.resize());
    } catch (e) {
        console.error('地图渲染失败，已降级为静态标注', e);
        renderFallback();
    }
})();
</script>
<?php endif; ?>
