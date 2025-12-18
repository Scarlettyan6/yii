<?php

use yii\db\Migration;

/**
 * 抗战统计分类表
 */
class m251109_130530_create_statistic_category_table extends Migration
{
    public function up()
    {
        $tableOptions = null;
        if ($this->db->driverName === 'mysql') {
            // 注意是 utf8，不是 utf8mb4
            $tableOptions = 'CHARACTER SET utf8 COLLATE utf8_general_ci ENGINE=InnoDB';
        }

        $this->createTable('{{%statistic_category}}', [
            'id' => $this->primaryKey(),
            'code' => $this->string(32)->notNull()->unique()->comment('英文代号，用于程序里区分'),
            'name' => $this->string(64)->notNull()->comment('统计名称'),
            'description' => $this->text()->comment('说明'),
            'created_at' => $this->integer()->notNull(),
            'updated_at' => $this->integer()->notNull(),
        ], $tableOptions);
    }

    public function down()
    {
        $this->dropTable('{{%statistic_category}}');
    }
}
