<?php

use yii\db\Migration;

/**
 * Class m190907_181829_add_main_page_footer
 */
class m190907_181829_add_main_page_footer extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->insert('{{%text_blocks}}',
            ['name'  => 'main_page_footer',
             'title' => 'Нижня частина головній сторінці']);
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {

    }

}
