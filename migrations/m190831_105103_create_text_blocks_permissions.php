<?php

use yii\db\Migration;

/**
 * Class m190831_105103_create_text_blocks_permissions
 */
class m190831_105103_create_text_blocks_permissions extends Migration
{
    /**
     * {@inheritdoc}
     * @throws Exception
     */
    public function safeUp()
    {

        $auth = Yii::$app->authManager;

        $view = $auth->createPermission('viewTextBlocks');
        $modify = $auth->createPermission('modifyTextBlocks');

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

        $view = $auth->getPermission('viewTextBlocks');
        $modify = $auth->getPermission('modifyTextBlocks');

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
