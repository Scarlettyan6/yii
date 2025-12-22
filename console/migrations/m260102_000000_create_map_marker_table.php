<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%map_marker}}`.
 */
class m260102_000000_create_map_marker_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('{{%map_marker}}', [
            'id' => $this->primaryKey(),
            'battle_id' => $this->integer()->notNull()->comment('关联战役ID'),
            'title' => $this->string(255)->notNull()->comment('标记标题'),
            'description' => $this->text()->null()->comment('描述'),
            'latitude' => $this->decimal(10, 8)->notNull()->comment('纬度'),
            'longitude' => $this->decimal(11, 8)->notNull()->comment('经度'),
            'marker_type' => $this->string(50)->null()->comment('标记类型'),
            'created_at' => $this->integer()->notNull(),
            'updated_at' => $this->integer()->notNull(),
        ]);

        // 创建索引
        $this->createIndex('idx-map_marker-battle_id', '{{%map_marker}}', 'battle_id');
        $this->createIndex('idx-map_marker-latitude-longitude', '{{%map_marker}}', ['latitude', 'longitude']);
        $this->createIndex('idx-map_marker-marker_type', '{{%map_marker}}', 'marker_type');

        // 创建外键
        $this->addForeignKey(
            'fk-map_marker-battle_id',
            '{{%map_marker}}',
            'battle_id',
            '{{%battle}}',
            'id',
            'CASCADE',
            'CASCADE'
        );
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        // 删除外键
        $this->dropForeignKey('fk-map_marker-battle_id', '{{%map_marker}}');

        // 删除索引
        $this->dropIndex('idx-map_marker-marker_type', '{{%map_marker}}');
        $this->dropIndex('idx-map_marker-latitude-longitude', '{{%map_marker}}');
        $this->dropIndex('idx-map_marker-battle_id', '{{%map_marker}}');

        // 删除表
        $this->dropTable('{{%map_marker}}');
    }
}
