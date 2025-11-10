<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%timeline_event}}`.
 */
class m251109_124843_create_timeline_event_table extends Migration
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

        $this->createTable('{{%timeline_event}}', [
            'id' => $this->primaryKey(),
            'event_date' => $this->date()->notNull(),
            'title' => $this->string(255)->notNull(),
            'description' => $this->text(),
            'cover_image_url' => $this->string(255),
            'importance' => $this->smallInteger()->defaultValue(1),
            'created_at' => $this->integer()->notNull(),
            'updated_at' => $this->integer()->notNull(),
        ], $tableOptions);

        $this->createIndex('idx-timeline_event-date', '{{%timeline_event}}', 'event_date');
    }

    /**
     * {@inheritdoc}
     */
    public function down()
    {
        $this->dropTable('{{%timeline_event}}');
    }
}
