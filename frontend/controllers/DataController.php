<?php
namespace frontend\controllers;

use Yii;
use yii\web\Controller;
use yii\web\Response;

class DataController extends Controller
{
    private function csvDir(): string
    {
        return Yii::getAlias('@frontend/web/data/war');
    }

    private function normalizeHeader(string $h): string
    {
        $h = trim($h);
        $h = preg_replace('/^\xEF\xBB\xBF/', '', $h); // BOM
        $h = str_replace(["\u{00A0}", '　'], ' ', $h);
        $h = trim($h);

        $map = [
            // 通用中文 -> 英文
            '数据集' => 'dataset',
            '开始' => 'period_start',
            '结束' => 'period_end',
            '开始年' => 'period_start',
            '结束年' => 'period_end',
            '范围' => 'scope',
            '对象' => 'scope',
            '指标' => 'metric',
            '度量' => 'metric',
            '项目' => 'metric',
            '值' => 'value',
            '数值' => 'value',
            '数量' => 'value',
            '单位' => 'unit',
            '类型' => 'type',
            '来源' => 'source',
            '备注' => 'note',
            '说明' => 'note',
            '标签' => 'label',
            '群体' => 'group',
            '年份' => 'year',
            '分组' => 'group',
            '阵营' => 'side',
            '系列' => 'series',

            // battle_reports_compare
            '战役' => 'battle',
            '方' => 'side',

            // timeline
            '起始' => 'start',
            '终止' => 'end',
            '精度_起始' => 'start_precision',
            '精度_终止' => 'end_precision',

            // martyrs_list
            '姓名' => 'name',
            '生年' => 'birth_year',
            '卒年' => 'death_year',
            '追赠军衔' => 'posthumous_rank',
            '职务' => 'position',
            '籍贯' => 'birthplace',
            '事迹' => 'notes',
            '事迹摘要' => 'notes',
        ];

        return $map[$h] ?? $h; // 英文表头原样保留
    }

    private function readCsv(string $path): array
{
    $rows = [];
    if (!is_file($path)) return $rows;

    $raw = file_get_contents($path);
    if ($raw === false || $raw === '') return $rows;

    // 去 BOM
    $raw = preg_replace('/^\xEF\xBB\xBF/', '', $raw);

    // 统一编码到 UTF-8
    if (function_exists('mb_detect_encoding')) {
        $enc = mb_detect_encoding($raw, ['UTF-8','GB18030','GBK','GB2312','BIG5'], true);
        if ($enc && $enc !== 'UTF-8') {
            $raw = mb_convert_encoding($raw, 'UTF-8', $enc);
        }
    }

    // 统一弯引号
    $raw = str_replace(["“", "”"], '"', $raw);

    // 用内存流 + fgetcsv：关键是它能正确处理引号/逗号/字段内换行
    $fp = fopen('php://temp', 'r+');
    fwrite($fp, $raw);
    rewind($fp);

    $headerRaw = fgetcsv($fp);
    if (!$headerRaw) { fclose($fp); return $rows; }

    $header = [];
    foreach ($headerRaw as $h) $header[] = $this->normalizeHeader((string)$h);

    while (($data = fgetcsv($fp)) !== false) {
        if (!$data) continue;

        $row = [];
        $n = count($header);
        for ($j = 0; $j < $n; $j++) {
            $k = trim((string)($header[$j] ?? ''));
            if ($k === '') continue;
            $v = $data[$j] ?? '';
            $row[$k] = is_string($v) ? trim($v) : $v;
        }

        // 跳过全空行
        $allEmpty = true;
        foreach ($row as $v) {
            if ($v !== '' && $v !== null) { $allEmpty = false; break; }
        }
        if (!$allEmpty) $rows[] = $row;
    }

    fclose($fp);
    return $rows;
}



    private function toNumber($v): ?float
    {
        if ($v === null) return null;
        $s = trim((string)$v);
        if ($s === '') return null;

        $s = str_replace(["\xEF\xBB\xBF", "\u{00A0}", '　', '“', '”', '"'], '', $s);
        $s = str_replace([',', '，', ' '], '', $s);

        // 允许 >5000、2100余、930+ 这种：提取第一个数字
        if (preg_match('/-?\d+(?:\.\d+)?/', $s, $m) !== 1) return null;
        return (float)$m[0];
    }

    private function pick(array $row, array $keys, $default = '')
    {
        foreach ($keys as $k) {
            if (array_key_exists($k, $row) && trim((string)$row[$k]) !== '') return $row[$k];
        }
        return $default;
    }

