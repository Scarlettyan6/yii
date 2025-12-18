<?php

use yii\db\Migration;

/**
 * Adds deleted_at column to figure table for soft delete support.
 */
class m260101_010000_add_deleted_at_to_figure_table extends Migration
{
    public function safeUp()
    {
        $this->addColumn('{{%figure}}', 'deleted_at', $this->integer()->null()->after('updated_at'));
        $this->createIndex('idx-figure-deleted_at', '{{%figure}}', 'deleted_at');
    }

    public function safeDown()
    {
        $this->dropIndex('idx-figure-deleted_at', '{{%figure}}');
        $this->dropColumn('{{%figure}}', 'deleted_at');
    }
}
