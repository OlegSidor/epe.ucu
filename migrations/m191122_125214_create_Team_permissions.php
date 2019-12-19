<?php

use yii\db\Migration;

/**
 * Class m191122_125214_create_Team_permissions
 */
class m191122_125214_create_Team_permissions extends Migration
{
    /**
     * {@inheritdoc}
     * @throws Exception
     */
    public function safeUp()
    {

        $auth = Yii::$app->authManager;

        $view = $auth->createPermission('viewTeam');
        $create = $auth->createPermission('createTeam');
        $delete = $auth->createPermission('deleteTeam');
        $modify = $auth->createPermission('modifyTeam');

        $auth->add($view);
        $auth->add($create);
        $auth->add($delete);
        $auth->add($modify);

        $admin = $auth->getPermission('admin');
        $auth->addChild($admin, $view);
        $auth->addChild($admin, $create);
        $auth->addChild($admin, $delete);
        $auth->addChild($admin, $modify);

        $adminView = $auth->getPermission('adminView');
        $auth->addChild($view, $adminView);
        $auth->addChild($create, $adminView);
        $auth->addChild($delete, $adminView);
        $auth->addChild($modify, $adminView);
    }

    /**
     * {@inheritdoc}
     * @throws \yii\base\Exception
     * @throws Exception
     */
    public function safeDown()
    {
        $auth = Yii::$app->authManager;

        $view = $auth->getPermission('viewTeam');
        $create = $auth->getPermission('createTeam');
        $delete = $auth->getPermission('deleteTeam');
        $modify = $auth->getPermission('modifyTeam');

        $admin = $auth->getPermission('admin');
        $auth->removeChild($admin, $view);
        $auth->removeChild($admin, $create);
        $auth->removeChild($admin, $delete);
        $auth->removeChild($admin, $modify);

        $adminView = $auth->getPermission('adminView');
        $auth->removeChild($view, $adminView);
        $auth->removeChild($create, $adminView);
        $auth->removeChild($delete, $adminView);
        $auth->removeChild($modify, $adminView);


        $auth->remove($view);
        $auth->remove($create);
        $auth->remove($delete);
        $auth->remove($modify);

    }
}
