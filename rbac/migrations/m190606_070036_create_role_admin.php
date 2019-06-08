<?php

use dektrium\rbac\migrations\Migration;

class m190606_070036_create_role_admin extends Migration
{
    public function safeUp()
    {
        $this->createRole('admin');
    }
    
    public function safeDown()
    {
        $this->removeRole('admin');
    }
}
