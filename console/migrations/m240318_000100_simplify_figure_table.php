<?php

use yii\db\Migration;

/**
 * Simplify figure table to core fields only.
 */
class m240318_000100_simplify_figure_table extends Migration
{
        public function up()
    {
        $schema = $this->db->getTableSchema('{{%figure}}');
        foreach (['idx-figure-native_place' => 'native_place', 'idx-figure-gender' => 'gender'] as $idx => $col) {
            if (isset($schema->columns[$col])) {
                $this->dropIndex($idx, '{{%figure}}');
            }
        }
        foreach (['native_place','gender','birth_date','death_date'] as $col) {
            if (isset($schema->columns[$col])) {
                $this->dropColumn('{{%figure}}', $col);
            }
        }
    }
    public function down()
    {
        $schema = $this->db->getTableSchema('{{%figure}}');
        if (!isset($schema->columns['native_place'])) {
            $this->addColumn('{{%figure}}', 'native_place', $this->string(100)->comment('籍贯')->after('name'));
        }
        if (!isset($schema->columns['birth_date'])) {
            $this->addColumn('{{%figure}}', 'birth_date', $this->string(50)->comment('出生日期(文本)')->after('name'));
        }
        if (!isset($schema->columns['death_date'])) {
            $this->addColumn('{{%figure}}', 'death_date', $this->string(50)->comment('逝世日期(文本)')->after('birth_date'));
        }
        if (!isset($schema->columns['gender'])) {
            $this->addColumn('{{%figure}}', 'gender', $this->tinyInteger()->defaultValue(0)->comment('0=未知,1=男,2=女')->after('cover_image_url'));
        }
        $this->createIndex('idx-figure-native_place', '{{%figure}}', 'native_place');
        $this->createIndex('idx-figure-gender', '{{%figure}}', 'gender');
    }

}
