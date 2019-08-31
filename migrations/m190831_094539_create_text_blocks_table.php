<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%text_blocks}}`.
 */
class m190831_094539_create_text_blocks_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('{{%text_blocks}}', [
            'id'    => $this->primaryKey(),
            'name'  => $this->string(255)->notNull(),
            'title' => $this->string(255),
            'text'  => $this->text(),
        ]);
        $this->insert('{{%text_blocks}}',
            ['name'  => 'main_page_text',
             'title' => 'Текст на головній сторінці']);
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropTable('{{%text_blocks}}');
    }
}
