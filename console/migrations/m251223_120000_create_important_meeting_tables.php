<?php

use yii\db\Migration;

/**
 * Creates tables for important meetings displayed on the homepage.
 */
class m251223_120000_create_important_meeting_tables extends Migration
{
    public function safeUp()
    {
        $tableOptions = null;
        if ($this->db->driverName === 'mysql') {
            $tableOptions = 'CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci ENGINE=InnoDB';
        }

        $this->createTable('{{%important_meeting}}', [
            'id' => $this->primaryKey(),
            'title' => $this->string(255)->notNull()->comment('会议标题'),
            'meeting_date' => $this->date()->comment('会议日期'),
            'location' => $this->string(255)->comment('地点'),
            'cover_image' => $this->string(255)->comment('封面图'),
            'link_url' => $this->string(255)->comment('外链/详情地址'),
            'summary' => $this->text()->comment('摘要'),
            'display_order' => $this->integer()->defaultValue(0)->comment('显示顺序'),
            'is_active' => $this->boolean()->notNull()->defaultValue(true)->comment('是否展示'),
            'created_at' => $this->integer()->notNull(),
            'updated_at' => $this->integer()->notNull(),
        ], $tableOptions);

        $this->createIndex('idx-important_meeting-meeting_date', '{{%important_meeting}}', 'meeting_date');
        $this->createIndex('idx-important_meeting-is_active', '{{%important_meeting}}', 'is_active');

        $this->createTable('{{%important_meeting_highlight}}', [
            'id' => $this->primaryKey(),
            'meeting_id' => $this->integer()->notNull()->comment('所属会议'),
            'title' => $this->string(255)->notNull()->comment('亮点/议题标题'),
            'description' => $this->text()->comment('补充说明'),
            'display_order' => $this->integer()->defaultValue(0)->comment('显示顺序'),
            'created_at' => $this->integer()->notNull(),
            'updated_at' => $this->integer()->notNull(),
        ], $tableOptions);

        $this->createIndex('idx-important_meeting_highlight-meeting_id', '{{%important_meeting_highlight}}', 'meeting_id');
        $this->createIndex('idx-important_meeting_highlight-order', '{{%important_meeting_highlight}}', ['meeting_id', 'display_order']);

        $this->addForeignKey(
            'fk-important_meeting_highlight-meeting_id',
            '{{%important_meeting_highlight}}',
            'meeting_id',
            '{{%important_meeting}}',
            'id',
            'CASCADE',
            'CASCADE'
        );
    }

    public function safeDown()
    {
        $this->dropForeignKey('fk-important_meeting_highlight-meeting_id', '{{%important_meeting_highlight}}');
        $this->dropTable('{{%important_meeting_highlight}}');
        $this->dropTable('{{%important_meeting}}');
    }
}
