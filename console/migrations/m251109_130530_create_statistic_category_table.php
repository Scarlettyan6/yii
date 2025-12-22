<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%statistic_category}}`.
 */
class m251109_130530_create_statistic_category_table extends Migration
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

        $this->createTable('{{%statistic_category}}', [
            'id' => $this->primaryKey(),
            'name' => $this->string(100)->notNull()->unique(),
            'description' => $this->text(),
        ], $tableOptions);
    }
    /**
     * {@inheritdoc}
     */
    public function down()
    {
        $this->dropTable('{{%statistic_category}}');
    }
}
