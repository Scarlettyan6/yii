<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%guestbook_message}}`.
 */
class m251109_124921_create_guestbook_message_table extends Migration
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

        $this->createTable('{{%guestbook_message}}', [
            'id' => $this->primaryKey(),
            'nickname' => $this->string(100)->defaultValue('匿名'),
            'content' => $this->text()->notNull(),
            'is_approved' => $this->boolean()->defaultValue(false),
            'created_at' => $this->integer()->notNull(),
            'updated_at' => $this->integer()->notNull(),
        ], $tableOptions);

        $this->createIndex('idx-guestbook-is_approved', '{{%guestbook_message}}', 'is_approved');
    }

    public function down()
    {
        $this->dropIndex('idx-guestbook-is_approved', '{{%guestbook_message}}');
        $this->dropTable('{{%guestbook_message}}');
    }
}
