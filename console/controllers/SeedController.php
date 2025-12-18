<?php

namespace console\controllers;

use Yii;
use yii\console\Controller;
use yii\db\Query;

class SeedController extends Controller
{
    /** @var int 是否清空再灌 */
    public $truncate = 0;

    public function options($actionID)
    {
        return array_merge(parent::options($actionID), ['truncate']);
    }

    /**
     * 用法：
     *   D:\php74\php.exe -c D:\php74\php.ini yii seed/statistic --truncate=1
     */
    public function actionStatistic()
    {
        $db = Yii::$app->db;

        // 真实表名（带前缀）
        $catTable  = $db->tablePrefix . 'statistic_category';
        $statTable = $db->tablePrefix . 'statistic';

        // 刷新 schema，避免缓存导致“看不到新列”
        $db->schema->refresh();
        $catSchema  = $db->schema->getTableSchema($catTable, true);
        $statSchema = $db->schema->getTableSchema($statTable, true);

        if ($catSchema === null || $statSchema === null) {
            $this->stderr("表不存在：请先跑 migrate，确保 {$catTable} / {$statTable} 已创建。\n");
            return 1;
        }

        $catCols  = array_keys($catSchema->columns);
        $statCols = array_keys($statSchema->columns);

        $has = function(array $cols, string $name): bool {
            return in_array($name, $cols, true);
        };

        // --- category 表字段适配 ---
        $hasCatId        = $has($catCols, 'id');
        $hasCatCode      = $has($catCols, 'code');
        $hasCatSlug      = $has($catCols, 'slug');
        $hasCatName      = $has($catCols, 'name');
        $hasCatDesc      = $has($catCols, 'description');
        $hasCatSource    = $has($catCols, 'source_note');
        $hasCatSort      = $has($catCols, 'sort');
        $hasCatChartType = $has($catCols, 'chart_type');
        $hasCatUnit      = $has($catCols, 'unit');
        $hasCatCreatedAt = $has($catCols, 'created_at');
        $hasCatUpdatedAt = $has($catCols, 'updated_at');

        // --- statistic 表字段适配 ---
        $hasStatCategoryId = $has($statCols, 'category_id');
        $hasStatYear       = $has($statCols, 'year');
        $hasStatLabel      = $has($statCols, 'label');
        $hasStatValue      = $has($statCols, 'value');
        $hasStatUnit       = $has($statCols, 'unit');
        $hasStatExtra      = $has($statCols, 'extra');
        $hasStatSortOrder  = $has($statCols, 'sort_order');
        $hasStatSort       = $has($statCols, 'sort');
        $hasStatSeries     = $has($statCols, 'series');
        $hasStatExtraJson  = $has($statCols, 'extra_json');
        $hasStatCreatedAt  = $has($statCols, 'created_at');
        $hasStatUpdatedAt  = $has($statCols, 'updated_at');

        if (!$hasStatCategoryId || !$hasStatLabel || !$hasStatValue) {
            $this->stderr("statistic 表至少需要 category_id / label / value 三列。\n");
            return 1;
        }

        $now = time();

        // --- truncate ---
        if ((int)$this->truncate === 1) {
            $this->stdout("已清空：{$statTable} / {$catTable}\n");
            $db->createCommand("SET FOREIGN_KEY_CHECKS=0")->execute();
            $db->createCommand()->delete($statTable)->execute();
            $db->createCommand()->delete($catTable)->execute();
            $db->createCommand("SET FOREIGN_KEY_CHECKS=1")->execute();
        }

        /**
         * ===== 数据集（你先把链路跑通）=====
         * 这里先灌一套“可直接出图”的结构化数据。
         * 你后续要扩展到更多“抗战统计指标”，我们再按“每个指标一类 + 明确来源”继续加。
         */
        $sourceNote = "来源待你补充正式文献条目（先把功能链路跑通）。";

        $categories = [
            [
                'key'   => 'hump_atc_tonnage_1942_1943',
                'name'  => '驼峰航线：ATC 运量（1942-12 ~ 1943-07）',
                'desc'  => '按月统计印度→中国空运吨位（用于演示：折线图）。',
                'source'=> $sourceNote,
                'unit'  => '吨',
                'chart' => 'line',
                'sort'  => 10,
                'rows'  => [
                    ['label'=>'1942-12','year'=>1942,'value'=>1227,'unit'=>'吨','extra'=>''],
                    ['label'=>'1943-01','year'=>1943,'value'=>1263,'unit'=>'吨','extra'=>''],
                    ['label'=>'1943-02','year'=>1943,'value'=>2855,'unit'=>'吨','extra'=>''],
                    ['label'=>'1943-03','year'=>1943,'value'=>2278,'unit'=>'吨','extra'=>''],
                    ['label'=>'1943-04','year'=>1943,'value'=>1910,'unit'=>'吨','extra'=>''],
                    ['label'=>'1943-05','year'=>1943,'value'=>2334,'unit'=>'吨','extra'=>''],
                    ['label'=>'1943-06','year'=>1943,'value'=>2382,'unit'=>'吨','extra'=>''],
                    ['label'=>'1943-07','year'=>1943,'value'=>3451,'unit'=>'吨','extra'=>''],
                ],
            ],
            [
                'key'   => 'hump_1945_net_tons',
                'name'  => '驼峰航线：1945 月度净吨数（示例：柱状）',
                'desc'  => '用于演示：柱状图 + 滑块缩放。',
                'source'=> $sourceNote,
                'unit'  => '净吨',
                'chart' => 'bar',
                'sort'  => 20,
                'rows'  => [
                    ['label'=>'1945-01','year'=>1945,'value'=>44098,'unit'=>'净吨','extra'=>''],
                    ['label'=>'1945-02','year'=>1945,'value'=>40677,'unit'=>'净吨','extra'=>''],
                    ['label'=>'1945-03','year'=>1945,'value'=>46545,'unit'=>'净吨','extra'=>''],
                    ['label'=>'1945-04','year'=>1945,'value'=>44254,'unit'=>'净吨','extra'=>''],
                    ['label'=>'1945-05','year'=>1945,'value'=>46393,'unit'=>'净吨','extra'=>''],
                    ['label'=>'1945-06','year'=>1945,'value'=>55386,'unit'=>'净吨','extra'=>''],
                    ['label'=>'1945-07','year'=>1945,'value'=>71042,'unit'=>'净吨','extra'=>''],
                    ['label'=>'1945-08','year'=>1945,'value'=>53315,'unit'=>'净吨','extra'=>''],
                ],
            ],
        ];

        foreach ($categories as $cat) {
            // category upsert：优先 code，其次 slug，否则用 name
            $where = null;
            if ($hasCatCode) $where = ['code' => $cat['key']];
            else if ($hasCatSlug) $where = ['slug' => $cat['key']];
            else $where = ['name' => $cat['name']];

            $old = (new Query())->from($catTable)->where($where)->one($db);

            $data = [];
            if ($hasCatCode)      $data['code'] = $cat['key'];
            if ($hasCatSlug)      $data['slug'] = $cat['key'];
            if ($hasCatName)      $data['name'] = $cat['name'];
            if ($hasCatDesc)      $data['description'] = $cat['desc'];
            if ($hasCatSource)    $data['source_note'] = $cat['source'];
            if ($hasCatSort)      $data['sort'] = (int)$cat['sort'];
            if ($hasCatChartType) $data['chart_type'] = $cat['chart'];
            if ($hasCatUnit)      $data['unit'] = $cat['unit'];

            if ($hasCatUpdatedAt) $data['updated_at'] = $now;

            if ($old) {
                $db->createCommand()->update($catTable, $data, ['id' => $old['id']])->execute();
                $catId = (int)$old['id'];
            } else {
                if ($hasCatCreatedAt) $data['created_at'] = $now;
                $db->createCommand()->insert($catTable, $data)->execute();
                $catId = (int)$db->getLastInsertID();
            }

            // statistic：先删再插
            $db->createCommand()->delete($statTable, ['category_id' => $catId])->execute();

            $columns = ['category_id'];
            if ($hasStatYear)   $columns[] = 'year';
            $columns[] = 'label';
            $columns[] = 'value';
            if ($hasStatUnit)  $columns[] = 'unit';
            if ($hasStatExtra) $columns[] = 'extra';
            if ($hasStatSortOrder) $columns[] = 'sort_order';
            if ($hasStatSort)      $columns[] = 'sort';
            if ($hasStatSeries)    $columns[] = 'series';
            if ($hasStatExtraJson) $columns[] = 'extra_json';
            if ($hasStatCreatedAt) $columns[] = 'created_at';
            if ($hasStatUpdatedAt) $columns[] = 'updated_at';

            $values = [];
            $i = 1;
            foreach ($cat['rows'] as $r) {
                $row = [$catId];
                if ($hasStatYear) $row[] = (int)($r['year'] ?? 0);
                $row[] = (string)$r['label'];
                $row[] = $r['value'];
                if ($hasStatUnit)  $row[] = (string)($r['unit'] ?? '');
                if ($hasStatExtra) $row[] = (string)($r['extra'] ?? '');
                if ($hasStatSortOrder) $row[] = $i;
                if ($hasStatSort)      $row[] = $i;
                if ($hasStatSeries)    $row[] = '数值';
                if ($hasStatExtraJson) $row[] = null;
                if ($hasStatCreatedAt) $row[] = $now;
                if ($hasStatUpdatedAt) $row[] = $now;

                $values[] = $row;
                $i++;
            }

            if (!empty($values)) {
                $db->createCommand()->batchInsert($statTable, $columns, $values)->execute();
            }

            $this->stdout("OK: {$cat['name']} (category_id={$catId}, rows=" . count($cat['rows']) . ")\n");
        }

        $this->stdout("Seed 完成。\n");
        return 0;
    }
}
