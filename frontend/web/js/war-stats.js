(() => {
  const CFG = window.__WAR_STATS__ || {};
  const $ = (id) => document.getElementById(id);

  const els = {
    kpiDatasets: $("kpiDatasets"),
    kpiIndicators: $("kpiIndicators"),
    kpiYears: $("kpiYears"),
    kpiDatasetsSub: $("kpiDatasetsSub"),
    kpiIndicatorsSub: $("kpiIndicatorsSub"),
    kpiYearsSub: $("kpiYearsSub"),

    wsSearch: $("wsSearch"),
    wsList: $("wsList"),

    wsCurTitle: $("wsCurTitle"),
    wsCurSub: $("wsCurSub"),
    wsUnitBadge: $("wsUnitBadge"),
    wsRenderBadge: $("wsRenderBadge"),
    wsInsight: $("wsInsight"),

    btnCompare: $("btnCompare"),
    wsCompareBox: $("wsCompareBox"),
    wsCompareSelect: $("wsCompareSelect"),

    btnDownload: $("btnDownload"),

    // stage
    wsChart: $("wsChart"),
    wsTableStage: $("wsTableStage"),
    wsTable: $("wsTable"),
    wsTableSearch: $("wsTableSearch"),
    wsTableTip: $("wsTableTip"),

    wsTimelineStage: $("wsTimelineStage"),
    wsTimelineChart: $("wsTimelineChart"),

    wsEvidenceSource: $("wsEvidenceSource"),
    wsEvidenceMethod: $("wsEvidenceMethod"),
  };

  let state = {
    data: null,
    curId: null,
    chart: null,
    timelineChart: null,
    tableAllRows: [],
    tableHeader: [],
    compareOn: false,
  };

  // ========= 调试开关 =========
  const DEBUG = true;
  function dbg(...args) {
    if (DEBUG) console.log("[WAR-STATS]", ...args);
  }

  function fmtNumber(n) {
    if (n === null || n === undefined || n === "") return "—";
    const x = Number(n);
    if (!Number.isFinite(x)) return String(n);
    return x.toLocaleString("zh-CN");
  }

  function escapeHtml(s) {
    return String(s ?? "")
      .replaceAll("&", "&amp;")
      .replaceAll("<", "&lt;")
      .replaceAll(">", "&gt;")
      .replaceAll('"', "&quot;");
  }

  // ========= 图表美化辅助函数 =========

  function niceScaleUnit(unit, value) {
    if (value === null || value === undefined) return { value, unit };
    const u = String(unit || "").trim();

    if (u === "人") {
      const abs = Math.abs(Number(value));
      if (abs >= 1e8) return { value: value / 1e8, unit: "亿人" };
      if (abs >= 1e4) return { value: value / 1e4, unit: "万人" };
      return { value, unit: "人" };
    }
    if (u === "万人") return { value, unit: "万人" };
    if (u.includes("十亿美元")) return { value, unit: u };
    return { value, unit: u || "—" };
  }

  function collectAllValues(seriesObj) {
    const out = [];
    const s = seriesObj?.series || {};
    for (const sn of Object.keys(s)) {
      for (const p of (s[sn] || [])) out.push(p?.value);
    }
    return out;
  }

  function shouldUseLogAxis(values) {
    const v = values
      .filter((x) => x !== null && x !== undefined)
      .map(Number)
      .filter(Number.isFinite);
    if (!v.length) return false;
    if (v.some((x) => x <= 0)) return false;
    const min = Math.min(...v);
    const max = Math.max(...v);
    if (min <= 0) return false;
    return max / min >= 1000;
  }

  function detectGroup(cat) {
    const name = cat.name || "";
    const id = cat.id || "";
    if (id.includes("timeline") || name.includes("时间轴")) return "时间轴";
    if (id.includes("martyrs") || name.includes("名录") || name.includes("将领")) return "人物与名录";
    if (name.includes("伤亡") || name.includes("损失") || name.includes("损") || name.includes("人口")) return "人员伤亡";
    if (name.includes("化学") || name.includes("细菌") || name.includes("劳工") || name.includes("万人坑")) return "战争影响";
    if (name.includes("二战") || name.includes("概览") || name.includes("世界")) return "横向对照";
    if (name.includes("会战") || name.includes("战报") || name.includes("战役")) return "会战与战报";
    return "其他";
  }

  function buildList(categories) {
    const q = (els.wsSearch?.value || "").trim().toLowerCase();
    const filtered = categories.filter((c) => {
      const hay = (c.name + " " + (c.description || "") + " " + (c.source || "")).toLowerCase();
      return q === "" || hay.includes(q);
    });

    const groups = new Map();
    for (const c of filtered) {
      const g = detectGroup(c);
      if (!groups.has(g)) groups.set(g, []);
      groups.get(g).push(c);
    }

    const groupOrder = ["人员伤亡", "会战与战报", "时间轴", "人物与名录", "战争影响", "横向对照", "其他"];
    const groupKeys = Array.from(groups.keys()).sort((a, b) => {
      const ia = groupOrder.indexOf(a);
      const ib = groupOrder.indexOf(b);
      return (ia === -1 ? 999 : ia) - (ib === -1 ? 999 : ib);
    });

    let html = "";
    for (const g of groupKeys) {
      html += `<div class="ws-group">
        <div class="ws-group-title">${escapeHtml(g)}</div>
      </div>`;
      const items = groups.get(g);
      for (const c of items) {
        const active = c.id === state.curId ? "active" : "";
        html += `
          <div class="ws-item ${active}" data-id="${escapeHtml(c.id)}">
            <div class="t">${escapeHtml(c.name)}</div>
            <div class="s">${escapeHtml(c.hint || c.description || "")}</div>
          </div>
        `;
      }
    }

    els.wsList.innerHTML = html;

    els.wsList.querySelectorAll(".ws-item").forEach((el) => {
      el.addEventListener("click", () => {
        const id = el.getAttribute("data-id");
        if (id) renderCategory(id);
      });
    });
  }

  function setStage(mode) {
    els.wsChart.style.display = mode === "chart" ? "block" : "none";
    els.wsTableStage.style.display = mode === "table" ? "block" : "none";
    els.wsTimelineStage.style.display = mode === "timeline" ? "block" : "none";
    els.wsRenderBadge.textContent = "展示：" + (mode === "chart" ? "图表" : mode === "table" ? "表格" : "时间轴");
  }

  function ensureChart() {
    if (!window.echarts) return null;
    if (!state.chart) {
      state.chart = echarts.init(els.wsChart);
      window.addEventListener("resize", () => state.chart && state.chart.resize());
    }
    return state.chart;
  }

  function ensureTimelineChart() {
    if (!window.echarts) return null;
    if (!state.timelineChart) {
      state.timelineChart = echarts.init(els.wsTimelineChart);
      window.addEventListener("resize", () => state.timelineChart && state.timelineChart.resize());
    }
    return state.timelineChart;
  }

  function computeInsightForChart(seriesObj) {
    const unit = seriesObj?._unit || "";
    const sNames = Object.keys(seriesObj.series || {});
    let all = [];
    for (const sn of sNames) {
      const pts = seriesObj.series[sn] || [];
      for (const p of pts) {
        if (p && p.value !== null && p.value !== undefined) {
          all.push({ series: sn, label: p.label, value: Number(p.value) });
        }
      }
    }
    if (all.length === 0) return "—";
    all.sort((a, b) => a.value - b.value);
    const min = all[0],
      max = all[all.length - 1];
    if (min.label === max.label && all.length === 1) {
      return `仅 1 条数据：${max.label} 约 ${fmtNumber(max.value)}${unit ? " " + unit : ""}。`;
    }
    return `最大值出现在“${max.label}”（${max.series}），约 ${fmtNumber(max.value)}${unit ? " " + unit : ""}；最小值为“${min.label}”，约 ${fmtNumber(min.value)}${unit ? " " + unit : ""}。`;
  }

  function normalizeChartSeries(seriesObj) {
    const out = { ...seriesObj, series: {} };
    const s = seriesObj.series || {};
    for (const sn of Object.keys(s)) {
      out.series[sn] = (s[sn] || []).map((p, idx) => {
        let label = (p?.label ?? "").trim();
        if (!label) label = (p?.extra?.metric ?? "").trim();
        if (!label) label = (p?.extra?.name ?? "").trim();
        if (!label) label = `条目${idx + 1}`;
        return { ...p, label };
      });
    }
    return out;
  }

  // ========= 核心：美化后的 renderChart =========
  function renderChart(category, seriesObj) {
    setStage("chart");
    const chart = ensureChart();
    if (!chart) return;

    const normalized = normalizeChartSeries(seriesObj || { series: {} });
    const rawUnit = normalized?._unit || category.unit || "";

    // x 轴
    const x = [];
    const pushUnique = (v) => {
      if (!x.includes(v)) x.push(v);
    };

    if (normalized._x && Array.isArray(normalized._x) && normalized._x.length) {
      normalized._x.forEach(pushUnique);
    } else {
      for (const sn of Object.keys(normalized.series || {})) {
        for (const p of normalized.series[sn] || []) pushUnique(p.label);
      }
    }

    // 判断 log
    const allVals = collectAllValues(normalized);
    const useLog = shouldUseLogAxis(allVals);

    // 自动单位换算：取最大值决定档位
    const finiteVals = allVals.map(Number).filter((v) => Number.isFinite(v));
    const vmax = finiteVals.length ? Math.max(...finiteVals.map((v) => Math.abs(v))) : 0;
    const probe = niceScaleUnit(rawUnit, vmax);
    const finalUnit = probe.unit;

    const scaleFactor = (() => {
      if (rawUnit === "人" && finalUnit === "万人") return 1e4;
      if (rawUnit === "人" && finalUnit === "亿人") return 1e8;
      return 1;
    })();

    // series
    const echSeries = [];
    const sNames = normalized.series ? Object.keys(normalized.series) : [];

    for (const sn of sNames) {
      const pts = normalized.series[sn] || [];
      const map = new Map();
      for (const p of pts) map.set(p.label, p.value);

      const data = x.map((lab) => {
        const v = map.has(lab) ? map.get(lab) : null;
        if (v === null || v === undefined) return null;
        const num = Number(v);
        if (!Number.isFinite(num)) return null;
        return scaleFactor === 1 ? num : num / scaleFactor;
      });

      echSeries.push({
        name: sn,
        type: "bar",
        data,
        barMaxWidth: 42,
        emphasis: { focus: "series" },
        label: {
          show: x.length <= 12,
          position: "top",
          formatter: (p) => (p.data == null ? "" : fmtNumber(p.data)),
        },
      });
    }

    const needZoom = x.length > 12;

    const option = {
      animationDuration: 350,
      grid: { left: 70, right: 24, top: 72, bottom: needZoom ? 110 : 85 },
      legend: { top: 12, left: 10, type: "scroll" },
      tooltip: {
        trigger: "axis",
        axisPointer: { type: "shadow" },
        formatter: (params) => {
          const axis = params?.[0]?.axisValue ?? "";
          let html = `<div style="font-weight:800;margin-bottom:6px;">${escapeHtml(axis)}</div>`;
          for (const p of params) {
            const val = p.data == null ? "—" : fmtNumber(p.data);
            html += `<div style="display:flex;gap:8px;align-items:center;">
              <span style="display:inline-block;width:10px;height:10px;border-radius:2px;background:${p.color};"></span>
              <span>${escapeHtml(p.seriesName)}：</span>
              <span style="font-weight:800;">${val}${finalUnit ? " " + escapeHtml(finalUnit) : ""}</span>
            </div>`;
          }
          return html;
        },
      },
      xAxis: {
        type: "category",
        data: x,
        axisTick: { alignWithLabel: true },
        axisLabel: {
          interval: 0,
          rotate: x.length > 8 ? 18 : 0,
          formatter: (v) => {
            const s = String(v ?? "");
            return s.length > 14 ? s.slice(0, 14) + "…" : s;
          },
        },
      },
      yAxis: {
        type: useLog ? "log" : "value",
        min: useLog ? null : 0,
        axisLabel: { formatter: (v) => fmtNumber(v) },
        splitLine: { show: true },
      },
      dataZoom: needZoom
        ? [
            { type: "inside", xAxisIndex: 0, start: 0, end: 100 },
            { type: "slider", xAxisIndex: 0, height: 22, bottom: 40, start: 0, end: 100 },
          ]
        : [],
      series: echSeries,
    };

    dbg("renderChart", category.id, { xLen: x.length, series: sNames, useLog, rawUnit, finalUnit, scaleFactor });
    chart.setOption(option, true);

    els.wsUnitBadge.textContent = "单位：" + (finalUnit || "—");
    els.wsInsight.textContent = computeInsightForChart(normalized) + (useLog ? "（跨度较大，已启用对数轴）" : "");
  }

  function renderTable(category, tableObj) {
    setStage("table");

    const header = tableObj?.header || [];
    const rows = tableObj?.rows || [];
    state.tableHeader = header;
    state.tableAllRows = rows;

    let tip = category.hint || category.description || "";
    if (category.id === "eighth_route_compare") tip = "提示：此表用于对照“八路战报 vs 日方战报”，请重点关注口径差异与数量级差距。";
    if (category.id === "martyrs_list") tip = "提示：可在右上搜索姓名/籍贯/战役关键字，适合课堂展示与浏览。";
    els.wsTableTip.textContent = tip || "—";

    function buildTable(filteredRows) {
      let thead = "<thead><tr>";
      for (const h of header) thead += `<th>${escapeHtml(h)}</th>`;
      thead += "</tr></thead>";

      let tbody = "<tbody>";
      for (const r of filteredRows) {
        tbody += "<tr>";
        for (let i = 0; i < header.length; i++) {
          const cell = r[i] ?? "";
          const strong =
            typeof cell === "string" && (cell.includes("余") || cell.includes("万") || cell.includes("亡") || cell.includes("伤"));
          tbody += `<td class="${strong ? "ws-cell-strong" : ""}">${escapeHtml(cell)}</td>`;
        }
        tbody += "</tr>";
      }
      tbody += "</tbody>";

      els.wsTable.innerHTML = thead + tbody;
    }

    buildTable(rows);

    els.wsTableSearch.value = "";
    els.wsTableSearch.oninput = () => {
      const q = (els.wsTableSearch.value || "").trim().toLowerCase();
      if (!q) return buildTable(state.tableAllRows);
      const out = state.tableAllRows.filter((r) => r.some((c) => String(c ?? "").toLowerCase().includes(q)));
      buildTable(out);
    };

    els.wsUnitBadge.textContent = "单位：" + (category.unit || "—");
    els.wsInsight.textContent = rows.length ? `共 ${rows.length} 条记录。建议结合“来源与方法”理解口径差异。` : "—";
  }

  function renderTimeline(category, extraObj) {
    setStage("timeline");
    const chart = ensureTimelineChart();
    if (!chart) return;

    const items = extraObj?.timeline || [];
    const names = items.map((x) => x.name);

    const data = items.map((it, idx) => ({
      name: it.name,
      value: [idx, it.start, it.end, it.note || ""],
    }));

    const option = {
      grid: { left: 160, right: 30, top: 30, bottom: 40 },
      tooltip: {
        formatter: (p) => {
          const v = p.value || [];
          const name = p.name || "";
          const start = v[1],
            end = v[2],
            note = v[3];
          return `<div style="font-weight:800;margin-bottom:6px;">${escapeHtml(name)}</div>
                  <div>时间：${escapeHtml(start)} ~ ${escapeHtml(end)}</div>
                  ${note ? `<div style="margin-top:6px;color:#555;">备注：${escapeHtml(note)}</div>` : ""}`;
        },
      },
      xAxis: { type: "time" },
      yAxis: {
        type: "category",
        data: names,
        axisLabel: { formatter: (v) => (String(v).length > 10 ? String(v).slice(0, 10) + "…" : v) },
      },
      series: [
        {
          type: "custom",
          renderItem: (params, api) => {
            const idx = api.value(0);
            const start = api.coord([api.value(1), idx]);
            const end = api.coord([api.value(2), idx]);
            const height = 16;
            const y = start[1] - height / 2;
            const x = start[0];
            const w = Math.max(2, end[0] - start[0]);
            return { type: "rect", shape: { x, y, width: w, height }, style: api.style() };
          },
          itemStyle: { opacity: 0.9 },
          encode: { x: [1, 2], y: 0 },
          data,
        },
      ],
    };

    chart.setOption(option, true);

    els.wsUnitBadge.textContent = "单位：—";
    els.wsInsight.textContent = items.length ? `共 ${items.length} 条战役记录，按时间轴展示便于讲述战争进程与阶段性变化。` : "—";
  }

  function renderEvidence(category) {
    els.wsEvidenceSource.textContent = category.source || "—";
    els.wsEvidenceMethod.textContent = category.description || category.hint || "—";
  }

  function renderDownload(category) {
    els.btnDownload.onclick = () => {
      const key = category.key;
      if (!key) return;
      const url = CFG.downloadBase + (CFG.downloadBase.includes("?") ? "&" : "?") + "key=" + encodeURIComponent(key);
      window.open(url, "_blank");
    };
  }

  function renderCategory(id) {
    state.curId = id;

    const categories = state.data?.categories || [];
    const cat = categories.find((c) => c.id === id);
    if (!cat) return;

    buildList(categories);

    els.wsCurTitle.textContent = cat.name || "—";
    els.wsCurSub.textContent = cat.hint || cat.description || "—";

    renderEvidence(cat);
    renderDownload(cat);

    const display = cat.display || "chart";

    els.btnCompare.style.display = "none";
    els.wsCompareBox.style.display = "none";

    if (display === "table") {
      const tableObj = (state.data?.tablesByCategory || {})[id] || { header: [], rows: [] };
      renderTable(cat, tableObj);
      return;
    }

    if (display === "timeline") {
      const extraObj = (state.data?.extraByCategory || {})[id] || {};
      renderTimeline(cat, extraObj);
      return;
    }

    const seriesObj = (state.data?.seriesByCategory || {})[id] || { series: {} };
    renderChart(cat, seriesObj);
  }

  async function boot() {
    els.wsCurTitle.textContent = "加载中…";
    els.wsCurSub.textContent = "—";

    dbg("CFG", CFG);

    const res = await fetch(CFG.apiUrl, { credentials: "same-origin" });
    dbg("api status", res.status, res.url);

    const data = await res.json();
    dbg("api data keys", Object.keys(data || {}));
    state.data = data;

    const meta = data.meta || {};
    els.kpiDatasets.textContent = meta.datasets ?? (data.categories?.length ?? "—");
    els.kpiIndicators.textContent = meta.indicators ?? (data.categories?.length ?? "—");
    els.kpiYears.textContent = meta.years ?? "—";

    els.kpiDatasetsSub.textContent = "覆盖 12 份 CSV（用于对比与复现）";
    els.kpiIndicatorsSub.textContent = "涵盖伤亡/暴行/社会影响等";
    els.kpiYearsSub.textContent = "记录战争记忆的时间跨度";

    buildList(data.categories || []);
    els.wsSearch.oninput = () => buildList(state.data.categories || []);

    const first = (data.categories || [])[0];
    if (first) renderCategory(first.id);
  }

  boot().catch((e) => {
    console.error(e);
    els.wsCurTitle.textContent = "加载失败";
    els.wsCurSub.textContent = "请检查 /data/api 是否正常返回 JSON，以及 ECharts 是否加载成功。";
  });
})();
