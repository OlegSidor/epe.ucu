<?php

use yii\db\Migration;

/**
 * Handles adding img to table `{{%news}}`.
 */
class m190728_133557_add_img_column_to_news_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->addColumn('{{%news}}', 'img', $this->string(255));
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropColumn('{{%news}}', 'img');
    }
}
