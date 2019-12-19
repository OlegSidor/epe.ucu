<?php

use yii\db\Migration;

/**
 * Handles adding position to table `{{%tabs}}`.
 */
class m191031_092158_add_position_column_to_tabs_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->addColumn('{{%tabs}}', 'position', $this->integer(11)->notNull());
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropIndex('tabs-index', '{{$tabs}}');
        $this->dropColumn('{{%tabs}}', 'position');
    }
}
