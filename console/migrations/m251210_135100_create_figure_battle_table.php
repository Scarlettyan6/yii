<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%figure_battle}}`.
 */
class m251210_135100_create_figure_battle_table extends Migration
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

        $this->createTable('{{%figure_battle}}', [
            'id' => $this->primaryKey(),
            'figure_id' => $this->integer()->notNull(),
            'battle_id' => $this->integer()->notNull(),
            'created_at' => $this->integer()->notNull(),
        ], $tableOptions);

        $this->createIndex('idx-figure_battle-figure', '{{%figure_battle}}', 'figure_id');
        $this->createIndex('idx-figure_battle-battle', '{{%figure_battle}}', 'battle_id');
        $this->createIndex('uniq-figure-battle', '{{%figure_battle}}', ['figure_id','battle_id'], true);

        $this->addForeignKey('fk-figure_battle-figure', '{{%figure_battle}}', 'figure_id', '{{%figure}}', 'id', 'CASCADE', 'CASCADE');
        $this->addForeignKey('fk-figure_battle-battle', '{{%figure_battle}}', 'battle_id', '{{%battle}}', 'id', 'CASCADE', 'CASCADE');
    }

    /**
     * {@inheritdoc}
     */
    public function down()
    {
        $this->dropForeignKey('fk-figure_battle-battle', '{{%figure_battle}}');
        $this->dropForeignKey('fk-figure_battle-figure', '{{%figure_battle}}');
        $this->dropIndex('uniq-figure-battle', '{{%figure_battle}}');
        $this->dropIndex('idx-figure_battle-battle', '{{%figure_battle}}');
        $this->dropIndex('idx-figure_battle-figure', '{{%figure_battle}}');
        $this->dropTable('{{%figure_battle}}');
    }
}
