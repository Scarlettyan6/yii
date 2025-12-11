<?php

use yii\db\Migration;

/**
 * Handles adding columns to table `{{%figure}}`.
 */
class m251210_135000_add_fields_to_figure_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function up()
    {
        $this->addColumn('{{%figure}}', 'native_place', $this->string(100)->after('name')->comment('籍贯'));
        $this->addColumn('{{%figure}}', 'gender', $this->tinyInteger()->defaultValue(0)->after('native_place')->comment('0=未知,1=男,2=女'));
        $this->addColumn('{{%figure}}', 'deleted_at', $this->integer()->null()->after('updated_at')->comment('逻辑删除时间'));

        $this->createIndex('idx-figure-native_place', '{{%figure}}', 'native_place');
        $this->createIndex('idx-figure-gender', '{{%figure}}', 'gender');
    }

    /**
     * {@inheritdoc}
     */
    public function down()
    {
        $this->dropIndex('idx-figure-gender', '{{%figure}}');
        $this->dropIndex('idx-figure-native_place', '{{%figure}}');

        $this->dropColumn('{{%figure}}', 'deleted_at');
        $this->dropColumn('{{%figure}}', 'gender');
        $this->dropColumn('{{%figure}}', 'native_place');
    }
}
