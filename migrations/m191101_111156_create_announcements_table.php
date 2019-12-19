<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%announcements}}`.
 */
class m191101_111156_create_announcements_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('{{%announcements}}', [
            'id' => $this->primaryKey(),
            'title' => $this->string(255),
            'content' => $this->text(),
            'short_desc' => $this->string(255),
            'date' => $this->date(),
            'url' => $this->string(255),
            'img' => $this->string(255)
        ]);
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropTable('{{%announcements}}');
    }
}
