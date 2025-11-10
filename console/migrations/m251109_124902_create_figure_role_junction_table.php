<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%figure_role_junction}}`.
 */
class m251109_124902_create_figure_role_junction_table extends Migration
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

        $this->createTable('{{%figure_role}}', [
            'figure_id' => $this->integer()->notNull(),
            'role_id' => $this->integer()->notNull(),
            'PRIMARY KEY(figure_id, role_id)',
        ], $tableOptions);

        $this->createIndex('idx-figure_role-figure_id', '{{%figure_role}}', 'figure_id');
        $this->createIndex('idx-figure_role-role_id', '{{%figure_role}}', 'role_id');

        $this->addForeignKey(
            'fk-figure_role-figure_id',
            '{{%figure_role}}',
            'figure_id',
            '{{%figure}}',
            'id',
            'CASCADE',
            'CASCADE'
        );

        $this->addForeignKey(
            'fk-figure_role-role_id',
            '{{%figure_role}}',
            'role_id',
            '{{%role}}',
            'id',
            'CASCADE',
            'CASCADE'
        );
    }

    public function down()
    {
        $this->dropForeignKey('fk-figure_role-figure_id', '{{%figure_role}}');
        $this->dropForeignKey('fk-figure_role-role_id', '{{%figure_role}}');
        $this->dropIndex('idx-figure_role-figure_id', '{{%figure_role}}');
        $this->dropIndex('idx-figure_role-role_id', '{{%figure_role}}');
        $this->dropTable('{{%figure_role}}');
    }
}
