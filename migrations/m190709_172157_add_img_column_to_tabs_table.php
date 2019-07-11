<?php

use yii\db\Migration;

/**
 * Handles adding img to table `{{%tabs}}`.
 */
class m190709_172157_add_img_column_to_tabs_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->addColumn('{{%tabs}}', 'img',$this->string(255));
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropColumn('{{%tabs}}', 'img');
    }
}
