<?php
/**
 * war_datasets.php
 * - 每个 dataset 对应一个 CSV
 * - render.type: line | bar | table | timeline
 * - x/y/series: 指定 CSV 中的列名
 */
return [
    '01_china_casualties_estimates' => [
        'title' => '抗战伤亡总量（多来源口径对比）',
        'subtitle' => '同一指标不同来源的口径差异，用于“证据/口径讨论”展示',
        'unit' => '人',
        'csv' => '01_china_casualties_estimates.csv',
        'render' => [
            'type' => 'bar',
            'x' => 'source',
            'y' => 'value',
            'series' => 'metric',
            'stack' => false,
        ],
        'evidence' => [
            'source' => '用户整理：多官方/研究口径摘要（含国务院白皮书、领导人讲话、党史调研等提法）',
            'method' => '保留原表述，数值字段标准化为数值；口径差异不自动“纠错”。',
        ],
    ],

    '02_kmt_1947_casualties_components' => [
        'title' => '1947 国民政府报告：军民伤亡构成',
        'subtitle' => '适合堆叠柱状图：阵亡/负伤/失踪/因病等构成一眼看懂',
        'unit' => '人',
        'csv' => '02_kmt_1947_casualties_components.csv',
        'render' => [
            'type' => 'bar',
            'x' => 'group',
            'y' => 'value',
            'series' => 'component',
            'stack' => true,
        ],
        'evidence' => [
            'source' => '《关于抗战损失和日本赔偿问题报告》（1947.02，国民政府行政院）',
            'method' => '拆分为“军人作战伤亡/军人因病死亡/平民伤亡”等组别与构成项。',
        ],
    ],

    '03_liberated_areas_losses' => [
        'title' => '解放区：7 个抗日根据地人口损失（初步统计）',
        'subtitle' => '适合柱状图或表格（项数较少）',
        'unit' => '人',
        'csv' => '03_liberated_areas_losses.csv',
        'render' => [
            'type' => 'bar',
            'x' => 'item',
            'y' => 'value',
            'series' => null,
            'stack' => false,
        ],
        'evidence' => [
            'source' => '《中国解放区抗战8年中人口损失初步统计表》（1946.04）',
            'method' => '按“被杀/被捕壮丁/鳏寡孤独及伤残”等项目录入。',
        ],
    ],

    '04_ccp_forces_losses' => [
        'title' => '中共领导军队：伤亡/被俘/失踪统计',
        'subtitle' => '适合柱状图',
        'unit' => '人',
        'csv' => '04_ccp_forces_losses.csv',
        'render' => [
            'type' => 'bar',
            'x' => 'item',
            'y' => 'value',
            'series' => null,
            'stack' => false,
        ],
        'evidence' => [
            'source' => '《抗日战争8年敌我兵力损失统计》（用户摘录整理）',
            'method' => '按“负伤/阵亡/被俘/失踪/合计”录入。',
        ],
    ],

    '05_special_losses' => [
        'title' => '特殊伤亡与暴行（细菌战/化学战/劳工/慰安妇等）',
        'subtitle' => '口径差异大、很多是估算值：更适合表格展示 + 证据说明',
        'unit' => '',
        'csv' => '05_special_losses.csv',
        'render' => [
            'type' => 'table',
        ],
        'evidence' => [
            'source' => '用户整理：细菌战、化学战、劳工、慰安妇、毒品贩售等条目',
            'method' => '保留估算范围与描述，不强行合并为单一“真值”。',
        ],
    ],

    '06_ww2_overview_and_soviet_losses' => [
        'title' => '二战总体伤亡框架（世界/苏联/中国等）',
        'subtitle' => '适合表格（框架性数字）',
        'unit' => '人',
        'csv' => '06_ww2_overview_and_soviet_losses.csv',
        'render' => [
            'type' => 'table',
        ],
        'evidence' => [
            'source' => '用户整理：二战伤亡按死因分类 + 苏德战争损失构成',
            'method' => '用于背景框架，不作为单一精确统计。',
        ],
    ],

    '07_displacement' => [
        'title' => '战时难民/流亡规模（全国）',
        'subtitle' => '单值指标：更适合“大数字卡片 + 证据”',
        'unit' => '人',
        'csv' => '07_displacement.csv',
        'render' => [
            'type' => 'table',
        ],
        'evidence' => [
            'source' => '《全国人民生命损失及人民劳力损失统计表》（用户摘录）',
            'method' => '作为规模感指标，用于 Hero 关键数字。',
        ],
    ],

    '08_china_theater_military_numbers_2015' => [
        'title' => '2015 调研披露：在华日军兵力/毙伤俘等',
        'subtitle' => '适合表格 + 部分可柱状对比',
        'unit' => '',
        'csv' => '08_china_theater_military_numbers_2015.csv',
        'render' => [
            'type' => 'table',
        ],
        'evidence' => [
            'source' => '国新办吹风会（2015.07）相关披露（用户摘录）',
            'method' => '按条目记录，不混算。',
        ],
    ],

    '09_kmt_major_campaigns_list' => [
        'title' => '国军较大会战/战役清单（时间轴）',
        'subtitle' => '适合时间线（timeline）+ 可跳转到时间线页面联动',
        'unit' => '',
        'csv' => '09_kmt_major_campaigns_list.csv',
        'render' => [
            'type' => 'timeline',
            'start' => 'start',
            'end' => 'end',
            'label' => 'name',
        ],
        'evidence' => [
            'source' => '用户整理：十四年抗战国军主要会战/战役列表',
            'method' => '日期做结构化（YYYY-MM 或 YYYY-MM-DD 不齐也可）。',
        ],
    ],

    '10_battle_casualty_reports_comparison' => [
        'title' => '部分大会战：中方战报 vs 日方战报（伤亡对比）',
        'subtitle' => '适合分组柱状图（同一战役两根柱：中方/日方）',
        'unit' => '人',
        'csv' => '10_battle_casualty_reports_comparison.csv',
        'render' => [
            'type' => 'bar',
            'x' => 'battle',
            'y' => 'value',
            'series' => 'side',
            'stack' => false,
        ],
        'evidence' => [
            'source' => '用户整理：多条引文来源含《支那事变陆军作战》《中国事变陆军作战史》等',
            'method' => '同战役允许多来源并列，不裁决谁对谁错。',
        ],
    ],

    '11_ccp_battle_reports_discrepancies' => [
        'title' => '敌后战斗：八路战报 vs 日方战报差异（示例）',
        'subtitle' => '适合表格（差异解释比图更关键）',
        'unit' => '人',
        'csv' => '11_ccp_battle_reports_discrepancies.csv',
        'render' => [
            'type' => 'table',
        ],
        'evidence' => [
            'source' => '用户整理：多条引文来源含《华北治安战》《中日战争》《日中战争》等',
            'method' => '重点呈现“差异存在”，用于史料批判性阅读。',
        ],
    ],

    '12_martyrs_generals_list' => [
        'title' => '殉国将领（部分名单）',
        'subtitle' => '适合表格/卡片墙（人物信息）',
        'unit' => '',
        'csv' => '12_martyrs_generals_list.csv',
        'render' => [
            'type' => 'table',
        ],
        'evidence' => [
            'source' => '用户整理：殉国将领条目（含生卒、职务、事迹摘要）',
            'method' => '人物类数据默认不做折线图。',
        ],
    ],
];
