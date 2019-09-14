<?php

use yii\db\Migration;

/**
 * Class m190912_132820_add_not_show_in_footer_to_tabs_table
 */
class m190912_132820_add_not_show_in_footer_to_tabs_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->addColumn('{{%tabs}}', 'not_in_footer', $this->boolean());
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropColumn('{{%tabs}}', 'not_in_footer');
    }
}
