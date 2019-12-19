<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%team}}`.
 */
class m191122_123920_create_team_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('{{%team}}', [
            'id' => $this->primaryKey(),
            'name' => $this->string(255),
            'short_description' => $this->string(255),
            'description' => $this->text(),
            'img' => $this->string(255),
            'url' => $this->string(255)
        ]);
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropTable('{{%team}}');
    }
}
