<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%battle}}`.
 */
class m251109_124738_create_battle_table extends Migration
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

        $this->createTable('{{%battle}}', [
            'id' => $this->primaryKey(),
            'name' => $this->string(255)->notNull(),
            'start_date' => $this->date(),
            'end_date' => $this->date(),
            'main_location' => $this->string(100)->comment('主要地点文字'),
            'main_latitude' => $this->decimal(10, 7)->comment('主要地点纬度'),
            'main_longitude' => $this->decimal(10, 7)->comment('主要地点经度'),
            'description' => $this->text(),
            'result' => $this->text(),
            'casualties_china' => $this->string(255)->comment('中方伤亡'),
            'casualties_japan' => $this->string(255)->comment('日方伤亡'),
            'created_at' => $this->integer()->notNull(),
            'updated_at' => $this->integer()->notNull(),
        ], $tableOptions);

        $this->createIndex('idx-battle-name', '{{%battle}}', 'name');
    }
    public function down()
    {
        $this->dropTable('{{%battle}}');
    }

}

