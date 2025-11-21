<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%statistic}}`.
 */
class m251109_130542_create_statistic_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function up()
    {
        $tableOptions = null;
        if ($this->db->driverName === 'mysql') {
            $tableOptions = 'CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci ENGINE=InnoDB';
        }

        $this->createTable('{{%statistic}}', [
            'id' => $this->primaryKey(),
            'category_id' => $this->integer()->notNull(),
            'title' => $this->string(255)->notNull()->comment('数据标题'),
            'value' => $this->string(100)->notNull()->comment('数据值(文本)'),
            'unit' => $this->string(50)->comment('单位'),
            'description' => $this->text(),
            'source' => $this->string(255)->comment('数据来源'),
            'display_order' => $this->integer()->defaultValue(0),
        ], $tableOptions);

        $this->createIndex('idx-statistic-category_id', '{{%statistic}}', 'category_id');

        $this->addForeignKey(
            'fk-statistic-category_id',
            '{{%statistic}}',
            'category_id',
            '{{%statistic_category}}',
            'id',
            'RESTRICT', // 不允许删除一个正在被使用的类别
            'CASCADE'
        );
    }

    public function down()
    {
        $this->dropForeignKey('fk-statistic-category_id', '{{%statistic}}');
        $this->dropIndex('idx-statistic-category_id', '{{%statistic}}');
        $this->dropTable('{{%statistic}}');
    }
}
