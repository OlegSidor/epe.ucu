<?php

use yii\db\Migration;

/**
 * Class m190914_140815_create_Template_permissions
 */
class m190914_140815_create_Template_permissions extends Migration
{
    /**
     * {@inheritdoc}
     * @throws Exception
     */
    public function safeUp()
    {

        $auth = Yii::$app->authManager;

        $view = $auth->createPermission('viewTemplates');
        $create = $auth->createPermission('createTemplates');
        $delete = $auth->createPermission('deleteTemplates');
        $modify = $auth->createPermission('modifyTemplates');

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

        $view = $auth->getPermission('viewTemplates');
        $create = $auth->getPermission('createTemplates');
        $delete = $auth->getPermission('deleteTemplates');
        $modify = $auth->getPermission('modifyTemplates');

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

    }}
