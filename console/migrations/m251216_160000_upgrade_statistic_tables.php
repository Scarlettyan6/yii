<?php

use yii\db\Migration;

class m251216_160000_upgrade_statistic_tables extends Migration
{
    public function up()
    {
        $tableOptions = null;
        if ($this->db->driverName === 'mysql') {
            $tableOptions = 'CHARACTER SET utf8 COLLATE utf8_general_ci ENGINE=InnoDB';
        }

        // --- statistic_category ---
        if ($this->db->schema->getTableSchema('{{%statistic_category}}', true) === null) {
            $this->createTable('{{%statistic_category}}', [
                'id'          => $this->primaryKey(),
                'name'        => $this->string(128)->notNull(),
                'slug'        => $this->string(128)->notNull(),
                'chart_type'  => $this->string(32)->notNull()->defaultValue('line'),
                'unit'        => $this->string(32)->notNull()->defaultValue(''),
                'description' => $this->text(),
                'source_note' => $this->text(),
                'sort'        => $this->integer()->notNull()->defaultValue(0),
                'created_at'  => $this->integer()->notNull(),
                'updated_at'  => $this->integer()->notNull(),
            ], $tableOptions);

            $this->createIndex('ux_stat_cat_slug', '{{%statistic_category}}', 'slug', true);
            $this->createIndex('idx_stat_cat_sort', '{{%statistic_category}}', 'sort');
        } else {
            $t = $this->db->schema->getTableSchema('{{%statistic_category}}');

            $addCol = function($name, $type) use ($t) {
                return $t->getColumn($name) === null;
            };

            if ($addCol('slug', null)) {
                $this->addColumn('{{%statistic_category}}', 'slug', $this->string(128)->notNull()->defaultValue(''));
                // 尝试建唯一索引（若你已有重复 slug，先手工处理再跑 migrate）
                $this->createIndex('ux_stat_cat_slug', '{{%statistic_category}}', 'slug', true);
            }
            if ($addCol('chart_type', null))  $this->addColumn('{{%statistic_category}}', 'chart_type', $this->string(32)->notNull()->defaultValue('line'));
            if ($addCol('unit', null))        $this->addColumn('{{%statistic_category}}', 'unit', $this->string(32)->notNull()->defaultValue(''));
            if ($addCol('source_note', null)) $this->addColumn('{{%statistic_category}}', 'source_note', $this->text());
            if ($addCol('sort', null)) {
                $this->addColumn('{{%statistic_category}}', 'sort', $this->integer()->notNull()->defaultValue(0));
                $this->createIndex('idx_stat_cat_sort', '{{%statistic_category}}', 'sort');
            }
        }

        // --- statistic ---
        if ($this->db->schema->getTableSchema('{{%statistic}}', true) === null) {
            $this->createTable('{{%statistic}}', [
                'id'          => $this->primaryKey(),
                'category_id' => $this->integer()->notNull(),
                'label'       => $this->string(64)->notNull(),   // X 轴标签
                'sort'        => $this->integer()->notNull()->defaultValue(0),
                'series'      => $this->string(64)->notNull()->defaultValue('数值'),
                'value'       => $this->decimal(16, 2)->notNull()->defaultValue(0),
                'extra_json'  => $this->text(),
                'created_at'  => $this->integer()->notNull(),
                'updated_at'  => $this->integer()->notNull(),
            ], $tableOptions);

            $this->addForeignKey(
                'fk_stat_cat',
                '{{%statistic}}',
                'category_id',
                '{{%statistic_category}}',
                'id',
                'CASCADE',
                'CASCADE'
            );

            $this->createIndex('idx_stat_cat_sort', '{{%statistic}}', ['category_id', 'sort']);
            $this->createIndex('idx_stat_cat_label', '{{%statistic}}', ['category_id', 'label']);
        } else {
            $t = $this->db->schema->getTableSchema('{{%statistic}}');

            $addCol = function($name) use ($t) {
                return $t->getColumn($name) === null;
            };

            if ($addCol('label'))      $this->addColumn('{{%statistic}}', 'label', $this->string(64)->notNull()->defaultValue(''));
            if ($addCol('sort'))       $this->addColumn('{{%statistic}}', 'sort', $this->integer()->notNull()->defaultValue(0));
            if ($addCol('series'))     $this->addColumn('{{%statistic}}', 'series', $this->string(64)->notNull()->defaultValue('数值'));
            if ($addCol('extra_json')) $this->addColumn('{{%statistic}}', 'extra_json', $this->text());

            // value 如果你已有 int/float 字段，这里不强改，避免老库出坑
            // 你若确认 value 是 int，可以手工改成 decimal(16,2)

            // 索引补齐（若已存在 MySQL 会报错，你可以注释掉重复的）
            $this->createIndex('idx_stat_cat_sort', '{{%statistic}}', ['category_id', 'sort']);
            $this->createIndex('idx_stat_cat_label', '{{%statistic}}', ['category_id', 'label']);
        }
    }

    public function down()
    {
        echo "m251216_160000_upgrade_statistic_tables cannot be reverted safely.\n";
        return false;
    }
}
