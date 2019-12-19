<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%events}}`.
 */
class m191101_104925_create_events_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('{{%events}}', [
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
        $this->dropTable('{{%events}}');
    }
}
