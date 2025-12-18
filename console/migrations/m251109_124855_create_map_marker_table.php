<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%map_marker}}`.
 */
class m251109_124855_create_map_marker_table extends Migration
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

        $this->createTable('{{%map_marker}}', [
            'id' => $this->primaryKey(),
            'battle_id' => $this->integer()->notNull()->comment('关联战役ID'),
            'title' => $this->string(255)->notNull(),
            'description' => $this->text(),
            'latitude' => $this->decimal(10, 7)->notNull(),
            'longitude' => $this->decimal(10, 7)->notNull(),
            'marker_type' => $this->string(50)->comment('标记类型'),
        ], $tableOptions);

        $this->createIndex('idx-map_marker-battle_id', '{{%map_marker}}', 'battle_id');

        $this->addForeignKey(
            'fk-map_marker-battle_id',
            '{{%map_marker}}',
            'battle_id',
            '{{%battle}}',
            'id',
            'CASCADE', // 如果删除战役，关联的标记也一起删除
            'CASCADE'
        );
    }

    public function down()
    {
        $this->dropForeignKey('fk-map_marker-battle_id', '{{%map_marker}}');
        $this->dropIndex('idx-map_marker-battle_id', '{{%map_marker}}');
        $this->dropTable('{{%map_marker}}');
    }
}
