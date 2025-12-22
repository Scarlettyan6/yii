<?php

use yii\db\Migration;

class m251222_000001_create_war_dataset_and_record_tables extends Migration
{
    public function safeUp()
    {
        // 数据集：每个 CSV 一条
        $this->createTable('{{%war_dataset}}', [
            'id' => $this->primaryKey(),
            'key' => $this->string(128)->notNull()->unique(),   // 文件名去 .csv
            'name' => $this->string(255)->notNull(),           // 后台显示名
            'source_file' => $this->string(255)->notNull(),    // 原 csv 文件名
            'description' => $this->text()->null(),
            'display_order' => $this->integer()->notNull()->defaultValue(0),
            'is_active' => $this->tinyInteger(1)->notNull()->defaultValue(1),
            'created_at' => $this->integer()->notNull()->defaultValue(0),
            'updated_at' => $this->integer()->notNull()->defaultValue(0),
        ]);

        // 数据行：每行一条，存 JSON
        $this->createTable('{{%war_record}}', [
            'id' => $this->primaryKey(),
            'dataset_id' => $this->integer()->notNull(),
            'row_index' => $this->integer()->notNull()->defaultValue(0), // 原 CSV 行号（从2开始比较合理）
            'data_json' => $this->text()->notNull(),                     // 通用存储
            'created_at' => $this->integer()->notNull()->defaultValue(0),
            'updated_at' => $this->integer()->notNull()->defaultValue(0),
        ]);

        $this->createIndex('idx_war_record_dataset_id', '{{%war_record}}', 'dataset_id');

        // 外键（可选，但推荐）
        $this->addForeignKey(
            'fk_war_record_dataset',
            '{{%war_record}}',
            'dataset_id',
            '{{%war_dataset}}',
            'id',
            'CASCADE',
            'CASCADE'
        );
    }

    public function safeDown()
    {
        $this->dropForeignKey('fk_war_record_dataset', '{{%war_record}}');
        $this->dropTable('{{%war_record}}');
        $this->dropTable('{{%war_dataset}}');
    }
}
