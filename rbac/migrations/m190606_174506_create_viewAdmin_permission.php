<?php

use dektrium\rbac\migrations\Migration;

class m190606_174506_create_viewAdmin_permission extends Migration
{
    public function safeUp()
    {
        $admin = $this->findRole('admin');

        $viewAdmin = $viewTabs = $this->createPermission('viewAdmin');

        $viewTabs = $this->findPermission('viewTabs');
        $createTabs = $this->findPermission('createTabs');
        $moveTabs = $this->findPermission('moveTabs');
        $deleteTabs = $this->findPermission('deleteTabs');
        $modifyTabs = $this->findPermission('modifyTabs');

        $this->addChild($viewTabs, $viewAdmin);
        $this->addChild($createTabs, $viewAdmin);
        $this->addChild($moveTabs, $viewAdmin);
        $this->addChild($deleteTabs, $viewAdmin);
        $this->addChild($modifyTabs, $viewAdmin);
    }

    public function safeDown()
    {
        $this->removeItem('viewAdmin');
    }
}
