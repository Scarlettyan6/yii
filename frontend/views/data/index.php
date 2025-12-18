<?php
use yii\helpers\Url;
use yii\web\View;

$this->title = '抗战数据';

$echartsLocal = Yii::getAlias('@webroot/vendor/echarts/echarts.min.js');
if (is_file($echartsLocal)) {
    $this->registerJsFile('@web/vendor/echarts/echarts.min.js', ['position' => View::POS_HEAD]);
} else {
    $this->registerJsFile('https://cdn.jsdelivr.net/npm/echarts@5/dist/echarts.min.js', ['position' => View::POS_HEAD]);
}

$this->registerCssFile('@web/css/war-stats.css', ['position' => View::POS_HEAD]);
$this->registerJsFile('@web/js/war-stats.js', ['position' => View::POS_END]);

$apiUrl = Url::to(['data/api']);
$downloadBase = Url::to(['data/download']); // /data/download?key=xxx
$this->registerJs("window.__WAR_STATS__ = " . json_encode([
    'apiUrl' => $apiUrl,
    'downloadBase' => $downloadBase,
], JSON_UNESCAPED_UNICODE) . ";", View::POS_HEAD);
?>

<div class="ws-page">
  <section class="ws-hero">
    <div class="ws-hero-inner">
      <div class="ws-hero-left">
        <div class="ws-kicker">数据专题 · 可追溯来源 · 可下载复现</div>
        <h1 class="ws-title">抗战数据｜以指标读懂战争的节奏</h1>

        <div class="ws-quote">
          “这些数字，记录的是一个民族为生存付出的代价。”
        </div>

        <p class="ws-subtitle">
          每条数据都保留“来源与口径说明”，支持下载 CSV 与原始表格核对。
        </p>

        <div class="ws-hero-actions">
          <a class="ws-btn ws-btn-primary" href="#dashboard">进入仪表盘</a>
          <a class="ws-btn" href="#evidence">查看来源与方法</a>
        </div>
      </div>

      <div class="ws-hero-right">
        <div class="ws-kpi">
          <div class="ws-kpi-card">
            <div class="ws-kpi-label">数据集数</div>
            <div class="ws-kpi-value" id="kpiDatasets">—</div>
            <div class="ws-kpi-sub" id="kpiDatasetsSub">—</div>
          </div>
          <div class="ws-kpi-card">
            <div class="ws-kpi-label">指标数</div>
            <div class="ws-kpi-value" id="kpiIndicators">—</div>
            <div class="ws-kpi-sub" id="kpiIndicatorsSub">—</div>
          </div>
          <div class="ws-kpi-card">
            <div class="ws-kpi-label">覆盖年份</div>
            <div class="ws-kpi-value" id="kpiYears">—</div>
            <div class="ws-kpi-sub" id="kpiYearsSub">—</div>
          </div>
        </div>

        <div class="ws-hero-note">
          <div class="ws-hero-note-text" id="heroNoteText">
            提示：左侧选指标，右侧自动选择最适合的展示方式（图表/表格/时间轴）。
          </div>
        </div>
      </div>
    </div>
  </section>

  <section class="ws-dashboard" id="dashboard">
    <div class="ws-grid">
      <aside class="ws-panel">
        <div class="ws-panel-hd">
          <div class="ws-panel-title">指标目录</div>
          <input id="wsSearch" class="ws-search" placeholder="搜索：伤亡 / 会战 / 1947 / 细菌战…" />
          <div class="ws-panel-hint">按主题分组展示，便于理解数据结构</div>
        </div>
        <div id="wsList" class="ws-list"></div>
      </aside>

      <main class="ws-main">
        <div class="ws-main-hd">
          <div class="ws-main-title">
            <div class="ws-h2" id="wsCurTitle">加载中…</div>
            <div class="ws-hint" id="wsCurSub">—</div>
          </div>

          <div class="ws-toolbar">
            <button class="ws-chip" id="btnCompare" style="display:none;">对比：关</button>
            <a class="ws-chip ws-chip-link" id="btnDownload" href="javascript:void(0)">下载 CSV</a>
          </div>
        </div>

        <div class="ws-card">
          <div class="ws-card-hd">
            <div class="ws-badge" id="wsUnitBadge">单位：—</div>
            <div class="ws-badge subtle" id="wsRenderBadge">展示：—</div>
          </div>

          <div class="ws-card-bd">
            <!-- 统一的“主展示位”：可能是图表 / 表格 / 时间轴 -->
            <div class="ws-stage">
              <div id="wsChart" class="ws-chart"></div>

              <div id="wsTableStage" class="ws-table-stage" style="display:none;">
                <div class="ws-table-tools">
                  <input id="wsTableSearch" class="ws-table-search" placeholder="在表格内搜索（姓名/战役/地点/关键词）…" />
                  <div class="ws-table-tip" id="wsTableTip">—</div>
                </div>
                <div class="ws-table-scroll">
                  <table class="ws-table" id="wsTable"></table>
                </div>
              </div>

              <div id="wsTimelineStage" class="ws-timeline-stage" style="display:none;">
                <div class="ws-timeline-hint">
                  横轴为时间，纵轴为战役。鼠标悬停可查看备注。
                </div>
                <div id="wsTimelineChart" class="ws-chart ws-chart-timeline"></div>
              </div>
            </div>

            <div class="ws-insight">
              <div class="ws-insight-k">一句话解读</div>
              <div class="ws-insight-v" id="wsInsight">—</div>
            </div>

            <div class="ws-compare" id="wsCompareBox" style="display:none;">
              <div class="ws-compare-hd">对比指标</div>
              <select id="wsCompareSelect" class="ws-select"></select>
              <div class="ws-compare-hint">开启后将尝试“双轴叠加”或“并列小图”。</div>
            </div>
          </div>
        </div>

        <section class="ws-evidence-inline" id="evidence">
          <div class="ws-evi-hd">
            <div class="ws-h2">来源与方法</div>
            <div class="ws-hint">展示数据来源、处理方法，并提供 CSV 下载用于复现。</div>
          </div>
          <div class="ws-evi-grid">
            <div class="ws-evi-card">
              <div class="ws-evi-k">来源说明</div>
              <div class="ws-evi-v" id="wsEvidenceSource">—</div>
            </div>
            <div class="ws-evi-card">
              <div class="ws-evi-k">处理方法</div>
              <div class="ws-evi-v" id="wsEvidenceMethod">—</div>
            </div>
          </div>
        </section>
      </main>
    </div>
  </section>
</div>
