<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%media_resource}}`.
 */
class m251109_124914_create_media_resource_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function up()
    {
        $tableOptions = null;
        if ($this->db->driverName === 'mysql') {
            $tableOptions = 'CHARACTER SET utf8 COLLATE utf8_general_ci ENGINE=InnoDB';

        }

        $this->createTable('{{%media_resource}}', [
            'id' => $this->primaryKey(),
            'title' => $this->string(255)->notNull(),
            'type' => $this->smallInteger()->notNull()->comment('1:Image, 2:Video, 3:Audio, 4:Movie'),
            'url' => $this->string(255),
            'path' => $this->string(255)->comment('本地路径'),
            'description' => $this->text(),
            'linkable_type' => $this->string(50)->comment('关联模型名'),
            'linkable_id' => $this->integer()->comment('关联模型ID'),
            'created_at' => $this->integer()->notNull(),
            'updated_at' => $this->integer()->notNull(),
        ], $tableOptions);

        $this->createIndex('idx-media-type', '{{%media_resource}}', 'type');
        // 这是多态关联的核心索引
        $this->createIndex('idx-media-linkable', '{{%media_resource}}', ['linkable_type', 'linkable_id']);
    }

    public function down()
    {
        $this->dropIndex('idx-media-linkable', '{{%media_resource}}');
        $this->dropIndex('idx-media-type', '{{%media_resource}}');
        $this->dropTable('{{%media_resource}}');
    }
}
