<?php

use yii\db\Migration;

/**
 * 具体统计条目
 */
class m251109_130542_create_statistic_table extends Migration
{
    public function up()
    {
        $tableOptions = null;
        if ($this->db->driverName === 'mysql') {
            $tableOptions = 'CHARACTER SET utf8 COLLATE utf8_general_ci ENGINE=InnoDB';
        }

        $this->createTable('{{%statistic}}', [
            'id' => $this->primaryKey(),
            'category_id' => $this->integer()->notNull()->comment('所属分类'),
            'year' => $this->integer()->comment('年份'),
            'label' => $this->string(128)->notNull()->comment('条目标签（如战役名、年份）'),
            'value' => $this->decimal(12,2)->notNull()->comment('数值'),
            'unit' => $this->string(16)->defaultValue('万人')->comment('单位'),
            'extra' => $this->string(255)->comment('补充说明，用于 tooltip'),
            'sort_order' => $this->integer()->defaultValue(0),
            'created_at' => $this->integer()->notNull(),
            'updated_at' => $this->integer()->notNull(),
        ], $tableOptions);

        $this->createIndex('idx-statistic-category', '{{%statistic}}', 'category_id');

        $this->addForeignKey(
            'fk-statistic-category',
            '{{%statistic}}',
            'category_id',
            '{{%statistic_category}}',
            'id',
            'CASCADE',
            'RESTRICT'
        );
    }

    public function down()
    {
        $this->dropForeignKey('fk-statistic-category', '{{%statistic}}');
        $this->dropTable('{{%statistic}}');
    }
}
