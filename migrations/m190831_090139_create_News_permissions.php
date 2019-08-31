<?php

use yii\db\Migration;

/**
 * Class m190831_090139_create_News_permissions
 */
class m190831_090139_create_News_permissions extends Migration
{
    /**
     * {@inheritdoc}
     * @throws Exception
     */
    public function safeUp()
    {

        $auth = Yii::$app->authManager;

        $view = $auth->createPermission('viewNews');
        $create = $auth->createPermission('createNews');
        $delete = $auth->createPermission('deleteNews');
        $modify = $auth->createPermission('modifyNews');

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

        $view = $auth->getPermission('viewNews');
        $create = $auth->getPermission('createNews');
        $delete = $auth->getPermission('deleteNews');
        $modify = $auth->getPermission('modifyNews');

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
