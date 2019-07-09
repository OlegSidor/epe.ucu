<?php

use yii\db\Migration;
/**
 * Class m190709_150241_create_admin_rule
 */
class m190709_150241_create_admin_permission extends Migration
{
    /**
     * {@inheritdoc}
     * @throws Exception
     */
    public function safeUp()
    {
        $auth = Yii::$app->authManager;
        $adminPermission = $auth->createPermission('admin');
        $adminView= $auth->createPermission('adminView');
        $auth->add($adminPermission);
        $auth->add($adminView);
        Yii::$app->authManager->assign($adminPermission, 1);
        $auth->addChild($adminPermission, $adminView);
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $auth = Yii::$app->authManager;
        $adminView = $auth->getPermission('adminView');
        $admin = $auth->getPermission('admin');
        $auth->removeChild($admin, $adminView);
        $auth->remove($adminView);
        $auth->remove($admin);

    }

}