    private function parseYmToDate(string $ym): ?string
    {
        $ym = trim($ym);
        if ($ym === '') return null;

        if (preg_match('/^\d{4}$/', $ym)) return $ym . '-01-01';
        if (preg_match('/^\d{4}-\d{2}$/', $ym)) return $ym . '-01';
        if (preg_match('/^\d{4}-\d{2}-\d{2}$/', $ym)) return $ym;
        return null;
    }

    public function actionIndex()
    {
        return $this->render('index');
    }

    public function actionApi()
    {
        Yii::$app->response->format = Response::FORMAT_JSON;
        $dir = $this->csvDir();

        $categories = [
            [
                'id' => 'china_casualties_estimates',
                'key' => '01_china_casualties_estimates.csv',
                'name' => '抗战伤亡与损失估计（多来源口径对比）',
                'unit' => '人/万人/十亿美元（见数据）',
                'description' => '同一指标在不同来源/口径下的差异展示',
                'source' => '多来源汇编',
                'display' => 'chart',
                'hint' => '适合：分组柱状（x=metric，series=source）',
            ],
            [
                'id' => 'china_casualties_components',
                'key' => '02_kmt_1947_casualties_components.csv',
                'name' => '1947 国民政府报告：军民伤亡构成',
                'unit' => '人',
                'description' => '军队/平民/合计构成',
                'source' => '1947 行政院报告（转述）',
                'display' => 'chart',
                'hint' => '适合：分组柱状（x=metric，series=group）',
            ],
            [
                'id' => 'liberated_areas_losses',
                'key' => '03_liberated_areas_losses.csv',
                'name' => '解放区：七个抗日根据地人口损失（初步统计）',
                'unit' => '人',
                'description' => '死亡/被掳壮丁/鳏寡孤独及伤残等',
                'source' => '1946 初步统计表（转述）',
                'display' => 'chart',
                'hint' => '适合：柱状图（x=metric）',
            ],
            [
                'id' => 'ccp_forces_losses',
                'key' => '04_ccp_forces_losses.csv',
                'name' => '中共领导武装力量损失统计（1937–1945）',
                'unit' => '人',
                'description' => '负伤/阵亡/被俘/失踪/合计',
                'source' => '统计汇编（转述）',
                'display' => 'chart',
                'hint' => '适合：柱状图（x=metric）',
            ],
            [
                'id' => 'special_losses',
                'key' => '05_special_losses.csv',
                'name' => '特殊伤亡与暴行（劳工/万人坑/细菌战/化学战等）',
                'unit' => '混合',
                'description' => '字段混合，口径差异大：更适合表格检索与讲述',
                'source' => '多来源汇编',
                'display' => 'table',
                'hint' => '适合：表格（带搜索）',
            ],
            [
                'id' => 'ww2_overview',
                'key' => '06_ww2_overview_and_soviet_losses.csv',
                'name' => '二战概览与对照（世界/中国/苏联等）',
                'unit' => '万人/万人次',
                'description' => '总体对照指标',
                'source' => '汇编（转述）',
                'display' => 'chart',
                'hint' => '适合：对照柱状图（按 scope）',
            ],
            [
                'id' => 'displacement',
                'key' => '07_displacement.csv',
                'name' => '战时难民/流亡与灾荒死亡（片段指标）',
                'unit' => '人/万人',
                'description' => '条目少但信息密度高',
                'source' => '汇编（转述）',
                'display' => 'table',
                'hint' => '适合：表格（讲解型）',
            ],
            [
                'id' => 'china_battlefield_numbers',
                'key' => '08_china_theater_military_numbers_2015.csv',
                'name' => '2015 通报：在华日军兵力与损失要点',
                'unit' => '万/起',
                'description' => '指标少但重要，适合课堂快速讲述',
                'source' => '2015 通报（转述）',
                'display' => 'table',
                'hint' => '适合：表格/KPI 讲述',
            ],
            [
                'id' => 'battles_timeline',
                'key' => '09_kmt_major_campaigns_list.csv',
                'name' => '国军主要会战/战役清单（时间轴）',
                'unit' => '—',
                'description' => '按月精度的战役时间分布',
                'source' => '汇编',
                'display' => 'timeline',
                'hint' => '适合：时间轴甘特图',
            ],
            [
                'id' => 'battle_reports_compare',
                'key' => '10_battle_casualty_reports_comparison.csv',
                'name' => '部分大会战：中方战报 vs 日方战报（伤亡对比）',
                'unit' => '人',
                'description' => '同一战役不同来源差异',
                'source' => '战报/战史（转述）',
                'display' => 'chart',
                'hint' => '适合：分组柱状（battle 分组，side/metric 作为系列）',
            ],
            [
                'id' => 'eighth_route_compare',
                'key' => '11_ccp_battle_reports_discrepancies.csv',
                'name' => '敌后战斗：八路战报 vs 日方战报差异（示例）',
                'unit' => '人',
                'description' => '口径差异大：更适合表格展示并强调差距',
                'source' => '战史（转述）',
                'display' => 'table',
                'hint' => '适合：表格（搜索/讲解）',
            ],
            [
                'id' => 'martyrs_list',
                'key' => '12_martyrs_generals_list.csv',
                'name' => '抗战殉国将领名录（含籍贯/职务/事迹）',
                'unit' => '—',
                'description' => '信息型数据，适合表格检索展示',
                'source' => '汇编',
                'display' => 'table',
                'hint' => '适合：表格（支持搜索）',
            ],
        ];

        $categoriesOut = [];
        $seriesByCategory = [];
        $tablesByCategory = [];
        $extraByCategory = [];

        foreach ($categories as $c) {
            $path = $dir . DIRECTORY_SEPARATOR . $c['key'];
            $rows = $this->readCsv($path);

            $categoriesOut[] = [
                'id' => $c['id'],
                'key' => $c['key'],
                'name' => $c['name'],
                'unit' => $c['unit'],
                'description' => $c['description'],
                'source' => $c['source'],
                'display' => $c['display'],
                'hint' => $c['hint'] ?? '',
            ];

            switch ($c['id']) {

                // ====== ✅ 01：多来源口径对比：x=metric，series=source ======
                case 'china_casualties_estimates': {
                    $x = [];
                    $seriesMap = [];
                    $unit = '';

                    foreach ($rows as $r) {
                        $metric = trim((string)$this->pick($r, ['metric', '指标'], ''));
                        $source = trim((string)$this->pick($r, ['source', '来源'], ''));
                        $value  = $this->toNumber($this->pick($r, ['value', '数值', '值', '数量'], null));
                        if ($metric === '' || $source === '' || $value === null) continue;

                        if (!in_array($metric, $x, true)) $x[] = $metric;

                        if (!isset($seriesMap[$source])) $seriesMap[$source] = [];
                        $seriesMap[$source][$metric] = $value;

                        $u = trim((string)$this->pick($r, ['unit', '单位'], ''));
                        if ($u !== '' && $unit === '') $unit = $u;
                    }

                    $series = [];
                    foreach ($seriesMap as $sn => $map) {
                        $pts = [];
                        foreach ($x as $metric) {
                            $pts[] = [
                                'label' => $metric,
                                'value' => $map[$metric] ?? null,
                                'unit'  => $unit !== '' ? $unit : ($c['unit'] ?? '—'),
                                'note'  => '',
                            ];
                        }
                        $series[$sn] = $pts;
                    }

                    $seriesByCategory[$c['id']] = [
                        '_mode' => 'grouped_bar',
                        '_x'    => $x,
                        '_unit' => $unit !== '' ? $unit : ($c['unit'] ?? '—'),
                        'series'=> $series,
                    ];
                    break;
                }

                // ====== ✅ 02：军民构成：x=metric，series=group ======
                case 'china_casualties_components': {
                    $x = [];
                    $seriesMap = [];
                    $unit = '人';

                    foreach ($rows as $r) {
                        $metric = trim((string)$this->pick($r, ['metric'], ''));
                        $group  = trim((string)$this->pick($r, ['group'], ''));
                        $value  = $this->toNumber($this->pick($r, ['value'], null));
                        if ($metric === '' || $group === '' || $value === null) continue;

                        if (!in_array($metric, $x, true)) $x[] = $metric;

                        if (!isset($seriesMap[$group])) $seriesMap[$group] = [];
                        $seriesMap[$group][$metric] = $value;

                        $u = trim((string)$this->pick($r, ['unit'], ''));
                        if ($u !== '') $unit = $u;
                    }

                    $series = [];
                    foreach ($seriesMap as $sn => $map) {
                        $pts = [];
                        foreach ($x as $metric) {
                            $pts[] = [
                                'label' => $metric,
                                'value' => $map[$metric] ?? null,
                                'unit'  => $unit,
                                'note'  => '',
                            ];
                        }
                        $series[$sn] = $pts;
                    }

                    $seriesByCategory[$c['id']] = [
                        '_mode' => 'grouped_bar',
                        '_x'    => $x,
                        '_unit' => $unit,
                        'series'=> $series,
                    ];
                    break;
                }

                // ====== ✅ 03：解放区人口损失：单系列柱状（x=metric） ======
                case 'liberated_areas_losses': {
                    $x = [];
                    $pts = [];
                    $unit = '人';

                    foreach ($rows as $r) {
                        $metric = trim((string)$this->pick($r, ['metric'], ''));
                        $value  = $this->toNumber($this->pick($r, ['value'], null));
                        if ($metric === '' || $value === null) continue;

                        $x[] = $metric;
                        $u = trim((string)$this->pick($r, ['unit'], ''));
                        if ($u !== '') $unit = $u;

                        $pts[] = [
                            'label' => $metric,
                            'value' => $value,
                            'unit'  => $unit,
                            'note'  => trim((string)$this->pick($r, ['note'], '')),
                        ];
                    }

                    $seriesByCategory[$c['id']] = [
                        '_mode' => 'bar',
                        '_x'    => $x,
                        '_unit' => $unit,
                        'series'=> [
                            '人口损失' => $pts
                        ],
                    ];
                    break;
                }

                // ====== ✅ 04：中共领导武装损失：单系列柱状（x=metric） ======
                case 'ccp_forces_losses': {
                    $x = [];
                    $pts = [];
                    $unit = '人';

                    foreach ($rows as $r) {
                        $metric = trim((string)$this->pick($r, ['metric'], ''));
                        $value  = $this->toNumber($this->pick($r, ['value'], null));
                        if ($metric === '' || $value === null) continue;

                        $x[] = $metric;
                        $u = trim((string)$this->pick($r, ['unit'], ''));
                        if ($u !== '') $unit = $u;

                        $pts[] = [
                            'label' => $metric,
                            'value' => $value,
                            'unit'  => $unit,
                            'note'  => trim((string)$this->pick($r, ['note'], '')),
                        ];
                    }

                    $seriesByCategory[$c['id']] = [
                        '_mode' => 'bar',
                        '_x'    => $x,
                        '_unit' => $unit,
                        'series'=> [
                            '损失统计' => $pts
                        ],
                    ];
                    break;
                }

                // ====== 09 时间轴 ======
                case 'battles_timeline': {
                    $header = ['战役', '开始', '结束', '备注'];
                    $tableRows = [];
                    $items = [];

                    foreach ($rows as $r) {
                        $name = (string)$this->pick($r, ['name', '战役'], '');
                        $startRaw = (string)$this->pick($r, ['start', '起始', '开始'], '');
                        $endRaw = (string)$this->pick($r, ['end', '终止', '结束'], '');
                        $note = (string)$this->pick($r, ['note', '备注'], '');

                        $start = $this->parseYmToDate($startRaw);
                        $end = $this->parseYmToDate($endRaw);

                        if ($name === '' || $start === null || $end === null) continue;

                        $tableRows[] = [$name, $start, $end, $note];
                        $items[] = ['name' => $name, 'start' => $start, 'end' => $end, 'note' => $note];
                    }

                    $tablesByCategory[$c['id']] = ['header' => $header, 'rows' => $tableRows];
                    $extraByCategory[$c['id']] = ['timeline' => $items];
                    break;
                }

                // ====== 10 会战战报对比 ======
                case 'battle_reports_compare': {
                    $x = [];
                    $seriesMap = [];
                    $unit = '人';

                    foreach ($rows as $r) {
                        $battle = (string)$this->pick($r, ['battle', '战役'], '');
                        $side = (string)$this->pick($r, ['side', '方', '阵营'], '');
                        $metric = (string)$this->pick($r, ['metric', '指标'], '');
                        $value = $this->toNumber($this->pick($r, ['value', '数值', '值', '数量'], null));
                        if ($battle === '' || $side === '' || $metric === '' || $value === null) continue;

                        if (!in_array($battle, $x, true)) $x[] = $battle;

                        $seriesName = $side . '·' . $metric;
                        if (!isset($seriesMap[$seriesName])) $seriesMap[$seriesName] = [];
                        $seriesMap[$seriesName][$battle] = $value;

                        $u = (string)$this->pick($r, ['unit', '单位'], '');
                        if ($u !== '') $unit = $u;
                    }

                    $series = [];
                    foreach ($seriesMap as $sn => $map) {
                        $pts = [];
                        foreach ($x as $battle) {
                            $pts[] = [
                                'label' => $battle,
                                'value' => $map[$battle] ?? null,
                                'unit' => $unit,
                                'note' => '',
                            ];
                        }
                        $series[$sn] = $pts;
                    }

                    $seriesByCategory[$c['id']] = [
                        '_x' => $x,
                        '_mode' => 'grouped_bar',
                        '_unit' => $unit,
                        'series' => $series,
                    ];
                    break;
                }

                // ====== 11 表格 ======
                case 'eighth_route_compare': {
                    $header = ['战斗', '年份', '八路战报', '日方战报', '日方细项', '来源'];
                    $tableRows = [];
                    foreach ($rows as $r) {
                        $tableRows[] = [
                            $this->pick($r, ['name', '战斗'], ''),
                            $this->pick($r, ['year', '年份'], ''),
                            $this->pick($r, ['eighth_route_report', '八路战报'], ''),
                            $this->pick($r, ['japanese_report', '日方战报'], ''),
                            $this->pick($r, ['japanese_detail', '日方细项'], ''),
                            $this->pick($r, ['source', '来源'], ''),
                        ];
                    }
                    $tablesByCategory[$c['id']] = ['header' => $header, 'rows' => $tableRows];
                    break;
                }

                // ====== 12 表格 ======
                case 'martyrs_list': {
                    $header = ['姓名', '生年', '卒年', '追赠军衔', '职务', '籍贯', '事迹摘要'];
                    $tableRows = [];
                    foreach ($rows as $r) {
                        $tableRows[] = [
                            $this->pick($r, ['name', '姓名'], ''),
                            $this->pick($r, ['birth_year', '生年'], ''),
                            $this->pick($r, ['death_year', '卒年'], ''),
                            $this->pick($r, ['posthumous_rank', '追赠军衔'], ''),
                            $this->pick($r, ['position', '职务'], ''),
                            $this->pick($r, ['birthplace', '籍贯'], ''),
                            $this->pick($r, ['notes', '事迹摘要', '事迹'], ''),
                        ];
                    }
                    $tablesByCategory[$c['id']] = ['header' => $header, 'rows' => $tableRows];
                    break;
                }

                // ====== 默认：table 原样；chart 走 auto（你后面那几个已经能画） ======
                default: {
                    if (($c['display'] ?? 'chart') === 'table') {
                        $header = [];
                        if (!empty($rows)) $header = array_keys($rows[0]);
                        $tableRows = [];
                        foreach ($rows as $r) {
                            $line = [];
                            foreach ($header as $h) $line[] = $r[$h] ?? '';
                            $tableRows[] = $line;
                        }
                        $tablesByCategory[$c['id']] = ['header' => $header, 'rows' => $tableRows];
                        break;
                    }

                    $pointsBySeries = [];
                    $unit = $c['unit'] ?? '—';

                    foreach ($rows as $r) {
                        $value = $this->toNumber($this->pick($r, ['value', '数值', '值', '数量'], null));
                        if ($value === null) continue;

                        $label = trim((string)$this->pick($r, ['label', '标签', 'metric', '指标', 'name', '名称', 'scope', '范围', 'year', '年份'], ''));
                        if ($label === '') $label = '—';

                        $series = trim((string)$this->pick($r, ['series', '系列', 'group', '分组', 'side', '阵营'], ''));
                        if ($series === '') $series = 'main';

                        $u = trim((string)$this->pick($r, ['unit', '单位'], ''));
                        if ($u !== '') $unit = $u;

                        $note = trim((string)$this->pick($r, ['note', '备注', '说明'], ''));
                        $src  = trim((string)$this->pick($r, ['source', '来源'], ''));

                        if (!isset($pointsBySeries[$series])) $pointsBySeries[$series] = [];
                        $pointsBySeries[$series][] = [
                            'label' => $label,
                            'value' => $value,
                            'unit' => $u !== '' ? $u : $unit,
                            'note' => $note,
                            'source' => $src,
                            'extra' => $r,
                        ];
                    }

                    $seriesByCategory[$c['id']] = [
                        '_mode' => 'auto',
                        '_unit' => $unit,
                        'series' => $pointsBySeries,
                    ];
                    break;
                }
            }
        }

        return [
            'ok' => true,
            'categories' => $categoriesOut,
            'seriesByCategory' => $seriesByCategory,
            'tablesByCategory' => $tablesByCategory,
            'extraByCategory' => $extraByCategory,
            'meta' => [
                'datasets' => count($categoriesOut),
                'indicators' => count($categoriesOut),
                'years' => '1932 - 2015',
            ],
        ];
    }

    public function actionDownload($key)
    {
        $dir = $this->csvDir();
        $safe = basename($key);
        $path = $dir . DIRECTORY_SEPARATOR . $safe;
        if (!is_file($path)) throw new \yii\web\NotFoundHttpException('CSV not found');
        return Yii::$app->response->sendFile($path, $safe);
    }
}

