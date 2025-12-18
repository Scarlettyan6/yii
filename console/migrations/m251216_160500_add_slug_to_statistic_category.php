<?php

use yii\db\Migration;

class m251216_160500_add_slug_to_statistic_category extends Migration
{
    public function safeUp()
    {
        $table = $this->db->tablePrefix . 'statistic_category';

        // 表不存在就直接跳过（避免连错库/没跑过前置 migration 时炸）
        $schema = $this->db->schema->getTableSchema($table, true);
        if ($schema === null) {
            echo "Skip: table {$table} not found.\n";
            return true;
        }

        // slug 列已存在就不再加（解决 Duplicate column）
        if ($schema->getColumn('slug') === null) {
            $this->addColumn($table, 'slug', $this->string(80)->null());
        } else {
            echo "Skip: column slug already exists.\n";
        }

        // 索引重复也不要炸（MySQL5.0 没有 IF NOT EXISTS）
        try {
            $this->createIndex('idx_stat_cat_slug', $table, 'slug');
        } catch (\Exception $e) {
            echo "Skip: index idx_stat_cat_slug maybe exists. ({$e->getMessage()})\n";
        }

        return true;
    }

    public function safeDown()
    {
        $table = $this->db->tablePrefix . 'statistic_category';

        // down 也做成不炸
        try { $this->dropIndex('idx_stat_cat_slug', $table); } catch (\Exception $e) {}
        try { $this->dropColumn($table, 'slug'); } catch (\Exception $e) {}

        return true;
    }
}
