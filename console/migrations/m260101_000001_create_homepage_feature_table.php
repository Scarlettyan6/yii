<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%homepage_feature}}`.
 */
class m260101_000001_create_homepage_feature_table extends Migration
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

        $this->createTable('{{%homepage_feature}}', [
            'id' => $this->primaryKey(),
            'title' => $this->string(255)->notNull(),
            'subtitle' => $this->string(255),
            'description' => $this->text(),
            'image_url' => $this->string(255)->notNull(),
            'link_url' => $this->string(255)->notNull(),
            'display_order' => $this->integer()->defaultValue(0),
            'is_active' => $this->boolean()->defaultValue(true),
            'created_at' => $this->integer()->notNull(),
            'updated_at' => $this->integer()->notNull(),
        ], $tableOptions);

        $this->createIndex('idx-homepage_feature-active-order', '{{%homepage_feature}}', ['is_active', 'display_order']);
    }

    /**
     * {@inheritdoc}
     */
    public function down()
    {
        $this->dropIndex('idx-homepage_feature-active-order', '{{%homepage_feature}}');
        $this->dropTable('{{%homepage_feature}}');
    }
}
