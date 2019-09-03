<?php

use yii\db\Migration;

/**
 * Class m190903_170643_add_show_in_main_column_to_tabs_column
 */
class m190903_170643_add_show_in_main_column_to_tabs_column extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->addColumn('{{%tabs}}', 'show_in_main', $this->boolean()->defaultValue(0));
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropColumn('{{%tabs}}', 'show_in_main');
    }
}
