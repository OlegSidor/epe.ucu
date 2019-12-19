<?php

use yii\db\Migration;

/**
 * Class m191031_102608_create_Sort_permissions
 */
class m191031_102608_create_Sort_permissions extends Migration
{
    /**
     * {@inheritdoc}
     * @throws \yii\base\Exception
     * @throws Exception
     */
    public function safeUp()
    {

        $auth = Yii::$app->authManager;

        $view = $auth->createPermission('viewSort');
        $modify = $auth->createPermission('modifySort');

        $auth->add($view);
        $auth->add($modify);

        $admin = $auth->getPermission('admin');
        $auth->addChild($admin, $view);
        $auth->addChild($admin, $modify);

        $adminView = $auth->getPermission('adminView');
        $auth->addChild($view, $adminView);
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

        $view = $auth->getPermission('viewSort');
        $modify = $auth->getPermission('modifySort');

        $admin = $auth->getPermission('admin');
        $auth->removeChild($admin, $view);
        $auth->removeChild($admin, $modify);

        $adminView = $auth->getPermission('adminView');
        $auth->removeChild($view, $adminView);
        $auth->removeChild($modify, $adminView);


        $auth->remove($view);
        $auth->remove($modify);

    }
}
