<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%Tabs}}`.
 */
class m190606_081548_create_Tabs_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('{{%tabs}}', [
            'id' => $this->primaryKey(),
            'name' => $this->string(255)->notNull(),
            'url' => $this->string(255)->null(),
            'position' => $this->integer()->defaultValue(0),
            'parent' => $this->integer()->null(),
        ]);
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropTable('{{%tabs}}');
    }
}
