<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%figure}}`.
 */
class m251109_124759_create_figure_table extends Migration
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

        $this->createTable('{{%figure}}', [
            'id' => $this->primaryKey(),
            'name' => $this->string(100)->notNull(),
            'birth_date' => $this->string(50)->comment('出生日期(文本)'),
            'death_date' => $this->string(50)->comment('逝世日期(文本)'),
            'biography' => $this->text()->comment('人物简介'),
            'achievements' => $this->text()->comment('主要功绩'),
            'cover_image_url' => $this->string(255),
            'created_at' => $this->integer()->notNull(),
            'updated_at' => $this->integer()->notNull(),
        ], $tableOptions);

        $this->createIndex('idx-figure-name', '{{%figure}}', 'name');
    }

    /**
     * {@inheritdoc}
     */
    public function down()
    {
        $this->dropTable('{{%figure}}');
    }
}
