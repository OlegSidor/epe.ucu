<?php

use dektrium\rbac\migrations\Migration;

class m190606_164316_create_Tabs_permissions extends Migration
{
    public function safeUp()
    {
        $admin = $this->findRole('admin');

        $viewTabs = $this->createPermission('viewTabs');
        $createTabs = $this->createPermission('createTabs');
        $moveTabs = $this->createPermission('moveTabs');
        $deleteTabs = $this->createPermission('deleteTabs');
        $modifyTabs = $this->createPermission('modifyTabs');

        $this->addChild($admin, $viewTabs);
        $this->addChild($admin, $createTabs);
        $this->addChild($admin, $moveTabs);
        $this->addChild($admin, $deleteTabs);
        $this->addChild($admin, $modifyTabs);

    }
    
    public function safeDown()
    {
        $this->removeItem('viewTabs');
        $this->removeItem('createTabs');
        $this->removeItem('moveTabs');
        $this->removeItem('deleteTabs');
        $this->removeItem('modifyTabs');

    }
}
