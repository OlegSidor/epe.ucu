<?php

use yii\db\Migration;

/**
 * Class m190711_103730_add_hidden_column_to_tabs
 */
class m190711_103730_add_hidden_column_to_tabs extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->addColumn('{{%tabs}}', 'hidden', $this->boolean());
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropColumn('{{%tabs}}', 'hidden');
    }

}
